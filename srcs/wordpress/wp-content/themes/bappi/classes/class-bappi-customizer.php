<?php

/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since bappi 1.0
 */
class bappi_customize
{
    /**
     * This hooks into 'customize_register' (available as of WP 3.4) and allows
     * you to add new sections and controls to the Theme Customize screen.
     * 
     * Note: To enable instant preview, we have to actually write a bit of custom
     * javascript. See live_preview() for more.
     *  
     * @see add_action('customize_register',$func)
     * @param \WP_Customize_Manager $wp_customize
     * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
     * @since bappi 1.0
     */
    public static function register($wp_customize)
    {
        //1. Define a new section (if desired) to the Theme Customizer
        $wp_customize->add_section(
            'bappi_options',
            array(
                'title'       => __('bappi Options', 'bappi'), //Visible title of section
                'priority'    => 35, //Determines what order this appears in
                'capability'  => 'edit_theme_options', //Capability needed to tweak
                'description' => __('Allows you to customize some example settings for bappi.', 'bappi'), //Descriptive tooltip
            )
        );

        //2. Register new settings to the WP database...
        $wp_customize->add_setting(
            'link_textcolor', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
            array(
                'default'    => '#B2DF82', //Default setting/value to save
                'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );

        //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
        $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
            $wp_customize, //Pass the $wp_customize object (required)
            'mytheme_link_textcolor', //Set a unique ID for the control
            array(
                'label'      => __('Secondary Color', 'bappi'), //Admin-visible name of the control
                'settings'   => 'link_textcolor', //Which setting to load and manipulate (serialized is okay)
                'priority'   => 9, //Determines the order this control appears in for the specified section
                'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            )
        ));

        function bappi_sanitizer($sanitizrfunc)
        {
            return filter_var($sanitizrfunc, FILTER_SANITIZE_NUMBER_INT);
        };
        $wp_customize->add_setting('show_header_center', array(
            'default'    => '0',
            'transport' => 'postMessage',
            'sanitize_callback' => 'bappi_sanitizer', // Sanitize input
        ));


        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'show_header_center',
                array(
                    'label'     => __('Text Alignment Center', 'bappi'),
                    'section'   => 'colors',
                    'settings'  => 'show_header_center',
                    'type'      => 'checkbox',
                )
            )
        );

    

        //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
        $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
        $wp_customize->get_setting('background_color')->transport = 'postMessage';

    }

    /**
     * This will output the custom WordPress settings to the live theme's WP head.
     * 
     * Used by hook: 'wp_head'
     * 
     * @see add_action('wp_head',$func)
     * @since bappi 1.0
     */
    public static function header_output()
    {
?>
        <!--Customizer CSS-->
        <style type="text/css">
            /* link text color: color */
            <?php self::generate_css('.site-title a,a,a:visited,a:hover, .main-navigation .menu-item a, button, input,.widget-title,body,textarea', 'color', 'link_textcolor'); ?>
            /* link text color  background*/
            <?php self::generate_css('.entry-title', 'background-color', 'link_textcolor'); ?>
            /* link text color  border*/
            <?php self::generate_css('.toggled .menu,.site-header, .wp-block-pullquote, .wp-block-quote:not(.is-style-large), .wp-block-quote:not(.is-style-large),input, button, textarea, select .site-footer, .site-footer', 'border-color', 'link_textcolor'); ?>
            /* background color: color */
            <?php self::generate_css('.entry-header .entry-title,.entry-header .entry-title a', 'color', 'background_color', '#'); ?>
            /* background color: background-color */
            <?php self::generate_css("[type='search'],input,.menu .children, .main-navigation .sub-menu .menu-item", 'background-color', 'background_color', '#'); ?>
            /* Header Text Color */
            <?php self::generate_css('.site-description', 'color', 'header_textcolor', '#'); ?>
        </style>
        <!--/Customizer CSS-->
        <?php
        $header_alignment = get_theme_mod('show_header_center');
        if ($header_alignment == 1) {
        ?><style>
                .site-branding,
                .main-navigation {
                    justify-content: center;
                    text-align: center;
                }
            </style>
        <?php }
        ?>
        </style>
<?php
    }

    /**
     * This outputs the javascript needed to automate the live settings preview.
     * Also keep in mind that this function isn't necessary unless your settings 
     * are using 'transport'=>'postMessage' instead of the default 'transport'
     * => 'refresh'
     * 
     * Used by hook: 'customize_preview_init'
     * 
     * @see add_action('customize_preview_init',$func)
     * @since bappi 1.0
     */
    public static function live_preview()
    {
        wp_enqueue_script('customizer-js', get_theme_file_uri('/js/customizer.js'), array('jquery'), '1.0', true);
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since bappi 1.0
     */
    public static function generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
    {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if (!empty($mod)) {
            $return = sprintf(
                '%s { %s:%s; }',
                $selector,
                $style,
                $prefix . $mod . $postfix
            );
            if ($echo) {
                echo $return;
            }
        }
        return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('bappi_customize', 'register'));

// Output custom CSS to live site
add_action('wp_head', array('bappi_customize', 'header_output'));

// Enqueue live preview javascript in Theme Customizer admin screen
add_action('customize_preview_init', array('bappi_customize', 'live_preview'));
