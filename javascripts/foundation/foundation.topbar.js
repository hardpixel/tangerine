(function(c,b,a,d){Foundation.libs.topbar={name:"topbar",version:"4.1.0",settings:{index:0,stickyClass:"sticky",custom_back_text:true,back_text:"Back",init:false},init:function(g,f){var e=this;if(typeof g==="object"){c.extend(true,this.settings,g)}if(typeof g!="string"){c(".top-bar").each(function(){e.settings.$w=c(b);e.settings.$topbar=c(this);e.settings.$section=e.settings.$topbar.find("section");e.settings.$titlebar=e.settings.$topbar.children("ul").first();e.settings.$topbar.data("index",0);var h=c("<div class='top-bar-js-breakpoint'/>").insertAfter(e.settings.$topbar);e.settings.breakPoint=h.width();h.remove();e.assemble();if(e.settings.$topbar.parent().hasClass("fixed")){c("body").css("padding-top",e.outerHeight(e.settings.$topbar))}});if(!e.settings.init){this.events()}return this.settings.init}else{return this[g].call(this,f)}},events:function(){var e=this;var f=this.outerHeight(c(".top-bar"));c(this.scope).on("click.fndtn.topbar",".top-bar .toggle-topbar",function(j){var g=c(this).closest(".top-bar"),i=g.find("section, .section"),h=g.children("ul").first();if(!g.data("height")){e.largestUL()}j.preventDefault();if(e.breakpoint()){g.toggleClass("expanded").css("min-height","")}if(!g.hasClass("expanded")){if(!e.rtl){i.css({left:"0%"});i.find(">.name").css({left:"100%"})}else{i.css({right:"0%"});i.find(">.name").css({right:"100%"})}i.find("li.moved").removeClass("moved");g.data("index",0)}if(g.parent().hasClass("fixed")){g.parent().removeClass("fixed");c("body").css("padding-top","0");b.scrollTo(0,0)}else{if(g.hasClass("fixed expanded")){g.parent().addClass("fixed");c("body").css("padding-top",f)}}}).on("click.fndtn.topbar",".top-bar .has-dropdown>a",function(l){var h=c(this).closest(".top-bar"),k=h.find("section, .section"),i=h.children("ul").first();if(Modernizr.touch||e.breakpoint()){l.preventDefault()}if(e.breakpoint()){var j=c(this),g=j.closest("li");h.data("index",h.data("index")+1);g.addClass("moved");if(!e.rtl){k.css({left:-(100*h.data("index"))+"%"});k.find(">.name").css({left:100*h.data("index")+"%"})}else{k.css({right:-(100*h.data("index"))+"%"});k.find(">.name").css({right:100*h.data("index")+"%"})}j.siblings("ul").height(h.data("height")+e.outerHeight(i,true));h.css("min-height",h.data("height")+e.outerHeight(i,true)*2)}});c(b).on("resize.fndtn.topbar",function(){if(!e.breakpoint()){c(".top-bar").css("min-height","").removeClass("expanded")}}.bind(this));c(this.scope).on("click.fndtn",".top-bar .has-dropdown .back",function(l){l.preventDefault();var k=c(this),h=k.closest(".top-bar"),j=h.find("section, .section"),i=k.closest("li.moved"),g=i.parent();h.data("index",h.data("index")-1);if(!e.rtl){j.css({left:-(100*h.data("index"))+"%"});j.find(">.name").css({left:100*h.data("index")+"%"})}else{j.css({right:-(100*h.data("index"))+"%"});j.find(">.name").css({right:100*h.data("index")+"%"})}if(h.data("index")===0){h.css("min-height",0)}setTimeout(function(){i.removeClass("moved")},300)})},breakpoint:function(){return c(b).width()<=this.settings.breakPoint||c("html").hasClass("lt-ie9")},assemble:function(){var e=this;this.settings.$section.detach();this.settings.$section.find(".has-dropdown>a").each(function(){var f=c(this),h=f.siblings(".dropdown"),g=c('<li class="title back js-generated"><h5><a href="#"></a></h5></li>');if(e.settings.custom_back_text==true){g.find("h5>a").html("&laquo; "+e.settings.back_text)}else{g.find("h5>a").html("&laquo; "+f.html())}h.prepend(g)});this.settings.$section.appendTo(this.settings.$topbar);this.sticky()},largestUL:function(){var g=this.settings.$topbar.find("section ul ul"),h=g.first(),f=0,e=this;g.each(function(){if(c(this).children("li").length>h.children("li").length){h=c(this)}});h.children("li").each(function(){f+=e.outerHeight(c(this),true)});this.settings.$topbar.data("height",f)},sticky:function(){var e="."+this.settings.stickyClass;if(c(e).length>0){var h=c(e).length?c(e).offset().top:0,f=c(b);var g=this.outerHeight(c(".top-bar"));f.scroll(function(){if(f.scrollTop()>=(h)){c(e).addClass("fixed");c("body").css("padding-top",g)}else{if(f.scrollTop()<h){c(e).removeClass("fixed");c("body").css("padding-top","0")}}})}},off:function(){c(this.scope).off(".fndtn.topbar");c(b).off(".fndtn.topbar")}}}(Foundation.zj,this,this.document));