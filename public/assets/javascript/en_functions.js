/*!
 * Honda Egypt Website Main Functions
 * (c) 2013 BahaaSamir <bahaasamir.me>
 */
!function(e) {
    e.fn.HondaScrollAnimate = function(t) {
        return this.each(function() {
            function n() {
                var n = i.offset().top // elementTop
                  , a = Math.round(i.outerHeight()) / 4 //elementheight
                  , s = e(window).scrollTop() + window.innerHeight //viewportBottom
                  , o = window[t];
                
                if( t == 'GalleryAnimate' ){
                    s + 300 > n + a  && o()
                }else{
                    s > n + a && o()

                }

                // var elementTop = $(this).offset().top;
                // var elementBottom = elementTop + $(this).outerHeight();
            
                // var viewportTop = $(window).scrollTop();
                // var viewportBottom = viewportTop + $(window).height();
            
            


                // var o = window[t];

                // var top_of_element = i.offset().top;
                // var bottom_of_element = i.offset().top + i.outerHeight();
                // var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
                // var top_of_screen = $(window).scrollTop();
            
                // if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
                //     // the element is visible, do something
                //     o();

                // }                         



                // if(t == 'footerAnimate'){
                //     if(s > n + a){
                //         console.warn('offset of ' + i + '+')
                //     }
                //     console.warn(i);
                //     console.warn(n);
                //     console.warn(a);
                //     console.warn(s);
                //     console.warn(o);
    
                // }
 


            }
            var i = e(this);
            n(),
            e(window).bind("resize scroll", function() {
                n()
            })
        })
    }
    ,
    e.fn.HondaMenu = function() {
        return this.each(function() {
            function t() {
                var t = e("body").innerWidth();
                t > 1710 ? (e("#motors_header").find(".sub_menu_box").css({
                    width: 'auto'
                }),
                e("#sub_cars").css({
                    width: 'auto'
                })) : 1710 > t && t > 1270 ? (e("#motors_header").find(".sub_menu_box").css({
                    width: 442
                }),
                e("#sub_cars").css({
                    width: 442
                })) : 1270 > t && t > 880 ? (e("#motors_header").find(".sub_menu_box").css({
                    width: 221
                }),
                e("#sub_cars").css({
                    width: 442
                })) : 880 > t && e("#sub_cars").css({
                    width: 221
                })
            }
            function n() {
                e(".sub_menu_box_element img").each(function() {
                    window.clearTimeout(e(this).data("timerId"))
                }),
                e(".sub_menu_box_element img").stop(!0, !0, !0).css({
                    marginLeft: 219
                }),
                e(".sub_menu_box_element .sub_name").stop(!0, !0, !0).css({
                    opacity: 0
                })
            }
            var i = e(this);
            t(),
            e(window).bind("resize", function() {
                t()
            }),
            e("a[rel=sub_cars], a.for_ani").mouseenter(function() {
                var t = e(this).attr("rel");
                n(),
                e("#" + t).find("img").each(function(n) {
                    var i = setTimeout(function() {
                        e("#" + t).find("img").eq(n).stop().animate({
                            marginLeft: 20
                        }),
                        e("#" + t).find(".sub_name").eq(n).stop().animate({
                            opacity: 1
                        })
                    }, 350 * (n + 1));
                    e(this).data("timerId", i)
                })
            }),
            i.children("#menu").append('<div id="menu_tracker" class="menu_tracker"><div class="menu_tracker_color"></div><div class="menu_tracker_arrow_set"></div></div>'),
            i.children(".sub_menu").css({
                width: i.children("#menu").width()
            }),
            i.find("#menu li a").mouseenter(function() {
                this_list = e(this),
                ani_ease = "easeInOutCubic",
                ani_dur = 300,
                main_tracker = i.find("#menu_tracker"),
                main_tracker_pos = Math.round(main_tracker.position().left),
                li_position = Math.round(this_list.position().left),
                li_width = this_list.outerWidth(),
                menu_to_show = this_list.attr("rel"),
                right = i.children("#menu").width() - 26 - (this_list.position().left + this_list.width()),
                i.find("#menu li a").removeClass("active"),
                i.find("#selected").removeClass("selected"),
                this_list.addClass("active"),
                i.find(".mQuery").not("#" + menu_to_show).children("a").stop().animate({
                    marginTop: 6,
                    opacity: 0
                }, function() {
                    i.find(".mQuery").not("#" + menu_to_show).hide()
                }),
                i.find("#" + menu_to_show).show().css({
                    left: li_position
                }),
                i.find("#" + menu_to_show + " a").css({
                    "margin-top": 10,
                    opacity: 0
                }).stop().animate({
                    marginTop: 0,
                    opacity: 1
                }, 400, "easeInOutCubic", function() {
                    i.find(".mQuery").not("#" + menu_to_show).hide().children("a").css({
                        "margin-top": 6,
                        opacity: 0
                    })
                }),
                i.find(".menu_tracker_arrow_set").stop(!1, !0).animate(0 == i.find("#" + menu_to_show).length ? {
                    top: -15,
                    opacity: 0
                } : {
                    top: -5,
                    opacity: 1
                }),
                main_tracker.hasClass("visible") ? (i.find(".menu_tracker_color").removeClass("clk"),
                main_tracker.stop(!1, !0).animate({
                    left: li_position,
                    width: li_width
                }, {
                    duration: ani_dur,
                    easing: ani_ease
                })) : main_tracker.addClass("visible").css({
                    left: li_position,
                    width: li_width
                }).stop().fadeIn("fast")
            }),
            i.find("#menu li a").mousedown(function() {
                i.find(".menu_tracker_color").addClass("clk")
            }),
            i.mouseleave(function() {
                i.find(".mQuery").children("a").each(function() {
                    window.clearTimeout(e(this).data("etimerId"))
                }),
                i.find(".mQuery").children("a").stop().animate({
                    marginTop: 6,
                    opacity: 0
                }, function() {
                    e(this).parent().hide()
                }),
                i.find("#selected").addClass("selected"),
                i.find("#menu li a").removeClass("active"),
                i.find(".menu_tracker_color").removeClass("clk"),
                main_tracker.removeClass("visible").stop().fadeOut("fast")
            })
        })
    }
    ,
    e.fn.HondaGallery = function(t) {
        var n = e.extend({
            type: !1
        }, t);
        return this.each(function() {
            {
                var t = e(this)
                  , i = (t.find(".gallery_caption_set"),
                t.find(".gallery_img_set"));
                t.find(".pic_overlay")
            }
            "inline" == n.type && t.find(".gallery_img_set:nth-child(4n)").addClass("last"),
            e(".gallery_caption").each(function() {
                var t = parseInt(e(this).outerHeight())
                  , n = Math.round(t / 2);
                e(this).css({
                    "margin-top": -n
                })
            }),
            i.hover(function() {
                e(this).find(".gallery_zoom_icon").stop(!0, !0).fadeIn(),
                e(this).find(".gallery_caption_set").stop(!0, !0).animate({
                    bottom: 0,
                    opacity: 1
                })
            }, function() {
                e(this).find(".gallery_zoom_icon").stop(!0, !0).fadeOut(),
                e(this).find(".gallery_caption_set").stop(!0, !0).animate({
                    bottom: -105,
                    opacity: 0
                })
            }).click(function() {
                disable_scroll()
            })
        })
    }
    ,
    e.fn.HondaSelect = function(t) {
        var n = e.extend({
            price: !1,
            submenu: !1
        }, t);
        return this.each(function() {
            function t() {
                l.animate({
                    bottom: s + 4
                }, function() {
                    e(this).css({
                        opacity: 0
                    }).hide(),
                    o.css({
                        height: 0
                    }),
                    i.removeClass("opened")
                })
            }
            var i = e(this)
              , a = i.attr("data-title")
              , s = i.find("ul.select_options").outerHeight(!0)
              , o = i.find(".select_drop_set")
              , l = i.find(".select_drop_wrap");
            if (l.css({
                bottom: s + 4
            }),
            i.click(function(n) {
                e(this).hasClass("disabled") || (n.stopPropagation(),
                i.hasClass("opened") ? t() : (i.addClass("opened").removeClass("incomplete"),
                o.css({
                    height: s + 4
                }),
                l.show().stop().animate({
                    bottom: 2,
                    opacity: 1
                })))
            }),
            l.find("li").click(function() {
                option = n.price ? e(this).attr("data-price") : e(this).html(),
                title = e(this).html(),
                i.find(".select_current").html(title),
                e("input[name=" + a + "]").val(option)
            }),
            n.submenu) {
                var r = e("#select").find(".select_current")
                  , c = e("#Model li").eq(0)
                  , d = e("#Model li").eq(1);
                r.bind("DOMSubtreeModified", function() {
                    "City" == r.html() ? (e("#Model").show().removeClass("disabled").find(".select_current").html("LX"),
                    e(".mModel").hide().find(".mModelInp").val(""),
                    c.html("LX"),
                    d.html("EX"),
                    e("input[name=cmodel]").val("LX")) : "Civic" == r.html() ? (e("#Model").show().removeClass("disabled").find(".select_current").html("LXI"),
                    e(".mModel").hide().find(".mModelInp").val("").removeClass("re"),
                    c.html("LXI"),
                    d.html("VTI"),
                    e("input[name=cmodel]").val("LXI")) : "Motorcycle" == r.html() ? (e(".cModel").hide().addClass("disabled"),
                    e(".mModel").show().find(".mModelInp")) : (e("#Model").show().addClass("disabled").find(".select_current").html("...."),
                    e(".mModel").hide().find(".mModelInp").val("").removeClass("re"),
                    c.html(),
                    d.html())
                })
            }
            e("html, body").click(function() {
                t()
            })
        })
    }
    ,
    e.fn.HondaForm = function(t) {
        var n = e.extend({
            dropdown: !1,
            inputmin: 1,
            textmin: 4
        }, t);
        return this.each(function() {
            function t(t) {
                if (t.is("input:text") && t.val().length < n.inputmin && (l = !0,
                t.parent().addClass("incomplete")),
                t.is("textarea") && t.val().length < n.textmin && (l = !0,
                t.parent().addClass("incomplete"),
                a.find(".txtare_brdr").addClass("incomplete")),
                t.is("div.re")) {
                    var i = e("div.re").find(".select_current").html();
                    "...." == i && (l = !0,
                    a.find(".select_drop_wrap, .select.re").addClass("incomplete"))
                }
            }
            function i(e) {
                e.is("input:text") && "phone" != name && e.val().length > n.inputmin && (l = !1,
                e.parent().removeClass("incomplete")),
                e.is("textarea") && e.val().length > n.textmin && (l = !1,
                e.parent().removeClass("incomplete"),
                a.find(".txtare_brdr").removeClass("incomplete"))
            }
            var a = e(this)
              , s = a
              , o = a.find("#submit")
              , l = !1;
            a.find(".form_input").append('<div class="for_no_outline"></div>'),
            e(".re").bind("keyup change", function() {
                i(e(this))
            }),
            o.click(function() {
                s.submit()
            }),
            s.submit(function() {
                return a.find(".re").each(function() {
                    t(e(this))
                }),
                l ? !1 : !0
            })
        })
    }
    ,
    e.fn.countTo = function(t) {
        t = e.extend({}, e.fn.countTo.defaults, t || {});
        var n = Math.ceil(t.speed / t.refreshInterval)
          , i = (t.to - t.from) / n;
        return e(this).each(function() {
            function a() {
                l += i,
                o++,
                e(s).html(l.toFixed(t.decimals)),
                "function" == typeof t.onUpdate && t.onUpdate.call(s, l),
                o >= n && (clearInterval(r),
                l = t.to,
                "function" == typeof t.onComplete && t.onComplete.call(s, l))
            }
            var s = this
              , o = 0
              , l = t.from
              , r = setInterval(a, t.refreshInterval)
        })
    }
    ,
    e.fn.countTo.defaults = {
        from: 0,
        to: 100,
        speed: 2e3,
        refreshInterval: 10,
        decimals: 0,
        onUpdate: null,
        onComplete: null
    },
    e.fn.LoanC = function() {
        return this.each(function() {
            function t() {
                "..." != n.find("#selectx").children(".select_current").html() && "..." != n.find("#select").children(".select_current").html() && (dwn = parseInt(25 * Get_Price.val()) / 100,
                must = parseInt(Get_Down.val()),
                must > Get_Price.val() || must < dwn || !intRegex.test(Get_Down.val()) || Get_Rate.val() > 100 || Get_Rate.val() < 25 || !intRegex.test(Get_Rate.val()) ? alert("provided down payment rate must be between 25 and 100") : (calc(),
                Get_Result.val(NewResult),
                Get_Contract.val(Contract)))
            }
            var n = e(this);
            Get_Price = n.find("#Price"),
            Get_Down = n.find("#Down"),
            Get_Rate = n.find("#Rate"),
            Interest = 9,
            Get_Result = n.find("#Result"),
            Get_Contract = n.find("#Contract"),
            intRegex = /^\d+$/,
            CurDown = parseInt(Get_Price.val() * Get_Rate.val() / 100),
            Get_Down.val(CurDown),
            calc = function() {
                Get_Tenor = parseInt(n.find("#select").children(".select_current").text()),
                all_Interest = Interest * Get_Tenor,
                Get_monthes = 12 * Get_Tenor,
                remain = parseInt(Get_Price.val() - Get_Down.val()),
                rate = parseInt(Get_Down.val() / Get_Price.val() * 100),
                NewDown = parseInt(Get_Price.val() * Get_Rate.val() / 100),
                int_value = parseInt(remain * all_Interest / 100),
                Contract = parseInt(Get_Price.val()) + int_value,
                res = parseInt(remain) + int_value,
                NewResult = Math.floor(res / Get_monthes)
            }
            ,
            Get_Down.bind("change click", function() {
                e(this).select(),
                dwn = parseInt(25 * Get_Price.val()) / 100,
                must = parseInt(Get_Down.val()),
                must <= Get_Price.val() && must >= dwn && (calc(),
                Get_Rate.val(rate))
            }),
            Get_Rate.bind("change click", function() {
                e(this).select(),
                Get_Rate.val() <= 100 && Get_Rate.val() >= 25 && (calc(),
                Get_Down.val(NewDown))
            }),
            n.click(function() {
                t()
            }),
            n.find("#select, #selectx").children(".select_current").bind("DOMSubtreeModified", function() {
                t()
            }),
            e("#selectx li").bind("click", function() {
                Get_Rate.val(0),
                Get_Down.val(0),
                Get_Result.val(0),
                Get_Contract.val(0)
            })
        })
    }
}(jQuery);
