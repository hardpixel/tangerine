(function(c,b,a,d){Foundation.libs.dropdown={name:"dropdown",version:"4.1.0",settings:{activeClass:"open"},init:function(f,g,e){this.scope=f||this.scope;Foundation.inherit(this,"throttle scrollLeft");if(typeof g==="object"){c.extend(true,this.settings,g)}if(typeof g!="string"){if(!this.settings.init){this.events()}return this.settings.init}else{return this[g].call(this,e)}},events:function(){var e=this;c(this.scope).on("click.fndtn.dropdown","[data-dropdown]",function(f){f.preventDefault();f.stopPropagation();e.toggle(c(this))});c("*, html, body").on("click.fndtn.dropdown",function(f){if(!c(f.target).data("dropdown")){c("[data-dropdown-content]").css(Foundation.rtl?"right":"left","-99999px").removeClass(e.settings.activeClass)}});c(b).on("resize.fndtn.dropdown",e.throttle(function(){e.resize.call(e)},50)).trigger("resize");this.settings.init=true},toggle:function(f,e){var g=c("#"+f.data("dropdown"));c("[data-dropdown-content]").not(g).css(Foundation.rtl?"right":"left","-99999px").removeClass(this.settings.activeClass);if(g.hasClass(this.settings.activeClass)){g.css(Foundation.rtl?"right":"left","-99999px").removeClass(this.settings.activeClass)}else{this.css(g.addClass(this.settings.activeClass),f)}},resize:function(){var f=c("[data-dropdown-content].open"),e=c("[data-dropdown='"+f.attr("id")+"']");if(f.length&&e.length){this.css(f,e)}},css:function(h,g){var e=g.position();e.top+=g.offsetParent().offset().top;e.left+=g.offsetParent().offset().left;if(this.small()){h.css({position:"absolute",width:"95%",left:"2.5%","max-width":"none",top:e.top+this.outerHeight(g)})}else{if(!Foundation.rtl&&c(b).width()>this.outerWidth(h)+g.offset().left){var f=e.left}else{if(!h.hasClass("right")){h.addClass("right")}var f=e.left-(this.outerWidth(h)-this.outerWidth(g))}h.attr("style","").css({position:"absolute",top:e.top+this.outerHeight(g),left:f})}return h},small:function(){return c(b).width()<768||c("html").hasClass("lt-ie9")},off:function(){c(this.scope).off(".fndtn.dropdown");c("html, body").off(".fndtn.dropdown");c(b).off(".fndtn.dropdown");c("[data-dropdown-content]").off(".fndtn.dropdown");this.settings.init=false}}}(Foundation.zj,this,this.document));