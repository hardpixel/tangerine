(function(c,b,a,d){Foundation.libs.reveal={name:"reveal",version:"4.0.9",locked:false,settings:{animation:"fadeAndPop",animationSpeed:250,closeOnBackgroundClick:true,dismissModalClass:"close-reveal-modal",bgClass:"reveal-modal-bg",open:function(){},opened:function(){},close:function(){},closed:function(){},bg:c(".reveal-modal-bg"),css:{open:{opacity:0,visibility:"visible",display:"block"},close:{opacity:1,visibility:"hidden",display:"none"}}},init:function(f,g,e){this.scope=f||this.scope;Foundation.inherit(this,"data_options delay");if(typeof g==="object"){c.extend(true,this.settings,g)}if(typeof g!="string"){this.events();return this.settings.init}else{return this[g].call(this,e)}},events:function(){var e=this;c(this.scope).off(".fndtn.reveal").on("click.fndtn.reveal","[data-reveal-id]",function(f){f.preventDefault();if(!e.locked){e.locked=true;e.open.call(e,c(this))}}).on("click.fndtn.reveal touchend.click.fndtn.reveal",this.close_targets(),function(f){f.preventDefault();if(!e.locked){e.locked=true;e.close.call(e,c(this).closest(".reveal-modal"))}}).on("open.fndtn.reveal",".reveal-modal",this.settings.open).on("opened.fndtn.reveal",".reveal-modal",this.settings.opened).on("opened.fndtn.reveal",".reveal-modal",this.open_video).on("close.fndtn.reveal",".reveal-modal",this.settings.close).on("closed.fndtn.reveal",".reveal-modal",this.settings.closed).on("closed.fndtn.reveal",".reveal-modal",this.close_video);return true},open:function(g){if(g){var f=c("#"+g.data("reveal-id"))}else{var f=c(this.scope)}if(!f.hasClass("open")){var e=c(".reveal-modal.open");if(typeof f.data("css-top")==="undefined"){f.data("css-top",parseInt(f.css("top"),10)).data("offset",this.cache_offset(f))}f.trigger("open");if(e.length<1){this.toggle_bg(f)}this.hide(e,this.settings.css.open);this.show(f,this.settings.css.open)}},close:function(f){var f=f||c(this.scope),e=c(".reveal-modal.open");if(e.length>0){this.locked=true;f.trigger("close");this.toggle_bg(f);this.hide(e,this.settings.css.close)}},close_targets:function(){var e="."+this.settings.dismissModalClass;if(this.settings.closeOnBackgroundClick){return e+", ."+this.settings.bgClass}return e},toggle_bg:function(e){if(c(".reveal-modal-bg").length===0){this.settings.bg=c("<div />",{"class":this.settings.bgClass}).appendTo("body")}if(this.settings.bg.filter(":visible").length>0){this.hide(this.settings.bg)}else{this.show(this.settings.bg)}},show:function(g,f){if(f){if(/pop/i.test(this.settings.animation)){f.top=c(b).scrollTop()-g.data("offset")+"px";var e={top:c(b).scrollTop()+g.data("css-top")+"px",opacity:1};return this.delay(function(){return g.css(f).animate(e,this.settings.animationSpeed,"linear",function(){this.locked=false;g.trigger("opened")}.bind(this)).addClass("open")}.bind(this),this.settings.animationSpeed/2)}if(/fade/i.test(this.settings.animation)){var e={opacity:1};return this.delay(function(){return g.css(f).animate(e,this.settings.animationSpeed,"linear",function(){this.locked=false;g.trigger("opened")}.bind(this)).addClass("open")}.bind(this),this.settings.animationSpeed/2)}return g.css(f).show().css({opacity:1}).addClass("open").trigger("opened")}if(/fade/i.test(this.settings.animation)){return g.fadeIn(this.settings.animationSpeed/2)}return g.show()},hide:function(g,f){if(f){if(/pop/i.test(this.settings.animation)){var e={top:-c(b).scrollTop()-g.data("offset")+"px",opacity:0};return this.delay(function(){return g.animate(e,this.settings.animationSpeed,"linear",function(){this.locked=false;g.css(f).trigger("closed")}.bind(this)).removeClass("open")}.bind(this),this.settings.animationSpeed/2)}if(/fade/i.test(this.settings.animation)){var e={opacity:0};return this.delay(function(){return g.animate(e,this.settings.animationSpeed,"linear",function(){this.locked=false;g.css(f).trigger("closed")}.bind(this)).removeClass("open")}.bind(this),this.settings.animationSpeed/2)}return g.hide().css(f).removeClass("open").trigger("closed")}if(/fade/i.test(this.settings.animation)){return g.fadeOut(this.settings.animationSpeed/2)}return g.hide()},close_video:function(h){var g=c(this).find(".flex-video"),f=g.find("iframe");if(f.length>0){f.attr("data-src",f[0].src);f.attr("src","about:blank");g.fadeOut(100).hide()}},open_video:function(h){var g=c(this).find(".flex-video"),f=g.find("iframe");if(f.length>0){var i=f.attr("data-src");if(typeof i==="string"){f[0].src=f.attr("data-src")}g.show().fadeIn(100)}},cache_offset:function(e){var f=e.show().height()+parseInt(e.css("top"),10);e.hide();return f},off:function(){c(this.scope).off(".fndtn.reveal")}}}(Foundation.zj,this,this.document));