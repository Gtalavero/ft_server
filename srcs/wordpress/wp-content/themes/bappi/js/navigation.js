/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function ($) {
  var container, button, menu, links, i, len;

  container = document.getElementById("site-navigation");
  if (!container) {
    return;
  }

  button = container.getElementsByTagName("button")[0];
  if ("undefined" === typeof button) {
    return;
  }

  menu = container.getElementsByTagName("ul")[0];

  // Hide menu toggle button if menu is empty and return early.
  if ("undefined" === typeof menu) {
    button.style.display = "none";
    return;
  }

  menu.setAttribute("aria-expanded", "false");
  if (-1 === menu.className.indexOf("nav-menu")) {
    menu.className += " nav-menu";
  }

  button.onclick = function () {
    if (-1 !== container.className.indexOf("toggled")) {
      container.className = container.className.replace(" toggled", "");
      button.setAttribute("aria-expanded", "false");
      menu.setAttribute("aria-expanded", "false");
    } else {
      container.className += " toggled";
      button.setAttribute("aria-expanded", "true");
      menu.setAttribute("aria-expanded", "true");
    }
  };

  // Get all the link elements within the menu.
  links = menu.getElementsByTagName("a");

  // Each time a menu link is focused or blurred, toggle focus.
  for (i = 0, len = links.length; i < len; i++) {
    links[i].addEventListener("focus", toggleFocus, true);
    links[i].addEventListener("blur", toggleFocus, true);
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    var self = this;

    // Move up through the ancestors of the current link until we hit .nav-menu.
    while (-1 === self.className.indexOf("nav-menu")) {
      // On li elements toggle the class .focus.
      if ("li" === self.tagName.toLowerCase()) {
        if (-1 !== self.className.indexOf("focus")) {
          self.className = self.className.replace(" focus", "");
        } else {
          self.className += " focus";
        }
      }

      self = self.parentElement;
    }
  }

  /**
   * Toggles `focus` class to allow submenu access on tablets.
   */
  (function (container) {
    var touchStartFn,
      i,
      parentLink = container.querySelectorAll(
        ".menu-item-has-children > a, .page_item_has_children > a"
      );

    if ("ontouchstart" in window) {
      touchStartFn = function (e) {
        var menuItem = this.parentNode,
          i;

        if (!menuItem.classList.contains("focus")) {
          e.preventDefault();
          for (i = 0; i < menuItem.parentNode.children.length; ++i) {
            if (menuItem === menuItem.parentNode.children[i]) {
              continue;
            }
            menuItem.parentNode.children[i].classList.remove("focus");
          }
          menuItem.classList.add("focus");
        } else {
          menuItem.classList.remove("focus");
        }
      };

      for (i = 0; i < parentLink.length; ++i) {
        parentLink[i].addEventListener("touchstart", touchStartFn, false);
      }
    }
  })(container);
})();

(function ($) {
  /*Mobile Menu*/
  let NavMenu = $(".nav-menu");
  let MenuItem = $(".menu-item");
  let MenuButton =
    // if ($(".menu-item").hasClass(".menu-item-has-children")) {
    //   let prefenditem = `<button class='submenu-control'>v</button>`;
    //   $(".menu-item").prefend(prefenditem);
    // }
    $("body").on(".submenu-controller", "click", function () {
      console.log("trst");
    });

  MenuItem.on("click", function (e) {
    e = window.event || e;
    e.stopPropagation();
    if ($(this).hasClass("menu-item-has-children")) {
      $(this).children(".sub-menu").stop().slideToggle();
      $(this).siblings(".menu-item").children(".sub-menu").slideUp();
    }
  });
  $(".menu-toggle").on("click", function () {
    $(this).parents(".main-navigation").find(".sub-menu").slideUp();
    if ($(".main-navigation").hasClass("toggled")) {
      $("body").addClass("showing-menu");
    } else {
      $("body").removeClass("showing-menu");
    }
  });
  document.addEventListener(
    "keydown",
    function (event) {
      if (event.keyCode === 27 && $("body").hasClass("showing-menu")) {
        event.preventDefault();
        $("body").removeClass("showing-menu");
        $(".main-navigation").removeClass("toggled");
        $(".menu-toggle").attr("aria-expanded", "false");
      }
    }.bind(this)
  );
  function keepFocusInModal() {
    var _doc = document;

    _doc.addEventListener("keydown", function (event) {
      var toggleTarget,
        menuToggleEl,
        acElParent,
        modal,
        selectors,
        elements,
        menuType,
        bottomMenu,
        activeEl,
        lastEl,
        firstEl,
        tabKey,
        shiftKey,
        menuToggleEl = $(".menu-toggle");
        let toggleselector = _doc.querySelector(".menu-toggle");
      clickedEl = menuToggleEl.data("clicked", true);

      if (clickedEl && _doc.body.classList.contains("showing-menu")) {
        selectors = "input, a, button";
        modal = _doc.querySelector(".menu");

        elements = modal.querySelectorAll(selectors);
        elements = Array.prototype.slice.call(elements);

        lastEl = elements[elements.length - 1];
        firstEl = elements[0];

        activeEl = _doc.activeElement;
        // var tagettagname = activeEl.tagName;
        // tagettagname = tagettagname.toLowerCase();
        // console.log("atr", tagettagname);
        // if (activeEl) {
        //   console.log("ACTIVE ELEMENT", event);
        // }
        tabKey = event.keyCode === 9;
        shiftKey = event.shiftKey;

        if (!shiftKey && tabKey && lastEl === activeEl) {
          event.preventDefault();
          firstEl.focus();
          // menuToggleEl.focus();
          console.log("first");
        }
        // if(tabKey && lastEl === activeEl){
        //   menuToggleEl.focus();
        //   console.log("another");
        // }

        if (shiftKey && tabKey && firstEl === activeEl) {
          event.preventDefault();
          lastEl.focus();
          menuToggleEl.focus();
          
        }
        
        console.log('active element', activeEl);
        if(shiftKey && tabKey && toggleselector === activeEl){
          event.preventDefault();
             lastEl.focus();
        }

      
      }
    });
  }
  keepFocusInModal();

  $(document).ready(function () {
    $(".menu-toggle").on("click", function () {
      $(
        "<button class='submenu-controller dashicons dashicons-arrow-down-alt2'></button>"
      ).insertBefore($(".sub-menu"));
    });
  });
})(jQuery);
