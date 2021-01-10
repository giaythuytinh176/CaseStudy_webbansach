!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):"undefined"!=typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){"use strict";var b=window.Slick||{};b=function(){function c(c,d){var f,e=this;e.defaults={accessibility:!0,adaptiveHeight:!1,appendArrows:a(c),appendDots:a(c),arrows:!0,asNavFor:null,prevArrow:'<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">Previous</button>',nextArrow:'<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">Next</button>',autoplay:!1,autoplaySpeed:3e3,centerMode:!1,centerPadding:"50px",cssEase:"ease",customPaging:function(b,c){return a('<button type="button" data-role="none" role="button" tabindex="0" />').text(c+1)},dots:!1,dotsClass:"slick-dots",draggable:!0,easing:"linear",edgeFriction:.35,fade:!1,focusOnSelect:!1,infinite:!0,initialSlide:0,lazyLoad:"ondemand",mobileFirst:!1,pauseOnHover:!0,pauseOnFocus:!0,pauseOnDotsHover:!1,respondTo:"window",responsive:null,rows:1,rtl:!1,slide:"",slidesPerRow:1,slidesToShow:1,slidesToScroll:1,speed:500,swipe:!0,swipeToSlide:!1,touchMove:!0,touchThreshold:5,useCSS:!0,useTransform:!0,variableWidth:!1,vertical:!1,verticalSwiping:!1,waitForAnimate:!0,zIndex:1e3},e.initials={animating:!1,dragging:!1,autoPlayTimer:null,currentDirection:0,currentLeft:null,currentSlide:0,direction:1,$dots:null,listWidth:null,listHeight:null,loadIndex:0,$nextArrow:null,$prevArrow:null,slideCount:null,slideWidth:null,$slideTrack:null,$slides:null,sliding:!1,slideOffset:0,swipeLeft:null,$list:null,touchObject:{},transformsEnabled:!1,unslicked:!1},a.extend(e,e.initials),e.activeBreakpoint=null,e.animType=null,e.animProp=null,e.breakpoints=[],e.breakpointSettings=[],e.cssTransitions=!1,e.focussed=!1,e.interrupted=!1,e.hidden="hidden",e.paused=!0,e.positionProp=null,e.respondTo=null,e.rowCount=1,e.shouldClick=!0,e.$slider=a(c),e.$slidesCache=null,e.transformType=null,e.transitionType=null,e.visibilityChange="visibilitychange",e.windowWidth=0,e.windowTimer=null,f=a(c).data("slick")||{},e.options=a.extend({},e.defaults,d,f),e.currentSlide=e.options.initialSlide,e.originalSettings=e.options,"undefined"!=typeof document.mozHidden?(e.hidden="mozHidden",e.visibilityChange="mozvisibilitychange"):"undefined"!=typeof document.webkitHidden&&(e.hidden="webkitHidden",e.visibilityChange="webkitvisibilitychange"),e.autoPlay=a.proxy(e.autoPlay,e),e.autoPlayClear=a.proxy(e.autoPlayClear,e),e.autoPlayIterator=a.proxy(e.autoPlayIterator,e),e.changeSlide=a.proxy(e.changeSlide,e),e.clickHandler=a.proxy(e.clickHandler,e),e.selectHandler=a.proxy(e.selectHandler,e),e.setPosition=a.proxy(e.setPosition,e),e.swipeHandler=a.proxy(e.swipeHandler,e),e.dragHandler=a.proxy(e.dragHandler,e),e.keyHandler=a.proxy(e.keyHandler,e),e.instanceUid=b++,e.htmlExpr=/^(?:\s*(<[\w\W]+>)[^>]*)$/,e.registerBreakpoints(),e.init(!0)}var b=0;return c}(),b.prototype.activateADA=function(){var a=this;a.$slideTrack.find(".slick-active").attr({"aria-hidden":"false"}).find("a, input, button, select").attr({tabindex:"0"})},b.prototype.addSlide=b.prototype.slickAdd=function(b,c,d){var e=this;if("boolean"==typeof c)d=c,c=null;else if(0>c||c>=e.slideCount)return!1;e.unload(),"number"==typeof c?0===c&&0===e.$slides.length?a(b).appendTo(e.$slideTrack):d?a(b).insertBefore(e.$slides.eq(c)):a(b).insertAfter(e.$slides.eq(c)):d===!0?a(b).prependTo(e.$slideTrack):a(b).appendTo(e.$slideTrack),e.$slides=e.$slideTrack.children(this.options.slide),e.$slideTrack.children(this.options.slide).detach(),e.$slideTrack.append(e.$slides),e.$slides.each(function(b,c){a(c).attr("data-slick-index",b)}),e.$slidesCache=e.$slides,e.reinit()},b.prototype.animateHeight=function(){var a=this;if(1===a.options.slidesToShow&&a.options.adaptiveHeight===!0&&a.options.vertical===!1){var b=a.$slides.eq(a.currentSlide).outerHeight(!0);a.$list.animate({height:b},a.options.speed)}},b.prototype.animateSlide=function(b,c){var d={},e=this;e.animateHeight(),e.options.rtl===!0&&e.options.vertical===!1&&(b=-b),e.transformsEnabled===!1?e.options.vertical===!1?e.$slideTrack.animate({left:b},e.options.speed,e.options.easing,c):e.$slideTrack.animate({top:b},e.options.speed,e.options.easing,c):e.cssTransitions===!1?(e.options.rtl===!0&&(e.currentLeft=-e.currentLeft),a({animStart:e.currentLeft}).animate({animStart:b},{duration:e.options.speed,easing:e.options.easing,step:function(a){a=Math.ceil(a),e.options.vertical===!1?(d[e.animType]="translate("+a+"px, 0px)",e.$slideTrack.css(d)):(d[e.animType]="translate(0px,"+a+"px)",e.$slideTrack.css(d))},complete:function(){c&&c.call()}})):(e.applyTransition(),b=Math.ceil(b),e.options.vertical===!1?d[e.animType]="translate3d("+b+"px, 0px, 0px)":d[e.animType]="translate3d(0px,"+b+"px, 0px)",e.$slideTrack.css(d),c&&setTimeout(function(){e.disableTransition(),c.call()},e.options.speed))},b.prototype.getNavTarget=function(){var b=this,c=b.options.asNavFor;return c&&null!==c&&(c=a(c).not(b.$slider)),c},b.prototype.asNavFor=function(b){var c=this,d=c.getNavTarget();null!==d&&"object"==typeof d&&d.each(function(){var c=a(this).slick("getSlick");c.unslicked||c.slideHandler(b,!0)})},b.prototype.applyTransition=function(a){var b=this,c={};b.options.fade===!1?c[b.transitionType]=b.transformType+" "+b.options.speed+"ms "+b.options.cssEase:c[b.transitionType]="opacity "+b.options.speed+"ms "+b.options.cssEase,b.options.fade===!1?b.$slideTrack.css(c):b.$slides.eq(a).css(c)},b.prototype.autoPlay=function(){var a=this;a.autoPlayClear(),a.slideCount>a.options.slidesToShow&&(a.autoPlayTimer=setInterval(a.autoPlayIterator,a.options.autoplaySpeed))},b.prototype.autoPlayClear=function(){var a=this;a.autoPlayTimer&&clearInterval(a.autoPlayTimer)},b.prototype.autoPlayIterator=function(){var a=this,b=a.currentSlide+a.options.slidesToScroll;a.paused||a.interrupted||a.focussed||(a.options.infinite===!1&&(1===a.direction&&a.currentSlide+1===a.slideCount-1?a.direction=0:0===a.direction&&(b=a.currentSlide-a.options.slidesToScroll,a.currentSlide-1===0&&(a.direction=1))),a.slideHandler(b))},b.prototype.buildArrows=function(){var b=this;b.options.arrows===!0&&(b.$prevArrow=a(b.options.prevArrow).addClass("slick-arrow"),b.$nextArrow=a(b.options.nextArrow).addClass("slick-arrow"),b.slideCount>b.options.slidesToShow?(b.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),b.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),b.htmlExpr.test(b.options.prevArrow)&&b.$prevArrow.prependTo(b.options.appendArrows),b.htmlExpr.test(b.options.nextArrow)&&b.$nextArrow.appendTo(b.options.appendArrows),b.options.infinite!==!0&&b.$prevArrow.addClass("slick-disabled").attr("aria-disabled","true")):b.$prevArrow.add(b.$nextArrow).addClass("slick-hidden").attr({"aria-disabled":"true",tabindex:"-1"}))},b.prototype.buildDots=function(){var c,d,b=this;if(b.options.dots===!0&&b.slideCount>b.options.slidesToShow){for(b.$slider.addClass("slick-dotted"),d=a("<ul />").addClass(b.options.dotsClass),c=0;c<=b.getDotCount();c+=1)d.append(a("<li />").append(b.options.customPaging.call(this,b,c)));b.$dots=d.appendTo(b.options.appendDots),b.$dots.find("li").first().addClass("slick-active").attr("aria-hidden","false")}},b.prototype.buildOut=function(){var b=this;b.$slides=b.$slider.children(b.options.slide+":not(.slick-cloned)").addClass("slick-slide"),b.slideCount=b.$slides.length,b.$slides.each(function(b,c){a(c).attr("data-slick-index",b).data("originalStyling",a(c).attr("style")||"")}),b.$slider.addClass("slick-slider"),b.$slideTrack=0===b.slideCount?a('<div class="slick-track"/>').appendTo(b.$slider):b.$slides.wrapAll('<div class="slick-track"/>').parent(),b.$list=b.$slideTrack.wrap('<div aria-live="polite" class="slick-list"/>').parent(),b.$slideTrack.css("opacity",0),(b.options.centerMode===!0||b.options.swipeToSlide===!0)&&(b.options.slidesToScroll=1),a("img[data-lazy]",b.$slider).not("[src]").addClass("slick-loading"),b.setupInfinite(),b.buildArrows(),b.buildDots(),b.updateDots(),b.setSlideClasses("number"==typeof b.currentSlide?b.currentSlide:0),b.options.draggable===!0&&b.$list.addClass("draggable")},b.prototype.buildRows=function(){var b,c,d,e,f,g,h,a=this;if(e=document.createDocumentFragment(),g=a.$slider.children(),a.options.rows>1){for(h=a.options.slidesPerRow*a.options.rows,f=Math.ceil(g.length/h),b=0;f>b;b++){var i=document.createElement("div");for(c=0;c<a.options.rows;c++){var j=document.createElement("div");for(d=0;d<a.options.slidesPerRow;d++){var k=b*h+(c*a.options.slidesPerRow+d);g.get(k)&&j.appendChild(g.get(k))}i.appendChild(j)}e.appendChild(i)}a.$slider.empty().append(e),a.$slider.children().children().children().css({width:100/a.options.slidesPerRow+"%",display:"inline-block"})}},b.prototype.checkResponsive=function(b,c){var e,f,g,d=this,h=!1,i=d.$slider.width(),j=window.innerWidth||a(window).width();if("window"===d.respondTo?g=j:"slider"===d.respondTo?g=i:"min"===d.respondTo&&(g=Math.min(j,i)),d.options.responsive&&d.options.responsive.length&&null!==d.options.responsive){f=null;for(e in d.breakpoints)d.breakpoints.hasOwnProperty(e)&&(d.originalSettings.mobileFirst===!1?g<d.breakpoints[e]&&(f=d.breakpoints[e]):g>d.breakpoints[e]&&(f=d.breakpoints[e]));null!==f?null!==d.activeBreakpoint?(f!==d.activeBreakpoint||c)&&(d.activeBreakpoint=f,"unslick"===d.breakpointSettings[f]?d.unslick(f):(d.options=a.extend({},d.originalSettings,d.breakpointSettings[f]),b===!0&&(d.currentSlide=d.options.initialSlide),d.refresh(b)),h=f):(d.activeBreakpoint=f,"unslick"===d.breakpointSettings[f]?d.unslick(f):(d.options=a.extend({},d.originalSettings,d.breakpointSettings[f]),b===!0&&(d.currentSlide=d.options.initialSlide),d.refresh(b)),h=f):null!==d.activeBreakpoint&&(d.activeBreakpoint=null,d.options=d.originalSettings,b===!0&&(d.currentSlide=d.options.initialSlide),d.refresh(b),h=f),b||h===!1||d.$slider.trigger("breakpoint",[d,h])}},b.prototype.changeSlide=function(b,c){var f,g,h,d=this,e=a(b.currentTarget);switch(e.is("a")&&b.preventDefault(),e.is("li")||(e=e.closest("li")),h=d.slideCount%d.options.slidesToScroll!==0,f=h?0:(d.slideCount-d.currentSlide)%d.options.slidesToScroll,b.data.message){case"previous":g=0===f?d.options.slidesToScroll:d.options.slidesToShow-f,d.slideCount>d.options.slidesToShow&&d.slideHandler(d.currentSlide-g,!1,c);break;case"next":g=0===f?d.options.slidesToScroll:f,d.slideCount>d.options.slidesToShow&&d.slideHandler(d.currentSlide+g,!1,c);break;case"index":var i=0===b.data.index?0:b.data.index||e.index()*d.options.slidesToScroll;d.slideHandler(d.checkNavigable(i),!1,c),e.children().trigger("focus");break;default:return}},b.prototype.checkNavigable=function(a){var c,d,b=this;if(c=b.getNavigableIndexes(),d=0,a>c[c.length-1])a=c[c.length-1];else for(var e in c){if(a<c[e]){a=d;break}d=c[e]}return a},b.prototype.cleanUpEvents=function(){var b=this;b.options.dots&&null!==b.$dots&&a("li",b.$dots).off("click.slick",b.changeSlide).off("mouseenter.slick",a.proxy(b.interrupt,b,!0)).off("mouseleave.slick",a.proxy(b.interrupt,b,!1)),b.$slider.off("focus.slick blur.slick"),b.options.arrows===!0&&b.slideCount>b.options.slidesToShow&&(b.$prevArrow&&b.$prevArrow.off("click.slick",b.changeSlide),b.$nextArrow&&b.$nextArrow.off("click.slick",b.changeSlide)),b.$list.off("touchstart.slick mousedown.slick",b.swipeHandler),b.$list.off("touchmove.slick mousemove.slick",b.swipeHandler),b.$list.off("touchend.slick mouseup.slick",b.swipeHandler),b.$list.off("touchcancel.slick mouseleave.slick",b.swipeHandler),b.$list.off("click.slick",b.clickHandler),a(document).off(b.visibilityChange,b.visibility),b.cleanUpSlideEvents(),b.options.accessibility===!0&&b.$list.off("keydown.slick",b.keyHandler),b.options.focusOnSelect===!0&&a(b.$slideTrack).children().off("click.slick",b.selectHandler),a(window).off("orientationchange.slick.slick-"+b.instanceUid,b.orientationChange),a(window).off("resize.slick.slick-"+b.instanceUid,b.resize),a("[draggable!=true]",b.$slideTrack).off("dragstart",b.preventDefault),a(window).off("load.slick.slick-"+b.instanceUid,b.setPosition),a(document).off("ready.slick.slick-"+b.instanceUid,b.setPosition)},b.prototype.cleanUpSlideEvents=function(){var b=this;b.$list.off("mouseenter.slick",a.proxy(b.interrupt,b,!0)),b.$list.off("mouseleave.slick",a.proxy(b.interrupt,b,!1))},b.prototype.cleanUpRows=function(){var b,a=this;a.options.rows>1&&(b=a.$slides.children().children(),b.removeAttr("style"),a.$slider.empty().append(b))},b.prototype.clickHandler=function(a){var b=this;b.shouldClick===!1&&(a.stopImmediatePropagation(),a.stopPropagation(),a.preventDefault())},b.prototype.destroy=function(b){var c=this;c.autoPlayClear(),c.touchObject={},c.cleanUpEvents(),a(".slick-cloned",c.$slider).detach(),c.$dots&&c.$dots.remove(),c.$prevArrow&&c.$prevArrow.length&&(c.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display",""),c.htmlExpr.test(c.options.prevArrow)&&c.$prevArrow.remove()),c.$nextArrow&&c.$nextArrow.length&&(c.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display",""),c.htmlExpr.test(c.options.nextArrow)&&c.$nextArrow.remove()),c.$slides&&(c.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function(){a(this).attr("style",a(this).data("originalStyling"))}),c.$slideTrack.children(this.options.slide).detach(),c.$slideTrack.detach(),c.$list.detach(),c.$slider.append(c.$slides)),c.cleanUpRows(),c.$slider.removeClass("slick-slider"),c.$slider.removeClass("slick-initialized"),c.$slider.removeClass("slick-dotted"),c.unslicked=!0,b||c.$slider.trigger("destroy",[c])},b.prototype.disableTransition=function(a){var b=this,c={};c[b.transitionType]="",b.options.fade===!1?b.$slideTrack.css(c):b.$slides.eq(a).css(c)},b.prototype.fadeSlide=function(a,b){var c=this;c.cssTransitions===!1?(c.$slides.eq(a).css({zIndex:c.options.zIndex}),c.$slides.eq(a).animate({opacity:1},c.options.speed,c.options.easing,b)):(c.applyTransition(a),c.$slides.eq(a).css({opacity:1,zIndex:c.options.zIndex}),b&&setTimeout(function(){c.disableTransition(a),b.call()},c.options.speed))},b.prototype.fadeSlideOut=function(a){var b=this;b.cssTransitions===!1?b.$slides.eq(a).animate({opacity:0,zIndex:b.options.zIndex-2},b.options.speed,b.options.easing):(b.applyTransition(a),b.$slides.eq(a).css({opacity:0,zIndex:b.options.zIndex-2}))},b.prototype.filterSlides=b.prototype.slickFilter=function(a){var b=this;null!==a&&(b.$slidesCache=b.$slides,b.unload(),b.$slideTrack.children(this.options.slide).detach(),b.$slidesCache.filter(a).appendTo(b.$slideTrack),b.reinit())},b.prototype.focusHandler=function(){var b=this;b.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick","*:not(.slick-arrow)",function(c){c.stopImmediatePropagation();var d=a(this);setTimeout(function(){b.options.pauseOnFocus&&(b.focussed=d.is(":focus"),b.autoPlay())},0)})},b.prototype.getCurrent=b.prototype.slickCurrentSlide=function(){var a=this;return a.currentSlide},b.prototype.getDotCount=function(){var a=this,b=0,c=0,d=0;if(a.options.infinite===!0)for(;b<a.slideCount;)++d,b=c+a.options.slidesToScroll,c+=a.options.slidesToScroll<=a.options.slidesToShow?a.options.slidesToScroll:a.options.slidesToShow;else if(a.options.centerMode===!0)d=a.slideCount;else if(a.options.asNavFor)for(;b<a.slideCount;)++d,b=c+a.options.slidesToScroll,c+=a.options.slidesToScroll<=a.options.slidesToShow?a.options.slidesToScroll:a.options.slidesToShow;else d=1+Math.ceil((a.slideCount-a.options.slidesToShow)/a.options.slidesToScroll);return d-1},b.prototype.getLeft=function(a){var c,d,f,b=this,e=0;return b.slideOffset=0,d=b.$slides.first().outerHeight(!0),b.options.infinite===!0?(b.slideCount>b.options.slidesToShow&&(b.slideOffset=b.slideWidth*b.options.slidesToShow*-1,e=d*b.options.slidesToShow*-1),b.slideCount%b.options.slidesToScroll!==0&&a+b.options.slidesToScroll>b.slideCount&&b.slideCount>b.options.slidesToShow&&(a>b.slideCount?(b.slideOffset=(b.options.slidesToShow-(a-b.slideCount))*b.slideWidth*-1,e=(b.options.slidesToShow-(a-b.slideCount))*d*-1):(b.slideOffset=b.slideCount%b.options.slidesToScroll*b.slideWidth*-1,e=b.slideCount%b.options.slidesToScroll*d*-1))):a+b.options.slidesToShow>b.slideCount&&(b.slideOffset=(a+b.options.slidesToShow-b.slideCount)*b.slideWidth,e=(a+b.options.slidesToShow-b.slideCount)*d),b.slideCount<=b.options.slidesToShow&&(b.slideOffset=0,e=0),b.options.centerMode===!0&&b.options.infinite===!0?b.slideOffset+=b.slideWidth*Math.floor(b.options.slidesToShow/2)-b.slideWidth:b.options.centerMode===!0&&(b.slideOffset=0,b.slideOffset+=b.slideWidth*Math.floor(b.options.slidesToShow/2)),c=b.options.vertical===!1?a*b.slideWidth*-1+b.slideOffset:a*d*-1+e,b.options.variableWidth===!0&&(f=b.slideCount<=b.options.slidesToShow||b.options.infinite===!1?b.$slideTrack.children(".slick-slide").eq(a):b.$slideTrack.children(".slick-slide").eq(a+b.options.slidesToShow),c=b.options.rtl===!0?f[0]?-1*(b.$slideTrack.width()-f[0].offsetLeft-f.width()):0:f[0]?-1*f[0].offsetLeft:0,b.options.centerMode===!0&&(f=b.slideCount<=b.options.slidesToShow||b.options.infinite===!1?b.$slideTrack.children(".slick-slide").eq(a):b.$slideTrack.children(".slick-slide").eq(a+b.options.slidesToShow+1),c=b.options.rtl===!0?f[0]?-1*(b.$slideTrack.width()-f[0].offsetLeft-f.width()):0:f[0]?-1*f[0].offsetLeft:0,c+=(b.$list.width()-f.outerWidth())/2)),c},b.prototype.getOption=b.prototype.slickGetOption=function(a){var b=this;return b.options[a]},b.prototype.getNavigableIndexes=function(){var e,a=this,b=0,c=0,d=[];for(a.options.infinite===!1?e=a.slideCount:(b=-1*a.options.slidesToScroll,c=-1*a.options.slidesToScroll,e=2*a.slideCount);e>b;)d.push(b),b=c+a.options.slidesToScroll,c+=a.options.slidesToScroll<=a.options.slidesToShow?a.options.slidesToScroll:a.options.slidesToShow;return d},b.prototype.getSlick=function(){return this},b.prototype.getSlideCount=function(){var c,d,e,b=this;return e=b.options.centerMode===!0?b.slideWidth*Math.floor(b.options.slidesToShow/2):0,b.options.swipeToSlide===!0?(b.$slideTrack.find(".slick-slide").each(function(c,f){return f.offsetLeft-e+a(f).outerWidth()/2>-1*b.swipeLeft?(d=f,!1):void 0}),c=Math.abs(a(d).attr("data-slick-index")-b.currentSlide)||1):b.options.slidesToScroll},b.prototype.goTo=b.prototype.slickGoTo=function(a,b){var c=this;c.changeSlide({data:{message:"index",index:parseInt(a)}},b)},b.prototype.init=function(b){var c=this;a(c.$slider).hasClass("slick-initialized")||(a(c.$slider).addClass("slick-initialized"),c.buildRows(),c.buildOut(),c.setProps(),c.startLoad(),c.loadSlider(),c.initializeEvents(),c.updateArrows(),c.updateDots(),c.checkResponsive(!0),c.focusHandler()),b&&c.$slider.trigger("init",[c]),c.options.accessibility===!0&&c.initADA(),c.options.autoplay&&(c.paused=!1,c.autoPlay())},b.prototype.initADA=function(){var b=this;b.$slides.add(b.$slideTrack.find(".slick-cloned")).attr({"aria-hidden":"true",tabindex:"-1"}).find("a, input, button, select").attr({tabindex:"-1"}),b.$slideTrack.attr("role","listbox"),b.$slides.not(b.$slideTrack.find(".slick-cloned")).each(function(c){a(this).attr({role:"option","aria-describedby":"slick-slide"+b.instanceUid+c})}),null!==b.$dots&&b.$dots.attr("role","tablist").find("li").each(function(c){a(this).attr({role:"presentation","aria-selected":"false","aria-controls":"navigation"+b.instanceUid+c,id:"slick-slide"+b.instanceUid+c})}).first().attr("aria-selected","true").end().find("button").attr("role","button").end().closest("div").attr("role","toolbar"),b.activateADA()},b.prototype.initArrowEvents=function(){var a=this;a.options.arrows===!0&&a.slideCount>a.options.slidesToShow&&(a.$prevArrow.off("click.slick").on("click.slick",{message:"previous"},a.changeSlide),a.$nextArrow.off("click.slick").on("click.slick",{message:"next"},a.changeSlide))},b.prototype.initDotEvents=function(){var b=this;b.options.dots===!0&&b.slideCount>b.options.slidesToShow&&a("li",b.$dots).on("click.slick",{message:"index"},b.changeSlide),b.options.dots===!0&&b.options.pauseOnDotsHover===!0&&a("li",b.$dots).on("mouseenter.slick",a.proxy(b.interrupt,b,!0)).on("mouseleave.slick",a.proxy(b.interrupt,b,!1))},b.prototype.initSlideEvents=function(){var b=this;b.options.pauseOnHover&&(b.$list.on("mouseenter.slick",a.proxy(b.interrupt,b,!0)),b.$list.on("mouseleave.slick",a.proxy(b.interrupt,b,!1)))},b.prototype.initializeEvents=function(){var b=this;b.initArrowEvents(),b.initDotEvents(),b.initSlideEvents(),b.$list.on("touchstart.slick mousedown.slick",{action:"start"},b.swipeHandler),b.$list.on("touchmove.slick mousemove.slick",{action:"move"},b.swipeHandler),b.$list.on("touchend.slick mouseup.slick",{action:"end"},b.swipeHandler),b.$list.on("touchcancel.slick mouseleave.slick",{action:"end"},b.swipeHandler),b.$list.on("click.slick",b.clickHandler),a(document).on(b.visibilityChange,a.proxy(b.visibility,b)),b.options.accessibility===!0&&b.$list.on("keydown.slick",b.keyHandler),b.options.focusOnSelect===!0&&a(b.$slideTrack).children().on("click.slick",b.selectHandler),a(window).on("orientationchange.slick.slick-"+b.instanceUid,a.proxy(b.orientationChange,b)),a(window).on("resize.slick.slick-"+b.instanceUid,a.proxy(b.resize,b)),a("[draggable!=true]",b.$slideTrack).on("dragstart",b.preventDefault),a(window).on("load.slick.slick-"+b.instanceUid,b.setPosition),a(document).on("ready.slick.slick-"+b.instanceUid,b.setPosition)},b.prototype.initUI=function(){var a=this;a.options.arrows===!0&&a.slideCount>a.options.slidesToShow&&(a.$prevArrow.show(),a.$nextArrow.show()),a.options.dots===!0&&a.slideCount>a.options.slidesToShow&&a.$dots.show()},b.prototype.keyHandler=function(a){var b=this;a.target.tagName.match("TEXTAREA|INPUT|SELECT")||(37===a.keyCode&&b.options.accessibility===!0?b.changeSlide({data:{message:b.options.rtl===!0?"next":"previous"}}):39===a.keyCode&&b.options.accessibility===!0&&b.changeSlide({data:{message:b.options.rtl===!0?"previous":"next"}}))},b.prototype.lazyLoad=function(){function g(c){a("img[data-lazy]",c).each(function(){var c=a(this),d=a(this).attr("data-lazy"),e=document.createElement("img");e.onload=function(){c.animate({opacity:0},100,function(){c.attr("src",d).animate({opacity:1},200,function(){c.removeAttr("data-lazy").removeClass("slick-loading")}),b.$slider.trigger("lazyLoaded",[b,c,d])})},e.onerror=function(){c.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"),b.$slider.trigger("lazyLoadError",[b,c,d])},e.src=d})}var c,d,e,f,b=this;b.options.centerMode===!0?b.options.infinite===!0?(e=b.currentSlide+(b.options.slidesToShow/2+1),f=e+b.options.slidesToShow+2):(e=Math.max(0,b.currentSlide-(b.options.slidesToShow/2+1)),f=2+(b.options.slidesToShow/2+1)+b.currentSlide):(e=b.options.infinite?b.options.slidesToShow+b.currentSlide:b.currentSlide,f=Math.ceil(e+b.options.slidesToShow),b.options.fade===!0&&(e>0&&e--,f<=b.slideCount&&f++)),c=b.$slider.find(".slick-slide").slice(e,f),g(c),b.slideCount<=b.options.slidesToShow?(d=b.$slider.find(".slick-slide"),g(d)):b.currentSlide>=b.slideCount-b.options.slidesToShow?(d=b.$slider.find(".slick-cloned").slice(0,b.options.slidesToShow),g(d)):0===b.currentSlide&&(d=b.$slider.find(".slick-cloned").slice(-1*b.options.slidesToShow),g(d))},b.prototype.loadSlider=function(){var a=this;a.setPosition(),a.$slideTrack.css({opacity:1}),a.$slider.removeClass("slick-loading"),a.initUI(),"progressive"===a.options.lazyLoad&&a.progressiveLazyLoad()},b.prototype.next=b.prototype.slickNext=function(){var a=this;a.changeSlide({data:{message:"next"}})},b.prototype.orientationChange=function(){var a=this;a.checkResponsive(),a.setPosition()},b.prototype.pause=b.prototype.slickPause=function(){var a=this;a.autoPlayClear(),a.paused=!0},b.prototype.play=b.prototype.slickPlay=function(){var a=this;a.autoPlay(),a.options.autoplay=!0,a.paused=!1,a.focussed=!1,a.interrupted=!1},b.prototype.postSlide=function(a){var b=this;b.unslicked||(b.$slider.trigger("afterChange",[b,a]),b.animating=!1,b.setPosition(),b.swipeLeft=null,b.options.autoplay&&b.autoPlay(),b.options.accessibility===!0&&b.initADA())},b.prototype.prev=b.prototype.slickPrev=function(){var a=this;a.changeSlide({data:{message:"previous"}})},b.prototype.preventDefault=function(a){a.preventDefault()},b.prototype.progressiveLazyLoad=function(b){b=b||1;var e,f,g,c=this,d=a("img[data-lazy]",c.$slider);d.length?(e=d.first(),f=e.attr("data-lazy"),g=document.createElement("img"),g.onload=function(){e.attr("src",f).removeAttr("data-lazy").removeClass("slick-loading"),c.options.adaptiveHeight===!0&&c.setPosition(),c.$slider.trigger("lazyLoaded",[c,e,f]),c.progressiveLazyLoad()},g.onerror=function(){3>b?setTimeout(function(){c.progressiveLazyLoad(b+1)},500):(e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"),c.$slider.trigger("lazyLoadError",[c,e,f]),c.progressiveLazyLoad())},g.src=f):c.$slider.trigger("allImagesLoaded",[c])},b.prototype.refresh=function(b){var d,e,c=this;e=c.slideCount-c.options.slidesToShow,!c.options.infinite&&c.currentSlide>e&&(c.currentSlide=e),c.slideCount<=c.options.slidesToShow&&(c.currentSlide=0),d=c.currentSlide,c.destroy(!0),a.extend(c,c.initials,{currentSlide:d}),c.init(),b||c.changeSlide({data:{message:"index",index:d}},!1)},b.prototype.registerBreakpoints=function(){var c,d,e,b=this,f=b.options.responsive||null;if("array"===a.type(f)&&f.length){b.respondTo=b.options.respondTo||"window";for(c in f)if(e=b.breakpoints.length-1,d=f[c].breakpoint,f.hasOwnProperty(c)){for(;e>=0;)b.breakpoints[e]&&b.breakpoints[e]===d&&b.breakpoints.splice(e,1),e--;b.breakpoints.push(d),b.breakpointSettings[d]=f[c].settings}b.breakpoints.sort(function(a,c){return b.options.mobileFirst?a-c:c-a})}},b.prototype.reinit=function(){var b=this;b.$slides=b.$slideTrack.children(b.options.slide).addClass("slick-slide"),b.slideCount=b.$slides.length,b.currentSlide>=b.slideCount&&0!==b.currentSlide&&(b.currentSlide=b.currentSlide-b.options.slidesToScroll),b.slideCount<=b.options.slidesToShow&&(b.currentSlide=0),b.registerBreakpoints(),b.setProps(),b.setupInfinite(),b.buildArrows(),b.updateArrows(),b.initArrowEvents(),b.buildDots(),b.updateDots(),b.initDotEvents(),b.cleanUpSlideEvents(),b.initSlideEvents(),b.checkResponsive(!1,!0),b.options.focusOnSelect===!0&&a(b.$slideTrack).children().on("click.slick",b.selectHandler),b.setSlideClasses("number"==typeof b.currentSlide?b.currentSlide:0),b.setPosition(),b.focusHandler(),b.paused=!b.options.autoplay,b.autoPlay(),b.$slider.trigger("reInit",[b])},b.prototype.resize=function(){var b=this;a(window).width()!==b.windowWidth&&(clearTimeout(b.windowDelay),b.windowDelay=window.setTimeout(function(){b.windowWidth=a(window).width(),b.checkResponsive(),b.unslicked||b.setPosition()},50))},b.prototype.removeSlide=b.prototype.slickRemove=function(a,b,c){var d=this;return"boolean"==typeof a?(b=a,a=b===!0?0:d.slideCount-1):a=b===!0?--a:a,d.slideCount<1||0>a||a>d.slideCount-1?!1:(d.unload(),c===!0?d.$slideTrack.children().remove():d.$slideTrack.children(this.options.slide).eq(a).remove(),d.$slides=d.$slideTrack.children(this.options.slide),d.$slideTrack.children(this.options.slide).detach(),d.$slideTrack.append(d.$slides),d.$slidesCache=d.$slides,void d.reinit())},b.prototype.setCSS=function(a){var d,e,b=this,c={};b.options.rtl===!0&&(a=-a),d="left"==b.positionProp?Math.ceil(a)+"px":"0px",e="top"==b.positionProp?Math.ceil(a)+"px":"0px",c[b.positionProp]=a,b.transformsEnabled===!1?b.$slideTrack.css(c):(c={},b.cssTransitions===!1?(c[b.animType]="translate("+d+", "+e+")",b.$slideTrack.css(c)):(c[b.animType]="translate3d("+d+", "+e+", 0px)",b.$slideTrack.css(c)))},b.prototype.setDimensions=function(){var a=this;a.options.vertical===!1?a.options.centerMode===!0&&a.$list.css({padding:"0px "+a.options.centerPadding}):(a.$list.height(a.$slides.first().outerHeight(!0)*a.options.slidesToShow),a.options.centerMode===!0&&a.$list.css({padding:a.options.centerPadding+" 0px"})),a.listWidth=a.$list.width(),a.listHeight=a.$list.height(),a.options.vertical===!1&&a.options.variableWidth===!1?(a.slideWidth=Math.ceil(a.listWidth/a.options.slidesToShow),a.$slideTrack.width(Math.ceil(a.slideWidth*a.$slideTrack.children(".slick-slide").length))):a.options.variableWidth===!0?a.$slideTrack.width(5e3*a.slideCount):(a.slideWidth=Math.ceil(a.listWidth),a.$slideTrack.height(Math.ceil(a.$slides.first().outerHeight(!0)*a.$slideTrack.children(".slick-slide").length)));var b=a.$slides.first().outerWidth(!0)-a.$slides.first().width();a.options.variableWidth===!1&&a.$slideTrack.children(".slick-slide").width(a.slideWidth-b)},b.prototype.setFade=function(){var c,b=this;b.$slides.each(function(d,e){c=b.slideWidth*d*-1,b.options.rtl===!0?a(e).css({position:"relative",right:c,top:0,zIndex:b.options.zIndex-2,opacity:0}):a(e).css({position:"relative",left:c,top:0,zIndex:b.options.zIndex-2,opacity:0})}),b.$slides.eq(b.currentSlide).css({zIndex:b.options.zIndex-1,opacity:1})},b.prototype.setHeight=function(){var a=this;if(1===a.options.slidesToShow&&a.options.adaptiveHeight===!0&&a.options.vertical===!1){var b=a.$slides.eq(a.currentSlide).outerHeight(!0);a.$list.css("height",b)}},b.prototype.setOption=b.prototype.slickSetOption=function(){var c,d,e,f,h,b=this,g=!1;if("object"===a.type(arguments[0])?(e=arguments[0],g=arguments[1],h="multiple"):"string"===a.type(arguments[0])&&(e=arguments[0],f=arguments[1],g=arguments[2],"responsive"===arguments[0]&&"array"===a.type(arguments[1])?h="responsive":"undefined"!=typeof arguments[1]&&(h="single")),"single"===h)b.options[e]=f;else if("multiple"===h)a.each(e,function(a,c){b.options[a]=c});else if("responsive"===h)for(d in f)if("array"!==a.type(b.options.responsive))b.options.responsive=[f[d]];else{for(c=b.options.responsive.length-1;c>=0;)b.options.responsive[c].breakpoint===f[d].breakpoint&&b.options.responsive.splice(c,1),c--;b.options.responsive.push(f[d])}g&&(b.unload(),b.reinit())},b.prototype.setPosition=function(){var a=this;a.setDimensions(),a.setHeight(),a.options.fade===!1?a.setCSS(a.getLeft(a.currentSlide)):a.setFade(),a.$slider.trigger("setPosition",[a])},b.prototype.setProps=function(){var a=this,b=document.body.style;a.positionProp=a.options.vertical===!0?"top":"left","top"===a.positionProp?a.$slider.addClass("slick-vertical"):a.$slider.removeClass("slick-vertical"),(void 0!==b.WebkitTransition||void 0!==b.MozTransition||void 0!==b.msTransition)&&a.options.useCSS===!0&&(a.cssTransitions=!0),a.options.fade&&("number"==typeof a.options.zIndex?a.options.zIndex<3&&(a.options.zIndex=3):a.options.zIndex=a.defaults.zIndex),void 0!==b.OTransform&&(a.animType="OTransform",a.transformType="-o-transform",a.transitionType="OTransition",void 0===b.perspectiveProperty&&void 0===b.webkitPerspective&&(a.animType=!1)),void 0!==b.MozTransform&&(a.animType="MozTransform",a.transformType="-moz-transform",a.transitionType="MozTransition",void 0===b.perspectiveProperty&&void 0===b.MozPerspective&&(a.animType=!1)),void 0!==b.webkitTransform&&(a.animType="webkitTransform",a.transformType="-webkit-transform",a.transitionType="webkitTransition",void 0===b.perspectiveProperty&&void 0===b.webkitPerspective&&(a.animType=!1)),void 0!==b.msTransform&&(a.animType="msTransform",a.transformType="-ms-transform",a.transitionType="msTransition",void 0===b.msTransform&&(a.animType=!1)),void 0!==b.transform&&a.animType!==!1&&(a.animType="transform",a.transformType="transform",a.transitionType="transition"),a.transformsEnabled=a.options.useTransform&&null!==a.animType&&a.animType!==!1},b.prototype.setSlideClasses=function(a){var c,d,e,f,b=this;d=b.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden","true"),b.$slides.eq(a).addClass("slick-current"),b.options.centerMode===!0?(c=Math.floor(b.options.slidesToShow/2),b.options.infinite===!0&&(a>=c&&a<=b.slideCount-1-c?b.$slides.slice(a-c,a+c+1).addClass("slick-active").attr("aria-hidden","false"):(e=b.options.slidesToShow+a,
  d.slice(e-c+1,e+c+2).addClass("slick-active").attr("aria-hidden","false")),0===a?d.eq(d.length-1-b.options.slidesToShow).addClass("slick-center"):a===b.slideCount-1&&d.eq(b.options.slidesToShow).addClass("slick-center")),b.$slides.eq(a).addClass("slick-center")):a>=0&&a<=b.slideCount-b.options.slidesToShow?b.$slides.slice(a,a+b.options.slidesToShow).addClass("slick-active").attr("aria-hidden","false"):d.length<=b.options.slidesToShow?d.addClass("slick-active").attr("aria-hidden","false"):(f=b.slideCount%b.options.slidesToShow,e=b.options.infinite===!0?b.options.slidesToShow+a:a,b.options.slidesToShow==b.options.slidesToScroll&&b.slideCount-a<b.options.slidesToShow?d.slice(e-(b.options.slidesToShow-f),e+f).addClass("slick-active").attr("aria-hidden","false"):d.slice(e,e+b.options.slidesToShow).addClass("slick-active").attr("aria-hidden","false")),"ondemand"===b.options.lazyLoad&&b.lazyLoad()},b.prototype.setupInfinite=function(){var c,d,e,b=this;if(b.options.fade===!0&&(b.options.centerMode=!1),b.options.infinite===!0&&b.options.fade===!1&&(d=null,b.slideCount>b.options.slidesToShow)){for(e=b.options.centerMode===!0?b.options.slidesToShow+1:b.options.slidesToShow,c=b.slideCount;c>b.slideCount-e;c-=1)d=c-1,a(b.$slides[d]).clone(!0).attr("id","").attr("data-slick-index",d-b.slideCount).prependTo(b.$slideTrack).addClass("slick-cloned");for(c=0;e>c;c+=1)d=c,a(b.$slides[d]).clone(!0).attr("id","").attr("data-slick-index",d+b.slideCount).appendTo(b.$slideTrack).addClass("slick-cloned");b.$slideTrack.find(".slick-cloned").find("[id]").each(function(){a(this).attr("id","")})}},b.prototype.interrupt=function(a){var b=this;a||b.autoPlay(),b.interrupted=a},b.prototype.selectHandler=function(b){var c=this,d=a(b.target).is(".slick-slide")?a(b.target):a(b.target).parents(".slick-slide"),e=parseInt(d.attr("data-slick-index"));return e||(e=0),c.slideCount<=c.options.slidesToShow?(c.setSlideClasses(e),void c.asNavFor(e)):void c.slideHandler(e)},b.prototype.slideHandler=function(a,b,c){var d,e,f,g,j,h=null,i=this;return b=b||!1,i.animating===!0&&i.options.waitForAnimate===!0||i.options.fade===!0&&i.currentSlide===a||i.slideCount<=i.options.slidesToShow?void 0:(b===!1&&i.asNavFor(a),d=a,h=i.getLeft(d),g=i.getLeft(i.currentSlide),i.currentLeft=null===i.swipeLeft?g:i.swipeLeft,i.options.infinite===!1&&i.options.centerMode===!1&&(0>a||a>i.getDotCount()*i.options.slidesToScroll)?void(i.options.fade===!1&&(d=i.currentSlide,c!==!0?i.animateSlide(g,function(){i.postSlide(d)}):i.postSlide(d))):i.options.infinite===!1&&i.options.centerMode===!0&&(0>a||a>i.slideCount-i.options.slidesToScroll)?void(i.options.fade===!1&&(d=i.currentSlide,c!==!0?i.animateSlide(g,function(){i.postSlide(d)}):i.postSlide(d))):(i.options.autoplay&&clearInterval(i.autoPlayTimer),e=0>d?i.slideCount%i.options.slidesToScroll!==0?i.slideCount-i.slideCount%i.options.slidesToScroll:i.slideCount+d:d>=i.slideCount?i.slideCount%i.options.slidesToScroll!==0?0:d-i.slideCount:d,i.animating=!0,i.$slider.trigger("beforeChange",[i,i.currentSlide,e]),f=i.currentSlide,i.currentSlide=e,i.setSlideClasses(i.currentSlide),i.options.asNavFor&&(j=i.getNavTarget(),j=j.slick("getSlick"),j.slideCount<=j.options.slidesToShow&&j.setSlideClasses(i.currentSlide)),i.updateDots(),i.updateArrows(),i.options.fade===!0?(c!==!0?(i.fadeSlideOut(f),i.fadeSlide(e,function(){i.postSlide(e)})):i.postSlide(e),void i.animateHeight()):void(c!==!0?i.animateSlide(h,function(){i.postSlide(e)}):i.postSlide(e))))},b.prototype.startLoad=function(){var a=this;a.options.arrows===!0&&a.slideCount>a.options.slidesToShow&&(a.$prevArrow.hide(),a.$nextArrow.hide()),a.options.dots===!0&&a.slideCount>a.options.slidesToShow&&a.$dots.hide(),a.$slider.addClass("slick-loading")},b.prototype.swipeDirection=function(){var a,b,c,d,e=this;return a=e.touchObject.startX-e.touchObject.curX,b=e.touchObject.startY-e.touchObject.curY,c=Math.atan2(b,a),d=Math.round(180*c/Math.PI),0>d&&(d=360-Math.abs(d)),45>=d&&d>=0?e.options.rtl===!1?"left":"right":360>=d&&d>=315?e.options.rtl===!1?"left":"right":d>=135&&225>=d?e.options.rtl===!1?"right":"left":e.options.verticalSwiping===!0?d>=35&&135>=d?"down":"up":"vertical"},b.prototype.swipeEnd=function(a){var c,d,b=this;if(b.dragging=!1,b.interrupted=!1,b.shouldClick=b.touchObject.swipeLength>10?!1:!0,void 0===b.touchObject.curX)return!1;if(b.touchObject.edgeHit===!0&&b.$slider.trigger("edge",[b,b.swipeDirection()]),b.touchObject.swipeLength>=b.touchObject.minSwipe){switch(d=b.swipeDirection()){case"left":case"down":c=b.options.swipeToSlide?b.checkNavigable(b.currentSlide+b.getSlideCount()):b.currentSlide+b.getSlideCount(),b.currentDirection=0;break;case"right":case"up":c=b.options.swipeToSlide?b.checkNavigable(b.currentSlide-b.getSlideCount()):b.currentSlide-b.getSlideCount(),b.currentDirection=1}"vertical"!=d&&(b.slideHandler(c),b.touchObject={},b.$slider.trigger("swipe",[b,d]))}else b.touchObject.startX!==b.touchObject.curX&&(b.slideHandler(b.currentSlide),b.touchObject={})},b.prototype.swipeHandler=function(a){var b=this;if(!(b.options.swipe===!1||"ontouchend"in document&&b.options.swipe===!1||b.options.draggable===!1&&-1!==a.type.indexOf("mouse")))switch(b.touchObject.fingerCount=a.originalEvent&&void 0!==a.originalEvent.touches?a.originalEvent.touches.length:1,b.touchObject.minSwipe=b.listWidth/b.options.touchThreshold,b.options.verticalSwiping===!0&&(b.touchObject.minSwipe=b.listHeight/b.options.touchThreshold),a.data.action){case"start":b.swipeStart(a);break;case"move":b.swipeMove(a);break;case"end":b.swipeEnd(a)}},b.prototype.swipeMove=function(a){var d,e,f,g,h,b=this;return h=void 0!==a.originalEvent?a.originalEvent.touches:null,!b.dragging||h&&1!==h.length?!1:(d=b.getLeft(b.currentSlide),b.touchObject.curX=void 0!==h?h[0].pageX:a.clientX,b.touchObject.curY=void 0!==h?h[0].pageY:a.clientY,b.touchObject.swipeLength=Math.round(Math.sqrt(Math.pow(b.touchObject.curX-b.touchObject.startX,2))),b.options.verticalSwiping===!0&&(b.touchObject.swipeLength=Math.round(Math.sqrt(Math.pow(b.touchObject.curY-b.touchObject.startY,2)))),e=b.swipeDirection(),"vertical"!==e?(void 0!==a.originalEvent&&b.touchObject.swipeLength>4&&a.preventDefault(),g=(b.options.rtl===!1?1:-1)*(b.touchObject.curX>b.touchObject.startX?1:-1),b.options.verticalSwiping===!0&&(g=b.touchObject.curY>b.touchObject.startY?1:-1),f=b.touchObject.swipeLength,b.touchObject.edgeHit=!1,b.options.infinite===!1&&(0===b.currentSlide&&"right"===e||b.currentSlide>=b.getDotCount()&&"left"===e)&&(f=b.touchObject.swipeLength*b.options.edgeFriction,b.touchObject.edgeHit=!0),b.options.vertical===!1?b.swipeLeft=d+f*g:b.swipeLeft=d+f*(b.$list.height()/b.listWidth)*g,b.options.verticalSwiping===!0&&(b.swipeLeft=d+f*g),b.options.fade===!0||b.options.touchMove===!1?!1:b.animating===!0?(b.swipeLeft=null,!1):void b.setCSS(b.swipeLeft)):void 0)},b.prototype.swipeStart=function(a){var c,b=this;return b.interrupted=!0,1!==b.touchObject.fingerCount||b.slideCount<=b.options.slidesToShow?(b.touchObject={},!1):(void 0!==a.originalEvent&&void 0!==a.originalEvent.touches&&(c=a.originalEvent.touches[0]),b.touchObject.startX=b.touchObject.curX=void 0!==c?c.pageX:a.clientX,b.touchObject.startY=b.touchObject.curY=void 0!==c?c.pageY:a.clientY,void(b.dragging=!0))},b.prototype.unfilterSlides=b.prototype.slickUnfilter=function(){var a=this;null!==a.$slidesCache&&(a.unload(),a.$slideTrack.children(this.options.slide).detach(),a.$slidesCache.appendTo(a.$slideTrack),a.reinit())},b.prototype.unload=function(){var b=this;a(".slick-cloned",b.$slider).remove(),b.$dots&&b.$dots.remove(),b.$prevArrow&&b.htmlExpr.test(b.options.prevArrow)&&b.$prevArrow.remove(),b.$nextArrow&&b.htmlExpr.test(b.options.nextArrow)&&b.$nextArrow.remove(),b.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden","true").css("width","")},b.prototype.unslick=function(a){var b=this;b.$slider.trigger("unslick",[b,a]),b.destroy()},b.prototype.updateArrows=function(){var b,a=this;b=Math.floor(a.options.slidesToShow/2),a.options.arrows===!0&&a.slideCount>a.options.slidesToShow&&!a.options.infinite&&(a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false"),a.$nextArrow.removeClass("slick-disabled").attr("aria-disabled","false"),0===a.currentSlide?(a.$prevArrow.addClass("slick-disabled").attr("aria-disabled","true"),a.$nextArrow.removeClass("slick-disabled").attr("aria-disabled","false")):a.currentSlide>=a.slideCount-a.options.slidesToShow&&a.options.centerMode===!1?(a.$nextArrow.addClass("slick-disabled").attr("aria-disabled","true"),a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false")):a.currentSlide>=a.slideCount-1&&a.options.centerMode===!0&&(a.$nextArrow.addClass("slick-disabled").attr("aria-disabled","true"),a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false")))},b.prototype.updateDots=function(){var a=this;null!==a.$dots&&(a.$dots.find("li").removeClass("slick-active").attr("aria-hidden","true"),a.$dots.find("li").eq(Math.floor(a.currentSlide/a.options.slidesToScroll)).addClass("slick-active").attr("aria-hidden","false"))},b.prototype.visibility=function(){var a=this;a.options.autoplay&&(document[a.hidden]?a.interrupted=!0:a.interrupted=!1)},a.fn.slick=function(){var f,g,a=this,c=arguments[0],d=Array.prototype.slice.call(arguments,1),e=a.length;for(f=0;e>f;f++)if("object"==typeof c||"undefined"==typeof c?a[f].slick=new b(a[f],c):g=a[f].slick[c].apply(a[f].slick,d),"undefined"!=typeof g)return g;return a}});

!function (a, b, c) {
  !function (a) {
  "use strict";
  "function" == typeof define && define.amd ? define(["jquery"], a) : jQuery && !jQuery.fn.qtip && a(jQuery)
  }(function (d) {
  "use strict";

  function e(a, b, c, e) {
    this.id = c, this.target = a, this.tooltip = F, this.elements = {target: a}, this._id = S + "-" + c, this.timers = {img: {}}, this.options = b, this.plugins = {}, this.cache = {
    event: {},
    target: d(),
    disabled: E,
    attr: e,
    onTooltip: E,
    lastClass: ""
    }, this.rendered = this.destroyed = this.disabled = this.waiting = this.hiddenDuringWait = this.positioning = this.triggering = E
  }

  function f(a) {
    return a === F || "object" !== d.type(a)
  }

  function g(a) {
    return !(d.isFunction(a) || a && a.attr || a.length || "object" === d.type(a) && (a.jquery || a.then))
  }

  function h(a) {
    var b, c, e, h;
    return f(a) ? E : (f(a.metadata) && (a.metadata = {type: a.metadata}), "content" in a && (b = a.content, f(b) || b.jquery || b.done ? (c = g(b) ? E : b, b = a.content = {text: c}) : c = b.text, "ajax" in b && (e = b.ajax, h = e && e.once !== E, delete b.ajax, b.text = function (a, b) {
    var f = c || d(this).attr(b.options.content.attr) || "Loading...",
      g = d.ajax(d.extend({}, e, {context: b})).then(e.success, F, e.error).then(function (a) {
      return a && h && b.set("content.text", a), a
      }, function (a, c, d) {
      b.destroyed || 0 === a.status || b.set("content.text", c + ": " + d)
      });
    return h ? f : (b.set("content.text", f), g)
    }), "title" in b && (d.isPlainObject(b.title) && (b.button = b.title.button, b.title = b.title.text), g(b.title || E) && (b.title = E))), "position" in a && f(a.position) && (a.position = {
    my: a.position,
    at: a.position
    }), "show" in a && f(a.show) && (a.show = a.show.jquery ? {target: a.show} : a.show === D ? {ready: D} : {event: a.show}), "hide" in a && f(a.hide) && (a.hide = a.hide.jquery ? {target: a.hide} : {event: a.hide}), "style" in a && f(a.style) && (a.style = {classes: a.style}), d.each(R, function () {
    this.sanitize && this.sanitize(a)
    }), a)
  }

  function i(a, b) {
    for (var c, d = 0, e = a, f = b.split("."); e = e[f[d++]];) d < f.length && (c = e);
    return [c || a, f.pop()]
  }

  function j(a, b) {
    var c, d, e;
    for (c in this.checks) if (this.checks.hasOwnProperty(c)) for (d in this.checks[c]) this.checks[c].hasOwnProperty(d) && (e = new RegExp(d, "i").exec(a)) && (b.push(e), ("builtin" === c || this.plugins[c]) && this.checks[c][d].apply(this.plugins[c] || this, b))
  }

  function k(a) {
    return V.concat("").join(a ? "-" + a + " " : " ")
  }

  function l(a, b) {
    return b > 0 ? setTimeout(d.proxy(a, this), b) : void a.call(this)
  }

  function m(a) {
    this.tooltip.hasClass(aa) || (clearTimeout(this.timers.show), clearTimeout(this.timers.hide), this.timers.show = l.call(this, function () {
    this.toggle(D, a)
    }, this.options.show.delay))
  }

  function n(a) {
    if (!this.tooltip.hasClass(aa) && !this.destroyed) {
    var b = d(a.relatedTarget),
      c = b.closest(W)[0] === this.tooltip[0],
      e = b[0] === this.options.show.target[0];
    if (clearTimeout(this.timers.show), clearTimeout(this.timers.hide), this !== b[0] && "mouse" === this.options.position.target && c || this.options.hide.fixed && /mouse(out|leave|move)/.test(a.type) && (c || e)) try {
      a.preventDefault(), a.stopImmediatePropagation()
    } catch (f) {
    } else this.timers.hide = l.call(this, function () {
      this.toggle(E, a)
    }, this.options.hide.delay, this)
    }
  }

  function o(a) {
    !this.tooltip.hasClass(aa) && this.options.hide.inactive && (clearTimeout(this.timers.inactive), this.timers.inactive = l.call(this, function () {
    this.hide(a)
    }, this.options.hide.inactive))
  }

  function p(a) {
    this.rendered && this.tooltip[0].offsetWidth > 0 && this.reposition(a)
  }

  function q(a, c, e) {
    d(b.body).delegate(a, (c.split ? c : c.join("." + S + " ")) + "." + S, function () {
    var a = y.api[d.attr(this, U)];
    a && !a.disabled && e.apply(a, arguments)
    })
  }

  function r(a, c, f) {
    var g, i, j, k, l, m = d(b.body), n = a[0] === b ? m : a,
    o = a.metadata ? a.metadata(f.metadata) : F,
    p = "html5" === f.metadata.type && o ? o[f.metadata.name] : F,
    q = a.data(f.metadata.name || "qtipopts");
    try {
    q = "string" == typeof q ? d.parseJSON(q) : q
    } catch (r) {
    }
    if (k = d.extend(D, {}, y.defaults, f, "object" == typeof q ? h(q) : F, h(p || o)), i = k.position, k.id = c, "boolean" == typeof k.content.text) {
    if (j = a.attr(k.content.attr), k.content.attr === E || !j) return E;
    k.content.text = j
    }
    if (i.container.length || (i.container = m), i.target === E && (i.target = n), k.show.target === E && (k.show.target = n), k.show.solo === D && (k.show.solo = i.container.closest("body")), k.hide.target === E && (k.hide.target = n), k.position.viewport === D && (k.position.viewport = i.container), i.container = i.container.eq(0), i.at = new A(i.at, D), i.my = new A(i.my), a.data(S)) if (k.overwrite) a.qtip("destroy", !0); else if (k.overwrite === E) return E;
    return a.attr(T, c), k.suppress && (l = a.attr("title")) && a.removeAttr("title").attr(ca, l).attr("title", ""), g = new e(a, k, c, !!j), a.data(S, g), g
  }

  function s(a) {
    return a.charAt(0).toUpperCase() + a.slice(1)
  }

  function t(a, b) {
    var d, e, f = b.charAt(0).toUpperCase() + b.slice(1),
    g = (b + " " + va.join(f + " ") + f).split(" "), h = 0;
    if (ua[b]) return a.css(ua[b]);
    for (; d = g[h++];) if ((e = a.css(d)) !== c) return ua[b] = d, e
  }

  function u(a, b) {
    return Math.ceil(parseFloat(t(a, b)))
  }

  function v(a, b) {
    this._ns = "tip", this.options = b, this.offset = b.offset, this.size = [b.width, b.height], this.qtip = a, this.init(a)
  }

  function w(a, b) {
    this.options = b, this._ns = "-modal", this.qtip = a, this.init(a)
  }

  function x(a) {
    this._ns = "ie6", this.qtip = a, this.init(a)
  }

  var y, z, A, B, C, D = !0, E = !1, F = null, G = "x", H = "y",
    I = "width", J = "height", K = "top", L = "left", M = "bottom",
    N = "right", O = "center", P = "flipinvert", Q = "shift", R = {},
    S = "qtip", T = "data-hasqtip", U = "data-qtip-id",
    V = ["ui-widget", "ui-tooltip"], W = "." + S,
    X = "click dblclick mousedown mouseup mousemove mouseleave mouseenter".split(" "),
    Y = S + "-fixed", Z = S + "-default", $ = S + "-focus",
    _ = S + "-hover", aa = S + "-disabled", ba = "_replacedByqTip",
    ca = "oldtitle", da = {
    ie: function () {
      var a, c;
      for (a = 4, c = b.createElement("div"); (c.innerHTML = "<!--[if gt IE " + a + "]><i></i><![endif]-->") && c.getElementsByTagName("i")[0]; a += 1) ;
      return a > 4 ? a : NaN
    }(),
    iOS: parseFloat(("" + (/CPU.*OS ([0-9_]{1,5})|(CPU like).*AppleWebKit.*Mobile/i.exec(navigator.userAgent) || [0, ""])[1]).replace("undefined", "3_2").replace("_", ".").replace("_", "")) || E
    };
  z = e.prototype, z._when = function (a) {
    return d.when.apply(d, a)
  }, z.render = function (a) {
    if (this.rendered || this.destroyed) return this;
    var b = this, c = this.options, e = this.cache, f = this.elements,
    g = c.content.text, h = c.content.title, i = c.content.button,
    j = c.position, k = [];
    return d.attr(this.target[0], "aria-describedby", this._id), e.posClass = this._createPosClass((this.position = {
    my: j.my,
    at: j.at
    }).my), this.tooltip = f.tooltip = d("<div/>", {
    id: this._id,
    "class": [S, Z, c.style.classes, e.posClass].join(" "),
    width: c.style.width || "",
    height: c.style.height || "",
    tracking: "mouse" === j.target && j.adjust.mouse,
    role: "alert",
    "aria-live": "polite",
    "aria-atomic": E,
    "aria-describedby": this._id + "-content",
    "aria-hidden": D
    }).toggleClass(aa, this.disabled).attr(U, this.id).data(S, this).appendTo(j.container).append(f.content = d("<div />", {
    "class": S + "-content",
    id: this._id + "-content",
    "aria-atomic": D
    })), this.rendered = -1, this.positioning = D, h && (this._createTitle(), d.isFunction(h) || k.push(this._updateTitle(h, E))), i && this._createButton(), d.isFunction(g) || k.push(this._updateContent(g, E)), this.rendered = D, this._setWidget(), d.each(R, function (a) {
    var c;
    "render" === this.initialize && (c = this(b)) && (b.plugins[a] = c)
    }), this._unassignEvents(), this._assignEvents(), this._when(k).then(function () {
    b._trigger("render"), b.positioning = E, b.hiddenDuringWait || !c.show.ready && !a || b.toggle(D, e.event, E), b.hiddenDuringWait = E
    }), y.api[this.id] = this, this
  }, z.destroy = function (a) {
    function b() {
    if (!this.destroyed) {
      this.destroyed = D;
      var a, b = this.target, c = b.attr(ca);
      this.rendered && this.tooltip.stop(1, 0).find("*").remove().end().remove(), d.each(this.plugins, function () {
      this.destroy && this.destroy()
      });
      for (a in this.timers) this.timers.hasOwnProperty(a) && clearTimeout(this.timers[a]);
      b.removeData(S).removeAttr(U).removeAttr(T).removeAttr("aria-describedby"), this.options.suppress && c && b.attr("title", c).removeAttr(ca), this._unassignEvents(), this.options = this.elements = this.cache = this.timers = this.plugins = this.mouse = F, delete y.api[this.id]
    }
    }

    return this.destroyed ? this.target : (a === D && "hide" !== this.triggering || !this.rendered ? b.call(this) : (this.tooltip.one("tooltiphidden", d.proxy(b, this)), !this.triggering && this.hide()), this.target)
  }, B = z.checks = {
    builtin: {
    "^id$": function (a, b, c, e) {
      var f = c === D ? y.nextid : c, g = S + "-" + f;
      f !== E && f.length > 0 && !d("#" + g).length ? (this._id = g, this.rendered && (this.tooltip[0].id = this._id, this.elements.content[0].id = this._id + "-content", this.elements.title[0].id = this._id + "-title")) : a[b] = e
    },
    "^prerender": function (a, b, c) {
      c && !this.rendered && this.render(this.options.show.ready)
    },
    "^content.text$": function (a, b, c) {
      this._updateContent(c)
    },
    "^content.attr$": function (a, b, c, d) {
      this.options.content.text === this.target.attr(d) && this._updateContent(this.target.attr(c))
    },
    "^content.title$": function (a, b, c) {
      return c ? (c && !this.elements.title && this._createTitle(), void this._updateTitle(c)) : this._removeTitle()
    },
    "^content.button$": function (a, b, c) {
      this._updateButton(c)
    },
    "^content.title.(text|button)$": function (a, b, c) {
      this.set("content." + b, c)
    },
    "^position.(my|at)$": function (a, b, c) {
      "string" == typeof c && (this.position[b] = a[b] = new A(c, "at" === b))
    },
    "^position.container$": function (a, b, c) {
      this.rendered && this.tooltip.appendTo(c)
    },
    "^show.ready$": function (a, b, c) {
      c && (!this.rendered && this.render(D) || this.toggle(D))
    },
    "^style.classes$": function (a, b, c, d) {
      this.rendered && this.tooltip.removeClass(d).addClass(c)
    },
    "^style.(width|height)": function (a, b, c) {
      this.rendered && this.tooltip.css(b, c)
    },
    "^style.widget|content.title": function () {
      this.rendered && this._setWidget()
    },
    "^style.def": function (a, b, c) {
      this.rendered && this.tooltip.toggleClass(Z, !!c)
    },
    "^events.(render|show|move|hide|focus|blur)$": function (a, b, c) {
      this.rendered && this.tooltip[(d.isFunction(c) ? "" : "un") + "bind"]("tooltip" + b, c)
    },
    "^(show|hide|position).(event|target|fixed|inactive|leave|distance|viewport|adjust)": function () {
      if (this.rendered) {
      var a = this.options.position;
      this.tooltip.attr("tracking", "mouse" === a.target && a.adjust.mouse), this._unassignEvents(), this._assignEvents()
      }
    }
    }
  }, z.get = function (a) {
    if (this.destroyed) return this;
    var b = i(this.options, a.toLowerCase()), c = b[0][b[1]];
    return c.precedance ? c.string() : c
  };
  var ea = /^position\.(my|at|adjust|target|container|viewport)|style|content|show\.ready/i,
    fa = /^prerender|show\.ready/i;
  z.set = function (a, b) {
    if (this.destroyed) return this;
    var c, e = this.rendered, f = E, g = this.options;
    return "string" == typeof a ? (c = a, a = {}, a[c] = b) : a = d.extend({}, a), d.each(a, function (b, c) {
    if (e && fa.test(b)) return void delete a[b];
    var h, j = i(g, b.toLowerCase());
    h = j[0][j[1]], j[0][j[1]] = c && c.nodeType ? d(c) : c, f = ea.test(b) || f, a[b] = [j[0], j[1], c, h]
    }), h(g), this.positioning = D, d.each(a, d.proxy(j, this)), this.positioning = E, this.rendered && this.tooltip[0].offsetWidth > 0 && f && this.reposition("mouse" === g.position.target ? F : this.cache.event), this
  }, z._update = function (a, b) {
    var c = this, e = this.cache;
    return this.rendered && a ? (d.isFunction(a) && (a = a.call(this.elements.target, e.event, this) || ""), d.isFunction(a.then) ? (e.waiting = D, a.then(function (a) {
    return e.waiting = E, c._update(a, b)
    }, F, function (a) {
    return c._update(a, b)
    })) : a === E || !a && "" !== a ? E : (a.jquery && a.length > 0 ? b.empty().append(a.css({
    display: "block",
    visibility: "visible"
    })) : b.html(a), this._waitForContent(b).then(function (a) {
    c.rendered && c.tooltip[0].offsetWidth > 0 && c.reposition(e.event, !a.length)
    }))) : E
  }, z._waitForContent = function (a) {
    var b = this.cache;
    return b.waiting = D, (d.fn.imagesLoaded ? a.imagesLoaded() : (new d.Deferred).resolve([])).done(function () {
    b.waiting = E
    }).promise()
  }, z._updateContent = function (a, b) {
    this._update(a, this.elements.content, b)
  }, z._updateTitle = function (a, b) {
    this._update(a, this.elements.title, b) === E && this._removeTitle(E)
  }, z._createTitle = function () {
    var a = this.elements, b = this._id + "-title";
    a.titlebar && this._removeTitle(), a.titlebar = d("<div />", {"class": S + "-titlebar " + (this.options.style.widget ? k("header") : "")}).append(a.title = d("<div />", {
    id: b,
    "class": S + "-title",
    "aria-atomic": D
    })).insertBefore(a.content).delegate(".qtip-close", "mousedown keydown mouseup keyup mouseout", function (a) {
    d(this).toggleClass("ui-state-active ui-state-focus", "down" === a.type.substr(-4))
    }).delegate(".qtip-close", "mouseover mouseout", function (a) {
    d(this).toggleClass("ui-state-hover", "mouseover" === a.type)
    }), this.options.content.button && this._createButton()
  }, z._removeTitle = function (a) {
    var b = this.elements;
    b.title && (b.titlebar.remove(), b.titlebar = b.title = b.button = F, a !== E && this.reposition())
  }, z._createPosClass = function (a) {
    return S + "-pos-" + (a || this.options.position.my).abbrev()
  }, z.reposition = function (c, e) {
    if (!this.rendered || this.positioning || this.destroyed) return this;
    this.positioning = D;
    var f, g, h, i, j = this.cache, k = this.tooltip,
    l = this.options.position, m = l.target, n = l.my, o = l.at,
    p = l.viewport, q = l.container, r = l.adjust,
    s = r.method.split(" "), t = k.outerWidth(E),
    u = k.outerHeight(E), v = 0, w = 0, x = k.css("position"),
    y = {left: 0, top: 0}, z = k[0].offsetWidth > 0,
    A = c && "scroll" === c.type, B = d(a), C = q[0].ownerDocument,
    F = this.mouse;
    if (d.isArray(m) && 2 === m.length) o = {
    x: L,
    y: K
    }, y = {left: m[0], top: m[1]}; else if ("mouse" === m) o = {
    x: L,
    y: K
    }, (!r.mouse || this.options.hide.distance) && j.origin && j.origin.pageX ? c = j.origin : !c || c && ("resize" === c.type || "scroll" === c.type) ? c = j.event : F && F.pageX && (c = F), "static" !== x && (y = q.offset()), C.body.offsetWidth !== (a.innerWidth || C.documentElement.clientWidth) && (g = d(b.body).offset()), y = {
    left: c.pageX - y.left + (g && g.left || 0),
    top: c.pageY - y.top + (g && g.top || 0)
    }, r.mouse && A && F && (y.left -= (F.scrollX || 0) - B.scrollLeft(), y.top -= (F.scrollY || 0) - B.scrollTop()); else {
    if ("event" === m ? c && c.target && "scroll" !== c.type && "resize" !== c.type ? j.target = d(c.target) : c.target || (j.target = this.elements.target) : "event" !== m && (j.target = d(m.jquery ? m : this.elements.target)), m = j.target, m = d(m).eq(0), 0 === m.length) return this;
    m[0] === b || m[0] === a ? (v = da.iOS ? a.innerWidth : m.width(), w = da.iOS ? a.innerHeight : m.height(), m[0] === a && (y = {
      top: (p || m).scrollTop(),
      left: (p || m).scrollLeft()
    })) : R.imagemap && m.is("area") ? f = R.imagemap(this, m, o, R.viewport ? s : E) : R.svg && m && m[0].ownerSVGElement ? f = R.svg(this, m, o, R.viewport ? s : E) : (v = m.outerWidth(E), w = m.outerHeight(E), y = m.offset()), f && (v = f.width, w = f.height, g = f.offset, y = f.position), y = this.reposition.offset(m, y, q), (da.iOS > 3.1 && da.iOS < 4.1 || da.iOS >= 4.3 && da.iOS < 4.33 || !da.iOS && "fixed" === x) && (y.left -= B.scrollLeft(), y.top -= B.scrollTop()), (!f || f && f.adjustable !== E) && (y.left += o.x === N ? v : o.x === O ? v / 2 : 0, y.top += o.y === M ? w : o.y === O ? w / 2 : 0)
    }
    return y.left += r.x + (n.x === N ? -t : n.x === O ? -t / 2 : 0), y.top += r.y + (n.y === M ? -u : n.y === O ? -u / 2 : 0), R.viewport ? (h = y.adjusted = R.viewport(this, y, l, v, w, t, u), g && h.left && (y.left += g.left), g && h.top && (y.top += g.top), h.my && (this.position.my = h.my)) : y.adjusted = {
    left: 0,
    top: 0
    }, j.posClass !== (i = this._createPosClass(this.position.my)) && (j.posClass = i, k.removeClass(j.posClass).addClass(i)), this._trigger("move", [y, p.elem || p], c) ? (delete y.adjusted, e === E || !z || isNaN(y.left) || isNaN(y.top) || "mouse" === m || !d.isFunction(l.effect) ? k.css(y) : d.isFunction(l.effect) && (l.effect.call(k, this, d.extend({}, y)), k.queue(function (a) {
    d(this).css({
      opacity: "",
      height: ""
    }), da.ie && this.style.removeAttribute("filter"), a()
    })), this.positioning = E, this) : this
  }, z.reposition.offset = function (a, c, e) {
    function f(a, b) {
    c.left += b * a.scrollLeft(), c.top += b * a.scrollTop()
    }

    if (!e[0]) return c;
    var g, h, i, j, k = d(a[0].ownerDocument),
    l = !!da.ie && "CSS1Compat" !== b.compatMode, m = e[0];
    do "static" !== (h = d.css(m, "position")) && ("fixed" === h ? (i = m.getBoundingClientRect(), f(k, -1)) : (i = d(m).position(), i.left += parseFloat(d.css(m, "borderLeftWidth")) || 0, i.top += parseFloat(d.css(m, "borderTopWidth")) || 0), c.left -= i.left + (parseFloat(d.css(m, "marginLeft")) || 0), c.top -= i.top + (parseFloat(d.css(m, "marginTop")) || 0), g || "hidden" === (j = d.css(m, "overflow")) || "visible" === j || (g = d(m))); while (m = m.offsetParent);
    return g && (g[0] !== k[0] || l) && f(g, 1), c
  };
  var ga = (A = z.reposition.Corner = function (a, b) {
    a = ("" + a).replace(/([A-Z])/, " $1").replace(/middle/gi, O).toLowerCase(), this.x = (a.match(/left|right/i) || a.match(/center/) || ["inherit"])[0].toLowerCase(), this.y = (a.match(/top|bottom|center/i) || ["inherit"])[0].toLowerCase(), this.forceY = !!b;
    var c = a.charAt(0);
    this.precedance = "t" === c || "b" === c ? H : G
  }).prototype;
  ga.invert = function (a, b) {
    this[a] = this[a] === L ? N : this[a] === N ? L : b || this[a]
  }, ga.string = function (a) {
    var b = this.x, c = this.y,
    d = b !== c ? "center" === b || "center" !== c && (this.precedance === H || this.forceY) ? [c, b] : [b, c] : [b];
    return a !== !1 ? d.join(" ") : d
  }, ga.abbrev = function () {
    var a = this.string(!1);
    return a[0].charAt(0) + (a[1] && a[1].charAt(0) || "")
  }, ga.clone = function () {
    return new A(this.string(), this.forceY)
  }, z.toggle = function (a, c) {
    var e = this.cache, f = this.options, g = this.tooltip;
    if (c) {
    if (/over|enter/.test(c.type) && e.event && /out|leave/.test(e.event.type) && f.show.target.add(c.target).length === f.show.target.length && g.has(c.relatedTarget).length) return this;
    e.event = d.event.fix(c)
    }
    if (this.waiting && !a && (this.hiddenDuringWait = D), !this.rendered) return a ? this.render(1) : this;
    if (this.destroyed || this.disabled) return this;
    var h, i, j, k = a ? "show" : "hide", l = this.options[k],
    m = this.options.position, n = this.options.content,
    o = this.tooltip.css("width"), p = this.tooltip.is(":visible"),
    q = a || 1 === l.target.length,
    r = !c || l.target.length < 2 || e.target[0] === c.target;
    return (typeof a).search("boolean|number") && (a = !p), h = !g.is(":animated") && p === a && r, i = h ? F : !!this._trigger(k, [90]), this.destroyed ? this : (i !== E && a && this.focus(c), !i || h ? this : (d.attr(g[0], "aria-hidden", !a), a ? (this.mouse && (e.origin = d.event.fix(this.mouse)), d.isFunction(n.text) && this._updateContent(n.text, E), d.isFunction(n.title) && this._updateTitle(n.title, E), !C && "mouse" === m.target && m.adjust.mouse && (d(b).bind("mousemove." + S, this._storeMouse), C = D), o || g.css("width", g.outerWidth(E)), this.reposition(c, arguments[2]), o || g.css("width", ""), l.solo && ("string" == typeof l.solo ? d(l.solo) : d(W, l.solo)).not(g).not(l.target).qtip("hide", new d.Event("tooltipsolo"))) : (clearTimeout(this.timers.show), delete e.origin, C && !d(W + '[tracking="true"]:visible', l.solo).not(g).length && (d(b).unbind("mousemove." + S), C = E), this.blur(c)), j = d.proxy(function () {
    a ? (da.ie && g[0].style.removeAttribute("filter"), g.css("overflow", ""), "string" == typeof l.autofocus && d(this.options.show.autofocus, g).focus(), this.options.show.target.trigger("qtip-" + this.id + "-inactive")) : g.css({
      display: "",
      visibility: "",
      opacity: "",
      left: "",
      top: ""
    }), this._trigger(a ? "visible" : "hidden")
    }, this), l.effect === E || q === E ? (g[k](), j()) : d.isFunction(l.effect) ? (g.stop(1, 1), l.effect.call(g, this), g.queue("fx", function (a) {
    j(), a()
    })) : g.fadeTo(90, a ? 1 : 0, j), a && l.target.trigger("qtip-" + this.id + "-inactive"), this))
  }, z.show = function (a) {
    return this.toggle(D, a)
  }, z.hide = function (a) {
    return this.toggle(E, a)
  }, z.focus = function (a) {
    if (!this.rendered || this.destroyed) return this;
    var b = d(W), c = this.tooltip, e = parseInt(c[0].style.zIndex, 10),
    f = y.zindex + b.length;
    return c.hasClass($) || this._trigger("focus", [f], a) && (e !== f && (b.each(function () {
    this.style.zIndex > e && (this.style.zIndex = this.style.zIndex - 1)
    }), b.filter("." + $).qtip("blur", a)), c.addClass($)[0].style.zIndex = f), this
  }, z.blur = function (a) {
    return !this.rendered || this.destroyed ? this : (this.tooltip.removeClass($), this._trigger("blur", [this.tooltip.css("zIndex")], a), this)
  }, z.disable = function (a) {
    return this.destroyed ? this : ("toggle" === a ? a = !(this.rendered ? this.tooltip.hasClass(aa) : this.disabled) : "boolean" != typeof a && (a = D), this.rendered && this.tooltip.toggleClass(aa, a).attr("aria-disabled", a), this.disabled = !!a, this)
  }, z.enable = function () {
    return this.disable(E)
  }, z._createButton = function () {
    var a = this, b = this.elements, c = b.tooltip,
    e = this.options.content.button, f = "string" == typeof e,
    g = f ? e : "Close tooltip";
    b.button && b.button.remove(), e.jquery ? b.button = e : b.button = d("<a />", {
    "class": "qtip-close " + (this.options.style.widget ? "" : S + "-icon"),
    title: g,
    "aria-label": g
    }).prepend(d("<span />", {
    "class": "ui-icon ui-icon-close",
    html: "&times;"
    })), b.button.appendTo(b.titlebar || c).attr("role", "button").click(function (b) {
    return c.hasClass(aa) || a.hide(b), E
    })
  }, z._updateButton = function (a) {
    if (!this.rendered) return E;
    var b = this.elements.button;
    a ? this._createButton() : b.remove()
  }, z._setWidget = function () {
    var a = this.options.style.widget, b = this.elements, c = b.tooltip,
    d = c.hasClass(aa);
    c.removeClass(aa), aa = a ? "ui-state-disabled" : "qtip-disabled", c.toggleClass(aa, d), c.toggleClass("ui-helper-reset " + k(), a).toggleClass(Z, this.options.style.def && !a), b.content && b.content.toggleClass(k("content"), a), b.titlebar && b.titlebar.toggleClass(k("header"), a), b.button && b.button.toggleClass(S + "-icon", !a)
  }, z._storeMouse = function (a) {
    return (this.mouse = d.event.fix(a)).type = "mousemove", this
  }, z._bind = function (a, b, c, e, f) {
    if (a && c && b.length) {
    var g = "." + this._id + (e ? "-" + e : "");
    return d(a).bind((b.split ? b : b.join(g + " ")) + g, d.proxy(c, f || this)), this
    }
  }, z._unbind = function (a, b) {
    return a && d(a).unbind("." + this._id + (b ? "-" + b : "")), this
  }, z._trigger = function (a, b, c) {
    var e = new d.Event("tooltip" + a);
    return e.originalEvent = c && d.extend({}, c) || this.cache.event || F, this.triggering = a, this.tooltip.trigger(e, [this].concat(b || [])), this.triggering = E, !e.isDefaultPrevented()
  }, z._bindEvents = function (a, b, c, e, f, g) {
    var h = c.filter(e).add(e.filter(c)), i = [];
    h.length && (d.each(b, function (b, c) {
    var e = d.inArray(c, a);
    e > -1 && i.push(a.splice(e, 1)[0])
    }), i.length && (this._bind(h, i, function (a) {
    var b = this.rendered ? this.tooltip[0].offsetWidth > 0 : !1;
    (b ? g : f).call(this, a)
    }), c = c.not(h), e = e.not(h))), this._bind(c, a, f), this._bind(e, b, g)
  }, z._assignInitialEvents = function (a) {
    function b(a) {
    return this.disabled || this.destroyed ? E : (this.cache.event = a && d.event.fix(a), this.cache.target = a && d(a.target), clearTimeout(this.timers.show), void(this.timers.show = l.call(this, function () {
      this.render("object" == typeof a || c.show.ready)
    }, c.prerender ? 0 : c.show.delay)))
    }

    var c = this.options, e = c.show.target, f = c.hide.target,
    g = c.show.event ? d.trim("" + c.show.event).split(" ") : [],
    h = c.hide.event ? d.trim("" + c.hide.event).split(" ") : [];
    this._bind(this.elements.target, ["remove", "removeqtip"], function () {
    this.destroy(!0)
    }, "destroy"), /mouse(over|enter)/i.test(c.show.event) && !/mouse(out|leave)/i.test(c.hide.event) && h.push("mouseleave"), this._bind(e, "mousemove", function (a) {
    this._storeMouse(a), this.cache.onTarget = D
    }), this._bindEvents(g, h, e, f, b, function () {
    return this.timers ? void clearTimeout(this.timers.show) : E
    }), (c.show.ready || c.prerender) && b.call(this, a)
  }, z._assignEvents = function () {
    var c = this, e = this.options, f = e.position, g = this.tooltip,
    h = e.show.target, i = e.hide.target, j = f.container,
    k = f.viewport, l = d(b), q = d(a),
    r = e.show.event ? d.trim("" + e.show.event).split(" ") : [],
    s = e.hide.event ? d.trim("" + e.hide.event).split(" ") : [];
    d.each(e.events, function (a, b) {
    c._bind(g, "toggle" === a ? ["tooltipshow", "tooltiphide"] : ["tooltip" + a], b, null, g)
    }), /mouse(out|leave)/i.test(e.hide.event) && "window" === e.hide.leave && this._bind(l, ["mouseout", "blur"], function (a) {
    /select|option/.test(a.target.nodeName) || a.relatedTarget || this.hide(a)
    }), e.hide.fixed ? i = i.add(g.addClass(Y)) : /mouse(over|enter)/i.test(e.show.event) && this._bind(i, "mouseleave", function () {
    clearTimeout(this.timers.show)
    }), ("" + e.hide.event).indexOf("unfocus") > -1 && this._bind(j.closest("html"), ["mousedown", "touchstart"], function (a) {
    var b = d(a.target),
      c = this.rendered && !this.tooltip.hasClass(aa) && this.tooltip[0].offsetWidth > 0,
      e = b.parents(W).filter(this.tooltip[0]).length > 0;
    b[0] === this.target[0] || b[0] === this.tooltip[0] || e || this.target.has(b[0]).length || !c || this.hide(a)
    }), "number" == typeof e.hide.inactive && (this._bind(h, "qtip-" + this.id + "-inactive", o, "inactive"), this._bind(i.add(g), y.inactiveEvents, o)), this._bindEvents(r, s, h, i, m, n), this._bind(h.add(g), "mousemove", function (a) {
    if ("number" == typeof e.hide.distance) {
      var b = this.cache.origin || {},
      c = this.options.hide.distance, d = Math.abs;
      (d(a.pageX - b.pageX) >= c || d(a.pageY - b.pageY) >= c) && this.hide(a)
    }
    this._storeMouse(a)
    }), "mouse" === f.target && f.adjust.mouse && (e.hide.event && this._bind(h, ["mouseenter", "mouseleave"], function (a) {
    return this.cache ? void(this.cache.onTarget = "mouseenter" === a.type) : E
    }), this._bind(l, "mousemove", function (a) {
    this.rendered && this.cache.onTarget && !this.tooltip.hasClass(aa) && this.tooltip[0].offsetWidth > 0 && this.reposition(a)
    })), (f.adjust.resize || k.length) && this._bind(d.event.special.resize ? k : q, "resize", p), f.adjust.scroll && this._bind(q.add(f.container), "scroll", p)
  }, z._unassignEvents = function () {
    var c = this.options, e = c.show.target, f = c.hide.target,
    g = d.grep([this.elements.target[0], this.rendered && this.tooltip[0], c.position.container[0], c.position.viewport[0], c.position.container.closest("html")[0], a, b], function (a) {
      return "object" == typeof a
    });
    e && e.toArray && (g = g.concat(e.toArray())), f && f.toArray && (g = g.concat(f.toArray())), this._unbind(g)._unbind(g, "destroy")._unbind(g, "inactive")
  }, d(function () {
    q(W, ["mouseenter", "mouseleave"], function (a) {
    var b = "mouseenter" === a.type, c = d(a.currentTarget),
      e = d(a.relatedTarget || a.target), f = this.options;
    b ? (this.focus(a), c.hasClass(Y) && !c.hasClass(aa) && clearTimeout(this.timers.hide)) : "mouse" === f.position.target && f.position.adjust.mouse && f.hide.event && f.show.target && !e.closest(f.show.target[0]).length && this.hide(a), c.toggleClass(_, b)
    }), q("[" + U + "]", X, o)
  }), y = d.fn.qtip = function (a, b, e) {
    var f = ("" + a).toLowerCase(), g = F,
    i = d.makeArray(arguments).slice(1), j = i[i.length - 1],
    k = this[0] ? d.data(this[0], S) : F;
    return !arguments.length && k || "api" === f ? k : "string" == typeof a ? (this.each(function () {
    var a = d.data(this, S);
    if (!a) return D;
    if (j && j.timeStamp && (a.cache.event = j), !b || "option" !== f && "options" !== f) a[f] && a[f].apply(a, i); else {
      if (e === c && !d.isPlainObject(b)) return g = a.get(b), E;
      a.set(b, e)
    }
    }), g !== F ? g : this) : "object" != typeof a && arguments.length ? void 0 : (k = h(d.extend(D, {}, a)), this.each(function (a) {
    var b, c;
    return c = d.isArray(k.id) ? k.id[a] : k.id, c = !c || c === E || c.length < 1 || y.api[c] ? y.nextid++ : c, b = r(d(this), c, k), b === E ? D : (y.api[c] = b, d.each(R, function () {
      "initialize" === this.initialize && this(b)
    }), void b._assignInitialEvents(j))
    }))
  }, d.qtip = e, y.api = {}, d.each({
    attr: function (a, b) {
    if (this.length) {
      var c = this[0], e = "title", f = d.data(c, "qtip");
      if (a === e && f && f.options && "object" == typeof f && "object" == typeof f.options && f.options.suppress) return arguments.length < 2 ? d.attr(c, ca) : (f && f.options.content.attr === e && f.cache.attr && f.set("content.text", b), this.attr(ca, b))
    }
    return d.fn["attr" + ba].apply(this, arguments)
    }, clone: function (a) {
    var b = d.fn["clone" + ba].apply(this, arguments);
    return a || b.filter("[" + ca + "]").attr("title", function () {
      return d.attr(this, ca)
    }).removeAttr(ca), b
    }
  }, function (a, b) {
    if (!b || d.fn[a + ba]) return D;
    var c = d.fn[a + ba] = d.fn[a];
    d.fn[a] = function () {
    return b.apply(this, arguments) || c.apply(this, arguments)
    }
  }), d.ui || (d["cleanData" + ba] = d.cleanData, d.cleanData = function (a) {
    for (var b, c = 0; (b = d(a[c])).length; c++) if (b.attr(T)) try {
    b.triggerHandler("removeqtip")
    } catch (e) {
    }
    d["cleanData" + ba].apply(this, arguments)
  }), y.version = "3.0.3", y.nextid = 0, y.inactiveEvents = X, y.zindex = 15e3, y.defaults = {
    prerender: E,
    id: E,
    overwrite: D,
    suppress: D,
    content: {text: D, attr: "title", title: E, button: E},
    position: {
    my: "top left",
    at: "bottom right",
    target: E,
    container: E,
    viewport: E,
    adjust: {
      x: 0,
      y: 0,
      mouse: D,
      scroll: D,
      resize: D,
      method: "flipinvert flipinvert"
    },
    effect: function (a, b) {
      d(this).animate(b, {duration: 200, queue: E})
    }
    },
    show: {
    target: E,
    event: "mouseenter",
    effect: D,
    delay: 90,
    solo: E,
    ready: E,
    autofocus: E
    },
    hide: {
    target: E,
    event: "mouseleave",
    effect: D,
    delay: 0,
    fixed: E,
    inactive: E,
    leave: "window",
    distance: E
    },
    style: {classes: "", widget: E, width: E, height: E, def: D},
    events: {
    render: F,
    move: F,
    show: F,
    hide: F,
    toggle: F,
    visible: F,
    hidden: F,
    focus: F,
    blur: F
    }
  };
  var ha, ia, ja, ka, la, ma = "margin", na = "border", oa = "color",
    pa = "background-color", qa = "transparent", ra = " !important",
    sa = !!b.createElement("canvas").getContext,
    ta = /rgba?\(0, 0, 0(, 0)?\)|transparent|#123456/i, ua = {},
    va = ["Webkit", "O", "Moz", "ms"];
  sa ? (ka = a.devicePixelRatio || 1, la = function () {
    var a = b.createElement("canvas").getContext("2d");
    return a.backingStorePixelRatio || a.webkitBackingStorePixelRatio || a.mozBackingStorePixelRatio || a.msBackingStorePixelRatio || a.oBackingStorePixelRatio || 1
  }(), ja = ka / la) : ia = function (a, b, c) {
    return "<qtipvml:" + a + ' xmlns="urn:schemas-microsoft.com:vml" class="qtip-vml" ' + (b || "") + ' style="behavior: url(#default#VML); ' + (c || "") + '" />'
  }, d.extend(v.prototype, {
    init: function (a) {
    var b, c;
    c = this.element = a.elements.tip = d("<div />", {"class": S + "-tip"}).prependTo(a.tooltip), sa ? (b = d("<canvas />").appendTo(this.element)[0].getContext("2d"), b.lineJoin = "miter", b.miterLimit = 1e5, b.save()) : (b = ia("shape", 'coordorigin="0,0"', "position:absolute;"), this.element.html(b + b), a._bind(d("*", c).add(c), ["click", "mousedown"], function (a) {
      a.stopPropagation()
    }, this._ns)), a._bind(a.tooltip, "tooltipmove", this.reposition, this._ns, this), this.create()
    }, _swapDimensions: function () {
    this.size[0] = this.options.height, this.size[1] = this.options.width
    }, _resetDimensions: function () {
    this.size[0] = this.options.width, this.size[1] = this.options.height
    }, _useTitle: function (a) {
    var b = this.qtip.elements.titlebar;
    return b && (a.y === K || a.y === O && this.element.position().top + this.size[1] / 2 + this.options.offset < b.outerHeight(D))
    }, _parseCorner: function (a) {
    var b = this.qtip.options.position.my;
    return a === E || b === E ? a = E : a === D ? a = new A(b.string()) : a.string || (a = new A(a), a.fixed = D), a
    }, _parseWidth: function (a, b, c) {
    var d = this.qtip.elements, e = na + s(b) + "Width";
    return (c ? u(c, e) : u(d.content, e) || u(this._useTitle(a) && d.titlebar || d.content, e) || u(d.tooltip, e)) || 0
    }, _parseRadius: function (a) {
    var b = this.qtip.elements, c = na + s(a.y) + s(a.x) + "Radius";
    return da.ie < 9 ? 0 : u(this._useTitle(a) && b.titlebar || b.content, c) || u(b.tooltip, c) || 0
    }, _invalidColour: function (a, b, c) {
    var d = a.css(b);
    return !d || c && d === a.css(c) || ta.test(d) ? E : d
    }, _parseColours: function (a) {
    var b = this.qtip.elements, c = this.element.css("cssText", ""),
      e = na + s(a[a.precedance]) + s(oa),
      f = this._useTitle(a) && b.titlebar || b.content,
      g = this._invalidColour, h = [];
    return h[0] = g(c, pa) || g(f, pa) || g(b.content, pa) || g(b.tooltip, pa) || c.css(pa), h[1] = g(c, e, oa) || g(f, e, oa) || g(b.content, e, oa) || g(b.tooltip, e, oa) || b.tooltip.css(e), d("*", c).add(c).css("cssText", pa + ":" + qa + ra + ";" + na + ":0" + ra + ";"), h
    }, _calculateSize: function (a) {
    var b, c, d, e = a.precedance === H, f = this.options.width,
      g = this.options.height, h = "c" === a.abbrev(),
      i = (e ? f : g) * (h ? .5 : 1), j = Math.pow,
      k = Math.round, l = Math.sqrt(j(i, 2) + j(g, 2)),
      m = [this.border / i * l, this.border / g * l];
    return m[2] = Math.sqrt(j(m[0], 2) - j(this.border, 2)), m[3] = Math.sqrt(j(m[1], 2) - j(this.border, 2)), b = l + m[2] + m[3] + (h ? 0 : m[0]), c = b / l, d = [k(c * f), k(c * g)], e ? d : d.reverse()
    }, _calculateTip: function (a, b, c) {
    c = c || 1, b = b || this.size;
    var d = b[0] * c, e = b[1] * c, f = Math.ceil(d / 2),
      g = Math.ceil(e / 2), h = {
      br: [0, 0, d, e, d, 0],
      bl: [0, 0, d, 0, 0, e],
      tr: [0, e, d, 0, d, e],
      tl: [0, 0, 0, e, d, e],
      tc: [0, e, f, 0, d, e],
      bc: [0, 0, d, 0, f, e],
      rc: [0, 0, d, g, 0, e],
      lc: [d, 0, d, e, 0, g]
      };
    return h.lt = h.br, h.rt = h.bl, h.lb = h.tr, h.rb = h.tl, h[a.abbrev()]
    }, _drawCoords: function (a, b) {
    a.beginPath(), a.moveTo(b[0], b[1]), a.lineTo(b[2], b[3]), a.lineTo(b[4], b[5]), a.closePath()
    }, create: function () {
    var a = this.corner = (sa || da.ie) && this._parseCorner(this.options.corner);
    return this.enabled = !!this.corner && "c" !== this.corner.abbrev(), this.enabled && (this.qtip.cache.corner = a.clone(), this.update()), this.element.toggle(this.enabled), this.corner
    }, update: function (b, c) {
    if (!this.enabled) return this;
    var e, f, g, h, i, j, k, l, m = this.qtip.elements,
      n = this.element, o = n.children(), p = this.options,
      q = this.size, r = p.mimic, s = Math.round;
    b || (b = this.qtip.cache.corner || this.corner), r === E ? r = b : (r = new A(r), r.precedance = b.precedance, "inherit" === r.x ? r.x = b.x : "inherit" === r.y ? r.y = b.y : r.x === r.y && (r[b.precedance] = b[b.precedance])), f = r.precedance, b.precedance === G ? this._swapDimensions() : this._resetDimensions(), e = this.color = this._parseColours(b), e[1] !== qa ? (l = this.border = this._parseWidth(b, b[b.precedance]), p.border && 1 > l && !ta.test(e[1]) && (e[0] = e[1]), this.border = l = p.border !== D ? p.border : l) : this.border = l = 0, k = this.size = this._calculateSize(b), n.css({
      width: k[0],
      height: k[1],
      lineHeight: k[1] + "px"
    }), j = b.precedance === H ? [s(r.x === L ? l : r.x === N ? k[0] - q[0] - l : (k[0] - q[0]) / 2), s(r.y === K ? k[1] - q[1] : 0)] : [s(r.x === L ? k[0] - q[0] : 0), s(r.y === K ? l : r.y === M ? k[1] - q[1] - l : (k[1] - q[1]) / 2)], sa ? (g = o[0].getContext("2d"), g.restore(), g.save(), g.clearRect(0, 0, 6e3, 6e3), h = this._calculateTip(r, q, ja), i = this._calculateTip(r, this.size, ja), o.attr(I, k[0] * ja).attr(J, k[1] * ja), o.css(I, k[0]).css(J, k[1]), this._drawCoords(g, i), g.fillStyle = e[1], g.fill(), g.translate(j[0] * ja, j[1] * ja), this._drawCoords(g, h), g.fillStyle = e[0], g.fill()) : (h = this._calculateTip(r), h = "m" + h[0] + "," + h[1] + " l" + h[2] + "," + h[3] + " " + h[4] + "," + h[5] + " xe", j[2] = l && /^(r|b)/i.test(b.string()) ? 8 === da.ie ? 2 : 1 : 0, o.css({
      coordsize: k[0] + l + " " + k[1] + l,
      antialias: "" + (r.string().indexOf(O) > -1),
      left: j[0] - j[2] * Number(f === G),
      top: j[1] - j[2] * Number(f === H),
      width: k[0] + l,
      height: k[1] + l
    }).each(function (a) {
      var b = d(this);
      b[b.prop ? "prop" : "attr"]({
      coordsize: k[0] + l + " " + k[1] + l,
      path: h,
      fillcolor: e[0],
      filled: !!a,
      stroked: !a
      }).toggle(!(!l && !a)), !a && b.html(ia("stroke", 'weight="' + 2 * l + 'px" color="' + e[1] + '" miterlimit="1000" joinstyle="miter"'))
    })), a.opera && setTimeout(function () {
      m.tip.css({display: "inline-block", visibility: "visible"})
    }, 1), c !== E && this.calculate(b, k)
    }, calculate: function (a, b) {
    if (!this.enabled) return E;
    var c, e, f = this, g = this.qtip.elements, h = this.element,
      i = this.options.offset, j = {};
    return a = a || this.corner, c = a.precedance, b = b || this._calculateSize(a), e = [a.x, a.y], c === G && e.reverse(), d.each(e, function (d, e) {
      var h, k, l;
      e === O ? (h = c === H ? L : K, j[h] = "50%", j[ma + "-" + h] = -Math.round(b[c === H ? 0 : 1] / 2) + i) : (h = f._parseWidth(a, e, g.tooltip), k = f._parseWidth(a, e, g.content), l = f._parseRadius(a), j[e] = Math.max(-f.border, d ? k : i + (l > h ? l : -h)))
    }), j[a[c]] -= b[c === G ? 0 : 1], h.css({
      margin: "",
      top: "",
      bottom: "",
      left: "",
      right: ""
    }).css(j), j
    }, reposition: function (a, b, d) {
    function e(a, b, c, d, e) {
      a === Q && j.precedance === b && k[d] && j[c] !== O ? j.precedance = j.precedance === G ? H : G : a !== Q && k[d] && (j[b] = j[b] === O ? k[d] > 0 ? d : e : j[b] === d ? e : d)
    }

    function f(a, b, e) {
      j[a] === O ? p[ma + "-" + b] = o[a] = g[ma + "-" + b] - k[b] : (h = g[e] !== c ? [k[b], -g[b]] : [-k[b], g[b]], (o[a] = Math.max(h[0], h[1])) > h[0] && (d[b] -= k[b], o[b] = E), p[g[e] !== c ? e : b] = o[a])
    }

    if (this.enabled) {
      var g, h, i = b.cache, j = this.corner.clone(),
      k = d.adjusted,
      l = b.options.position.adjust.method.split(" "),
      m = l[0], n = l[1] || l[0],
      o = {left: E, top: E, x: 0, y: 0}, p = {};
      this.corner.fixed !== D && (e(m, G, H, L, N), e(n, H, G, K, M), j.string() === i.corner.string() && i.cornerTop === k.top && i.cornerLeft === k.left || this.update(j, E)), g = this.calculate(j), g.right !== c && (g.left = -g.right), g.bottom !== c && (g.top = -g.bottom), g.user = this.offset, o.left = m === Q && !!k.left, o.left && f(G, L, N), o.top = n === Q && !!k.top, o.top && f(H, K, M), this.element.css(p).toggle(!(o.x && o.y || j.x === O && o.y || j.y === O && o.x)), d.left -= g.left.charAt ? g.user : m !== Q || o.top || !o.left && !o.top ? g.left + this.border : 0, d.top -= g.top.charAt ? g.user : n !== Q || o.left || !o.left && !o.top ? g.top + this.border : 0, i.cornerLeft = k.left, i.cornerTop = k.top, i.corner = j.clone()
    }
    }, destroy: function () {
    this.qtip._unbind(this.qtip.tooltip, this._ns), this.qtip.elements.tip && this.qtip.elements.tip.find("*").remove().end().remove()
    }
  }), ha = R.tip = function (a) {
    return new v(a, a.options.style.tip)
  }, ha.initialize = "render", ha.sanitize = function (a) {
    if (a.style && "tip" in a.style) {
    var b = a.style.tip;
    "object" != typeof b && (b = a.style.tip = {corner: b}), /string|boolean/i.test(typeof b.corner) || (b.corner = D)
    }
  }, B.tip = {
    "^position.my|style.tip.(corner|mimic|border)$": function () {
    this.create(), this.qtip.reposition()
    }, "^style.tip.(height|width)$": function (a) {
    this.size = [a.width, a.height], this.update(), this.qtip.reposition()
    }, "^content.title|style.(classes|widget)$": function () {
    this.update()
    }
  }, d.extend(D, y.defaults, {
    style: {
    tip: {
      corner: D,
      mimic: E,
      width: 6,
      height: 6,
      border: D,
      offset: 0
    }
    }
  });
  var wa, xa, ya = "qtip-modal", za = "." + ya;
  xa = function () {
    function a(a) {
    if (d.expr[":"].focusable) return d.expr[":"].focusable;
    var b, c, e, f = !isNaN(d.attr(a, "tabindex")),
      g = a.nodeName && a.nodeName.toLowerCase();
    return "area" === g ? (b = a.parentNode, c = b.name, a.href && c && "map" === b.nodeName.toLowerCase() ? (e = d("img[usemap=#" + c + "]")[0], !!e && e.is(":visible")) : !1) : /input|select|textarea|button|object/.test(g) ? !a.disabled : "a" === g ? a.href || f : f
    }

    function c(a) {
    j.length < 1 && a.length ? a.not("body").blur() : j.first().focus()
    }

    function e(a) {
    if (h.is(":visible")) {
      var b, e = d(a.target), g = f.tooltip, i = e.closest(W);
      b = i.length < 1 ? E : parseInt(i[0].style.zIndex, 10) > parseInt(g[0].style.zIndex, 10), b || e.closest(W)[0] === g[0] || c(e)
    }
    }

    var f, g, h, i = this, j = {};
    d.extend(i, {
    init: function () {
      return h = i.elem = d("<div />", {
      id: "qtip-overlay",
      html: "<div></div>",
      mousedown: function () {
        return E
      }
      }).hide(), d(b.body).bind("focusin" + za, e), d(b).bind("keydown" + za, function (a) {
      f && f.options.show.modal.escape && 27 === a.keyCode && f.hide(a)
      }), h.bind("click" + za, function (a) {
      f && f.options.show.modal.blur && f.hide(a)
      }), i
    }, update: function (b) {
      f = b, j = b.options.show.modal.stealfocus !== E ? b.tooltip.find("*").filter(function () {
      return a(this)
      }) : []
    }, toggle: function (a, e, j) {
      var k = a.tooltip, l = a.options.show.modal, m = l.effect,
      n = e ? "show" : "hide", o = h.is(":visible"),
      p = d(za).filter(":visible:not(:animated)").not(k);
      return i.update(a), e && l.stealfocus !== E && c(d(":focus")), h.toggleClass("blurs", l.blur), e && h.appendTo(b.body), h.is(":animated") && o === e && g !== E || !e && p.length ? i : (h.stop(D, E), d.isFunction(m) ? m.call(h, e) : m === E ? h[n]() : h.fadeTo(parseInt(j, 10) || 90, e ? 1 : 0, function () {
      e || h.hide()
      }), e || h.queue(function (a) {
      h.css({
        left: "",
        top: ""
      }), d(za).length || h.detach(), a()
      }), g = e, f.destroyed && (f = F), i)
    }
    }), i.init()
  }, xa = new xa, d.extend(w.prototype, {
    init: function (a) {
    var b = a.tooltip;
    return this.options.on ? (a.elements.overlay = xa.elem, b.addClass(ya).css("z-index", y.modal_zindex + d(za).length), a._bind(b, ["tooltipshow", "tooltiphide"], function (a, c, e) {
      var f = a.originalEvent;
      if (a.target === b[0]) if (f && "tooltiphide" === a.type && /mouse(leave|enter)/.test(f.type) && d(f.relatedTarget).closest(xa.elem[0]).length) try {
      a.preventDefault()
      } catch (g) {
      } else (!f || f && "tooltipsolo" !== f.type) && this.toggle(a, "tooltipshow" === a.type, e)
    }, this._ns, this), a._bind(b, "tooltipfocus", function (a, c) {
      if (!a.isDefaultPrevented() && a.target === b[0]) {
      var e = d(za), f = y.modal_zindex + e.length,
        g = parseInt(b[0].style.zIndex, 10);
      xa.elem[0].style.zIndex = f - 1, e.each(function () {
        this.style.zIndex > g && (this.style.zIndex -= 1)
      }), e.filter("." + $).qtip("blur", a.originalEvent), b.addClass($)[0].style.zIndex = f, xa.update(c);
      try {
        a.preventDefault()
      } catch (h) {
      }
      }
    }, this._ns, this), void a._bind(b, "tooltiphide", function (a) {
      a.target === b[0] && d(za).filter(":visible").not(b).last().qtip("focus", a)
    }, this._ns, this)) : this
    }, toggle: function (a, b, c) {
    return a && a.isDefaultPrevented() ? this : void xa.toggle(this.qtip, !!b, c)
    }, destroy: function () {
    this.qtip.tooltip.removeClass(ya), this.qtip._unbind(this.qtip.tooltip, this._ns), xa.toggle(this.qtip, E), delete this.qtip.elements.overlay
    }
  }), wa = R.modal = function (a) {
    return new w(a, a.options.show.modal)
  }, wa.sanitize = function (a) {
    a.show && ("object" != typeof a.show.modal ? a.show.modal = {on: !!a.show.modal} : "undefined" == typeof a.show.modal.on && (a.show.modal.on = D))
  }, y.modal_zindex = y.zindex - 200, wa.initialize = "render", B.modal = {
    "^show.modal.(on|blur)$": function () {
    this.destroy(), this.init(), this.qtip.elems.overlay.toggle(this.qtip.tooltip[0].offsetWidth > 0)
    }
  }, d.extend(D, y.defaults, {
    show: {
    modal: {
      on: E,
      effect: D,
      blur: D,
      stealfocus: D,
      escape: D
    }
    }
  }), R.viewport = function (c, d, e, f, g, h, i) {
    function j(a, b, c, e, f, g, h, i, j) {
    var k = d[f], s = u[a], t = v[a], w = c === Q,
      x = s === f ? j : s === g ? -j : -j / 2,
      y = t === f ? i : t === g ? -i : -i / 2,
      z = q[f] + r[f] - (n ? 0 : m[f]), A = z - k,
      B = k + j - (h === I ? o : p) - z,
      C = x - (u.precedance === a || s === u[b] ? y : 0) - (t === O ? i / 2 : 0);
    return w ? (C = (s === f ? 1 : -1) * x, d[f] += A > 0 ? A : B > 0 ? -B : 0, d[f] = Math.max(-m[f] + r[f], k - C, Math.min(Math.max(-m[f] + r[f] + (h === I ? o : p), k + C), d[f], "center" === s ? k - x : 1e9))) : (e *= c === P ? 2 : 0, A > 0 && (s !== f || B > 0) ? (d[f] -= C + e, l.invert(a, f)) : B > 0 && (s !== g || A > 0) && (d[f] -= (s === O ? -C : C) + e, l.invert(a, g)), d[f] < q[f] && -d[f] > B && (d[f] = k, l = u.clone())), d[f] - k
    }

    var k, l, m, n, o, p, q, r, s = e.target, t = c.elements.tooltip,
    u = e.my, v = e.at, w = e.adjust, x = w.method.split(" "),
    y = x[0], z = x[1] || x[0], A = e.viewport, B = e.container,
    C = {left: 0, top: 0};
    return A.jquery && s[0] !== a && s[0] !== b.body && "none" !== w.method ? (m = B.offset() || C, n = "static" === B.css("position"), k = "fixed" === t.css("position"), o = A[0] === a ? A.width() : A.outerWidth(E), p = A[0] === a ? A.height() : A.outerHeight(E), q = {
    left: k ? 0 : A.scrollLeft(),
    top: k ? 0 : A.scrollTop()
    }, r = A.offset() || C, "shift" === y && "shift" === z || (l = u.clone()), C = {
    left: "none" !== y ? j(G, H, y, w.x, L, N, I, f, h) : 0,
    top: "none" !== z ? j(H, G, z, w.y, K, M, J, g, i) : 0,
    my: l
    }) : C
  }, R.polys = {
    polygon: function (a, b) {
    var c, d, e, f = {
      width: 0,
      height: 0,
      position: {top: 1e10, right: 0, bottom: 0, left: 1e10},
      adjustable: E
    }, g = 0, h = [], i = 1, j = 1, k = 0, l = 0;
    for (g = a.length; g--;) c = [parseInt(a[--g], 10), parseInt(a[g + 1], 10)], c[0] > f.position.right && (f.position.right = c[0]), c[0] < f.position.left && (f.position.left = c[0]), c[1] > f.position.bottom && (f.position.bottom = c[1]), c[1] < f.position.top && (f.position.top = c[1]), h.push(c);
    if (d = f.width = Math.abs(f.position.right - f.position.left), e = f.height = Math.abs(f.position.bottom - f.position.top), "c" === b.abbrev()) f.position = {
      left: f.position.left + f.width / 2,
      top: f.position.top + f.height / 2
    }; else {
      for (; d > 0 && e > 0 && i > 0 && j > 0;) for (d = Math.floor(d / 2), e = Math.floor(e / 2), b.x === L ? i = d : b.x === N ? i = f.width - d : i += Math.floor(d / 2), b.y === K ? j = e : b.y === M ? j = f.height - e : j += Math.floor(e / 2), g = h.length; g-- && !(h.length < 2);) k = h[g][0] - f.position.left, l = h[g][1] - f.position.top, (b.x === L && k >= i || b.x === N && i >= k || b.x === O && (i > k || k > f.width - i) || b.y === K && l >= j || b.y === M && j >= l || b.y === O && (j > l || l > f.height - j)) && h.splice(g, 1);
      f.position = {left: h[0][0], top: h[0][1]}
    }
    return f
    },
    rect: function (a, b, c, d) {
    return {
      width: Math.abs(c - a),
      height: Math.abs(d - b),
      position: {left: Math.min(a, c), top: Math.min(b, d)}
    }
    },
    _angles: {
    tc: 1.5,
    tr: 7 / 4,
    tl: 5 / 4,
    bc: .5,
    br: .25,
    bl: .75,
    rc: 2,
    lc: 1,
    c: 0
    },
    ellipse: function (a, b, c, d, e) {
    var f = R.polys._angles[e.abbrev()],
      g = 0 === f ? 0 : c * Math.cos(f * Math.PI),
      h = d * Math.sin(f * Math.PI);
    return {
      width: 2 * c - Math.abs(g),
      height: 2 * d - Math.abs(h),
      position: {left: a + g, top: b + h},
      adjustable: E
    }
    },
    circle: function (a, b, c, d) {
    return R.polys.ellipse(a, b, c, c, d)
    }
  }, R.svg = function (a, c, e) {
    for (var f, g, h, i, j, k, l, m, n, o = c[0], p = d(o.ownerSVGElement), q = o.ownerDocument, r = (parseInt(c.css("stroke-width"), 10) || 0) / 2; !o.getBBox;) o = o.parentNode;
    if (!o.getBBox || !o.parentNode) return E;
    switch (o.nodeName) {
    case"ellipse":
    case"circle":
      m = R.polys.ellipse(o.cx.baseVal.value, o.cy.baseVal.value, (o.rx || o.r).baseVal.value + r, (o.ry || o.r).baseVal.value + r, e);
      break;
    case"line":
    case"polygon":
    case"polyline":
      for (l = o.points || [{
      x: o.x1.baseVal.value,
      y: o.y1.baseVal.value
      }, {
      x: o.x2.baseVal.value,
      y: o.y2.baseVal.value
      }], m = [], k = -1, i = l.numberOfItems || l.length; ++k < i;) j = l.getItem ? l.getItem(k) : l[k], m.push.apply(m, [j.x, j.y]);
      m = R.polys.polygon(m, e);
      break;
    default:
      m = o.getBBox(), m = {
      width: m.width,
      height: m.height,
      position: {left: m.x, top: m.y}
      }
    }
    return n = m.position, p = p[0], p.createSVGPoint && (g = o.getScreenCTM(), l = p.createSVGPoint(), l.x = n.left, l.y = n.top, h = l.matrixTransform(g), n.left = h.x, n.top = h.y), q !== b && "mouse" !== a.position.target && (f = d((q.defaultView || q.parentWindow).frameElement).offset(), f && (n.left += f.left, n.top += f.top)), q = d(q), n.left += q.scrollLeft(), n.top += q.scrollTop(), m
  }, R.imagemap = function (a, b, c) {
    b.jquery || (b = d(b));
    var e, f, g, h, i,
    j = (b.attr("shape") || "rect").toLowerCase().replace("poly", "polygon"),
    k = d('img[usemap="#' + b.parent("map").attr("name") + '"]'),
    l = d.trim(b.attr("coords")),
    m = l.replace(/,$/, "").split(",");
    if (!k.length) return E;
    if ("polygon" === j) h = R.polys.polygon(m, c); else {
    if (!R.polys[j]) return E;
    for (g = -1, i = m.length, f = []; ++g < i;) f.push(parseInt(m[g], 10));
    h = R.polys[j].apply(this, f.concat(c))
    }
    return e = k.offset(), e.left += Math.ceil((k.outerWidth(E) - k.width()) / 2), e.top += Math.ceil((k.outerHeight(E) - k.height()) / 2), h.position.left += e.left, h.position.top += e.top, h
  };
  var Aa,
    Ba = '<iframe class="qtip-bgiframe" frameborder="0" tabindex="-1" src="javascript:\'\';"  style="display:block; position:absolute; z-index:-1; filter:alpha(opacity=0); -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";"></iframe>';
  d.extend(x.prototype, {
    _scroll: function () {
    var b = this.qtip.elements.overlay;
    b && (b[0].style.top = d(a).scrollTop() + "px")
    }, init: function (c) {
    var e = c.tooltip;
    d("select, object").length < 1 && (this.bgiframe = c.elements.bgiframe = d(Ba).appendTo(e), c._bind(e, "tooltipmove", this.adjustBGIFrame, this._ns, this)), this.redrawContainer = d("<div/>", {id: S + "-rcontainer"}).appendTo(b.body), c.elements.overlay && c.elements.overlay.addClass("qtipmodal-ie6fix") && (c._bind(a, ["scroll", "resize"], this._scroll, this._ns, this), c._bind(e, ["tooltipshow"], this._scroll, this._ns, this)), this.redraw()
    }, adjustBGIFrame: function () {
    var a, b, c = this.qtip.tooltip,
      d = {height: c.outerHeight(E), width: c.outerWidth(E)},
      e = this.qtip.plugins.tip, f = this.qtip.elements.tip;
    b = parseInt(c.css("borderLeftWidth"), 10) || 0, b = {
      left: -b,
      top: -b
    }, e && f && (a = "x" === e.corner.precedance ? [I, L] : [J, K], b[a[1]] -= f[a[0]]()), this.bgiframe.css(b).css(d)
    }, redraw: function () {
    if (this.qtip.rendered < 1 || this.drawing) return this;
    var a, b, c, d, e = this.qtip.tooltip,
      f = this.qtip.options.style,
      g = this.qtip.options.position.container;
    return this.qtip.drawing = 1, f.height && e.css(J, f.height), f.width ? e.css(I, f.width) : (e.css(I, "").appendTo(this.redrawContainer), b = e.width(), 1 > b % 2 && (b += 1), c = e.css("maxWidth") || "", d = e.css("minWidth") || "", a = (c + d).indexOf("%") > -1 ? g.width() / 100 : 0, c = (c.indexOf("%") > -1 ? a : 1 * parseInt(c, 10)) || b, d = (d.indexOf("%") > -1 ? a : 1 * parseInt(d, 10)) || 0, b = c + d ? Math.min(Math.max(b, d), c) : b, e.css(I, Math.round(b)).appendTo(g)), this.drawing = 0, this
    }, destroy: function () {
    this.bgiframe && this.bgiframe.remove(), this.qtip._unbind([a, this.qtip.tooltip], this._ns)
    }
  }), Aa = R.ie6 = function (a) {
    return 6 === da.ie ? new x(a) : E
  }, Aa.initialize = "render", B.ie6 = {
    "^content|style$": function () {
    this.redraw()
    }
  }
  })
}(window, document);
//# sourceMappingURL=jquery.qtip.min.map


!function (a) {
  "use strict";
  "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function (a) {
  "use strict";

  function b(a) {
  if (a instanceof Date) return a;
  if (String(a).match(g)) return String(a).match(/^[0-9]*$/) && (a = Number(a)), String(a).match(/\-/) && (a = String(a).replace(/\-/g, "/")), new Date(a);
  throw new Error("Couldn't cast `" + a + "` to a date object.")
  }

  function c(a) {
  var b = a.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
  return new RegExp(b)
  }

  function d(a) {
  return function (b) {
    var d = b.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);
    if (d) for (var f = 0, g = d.length; f < g; ++f) {
    var h = d[f].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),
      j = c(h[0]), k = h[1] || "", l = h[3] || "", m = null;
    h = h[2], i.hasOwnProperty(h) && (m = i[h], m = Number(a[m])), null !== m && ("!" === k && (m = e(l, m)), "" === k && m < 10 && (m = "0" + m.toString()), b = b.replace(j, m.toString()))
    }
    return b = b.replace(/%%/, "%")
  }
  }

  function e(a, b) {
  var c = "s", d = "";
  return a && (a = a.replace(/(:|;|\s)/gi, "").split(/\,/), 1 === a.length ? c = a[0] : (d = a[0], c = a[1])), Math.abs(b) > 1 ? c : d
  }

  var f = [], g = [], h = {precision: 100, elapse: !1, defer: !1};
  g.push(/^[0-9]*$/.source), g.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), g.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), g = new RegExp(g.join("|"));
  var i = {
  Y: "years",
  m: "months",
  n: "daysToMonth",
  d: "daysToWeek",
  w: "weeks",
  W: "weeksToMonth",
  H: "hours",
  M: "minutes",
  S: "seconds",
  D: "totalDays",
  I: "totalHours",
  N: "totalMinutes",
  T: "totalSeconds"
  }, j = function (b, c, d) {
  this.el = b, this.$el = a(b), this.interval = null, this.offset = {}, this.options = a.extend({}, h), this.instanceNumber = f.length, f.push(this), this.$el.data("countdown-instance", this.instanceNumber), d && ("function" == typeof d ? (this.$el.on("update.countdown", d), this.$el.on("stoped.countdown", d), this.$el.on("finish.countdown", d)) : this.options = a.extend({}, h, d)), this.setFinalDate(c), this.options.defer === !1 && this.start()
  };
  a.extend(j.prototype, {
  start: function () {
    null !== this.interval && clearInterval(this.interval);
    var a = this;
    this.update(), this.interval = setInterval(function () {
    a.update.call(a)
    }, this.options.precision)
  }, stop: function () {
    clearInterval(this.interval), this.interval = null, this.dispatchEvent("stoped")
  }, toggle: function () {
    this.interval ? this.stop() : this.start()
  }, pause: function () {
    this.stop()
  }, resume: function () {
    this.start()
  }, remove: function () {
    this.stop.call(this), f[this.instanceNumber] = null, delete this.$el.data().countdownInstance
  }, setFinalDate: function (a) {
    this.finalDate = b(a)
  }, update: function () {
    if (0 === this.$el.closest("html").length) return void this.remove();
    var b, c = void 0 !== a._data(this.el, "events"), d = new Date;
    b = this.finalDate.getTime() - d.getTime(), b = Math.ceil(b / 1e3), b = !this.options.elapse && b < 0 ? 0 : Math.abs(b), this.totalSecsLeft !== b && c && (this.totalSecsLeft = b, this.elapsed = d >= this.finalDate, this.offset = {
    seconds: this.totalSecsLeft % 60,
    minutes: Math.floor(this.totalSecsLeft / 60) % 60,
    hours: Math.floor(this.totalSecsLeft / 60 / 60) % 24,
    days: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
    daysToWeek: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
    daysToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 % 30.4368),
    weeks: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7),
    weeksToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7) % 4,
    months: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 30.4368),
    years: Math.abs(this.finalDate.getFullYear() - d.getFullYear()),
    totalDays: Math.floor(this.totalSecsLeft / 60 / 60 / 24),
    totalHours: Math.floor(this.totalSecsLeft / 60 / 60),
    totalMinutes: Math.floor(this.totalSecsLeft / 60),
    totalSeconds: this.totalSecsLeft
    }, this.options.elapse || 0 !== this.totalSecsLeft ? this.dispatchEvent("update") : (this.stop(), this.dispatchEvent("finish")))
  }, dispatchEvent: function (b) {
    var c = a.Event(b + ".countdown");
    c.finalDate = this.finalDate, c.elapsed = this.elapsed, c.offset = a.extend({}, this.offset), c.strftime = d(this.offset), this.$el.trigger(c)
  }
  }), a.fn.countdown = function () {
  var b = Array.prototype.slice.call(arguments, 0);
  return this.each(function () {
    var c = a(this).data("countdown-instance");
    if (void 0 !== c) {
    var d = f[c], e = b[0];
    j.prototype.hasOwnProperty(e) ? d[e].apply(d, b.slice(1)) : null === String(e).match(/^[$A-Z_][0-9A-Z_$]*$/i) ? (d.setFinalDate.call(d, e), d.start()) : a.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi, e))
    } else new j(this, b[0], b[1])
  })
  }
});

/*global jQuery */
/*!
* Lettering.JS 0.7.0
*/
(function ($) {
  function injector(t, splitter, klass, after) {
  var text = t.text()
    , a = text.split(splitter)
    , inject = '';
  if (a.length) {
    $(a).each(function (i, item) {
    if (item.length != 0)
      inject += '<span class="' + klass + (i + 1) + '" aria-hidden="true">' + item + '</span>' + after;
    });
    t.attr('aria-label', text)
    .empty()
    .append(inject)

  }
  }


  var methods = {
  init: function () {
    return this.each(function () {
    injector($(this), '', 'char', '');
    });

  },

  words: function () {
    return this.each(function () {
    injector($(this), ' ', 'word', ' ');
    });

  },

  lines: function () {
    return this.each(function () {
    var r = "eefec303079ad17405c889e092e105b0";
    injector($(this).children("br").replaceWith(r).end(), r, 'line', '');
    });

  }
  };

  $.fn.lettering = function (method) {
  if (method && methods[method]) {
    return methods[method].apply(this, [].slice.call(arguments, 1));
  } else if (method === 'letters' || !method) {
    return methods.init.apply(this, [].slice.call(arguments, 0)); // always pass an array
  }
  $.error('Method ' + method + ' does not exist on jQuery.lettering');
  return this;
  };

})(jQuery);



Drupal.behaviors.slick_tacgiatacpham = {
  attach: function (context, settings) {
  var g = $("#block-views-tacgia-tacpham-block .view-id-tacgia_tacpham > .view-content");
  if (g.length != 0) {
    g.not('.slick-initialized').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    accessibility: false,
    dots: 1,
    arrows: !0,
    focusOnSelect: !0,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 1,
      dots: 0,
      arrows: 0,
      focusOnSelect: !0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    }, {
      breakpoint: 640,
      settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      focusOnSelect: !0,
      arrows: !0
      }
    }]
    })
  }
  }
};


Drupal.behaviors.slick_combongay = {
  attach: function (context, settings) {
  var e = $("#block-views-sachbanchay-block-5 .view-id-sachbanchay .view-content");
  if (e.length != 0) {
    e.not('.slick-initialized').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    accessibility: false,
    dots: 1,
    arrows: !0,
    focusOnSelect: 0,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    },  {
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      focusOnSelect: !0,
      arrows: !0
      }
    }]
    })
  }
  }
};

Drupal.behaviors.slick_sachbanchay = {
  attach: function (context, settings) {
  var f = $("#block-views-sachbanchay-block-6 .view-id-sachbanchay .view-content");
  if (f.length != 0) {
    f.not('.slick-initialized').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    dots: 1,
    accessibility: false,
    arrows: !0,
    focusOnSelect: !0,
    responsive: [{
      breakpoint: 1023,
      settings: {
      dots: 0,
      arrows: !0,
      slidesToShow: 3,
   	  slidesToScroll: 3,
      focusOnSelect: !0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    }, {
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      focusOnSelect: !0,
      arrows: !0
      }
    }]
    })
  }
  }
};



Drupal.behaviors.slick_sachcungtacgia = {
  attach: function (context, settings) {
  var j = $(".view-sachbanchay.view-display-id-block_4 .view-content");
  if (j.length != 0) {
    j.not('.slick-initialized').slick({
    dots: !1,
    infinite: !0,
    slidesToShow: 5,
    focusOnSelect: false,
    slidesToScroll: 5,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: !1
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      lidesToScroll: 3,
      arrows: !0
      }
    },{
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      lidesToScroll: 2,
      arrows: !0
      }
    }]
    })
  }
  }
};

Drupal.behaviors.slick_sachcungbo = {
  attach: function (context, settings) {
  var j = $(".view-sachbanchay.view-display-id-block_14 .view-content");
  if (j.length != 0) {
    j.not('.slick-initialized').slick({
    dots: !1,
    infinite: !0,
    slidesToShow: 5,

    focusOnSelect: false,
    slidesToScroll: 5,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: !1
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      lidesToScroll: 3,
      arrows: !0
      }
    }, {
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      lidesToScroll: 2,
      arrows: !0
      }
    }]
    })
  }
  }
};
Drupal.behaviors.slick_tapchicungloai = {
  attach: function (context, settings) {
  var j = $(".view-sachbanchay.view-display-id-block_15 .view-content");
  if (j.length != 0) {
    j.not('.slick-initialized').slick({
    dots: !1,
    infinite: !0,
    slidesToShow: 5,
    focusOnSelect: false,
    slidesToScroll: 5,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: !1
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      lidesToScroll: 3,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      lidesToScroll: 2,
      arrows: !0
      }
    }]
    })
  }
  }
};

Drupal.behaviors.slick_goiysach = {
  attach: function (context, settings) {
  var i = $(".view-sachbanchay.view-display-id-block_3 .view-content");
  if (i.length != 0) {
    i.not('.slick-initialized').slick({
    dots: !1,
    infinite: !0,
    slidesToShow: 5,
    focusOnSelect: false,
    slidesToScroll: 5,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: !0
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      lidesToScroll: 3,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      lidesToScroll: 2,
      arrows: !0
      }
    }]
    })
  }
  }
};
Drupal.behaviors.resize_js = {
  attach: function (context, settings) {
  var cungtgsach = $(".field-name-field-tacgia-sach .view-ds-sach > .view-content");
  if (cungtgsach.length != 0) {
    cungtgsach.slick({
    dots: !1,
    infinite: !0,
    accessibility: false,
    slidesToShow: 5,
    slidesToScroll: 5,
    swipeToSlide: true,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: !1,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll:3,
      arrows: !0,
      }
    },
      {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll:2,
        arrows: !0,
      }
      }]
    });
  }
  if (window.screen.width < 1000) {
    /*============SACH CUNG TAC GIA=======*/
    var cungtg = $(".field-name-field-product-cung-tacgia .view-sachbanchay ul");
    cungtg.slick({
    dots: !1,
    infinite: !0,
    slidesToShow: 5,
    focusOnSelect: true,
    accessibility: false,
    slidesToScroll: 5,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: !1,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      lidesToScroll: 3,
      arrows: !0,
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      lidesToScroll: 2,
      arrows: !0,
      }
    }]
    });

    /*============GOI Y CHO BAN=======*/
    var goiy = $(".field-name-field-product-goiy-choban .view-sachbanchay ul");
    goiy.slick({
    dots: !1,
    infinite: !0,
    accessibility: false,
    slidesToShow: 5,
    slidesToScroll: 5,
    swipeToSlide: true,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: !0
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: !0
      }
    },
      {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        arrows: !0,
      }
      }]
    });

    /*============DS TAP CHI=======*/
    // var tapchi_ds = $(".view-id-sachbanchay.view-display-id-page_1 ul");
    // tapchi_ds.slick({
    // dots: !1,
    // infinite: !0,
    // slidesToShow: 5,
    // swipeToSlide: true,
    // accessibility: false,
    // slidesToScroll: 5,
    // responsive: [{
    //   breakpoint: 1023,
    //   settings: {
    //   slidesToShow: 3,
    //   slidesToScroll: 3,
    //   arrows: !1,
    //   }
    // }, {
    //   breakpoint: 768,
    //   settings: {
    //   slidesToShow: 3,
    //   slidesToScroll: 3,
    //   arrows: !0,
    //   }
    // }, {
    //   breakpoint: 480,
    //   settings: {
    //   slidesToShow: 2,
    //   slidesToScroll: 2,
    //   arrows: !0,
    //   }
    // }]
    // });

    // =============TUYEN TAP HOME ============
    var tuyentap = $("#block-views-tuyentap-home-block-1 ul");
    tuyentap.slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: !0,

    accessibility: false,
    arrows: !0,
    focusOnSelect: !0,
    responsive: [{
      breakpoint: 768,
      settings: {
      }
    }]
    });

    //================TAC GIA HOME==========
    var e = $("#block-views-tacgia-tacpham-block ul ");
    e.slick({
    dots: !1,
    infinite: !0,

    accessibility: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: "<span class='prev'></span>",
    nextArrow: "<span class='next'></span>",
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      arrows: !0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      arrows: !0,
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      arrows: !0,
      }
    }]
    });

    /*==========CHU DE=========*/
    var o = $("#block-block-35 ul.nav-tabs");
    o.slick({
    dots: !1,
    infinite: !0,

    accessibility: false,
    slidesToShow: 6,
    slidesToScroll: 1,
    prevArrow: "<span class='prev'></span>",
    nextArrow: "<span class='next'></span>",
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 1,
      arrows: !0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 1,
      arrows: !0,
      }
    }]
    });
  }
  }
};

Drupal.behaviors.comic_maga_home = {
  attach: function (context, settings) {
  var f = $("#block-views-sachbanchay-block-10 .view-id-sachbanchay .view-content");
  if (f.length != 0) {
    f.not('.slick-initialized').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    accessibility: false,
    dots: 1,
    arrows: !0,
    focusOnSelect: 0,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: 0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    },  {
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      focusOnSelect: !0,
      arrows: !0
      }
    }]
    })
  }

  var tacgia = $("#block-views-tacgia-tacpham-block-1 .view-tacgia-tacpham > .view-content");
  if (tacgia.length != 0) {
    tacgia.slick({
    // lazyLoad: 'ondemand',
    slidesToShow: 2,
    slidesToScroll: 1,
    dots: 0,
    accessibility: false,
    arrows: !0,
    focusOnSelect: !0,
    responsive: [{
      breakpoint: 768,
      settings: {
      slidesToShow: 2

      }
    }]
    });
  }
  }
};

Drupal.behaviors.comic_maga_home2 = {
  attach: function (context, settings) {
  var f = $("#block-views-sachbanchay-block-9 .view-id-sachbanchay .view-content");
  if (f.length != 0) {
    f.not('.slick-initialized').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    dots: 1,
    accessibility: false,
    arrows: !0,
    focusOnSelect: 0,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: 0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    },  {
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      focusOnSelect: !0,
      arrows: !0
      }
    }]
    })
  }

  var w = $("#block-views-sachbanchay-block-16 .view-id-sachbanchay .view-content");
  if (w.length != 0) {
    w.not('.slick-initialized').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    dots: 1,
    accessibility: false,
    arrows: !0,
    focusOnSelect: 0,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: 0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    },  {
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      focusOnSelect: !0,
      arrows: !0
      }
    }]
    })
  }
  }
};


Drupal.behaviors.tap_chi_home = {
  attach: function (context, settings) {
  var f = $("#block-views-sachbanchay-block-11 .view-id-sachbanchay .view-content");
  if (f.length != 0) {
    f.not('.slick-initialized').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    dots: 1,
    accessibility: false,
    arrows: !0,
    focusOnSelect: 0,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: 0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    },  {
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      focusOnSelect: !0,
      arrows: !0
      }
    }]
    })
  }
  }
};


Drupal.behaviors.san_pham_moi_page = {
  attach: function (context, settings) {
  var f = $("body.page-sach-theo-chu-de .view-sachtheo-chude-new .view-sachbanchay").find('.view-content');
  if (f.length != 0) {
    f.not('.slick-initialized').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    accessibility: false,
    dots: 1,
    arrows: !0,
    focusOnSelect: 0,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: 0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    }, {
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      focusOnSelect: !0,
      arrows: !0
      }
    }]
    });
  }
  }
};


Drupal.behaviors.san_pham_khac_home = {
  attach: function (context, settings) {
  var l = $(".view-sachbanchay.view-display-id-block_8 .view-content");
  if(l.length !=0){
    l.not('.slick-initialized').slick({
      dots: !1,
      infinite: !0,
      slidesToShow: 5,

      focusOnSelect: false,
      slidesToScroll: 5,
      responsive: [{
      breakpoint: 1023,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: !1
      }
      }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        lidesToScroll: 3,
        arrows: !1
      	}
      },{
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    },{
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        lidesToScroll: 1,
        arrows: !1
      }
      }]
    })
  }

  var f = $("#block-views-sachbanchay-block-12 .view-id-sachbanchay .view-content");
  if (f.length != 0) {
    f.not('.slick-initialized').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    accessibility: false,
    dots: 1,
    arrows: !0,
    focusOnSelect: 0,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: 0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    },  {
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      focusOnSelect: !0,
      arrows: !0
      }
    }]
    })
  }
  var d = $("#block-views-sachbanchay-block-13 .view-id-sachbanchay .view-content");
  if (d.length != 0) {
    d.not('.slick-initialized').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    dots: 1,
    arrows: !0,
    accessibility: false,
    focusOnSelect: 0,
    responsive: [{
      breakpoint: 1023,
      settings: {
      slidesToShow: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: 0,
      }
    }, {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: 0,
      arrows: !0,
      focusOnSelect: !0,
      }
    },  {
      breakpoint: 640,
      settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      focusOnSelect: !0,
      arrows: !0
      }
    }, {
      breakpoint: 480,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
      focusOnSelect: !0,
      arrows: !0
      }
    }]
    })
  }
  }
};


Drupal.behaviors.gallery_js = {
  attach: function (context, settings) {
    $('.field-name-field-news-thuvienanh .field-items > .field-item').addClass('col-xs-6 col-sm-4 col-lg-3');
    $(window).bind('scroll', function () {
      if ($(window).scrollTop() > 82) {$('#navbar').addClass('fixed');}
      else {$('#navbar').removeClass('fixed');
      }
    });

    $('.footer').removeClass('container');
  }
};


Drupal.behaviors.caculate_js = {
  attach: function (context, settings) {
  var hrefSelect = $('#buy-all').attr('href');
  $(".taxo-chu-de-img").on("click", function (event) {
    var checkbox = $(this).parent().find("input[type='checkbox']");
    if (!checkbox.prop("checked")) {checkbox.prop("checked", true);
    } else {checkbox.prop("checked", false);}
    var newvalues = [];
    var musicians = [];
    var sotiens = [];
    var sotiens_km = [];
    var total = 0;
    var total_km = 0;
    $('.view-khuyenmai-sub2 ul li input[type=checkbox]').each(function () {
    if ($(this).is(':checked')) {
      newvalues.push($(this).val());
      var musicianTypes = $(this).val();
      var sotien_sub = $(this).next().text();
      var sotien_sub_km = $(this).next().next().text();
      musicians.push(musicianTypes);
      sotiens.push(sotien_sub);
      sotiens_km.push(sotien_sub_km);
      $(this).parent().addClass('active');
      $(this).attr('checked', 'checked');
      $(this).prev().find(".img-hover").html("<img src='/images/webkimdong/chon-mua-select.png'>");
    } else {
      for (var i = 0; i < newvalues.length; i++) {
      if (newvalues[i] == $(this).val()) {
        newvalues.splice(i, 1);
        musicians.splice(i, 1);
        sotiens.splice(i, 1);
        sotiens_km.splice(i, 1);
      }
      }
      $(this).parent().removeClass('active');
      $(this).prev().find(".img-hover").html("<img src='/images/webkimdong/chon-mua-hover.png'>");
    }
    });
    var txtNid = newvalues.join(',');
    $('#buy-all').attr('href', hrefSelect + txtNid);
    for (var i = 0; i < sotiens.length; i++) {
    total += sotiens[i] << 0;
    }
    for (var j = 0; j < sotiens_km.length; j++) {
    total_km += parseInt(sotiens_km[j]) << 0;
    }
    var duocgiam = ((total - total_km) * -1);
    $(".js-total-pay-price").html(comma_thousands(total));
    $(".js-total-discount-price").html(comma_thousands(duocgiam));
  });

  function comma_thousands(number) {
    number = number.toString();
    number = number.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    return number;
  }
  }
};


Drupal.behaviors.kimdong_js = {
  attach: function (context, settings) {
    $('#edit-mimemail').hide();
    $('.form-item-edit-field-product-chude-tid-1-70').remove();
    $('#views-exposed-form-hieusach-page .views-exposed-widget option[value="All"]').text('Thể loại');
    $('#simplenews-block-form-126 #edit-realname').attr('placeholder', 'Tên của bạn');
    $('#simplenews-block-form-126 #edit-mail').attr('placeholder', 'Email của bạn');
    $('#edit-code').attr('placeholder', 'Nhập mã phiếu giảm giá');
    $('#edit-panes-coupon-code').attr('placeholder', 'Mã giảm giá');
  }
};


Drupal.behaviors.qtip_js = {
  attach: function (context, settings) {
  $('a.qtip_map').each(function () {
    var target_this = $(this);
    $(this).qtip({
    content: {
      text: function (event, api) {
      $.ajax({
        url: api.elements.target.attr('data-href')
      })
        .then(function (content) {
        api.set('content.text', content);
        }, function (xhr, status, error) {
        api.set('content.text', status + ': ' + error);
        });
      return 'Đang tải...'; // Set some initial text
      }
    },
    position: {
      my: 'center center',
      at: 'center center',
      target: '#qtip-overlay'
    },
    show: {modal: true, escape: true},
    hide: {target: $('#qtip-overlay')},
    style: {classes: 'map-cuahang qtip-blue qtip-bootstrap',width: "500px",}
    });
  });
  }
};

$(document).ready(function () {
  $('.list-add-to-cart, .flag > a').text('');
  $('button#edit-submit-hieusach').parent().append('<span class="layer-submit"><img class="" src="/images/kimdongnew/search_icon.png"> <span>Tìm kiếm</span></span>');
  if ($('#top').length) {$("#dz_main_header").addClass("quantri");}
  $("#edit-panes-delivery-address-delivery-country").append('<option value=0 selected="">- Tỉnh Thành Phố -</option>');
  $("#edit-panes-delivery-address-delivery-zone option[value = 0]").text("-Chọn Quận/Huyện/TX");
  $('#block-views-exp-hieusach-page #edit-title').val('');

  $('.page-cart #cart-form-pane .table-responsive button').html('<i class="fa fa-times" aria-hidden="true"></i>');
  $("body").show();
  $('.cart-updated').addClass('hidden');
  $(document).on('click', '#close-cart-noti', function () {
  $('.cart-updated').addClass('hidden');
  });

  $(document).on('change', '#same-address', function () {
  if ($("#same-address").prop('checked')) {
    $('#delivery-pane').show();
    if ($("#edit-panes-delivery-copy-address").prop('checked')) {
      $("#edit-panes-delivery-copy-address").click();
    }
  } else {
    if ($("#edit-panes-delivery-copy-address").prop('checked')) {
      $("#edit-panes-delivery-copy-address").click();
    }
    $('#delivery-pane').hide();
  }
  });

  var br_tapchi = $('.page-node .breadcrumb > li:nth-child(3) a').text();
  if (br_tapchi == "Tạp chí") {$('.field-name-field-product-goiy-choban .block-title').text('Tạp chí cùng loại');}
  $(".required").attr('required', 'required');
  $('.list-sheduled .news-title a').lettering('words');
  $('.tacgia_home_title a').lettering('words');
  $('.tacgia_home_title a span:empty').remove();
  $('.tacgia_home_title a span:last-child').addClass('lastname');
  $('.c-author-listing--details .c-author-listing--title').lettering('words');
  $('.c-author-listing--title  span:empty').remove();
  $('.c-author-listing--title  span:last-child').addClass('lastname');

  var releaseDate = $("#release-date").text();
  $("#release-date").hide();
  $("#countdown").countdown(releaseDate, function (event) {
  $(this).find('.day').text(event.strftime('%D'));
  $(this).find('.hour').text(event.strftime('%H'));
  $(this).find('.minute').text(event.strftime('%M'));
  $(this).find('.second').text(event.strftime('%S'));
  });

  // rút ngắn tên sách
  $('.c-product-item--title-container a').each(function () {
  var str = $(this).text();
  if (str.length > 28) {
    str = str.substring(0, 26);
    var lastIndex = str.lastIndexOf(" ");
    str = str.substring(0, lastIndex);
    $(this).text(str + " ...");
  }
  });


  // $('.uc-out-of-stock-instock').each(function () {});
  // $('.ajax-cart-submit-form').each(function () {
  //   var stock_level = $(this).find('.uc-out-of-stock-instock').text();
  // });

  // rút ngắn tên tác giả
  $('.c-loop-authors-summary').each(function () {
  var str = $(this).text();
  if (str.length > 28) {
    str = str.substring(0, 25);
    var lastIndex = str.lastIndexOf(" ");
    str = str.substring(0, lastIndex);
    $(this).text(str + " ...");
  }
  });


  // $('.ajax-cart-submit-form .form-type-uc-quantity').append('<div class="plus">+</div>');
  $('.ajax-cart-submit-form .form-type-uc-quantity input#edit-qty').after('<div class="plus">+</div>');
  // $('.ajax-cart-submit-form .form-type-uc-quantity label').after('<div class="minus">-</div>');
  $('.ajax-cart-submit-form .form-type-uc-quantity input#edit-qty').before('<div class="minus">-</div>');
  $('.plus').click(function () {
  qtyOri = parseInt($('form.ajax-cart-submit-form input#edit-qty').val());
  $('.ajax-cart-submit-form #edit-qty').val(qtyOri + 1);
  });

  $('.minus').click(function () {
  qtyOri = parseInt($('form.ajax-cart-submit-form input#edit-qty').val());
  if (qtyOri <= 1) { alert('Số lượng phải lớn hơn 0');}
  else {$('.ajax-cart-submit-form #edit-qty').val(qtyOri - 1);}
  });

  $(document).on('click', '.btn-buy', function(event) {
  event.preventDefault();
  $(".node-add-to-cart").first().click();
  $(document).ajaxStop(function () {
    window.location.href = '/cart';
  });
  });

  $(document).ajaxComplete(function () {
  if ($(".page-node .chitietsp .add-to-cart .uc_out_of_stock_html").has('.het-hang').length === 1) {
		$('.add-to-cart .form-type-uc-quantity').remove();
		$('.form-type-uc-quantity .plus').remove();
		$('.form-type-uc-quantity .minus').remove();
  } else {
			$(".page-node .ajax-cart-submit-form-button").text('Thêm vào giỏ hàng');
			$(".page-node .chitietsp .add-to-cart .plus").parent().append('<button title="Mua ngay" class="btn btn-danger btn-buy">MUA NGAY</button>');

		    var phathanh = $('.date-display-single').first().text();
		    if (phathanh !== null && phathanh !== '') {
			    var from = phathanh.split("/");
			    var f = new Date(from[2], from[1] - 1, from[0]);
			    var now = Date.now();
			    if (f < now) {

			    } else {
			    	$(".page-node .chitietsp .add-to-cart .plus").parent().append('<button title="Đặt trước" class="btn btn-warning btn-buy btn-preorder">ĐẶT TRƯỚC</button>');
			    }
		    } else {
			    $(".not-front.page-node .ajax-cart-submit-form-button").text('HẾT HÀNG').attr('disabled', 'disabled');
			    $('.add-to-cart .form-type-uc-quantity').remove();
			    $('.form-type-uc-quantity .plus').remove();
			    $('.form-type-uc-quantity .minus').remove();
		    }
	  	}
  });
});
$(document).ready(function () {
	$('.view-id-sachbanchay .view-content').on('afterChange', function(event, slick, currentSlide, nextSlide){
	     window.scrollBy({
	      top: 1,
	      behavior: 'smooth'
	    });
	});
});;
