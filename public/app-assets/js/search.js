/*================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 5.0
  Author: PIXINVENT
  Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================*/

var searchListLi = $(".search-list li"),
   searchList = $(".search-list"),
   searchSm = $(".search-sm"),
   searchBoxSm = $(".search-input-sm .search-box-sm"),
   searchListSm = $(".search-list-sm");

$(function () {
   "use strict";

   //Search box form small screen
   $(".search-button").click(function (e) {
      if (searchSm.is(":hidden")) {
         searchSm.show();
         searchBoxSm.focus();
      } else {
         searchSm.hide();
         searchBoxSm.val("");
      }
   });
   // search input get focus
   $('.search-input-sm').on('click', function () {
      searchBoxSm.focus();
   });

   $(".search-sm-close").click(function (e) {
      searchSm.hide();
      searchBoxSm.val("");
   });

   // Search scrollbar
   if ($(".search-list").length > 0) {
      var ps_search_nav = new PerfectScrollbar(".search-list", {
         wheelSpeed: 2,
         wheelPropagation: false,
         minScrollbarLength: 20
      });
   }
   if (searchListSm.length > 0) {
      var ps_search2_nav = new PerfectScrollbar(".search-list-sm", {
         wheelSpeed: 2,
         wheelPropagation: false,
         minScrollbarLength: 20
      });
   }

   // Quick search
   //-------------
   var $filename = $(".header-search-wrapper .header-search-input,.search-input-sm .search-box-sm").data("search");

   // Navigation Search area Close
   $(".search-sm-close").on("click", function () {
      searchBoxSm.val("");
      searchBoxSm.blur();
      searchListLi.remove();
      searchList.addClass("display-none");
      if (contentOverlay.hasClass("show")) {
         contentOverlay.removeClass("show");
      }
   });

   // Navigation Search area Close on click of content overlay
   contentOverlay.on("click", function () {
      searchListLi.remove();
      contentOverlay.removeClass("show");
      searchSm.hide();
      searchBoxSm.val("");
      searchList.addClass("display-none");
      $(".search-input-sm .search-box-sm, .header-search-input").val("");
   });

   // small screen search box form submit prevent
   $('#navbarForm').on('submit', function (e) {
      e.preventDefault();
   })
   // If we use up key(38) Down key (40) or Enter key(13)
   $(window).on("keydown", function (e) {
      var $current = $(".search-list li.current_item"),
         $next,
         $prev;
      if (e.keyCode === 40) {
         $next = $current.next();
         $current.removeClass("current_item");
         $current = $next.addClass("current_item");
      } else if (e.keyCode === 38) {
         $prev = $current.prev();
         $current.removeClass("current_item");
         $current = $prev.addClass("current_item");
      }
      if (e.keyCode === 13 && $(".search-list li.current_item").length > 0) {
         var selected_item = $("li.current_item a");
         window.location = $("li.current_item a").attr("href");
         $(selected_item).trigger("click");
      }
   });

   searchList.mouseenter(function () {


      if ($(".search-list").length > 0) {
         ps_search_nav.update();
      }
      if (searchListSm.length > 0) {
         ps_search2_nav.update();
      }
   });
   // Add class on hover of the list
   $(document).on("mouseenter", ".search-list li", function (e) {
      $(this)
         .siblings()
         .removeClass("current_item");
      $(this).addClass("current_item");
   });
   $(document).on("click", ".search-list li", function (e) {
      e.stopPropagation();
   });
});

//Collapse menu on below 994 screen
$(window).on("resize", function () {
   // search result remove on screen resize
   if ($(window).width() < 992) {
      $(".header-search-input").val("");
      $(".header-search-input").closest(".search-list li").remove();
   }
   if ($(window).width() > 993) {
      searchSm.hide();
      searchBoxSm.val("");
      $(".search-input-sm .search-box-sm").val("");
   }
});
