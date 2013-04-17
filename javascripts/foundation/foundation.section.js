(function(c,b,a,d){Foundation.libs.section={name:"section",version:"4.1.1",settings:{deep_linking:false,one_up:true,callback:function(){}},init:function(g,h,f){var e=this;Foundation.inherit(this,"throttle data_options position_right offset_right");if(typeof h!="string"){this.set_active_from_hash();this.events();return true}else{return this[h].call(this,f)}},events:function(){var e=this;c(this.scope).on("click.fndtn.section","[data-section] .title",function(h){var g=c(this),f=g.closest("[data-section]");e.toggle_active.call(this,h,e)});c(b).on("resize.fndtn.section",e.throttle(function(){e.resize.call(this)},30)).on("hashchange",function(){if(!e.settings.toggled){e.set_active_from_hash();c(this).trigger("resize")}}).trigger("resize");c(a).on("click.fndtn.section",function(f){if(c(f.target).closest(".title").length<1){c('[data-section="vertical-nav"], [data-section="horizontal-nav"]').find("section, .section").removeClass("active").attr("style","")}})},toggle_active:function(h,n){var j=c(this),k=j.closest("section, .section"),i=k.find(".content"),l=k.closest("[data-section]"),n=Foundation.libs.section,g=c.extend({},n.settings,n.data_options(l));n.settings.toggled=true;if(!g.deep_linking&&i.length>0){h.preventDefault()}if(k.hasClass("active")){if(n.small(l)||n.is_vertical(l)||n.is_horizontal(l)||n.is_accordion(l)){k.removeClass("active").attr("style","")}}else{var f=null,m=n.outerHeight(k.find(".title"));if(n.small(l)||g.one_up){f=j.closest("[data-section]").find("section.active, .section.active");if(n.small(l)){f.attr("style","")}else{f.attr("style","visibility: hidden; padding-top: "+m+"px;")}}if(n.small(l)){k.attr("style","")}else{k.css("padding-top",m)}k.addClass("active");if(f!==null){f.removeClass("active").attr("style","")}}setTimeout(function(){n.settings.toggled=false},300);g.callback()},resize:function(){var f=c("[data-section]"),e=Foundation.libs.section;f.each(function(){var i=c(this),h=i.find("section.active, .section.active"),g=c.extend({},e.settings,e.data_options(i));if(h.length>1){h.not(":first").removeClass("active").attr("style","")}else{if(h.length<1&&!e.is_vertical(i)&&!e.is_horizontal(i)&&!e.is_accordion(i)){var j=i.find("section, .section").first();j.addClass("active");if(e.small(i)){j.attr("style","")}else{j.css("padding-top",e.outerHeight(j.find(".title")))}}}if(e.small(i)){h.attr("style","")}else{h.css("padding-top",e.outerHeight(h.find(".title")))}e.position_titles(i);if(e.is_horizontal(i)&&!e.small(i)){e.position_content(i)}else{e.position_content(i,false)}})},is_vertical:function(e){return/vertical-nav/i.test(e.data("section"))},is_horizontal:function(e){return/horizontal-nav/i.test(e.data("section"))},is_accordion:function(e){return/accordion/i.test(e.data("section"))},is_tabs:function(e){return/tabs/i.test(e.data("section"))},set_active_from_hash:function(){var f=b.location.hash.substring(1),g=c("[data-section]"),e=this;g.each(function(){var i=c(this),h=c.extend({},e.settings,e.data_options(i));if(f.length>0&&h.deep_linking){i.find("section, .section").attr("style","").removeClass("active");i.find('.content[data-slug="'+f+'"]').closest("section, .section").addClass("active")}})},position_titles:function(f,h){var g=f.find(".title"),i=0,e=this;if(typeof h==="boolean"){g.attr("style","")}else{g.each(function(){if(!e.rtl){c(this).css("left",i)}else{c(this).css("right",i)}i+=e.outerWidth(c(this))})}},position_content:function(g,i){var h=g.find(".title"),f=g.find(".content"),e=this;if(typeof i==="boolean"){f.attr("style","");g.attr("style","")}else{g.find("section, .section").each(function(){var k=c(this).find(".title"),j=c(this).find(".content");if(!e.rtl){j.css({left:k.position().left-1,top:e.outerHeight(k)-2})}else{j.css({right:e.position_right(k)+1,top:e.outerHeight(k)-2})}});if(typeof Zepto==="function"){g.height(this.outerHeight(h.first()))}else{g.height(this.outerHeight(h.first())-2)}}},position_right:function(e){var g=e.closest("[data-section]"),f=e.closest("[data-section]").width(),h=g.find(".title").length;return(f-e.position().left-e.width()*(e.index()+1)-h)},reflow:function(){c("[data-section]").trigger("resize")},small:function(f){var e=c.extend({},this.settings,this.data_options(f));if(this.is_tabs(f)){return false}if(f&&this.is_accordion(f)){return true}if(c("html").hasClass("lt-ie9")){return true}if(c("html").hasClass("ie8compat")){return true}return c(this.scope).width()<768},off:function(){c(this.scope).off(".fndtn.section");c(b).off(".fndtn.section");c(a).off(".fndtn.section")}}}(Foundation.zj,this,this.document));