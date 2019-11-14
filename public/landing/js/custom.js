!function(t){"use strict";t(window).on("load",function(a){t(".loader svg").fadeOut(),t(".loader").delay().fadeOut("slow")}),t(document).on("scroll",function(){var a=t(this).scrollTop();t(".parallax-fade-top").css({top:a/2+"px",opacity:1-a/450})}),t(window).on("load",function(){t(".navbar-nav li a,a[href='#top'],a[data-gal='m_PageScroll2id']").mPageScroll2id({highlightSelector:".navbar-nav li a",offset:68,scrollSpeed:800}),t("a[rel='next']").click(function(a){a.preventDefault();var e=t(this).parent().parent("section").next().attr("id");t.mPageScroll2id("scrollTo",e)})}),t(".js-tilt").tilt({glare:!1}),t(window).enllax(),window.scrollReveal=new scrollReveal,t(document).ready(function(){jQuery(window).on("scroll",function(){jQuery(this).scrollTop()>300?jQuery(".scroll-to-top").fadeIn(400):jQuery(".scroll-to-top").fadeOut(400)}),jQuery(".scroll-to-top").on("click",function(t){return t.preventDefault(),jQuery("html, body").animate({scrollTop:0},400),!1}),t("#contact-form").validator(),t("#contact-form").on("submit",function(a){if(!a.isDefaultPrevented()){return t.ajax({type:"POST",url:"contact.php",data:t(this).serialize(),success:function(a){var e="alert-"+a.type,o=a.message,l='<div class="alert '+e+' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+o+"</div>";e&&o&&(t("#contact-form").find(".messages").html(l),t("#contact-form")[0].reset())}}),!1}})}),t(".owl-carousel").owlCarousel({items:5,margin:15,autoplay:!1,autoplayHoverPause:!1,loop:!1,nav:!1,navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],responsive:{768:{items:5},480:{itmes:2},300:{items:1}}})}(jQuery);
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "dataProvider": [ {
		    "country": "CoinGrinch Keeps 50% trading service fee",
		    "value": 50,
		    "color": "#016097"
		  }, {
		    "country": "CoinGrinch shares another 50% to users who hold GRT on Coingrinch",
		    "value": 50,
		    "color": "#26827b"
		  } ],
  "valueField": "value",
  "titleField": "country",
  "startEffect": "elastic","colorField": "color",
  "startDuration": 1,
  "labelRadius": 15,
  "innerRadius": "50%",
  "outlineAlpha": 0,
  "depth3D": 35,
  "balloonText": "<div style='background:#fff;transform:rotate(0deg)!important;box-shadow: 0 0 0px 25px #fff'>[[title]]<br><span style='font-size:14px;transform:rotate(0deg)!important'><b>[[value]]</b> ([[percents]]%)</span></div>",
  "angle": 15,
  "export": {
    "enabled": true
  }
} );