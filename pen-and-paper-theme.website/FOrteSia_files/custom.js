jQuery(document).ready(function($){jQuery.fn.exists=function(){return this.length>0;}
$('body header nav').prepend('<a id="mobile_nav" title="Navigation"><i class="icon-align-justify"></i></a>');$("#mobile_nav").click(function(){$(".navigation").slideToggle();$(this).toggleClass("active");});$('ul.sub-menu').parent().children('a').append(' <i class="icon-caret-down"></i>');$("#social_icons li a[title], a.tooltip[title]").tooltip({effect:'slide',slideSpeed:200});$("ul.tabs").tabs("div.panes > div",{effect:'fade',fadeInSpeed:800});});