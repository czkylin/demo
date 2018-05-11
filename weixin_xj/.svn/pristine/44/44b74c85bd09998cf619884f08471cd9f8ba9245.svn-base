// JavaScript Documentfunction checkChargeStatus() {
    $(".add-observed-card").length ? $("footer.bar-support").show() : $("footer.bar-support").hide(),
    $(".add-observed-card.active").length ? $("#wechat-charge").removeClass("disabled") : $("#wechat-charge").addClass("disabled")
}
function fee() {
    $("#fee").text($(".add-observed-card.active").length * GlobalObj.unitPrice)
}
function loadingMessage(e, t) {
    e || (e = "数据加载中");
    var a = '<div class="qsc-toast toast-loading" id="toast-loading" style="display: block;"><div class="toast-backdrop"></div><div class="toast-dialog"><div class="toast-content"><span><div class="loading-icon"><div class="loading-icon-leaf loading-icon-leaf_0"></div><div class="loading-icon-leaf loading-icon-leaf_1"></div><div class="loading-icon-leaf loading-icon-leaf_2"></div><div class="loading-icon-leaf loading-icon-leaf_3"></div><div class="loading-icon-leaf loading-icon-leaf_4"></div><div class="loading-icon-leaf loading-icon-leaf_5"></div><div class="loading-icon-leaf loading-icon-leaf_6"></div><div class="loading-icon-leaf loading-icon-leaf_7"></div><div class="loading-icon-leaf loading-icon-leaf_8"></div><div class="loading-icon-leaf loading-icon-leaf_9"></div><div class="loading-icon-leaf loading-icon-leaf_10"></div><div class="loading-icon-leaf loading-icon-leaf_11"></div></div><span class="loadingMsg">' + e + "</span></span></div></div></div>";
    t ? ($("#toast-loading").remove(), $("body").append(a)) : $("#toast-loading").remove()
}
function alertMessage(e, t) {
    t || (t = 2e3);
    var a = '<div class="qsc-toast" id="toast-default" style="display:block;"><div class="toast-backdrop"></div><div class="toast-dialog"><div class="toast-content"><span>' + e + "</span></div></div></div>",
    i = $(".qsc-toast:visible");
    i.length && i.remove(),
    $("body").append(a),
    setTimeout(function() {
        $("#toast-default").remove()
    },
    t)
}
function discriCard(e) {
    e.substring(6, 10) + "-" + e.substring(10, 12) + "-" + e.substring(12, 14);
    var t = new Date,
    a = t.getMonth() + 1,
    i = t.getDate(),
    s = t.getFullYear() - e.substring(6, 10) - 1;
    return (e.substring(10, 12) < a || e.substring(10, 12) == a && e.substring(12, 14) <= i) && s++,
    s
}
function identityCodeValid(e) {
    var t = {
        11 : "北京",
        12 : "天津",
        13 : "河北",
        14 : "山西",
        15 : "内蒙古",
        21 : "辽宁",
        22 : "吉林",
        23 : "黑龙江 ",
        31 : "上海",
        32 : "江苏",
        33 : "浙江",
        34 : "安徽",
        35 : "福建",
        36 : "江西",
        37 : "山东",
        41 : "河南",
        42 : "湖北 ",
        43 : "湖南",
        44 : "广东",
        45 : "广西",
        46 : "海南",
        50 : "重庆",
        51 : "四川",
        52 : "贵州",
        53 : "云南",
        54 : "西藏 ",
        61 : "陕西",
        62 : "甘肃",
        63 : "青海",
        64 : "宁夏",
        65 : "新疆",
        71 : "台湾",
        81 : "香港",
        82 : "澳门",
        91 : "国外 "
    };
    if (!e || !/^[1-9][0-9]{5}(19[0-9]{2}|200[0-9]|2010)(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])[0-9]{3}[0-9xX]$/i.test(e)) return ! 1;
    if (!t[e.substr(0, 2)]) return ! 1;
    if (18 == e.length) {
        e = e.split("");
        for (var a = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2], i = [1, 0, "X", 9, 8, 7, 6, 5, 4, 3, 2], s = 0, n = 0, o = 0, r = 0; r < 17; r++) n = e[r],
        o = a[r],
        s += n * o;
        var l = i[s % 11];
        if (l != e[17].toLocaleUpperCase()) return ! 1
    }
    return ! 0
}
function getSubstr(e, t, a) {
    var i, s, n;
    return i = e.indexOf(t) + t.length,
    s = "" == a ? e.length: e.indexOf(a),
    n = e.substr(i, s - i)
}
function getVersion() {
    return parseInt(JSON.parse(getSubstr(navigator.userAgent, "qsc_custom", "motsuc_csq")).Platform.split("/")[1].replace(/\./g, ""))
}
if ("undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery"); +
function(e) {
    var t = e.fn.jquery.split(" ")[0].split(".");
    if (t[0] < 2 && t[1] < 9 || 1 == t[0] && 9 == t[1] && t[2] < 1) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")
} (jQuery),
+
function(e) {
    "use strict";
    function t() {
        var e = document.createElement("bootstrap"),
        t = {
            WebkitTransition: "webkitTransitionEnd",
            MozTransition: "transitionend",
            OTransition: "oTransitionEnd otransitionend",
            transition: "transitionend"
        };
        for (var a in t) if (void 0 !== e.style[a]) return {
            end: t[a]
        };
        return ! 1
    }
    e.fn.emulateTransitionEnd = function(t) {
        var a = !1,
        i = this;
        e(this).one("bsTransitionEnd",
        function() {
            a = !0
        });
        var s = function() {
            a || e(i).trigger(e.support.transition.end)
        };
        return setTimeout(s, t),
        this
    },
    e(function() {
        e.support.transition = t(),
        e.support.transition && (e.event.special.bsTransitionEnd = {
            bindType: e.support.transition.end,
            delegateType: e.support.transition.end,
            handle: function(t) {
                return e(t.target).is(this) ? t.handleObj.handler.apply(this, arguments) : void 0
            }
        })
    })
} (jQuery),
+
function(e) {
    "use strict";
    function t(t) {
        return this.each(function() {
            var a = e(this),
            s = a.data("bs.alert");
            s || a.data("bs.alert", s = new i(this)),
            "string" == typeof t && s[t].call(a)
        })
    }
    var a = '[data-dismiss="alert"]',
    i = function(t) {
        e(t).on("click", a, this.close)
    };
    i.VERSION = "3.3.1",
    i.TRANSITION_DURATION = 150,
    i.prototype.close = function(t) {
        function a() {
            o.detach().trigger("closed.bs.alert").remove()
        }
        var s = e(this),
        n = s.attr("data-target");
        n || (n = s.attr("href"), n = n && n.replace(/.*(?=#[^\s]*$)/, ""));
        var o = e(n);
        t && t.preventDefault(),
        o.length || (o = s.closest(".alert")),
        o.trigger(t = e.Event("close.bs.alert")),
        t.isDefaultPrevented() || (o.removeClass("in"), e.support.transition && o.hasClass("fade") ? o.one("bsTransitionEnd", a).emulateTransitionEnd(i.TRANSITION_DURATION) : a())
    };
    var s = e.fn.alert;
    e.fn.alert = t,
    e.fn.alert.Constructor = i,
    e.fn.alert.noConflict = function() {
        return e.fn.alert = s,
        this
    },
    e(document).on("click.bs.alert.data-api", a, i.prototype.close)
} (jQuery),
+
function(e) {
    "use strict";
    function t(t) {
        return this.each(function() {
            var i = e(this),
            s = i.data("bs.button"),
            n = "object" == typeof t && t;
            s || i.data("bs.button", s = new a(this, n)),
            "toggle" == t ? s.toggle() : t && s.setState(t)
        })
    }
    var a = function(t, i) {
        this.$element = e(t),
        this.options = e.extend({},
        a.DEFAULTS, i),
        this.isLoading = !1
    };
    a.VERSION = "3.3.1",
    a.DEFAULTS = {
        loadingText: "loading..."
    },
    a.prototype.setState = function(t) {
        var a = "disabled",
        i = this.$element,
        s = i.is("input") ? "val": "html",
        n = i.data();
        t += "Text",
        null == n.resetText && i.data("resetText", i[s]()),
        setTimeout(e.proxy(function() {
            i[s](null == n[t] ? this.options[t] : n[t]),
            "loadingText" == t ? (this.isLoading = !0, i.addClass(a).attr(a, a)) : this.isLoading && (this.isLoading = !1, i.removeClass(a).removeAttr(a))
        },
        this), 0)
    },
    a.prototype.toggle = function() {
        var e = !0,
        t = this.$element.closest('[data-toggle="buttons"]');
        if (t.length) {
            var a = this.$element.find("input");
            "radio" == a.prop("type") && (a.prop("checked") && this.$element.hasClass("active") ? e = !1 : t.find(".active").removeClass("active")),
            e && a.prop("checked", !this.$element.hasClass("active")).trigger("change")
        } else this.$element.attr("aria-pressed", !this.$element.hasClass("active"));
        e && this.$element.toggleClass("active")
    };
    var i = e.fn.button;
    e.fn.button = t,
    e.fn.button.Constructor = a,
    e.fn.button.noConflict = function() {
        return e.fn.button = i,
        this
    },
    e(document).on("click.bs.button.data-api", '[data-toggle^="button"]',
    function(a) {
        var i = e(a.target);
        i.hasClass("btn") || (i = i.closest(".btn")),
        t.call(i, "toggle"),
        a.preventDefault()
    }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]',
    function(t) {
        e(t.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(t.type))
    })
} (jQuery),
+
function(e) {
    "use strict";
    function t(t) {
        return this.each(function() {
            var i = e(this),
            s = i.data("bs.carousel"),
            n = e.extend({},
            a.DEFAULTS, i.data(), "object" == typeof t && t),
            o = "string" == typeof t ? t: n.slide;
            s || i.data("bs.carousel", s = new a(this, n)),
            "number" == typeof t ? s.to(t) : o ? s[o]() : n.interval && s.pause().cycle()
        })
    }
    var a = function(t, a) {
        this.$element = e(t),
        this.$indicators = this.$element.find(".carousel-indicators"),
        this.options = a,
        this.paused = this.sliding = this.interval = this.$active = this.$items = null,
        this.options.keyboard && this.$element.on("keydown.bs.carousel", e.proxy(this.keydown, this)),
        "hover" == this.options.pause && !("ontouchstart" in document.documentElement) && this.$element.on("mouseenter.bs.carousel", e.proxy(this.pause, this)).on("mouseleave.bs.carousel", e.proxy(this.cycle, this))
    };
    a.VERSION = "3.3.1",
    a.TRANSITION_DURATION = 600,
    a.DEFAULTS = {
        interval: 5e3,
        pause: "hover",
        wrap: !0,
        keyboard: !0
    },
    a.prototype.keydown = function(e) {
        if (!/input|textarea/i.test(e.target.tagName)) {
            switch (e.which) {
            case 37:
                this.prev();
                break;
            case 39:
                this.next();
                break;
            default:
                return
            }
            e.preventDefault()
        }
    },
    a.prototype.cycle = function(t) {
        return t || (this.paused = !1),
        this.interval && clearInterval(this.interval),
        this.options.interval && !this.paused && (this.interval = setInterval(e.proxy(this.next, this), this.options.interval)),
        this
    },
    a.prototype.getItemIndex = function(e) {
        return this.$items = e.parent().children(".item"),
        this.$items.index(e || this.$active)
    },
    a.prototype.getItemForDirection = function(e, t) {
        var a = "prev" == e ? -1 : 1,
        i = this.getItemIndex(t),
        s = (i + a) % this.$items.length;
        return this.$items.eq(s)
    },
    a.prototype.to = function(e) {
        var t = this,
        a = this.getItemIndex(this.$active = this.$element.find(".item.active"));
        return e > this.$items.length - 1 || 0 > e ? void 0 : this.sliding ? this.$element.one("slid.bs.carousel",
        function() {
            t.to(e)
        }) : a == e ? this.pause().cycle() : this.slide(e > a ? "next": "prev", this.$items.eq(e))
    },
    a.prototype.pause = function(t) {
        return t || (this.paused = !0),
        this.$element.find(".next, .prev").length && e.support.transition && (this.$element.trigger(e.support.transition.end), this.cycle(!0)),
        this.interval = clearInterval(this.interval),
        this
    },
    a.prototype.next = function() {
        return this.sliding ? void 0 : this.slide("next")
    },
    a.prototype.prev = function() {

        return this.sliding ? void 0 : this.slide("prev")
    },
    a.prototype.slide = function(t, i) {
        var s = this.$element.find(".item.active"),
        n = i || this.getItemForDirection(t, s),
        o = this.interval,
        r = "next" == t ? "left": "right",
        l = "next" == t ? "first": "last",
        d = this;
        if (!n.length) {
            if (!this.options.wrap) return;
            n = this.$element.find(".item")[l]()
        }
        if (n.hasClass("active")) return this.sliding = !1;
        var p = n[0],
        c = e.Event("slide.bs.carousel", {
            relatedTarget: p,
            direction: r
        });
        if (this.$element.trigger(c), !c.isDefaultPrevented()) {
            if (this.sliding = !0, o && this.pause(), this.$indicators.length) {
                this.$indicators.find(".active").removeClass("active");
                var u = e(this.$indicators.children()[this.getItemIndex(n)]);
                u && u.addClass("active")
            }
            var h = e.Event("slid.bs.carousel", {
                relatedTarget: p,
                direction: r
            });
            return e.support.transition && this.$element.hasClass("slide") ? (n.addClass(t), n[0].offsetWidth, s.addClass(r), n.addClass(r), s.one("bsTransitionEnd",
            function() {
                n.removeClass([t, r].join(" ")).addClass("active"),
                s.removeClass(["active", r].join(" ")),
                d.sliding = !1,
                setTimeout(function() {
                    d.$element.trigger(h)
                },
                0)
            }).emulateTransitionEnd(a.TRANSITION_DURATION)) : (s.removeClass("active"), n.addClass("active"), this.sliding = !1, this.$element.trigger(h)),
            o && this.cycle(),
            this
        }
    };
    var i = e.fn.carousel;
    e.fn.carousel = t,
    e.fn.carousel.Constructor = a,
    e.fn.carousel.noConflict = function() {
        return e.fn.carousel = i,
        this
    };
    var s = function(a) {
        var i, s = e(this),
        n = e(s.attr("data-target") || (i = s.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, ""));
        if (n.hasClass("carousel")) {
            var o = e.extend({},
            n.data(), s.data()),
            r = s.attr("data-slide-to");
            r && (o.interval = !1),
            t.call(n, o),
            r && n.data("bs.carousel").to(r),
            a.preventDefault()
        }
    };
    e(document).on("click.bs.carousel.data-api", "[data-slide]", s).on("click.bs.carousel.data-api", "[data-slide-to]", s),
    e(window).on("load",
    function() {
        e('[data-ride="carousel"]').each(function() {
            var a = e(this);
            t.call(a, a.data())
        })
    })
} (jQuery),
+
function(e) {
    "use strict";
    function t(t) {
        var a, i = t.attr("data-target") || (a = t.attr("href")) && a.replace(/.*(?=#[^\s]+$)/, "");
        return e(i)
    }
    function a(t) {
        return this.each(function() {
            var a = e(this),
            s = a.data("bs.collapse"),
            n = e.extend({},
            i.DEFAULTS, a.data(), "object" == typeof t && t); ! s && n.toggle && "show" == t && (n.toggle = !1),
            s || a.data("bs.collapse", s = new i(this, n)),
            "string" == typeof t && s[t]()
        })
    }
    var i = function(t, a) {
        this.$element = e(t),
        this.options = e.extend({},
        i.DEFAULTS, a),
        this.$trigger = e(this.options.trigger).filter('[href="#' + t.id + '"], [data-target="#' + t.id + '"]'),
        this.transitioning = null,
        this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger),
        this.options.toggle && this.toggle()
    };
    i.VERSION = "3.3.1",
    i.TRANSITION_DURATION = 350,
    i.DEFAULTS = {
        toggle: !0,
        trigger: '[data-toggle="collapse"]'
    },
    i.prototype.dimension = function() {
        var e = this.$element.hasClass("width");
        return e ? "width": "height"
    },
    i.prototype.show = function() {
        if (!this.transitioning && !this.$element.hasClass("in")) {
            var t, s = this.$parent && this.$parent.find("> .panel").children(".in, .collapsing");
            if (! (s && s.length && (t = s.data("bs.collapse"), t && t.transitioning))) {
                var n = e.Event("show.bs.collapse");
                if (this.$element.trigger(n), !n.isDefaultPrevented()) {
                    s && s.length && (a.call(s, "hide"), t || s.data("bs.collapse", null));
                    var o = this.dimension();
                    this.$element.removeClass("collapse").addClass("collapsing")[o](0).attr("aria-expanded", !0),
                    this.$trigger.removeClass("collapsed").attr("aria-expanded", !0),
                    this.transitioning = 1;
                    var r = function() {
                        this.$element.removeClass("collapsing").addClass("collapse in")[o](""),
                        this.transitioning = 0,
                        this.$element.trigger("shown.bs.collapse")
                    };
                    if (!e.support.transition) return r.call(this);
                    var l = e.camelCase(["scroll", o].join("-"));
                    this.$element.one("bsTransitionEnd", e.proxy(r, this)).emulateTransitionEnd(i.TRANSITION_DURATION)[o](this.$element[0][l])
                }
            }
        }
    },
    i.prototype.hide = function() {
        if (!this.transitioning && this.$element.hasClass("in")) {
            var t = e.Event("hide.bs.collapse");
            if (this.$element.trigger(t), !t.isDefaultPrevented()) {
                var a = this.dimension();
                this.$element[a](this.$element[a]())[0].offsetHeight,
                this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1),
                this.$trigger.addClass("collapsed").attr("aria-expanded", !1),
                this.transitioning = 1;
                var s = function() {
                    this.transitioning = 0,
                    this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
                };
                return e.support.transition ? void this.$element[a](0).one("bsTransitionEnd", e.proxy(s, this)).emulateTransitionEnd(i.TRANSITION_DURATION) : s.call(this)
            }
        }
    },
    i.prototype.toggle = function() {
        this[this.$element.hasClass("in") ? "hide": "show"]()
    },
    i.prototype.getParent = function() {
        return e(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(e.proxy(function(a, i) {
            var s = e(i);
            this.addAriaAndCollapsedClass(t(s), s)
        },
        this)).end()
    },
    i.prototype.addAriaAndCollapsedClass = function(e, t) {
        var a = e.hasClass("in");
        e.attr("aria-expanded", a),
        t.toggleClass("collapsed", !a).attr("aria-expanded", a)
    };
    var s = e.fn.collapse;
    e.fn.collapse = a,
    e.fn.collapse.Constructor = i,
    e.fn.collapse.noConflict = function() {
        return e.fn.collapse = s,
        this
    },
    e(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]',
    function(i) {
        var s = e(this);
        s.attr("data-target") || i.preventDefault();
        var n = t(s),
        o = n.data("bs.collapse"),
        r = o ? "toggle": e.extend({},
        s.data(), {
            trigger: this
        });
        a.call(n, r)
    })
} (jQuery),
+
function(e) {
    "use strict";
    function t(t) {
        t && 3 === t.which || (e(s).remove(), e(n).each(function() {
            var i = e(this),
            s = a(i),
            n = {
                relatedTarget: this
            };
            s.hasClass("open") && (s.trigger(t = e.Event("hide.bs.dropdown", n)), t.isDefaultPrevented() || (i.attr("aria-expanded", "false"), s.removeClass("open").trigger("hidden.bs.dropdown", n)))
        }))
    }
    function a(t) {
        var a = t.attr("data-target");
        a || (a = t.attr("href"), a = a && /#[A-Za-z]/.test(a) && a.replace(/.*(?=#[^\s]*$)/, ""));
        var i = a && e(a);
        return i && i.length ? i: t.parent()
    }
    function i(t) {
        return this.each(function() {
            var a = e(this),
            i = a.data("bs.dropdown");
            i || a.data("bs.dropdown", i = new o(this)),
            "string" == typeof t && i[t].call(a)
        })
    }
    var s = ".dropdown-backdrop",
    n = '[data-toggle="dropdown"]',
    o = function(t) {
        e(t).on("click.bs.dropdown", this.toggle)
    };
    o.VERSION = "3.3.1",
    o.prototype.toggle = function(i) {
        var s = e(this);
        if (!s.is(".disabled, :disabled")) {
            var n = a(s),
            o = n.hasClass("open");
            if (t(), !o) {
                "ontouchstart" in document.documentElement && !n.closest(".navbar-nav").length && e('<div class="dropdown-backdrop"/>').insertAfter(e(this)).on("click", t);
                var r = {
                    relatedTarget: this
                };
                if (n.trigger(i = e.Event("show.bs.dropdown", r)), i.isDefaultPrevented()) return;
                s.trigger("focus").attr("aria-expanded", "true"),
                n.toggleClass("open").trigger("shown.bs.dropdown", r)
            }
            return ! 1
        }
    },
    o.prototype.keydown = function(t) {
        if (/(38|40|27|32)/.test(t.which) && !/input|textarea/i.test(t.target.tagName)) {
            var i = e(this);
            if (t.preventDefault(), t.stopPropagation(), !i.is(".disabled, :disabled")) {
                var s = a(i),
                o = s.hasClass("open");
                if (!o && 27 != t.which || o && 27 == t.which) return 27 == t.which && s.find(n).trigger("focus"),
                i.trigger("click");
                var r = " li:not(.divider):visible a",
                l = s.find('[role="menu"]' + r + ', [role="listbox"]' + r);
                if (l.length) {
                    var d = l.index(t.target);
                    38 == t.which && d > 0 && d--,
                    40 == t.which && d < l.length - 1 && d++,
                    ~d || (d = 0),
                    l.eq(d).trigger("focus")
                }
            }
        }
    };
    var r = e.fn.dropdown;
    e.fn.dropdown = i,
    e.fn.dropdown.Constructor = o,
    e.fn.dropdown.noConflict = function() {
        return e.fn.dropdown = r,
        this
    },
    e(document).on("click.bs.dropdown.data-api", t).on("click.bs.dropdown.data-api", ".dropdown form",
    function(e) {
        e.stopPropagation()
    }).on("click.bs.dropdown.data-api", n, o.prototype.toggle).on("keydown.bs.dropdown.data-api", n, o.prototype.keydown).on("keydown.bs.dropdown.data-api", '[role="menu"]', o.prototype.keydown).on("keydown.bs.dropdown.data-api", '[role="listbox"]', o.prototype.keydown)
} (jQuery),
+
function(e) {
    "use strict";
    function t(t, i) {
        return this.each(function() {
            var s = e(this),
            n = s.data("bs.modal"),
            o = e.extend({},
            a.DEFAULTS, s.data(), "object" == typeof t && t);
            n || s.data("bs.modal", n = new a(this, o)),
            "string" == typeof t ? n[t](i) : o.show && n.show(i)
        })
    }
    var a = function(t, a) {
        this.options = a,
        this.$body = e(document.body),
        this.$element = e(t),
        this.$backdrop = this.isShown = null,
        this.scrollbarWidth = 0,
        this.options.remote && this.$element.find(".modal-content").load(this.options.remote, e.proxy(function() {
            this.$element.trigger("loaded.bs.modal")
        },
        this))
    };
    a.VERSION = "3.3.1",
    a.TRANSITION_DURATION = 300,
    a.BACKDROP_TRANSITION_DURATION = 150,
    a.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    },
    a.prototype.toggle = function(e) {
        return this.isShown ? this.hide() : this.show(e)
    },
    a.prototype.show = function(t) {
        var i = this,
        s = e.Event("show.bs.modal", {
            relatedTarget: t
        });
        this.$element.trigger(s),
        this.isShown || s.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', e.proxy(this.hide, this)), this.backdrop(function() {
            var s = e.support.transition && i.$element.hasClass("fade");
            i.$element.parent().length || i.$element.appendTo(i.$body),
            i.$element.show().scrollTop(0),
            i.options.backdrop && i.adjustBackdrop(),
            i.adjustDialog(),
            s && i.$element[0].offsetWidth,
            i.$element.addClass("in").attr("aria-hidden", !1),
            i.enforceFocus();
            var n = e.Event("shown.bs.modal", {
                relatedTarget: t
            });
            s ? i.$element.find(".modal-dialog").one("bsTransitionEnd",
            function() {
                i.$element.trigger("focus").trigger(n)
            }).emulateTransitionEnd(a.TRANSITION_DURATION) : i.$element.trigger("focus").trigger(n)
        }))
    },
    a.prototype.hide = function(t) {
        t && t.preventDefault(),
        t = e.Event("hide.bs.modal"),
        this.$element.trigger(t),
        this.isShown && !t.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), e(document).off("focusin.bs.modal"), this.$element.removeClass("in").attr("aria-hidden", !0).off("click.dismiss.bs.modal"), e.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", e.proxy(this.hideModal, this)).emulateTransitionEnd(a.TRANSITION_DURATION) : this.hideModal())
    },
    a.prototype.enforceFocus = function() {
        e(document).off("focusin.bs.modal").on("focusin.bs.modal", e.proxy(function(e) {
            this.$element[0] === e.target || this.$element.has(e.target).length || this.$element.trigger("focus")
        },
        this))
    },
    a.prototype.escape = function() {
        this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", e.proxy(function(e) {
            27 == e.which && this.hide()
        },
        this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
    },
    a.prototype.resize = function() {
        this.isShown ? e(window).on("resize.bs.modal", e.proxy(this.handleUpdate, this)) : e(window).off("resize.bs.modal")
    },
    a.prototype.hideModal = function() {
        var e = this;
        this.$element.hide(),
        this.backdrop(function() {
            e.$body.removeClass("modal-open"),
            e.resetAdjustments(),
            e.resetScrollbar(),
            e.$element.trigger("hidden.bs.modal")
        })
    },
    a.prototype.removeBackdrop = function() {
        this.$backdrop && this.$backdrop.remove(),
        this.$backdrop = null
    },
    a.prototype.backdrop = function(t) {
        var i = this,
        s = this.$element.hasClass("fade") ? "fade": "";
        if (this.isShown && this.options.backdrop) {
            var n = e.support.transition && s;
            if (this.$backdrop = e('<div class="modal-backdrop ' + s + '" />').prependTo(this.$element).on("click.dismiss.bs.modal", e.proxy(function(e) {
                e.target === e.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus.call(this.$element[0]) : this.hide.call(this))
            },
            this)), n && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !t) return;
            n ? this.$backdrop.one("bsTransitionEnd", t).emulateTransitionEnd(a.BACKDROP_TRANSITION_DURATION) : t()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass("in");
            var o = function() {
                i.removeBackdrop(),
                t && t()
            };
            e.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", o).emulateTransitionEnd(a.BACKDROP_TRANSITION_DURATION) : o()
        } else t && t()
    },
    a.prototype.handleUpdate = function() {
        this.options.backdrop && this.adjustBackdrop(),
        this.adjustDialog()
    },
    a.prototype.adjustBackdrop = function() {
        this.$backdrop.css("height", 0).css("height", this.$element[0].scrollHeight)
    },
    a.prototype.adjustDialog = function() {
        var e = this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && e ? this.scrollbarWidth: "",
            paddingRight: this.bodyIsOverflowing && !e ? this.scrollbarWidth: ""
        })
    },
    a.prototype.resetAdjustments = function() {
        this.$element.css({
            paddingLeft: "",
            paddingRight: ""
        })
    },
    a.prototype.checkScrollbar = function() {
        this.bodyIsOverflowing = document.body.scrollHeight > document.documentElement.clientHeight,
        this.scrollbarWidth = this.measureScrollbar()
    },
    a.prototype.setScrollbar = function() {
        var e = parseInt(this.$body.css("padding-right") || 0, 10);
        this.bodyIsOverflowing && this.$body.css("padding-right", e + this.scrollbarWidth)
    },
    a.prototype.resetScrollbar = function() {
        this.$body.css("padding-right", "")
    },
    a.prototype.measureScrollbar = function() {
        var e = document.createElement("div");
        e.className = "modal-scrollbar-measure",
        this.$body.append(e);
        var t = e.offsetWidth - e.clientWidth;
        return this.$body[0].removeChild(e),
        t
    };
    var i = e.fn.modal;
    e.fn.modal = t,
    e.fn.modal.Constructor = a,
    e.fn.modal.noConflict = function() {
        return e.fn.modal = i,
        this
    },
    e(document).on("click.bs.modal.data-api", '[data-toggle="modal"]',
    function(a) {
        var i = e(this),
        s = i.attr("href"),
        n = e(i.attr("data-target") || s && s.replace(/.*(?=#[^\s]+$)/, "")),
        o = n.data("bs.modal") ? "toggle": e.extend({
            remote: !/#/.test(s) && s
        },
        n.data(), i.data());
        i.is("a") && a.preventDefault(),
        n.one("show.bs.modal",
        function(e) {
            e.isDefaultPrevented() || n.one("hidden.bs.modal",
            function() {
                i.is(":visible") && i.trigger("focus")
            })
        }),
        t.call(n, o, this)
    })
} (jQuery),
+
function(e) {
    "use strict";
    function t(t) {
        return this.each(function() {
            var i = e(this),
            s = i.data("bs.tooltip"),
            n = "object" == typeof t && t,
            o = n && n.selector; (s || "destroy" != t) && (o ? (s || i.data("bs.tooltip", s = {}), s[o] || (s[o] = new a(this, n))) : s || i.data("bs.tooltip", s = new a(this, n)), "string" == typeof t && s[t]())
        })
    }
    var a = function(e, t) {
        this.type = this.options = this.enabled = this.timeout = this.hoverState = this.$element = null,
        this.init("tooltip", e, t)
    };
    a.VERSION = "3.3.1",
    a.TRANSITION_DURATION = 150,
    a.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1,
        viewport: {
            selector: "body",
            padding: 0
        }
    },
    a.prototype.init = function(t, a, i) {
        this.enabled = !0,
        this.type = t,
        this.$element = e(a),
        this.options = this.getOptions(i),
        this.$viewport = this.options.viewport && e(this.options.viewport.selector || this.options.viewport);
        for (var s = this.options.trigger.split(" "), n = s.length; n--;) {
            var o = s[n];
            if ("click" == o) this.$element.on("click." + this.type, this.options.selector, e.proxy(this.toggle, this));
            else if ("manual" != o) {
                var r = "hover" == o ? "mouseenter": "focusin",
                l = "hover" == o ? "mouseleave": "focusout";
                this.$element.on(r + "." + this.type, this.options.selector, e.proxy(this.enter, this)),
                this.$element.on(l + "." + this.type, this.options.selector, e.proxy(this.leave, this))
            }
        }
        this.options.selector ? this._options = e.extend({},
        this.options, {
            trigger: "manual",
            selector: ""
        }) : this.fixTitle()
    },
    a.prototype.getDefaults = function() {
        return a.DEFAULTS
    },
    a.prototype.getOptions = function(t) {
        return t = e.extend({},
        this.getDefaults(), this.$element.data(), t),
        t.delay && "number" == typeof t.delay && (t.delay = {
            show: t.delay,
            hide: t.delay
        }),
        t
    },
    a.prototype.getDelegateOptions = function() {
        var t = {},
        a = this.getDefaults();
        return this._options && e.each(this._options,
        function(e, i) {
            a[e] != i && (t[e] = i)
        }),
        t
    },
    a.prototype.enter = function(t) {
        var a = t instanceof this.constructor ? t: e(t.currentTarget).data("bs." + this.type);
        return a && a.$tip && a.$tip.is(":visible") ? void(a.hoverState = "in") : (a || (a = new this.constructor(t.currentTarget, this.getDelegateOptions()), e(t.currentTarget).data("bs." + this.type, a)), clearTimeout(a.timeout), a.hoverState = "in", a.options.delay && a.options.delay.show ? void(a.timeout = setTimeout(function() {
            "in" == a.hoverState && a.show()
        },
        a.options.delay.show)) : a.show())
    },
    a.prototype.leave = function(t) {
        var a = t instanceof this.constructor ? t: e(t.currentTarget).data("bs." + this.type);
        return a || (a = new this.constructor(t.currentTarget, this.getDelegateOptions()), e(t.currentTarget).data("bs." + this.type, a)),
        clearTimeout(a.timeout),
        a.hoverState = "out",
        a.options.delay && a.options.delay.hide ? void(a.timeout = setTimeout(function() {
            "out" == a.hoverState && a.hide()
        },
        a.options.delay.hide)) : a.hide()
    },
    a.prototype.show = function() {
        var t = e.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled) {
            this.$element.trigger(t);
            var i = e.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
            if (t.isDefaultPrevented() || !i) return;
            var s = this,
            n = this.tip(),
            o = this.getUID(this.type);
            this.setContent(),
            n.attr("id", o),
            this.$element.attr("aria-describedby", o),
            this.options.animation && n.addClass("fade");
            var r = "function" == typeof this.options.placement ? this.options.placement.call(this, n[0], this.$element[0]) : this.options.placement,
            l = /\s?auto?\s?/i,
            d = l.test(r);
            d && (r = r.replace(l, "") || "top"),
            n.detach().css({
                top: 0,
                left: 0,
                display: "block"
            }).addClass(r).data("bs." + this.type, this),
            this.options.container ? n.appendTo(this.options.container) : n.insertAfter(this.$element);
            var p = this.getPosition(),
            c = n[0].offsetWidth,
            u = n[0].offsetHeight;
            if (d) {
                var h = r,
                f = this.options.container ? e(this.options.container) : this.$element.parent(),
                m = this.getPosition(f);
                r = "bottom" == r && p.bottom + u > m.bottom ? "top": "top" == r && p.top - u < m.top ? "bottom": "right" == r && p.right + c > m.width ? "left": "left" == r && p.left - c < m.left ? "right": r,
                n.removeClass(h).addClass(r)
            }
            var g = this.getCalculatedOffset(r, p, c, u);
            this.applyPlacement(g, r);
            var v = function() {
                var e = s.hoverState;
                s.$element.trigger("shown.bs." + s.type),
                s.hoverState = null,
                "out" == e && s.leave(s)
            };
            e.support.transition && this.$tip.hasClass("fade") ? n.one("bsTransitionEnd", v).emulateTransitionEnd(a.TRANSITION_DURATION) : v()
        }
    },
    a.prototype.applyPlacement = function(t, a) {
        var i = this.tip(),
        s = i[0].offsetWidth,
        n = i[0].offsetHeight,
        o = parseInt(i.css("margin-top"), 10),
        r = parseInt(i.css("margin-left"), 10);
        isNaN(o) && (o = 0),
        isNaN(r) && (r = 0),
        t.top = t.top + o,
        t.left = t.left + r,
        e.offset.setOffset(i[0], e.extend({
            using: function(e) {
                i.css({
                    top: Math.round(e.top),
                    left: Math.round(e.left)
                })
            }
        },
        t), 0),
        i.addClass("in");
        var l = i[0].offsetWidth,
        d = i[0].offsetHeight;
        "top" == a && d != n && (t.top = t.top + n - d);
        var p = this.getViewportAdjustedDelta(a, t, l, d);
        p.left ? t.left += p.left: t.top += p.top;
        var c = /top|bottom/.test(a),
        u = c ? 2 * p.left - s + l: 2 * p.top - n + d,
        h = c ? "offsetWidth": "offsetHeight";
        i.offset(t),
        this.replaceArrow(u, i[0][h], c)
    },
    a.prototype.replaceArrow = function(e, t, a) {
        this.arrow().css(a ? "left": "top", 50 * (1 - e / t) + "%").css(a ? "top": "left", "")
    },
    a.prototype.setContent = function() {
        var e = this.tip(),
        t = this.getTitle();
        e.find(".tooltip-inner")[this.options.html ? "html": "text"](t),
        e.removeClass("fade in top bottom left right")
    },
    a.prototype.hide = function(t) {
        function i() {
            "in" != s.hoverState && n.detach(),
            s.$element.removeAttr("aria-describedby").trigger("hidden.bs." + s.type),
            t && t()
        }
        var s = this,
        n = this.tip(),
        o = e.Event("hide.bs." + this.type);
        return this.$element.trigger(o),
        o.isDefaultPrevented() ? void 0 : (n.removeClass("in"), e.support.transition && this.$tip.hasClass("fade") ? n.one("bsTransitionEnd", i).emulateTransitionEnd(a.TRANSITION_DURATION) : i(), this.hoverState = null, this)
    },
    a.prototype.fixTitle = function() {
        var e = this.$element; (e.attr("title") || "string" != typeof e.attr("data-original-title")) && e.attr("data-original-title", e.attr("title") || "").attr("title", "")
    },
    a.prototype.hasContent = function() {
        return this.getTitle()
    },
    a.prototype.getPosition = function(t) {
        t = t || this.$element;
        var a = t[0],
        i = "BODY" == a.tagName,
        s = a.getBoundingClientRect();
        null == s.width && (s = e.extend({},
        s, {
            width: s.right - s.left,
            height: s.bottom - s.top
        }));
        var n = i ? {
            top: 0,
            left: 0
        }: t.offset(),
        o = {
            scroll: i ? document.documentElement.scrollTop || document.body.scrollTop: t.scrollTop()
        },
        r = i ? {
            width: e(window).width(),
            height: e(window).height()
        }: null;
        return e.extend({},
        s, o, r, n)
    },
    a.prototype.getCalculatedOffset = function(e, t, a, i) {
        return "bottom" == e ? {
            top: t.top + t.height,
            left: t.left + t.width / 2 - a / 2
        }: "top" == e ? {
            top: t.top - i,
            left: t.left + t.width / 2 - a / 2
        }: "left" == e ? {
            top: t.top + t.height / 2 - i / 2,
            left: t.left - a
        }: {
            top: t.top + t.height / 2 - i / 2,
            left: t.left + t.width
        }
    },
    a.prototype.getViewportAdjustedDelta = function(e, t, a, i) {
        var s = {
            top: 0,
            left: 0
        };
        if (!this.$viewport) return s;
        var n = this.options.viewport && this.options.viewport.padding || 0,
        o = this.getPosition(this.$viewport);
        if (/right|left/.test(e)) {
            var r = t.top - n - o.scroll,
            l = t.top + n - o.scroll + i;
            r < o.top ? s.top = o.top - r: l > o.top + o.height && (s.top = o.top + o.height - l)
        } else {
            var d = t.left - n,
            p = t.left + n + a;
            d < o.left ? s.left = o.left - d: p > o.width && (s.left = o.left + o.width - p)
        }
        return s
    },
    a.prototype.getTitle = function() {
        var e, t = this.$element,
        a = this.options;
        return e = t.attr("data-original-title") || ("function" == typeof a.title ? a.title.call(t[0]) : a.title)
    },
    a.prototype.getUID = function(e) {
        do e += ~~ (1e6 * Math.random());
        while (document.getElementById(e));
        return e
    },
    a.prototype.tip = function() {
        return this.$tip = this.$tip || e(this.options.template)
    },
    a.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    },
    a.prototype.enable = function() {
        this.enabled = !0
    },
    a.prototype.disable = function() {
        this.enabled = !1
    },
    a.prototype.toggleEnabled = function() {
        this.enabled = !this.enabled
    },
    a.prototype.toggle = function(t) {
        var a = this;
        t && (a = e(t.currentTarget).data("bs." + this.type), a || (a = new this.constructor(t.currentTarget, this.getDelegateOptions()), e(t.currentTarget).data("bs." + this.type, a))),
        a.tip().hasClass("in") ? a.leave(a) : a.enter(a)
    },
    a.prototype.destroy = function() {
        var e = this;
        clearTimeout(this.timeout),
        this.hide(function() {
            e.$element.off("." + e.type).removeData("bs." + e.type)
        })
    };
    var i = e.fn.tooltip;
    e.fn.tooltip = t,
    e.fn.tooltip.Constructor = a,
    e.fn.tooltip.noConflict = function() {
        return e.fn.tooltip = i,
        this
    }
} (jQuery),
+
function(e) {
    "use strict";
    function t(t) {
        return this.each(function() {
            var i = e(this),
            s = i.data("bs.popover"),
            n = "object" == typeof t && t,
            o = n && n.selector; (s || "destroy" != t) && (o ? (s || i.data("bs.popover", s = {}), s[o] || (s[o] = new a(this, n))) : s || i.data("bs.popover", s = new a(this, n)), "string" == typeof t && s[t]())
        })
    }
    var a = function(e, t) {
        this.init("popover", e, t)
    };
    if (!e.fn.tooltip) throw new Error("Popover requires tooltip.js");
    a.VERSION = "3.3.1",
    a.DEFAULTS = e.extend({},
    e.fn.tooltip.Constructor.DEFAULTS, {
        placement: "right",
        trigger: "click",
        content: "",
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
    }),
    a.prototype = e.extend({},
    e.fn.tooltip.Constructor.prototype),
    a.prototype.constructor = a,
    a.prototype.getDefaults = function() {
        return a.DEFAULTS
    },
    a.prototype.setContent = function() {
        var e = this.tip(),
        t = this.getTitle(),
        a = this.getContent();
        e.find(".popover-title")[this.options.html ? "html": "text"](t),
        e.find(".popover-content").children().detach().end()[this.options.html ? "string" == typeof a ? "html": "append": "text"](a),
        e.removeClass("fade top bottom left right in"),
        e.find(".popover-title").html() || e.find(".popover-title").hide()
    },
    a.prototype.hasContent = function() {
        return this.getTitle() || this.getContent()
    },
    a.prototype.getContent = function() {
        var e = this.$element,
        t = this.options;
        return e.attr("data-content") || ("function" == typeof t.content ? t.content.call(e[0]) : t.content)
    },
    a.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".arrow")
    },
    a.prototype.tip = function() {
        return this.$tip || (this.$tip = e(this.options.template)),
        this.$tip
    };
    var i = e.fn.popover;
    e.fn.popover = t,
    e.fn.popover.Constructor = a,
    e.fn.popover.noConflict = function() {
        return e.fn.popover = i,
        this
    }
} (jQuery),
+
function(e) {
    "use strict";
    function t(a, i) {
        var s = e.proxy(this.process, this);
        this.$body = e("body"),
        this.$scrollElement = e(e(a).is("body") ? window: a),
        this.options = e.extend({},
        t.DEFAULTS, i),
        this.selector = (this.options.target || "") + " .nav li > a",
        this.offsets = [],
        this.targets = [],
        this.activeTarget = null,
        this.scrollHeight = 0,
        this.$scrollElement.on("scroll.bs.scrollspy", s),
        this.refresh(),
        this.process()
    }
    function a(a) {
        return this.each(function() {
            var i = e(this),
            s = i.data("bs.scrollspy"),
            n = "object" == typeof a && a;
            s || i.data("bs.scrollspy", s = new t(this, n)),
            "string" == typeof a && s[a]()
        })
    }
    t.VERSION = "3.3.1",
    t.DEFAULTS = {
        offset: 10
    },
    t.prototype.getScrollHeight = function() {
        return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
    },
    t.prototype.refresh = function() {
        var t = "offset",
        a = 0;
        e.isWindow(this.$scrollElement[0]) || (t = "position", a = this.$scrollElement.scrollTop()),
        this.offsets = [],
        this.targets = [],
        this.scrollHeight = this.getScrollHeight();
        var i = this;
        this.$body.find(this.selector).map(function() {
            var i = e(this),
            s = i.data("target") || i.attr("href"),
            n = /^#./.test(s) && e(s);
            return n && n.length && n.is(":visible") && [[n[t]().top + a, s]] || null
        }).sort(function(e, t) {
            return e[0] - t[0]
        }).each(function() {
            i.offsets.push(this[0]),
            i.targets.push(this[1])
        })
    },
    t.prototype.process = function() {
        var e, t = this.$scrollElement.scrollTop() + this.options.offset,
        a = this.getScrollHeight(),
        i = this.options.offset + a - this.$scrollElement.height(),
        s = this.offsets,
        n = this.targets,
        o = this.activeTarget;
        if (this.scrollHeight != a && this.refresh(), t >= i) return o != (e = n[n.length - 1]) && this.activate(e);
        if (o && t < s[0]) return this.activeTarget = null,
        this.clear();
        for (e = s.length; e--;) o != n[e] && t >= s[e] && (!s[e + 1] || t <= s[e + 1]) && this.activate(n[e])
    },
    t.prototype.activate = function(t) {
        this.activeTarget = t,
        this.clear();
        var a = this.selector + '[data-target="' + t + '"],' + this.selector + '[href="' + t + '"]',
        i = e(a).parents("li").addClass("active");
        i.parent(".dropdown-menu").length && (i = i.closest("li.dropdown").addClass("active")),
        i.trigger("activate.bs.scrollspy")
    },
    t.prototype.clear = function() {
        e(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
    };
    var i = e.fn.scrollspy;
    e.fn.scrollspy = a,
    e.fn.scrollspy.Constructor = t,
    e.fn.scrollspy.noConflict = function() {
        return e.fn.scrollspy = i,
        this
    },
    e(window).on("load.bs.scrollspy.data-api",
    function() {
        e('[data-spy="scroll"]').each(function() {
            var t = e(this);
            a.call(t, t.data())
        })
    })
} (jQuery),
+
function(e) {
    "use strict";
    function t(t) {
        return this.each(function() {
            var i = e(this),
            s = i.data("bs.tab");
            s || i.data("bs.tab", s = new a(this)),
            "string" == typeof t && s[t]()
        })
    }
    var a = function(t) {
        this.element = e(t)
    };
    a.VERSION = "3.3.1",
    a.TRANSITION_DURATION = 150,
    a.prototype.show = function() {
        var t = this.element,
        a = t.closest("ul:not(.dropdown-menu)"),
        i = t.data("target");
        if (i || (i = t.attr("href"), i = i && i.replace(/.*(?=#[^\s]*$)/, "")), !t.parent("li").hasClass("active")) {
            var s = a.find(".active:last a"),
            n = e.Event("hide.bs.tab", {
                relatedTarget: t[0]
            }),
            o = e.Event("show.bs.tab", {
                relatedTarget: s[0]
            });
            if (s.trigger(n), t.trigger(o), !o.isDefaultPrevented() && !n.isDefaultPrevented()) {
                var r = e(i);
                this.activate(t.closest("li"), a),
                this.activate(r, r.parent(),
                function() {
                    s.trigger({
                        type: "hidden.bs.tab",
                        relatedTarget: t[0]
                    }),
                    t.trigger({
                        type: "shown.bs.tab",
                        relatedTarget: s[0]
                    })
                })
            }
        }
    },
    a.prototype.activate = function(t, i, s) {
        function n() {
            o.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1),
            t.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0),
            r ? (t[0].offsetWidth, t.addClass("in")) : t.removeClass("fade"),
            t.parent(".dropdown-menu") && t.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0),
            s && s()
        }
        var o = i.find("> .active"),
        r = s && e.support.transition && (o.length && o.hasClass("fade") || !!i.find("> .fade").length);
        o.length && r ? o.one("bsTransitionEnd", n).emulateTransitionEnd(a.TRANSITION_DURATION) : n(),
        o.removeClass("in")
    };
    var i = e.fn.tab;
    e.fn.tab = t,
    e.fn.tab.Constructor = a,
    e.fn.tab.noConflict = function() {
        return e.fn.tab = i,
        this
    };
    var s = function(a) {
        a.preventDefault(),
        t.call(e(this), "show")
    };
    e(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', s).on("click.bs.tab.data-api", '[data-toggle="pill"]', s)
} (jQuery),
+
function(e) {
    "use strict";
    function t(t) {
        return this.each(function() {
            var i = e(this),
            s = i.data("bs.affix"),
            n = "object" == typeof t && t;
            s || i.data("bs.affix", s = new a(this, n)),
            "string" == typeof t && s[t]()
        })
    }
    var a = function(t, i) {
        this.options = e.extend({},
        a.DEFAULTS, i),
        this.$target = e(this.options.target).on("scroll.bs.affix.data-api", e.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", e.proxy(this.checkPositionWithEventLoop, this)),
        this.$element = e(t),
        this.affixed = this.unpin = this.pinnedOffset = null,
        this.checkPosition()
    };
    a.VERSION = "3.3.1",
    a.RESET = "affix affix-top affix-bottom",
    a.DEFAULTS = {
        offset: 0,
        target: window
    },
    a.prototype.getState = function(e, t, a, i) {
        var s = this.$target.scrollTop(),
        n = this.$element.offset(),
        o = this.$target.height();
        if (null != a && "top" == this.affixed) return a > s && "top";
        if ("bottom" == this.affixed) return null != a ? !(s + this.unpin <= n.top) && "bottom": !(e - i >= s + o) && "bottom";
        var r = null == this.affixed,
        l = r ? s: n.top,
        d = r ? o: t;
        return null != a && a >= l ? "top": null != i && l + d >= e - i && "bottom"
    },
    a.prototype.getPinnedOffset = function() {
        if (this.pinnedOffset) return this.pinnedOffset;
        this.$element.removeClass(a.RESET).addClass("affix");
        var e = this.$target.scrollTop(),
        t = this.$element.offset();
        return this.pinnedOffset = t.top - e
    },
    a.prototype.checkPositionWithEventLoop = function() {
        setTimeout(e.proxy(this.checkPosition, this), 1)
    },
    a.prototype.checkPosition = function() {
        if (this.$element.is(":visible")) {
            var t = this.$element.height(),
            i = this.options.offset,
            s = i.top,
            n = i.bottom,
            o = e("body").height();
            "object" != typeof i && (n = s = i),
            "function" == typeof s && (s = i.top(this.$element)),
            "function" == typeof n && (n = i.bottom(this.$element));
            var r = this.getState(o, t, s, n);
            if (this.affixed != r) {
                null != this.unpin && this.$element.css("top", "");
                var l = "affix" + (r ? "-" + r: ""),
                d = e.Event(l + ".bs.affix");
                if (this.$element.trigger(d), d.isDefaultPrevented()) return;
                this.affixed = r,
                this.unpin = "bottom" == r ? this.getPinnedOffset() : null,
                this.$element.removeClass(a.RESET).addClass(l).trigger(l.replace("affix", "affixed") + ".bs.affix")
            }
            "bottom" == r && this.$element.offset({
                top: o - t - n
            })
        }
    };
    var i = e.fn.affix;
    e.fn.affix = t,
    e.fn.affix.Constructor = a,
    e.fn.affix.noConflict = function() {
        return e.fn.affix = i,
        this
    },
    e(window).on("load",
    function() {
        e('[data-spy="affix"]').each(function() {
            var a = e(this),
            i = a.data();
            i.offset = i.offset || {},
            null != i.offsetBottom && (i.offset.bottom = i.offsetBottom),
            null != i.offsetTop && (i.offset.top = i.offsetTop),
            t.call(a, i)
        })
    })
} (jQuery),
+
function(e) {
    "use strict";
    function t(t) {
        return this.each(function() {
            var i = e(this),
            s = i.data("bs.button"),
            n = "object" == typeof t && t;
            s || i.data("bs.button", s = new a(this, n)),
            "toggle" == t ? s.toggle() : t && s.setState(t)
        })
    }
    var a = function(t, i) {
        this.$element = e(t),
        this.options = e.extend({},
        a.DEFAULTS, i),
        this.isLoading = !1
    };
    a.VERSION = "3.3.6",
    a.DEFAULTS = {
        loadingText: "loading..."
    },
    a.prototype.setState = function(t) {
        var a = "disabled",
        i = this.$element,
        s = i.is("input") ? "val": "html",
        n = i.data();
        t += "Text",
        null == n.resetText && i.data("resetText", i[s]()),
        setTimeout(e.proxy(function() {
            i[s](null == n[t] ? this.options[t] : n[t]),
            "loadingText" == t ? (this.isLoading = !0, i.addClass(a).attr(a, a)) : this.isLoading && (this.isLoading = !1, i.removeClass(a).removeAttr(a))
        },
        this), 0)
    },
    a.prototype.toggle = function() {
        var e = !0,
        t = this.$element.closest('[data-toggle="buttons"]');
        if (t.length) {
            var a = this.$element.find("input");
            "radio" == a.prop("type") ? (a.prop("checked") && (e = !1), t.find(".active").removeClass("active"), this.$element.addClass("active")) : "checkbox" == a.prop("type") && (a.prop("checked") !== this.$element.hasClass("active") && (e = !1), this.$element.toggleClass("active")),
            a.prop("checked", this.$element.hasClass("active")),
            e && a.trigger("change")
        } else this.$element.attr("aria-pressed", !this.$element.hasClass("active")),
        this.$element.toggleClass("active")
    };
    var i = e.fn.button;
    e.fn.button = t,
    e.fn.button.Constructor = a,
    e.fn.button.noConflict = function() {
        return e.fn.button = i,
        this
    },
    e(document).on("click.bs.button.data-api", '[data-toggle^="button"]',
    function(a) {
        var i = e(a.target);
        i.hasClass("btn") || (i = i.closest(".btn")),
        t.call(i, "toggle"),
        e(a.target).is('input[type="radio"]') || e(a.target).is('input[type="checkbox"]') || a.preventDefault()
    }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]',
    function(t) {
        e(t.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(t.type))
    })
} (jQuery),
+
function(e) {
    "use strict";
    function t(t, i) {
        return this.each(function() {
            var s = e(this),
            n = s.data("bs.modal"),
            o = e.extend({},
            a.DEFAULTS, s.data(), "object" == typeof t && t);
            n || s.data("bs.modal", n = new a(this, o)),
            "string" == typeof t ? n[t](i) : o.show && n.show(i)
        })
    }
    var a = function(t, a) {
        this.options = a,
        this.$body = e(document.body),
        this.$element = e(t),
        this.$dialog = this.$element.find(".modal-dialog"),
        this.$backdrop = null,
        this.isShown = null,
        this.originalBodyPad = null,
        this.scrollbarWidth = 0,
        this.ignoreBackdropClick = !1,
        this.options.remote && this.$element.find(".modal-content").load(this.options.remote, e.proxy(function() {
            this.$element.trigger("loaded.bs.modal")
        },
        this))
    };
    a.VERSION = "3.3.6",
    a.TRANSITION_DURATION = 300,
    a.BACKDROP_TRANSITION_DURATION = 150,
    a.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    },
    a.prototype.toggle = function(e) {
        return this.isShown ? this.hide() : this.show(e)
    },
    a.prototype.show = function(t) {
        var i = this,
        s = e.Event("show.bs.modal", {
            relatedTarget: t
        });
        this.$element.trigger(s),
        this.isShown || s.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', e.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal",
        function() {
            i.$element.one("mouseup.dismiss.bs.modal",
            function(t) {
                e(t.target).is(i.$element) && (i.ignoreBackdropClick = !0)
            })
        }), this.backdrop(function() {
            var s = e.support.transition && i.$element.hasClass("fade");
            i.$element.parent().length || i.$element.appendTo(i.$body),
            i.$element.show().scrollTop(0),
            i.adjustDialog(),
            s && i.$element[0].offsetWidth,
            i.$element.addClass("in"),
            i.enforceFocus();
            var n = e.Event("shown.bs.modal", {
                relatedTarget: t
            });
            s ? i.$dialog.one("bsTransitionEnd",
            function() {
                i.$element.trigger("focus").trigger(n)
            }).emulateTransitionEnd(a.TRANSITION_DURATION) : i.$element.trigger("focus").trigger(n)
        }))
    },
    a.prototype.hide = function(t) {
        t && t.preventDefault(),
        t = e.Event("hide.bs.modal"),
        this.$element.trigger(t),
        this.isShown && !t.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), e(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), e.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", e.proxy(this.hideModal, this)).emulateTransitionEnd(a.TRANSITION_DURATION) : this.hideModal())
    },
    a.prototype.enforceFocus = function() {
        e(document).off("focusin.bs.modal").on("focusin.bs.modal", e.proxy(function(e) {
            this.$element[0] === e.target || this.$element.has(e.target).length || this.$element.trigger("focus")
        },
        this))
    },
    a.prototype.escape = function() {
        this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", e.proxy(function(e) {
            27 == e.which && this.hide()
        },
        this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
    },
    a.prototype.resize = function() {
        this.isShown ? e(window).on("resize.bs.modal", e.proxy(this.handleUpdate, this)) : e(window).off("resize.bs.modal")
    },
    a.prototype.hideModal = function() {
        var e = this;
        this.$element.hide(),
        this.backdrop(function() {
            e.$body.removeClass("modal-open"),
            e.resetAdjustments(),
            e.resetScrollbar(),
            e.$element.trigger("hidden.bs.modal")
        })
    },
    a.prototype.removeBackdrop = function() {
        this.$backdrop && this.$backdrop.remove(),
        this.$backdrop = null
    },
    a.prototype.backdrop = function(t) {
        var i = this,
        s = this.$element.hasClass("fade") ? "fade": "";
        if (this.isShown && this.options.backdrop) {
            var n = e.support.transition && s;
            if (this.$backdrop = e(document.createElement("div")).addClass("modal-backdrop " + s).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", e.proxy(function(e) {
                return this.ignoreBackdropClick ? void(this.ignoreBackdropClick = !1) : void(e.target === e.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide()))
            },
            this)), n && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !t) return;
            n ? this.$backdrop.one("bsTransitionEnd", t).emulateTransitionEnd(a.BACKDROP_TRANSITION_DURATION) : t()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass("in");
            var o = function() {
                i.removeBackdrop(),
                t && t()
            };
            e.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", o).emulateTransitionEnd(a.BACKDROP_TRANSITION_DURATION) : o()
        } else t && t()
    },
    a.prototype.handleUpdate = function() {
        this.adjustDialog()
    },
    a.prototype.adjustDialog = function() {
        var e = this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && e ? this.scrollbarWidth: "",
            paddingRight: this.bodyIsOverflowing && !e ? this.scrollbarWidth: ""
        })
    },
    a.prototype.resetAdjustments = function() {
        this.$element.css({
            paddingLeft: "",
            paddingRight: ""
        })
    },
    a.prototype.checkScrollbar = function() {
        var e = window.innerWidth;
        if (!e) {
            var t = document.documentElement.getBoundingClientRect();
            e = t.right - Math.abs(t.left)
        }
        this.bodyIsOverflowing = document.body.clientWidth < e,
        this.scrollbarWidth = this.measureScrollbar()
    },
    a.prototype.setScrollbar = function() {
        var e = parseInt(this.$body.css("padding-right") || 0, 10);
        this.originalBodyPad = document.body.style.paddingRight || "",
        this.bodyIsOverflowing && this.$body.css("padding-right", e + this.scrollbarWidth)
    },
    a.prototype.resetScrollbar = function() {
        this.$body.css("padding-right", this.originalBodyPad)
    },
    a.prototype.measureScrollbar = function() {
        var e = document.createElement("div");
        e.className = "modal-scrollbar-measure",
        this.$body.append(e);
        var t = e.offsetWidth - e.clientWidth;
        return this.$body[0].removeChild(e),
        t
    };
    var i = e.fn.modal;
    e.fn.modal = t,
    e.fn.modal.Constructor = a,
    e.fn.modal.noConflict = function() {
        return e.fn.modal = i,
        this
    },
    e(document).on("click.bs.modal.data-api", '[data-toggle="modal"]',
    function(a) {
        var i = e(this),
        s = i.attr("href"),
        n = e(i.attr("data-target") || s && s.replace(/.*(?=#[^\s]+$)/, "")),
        o = n.data("bs.modal") ? "toggle": e.extend({
            remote: !/#/.test(s) && s
        },
        n.data(), i.data());
        i.is("a") && a.preventDefault(),
        n.one("show.bs.modal",
        function(e) {
            e.isDefaultPrevented() || n.one("hidden.bs.modal",
            function() {
                i.is(":visible") && i.trigger("focus")
            })
        }),
        t.call(n, o, this)
    })
} (jQuery),
function() {
    "use strict";
    function e(e) {
        e.fn.swiper = function(t) {
            var i;
            return e(this).each(function() {
                var e = new a(this, t);
                i || (i = e)
            }),
            i
        }
    }
    var t, a = function(e, i) {
        function s(e) {
            return Math.floor(e)
        }
        function n() {
            b.autoplayTimeoutId = setTimeout(function() {
                b.params.loop ? (b.fixLoop(), b._slideNext(), b.emit("onAutoplay", b)) : b.isEnd ? i.autoplayStopOnLast ? b.stopAutoplay() : (b._slideTo(0), b.emit("onAutoplay", b)) : (b._slideNext(), b.emit("onAutoplay", b))
            },
            b.params.autoplay)
        }
        function o(e, a) {
            var i = t(e.target);
            if (!i.is(a)) if ("string" == typeof a) i = i.parents(a);
            else if (a.nodeType) {
                var s;
                return i.parents().each(function(e, t) {
                    t === a && (s = a)
                }),
                s ? a: void 0
            }
            if (0 !== i.length) return i[0]
        }
        function r(e, t) {
            t = t || {};
            var a = window.MutationObserver || window.WebkitMutationObserver,
            i = new a(function(e) {
                e.forEach(function(e) {
                    b.onResize(!0),
                    b.emit("onObserverUpdate", b, e)
                })
            });
            i.observe(e, {
                attributes: "undefined" == typeof t.attributes || t.attributes,
                childList: "undefined" == typeof t.childList || t.childList,
                characterData: "undefined" == typeof t.characterData || t.characterData
            }),
            b.observers.push(i)
        }
        function l(e) {
            e.originalEvent && (e = e.originalEvent);
            var t = e.keyCode || e.charCode;
            if (!b.params.allowSwipeToNext && (b.isHorizontal() && 39 === t || !b.isHorizontal() && 40 === t)) return ! 1;
            if (!b.params.allowSwipeToPrev && (b.isHorizontal() && 37 === t || !b.isHorizontal() && 38 === t)) return ! 1;
            if (! (e.shiftKey || e.altKey || e.ctrlKey || e.metaKey || document.activeElement && document.activeElement.nodeName && ("input" === document.activeElement.nodeName.toLowerCase() || "textarea" === document.activeElement.nodeName.toLowerCase()))) {
                if (37 === t || 39 === t || 38 === t || 40 === t) {
                    var a = !1;
                    if (b.container.parents(".swiper-slide").length > 0 && 0 === b.container.parents(".swiper-slide-active").length) return;
                    var i = {
                        left: window.pageXOffset,
                        top: window.pageYOffset
                    },
                    s = window.innerWidth,
                    n = window.innerHeight,
                    o = b.container.offset();
                    b.rtl && (o.left = o.left - b.container[0].scrollLeft);
                    for (var r = [[o.left, o.top], [o.left + b.width, o.top], [o.left, o.top + b.height], [o.left + b.width, o.top + b.height]], l = 0; l < r.length; l++) {
                        var d = r[l];
                        d[0] >= i.left && d[0] <= i.left + s && d[1] >= i.top && d[1] <= i.top + n && (a = !0)
                    }
                    if (!a) return
                }
                b.isHorizontal() ? (37 !== t && 39 !== t || (e.preventDefault ? e.preventDefault() : e.returnValue = !1), (39 === t && !b.rtl || 37 === t && b.rtl) && b.slideNext(), (37 === t && !b.rtl || 39 === t && b.rtl) && b.slidePrev()) : (38 !== t && 40 !== t || (e.preventDefault ? e.preventDefault() : e.returnValue = !1), 40 === t && b.slideNext(), 38 === t && b.slidePrev())
            }
        }
        function d(e) {
            e.originalEvent && (e = e.originalEvent);
            var t = b.mousewheel.event,
            a = 0,
            i = b.rtl ? -1 : 1;
            if (e.detail) a = -e.detail;
            else if ("mousewheel" === t) if (b.params.mousewheelForceToAxis) if (b.isHorizontal()) {
                if (! (Math.abs(e.wheelDeltaX) > Math.abs(e.wheelDeltaY))) return;
                a = e.wheelDeltaX * i
            } else {
                if (! (Math.abs(e.wheelDeltaY) > Math.abs(e.wheelDeltaX))) return;
                a = e.wheelDeltaY
            } else a = Math.abs(e.wheelDeltaX) > Math.abs(e.wheelDeltaY) ? -e.wheelDeltaX * i: -e.wheelDeltaY;
            else if ("DOMMouseScroll" === t) a = -e.detail;
            else if ("wheel" === t) if (b.params.mousewheelForceToAxis) if (b.isHorizontal()) {
                if (! (Math.abs(e.deltaX) > Math.abs(e.deltaY))) return;
                a = -e.deltaX * i
            } else {
                if (! (Math.abs(e.deltaY) > Math.abs(e.deltaX))) return;
                a = -e.deltaY
            } else a = Math.abs(e.deltaX) > Math.abs(e.deltaY) ? -e.deltaX * i: -e.deltaY;
            if (0 !== a) {
                if (b.params.mousewheelInvert && (a = -a), b.params.freeMode) {
                    var s = b.getWrapperTranslate() + a * b.params.mousewheelSensitivity,
                    n = b.isBeginning,
                    o = b.isEnd;
                    if (s >= b.minTranslate() && (s = b.minTranslate()), s <= b.maxTranslate() && (s = b.maxTranslate()), b.setWrapperTransition(0), b.setWrapperTranslate(s), b.updateProgress(), b.updateActiveIndex(), (!n && b.isBeginning || !o && b.isEnd) && b.updateClasses(), b.params.freeModeSticky ? (clearTimeout(b.mousewheel.timeout), b.mousewheel.timeout = setTimeout(function() {
                        b.slideReset()
                    },
                    300)) : b.params.lazyLoading && b.lazy && b.lazy.load(), 0 === s || s === b.maxTranslate()) return
                } else {
                    if ((new window.Date).getTime() - b.mousewheel.lastScrollTime > 60) if (a < 0) if (b.isEnd && !b.params.loop || b.animating) {
                        if (b.params.mousewheelReleaseOnEdges) return ! 0
                    } else b.slideNext();
                    else if (b.isBeginning && !b.params.loop || b.animating) {
                        if (b.params.mousewheelReleaseOnEdges) return ! 0
                    } else b.slidePrev();
                    b.mousewheel.lastScrollTime = (new window.Date).getTime()
                }
                return b.params.autoplay && b.stopAutoplay(),
                e.preventDefault ? e.preventDefault() : e.returnValue = !1,
                !1
            }
        }
        function p(e, a) {
            e = t(e);
            var i, s, n, o = b.rtl ? -1 : 1;
            i = e.attr("data-swiper-parallax") || "0",
            s = e.attr("data-swiper-parallax-x"),
            n = e.attr("data-swiper-parallax-y"),
            s || n ? (s = s || "0", n = n || "0") : b.isHorizontal() ? (s = i, n = "0") : (n = i, s = "0"),
            s = s.indexOf("%") >= 0 ? parseInt(s, 10) * a * o + "%": s * a * o + "px",
            n = n.indexOf("%") >= 0 ? parseInt(n, 10) * a + "%": n * a + "px",
            e.transform("translate3d(" + s + ", " + n + ",0px)")
        }
        function c(e) {
            return 0 !== e.indexOf("on") && (e = e[0] !== e[0].toUpperCase() ? "on" + e[0].toUpperCase() + e.substring(1) : "on" + e),
            e
        }
        if (! (this instanceof a)) return new a(e, i);
        var u = {
            direction: "horizontal",
            touchEventsTarget: "container",
            initialSlide: 0,
            speed: 300,
            autoplay: !1,
            autoplayDisableOnInteraction: !0,
            autoplayStopOnLast: !1,
            iOSEdgeSwipeDetection: !1,
            iOSEdgeSwipeThreshold: 20,
            freeMode: !1,
            freeModeMomentum: !0,
            freeModeMomentumRatio: 1,
            freeModeMomentumBounce: !0,
            freeModeMomentumBounceRatio: 1,
            freeModeSticky: !1,
            freeModeMinimumVelocity: .02,
            autoHeight: !1,
            setWrapperSize: !1,
            virtualTranslate: !1,
            effect: "slide",
            coverflow: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: !0
            },
            flip: {
                slideShadows: !0,
                limitRotation: !0
            },
            cube: {
                slideShadows: !0,
                shadow: !0,
                shadowOffset: 20,
                shadowScale: .94
            },
            fade: {
                crossFade: !1
            },
            parallax: !1,
            scrollbar: null,
            scrollbarHide: !0,
            scrollbarDraggable: !1,
            scrollbarSnapOnRelease: !1,
            keyboardControl: !1,
            mousewheelControl: !1,
            mousewheelReleaseOnEdges: !1,
            mousewheelInvert: !1,
            mousewheelForceToAxis: !1,
            mousewheelSensitivity: 1,
            hashnav: !1,
            breakpoints: void 0,
            spaceBetween: 0,
            slidesPerView: 1,
            slidesPerColumn: 1,
            slidesPerColumnFill: "column",
            slidesPerGroup: 1,
            centeredSlides: !1,
            slidesOffsetBefore: 0,
            slidesOffsetAfter: 0,
            roundLengths: !1,
            touchRatio: 1,
            touchAngle: 45,
            simulateTouch: !0,
            shortSwipes: !0,
            longSwipes: !0,
            longSwipesRatio: .5,
            longSwipesMs: 300,
            followFinger: !0,
            onlyExternal: !1,
            threshold: 0,
            touchMoveStopPropagation: !0,
            pagination: null,
            paginationElement: "span",
            paginationClickable: !1,
            paginationHide: !1,
            paginationBulletRender: null,
            paginationProgressRender: null,
            paginationFractionRender: null,
            paginationCustomRender: null,
            paginationType: "bullets",
            resistance: !0,
            resistanceRatio: .85,
            nextButton: null,
            prevButton: null,
            watchSlidesProgress: !1,
            watchSlidesVisibility: !1,
            grabCursor: !1,
            preventClicks: !0,
            preventClicksPropagation: !0,
            slideToClickedSlide: !1,
            lazyLoading: !1,
            lazyLoadingInPrevNext: !1,
            lazyLoadingInPrevNextAmount: 1,
            lazyLoadingOnTransitionStart: !1,
            preloadImages: !0,
            updateOnImagesReady: !0,
            loop: !1,
            loopAdditionalSlides: 0,
            loopedSlides: null,
            control: void 0,
            controlInverse: !1,
            controlBy: "slide",
            allowSwipeToPrev: !0,
            allowSwipeToNext: !0,
            swipeHandler: null,
            noSwiping: !0,
            noSwipingClass: "swiper-no-swiping",
            slideClass: "swiper-slide",
            slideActiveClass: "swiper-slide-active",
            slideVisibleClass: "swiper-slide-visible",
            slideDuplicateClass: "swiper-slide-duplicate",
            slideNextClass: "swiper-slide-next",
            slidePrevClass: "swiper-slide-prev",
            wrapperClass: "swiper-wrapper",
            bulletClass: "swiper-pagination-bullet",
            bulletActiveClass: "swiper-pagination-bullet-active",
            buttonDisabledClass: "swiper-button-disabled",
            paginationCurrentClass: "swiper-pagination-current",
            paginationTotalClass: "swiper-pagination-total",
            paginationHiddenClass: "swiper-pagination-hidden",
            paginationProgressbarClass: "swiper-pagination-progressbar",
            observer: !1,
            observeParents: !1,
            a11y: !1,
            prevSlideMessage: "Previous slide",
            nextSlideMessage: "Next slide",
            firstSlideMessage: "This is the first slide",
            lastSlideMessage: "This is the last slide",
            paginationBulletMessage: "Go to slide {{index}}",
            runCallbacksOnInit: !0
        },
        h = i && i.virtualTranslate;
        i = i || {};
        var f = {};
        for (var m in i) if ("object" != typeof i[m] || null === i[m] || (i[m].nodeType || i[m] === window || i[m] === document || "undefined" != typeof Dom7 && i[m] instanceof Dom7 || "undefined" != typeof jQuery && i[m] instanceof jQuery)) f[m] = i[m];
        else {
            f[m] = {};
            for (var g in i[m]) f[m][g] = i[m][g]
        }
        for (var v in u) if ("undefined" == typeof i[v]) i[v] = u[v];
        else if ("object" == typeof i[v]) for (var w in u[v])"undefined" == typeof i[v][w] && (i[v][w] = u[v][w]);
        var b = this;
        if (b.params = i, b.originalParams = f, b.classNames = [], "undefined" != typeof t && "undefined" != typeof Dom7 && (t = Dom7), ("undefined" != typeof t || (t = "undefined" == typeof Dom7 ? window.Dom7 || window.Zepto || window.jQuery: Dom7)) && (b.$ = t, b.currentBreakpoint = void 0, b.getActiveBreakpoint = function() {
            if (!b.params.breakpoints) return ! 1;
            var e, t = !1,
            a = [];
            for (e in b.params.breakpoints) b.params.breakpoints.hasOwnProperty(e) && a.push(e);
            a.sort(function(e, t) {
                return parseInt(e, 10) > parseInt(t, 10)
            });
            for (var i = 0; i < a.length; i++) e = a[i],
            e >= window.innerWidth && !t && (t = e);
            return t || "max"
        },
        b.setBreakpoint = function() {
            var e = b.getActiveBreakpoint();
            if (e && b.currentBreakpoint !== e) {
                var t = e in b.params.breakpoints ? b.params.breakpoints[e] : b.originalParams;
                for (var a in t) b.params[a] = t[a];
                b.currentBreakpoint = e
            }
        },
        b.params.breakpoints && b.setBreakpoint(), b.container = t(e), 0 !== b.container.length)) {
            if (b.container.length > 1) return void b.container.each(function() {
                new a(this, i)
            });
            b.container[0].swiper = b,
            b.container.data("swiper", b),
            b.classNames.push("swiper-container-" + b.params.direction),
            b.params.freeMode && b.classNames.push("swiper-container-free-mode"),
            b.support.flexbox || (b.classNames.push("swiper-container-no-flexbox"), b.params.slidesPerColumn = 1),
            b.params.autoHeight && b.classNames.push("swiper-container-autoheight"),
            (b.params.parallax || b.params.watchSlidesVisibility) && (b.params.watchSlidesProgress = !0),
            ["cube", "coverflow", "flip"].indexOf(b.params.effect) >= 0 && (b.support.transforms3d ? (b.params.watchSlidesProgress = !0, b.classNames.push("swiper-container-3d")) : b.params.effect = "slide"),
            "slide" !== b.params.effect && b.classNames.push("swiper-container-" + b.params.effect),
            "cube" === b.params.effect && (b.params.resistanceRatio = 0, b.params.slidesPerView = 1, b.params.slidesPerColumn = 1, b.params.slidesPerGroup = 1, b.params.centeredSlides = !1, b.params.spaceBetween = 0, b.params.virtualTranslate = !0, b.params.setWrapperSize = !1),
            "fade" !== b.params.effect && "flip" !== b.params.effect || (b.params.slidesPerView = 1, b.params.slidesPerColumn = 1, b.params.slidesPerGroup = 1, b.params.watchSlidesProgress = !0, b.params.spaceBetween = 0, b.params.setWrapperSize = !1, "undefined" == typeof h && (b.params.virtualTranslate = !0)),
            b.params.grabCursor && b.support.touch && (b.params.grabCursor = !1),
            b.wrapper = b.container.children("." + b.params.wrapperClass),
            b.params.pagination && (b.paginationContainer = t(b.params.pagination), "bullets" === b.params.paginationType && b.params.paginationClickable ? b.paginationContainer.addClass("swiper-pagination-clickable") : b.params.paginationClickable = !1, b.paginationContainer.addClass("swiper-pagination-" + b.params.paginationType)),
            b.isHorizontal = function() {
                return "horizontal" === b.params.direction
            },
            b.rtl = b.isHorizontal() && ("rtl" === b.container[0].dir.toLowerCase() || "rtl" === b.container.css("direction")),
            b.rtl && b.classNames.push("swiper-container-rtl"),
            b.rtl && (b.wrongRTL = "-webkit-box" === b.wrapper.css("display")),
            b.params.slidesPerColumn > 1 && b.classNames.push("swiper-container-multirow"),
            b.device.android && b.classNames.push("swiper-container-android"),
            b.container.addClass(b.classNames.join(" ")),
            b.translate = 0,
            b.progress = 0,
            b.velocity = 0,
            b.lockSwipeToNext = function() {
                b.params.allowSwipeToNext = !1
            },
            b.lockSwipeToPrev = function() {
                b.params.allowSwipeToPrev = !1
            },
            b.lockSwipes = function() {
                b.params.allowSwipeToNext = b.params.allowSwipeToPrev = !1
            },
            b.unlockSwipeToNext = function() {
                b.params.allowSwipeToNext = !0
            },
            b.unlockSwipeToPrev = function() {
                b.params.allowSwipeToPrev = !0
            },
            b.unlockSwipes = function() {
                b.params.allowSwipeToNext = b.params.allowSwipeToPrev = !0
            },
            b.params.grabCursor && (b.container[0].style.cursor = "move", b.container[0].style.cursor = "-webkit-grab", b.container[0].style.cursor = "-moz-grab", b.container[0].style.cursor = "grab"),
            b.imagesToLoad = [],
            b.imagesLoaded = 0,
            b.loadImage = function(e, t, a, i, s) {
                function n() {
                    s && s()
                }
                var o;
                e.complete && i ? n() : t ? (o = new window.Image, o.onload = n, o.onerror = n, a && (o.srcset = a), t && (o.src = t)) : n()
            },
            b.preloadImages = function() {
                function e() {
                    "undefined" != typeof b && null !== b && (void 0 !== b.imagesLoaded && b.imagesLoaded++, b.imagesLoaded === b.imagesToLoad.length && (b.params.updateOnImagesReady && b.update(), b.emit("onImagesReady", b)))
                }
                b.imagesToLoad = b.container.find("img");
                for (var t = 0; t < b.imagesToLoad.length; t++) b.loadImage(b.imagesToLoad[t], b.imagesToLoad[t].currentSrc || b.imagesToLoad[t].getAttribute("src"), b.imagesToLoad[t].srcset || b.imagesToLoad[t].getAttribute("srcset"), !0, e)
            },
            b.autoplayTimeoutId = void 0,
            b.autoplaying = !1,
            b.autoplayPaused = !1,
            b.startAutoplay = function() {
                return "undefined" == typeof b.autoplayTimeoutId && ( !! b.params.autoplay && (!b.autoplaying && (b.autoplaying = !0, b.emit("onAutoplayStart", b), void n())))
            },
            b.stopAutoplay = function(e) {
                b.autoplayTimeoutId && (b.autoplayTimeoutId && clearTimeout(b.autoplayTimeoutId), b.autoplaying = !1, b.autoplayTimeoutId = void 0, b.emit("onAutoplayStop", b))
            },
            b.pauseAutoplay = function(e) {
                b.autoplayPaused || (b.autoplayTimeoutId && clearTimeout(b.autoplayTimeoutId), b.autoplayPaused = !0, 0 === e ? (b.autoplayPaused = !1, n()) : b.wrapper.transitionEnd(function() {
                    b && (b.autoplayPaused = !1, b.autoplaying ? n() : b.stopAutoplay())
                }))
            },
            b.minTranslate = function() {
                return - b.snapGrid[0]
            },
            b.maxTranslate = function() {
                return - b.snapGrid[b.snapGrid.length - 1]
            },
            b.updateAutoHeight = function() {
                var e = b.slides.eq(b.activeIndex)[0];
                if ("undefined" != typeof e) {
                    var t = e.offsetHeight;
                    t && b.wrapper.css("height", t + "px")
                }
            },
            b.updateContainerSize = function() {
                var e, t;
                e = "undefined" != typeof b.params.width ? b.params.width: b.container[0].clientWidth,
                t = "undefined" != typeof b.params.height ? b.params.height: b.container[0].clientHeight,
                0 === e && b.isHorizontal() || 0 === t && !b.isHorizontal() || (e = e - parseInt(b.container.css("padding-left"), 10) - parseInt(b.container.css("padding-right"), 10), t = t - parseInt(b.container.css("padding-top"), 10) - parseInt(b.container.css("padding-bottom"), 10), b.width = e, b.height = t, b.size = b.isHorizontal() ? b.width: b.height)
            },
            b.updateSlidesSize = function() {
                b.slides = b.wrapper.children("." + b.params.slideClass),
                b.snapGrid = [],
                b.slidesGrid = [],
                b.slidesSizesGrid = [];
                var e, t = b.params.spaceBetween,
                a = -b.params.slidesOffsetBefore,
                i = 0,
                n = 0;
                "string" == typeof t && t.indexOf("%") >= 0 && (t = parseFloat(t.replace("%", "")) / 100 * b.size),
                b.virtualSize = -t,
                b.rtl ? b.slides.css({
                    marginLeft: "",
                    marginTop: ""
                }) : b.slides.css({
                    marginRight: "",
                    marginBottom: ""
                });
                var o;
                b.params.slidesPerColumn > 1 && (o = Math.floor(b.slides.length / b.params.slidesPerColumn) === b.slides.length / b.params.slidesPerColumn ? b.slides.length: Math.ceil(b.slides.length / b.params.slidesPerColumn) * b.params.slidesPerColumn, "auto" !== b.params.slidesPerView && "row" === b.params.slidesPerColumnFill && (o = Math.max(o, b.params.slidesPerView * b.params.slidesPerColumn)));
                var r, l = b.params.slidesPerColumn,
                d = o / l,
                p = d - (b.params.slidesPerColumn * d - b.slides.length);
                for (e = 0; e < b.slides.length; e++) {
                    r = 0;
                    var c = b.slides.eq(e);
                    if (b.params.slidesPerColumn > 1) {
                        var u, h, f;
                        "column" === b.params.slidesPerColumnFill ? (h = Math.floor(e / l), f = e - h * l, (h > p || h === p && f === l - 1) && ++f >= l && (f = 0, h++), u = h + f * o / l, c.css({
                            "-webkit-box-ordinal-group": u,
                            "-moz-box-ordinal-group": u,
                            "-ms-flex-order": u,
                            "-webkit-order": u,
                            order: u
                        })) : (f = Math.floor(e / d), h = e - f * d),
                        c.css({
                            "margin-top": 0 !== f && b.params.spaceBetween && b.params.spaceBetween + "px"
                        }).attr("data-swiper-column", h).attr("data-swiper-row", f)
                    }
                    "none" !== c.css("display") && ("auto" === b.params.slidesPerView ? (r = b.isHorizontal() ? c.outerWidth(!0) : c.outerHeight(!0), b.params.roundLengths && (r = s(r))) : (r = (b.size - (b.params.slidesPerView - 1) * t) / b.params.slidesPerView, b.params.roundLengths && (r = s(r)), b.isHorizontal() ? b.slides[e].style.width = r + "px": b.slides[e].style.height = r + "px"), b.slides[e].swiperSlideSize = r, b.slidesSizesGrid.push(r), b.params.centeredSlides ? (a = a + r / 2 + i / 2 + t, 0 === e && (a = a - b.size / 2 - t), Math.abs(a) < .001 && (a = 0), n % b.params.slidesPerGroup === 0 && b.snapGrid.push(a), b.slidesGrid.push(a)) : (n % b.params.slidesPerGroup === 0 && b.snapGrid.push(a), b.slidesGrid.push(a), a = a + r + t), b.virtualSize += r + t, i = r, n++)
                }
                b.virtualSize = Math.max(b.virtualSize, b.size) + b.params.slidesOffsetAfter;
                var m;
                if (b.rtl && b.wrongRTL && ("slide" === b.params.effect || "coverflow" === b.params.effect) && b.wrapper.css({
                    width: b.virtualSize + b.params.spaceBetween + "px"
                }), b.support.flexbox && !b.params.setWrapperSize || (b.isHorizontal() ? b.wrapper.css({
                    width: b.virtualSize + b.params.spaceBetween + "px"
                }) : b.wrapper.css({
                    height: b.virtualSize + b.params.spaceBetween + "px"
                })), b.params.slidesPerColumn > 1 && (b.virtualSize = (r + b.params.spaceBetween) * o, b.virtualSize = Math.ceil(b.virtualSize / b.params.slidesPerColumn) - b.params.spaceBetween, b.wrapper.css({
                    width: b.virtualSize + b.params.spaceBetween + "px"
                }), b.params.centeredSlides)) {
                    for (m = [], e = 0; e < b.snapGrid.length; e++) b.snapGrid[e] < b.virtualSize + b.snapGrid[0] && m.push(b.snapGrid[e]);
                    b.snapGrid = m
                }
                if (!b.params.centeredSlides) {
                    for (m = [], e = 0; e < b.snapGrid.length; e++) b.snapGrid[e] <= b.virtualSize - b.size && m.push(b.snapGrid[e]);
                    b.snapGrid = m,
                    Math.floor(b.virtualSize - b.size) > Math.floor(b.snapGrid[b.snapGrid.length - 1]) && b.snapGrid.push(b.virtualSize - b.size)
                }
                0 === b.snapGrid.length && (b.snapGrid = [0]),
                0 !== b.params.spaceBetween && (b.isHorizontal() ? b.rtl ? b.slides.css({
                    marginLeft: t + "px"
                }) : b.slides.css({
                    marginRight: t + "px"
                }) : b.slides.css({
                    marginBottom: t + "px"
                })),
                b.params.watchSlidesProgress && b.updateSlidesOffset()
            },
            b.updateSlidesOffset = function() {
                for (var e = 0; e < b.slides.length; e++) b.slides[e].swiperSlideOffset = b.isHorizontal() ? b.slides[e].offsetLeft: b.slides[e].offsetTop
            },
            b.updateSlidesProgress = function(e) {
                if ("undefined" == typeof e && (e = b.translate || 0), 0 !== b.slides.length) {
                    "undefined" == typeof b.slides[0].swiperSlideOffset && b.updateSlidesOffset();
                    var t = -e;
                    b.rtl && (t = e),
                    b.slides.removeClass(b.params.slideVisibleClass);
                    for (var a = 0; a < b.slides.length; a++) {
                        var i = b.slides[a],
                        s = (t - i.swiperSlideOffset) / (i.swiperSlideSize + b.params.spaceBetween);
                        if (b.params.watchSlidesVisibility) {
                            var n = -(t - i.swiperSlideOffset),
                            o = n + b.slidesSizesGrid[a],
                            r = n >= 0 && n < b.size || o > 0 && o <= b.size || n <= 0 && o >= b.size;
                            r && b.slides.eq(a).addClass(b.params.slideVisibleClass);
                        }
                        i.progress = b.rtl ? -s: s
                    }
                }
            },
            b.updateProgress = function(e) {
                "undefined" == typeof e && (e = b.translate || 0);
                var t = b.maxTranslate() - b.minTranslate(),
                a = b.isBeginning,
                i = b.isEnd;
                0 === t ? (b.progress = 0, b.isBeginning = b.isEnd = !0) : (b.progress = (e - b.minTranslate()) / t, b.isBeginning = b.progress <= 0, b.isEnd = b.progress >= 1),
                b.isBeginning && !a && b.emit("onReachBeginning", b),
                b.isEnd && !i && b.emit("onReachEnd", b),
                b.params.watchSlidesProgress && b.updateSlidesProgress(e),
                b.emit("onProgress", b, b.progress)
            },
            b.updateActiveIndex = function() {
                var e, t, a, i = b.rtl ? b.translate: -b.translate;
                for (t = 0; t < b.slidesGrid.length; t++)"undefined" != typeof b.slidesGrid[t + 1] ? i >= b.slidesGrid[t] && i < b.slidesGrid[t + 1] - (b.slidesGrid[t + 1] - b.slidesGrid[t]) / 2 ? e = t: i >= b.slidesGrid[t] && i < b.slidesGrid[t + 1] && (e = t + 1) : i >= b.slidesGrid[t] && (e = t); (e < 0 || "undefined" == typeof e) && (e = 0),
                a = Math.floor(e / b.params.slidesPerGroup),
                a >= b.snapGrid.length && (a = b.snapGrid.length - 1),
                e !== b.activeIndex && (b.snapIndex = a, b.previousIndex = b.activeIndex, b.activeIndex = e, b.updateClasses())
            },
            b.updateClasses = function() {
                b.slides.removeClass(b.params.slideActiveClass + " " + b.params.slideNextClass + " " + b.params.slidePrevClass);
                var e = b.slides.eq(b.activeIndex);
                if (e.addClass(b.params.slideActiveClass), e.next("." + b.params.slideClass).addClass(b.params.slideNextClass), e.prev("." + b.params.slideClass).addClass(b.params.slidePrevClass), b.paginationContainer && b.paginationContainer.length > 0) {
                    var a, i = b.params.loop ? Math.ceil((b.slides.length - 2 * b.loopedSlides) / b.params.slidesPerGroup) : b.snapGrid.length;
                    if (b.params.loop ? (a = Math.ceil(b.activeIndex - b.loopedSlides) / b.params.slidesPerGroup, a > b.slides.length - 1 - 2 * b.loopedSlides && (a -= b.slides.length - 2 * b.loopedSlides), a > i - 1 && (a -= i), a < 0 && "bullets" !== b.params.paginationType && (a = i + a)) : a = "undefined" != typeof b.snapIndex ? b.snapIndex: b.activeIndex || 0, "bullets" === b.params.paginationType && b.bullets && b.bullets.length > 0 && (b.bullets.removeClass(b.params.bulletActiveClass), b.paginationContainer.length > 1 ? b.bullets.each(function() {
                        t(this).index() === a && t(this).addClass(b.params.bulletActiveClass)
                    }) : b.bullets.eq(a).addClass(b.params.bulletActiveClass)), "fraction" === b.params.paginationType && (b.paginationContainer.find("." + b.params.paginationCurrentClass).text(a + 1), b.paginationContainer.find("." + b.params.paginationTotalClass).text(i)), "progress" === b.params.paginationType) {
                        var s = (a + 1) / i,
                        n = s,
                        o = 1;
                        b.isHorizontal() || (o = s, n = 1),
                        b.paginationContainer.find("." + b.params.paginationProgressbarClass).transform("translate3d(0,0,0) scaleX(" + n + ") scaleY(" + o + ")").transition(b.params.speed)
                    }
                    "custom" === b.params.paginationType && b.params.paginationCustomRender && b.paginationContainer.html(b.params.paginationCustomRender(b, a + 1, i))
                }
                b.params.loop || (b.params.prevButton && (b.isBeginning ? (t(b.params.prevButton).addClass(b.params.buttonDisabledClass), b.params.a11y && b.a11y && b.a11y.disable(t(b.params.prevButton))) : (t(b.params.prevButton).removeClass(b.params.buttonDisabledClass), b.params.a11y && b.a11y && b.a11y.enable(t(b.params.prevButton)))), b.params.nextButton && (b.isEnd ? (t(b.params.nextButton).addClass(b.params.buttonDisabledClass), b.params.a11y && b.a11y && b.a11y.disable(t(b.params.nextButton))) : (t(b.params.nextButton).removeClass(b.params.buttonDisabledClass), b.params.a11y && b.a11y && b.a11y.enable(t(b.params.nextButton)))))
            },
            b.updatePagination = function() {
                if (b.params.pagination && b.paginationContainer && b.paginationContainer.length > 0) {
                    var e = "";
                    if ("bullets" === b.params.paginationType) {
                        for (var t = b.params.loop ? Math.ceil((b.slides.length - 2 * b.loopedSlides) / b.params.slidesPerGroup) : b.snapGrid.length, a = 0; a < t; a++) e += b.params.paginationBulletRender ? b.params.paginationBulletRender(a, b.params.bulletClass) : "<" + b.params.paginationElement + ' class="' + b.params.bulletClass + '"></' + b.params.paginationElement + ">";
                        b.paginationContainer.html(e),
                        b.bullets = b.paginationContainer.find("." + b.params.bulletClass),
                        b.params.paginationClickable && b.params.a11y && b.a11y && b.a11y.initPagination()
                    }
                    "fraction" === b.params.paginationType && (e = b.params.paginationFractionRender ? b.params.paginationFractionRender(b, b.params.paginationCurrentClass, b.params.paginationTotalClass) : '<span class="' + b.params.paginationCurrentClass + '"></span> / <span class="' + b.params.paginationTotalClass + '"></span>', b.paginationContainer.html(e)),
                    "progress" === b.params.paginationType && (e = b.params.paginationProgressRender ? b.params.paginationProgressRender(b, b.params.paginationProgressbarClass) : '<span class="' + b.params.paginationProgressbarClass + '"></span>', b.paginationContainer.html(e))
                }
            },
            b.update = function(e) {
                function t() {
                    i = Math.min(Math.max(b.translate, b.maxTranslate()), b.minTranslate()),
                    b.setWrapperTranslate(i),
                    b.updateActiveIndex(),
                    b.updateClasses()
                }
                if (b.updateContainerSize(), b.updateSlidesSize(), b.updateProgress(), b.updatePagination(), b.updateClasses(), b.params.scrollbar && b.scrollbar && b.scrollbar.set(), e) {
                    var a, i;
                    b.controller && b.controller.spline && (b.controller.spline = void 0),
                    b.params.freeMode ? (t(), b.params.autoHeight && b.updateAutoHeight()) : (a = ("auto" === b.params.slidesPerView || b.params.slidesPerView > 1) && b.isEnd && !b.params.centeredSlides ? b.slideTo(b.slides.length - 1, 0, !1, !0) : b.slideTo(b.activeIndex, 0, !1, !0), a || t())
                } else b.params.autoHeight && b.updateAutoHeight()
            },
            b.onResize = function(e) {
                b.params.breakpoints && b.setBreakpoint();
                var t = b.params.allowSwipeToPrev,
                a = b.params.allowSwipeToNext;
                if (b.params.allowSwipeToPrev = b.params.allowSwipeToNext = !0, b.updateContainerSize(), b.updateSlidesSize(), ("auto" === b.params.slidesPerView || b.params.freeMode || e) && b.updatePagination(), b.params.scrollbar && b.scrollbar && b.scrollbar.set(), b.controller && b.controller.spline && (b.controller.spline = void 0), b.params.freeMode) {
                    var i = Math.min(Math.max(b.translate, b.maxTranslate()), b.minTranslate());
                    b.setWrapperTranslate(i),
                    b.updateActiveIndex(),
                    b.updateClasses(),
                    b.params.autoHeight && b.updateAutoHeight()
                } else b.updateClasses(),
                ("auto" === b.params.slidesPerView || b.params.slidesPerView > 1) && b.isEnd && !b.params.centeredSlides ? b.slideTo(b.slides.length - 1, 0, !1, !0) : b.slideTo(b.activeIndex, 0, !1, !0);
                b.params.allowSwipeToPrev = t,
                b.params.allowSwipeToNext = a
            };
            var y = ["mousedown", "mousemove", "mouseup"];
            window.navigator.pointerEnabled ? y = ["pointerdown", "pointermove", "pointerup"] : window.navigator.msPointerEnabled && (y = ["MSPointerDown", "MSPointerMove", "MSPointerUp"]),
            b.touchEvents = {
                start: b.support.touch || !b.params.simulateTouch ? "touchstart": y[0],
                move: b.support.touch || !b.params.simulateTouch ? "touchmove": y[1],
                end: b.support.touch || !b.params.simulateTouch ? "touchend": y[2]
            },
            (window.navigator.pointerEnabled || window.navigator.msPointerEnabled) && ("container" === b.params.touchEventsTarget ? b.container: b.wrapper).addClass("swiper-wp8-" + b.params.direction),
            b.initEvents = function(e) {
                var a = e ? "off": "on",
                s = e ? "removeEventListener": "addEventListener",
                n = "container" === b.params.touchEventsTarget ? b.container[0] : b.wrapper[0],
                o = b.support.touch ? n: document,
                r = !!b.params.nested;
                b.browser.ie ? (n[s](b.touchEvents.start, b.onTouchStart, !1), o[s](b.touchEvents.move, b.onTouchMove, r), o[s](b.touchEvents.end, b.onTouchEnd, !1)) : (b.support.touch && (n[s](b.touchEvents.start, b.onTouchStart, !1), n[s](b.touchEvents.move, b.onTouchMove, r), n[s](b.touchEvents.end, b.onTouchEnd, !1)), !i.simulateTouch || b.device.ios || b.device.android || (n[s]("mousedown", b.onTouchStart, !1), document[s]("mousemove", b.onTouchMove, r), document[s]("mouseup", b.onTouchEnd, !1))),
                window[s]("resize", b.onResize),
                b.params.nextButton && (t(b.params.nextButton)[a]("click", b.onClickNext), b.params.a11y && b.a11y && t(b.params.nextButton)[a]("keydown", b.a11y.onEnterKey)),
                b.params.prevButton && (t(b.params.prevButton)[a]("click", b.onClickPrev), b.params.a11y && b.a11y && t(b.params.prevButton)[a]("keydown", b.a11y.onEnterKey)),
                b.params.pagination && b.params.paginationClickable && (t(b.paginationContainer)[a]("click", "." + b.params.bulletClass, b.onClickIndex), b.params.a11y && b.a11y && t(b.paginationContainer)[a]("keydown", "." + b.params.bulletClass, b.a11y.onEnterKey)),
                (b.params.preventClicks || b.params.preventClicksPropagation) && n[s]("click", b.preventClicks, !0)
            },
            b.attachEvents = function(e) {
                b.initEvents()
            },
            b.detachEvents = function() {
                b.initEvents(!0)
            },
            b.allowClick = !0,
            b.preventClicks = function(e) {
                b.allowClick || (b.params.preventClicks && e.preventDefault(), b.params.preventClicksPropagation && b.animating && (e.stopPropagation(), e.stopImmediatePropagation()))
            },
            b.onClickNext = function(e) {
                e.preventDefault(),
                b.isEnd && !b.params.loop || b.slideNext()
            },
            b.onClickPrev = function(e) {
                e.preventDefault(),
                b.isBeginning && !b.params.loop || b.slidePrev()
            },
            b.onClickIndex = function(e) {
                e.preventDefault();
                var a = t(this).index() * b.params.slidesPerGroup;
                b.params.loop && (a += b.loopedSlides),
                b.slideTo(a)
            },
            b.updateClickedSlide = function(e) {
                var a = o(e, "." + b.params.slideClass),
                i = !1;
                if (a) for (var s = 0; s < b.slides.length; s++) b.slides[s] === a && (i = !0);
                if (!a || !i) return b.clickedSlide = void 0,
                void(b.clickedIndex = void 0);
                if (b.clickedSlide = a, b.clickedIndex = t(a).index(), b.params.slideToClickedSlide && void 0 !== b.clickedIndex && b.clickedIndex !== b.activeIndex) {
                    var n, r = b.clickedIndex;
                    if (b.params.loop) {
                        if (b.animating) return;
                        n = t(b.clickedSlide).attr("data-swiper-slide-index"),
                        b.params.centeredSlides ? r < b.loopedSlides - b.params.slidesPerView / 2 || r > b.slides.length - b.loopedSlides + b.params.slidesPerView / 2 ? (b.fixLoop(), r = b.wrapper.children("." + b.params.slideClass + '[data-swiper-slide-index="' + n + '"]:not(.swiper-slide-duplicate)').eq(0).index(), setTimeout(function() {
                            b.slideTo(r)
                        },
                        0)) : b.slideTo(r) : r > b.slides.length - b.params.slidesPerView ? (b.fixLoop(), r = b.wrapper.children("." + b.params.slideClass + '[data-swiper-slide-index="' + n + '"]:not(.swiper-slide-duplicate)').eq(0).index(), setTimeout(function() {
                            b.slideTo(r)
                        },
                        0)) : b.slideTo(r)
                    } else b.slideTo(r)
                }
            };
            var T, x, S, C, $, k, I, E, P, D, O = "input, select, textarea, button",
            M = Date.now(),
            z = [];
            b.animating = !1,
            b.touches = {
                startX: 0,
                startY: 0,
                currentX: 0,
                currentY: 0,
                diff: 0
            };
            var A, _;
            if (b.onTouchStart = function(e) {
                if (e.originalEvent && (e = e.originalEvent), A = "touchstart" === e.type, A || !("which" in e) || 3 !== e.which) {
                    if (b.params.noSwiping && o(e, "." + b.params.noSwipingClass)) return void(b.allowClick = !0);
                    if (!b.params.swipeHandler || o(e, b.params.swipeHandler)) {
                        var a = b.touches.currentX = "touchstart" === e.type ? e.targetTouches[0].pageX: e.pageX,
                        i = b.touches.currentY = "touchstart" === e.type ? e.targetTouches[0].pageY: e.pageY;
                        if (! (b.device.ios && b.params.iOSEdgeSwipeDetection && a <= b.params.iOSEdgeSwipeThreshold)) {
                            if (T = !0, x = !1, S = !0, $ = void 0, _ = void 0, b.touches.startX = a, b.touches.startY = i, C = Date.now(), b.allowClick = !0, b.updateContainerSize(), b.swipeDirection = void 0, b.params.threshold > 0 && (E = !1), "touchstart" !== e.type) {
                                var s = !0;
                                t(e.target).is(O) && (s = !1),
                                document.activeElement && t(document.activeElement).is(O) && document.activeElement.blur(),
                                s && e.preventDefault()
                            }
                            b.emit("onTouchStart", b, e)
                        }
                    }
                }
            },
            b.onTouchMove = function(e) {
                if (e.originalEvent && (e = e.originalEvent), !(A && "mousemove" === e.type || e.preventedByNestedSwiper)) {
                    if (b.params.onlyExternal) return b.allowClick = !1,
                    void(T && (b.touches.startX = b.touches.currentX = "touchmove" === e.type ? e.targetTouches[0].pageX: e.pageX, b.touches.startY = b.touches.currentY = "touchmove" === e.type ? e.targetTouches[0].pageY: e.pageY, C = Date.now()));
                    if (A && document.activeElement && e.target === document.activeElement && t(e.target).is(O)) return x = !0,
                    void(b.allowClick = !1);
                    if (S && b.emit("onTouchMove", b, e), !(e.targetTouches && e.targetTouches.length > 1)) {
                        if (b.touches.currentX = "touchmove" === e.type ? e.targetTouches[0].pageX: e.pageX, b.touches.currentY = "touchmove" === e.type ? e.targetTouches[0].pageY: e.pageY, "undefined" == typeof $) {
                            var a = 180 * Math.atan2(Math.abs(b.touches.currentY - b.touches.startY), Math.abs(b.touches.currentX - b.touches.startX)) / Math.PI;
                            $ = b.isHorizontal() ? a > b.params.touchAngle: 90 - a > b.params.touchAngle
                        }
                        if ($ && b.emit("onTouchMoveOpposite", b, e), "undefined" == typeof _ && b.browser.ieTouch && (b.touches.currentX === b.touches.startX && b.touches.currentY === b.touches.startY || (_ = !0)), T) {
                            if ($) return void(T = !1);
                            if (_ || !b.browser.ieTouch) {
                                b.allowClick = !1,
                                b.emit("onSliderMove", b, e),
                                e.preventDefault(),
                                b.params.touchMoveStopPropagation && !b.params.nested && e.stopPropagation(),
                                x || (i.loop && b.fixLoop(), I = b.getWrapperTranslate(), b.setWrapperTransition(0), b.animating && b.wrapper.trigger("webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd msTransitionEnd"), b.params.autoplay && b.autoplaying && (b.params.autoplayDisableOnInteraction ? b.stopAutoplay() : b.pauseAutoplay()), D = !1, b.params.grabCursor && (b.container[0].style.cursor = "move", b.container[0].style.cursor = "-webkit-grabbing", b.container[0].style.cursor = "-moz-grabbin", b.container[0].style.cursor = "grabbing")),
                                x = !0;
                                var s = b.touches.diff = b.isHorizontal() ? b.touches.currentX - b.touches.startX: b.touches.currentY - b.touches.startY;
                                s *= b.params.touchRatio,
                                b.rtl && (s = -s),
                                b.swipeDirection = s > 0 ? "prev": "next",
                                k = s + I;
                                var n = !0;
                                if (s > 0 && k > b.minTranslate() ? (n = !1, b.params.resistance && (k = b.minTranslate() - 1 + Math.pow( - b.minTranslate() + I + s, b.params.resistanceRatio))) : s < 0 && k < b.maxTranslate() && (n = !1, b.params.resistance && (k = b.maxTranslate() + 1 - Math.pow(b.maxTranslate() - I - s, b.params.resistanceRatio))), n && (e.preventedByNestedSwiper = !0), !b.params.allowSwipeToNext && "next" === b.swipeDirection && k < I && (k = I), !b.params.allowSwipeToPrev && "prev" === b.swipeDirection && k > I && (k = I), b.params.followFinger) {
                                    if (b.params.threshold > 0) {
                                        if (! (Math.abs(s) > b.params.threshold || E)) return void(k = I);
                                        if (!E) return E = !0,
                                        b.touches.startX = b.touches.currentX,
                                        b.touches.startY = b.touches.currentY,
                                        k = I,
                                        void(b.touches.diff = b.isHorizontal() ? b.touches.currentX - b.touches.startX: b.touches.currentY - b.touches.startY)
                                    } (b.params.freeMode || b.params.watchSlidesProgress) && b.updateActiveIndex(),
                                    b.params.freeMode && (0 === z.length && z.push({
                                        position: b.touches[b.isHorizontal() ? "startX": "startY"],
                                        time: C
                                    }), z.push({
                                        position: b.touches[b.isHorizontal() ? "currentX": "currentY"],
                                        time: (new window.Date).getTime()
                                    })),
                                    b.updateProgress(k),
                                    b.setWrapperTranslate(k)
                                }
                            }
                        }
                    }
                }
            },
            b.onTouchEnd = function(e) {
                if (e.originalEvent && (e = e.originalEvent), S && b.emit("onTouchEnd", b, e), S = !1, T) {
                    b.params.grabCursor && x && T && (b.container[0].style.cursor = "move", b.container[0].style.cursor = "-webkit-grab", b.container[0].style.cursor = "-moz-grab", b.container[0].style.cursor = "grab");
                    var a = Date.now(),
                    i = a - C;
                    if (b.allowClick && (b.updateClickedSlide(e), b.emit("onTap", b, e), i < 300 && a - M > 300 && (P && clearTimeout(P), P = setTimeout(function() {
                        b && (b.params.paginationHide && b.paginationContainer.length > 0 && !t(e.target).hasClass(b.params.bulletClass) && b.paginationContainer.toggleClass(b.params.paginationHiddenClass), b.emit("onClick", b, e))
                    },
                    300)), i < 300 && a - M < 300 && (P && clearTimeout(P), b.emit("onDoubleTap", b, e))), M = Date.now(), setTimeout(function() {
                        b && (b.allowClick = !0)
                    },
                    0), !T || !x || !b.swipeDirection || 0 === b.touches.diff || k === I) return void(T = x = !1);
                    T = x = !1;
                    var s;
                    if (s = b.params.followFinger ? b.rtl ? b.translate: -b.translate: -k, b.params.freeMode) {
                        if (s < -b.minTranslate()) return void b.slideTo(b.activeIndex);
                        if (s > -b.maxTranslate()) return void(b.slides.length < b.snapGrid.length ? b.slideTo(b.snapGrid.length - 1) : b.slideTo(b.slides.length - 1));
                        if (b.params.freeModeMomentum) {
                            if (z.length > 1) {
                                var n = z.pop(),
                                o = z.pop(),
                                r = n.position - o.position,
                                l = n.time - o.time;
                                b.velocity = r / l,
                                b.velocity = b.velocity / 2,
                                Math.abs(b.velocity) < b.params.freeModeMinimumVelocity && (b.velocity = 0),
                                (l > 150 || (new window.Date).getTime() - n.time > 300) && (b.velocity = 0)
                            } else b.velocity = 0;
                            z.length = 0;
                            var d = 1e3 * b.params.freeModeMomentumRatio,
                            p = b.velocity * d,
                            c = b.translate + p;
                            b.rtl && (c = -c);
                            var u, h = !1,
                            f = 20 * Math.abs(b.velocity) * b.params.freeModeMomentumBounceRatio;
                            if (c < b.maxTranslate()) b.params.freeModeMomentumBounce ? (c + b.maxTranslate() < -f && (c = b.maxTranslate() - f), u = b.maxTranslate(), h = !0, D = !0) : c = b.maxTranslate();
                            else if (c > b.minTranslate()) b.params.freeModeMomentumBounce ? (c - b.minTranslate() > f && (c = b.minTranslate() + f), u = b.minTranslate(), h = !0, D = !0) : c = b.minTranslate();
                            else if (b.params.freeModeSticky) {
                                var m, g = 0;
                                for (g = 0; g < b.snapGrid.length; g += 1) if (b.snapGrid[g] > -c) {
                                    m = g;
                                    break
                                }
                                c = Math.abs(b.snapGrid[m] - c) < Math.abs(b.snapGrid[m - 1] - c) || "next" === b.swipeDirection ? b.snapGrid[m] : b.snapGrid[m - 1],
                                b.rtl || (c = -c)
                            }
                            if (0 !== b.velocity) d = b.rtl ? Math.abs(( - c - b.translate) / b.velocity) : Math.abs((c - b.translate) / b.velocity);
                            else if (b.params.freeModeSticky) return void b.slideReset();
                            b.params.freeModeMomentumBounce && h ? (b.updateProgress(u), b.setWrapperTransition(d), b.setWrapperTranslate(c), b.onTransitionStart(), b.animating = !0, b.wrapper.transitionEnd(function() {
                                b && D && (b.emit("onMomentumBounce", b), b.setWrapperTransition(b.params.speed), b.setWrapperTranslate(u), b.wrapper.transitionEnd(function() {
                                    b && b.onTransitionEnd()
                                }))
                            })) : b.velocity ? (b.updateProgress(c), b.setWrapperTransition(d), b.setWrapperTranslate(c), b.onTransitionStart(), b.animating || (b.animating = !0, b.wrapper.transitionEnd(function() {
                                b && b.onTransitionEnd()
                            }))) : b.updateProgress(c),
                            b.updateActiveIndex()
                        }
                        return void((!b.params.freeModeMomentum || i >= b.params.longSwipesMs) && (b.updateProgress(), b.updateActiveIndex()))
                    }
                    var v, w = 0,
                    y = b.slidesSizesGrid[0];
                    for (v = 0; v < b.slidesGrid.length; v += b.params.slidesPerGroup)"undefined" != typeof b.slidesGrid[v + b.params.slidesPerGroup] ? s >= b.slidesGrid[v] && s < b.slidesGrid[v + b.params.slidesPerGroup] && (w = v, y = b.slidesGrid[v + b.params.slidesPerGroup] - b.slidesGrid[v]) : s >= b.slidesGrid[v] && (w = v, y = b.slidesGrid[b.slidesGrid.length - 1] - b.slidesGrid[b.slidesGrid.length - 2]);
                    var $ = (s - b.slidesGrid[w]) / y;
                    if (i > b.params.longSwipesMs) {
                        if (!b.params.longSwipes) return void b.slideTo(b.activeIndex);
                        "next" === b.swipeDirection && ($ >= b.params.longSwipesRatio ? b.slideTo(w + b.params.slidesPerGroup) : b.slideTo(w)),
                        "prev" === b.swipeDirection && ($ > 1 - b.params.longSwipesRatio ? b.slideTo(w + b.params.slidesPerGroup) : b.slideTo(w))
                    } else {
                        if (!b.params.shortSwipes) return void b.slideTo(b.activeIndex);
                        "next" === b.swipeDirection && b.slideTo(w + b.params.slidesPerGroup),
                        "prev" === b.swipeDirection && b.slideTo(w)
                    }
                }
            },
            b._slideTo = function(e, t) {
                return b.slideTo(e, t, !0, !0)
            },
            b.slideTo = function(e, t, a, i) {
                "undefined" == typeof a && (a = !0),
                "undefined" == typeof e && (e = 0),
                e < 0 && (e = 0),
                b.snapIndex = Math.floor(e / b.params.slidesPerGroup),
                b.snapIndex >= b.snapGrid.length && (b.snapIndex = b.snapGrid.length - 1);
                var s = -b.snapGrid[b.snapIndex];
                b.params.autoplay && b.autoplaying && (i || !b.params.autoplayDisableOnInteraction ? b.pauseAutoplay(t) : b.stopAutoplay()),
                b.updateProgress(s);
                for (var n = 0; n < b.slidesGrid.length; n++) - Math.floor(100 * s) >= Math.floor(100 * b.slidesGrid[n]) && (e = n);
                return ! (!b.params.allowSwipeToNext && s < b.translate && s < b.minTranslate()) && (!(!b.params.allowSwipeToPrev && s > b.translate && s > b.maxTranslate() && (b.activeIndex || 0) !== e) && ("undefined" == typeof t && (t = b.params.speed), b.previousIndex = b.activeIndex || 0, b.activeIndex = e, b.rtl && -s === b.translate || !b.rtl && s === b.translate ? (b.params.autoHeight && b.updateAutoHeight(), b.updateClasses(), "slide" !== b.params.effect && b.setWrapperTranslate(s), !1) : (b.updateClasses(), b.onTransitionStart(a), 0 === t ? (b.setWrapperTranslate(s), b.setWrapperTransition(0), b.onTransitionEnd(a)) : (b.setWrapperTranslate(s), b.setWrapperTransition(t), b.animating || (b.animating = !0, b.wrapper.transitionEnd(function() {
                    b && b.onTransitionEnd(a)
                }))), !0)))
            },
            b.onTransitionStart = function(e) {
                "undefined" == typeof e && (e = !0),
                b.params.autoHeight && b.updateAutoHeight(),
                b.lazy && b.lazy.onTransitionStart(),
                e && (b.emit("onTransitionStart", b), b.activeIndex !== b.previousIndex && (b.emit("onSlideChangeStart", b), b.activeIndex > b.previousIndex ? b.emit("onSlideNextStart", b) : b.emit("onSlidePrevStart", b)))
            },
            b.onTransitionEnd = function(e) {
                b.animating = !1,
                b.setWrapperTransition(0),
                "undefined" == typeof e && (e = !0),
                b.lazy && b.lazy.onTransitionEnd(),
                e && (b.emit("onTransitionEnd", b), b.activeIndex !== b.previousIndex && (b.emit("onSlideChangeEnd", b), b.activeIndex > b.previousIndex ? b.emit("onSlideNextEnd", b) : b.emit("onSlidePrevEnd", b))),
                b.params.hashnav && b.hashnav && b.hashnav.setHash()
            },
            b.slideNext = function(e, t, a) {
                if (b.params.loop) {
                    if (b.animating) return ! 1;
                    b.fixLoop();
                    b.container[0].clientLeft;
                    return b.slideTo(b.activeIndex + b.params.slidesPerGroup, t, e, a)
                }
                return b.slideTo(b.activeIndex + b.params.slidesPerGroup, t, e, a)
            },
            b._slideNext = function(e) {
                return b.slideNext(!0, e, !0)
            },
            b.slidePrev = function(e, t, a) {
                if (b.params.loop) {
                    if (b.animating) return ! 1;
                    b.fixLoop();
                    b.container[0].clientLeft;
                    return b.slideTo(b.activeIndex - 1, t, e, a)
                }
                return b.slideTo(b.activeIndex - 1, t, e, a)
            },
            b._slidePrev = function(e) {
                return b.slidePrev(!0, e, !0)
            },
            b.slideReset = function(e, t, a) {
                return b.slideTo(b.activeIndex, t, e)
            },
            b.setWrapperTransition = function(e, t) {
                b.wrapper.transition(e),
                "slide" !== b.params.effect && b.effects[b.params.effect] && b.effects[b.params.effect].setTransition(e),
                b.params.parallax && b.parallax && b.parallax.setTransition(e),
                b.params.scrollbar && b.scrollbar && b.scrollbar.setTransition(e),
                b.params.control && b.controller && b.controller.setTransition(e, t),
                b.emit("onSetTransition", b, e)
            },
            b.setWrapperTranslate = function(e, t, a) {
                var i = 0,
                n = 0,
                o = 0;
                b.isHorizontal() ? i = b.rtl ? -e: e: n = e,
                b.params.roundLengths && (i = s(i), n = s(n)),
                b.params.virtualTranslate || (b.support.transforms3d ? b.wrapper.transform("translate3d(" + i + "px, " + n + "px, " + o + "px)") : b.wrapper.transform("translate(" + i + "px, " + n + "px)")),
                b.translate = b.isHorizontal() ? i: n;
                var r, l = b.maxTranslate() - b.minTranslate();
                r = 0 === l ? 0 : (e - b.minTranslate()) / l,
                r !== b.progress && b.updateProgress(e),
                t && b.updateActiveIndex(),
                "slide" !== b.params.effect && b.effects[b.params.effect] && b.effects[b.params.effect].setTranslate(b.translate),
                b.params.parallax && b.parallax && b.parallax.setTranslate(b.translate),
                b.params.scrollbar && b.scrollbar && b.scrollbar.setTranslate(b.translate),
                b.params.control && b.controller && b.controller.setTranslate(b.translate, a),
                b.emit("onSetTranslate", b, b.translate)
            },
            b.getTranslate = function(e, t) {
                var a, i, s, n;
                return "undefined" == typeof t && (t = "x"),
                b.params.virtualTranslate ? b.rtl ? -b.translate: b.translate: (s = window.getComputedStyle(e, null), window.WebKitCSSMatrix ? (i = s.transform || s.webkitTransform, i.split(",").length > 6 && (i = i.split(", ").map(function(e) {
                    return e.replace(",", ".")
                }).join(", ")), n = new window.WebKitCSSMatrix("none" === i ? "": i)) : (n = s.MozTransform || s.OTransform || s.MsTransform || s.msTransform || s.transform || s.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,"), a = n.toString().split(",")), "x" === t && (i = window.WebKitCSSMatrix ? n.m41: 16 === a.length ? parseFloat(a[12]) : parseFloat(a[4])), "y" === t && (i = window.WebKitCSSMatrix ? n.m42: 16 === a.length ? parseFloat(a[13]) : parseFloat(a[5])), b.rtl && i && (i = -i), i || 0)
            },
            b.getWrapperTranslate = function(e) {
                return "undefined" == typeof e && (e = b.isHorizontal() ? "x": "y"),
                b.getTranslate(b.wrapper[0], e)
            },
            b.observers = [], b.initObservers = function() {
                if (b.params.observeParents) for (var e = b.container.parents(), t = 0; t < e.length; t++) r(e[t]);
                r(b.container[0], {
                    childList: !1
                }),
                r(b.wrapper[0], {
                    attributes: !1
                })
            },
            b.disconnectObservers = function() {
                for (var e = 0; e < b.observers.length; e++) b.observers[e].disconnect();
                b.observers = []
            },
            b.createLoop = function() {
                b.wrapper.children("." + b.params.slideClass + "." + b.params.slideDuplicateClass).remove();
                var e = b.wrapper.children("." + b.params.slideClass);
                "auto" !== b.params.slidesPerView || b.params.loopedSlides || (b.params.loopedSlides = e.length),
                b.loopedSlides = parseInt(b.params.loopedSlides || b.params.slidesPerView, 10),
                b.loopedSlides = b.loopedSlides + b.params.loopAdditionalSlides,
                b.loopedSlides > e.length && (b.loopedSlides = e.length);
                var a, i = [],
                s = [];
                for (e.each(function(a, n) {
                    var o = t(this);
                    a < b.loopedSlides && s.push(n),
                    a < e.length && a >= e.length - b.loopedSlides && i.push(n),
                    o.attr("data-swiper-slide-index", a)
                }), a = 0; a < s.length; a++) b.wrapper.append(t(s[a].cloneNode(!0)).addClass(b.params.slideDuplicateClass));
                for (a = i.length - 1; a >= 0; a--) b.wrapper.prepend(t(i[a].cloneNode(!0)).addClass(b.params.slideDuplicateClass))
            },
            b.destroyLoop = function() {
                b.wrapper.children("." + b.params.slideClass + "." + b.params.slideDuplicateClass).remove(),
                b.slides.removeAttr("data-swiper-slide-index")
            },
            b.fixLoop = function() {
                var e;
                b.activeIndex < b.loopedSlides ? (e = b.slides.length - 3 * b.loopedSlides + b.activeIndex, e += b.loopedSlides, b.slideTo(e, 0, !1, !0)) : ("auto" === b.params.slidesPerView && b.activeIndex >= 2 * b.loopedSlides || b.activeIndex > b.slides.length - 2 * b.params.slidesPerView) && (e = -b.slides.length + b.activeIndex + b.loopedSlides, e += b.loopedSlides, b.slideTo(e, 0, !1, !0))
            },
            b.appendSlide = function(e) {
                if (b.params.loop && b.destroyLoop(), "object" == typeof e && e.length) for (var t = 0; t < e.length; t++) e[t] && b.wrapper.append(e[t]);
                else b.wrapper.append(e);
                b.params.loop && b.createLoop(),
                b.params.observer && b.support.observer || b.update(!0)
            },
            b.prependSlide = function(e) {
                b.params.loop && b.destroyLoop();
                var t = b.activeIndex + 1;
                if ("object" == typeof e && e.length) {
                    for (var a = 0; a < e.length; a++) e[a] && b.wrapper.prepend(e[a]);
                    t = b.activeIndex + e.length
                } else b.wrapper.prepend(e);
                b.params.loop && b.createLoop(),
                b.params.observer && b.support.observer || b.update(!0),
                b.slideTo(t, 0, !1)
            },
            b.removeSlide = function(e) {
                b.params.loop && (b.destroyLoop(), b.slides = b.wrapper.children("." + b.params.slideClass));
                var t, a = b.activeIndex;
                if ("object" == typeof e && e.length) {
                    for (var i = 0; i < e.length; i++) t = e[i],
                    b.slides[t] && b.slides.eq(t).remove(),
                    t < a && a--;
                    a = Math.max(a, 0)
                } else t = e,
                b.slides[t] && b.slides.eq(t).remove(),
                t < a && a--,
                a = Math.max(a, 0);
                b.params.loop && b.createLoop(),
                b.params.observer && b.support.observer || b.update(!0),
                b.params.loop ? b.slideTo(a + b.loopedSlides, 0, !1) : b.slideTo(a, 0, !1)
            },
            b.removeAllSlides = function() {
                for (var e = [], t = 0; t < b.slides.length; t++) e.push(t);
                b.removeSlide(e)
            },
            b.effects = {
                fade: {
                    setTranslate: function() {
                        for (var e = 0; e < b.slides.length; e++) {
                            var t = b.slides.eq(e),
                            a = t[0].swiperSlideOffset,
                            i = -a;
                            b.params.virtualTranslate || (i -= b.translate);
                            var s = 0;
                            b.isHorizontal() || (s = i, i = 0);
                            var n = b.params.fade.crossFade ? Math.max(1 - Math.abs(t[0].progress), 0) : 1 + Math.min(Math.max(t[0].progress, -1), 0);
                            t.css({
                                opacity: n
                            }).transform("translate3d(" + i + "px, " + s + "px, 0px)")
                        }
                    },
                    setTransition: function(e) {
                        if (b.slides.transition(e), b.params.virtualTranslate && 0 !== e) {
                            var t = !1;
                            b.slides.transitionEnd(function() {
                                if (!t && b) {
                                    t = !0,
                                    b.animating = !1;
                                    for (var e = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"], a = 0; a < e.length; a++) b.wrapper.trigger(e[a])
                                }
                            })
                        }
                    }
                },
                flip: {
                    setTranslate: function() {
                        for (var e = 0; e < b.slides.length; e++) {
                            var a = b.slides.eq(e),
                            i = a[0].progress;
                            b.params.flip.limitRotation && (i = Math.max(Math.min(a[0].progress, 1), -1));
                            var s = a[0].swiperSlideOffset,
                            n = -180 * i,
                            o = n,
                            r = 0,
                            l = -s,
                            d = 0;
                            if (b.isHorizontal() ? b.rtl && (o = -o) : (d = l, l = 0, r = -o, o = 0), a[0].style.zIndex = -Math.abs(Math.round(i)) + b.slides.length, b.params.flip.slideShadows) {
                                var p = b.isHorizontal() ? a.find(".swiper-slide-shadow-left") : a.find(".swiper-slide-shadow-top"),
                                c = b.isHorizontal() ? a.find(".swiper-slide-shadow-right") : a.find(".swiper-slide-shadow-bottom");
                                0 === p.length && (p = t('<div class="swiper-slide-shadow-' + (b.isHorizontal() ? "left": "top") + '"></div>'), a.append(p)),
                                0 === c.length && (c = t('<div class="swiper-slide-shadow-' + (b.isHorizontal() ? "right": "bottom") + '"></div>'), a.append(c)),
                                p.length && (p[0].style.opacity = Math.max( - i, 0)),
                                c.length && (c[0].style.opacity = Math.max(i, 0))
                            }
                            a.transform("translate3d(" + l + "px, " + d + "px, 0px) rotateX(" + r + "deg) rotateY(" + o + "deg)")
                        }
                    },
                    setTransition: function(e) {
                        if (b.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e), b.params.virtualTranslate && 0 !== e) {
                            var a = !1;
                            b.slides.eq(b.activeIndex).transitionEnd(function() {
                                if (!a && b && t(this).hasClass(b.params.slideActiveClass)) {
                                    a = !0,
                                    b.animating = !1;
                                    for (var e = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"], i = 0; i < e.length; i++) b.wrapper.trigger(e[i])
                                }
                            })
                        }
                    }
                },
                cube: {
                    setTranslate: function() {
                        var e, a = 0;
                        b.params.cube.shadow && (b.isHorizontal() ? (e = b.wrapper.find(".swiper-cube-shadow"), 0 === e.length && (e = t('<div class="swiper-cube-shadow"></div>'), b.wrapper.append(e)), e.css({
                            height: b.width + "px"
                        })) : (e = b.container.find(".swiper-cube-shadow"), 0 === e.length && (e = t('<div class="swiper-cube-shadow"></div>'), b.container.append(e))));
                        for (var i = 0; i < b.slides.length; i++) {
                            var s = b.slides.eq(i),
                            n = 90 * i,
                            o = Math.floor(n / 360);
                            b.rtl && (n = -n, o = Math.floor( - n / 360));
                            var r = Math.max(Math.min(s[0].progress, 1), -1),
                            l = 0,
                            d = 0,
                            p = 0;
                            i % 4 === 0 ? (l = 4 * -o * b.size, p = 0) : (i - 1) % 4 === 0 ? (l = 0, p = 4 * -o * b.size) : (i - 2) % 4 === 0 ? (l = b.size + 4 * o * b.size, p = b.size) : (i - 3) % 4 === 0 && (l = -b.size, p = 3 * b.size + 4 * b.size * o),
                            b.rtl && (l = -l),
                            b.isHorizontal() || (d = l, l = 0);
                            var c = "rotateX(" + (b.isHorizontal() ? 0 : -n) + "deg) rotateY(" + (b.isHorizontal() ? n: 0) + "deg) translate3d(" + l + "px, " + d + "px, " + p + "px)";
                            if (r <= 1 && r > -1 && (a = 90 * i + 90 * r, b.rtl && (a = 90 * -i - 90 * r)), s.transform(c), b.params.cube.slideShadows) {
                                var u = b.isHorizontal() ? s.find(".swiper-slide-shadow-left") : s.find(".swiper-slide-shadow-top"),
                                h = b.isHorizontal() ? s.find(".swiper-slide-shadow-right") : s.find(".swiper-slide-shadow-bottom");
                                0 === u.length && (u = t('<div class="swiper-slide-shadow-' + (b.isHorizontal() ? "left": "top") + '"></div>'), s.append(u)),
                                0 === h.length && (h = t('<div class="swiper-slide-shadow-' + (b.isHorizontal() ? "right": "bottom") + '"></div>'), s.append(h)),
                                u.length && (u[0].style.opacity = Math.max( - r, 0)),
                                h.length && (h[0].style.opacity = Math.max(r, 0))
                            }
                        }
                        if (b.wrapper.css({
                            "-webkit-transform-origin": "50% 50% -" + b.size / 2 + "px",
                            "-moz-transform-origin": "50% 50% -" + b.size / 2 + "px",
                            "-ms-transform-origin": "50% 50% -" + b.size / 2 + "px",
                            "transform-origin": "50% 50% -" + b.size / 2 + "px"
                        }), b.params.cube.shadow) if (b.isHorizontal()) e.transform("translate3d(0px, " + (b.width / 2 + b.params.cube.shadowOffset) + "px, " + -b.width / 2 + "px) rotateX(90deg) rotateZ(0deg) scale(" + b.params.cube.shadowScale + ")");
                        else {
                            var f = Math.abs(a) - 90 * Math.floor(Math.abs(a) / 90),
                            m = 1.5 - (Math.sin(2 * f * Math.PI / 360) / 2 + Math.cos(2 * f * Math.PI / 360) / 2),
                            g = b.params.cube.shadowScale,
                            v = b.params.cube.shadowScale / m,
                            w = b.params.cube.shadowOffset;
                            e.transform("scale3d(" + g + ", 1, " + v + ") translate3d(0px, " + (b.height / 2 + w) + "px, " + -b.height / 2 / v + "px) rotateX(-90deg)")
                        }
                        var y = b.isSafari || b.isUiWebView ? -b.size / 2 : 0;
                        b.wrapper.transform("translate3d(0px,0," + y + "px) rotateX(" + (b.isHorizontal() ? 0 : a) + "deg) rotateY(" + (b.isHorizontal() ? -a: 0) + "deg)")
                    },
                    setTransition: function(e) {
                        b.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e),
                        b.params.cube.shadow && !b.isHorizontal() && b.container.find(".swiper-cube-shadow").transition(e)
                    }
                },
                coverflow: {
                    setTranslate: function() {
                        for (var e = b.translate,
                        a = b.isHorizontal() ? -e + b.width / 2 : -e + b.height / 2, i = b.isHorizontal() ? b.params.coverflow.rotate: -b.params.coverflow.rotate, s = b.params.coverflow.depth, n = 0, o = b.slides.length; n < o; n++) {
                            var r = b.slides.eq(n),
                            l = b.slidesSizesGrid[n],
                            d = r[0].swiperSlideOffset,
                            p = (a - d - l / 2) / l * b.params.coverflow.modifier,
                            c = b.isHorizontal() ? i * p: 0,
                            u = b.isHorizontal() ? 0 : i * p,
                            h = -s * Math.abs(p),
                            f = b.isHorizontal() ? 0 : b.params.coverflow.stretch * p,
                            m = b.isHorizontal() ? b.params.coverflow.stretch * p: 0;
                            Math.abs(m) < .001 && (m = 0),
                            Math.abs(f) < .001 && (f = 0),
                            Math.abs(h) < .001 && (h = 0),
                            Math.abs(c) < .001 && (c = 0),
                            Math.abs(u) < .001 && (u = 0);
                            var g = "translate3d(" + m + "px," + f + "px," + h + "px)  rotateX(" + u + "deg) rotateY(" + c + "deg)";
                            if (r.transform(g), r[0].style.zIndex = -Math.abs(Math.round(p)) + 1, b.params.coverflow.slideShadows) {
                                var v = b.isHorizontal() ? r.find(".swiper-slide-shadow-left") : r.find(".swiper-slide-shadow-top"),
                                w = b.isHorizontal() ? r.find(".swiper-slide-shadow-right") : r.find(".swiper-slide-shadow-bottom");
                                0 === v.length && (v = t('<div class="swiper-slide-shadow-' + (b.isHorizontal() ? "left": "top") + '"></div>'), r.append(v)),
                                0 === w.length && (w = t('<div class="swiper-slide-shadow-' + (b.isHorizontal() ? "right": "bottom") + '"></div>'), r.append(w)),
                                v.length && (v[0].style.opacity = p > 0 ? p: 0),
                                w.length && (w[0].style.opacity = -p > 0 ? -p: 0)
                            }
                        }
                        if (b.browser.ie) {
                            var y = b.wrapper[0].style;
                            y.perspectiveOrigin = a + "px 50%"
                        }
                    },
                    setTransition: function(e) {
                        b.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e)
                    }
                }
            },
            b.lazy = {
                initialImageLoaded: !1,
                loadImageInSlide: function(e, a) {
                    if ("undefined" != typeof e && ("undefined" == typeof a && (a = !0), 0 !== b.slides.length)) {
                        var i = b.slides.eq(e),
                        s = i.find(".swiper-lazy:not(.swiper-lazy-loaded):not(.swiper-lazy-loading)"); ! i.hasClass("swiper-lazy") || i.hasClass("swiper-lazy-loaded") || i.hasClass("swiper-lazy-loading") || (s = s.add(i[0])),
                        0 !== s.length && s.each(function() {
                            var e = t(this);
                            e.addClass("swiper-lazy-loading");
                            var s = e.attr("data-background"),
                            n = e.attr("data-src"),
                            o = e.attr("data-srcset");
                            b.loadImage(e[0], n || s, o, !1,
                            function() {
                                if (s ? (e.css("background-image", "url(" + s + ")"), e.removeAttr("data-background")) : (o && (e.attr("srcset", o), e.removeAttr("data-srcset")), n && (e.attr("src", n), e.removeAttr("data-src"))), e.addClass("swiper-lazy-loaded").removeClass("swiper-lazy-loading"), i.find(".swiper-lazy-preloader, .preloader").remove(), b.params.loop && a) {
                                    var t = i.attr("data-swiper-slide-index");
                                    if (i.hasClass(b.params.slideDuplicateClass)) {
                                        var r = b.wrapper.children('[data-swiper-slide-index="' + t + '"]:not(.' + b.params.slideDuplicateClass + ")");
                                        b.lazy.loadImageInSlide(r.index(), !1)
                                    } else {
                                        var l = b.wrapper.children("." + b.params.slideDuplicateClass + '[data-swiper-slide-index="' + t + '"]');
                                        b.lazy.loadImageInSlide(l.index(), !1)
                                    }
                                }
                                b.emit("onLazyImageReady", b, i[0], e[0])
                            }),
                            b.emit("onLazyImageLoad", b, i[0], e[0])
                        })
                    }
                },
                load: function() {
                    var e;
                    if (b.params.watchSlidesVisibility) b.wrapper.children("." + b.params.slideVisibleClass).each(function() {
                        b.lazy.loadImageInSlide(t(this).index())
                    });
                    else if (b.params.slidesPerView > 1) for (e = b.activeIndex; e < b.activeIndex + b.params.slidesPerView; e++) b.slides[e] && b.lazy.loadImageInSlide(e);
                    else b.lazy.loadImageInSlide(b.activeIndex);
                    if (b.params.lazyLoadingInPrevNext) if (b.params.slidesPerView > 1 || b.params.lazyLoadingInPrevNextAmount && b.params.lazyLoadingInPrevNextAmount > 1) {
                        var a = b.params.lazyLoadingInPrevNextAmount,
                        i = b.params.slidesPerView,
                        s = Math.min(b.activeIndex + i + Math.max(a, i), b.slides.length),
                        n = Math.max(b.activeIndex - Math.max(i, a), 0);
                        for (e = b.activeIndex + b.params.slidesPerView; e < s; e++) b.slides[e] && b.lazy.loadImageInSlide(e);
                        for (e = n; e < b.activeIndex; e++) b.slides[e] && b.lazy.loadImageInSlide(e)
                    } else {
                        var o = b.wrapper.children("." + b.params.slideNextClass);
                        o.length > 0 && b.lazy.loadImageInSlide(o.index());
                        var r = b.wrapper.children("." + b.params.slidePrevClass);
                        r.length > 0 && b.lazy.loadImageInSlide(r.index())
                    }
                },
                onTransitionStart: function() {
                    b.params.lazyLoading && (b.params.lazyLoadingOnTransitionStart || !b.params.lazyLoadingOnTransitionStart && !b.lazy.initialImageLoaded) && b.lazy.load()
                },
                onTransitionEnd: function() {
                    b.params.lazyLoading && !b.params.lazyLoadingOnTransitionStart && b.lazy.load()
                }
            },
            b.scrollbar = {
                isTouched: !1,
                setDragPosition: function(e) {
                    var t = b.scrollbar,
                    a = b.isHorizontal() ? "touchstart" === e.type || "touchmove" === e.type ? e.targetTouches[0].pageX: e.pageX || e.clientX: "touchstart" === e.type || "touchmove" === e.type ? e.targetTouches[0].pageY: e.pageY || e.clientY,
                    i = a - t.track.offset()[b.isHorizontal() ? "left": "top"] - t.dragSize / 2,
                    s = -b.minTranslate() * t.moveDivider,
                    n = -b.maxTranslate() * t.moveDivider;
                    i < s ? i = s: i > n && (i = n),
                    i = -i / t.moveDivider,
                    b.updateProgress(i),
                    b.setWrapperTranslate(i, !0)
                },
                dragStart: function(e) {
                    var t = b.scrollbar;
                    t.isTouched = !0,
                    e.preventDefault(),
                    e.stopPropagation(),
                    t.setDragPosition(e),
                    clearTimeout(t.dragTimeout),
                    t.track.transition(0),
                    b.params.scrollbarHide && t.track.css("opacity", 1),
                    b.wrapper.transition(100),
                    t.drag.transition(100),
                    b.emit("onScrollbarDragStart", b)
                },
                dragMove: function(e) {
                    var t = b.scrollbar;
                    t.isTouched && (e.preventDefault ? e.preventDefault() : e.returnValue = !1, t.setDragPosition(e), b.wrapper.transition(0), t.track.transition(0), t.drag.transition(0), b.emit("onScrollbarDragMove", b))
                },
                dragEnd: function(e) {
                    var t = b.scrollbar;
                    t.isTouched && (t.isTouched = !1, b.params.scrollbarHide && (clearTimeout(t.dragTimeout), t.dragTimeout = setTimeout(function() {
                        t.track.css("opacity", 0),
                        t.track.transition(400)
                    },
                    1e3)), b.emit("onScrollbarDragEnd", b), b.params.scrollbarSnapOnRelease && b.slideReset())
                },
                enableDraggable: function() {
                    var e = b.scrollbar,
                    a = b.support.touch ? e.track: document;
                    t(e.track).on(b.touchEvents.start, e.dragStart),
                    t(a).on(b.touchEvents.move, e.dragMove),
                    t(a).on(b.touchEvents.end, e.dragEnd)
                },
                disableDraggable: function() {
                    var e = b.scrollbar,
                    a = b.support.touch ? e.track: document;
                    t(e.track).off(b.touchEvents.start, e.dragStart),
                    t(a).off(b.touchEvents.move, e.dragMove),
                    t(a).off(b.touchEvents.end, e.dragEnd)
                },
                set: function() {
                    if (b.params.scrollbar) {
                        var e = b.scrollbar;
                        e.track = t(b.params.scrollbar),
                        e.drag = e.track.find(".swiper-scrollbar-drag"),
                        0 === e.drag.length && (e.drag = t('<div class="swiper-scrollbar-drag"></div>'), e.track.append(e.drag)),
                        e.drag[0].style.width = "",
                        e.drag[0].style.height = "",
                        e.trackSize = b.isHorizontal() ? e.track[0].offsetWidth: e.track[0].offsetHeight,
                        e.divider = b.size / b.virtualSize,
                        e.moveDivider = e.divider * (e.trackSize / b.size),
                        e.dragSize = e.trackSize * e.divider,
                        b.isHorizontal() ? e.drag[0].style.width = e.dragSize + "px": e.drag[0].style.height = e.dragSize + "px",
                        e.divider >= 1 ? e.track[0].style.display = "none": e.track[0].style.display = "",
                        b.params.scrollbarHide && (e.track[0].style.opacity = 0)
                    }
                },
                setTranslate: function() {
                    if (b.params.scrollbar) {
                        var e, t = b.scrollbar,
                        a = (b.translate || 0, t.dragSize);
                        e = (t.trackSize - t.dragSize) * b.progress,
                        b.rtl && b.isHorizontal() ? (e = -e, e > 0 ? (a = t.dragSize - e, e = 0) : -e + t.dragSize > t.trackSize && (a = t.trackSize + e)) : e < 0 ? (a = t.dragSize + e, e = 0) : e + t.dragSize > t.trackSize && (a = t.trackSize - e),
                        b.isHorizontal() ? (b.support.transforms3d ? t.drag.transform("translate3d(" + e + "px, 0, 0)") : t.drag.transform("translateX(" + e + "px)"), t.drag[0].style.width = a + "px") : (b.support.transforms3d ? t.drag.transform("translate3d(0px, " + e + "px, 0)") : t.drag.transform("translateY(" + e + "px)"), t.drag[0].style.height = a + "px"),
                        b.params.scrollbarHide && (clearTimeout(t.timeout), t.track[0].style.opacity = 1, t.timeout = setTimeout(function() {
                            t.track[0].style.opacity = 0,
                            t.track.transition(400)
                        },
                        1e3))
                    }
                },
                setTransition: function(e) {
                    b.params.scrollbar && b.scrollbar.drag.transition(e)
                }
            },
            b.controller = {
                LinearSpline: function(e, t) {
                    this.x = e,
                    this.y = t,
                    this.lastIndex = e.length - 1;
                    var a, i;
                    this.x.length;
                    this.interpolate = function(e) {
                        return e ? (i = s(this.x, e), a = i - 1, (e - this.x[a]) * (this.y[i] - this.y[a]) / (this.x[i] - this.x[a]) + this.y[a]) : 0
                    };
                    var s = function() {
                        var e, t, a;
                        return function(i, s) {
                            for (t = -1, e = i.length; e - t > 1;) i[a = e + t >> 1] <= s ? t = a: e = a;
                            return e
                        }
                    } ()
                },
                getInterpolateFunction: function(e) {
                    b.controller.spline || (b.controller.spline = b.params.loop ? new b.controller.LinearSpline(b.slidesGrid, e.slidesGrid) : new b.controller.LinearSpline(b.snapGrid, e.snapGrid))
                },
                setTranslate: function(e, t) {
                    function i(t) {
                        e = t.rtl && "horizontal" === t.params.direction ? -b.translate: b.translate,
                        "slide" === b.params.controlBy && (b.controller.getInterpolateFunction(t), n = -b.controller.spline.interpolate( - e)),
                        n && "container" !== b.params.controlBy || (s = (t.maxTranslate() - t.minTranslate()) / (b.maxTranslate() - b.minTranslate()), n = (e - b.minTranslate()) * s + t.minTranslate()),
                        b.params.controlInverse && (n = t.maxTranslate() - n),
                        t.updateProgress(n),
                        t.setWrapperTranslate(n, !1, b),
                        t.updateActiveIndex()
                    }
                    var s, n, o = b.params.control;
                    if (b.isArray(o)) for (var r = 0; r < o.length; r++) o[r] !== t && o[r] instanceof a && i(o[r]);
                    else o instanceof a && t !== o && i(o)
                },
                setTransition: function(e, t) {
                    function i(t) {
                        t.setWrapperTransition(e, b),
                        0 !== e && (t.onTransitionStart(), t.wrapper.transitionEnd(function() {
                            n && (t.params.loop && "slide" === b.params.controlBy && t.fixLoop(), t.onTransitionEnd())
                        }))
                    }
                    var s, n = b.params.control;
                    if (b.isArray(n)) for (s = 0; s < n.length; s++) n[s] !== t && n[s] instanceof a && i(n[s]);
                    else n instanceof a && t !== n && i(n)
                }
            },
            b.hashnav = {
                init: function() {
                    if (b.params.hashnav) {
                        b.hashnav.initialized = !0;
                        var e = document.location.hash.replace("#", "");
                        if (e) for (var t = 0,
                        a = 0,
                        i = b.slides.length; a < i; a++) {
                            var s = b.slides.eq(a),
                            n = s.attr("data-hash");
                            if (n === e && !s.hasClass(b.params.slideDuplicateClass)) {
                                var o = s.index();
                                b.slideTo(o, t, b.params.runCallbacksOnInit, !0)
                            }
                        }
                    }
                },
                setHash: function() {
                    b.hashnav.initialized && b.params.hashnav && (document.location.hash = b.slides.eq(b.activeIndex).attr("data-hash") || "")
                }
            },
            b.disableKeyboardControl = function() {
                b.params.keyboardControl = !1,
                t(document).off("keydown", l)
            },
            b.enableKeyboardControl = function() {
                b.params.keyboardControl = !0,
                t(document).on("keydown", l)
            },
            b.mousewheel = {
                event: !1,
                lastScrollTime: (new window.Date).getTime()
            },
            b.params.mousewheelControl) {
                try {
                    new window.WheelEvent("wheel"),
                    b.mousewheel.event = "wheel"
                } catch(N) {}
                b.mousewheel.event || void 0 === document.onmousewheel || (b.mousewheel.event = "mousewheel"),
                b.mousewheel.event || (b.mousewheel.event = "DOMMouseScroll")
            }
            b.disableMousewheelControl = function() {
                return !! b.mousewheel.event && (b.container.off(b.mousewheel.event, d), !0)
            },
            b.enableMousewheelControl = function() {
                return !! b.mousewheel.event && (b.container.on(b.mousewheel.event, d), !0)
            },
            b.parallax = {
                setTranslate: function() {
                    b.container.children("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function() {
                        p(this, b.progress)
                    }),
                    b.slides.each(function() {
                        var e = t(this);
                        e.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function() {
                            var t = Math.min(Math.max(e[0].progress, -1), 1);
                            p(this, t)
                        })
                    })
                },
                setTransition: function(e) {
                    "undefined" == typeof e && (e = b.params.speed),
                    b.container.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function() {
                        var a = t(this),
                        i = parseInt(a.attr("data-swiper-parallax-duration"), 10) || e;
                        0 === e && (i = 0),
                        a.transition(i)
                    })
                }
            },
            b._plugins = [];
            for (var R in b.plugins) {
                var L = b.plugins[R](b, b.params[R]);
                L && b._plugins.push(L)
            }
            return b.callPlugins = function(e) {
                for (var t = 0; t < b._plugins.length; t++) e in b._plugins[t] && b._plugins[t][e](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5])
            },
            b.emitterEventListeners = {},
            b.emit = function(e) {
                b.params[e] && b.params[e](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                var t;
                if (b.emitterEventListeners[e]) for (t = 0; t < b.emitterEventListeners[e].length; t++) b.emitterEventListeners[e][t](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                b.callPlugins && b.callPlugins(e, arguments[1], arguments[2], arguments[3], arguments[4], arguments[5])
            },
            b.on = function(e, t) {
                return e = c(e),
                b.emitterEventListeners[e] || (b.emitterEventListeners[e] = []),
                b.emitterEventListeners[e].push(t),
                b
            },
            b.off = function(e, t) {
                var a;
                if (e = c(e), "undefined" == typeof t) return b.emitterEventListeners[e] = [],
                b;
                if (b.emitterEventListeners[e] && 0 !== b.emitterEventListeners[e].length) {
                    for (a = 0; a < b.emitterEventListeners[e].length; a++) b.emitterEventListeners[e][a] === t && b.emitterEventListeners[e].splice(a, 1);
                    return b
                }
            },
            b.once = function(e, t) {
                e = c(e);
                var a = function() {
                    t(arguments[0], arguments[1], arguments[2], arguments[3], arguments[4]),
                    b.off(e, a)
                };
                return b.on(e, a),
                b
            },
            b.a11y = {
                makeFocusable: function(e) {
                    return e.attr("tabIndex", "0"),
                    e
                },
                addRole: function(e, t) {
                    return e.attr("role", t),
                    e
                },
                addLabel: function(e, t) {
                    return e.attr("aria-label", t),
                    e
                },
                disable: function(e) {
                    return e.attr("aria-disabled", !0),
                    e
                },
                enable: function(e) {
                    return e.attr("aria-disabled", !1),
                    e
                },
                onEnterKey: function(e) {
                    13 === e.keyCode && (t(e.target).is(b.params.nextButton) ? (b.onClickNext(e), b.isEnd ? b.a11y.notify(b.params.lastSlideMessage) : b.a11y.notify(b.params.nextSlideMessage)) : t(e.target).is(b.params.prevButton) && (b.onClickPrev(e), b.isBeginning ? b.a11y.notify(b.params.firstSlideMessage) : b.a11y.notify(b.params.prevSlideMessage)), t(e.target).is("." + b.params.bulletClass) && t(e.target)[0].click())
                },
                liveRegion: t('<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>'),
                notify: function(e) {
                    var t = b.a11y.liveRegion;
                    0 !== t.length && (t.html(""), t.html(e))
                },
                init: function() {
                    if (b.params.nextButton) {
                        var e = t(b.params.nextButton);
                        b.a11y.makeFocusable(e),
                        b.a11y.addRole(e, "button"),
                        b.a11y.addLabel(e, b.params.nextSlideMessage)
                    }
                    if (b.params.prevButton) {
                        var a = t(b.params.prevButton);
                        b.a11y.makeFocusable(a),
                        b.a11y.addRole(a, "button"),
                        b.a11y.addLabel(a, b.params.prevSlideMessage)
                    }
                    t(b.container).append(b.a11y.liveRegion)
                },
                initPagination: function() {
                    b.params.pagination && b.params.paginationClickable && b.bullets && b.bullets.length && b.bullets.each(function() {
                        var e = t(this);
                        b.a11y.makeFocusable(e),
                        b.a11y.addRole(e, "button"),
                        b.a11y.addLabel(e, b.params.paginationBulletMessage.replace(/{{index}}/, e.index() + 1))
                    })
                },
                destroy: function() {
                    b.a11y.liveRegion && b.a11y.liveRegion.length > 0 && b.a11y.liveRegion.remove()
                }
            },
            b.init = function() {
                b.params.loop && b.createLoop(),
                b.updateContainerSize(),
                b.updateSlidesSize(),
                b.updatePagination(),
                b.params.scrollbar && b.scrollbar && (b.scrollbar.set(), b.params.scrollbarDraggable && b.scrollbar.enableDraggable()),
                "slide" !== b.params.effect && b.effects[b.params.effect] && (b.params.loop || b.updateProgress(), b.effects[b.params.effect].setTranslate()),
                b.params.loop ? b.slideTo(b.params.initialSlide + b.loopedSlides, 0, b.params.runCallbacksOnInit) : (b.slideTo(b.params.initialSlide, 0, b.params.runCallbacksOnInit), 0 === b.params.initialSlide && (b.parallax && b.params.parallax && b.parallax.setTranslate(), b.lazy && b.params.lazyLoading && (b.lazy.load(), b.lazy.initialImageLoaded = !0))),
                b.attachEvents(),
                b.params.observer && b.support.observer && b.initObservers(),
                b.params.preloadImages && !b.params.lazyLoading && b.preloadImages(),
                b.params.autoplay && b.startAutoplay(),
                b.params.keyboardControl && b.enableKeyboardControl && b.enableKeyboardControl(),
                b.params.mousewheelControl && b.enableMousewheelControl && b.enableMousewheelControl(),
                b.params.hashnav && b.hashnav && b.hashnav.init(),
                b.params.a11y && b.a11y && b.a11y.init(),
                b.emit("onInit", b)
            },
            b.cleanupStyles = function() {
                b.container.removeClass(b.classNames.join(" ")).removeAttr("style"),
                b.wrapper.removeAttr("style"),
                b.slides && b.slides.length && b.slides.removeClass([b.params.slideVisibleClass, b.params.slideActiveClass, b.params.slideNextClass, b.params.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-column").removeAttr("data-swiper-row"),
                b.paginationContainer && b.paginationContainer.length && b.paginationContainer.removeClass(b.params.paginationHiddenClass),
                b.bullets && b.bullets.length && b.bullets.removeClass(b.params.bulletActiveClass),
                b.params.prevButton && t(b.params.prevButton).removeClass(b.params.buttonDisabledClass),
                b.params.nextButton && t(b.params.nextButton).removeClass(b.params.buttonDisabledClass),
                b.params.scrollbar && b.scrollbar && (b.scrollbar.track && b.scrollbar.track.length && b.scrollbar.track.removeAttr("style"), b.scrollbar.drag && b.scrollbar.drag.length && b.scrollbar.drag.removeAttr("style"))
            },
            b.destroy = function(e, t) {
                b.detachEvents(),
                b.stopAutoplay(),
                b.params.scrollbar && b.scrollbar && b.params.scrollbarDraggable && b.scrollbar.disableDraggable(),
                b.params.loop && b.destroyLoop(),
                t && b.cleanupStyles(),
                b.disconnectObservers(),
                b.params.keyboardControl && b.disableKeyboardControl && b.disableKeyboardControl(),
                b.params.mousewheelControl && b.disableMousewheelControl && b.disableMousewheelControl(),
                b.params.a11y && b.a11y && b.a11y.destroy(),
                b.emit("onDestroy"),
                e !== !1 && (b = null)
            },
            b.init(),
            b
        }
    };
    a.prototype = {
        isSafari: function() {
            var e = navigator.userAgent.toLowerCase();
            return e.indexOf("safari") >= 0 && e.indexOf("chrome") < 0 && e.indexOf("android") < 0
        } (),
        isUiWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(navigator.userAgent),
        isArray: function(e) {
            return "[object Array]" === Object.prototype.toString.apply(e)
        },
        browser: {
            ie: window.navigator.pointerEnabled || window.navigator.msPointerEnabled,
            ieTouch: window.navigator.msPointerEnabled && window.navigator.msMaxTouchPoints > 1 || window.navigator.pointerEnabled && window.navigator.maxTouchPoints > 1
        },
        device: function() {
            var e = navigator.userAgent,
            t = e.match(/(Android);?[\s\/]+([\d.]+)?/),
            a = e.match(/(iPad).*OS\s([\d_]+)/),
            i = e.match(/(iPod)(.*OS\s([\d_]+))?/),
            s = !a && e.match(/(iPhone\sOS)\s([\d_]+)/);
            return {
                ios: a || s || i,
                android: t
            }
        } (),
        support: {
            touch: window.Modernizr && Modernizr.touch === !0 ||
            function() {
                return !! ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch)
            } (),
            transforms3d: window.Modernizr && Modernizr.csstransforms3d === !0 ||
            function() {
                var e = document.createElement("div").style;
                return "webkitPerspective" in e || "MozPerspective" in e || "OPerspective" in e || "MsPerspective" in e || "perspective" in e
            } (),
            flexbox: function() {
                for (var e = document.createElement("div").style, t = "alignItems webkitAlignItems webkitBoxAlign msFlexAlign mozBoxAlign webkitFlexDirection msFlexDirection mozBoxDirection mozBoxOrient webkitBoxDirection webkitBoxOrient".split(" "), a = 0; a < t.length; a++) if (t[a] in e) return ! 0
            } (),
            observer: function() {
                return "MutationObserver" in window || "WebkitMutationObserver" in window
            } ()
        },
        plugins: {}
    };
    for (var i = ["jQuery", "Zepto", "Dom7"], s = 0; s < i.length; s++) window[i[s]] && e(window[i[s]]);
    var n;
    n = "undefined" == typeof Dom7 ? window.Dom7 || window.Zepto || window.jQuery: Dom7,
    n && ("transitionEnd" in n.fn || (n.fn.transitionEnd = function(e) {
        function t(n) {
            if (n.target === this) for (e.call(this, n), a = 0; a < i.length; a++) s.off(i[a], t)
        }
        var a, i = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"],
        s = this;
        if (e) for (a = 0; a < i.length; a++) s.on(i[a], t);
        return this
    }), "transform" in n.fn || (n.fn.transform = function(e) {
        for (var t = 0; t < this.length; t++) {
            var a = this[t].style;
            a.webkitTransform = a.MsTransform = a.msTransform = a.MozTransform = a.OTransform = a.transform = e
        }
        return this
    }), "transition" in n.fn || (n.fn.transition = function(e) {
        "string" != typeof e && (e += "ms");
        for (var t = 0; t < this.length; t++) {
            var a = this[t].style;
            a.webkitTransitionDuration = a.MsTransitionDuration = a.msTransitionDuration = a.MozTransitionDuration = a.OTransitionDuration = a.transitionDuration = e
        }
        return this
    })),
    window.Swiper = a
} (),
"undefined" != typeof module ? module.exports = window.Swiper: "function" == typeof define && define.amd && define([],
function() {
    "use strict";
    return window.Swiper
}),
function() {
    var e = function() {
        var t = [].slice.call(arguments);
        return t.push(e.options),
        t[0].match(/^\s*#([\w:\-\.]+)\s*$/gim) && t[0].replace(/^\s*#([\w:\-\.]+)\s*$/gim,
        function(e, a) {
            var i = document,
            s = i && i.getElementById(a);
            t[0] = s ? s.value || s.innerHTML: e
        }),
        1 == arguments.length ? e.compile.apply(e, t) : arguments.length >= 2 ? e.to_html.apply(e, t) : void 0
    },
    t = {
        escapehash: {
            "<": "&lt;",
            ">": "&gt;",
            "&": "&amp;",
            '"': "&quot;",
            "'": "&#x27;",
            "/": "&#x2f;"
        },
        escapereplace: function(e) {
            return t.escapehash[e]
        },
        escaping: function(e) {
            return "string" != typeof e ? e: e.replace(/[&<>"]/gim, this.escapereplace)
        },
        detection: function(e) {
            return "undefined" == typeof e ? "": e
        }
    },
    a = function(e) {
        if ("undefined" != typeof console) {
            if (console.warn) return void console.warn(e);
            if (console.log) return void console.log(e)
        }
        throw e
    },
    i = function(e, t) {
        if (e = e !== Object(e) ? {}: e, e.__proto__) return e.__proto__ = t,
        e;
        var a = function() {},
        i = Object.create ? Object.create(t) : new(a.prototype = t, a);
        for (var s in e) e.hasOwnProperty(s) && (i[s] = e[s]);
        return i
    };
    e.__cache = {},
    e.version = "0.6.5-stable",
    e.settings = {},
    e.tags = {
        operationOpen: "{@",
        operationClose: "}",
        interpolateOpen: "\\${",
        interpolateClose: "}",
        noneencodeOpen: "\\$\\${",
        noneencodeClose: "}",
        commentOpen: "\\{#",
        commentClose: "\\}"
    },
    e.options = {
        cache: !0,
        strip: !0,
        errorhandling: !0,
        detection: !0,
        _method: i({
            __escapehtml: t,
            __throw: a,
            __juicer: e
        },
        {})
    },
    e.tagInit = function() {
        var t = e.tags.operationOpen + "each\\s*([^}]*?)\\s*as\\s*(\\w*?)\\s*(,\\s*\\w*?)?" + e.tags.operationClose,
        a = e.tags.operationOpen + "\\/each" + e.tags.operationClose,
        i = e.tags.operationOpen + "if\\s*([^}]*?)" + e.tags.operationClose,
        s = e.tags.operationOpen + "\\/if" + e.tags.operationClose,
        n = e.tags.operationOpen + "else" + e.tags.operationClose,
        o = e.tags.operationOpen + "else if\\s*([^}]*?)" + e.tags.operationClose,
        r = e.tags.interpolateOpen + "([\\s\\S]+?)" + e.tags.interpolateClose,
        l = e.tags.noneencodeOpen + "([\\s\\S]+?)" + e.tags.noneencodeClose,
        d = e.tags.commentOpen + "[^}]*?" + e.tags.commentClose,
        p = e.tags.operationOpen + "each\\s*(\\w*?)\\s*in\\s*range\\(([^}]+?)\\s*,\\s*([^}]+?)\\)" + e.tags.operationClose,
        c = e.tags.operationOpen + "include\\s*([^}]*?)\\s*,\\s*([^}]*?)" + e.tags.operationClose;
        e.settings.forstart = new RegExp(t, "igm"),
        e.settings.forend = new RegExp(a, "igm"),
        e.settings.ifstart = new RegExp(i, "igm"),
        e.settings.ifend = new RegExp(s, "igm"),
        e.settings.elsestart = new RegExp(n, "igm"),
        e.settings.elseifstart = new RegExp(o, "igm"),
        e.settings.interpolate = new RegExp(r, "igm"),
        e.settings.noneencode = new RegExp(l, "igm"),
        e.settings.inlinecomment = new RegExp(d, "igm"),
        e.settings.rangestart = new RegExp(p, "igm"),
        e.settings.include = new RegExp(c, "igm")
    },
    e.tagInit(),
    e.set = function(e, t) {
        var a = this,
        i = function(e) {
            return e.replace(/[\$\(\)\[\]\+\^\{\}\?\*\|\.]/gim,
            function(e) {
                return "\\" + e
            })
        },
        s = function(e, t) {
            var s = e.match(/^tag::(.*)$/i);
            return s ? (a.tags[s[1]] = i(t), void a.tagInit()) : void(a.options[e] = t)
        };
        if (2 === arguments.length) return void s(e, t);
        if (e === Object(e)) for (var n in e) e.hasOwnProperty(n) && s(n, e[n])
    },
    e.register = function(e, t) {
        var a = this.options._method;
        return ! a.hasOwnProperty(e) && (a[e] = t)
    },
    e.unregister = function(e) {
        var t = this.options._method;
        if (t.hasOwnProperty(e)) return delete t[e]
    },
    e.template = function(t) {
        var a = this;
        this.options = t,
        this.__interpolate = function(e, t, a) {
            var i, s = e.split("|"),
            n = s[0] || "";
            return s.length > 1 && (e = s.shift(), i = s.shift().split(","), n = "_method." + i.shift() + ".call({}, " + [e].concat(i) + ")"),
            "<%= " + (t ? "_method.__escapehtml.escaping": "") + "(" + (a && a.detection === !1 ? "": "_method.__escapehtml.detection") + "(" + n + ")) %>"
        },
        this.__removeShell = function(t, i) {
            var s = 0;
            return t = t.replace(e.settings.forstart,
            function(e, t, a, i) {
                var a = a || "value",
                i = i && i.substr(1),
                n = "i" + s++;
                return "<% ~function() {for(var " + n + " in " + t + ") {if(" + t + ".hasOwnProperty(" + n + ")) {var " + a + "=" + t + "[" + n + "];" + (i ? "var " + i + "=" + n + ";": "") + " %>"
            }).replace(e.settings.forend, "<% }}}(); %>").replace(e.settings.ifstart,
            function(e, t) {
                return "<% if(" + t + ") { %>"
            }).replace(e.settings.ifend, "<% } %>").replace(e.settings.elsestart,
            function(e) {
                return "<% } else { %>"
            }).replace(e.settings.elseifstart,
            function(e, t) {
                return "<% } else if(" + t + ") { %>"
            }).replace(e.settings.noneencode,
            function(e, t) {
                return a.__interpolate(t, !1, i)
            }).replace(e.settings.interpolate,
            function(e, t) {
                return a.__interpolate(t, !0, i)
            }).replace(e.settings.inlinecomment, "").replace(e.settings.rangestart,
            function(e, t, a, i) {
                var n = "j" + s++;
                return "<% ~function() {for(var " + n + "=" + a + ";" + n + "<" + i + ";" + n + "++) {{var " + t + "=" + n + "; %>"
            }).replace(e.settings.include,
            function(e, t, a) {
                return "<%= _method.__juicer(" + t + ", " + a + "); %>"
            }),
            i && i.errorhandling === !1 || (t = "<% try { %>" + t, t += '<% } catch(e) {_method.__throw("Juicer Render Exception: "+e.message);} %>'),
            t
        },
        this.__toNative = function(e, t) {
            return this.__convert(e, !t || t.strip)
        },
        this.__lexicalAnalyze = function(t) {
            var a = [],
            i = [],
            s = "",
            n = ["if", "each", "_", "_method", "console", "break", "case", "catch", "continue", "debugger", "default", "delete", "do", "finally", "for", "function", "in", "instanceof", "new", "return", "switch", "this", "throw", "try", "typeof", "var", "void", "while", "with", "null", "typeof", "class", "enum", "export", "extends", "import", "super", "implements", "interface", "let", "package", "private", "protected", "public", "static", "yield", "const", "arguments", "true", "false", "undefined", "NaN"],
            o = function(e, t) {
                if (Array.prototype.indexOf && e.indexOf === Array.prototype.indexOf) return e.indexOf(t);
                for (var a = 0; a < e.length; a++) if (e[a] === t) return a;
                return - 1
            },
            r = function(t, s) {
                if (s = s.match(/\w+/gim)[0], o(a, s) === -1 && o(n, s) === -1 && o(i, s) === -1) {
                    if ("undefined" != typeof window && "function" == typeof window[s] && window[s].toString().match(/^\s*?function \w+\(\) \{\s*?\[native code\]\s*?\}\s*?$/i)) return t;
                    if ("undefined" != typeof global && "function" == typeof global[s] && global[s].toString().match(/^\s*?function \w+\(\) \{\s*?\[native code\]\s*?\}\s*?$/i)) return t;
                    if ("function" == typeof e.options._method[s] || e.options._method.hasOwnProperty(s)) return i.push(s),
                    t;
                    a.push(s)
                }
                return t
            };
            t.replace(e.settings.forstart, r).replace(e.settings.interpolate, r).replace(e.settings.ifstart, r).replace(e.settings.elseifstart, r).replace(e.settings.include, r).replace(/[\+\-\*\/%!\?\|\^&~<>=,\(\)\[\]]\s*([A-Za-z_]+)/gim, r);
            for (var l = 0; l < a.length; l++) s += "var " + a[l] + "=_." + a[l] + ";";
            for (var l = 0; l < i.length; l++) s += "var " + i[l] + "=_method." + i[l] + ";";
            return "<% " + s + " %>"
        },
        this.__convert = function(e, t) {
            var a = [].join("");
            return a += "'use strict';",
            a += "var _=_||{};",
            a += "var _out='';_out+='",
            a += t !== !1 ? e.replace(/\\/g, "\\\\").replace(/[\r\t\n]/g, " ").replace(/'(?=[^%]*%>)/g, "\t").split("'").join("\\'").split("\t").join("'").replace(/<%=(.+?)%>/g, "';_out+=$1;_out+='").split("<%").join("';").split("%>").join("_out+='") + "';return _out;": e.replace(/\\/g, "\\\\").replace(/[\r]/g, "\\r").replace(/[\t]/g, "\\t").replace(/[\n]/g, "\\n").replace(/'(?=[^%]*%>)/g, "\t").split("'").join("\\'").split("\t").join("'").replace(/<%=(.+?)%>/g, "';_out+=$1;_out+='").split("<%").join("';").split("%>").join("_out+='") + "';return _out.replace(/[\\r\\n]\\s+[\\r\\n]/g, '\\r\\n');"
        },
        this.parse = function(e, t) {
            var s = this;
            return t && t.loose === !1 || (e = this.__lexicalAnalyze(e) + e),
            e = this.__removeShell(e, t),
            e = this.__toNative(e, t),
            this._render = new Function("_, _method", e),
            this.render = function(e, t) {
                return t && t === a.options._method || (t = i(t, a.options._method)),
                s._render.call(this, e, t)
            },
            this
        }
    },
    e.compile = function(e, t) {
        t && t === this.options || (t = i(t, this.options));
        try {
            var s = this.__cache[e] ? this.__cache[e] : new this.template(this.options).parse(e, t);
            return t && t.cache === !1 || (this.__cache[e] = s),
            s
        } catch(n) {
            return a("Juicer Compile Exception: " + n.message),
            {
                render: function() {}
            }
        }
    },
    e.to_html = function(e, t, a) {
        return a && a === this.options || (a = i(a, this.options)),
        this.compile(e, a).render(t, a._method)
    },
    "undefined" != typeof module && module.exports ? module.exports = e: this.juicer = e
} ();
var isApp = navigator.userAgent.indexOf("qsc_custom") != -1,
appVersion = isApp ? getVersion() : 1e3; !
function() {
    var e = function(e) {
        var t = window.document.createElement("form"),
        a = e.split("?"),
        i = a[0],
        s = a[1],
        n = [];
        s && (n = s.split("&")),
        t.setAttribute("method", "get"),
        t.setAttribute("action", i),
        t.style.display = "none",
        t.style.visibility = "hidden";
        for (var o, r, l, d, p = 0; p < n.length; p++) r = n[p].split("="),
        l = r[0],
        d = r[1] || "",
        o = window.document.createElement("input"),
        o.setAttribute("type", "hidden"),
        o.setAttribute("name", decodeURIComponent(l)),
        o.setAttribute("value", decodeURIComponent(d)),
        t.appendChild(o);
        window.document.body.appendChild(t),
        t.submit()
    };
    new Swiper(".swiper-container.home-banner", {
        pagination: ".swiper-pagination",
        paginationClickable: !0,
        centeredSlides: !0,
        loop: !0,
        slidesPerView: "auto",
        autoplay: 5e3
    }),
    $("body");
    "undefined" != typeof GlobalObj && (fee(), checkChargeStatus()),
    $("#add_aided_person").on("click",
    function(e) {
        "undefined" != typeof GlobalObj.isIOS && GlobalObj.isIOS && appVersion < 137 && (e.stopPropagation(), e.preventDefault(), alertMessage("对不起,您当前使用的app版本太低。如需使用该服务,请升级应用", 1e4))
    });
    var t = $("#add_aided_person_modal");
    window.location.href.indexOf("hasConfirmed") != -1 && t.modal("show");
    var a = $("#modalPayStatus"); ! isApp && a.length && window.localStorage.getItem("payStatus") && (window.localStorage.removeItem("payStatus"), a.modal("show"), a.find("#payStatusSuccess").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        window.location.href = "/insurance/join?insurance_uuid=" + GlobalObj.insuranceUUID
    })),
    $(".convention").on("click",
    function() {
        $("#convention").modal("show");
    }),
    $("#plan").on("click",
    function() {
        $("#plan").modal("show")
    }),
    $(".scroll").delegate(".add-observed-card", "click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $(this).hasClass("active") ? $(this).removeClass("active") : $(this).addClass("active"),
        fee(),
        checkChargeStatus()
    }),
    $("#save_aided_person").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault();
        var t = $("input[name=id]").val(),
        a = $("input[name=name]").val();
        if (parseInt(discriCard(t.toString())) < 18 || identityCodeValid(t)) {
            var i = {
                identity_card_number: t,
                name: a
            },
            s = GlobalObj.host + "/api/v2/users/insurance/" + GlobalObj.insuranceUUID;
            loadingMessage("验证中", !0),
            $.ajax({
                url: s,
                type: "POST",
                data: JSON.stringify(i),
                dataType: "json",
                timeout: 1e4,
                cache: !1,
                contentType: "application/json",
                xhrFields: {
                    withCredentials: !0
                },
                success: function(e) {
                    var t = e.data;
                    if ($(".observed-card").length + $(".add-observed-card").length == 4 && $("#add_aided_person").remove(), t.Name && t.CertNo && t.Hash) {
                        var a = juicer && juicer.to_html($("#J_observed_card_tpl").html(), t);
                        $(".scroll").prepend(a),
                        fee(),
                        checkChargeStatus(),
                        $("input[name=name]").val(""),
                        $("input[name=id]").val("")
                    }
                },
                error: function(e) {
                    switch (e.status) {
                    case 401:
                        window.location.href = "http://m.qschou.com/sign/in";
                        break;
                    default:
                        e.responseJSON.error ? alertMessage(e.responseJSON.error, 3e3) : alertMessage("系统繁忙,请稍候再试")
                    }
                    "timeout" == e.statusText && (loadingMessage("", !1), alertMessage("请求超时"))
                },
                complete: function() {
                    loadingMessage(1, !1),
                    $("#add_aided_person_modal").modal("hide")
                }
            })
        } else alertMessage("该身份证号不存在,请检查", 2e3)
    }),
    $("#wechat-charge").on("click",
    function(t) {
        if (t.stopPropagation(), t.preventDefault(), "undefined" != typeof GlobalObj.isIOS && GlobalObj.isIOS && appVersion < 137) alertMessage("对不起,您当前使用的app版本太低。如需使用该服务,请升级应用", 1e4);
        else {
            loadingMessage("提交中", !0);
            var a = $(this);
            a.addClass("disabled");
            var i = [];
            $(".add-observed-card.active").each(function(e, t) {
                $(t).attr("data-hash") && i.push($(t).attr("data-hash"))
            }),
            $.ajax({
                url: GlobalObj.host + "/api/v2/users/insurance/" + GlobalObj.insuranceUUID + "/payment",
                type: "POST",
                data: JSON.stringify({
                    targets: i
                }),
                dataType: "json",
                contentType: "application/json",
                xhrFields: {
                    withCredentials: !0
                },
                success: function(t) {
                    if ("undefined" == typeof t.data.payType || 4 != t.data.payType && 2 != t.data.payType) {
                        if (t.data.payType && 3 == t.data.payType) {
                            var a = t.data.payParams;
                            wx.chooseWXPay({
                                timestamp: a.timestamp,
                                nonceStr: a.nonceStr,
                                "package": a.packageStr,
                                signType: a.signType,
                                paySign: a.paySign,
                                success: function() {
                                    window.location.href = GlobalObj.host + "/member/payment/success?insurance_uuid=" + GlobalObj.insuranceUUID + "&member=" + GlobalObj.member
                                },
                                fail: function() {
                                    alertMessage("支付失败")
                                }
                            })
                        }
                    } else 2 == t.data.payType ? (window.localStorage.setItem("payStatus", 1), e(t.data.payURL)) : window.location.href = t.data.payURL
                },
                error: function(e) {
                    switch (e.status) {
                    case 401:
                        window.location.href = "http://m.qschou.com/sign/in";
                        break;
                    default:
                        e.responseJSON.error ? alertMessage(e.responseJSON.error, 3e3) : alertMessage("系统繁忙,请稍候再试")
                    }
                },
                complete: function() {
                    a.removeClass("disabled"),
                    loadingMessage(1, !1)
                }
            })
        }
    }),
    $("#member-recharge").click(function(e) {
        if (e.stopPropagation(), e.preventDefault(), "undefined" != typeof GlobalObj.isIOS && GlobalObj.isIOS && appVersion < 137) alertMessage("对不起,您当前使用的app版本太低。如需使用该服务,请升级应用", 1e4);
        else {
            loadingMessage("提交中", !0);
            var t = $(this);
            t.addClass("disabled");
            var a = $('input[name="support-money_list"]:checked').val() || $('input[name="support-money-other"]').val();
            if (!a) return alertMessage("请填写充值金额"),
            t.removeClass("disabled"),
            !1;
            if (!/^\d+$/.test(a) || parseInt(a) < 1) return alertMessage("充值金额只能是整数，并且至少1元"),
            t.removeClass("disabled"),
            !1
        }
    }),
    $(".h5_share").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $("#page-share").modal("show")
    }),
    $(".sick-thirty-button").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $("#sick-thirty").modal("show");
		$('body').addClass("ovfHiden");
    }),
    $(".weiai-foundation-button").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $("#weiai-foundation").modal("show")
    }),
    $(".difference-rule-button").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $("#difference-rule").modal("show")
    }),
    $(".mutual-help-button").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $("#mutual-help").modal("show")
    }),
    $("#link-bank-detail").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $("#Construction-bank").modal("show")
    }),
    $('[data-target="#sick-convention"]').on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $("#sick-convention").modal("show")
    }),
    $(".link-glossary").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $("#glossary").modal("show")
    }),
    $(".link-sick-thirty").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $("#sick-thirty").modal("show")
    }),
    $("#has_sick").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        $("#sick-convention").modal("show")
    });
    var i = $(".delete-member");
    i.length && (i.on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault();
        var t = $(this).attr("data-delete"),
        a = $("#delete-member");
        a.find("input").val(t),
        a.modal("show")
    }), $("#confirmDeleteMember").on("click",
    function(e) {
        e.stopPropagation(),
        e.preventDefault(),
        loadingMessage("处理中"),
        $.ajax({
            url: $("input[name=deleteURL]").val(),
            data: null,
            dataType: "json",
            type: "DELETE",
            xhrFields: {
                withCredentials: !0
            },
            success: function(e) {
                window.location.reload()
            },
            error: function(e) {
                switch (e.status) {
                case 401:
                    window.location.href = "http://m.qschou.com/sign/in";
                    break;
                default:
                    e.responseJSON.error ? alertMessage(e.responseJSON.error, 3e3) : alertMessage("系统繁忙,请稍候再试")
                }
            },
            complete: function() {
                loadingMessage("1", !1)
            }
        })
    }))
} (),
$(".qsc-modal").on("touchstart",
function(e) {
    e.preventDefault()
}),
$(".btn.btn-primary.btn-lg").on("touchstart",
function(e) {
    e.stopPropagation()
}),
$(".icon-close_modal").on("touchstart",
function(e) {
    e.stopPropagation(),
    $(this).parents(".qsc-modal").modal("hide")
}),
$(".modal-body").on("touchstart",
function(e) {
    e.stopPropagation()
}),
wx.ready(function() {
    GlobalObj && GlobalObj.share && (wx.onMenuShareTimeline(GlobalObj.share), wx.onMenuShareAppMessage(GlobalObj.share), wx.onMenuShareQQ(GlobalObj.share), wx.onMenuShareWeibo(GlobalObj.share))
});
var _hmt = _hmt || []; !
function() {
    var e = document.createElement("script");
    e.src = "//hm.baidu.com/hm.js?65dfcf8f1948f7203dd3fb620de01083";
    var t = document.getElementsByTagName("script")[0];
    t.parentNode.insertBefore(e, t)
} ();