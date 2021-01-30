/**
 * @file
 * bootstrap.js
 *
 * Provides general enhancements and fixes to Bootstrap's JS files.
 */

var Drupal = Drupal || {};

(function($, Drupal){
  "use strict";

  Drupal.behaviors.bootstrap = {
    attach: function(context) {
      // Provide some Bootstrap tab/Drupal integration.
      $(context).find('.tabbable').once('bootstrap-tabs', function () {
        var $wrapper = $(this);
        var $tabs = $wrapper.find('.nav-tabs');
        var $content = $wrapper.find('.tab-content');
        var borderRadius = parseInt($content.css('borderBottomRightRadius'), 10);
        var bootstrapTabResize = function() {
          if ($wrapper.hasClass('tabs-left') || $wrapper.hasClass('tabs-right')) {
            $content.css('min-height', $tabs.outerHeight());
          }
        };
        // Add min-height on content for left and right tabs.
        bootstrapTabResize();
        // Detect tab switch.
        if ($wrapper.hasClass('tabs-left') || $wrapper.hasClass('tabs-right')) {
          $tabs.on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
            bootstrapTabResize();
            if ($wrapper.hasClass('tabs-left')) {
              if ($(e.target).parent().is(':first-child')) {
                $content.css('borderTopLeftRadius', '0');
              }
              else {
                $content.css('borderTopLeftRadius', borderRadius + 'px');
              }
            }
            else {
              if ($(e.target).parent().is(':first-child')) {
                $content.css('borderTopRightRadius', '0');
              }
              else {
                $content.css('borderTopRightRadius', borderRadius + 'px');
              }
            }
          });
        }
      });
    }
  };

  /**
   * Behavior for .
   */
  Drupal.behaviors.bootstrapFormHasError = {
    attach: function (context, settings) {
      if (settings.bootstrap && settings.bootstrap.formHasError) {
        var $context = $(context);
        $context.find('.form-item.has-error:not(.form-type-password.has-feedback)').once('error', function () {
          var $formItem = $(this);
          var $input = $formItem.find(':input');
          $input.on('keyup focus blur', function () {
            var value = $input.val() || false;
            $formItem[value ? 'removeClass' : 'addClass']('has-error');
            $input[value ? 'removeClass' : 'addClass']('error');
          });
        });
      }
    }
  };

  /**
   * Bootstrap Popovers.
   */
  Drupal.behaviors.bootstrapPopovers = {
    attach: function (context, settings) {
      if (settings.bootstrap && settings.bootstrap.popoverEnabled) {
        var $currentPopover = $();
        if (settings.bootstrap.popoverOptions.triggerAutoclose) {
          $(document).on('click', function (e) {
            if ($currentPopover.length && !$(e.target).is('[data-toggle=popover]') && $(e.target).parents('.popover.in').length === 0) {
              $currentPopover.popover('hide');
              $currentPopover = $();
            }
          });
        }
        var elements = $(context).find('[data-toggle=popover]').toArray();
        for (var i = 0; i < elements.length; i++) {
          var $element = $(elements[i]);
          var options = $.extend({}, settings.bootstrap.popoverOptions, $element.data());
          if (!options.content) {
            options.content = function () {
              var target = $(this).data('target');
              return target && $(target) && $(target).length && $(target).clone().removeClass('element-invisible').wrap('<div/>').parent()[$(this).data('bs.popover').options.html ? 'html' : 'text']() || '';
            }
          }
          $element.popover(options).on('click', function (e) {
            e.preventDefault();
          });
          if (settings.bootstrap.popoverOptions.triggerAutoclose) {
            $element.on('show.bs.popover', function () {
              if ($currentPopover.length) {
                $currentPopover.popover('hide');
              }
              $currentPopover = $(this);
            });
          }
        }
      }
    }
  };

  /**
   * Bootstrap Tooltips.
   */
  Drupal.behaviors.bootstrapTooltips = {
    attach: function (context, settings) {
      if (settings.bootstrap && settings.bootstrap.tooltipEnabled) {
        var elements = $(context).find('[data-toggle="tooltip"]').toArray();
        for (var i = 0; i < elements.length; i++) {
          var $element = $(elements[i]);
          var options = $.extend({}, settings.bootstrap.tooltipOptions, $element.data());
          $element.tooltip(options);
        }
      }
    }
  };

  /**
   * Anchor fixes.
   */
  var $scrollableElement = $();
  Drupal.behaviors.bootstrapAnchors = {
    attach: function(context, settings) {
      var i, elements = ['html', 'body'];
      if (!$scrollableElement.length) {
        for (i = 0; i < elements.length; i++) {
          var $element = $(elements[i]);
          if ($element.scrollTop() > 0) {
            $scrollableElement = $element;
            break;
          }
          else {
            $element.scrollTop(1);
            if ($element.scrollTop() > 0) {
              $element.scrollTop(0);
              $scrollableElement = $element;
              break;
            }
          }
        }
      }
      if (!settings.bootstrap || settings.bootstrap.anchorsFix !== '1') {
        return;
      }
      var anchors = $(context).find('a').toArray();
      for (i = 0; i < anchors.length; i++) {
        if (!anchors[i].scrollTo) {
          this.bootstrapAnchor(anchors[i]);
        }
      }
      $scrollableElement.once('bootstrap-anchors', function () {
        $scrollableElement.on('click.bootstrap-anchors', 'a[href*="#"]:not([data-toggle],[data-target],[data-slide])', function(e) {
          if (this.scrollTo) {
            this.scrollTo(e);
          }
        });
      });
    },
    bootstrapAnchor: function (element) {
      element.validAnchor = element.nodeName === 'A' && (location.hostname === element.hostname || !element.hostname) && (element.hash.replace(/#/,'').length > 0);
      element.scrollTo = function(event) {
        var attr = 'id';
        var $target = $(element.hash);
        // Check for anchors that use the name attribute instead.
        if (!$target.length) {
          attr = 'name';
          $target = $('[name="' + element.hash.replace('#', '') + '"]');
        }
        // Immediately stop if no anchors are found.
        if (!this.validAnchor && !$target.length) {
          return;
        }
        // Anchor is valid, continue if there is an offset.
        var offset = $target.offset().top - parseInt($scrollableElement.css('paddingTop'), 10) - parseInt($scrollableElement.css('marginTop'), 10);
        if (offset > 0) {
          if (event) {
            event.preventDefault();
          }
          var $fakeAnchor = $('<div/>')
            .addClass('element-invisible')
            .attr(attr, $target.attr(attr))
            .css({
              position: 'absolute',
              top: offset + 'px',
              zIndex: -1000
            })
            .appendTo($scrollableElement);
          $target.removeAttr(attr);
          var complete = function () {
            location.hash = element.hash;
            $fakeAnchor.remove();
            $target.attr(attr, element.hash.replace('#', ''));
          };
          if (Drupal.settings.bootstrap.anchorsSmoothScrolling) {
            $scrollableElement.animate({ scrollTop: offset, avoidTransforms: true }, 400, complete);
          }
          else {
            $scrollableElement.scrollTop(offset);
            complete();
          }
        }
      };
    }
  };

  /**
   * Tabledrag theming elements.
   */
  Drupal.theme.tableDragChangedMarker = function () {
    return '<span class="tabledrag-changed glyphicon glyphicon-warning-sign text-warning"></span>';
  };

  Drupal.theme.tableDragChangedWarning = function () {
    return '<div class="tabledrag-changed-warning alert alert-warning messages warning">' + Drupal.theme('tableDragChangedMarker') + ' ' + Drupal.t('Changes made in this table will not be saved until the form is submitted.') + '</div>';
  };

})(jQuery, Drupal);
;
$(document).ready(function(){
// click vào nút update giỏ hàng khi thay đổi trường số lượng trong page /cart
$('form#uc-cart-view-form table.table > tbody  > tr .qty input').on('change keyup',function(){
	$('button#dedit-update').trigger( "click" );
});
   $('#sidr-0 ul.sidr-class-menu').prepend(
     	$('<li id="sidr-close-opt">').append(
    		$('<a class="sidr-close sidr-class-active">').attr('href','#').append('<i class="fa fa-times" aria-hidden="true"></i>'))
    );
  	if ( $("#sidr-close-opt").length ) {
     	$( "#sidr-close-opt" ).on("click", function() {
        	   $.sidr('close', 'sidr-0');
     	});
  	}
  	$(window).on("resize", function(event) {
     	if($('body').hasClass('sidr-open') && $(window).width() >= 768) {
        	   $.sidr('close', 'sidr-0');
     	}
  	});
  	if($(window).width() < 768){
		$('#block-views-exp-hieusach-page input').hide();
		$('.views-submit-button span.layer-submit img').on('click',function(){
		    $('#block-views-exp-hieusach-page input').toggle(500);
		});
	}
});;
  // tự động tính sell_price (content type product)
  /*$('.form-type-uc-price input#edit-cost').on('change keyup',function(){
    var phantram_km =  $('input#edit-field-product-khuyenmai-und-0-value').val();
    var cost = $(this).val();
    var sell_price = cost - (phantram_km * cost) / 100;
    $('.form-type-uc-price input#edit-sell-price').val(sell_price);
  });
  $('input#edit-field-product-khuyenmai-und-0-value').on('change keyup',function(){
    var phantram_km =  $(this).val();
    var cost = $('.form-type-uc-price input#edit-cost').val();
    var sell_price = cost - (phantram_km * cost) / 100;
    $('.form-type-uc-price input#edit-sell-price').val(sell_price);
  });*/

// Thiết lập đồng hồ đếm ngược (Flash sale)
var date_time= $('.flash-sale-countdown').attr('data-countdown');
var countDownDate = new Date(date_time).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Lấy thười gian hiện tại
  var now = new Date().getTime();

  // Tình khoảng cách giữa thời gian hiện tại và thời gian được đếm
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24 * 24)) / (1000 * 60 * 60));
  if(hours < 10){
    hours = '0' + hours;
  }
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  if(minutes < 10){
    minutes = '0' + minutes;
  }
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  if(seconds < 10){
    seconds = '0' + seconds;
  }


  $('.flash-sale-countdown-content').html("<span class='hour'>" + hours + " </span><span class='dots'> : </span><span class='minutes'> "
  + minutes + "</span><span class='dots'> : </span><span class='second'> " + seconds + "</span>");


  // Nếu đếm hết thời gian thì sẽ thực hiện điều kiện ở dưới
   if (distance < 0) {
        clearInterval(x);
        $('.flash-sale-countdown-title').text('Hết thời gian khuyến mãi');
        $('.flash-sale-countdown-content').text('');
   }
}, 1000);

// Sắp xếp lại menu flash sale
$('.flash-sale-breakcrumb span').sort(function(a,b) {
     return parseInt(a.dataset.sid) - parseInt(b.dataset.sid);
}).appendTo('.flash-sale-breakcrumb');

// Thêm class active cho breadcrumb page flashsale
$(function(){
    // Lấy toàn bộ đường dẫn bao gồm cả arguments
    var current = (location.pathname+location.search).substr(1);
    $('.flash-sale-breakcrumb > span').each(function(){
        var $this = $(this).find('a');
        // Kiểm tra đường dẫn của thẻ a nếu bằng đường dẫn hiện tại thì active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    })
})
// Remove Lazy load by npluong
$('#flexslider-1 img').each(function(){
      $(this).attr('src',$(this).attr('data-src'));
});
$('.tacgia_home_left img').each(function(){
      $(this).attr('src',$(this).attr('data-src'));
});
$('#popupsp img').each(function(){
      $(this).attr('src',$(this).attr('data-src'));
});
// ẩn hiện khuyễn mãi(referent) trong content type banner
$('div#edit-field-quangcao-khuyenmai').hide();

var defaultChecked = $('select#edit-field-quangcao-hienthi-und option:selected').val();
if(defaultChecked == 913 || defaultChecked == 914 || defaultChecked == 135){
    $('div#edit-field-quangcao-khuyenmai').show();
}
$('select#edit-field-quangcao-hienthi-und').on('click',function(){
	var flashSale   = $('select#edit-field-quangcao-hienthi-und option[value="913"]:selected').length;
	var landingPage = $('select#edit-field-quangcao-hienthi-und option[value="914"]:selected').length;
	var khuyenmai = $('select#edit-field-quangcao-hienthi-und option[value="135"]:selected').length;
    if(flashSale > 0 || landingPage > 0 || khuyenmai > 0){
        $('div#edit-field-quangcao-khuyenmai').show();
    }else{
        $('div#edit-field-quangcao-khuyenmai').hide();
    }
});

//resize images
// $(document).ready(function(){
// 	resize_images_banner();
//   	$(window).resize(function(){
//         resize_images_banner();
//     });
// });

// function resize_images_banner(){
// 	let total = 1920;
//     if(window.innerWidth <1920){
//         total = window.innerWidth;
//         $('.slider-home-group').css({"max-width":total,"margin":"auto -1em"});
//     }else{
//         $('.slider-home-group').css({"max-width":total,"margin":"auto"});
//     }
//     let left_right_width = total / 6;
//     let center_width = total - (left_right_width*2)
//     let left_right_height = total/6;
//     let center_height =left_right_height*2;
//     $('.slider-home-group-left').css('max-width',left_right_width);
//     $('.slider-home-group-right').css('max-width',left_right_width);
//     $('.slider-home-group-center').css('max-width',center_width);
//     $('.slider-home-group-left img').css('height',left_right_height);
//     $('.slider-home-group-right img').css('height',left_right_height);
//     $('.slider-home-group-center img').css('height',center_height);
// };
