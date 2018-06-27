/*! smooth-scroll v14.2.0 | (c) 2018 Chris Ferdinandi | MIT License | http://github.com/cferdinandi/smooth-scroll */
window.Element && !Element.prototype.closest && (Element.prototype.closest = function(e) {
    var t, n = (this.document || this.ownerDocument).querySelectorAll(e),
        o = this;
    do {
        for (t = n.length; --t >= 0 && n.item(t) !== o;);
    } while (t < 0 && (o = o.parentElement));
    return o
}), (function() {
    function e(e, t) {
        t = t || {
            bubbles: !1,
            cancelable: !1,
            detail: void 0
        };
        var n = document.createEvent("CustomEvent");
        return n.initCustomEvent(e, t.bubbles, t.cancelable, t.detail), n
    }
    if ("function" == typeof window.CustomEvent) return !1;
    e.prototype = window.Event.prototype, window.CustomEvent = e
})(), (function() {
    for (var e = 0, t = ["ms", "moz", "webkit", "o"], n = 0; n < t.length && !window.requestAnimationFrame; ++n) window.requestAnimationFrame = window[t[n] + "RequestAnimationFrame"], window.cancelAnimationFrame = window[t[n] + "CancelAnimationFrame"] || window[t[n] + "CancelRequestAnimationFrame"];
    window.requestAnimationFrame || (window.requestAnimationFrame = function(t, n) {
        var o = (new Date).getTime(),
            i = Math.max(0, 16 - (o - e)),
            r = window.setTimeout((function() {
                t(o + i)
            }), i);
        return e = o + i, r
    }), window.cancelAnimationFrame || (window.cancelAnimationFrame = function(e) {
        clearTimeout(e)
    })
})(), (function(e, t) {
    "function" == typeof define && define.amd ? define([], (function() {
        return t(e)
    })) : "object" == typeof exports ? module.exports = t(e) : e.SmoothScroll = t(e)
})("undefined" != typeof global ? global : "undefined" != typeof window ? window : this, (function(e) {
    "use strict";
    var t = {
            ignore: "[data-scroll-ignore]",
            header: null,
            topOnEmptyHash: !0,
            speed: 500,
            clip: !0,
            offset: 0,
            easing: "easeInOutCubic",
            customEasing: null,
            updateURL: !0,
            popstate: !0,
            emitEvents: !0
        },
        n = function() {
            return "querySelector" in document && "addEventListener" in e && "requestAnimationFrame" in e && "closest" in e.Element.prototype
        },
        o = function() {
            for (var e = {}, t = 0; t < arguments.length; t++) !(function(t) {
                for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n])
            })(arguments[t]);
            return e
        },
        i = function(t) {
            return !!("matchMedia" in e && e.matchMedia("(prefers-reduced-motion)").matches)
        },
        r = function(t) {
            return parseInt(e.getComputedStyle(t).height, 10)
        },
        a = function(e) {
            var t;
            try {
                t = decodeURIComponent(e)
            } catch (n) {
                t = e
            }
            return t
        },
        c = function(e) {
            "#" === e.charAt(0) && (e = e.substr(1));
            for (var t, n = String(e), o = n.length, i = -1, r = "", a = n.charCodeAt(0); ++i < o;) {
                if (0 === (t = n.charCodeAt(i))) throw new InvalidCharacterError("Invalid character: the input contains U+0000.");
                t >= 1 && t <= 31 || 127 == t || 0 === i && t >= 48 && t <= 57 || 1 === i && t >= 48 && t <= 57 && 45 === a ? r += "\\" + t.toString(16) + " " : r += t >= 128 || 45 === t || 95 === t || t >= 48 && t <= 57 || t >= 65 && t <= 90 || t >= 97 && t <= 122 ? n.charAt(i) : "\\" + n.charAt(i)
            }
            var c;
            try {
                c = decodeURIComponent("#" + r)
            } catch (e) {
                c = "#" + r
            }
            return c
        },
        u = function(e, t) {
            var n;
            return "easeInQuad" === e.easing && (n = t * t), "easeOutQuad" === e.easing && (n = t * (2 - t)), "easeInOutQuad" === e.easing && (n = t < .5 ? 2 * t * t : (4 - 2 * t) * t - 1), "easeInCubic" === e.easing && (n = t * t * t), "easeOutCubic" === e.easing && (n = --t * t * t + 1), "easeInOutCubic" === e.easing && (n = t < .5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1), "easeInQuart" === e.easing && (n = t * t * t * t), "easeOutQuart" === e.easing && (n = 1 - --t * t * t * t), "easeInOutQuart" === e.easing && (n = t < .5 ? 8 * t * t * t * t : 1 - 8 * --t * t * t * t), "easeInQuint" === e.easing && (n = t * t * t * t * t), "easeOutQuint" === e.easing && (n = 1 + --t * t * t * t * t), "easeInOutQuint" === e.easing && (n = t < .5 ? 16 * t * t * t * t * t : 1 + 16 * --t * t * t * t * t), e.customEasing && (n = e.customEasing(t)), n || t
        },
        s = function() {
            return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight)
        },
        l = function(t, n, o, i) {
            var r = 0;
            if (t.offsetParent)
                do {
                    r += t.offsetTop, t = t.offsetParent
                } while (t);
            return r = Math.max(r - n - o, 0), i && (r = Math.min(r, s() - e.innerHeight)), r
        },
        m = function(e) {
            return e ? r(e) + e.offsetTop : 0
        },
        d = function(e, t, n) {
            t || history.pushState && n.updateURL && history.pushState({
                smoothScroll: JSON.stringify(n),
                anchor: e.id
            }, document.title, e === document.documentElement ? "#top" : "#" + e.id)
        },
        f = function(t, n, o) {
            0 === t && document.body.focus(), o || (t.focus(), document.activeElement !== t && (t.setAttribute("tabindex", "-1"), t.focus(), t.style.outline = "none"), e.scrollTo(0, n))
        },
        h = function(t, n, o, i) {
            if (n.emitEvents && "function" == typeof e.CustomEvent) {
                var r = new CustomEvent(t, {
                    bubbles: !0,
                    detail: {
                        anchor: o,
                        toggle: i
                    }
                });
                document.dispatchEvent(r)
            }
        };
    return function(r, p) {
        var g, v, w, y, E, b, S, A = {};
        A.cancelScroll = function(e) {
            cancelAnimationFrame(S), S = null, e || h("scrollCancel", g)
        }, A.animateScroll = function(n, i, r) {
            var a = o(g || t, r || {}),
                c = "[object Number]" === Object.prototype.toString.call(n),
                p = c || !n.tagName ? null : n;
            if (c || p) {
                var v = e.pageYOffset;
                a.header && !y && (y = document.querySelector(a.header)), E || (E = m(y));
                var w, b, C, O = c ? n : l(p, E, parseInt("function" == typeof a.offset ? a.offset(n, i) : a.offset, 10), a.clip),
                    I = O - v,
                    q = s(),
                    F = 0,
                    L = function(t, o) {
                        var r = e.pageYOffset;
                        if (t == o || r == o || (v < o && e.innerHeight + r) >= q) return A.cancelScroll(!0), f(n, o, c), h("scrollStop", a, n, i), w = null, S = null, !0
                    },
                    H = function(t) {
                        w || (w = t), F += t - w, b = F / parseInt(a.speed, 10), b = b > 1 ? 1 : b, C = v + I * u(a, b), e.scrollTo(0, Math.floor(C)), L(C, O) || (S = e.requestAnimationFrame(H), w = t)
                    };
                0 === e.pageYOffset && e.scrollTo(0, 0), d(n, c, a), h("scrollStart", a, n, i), A.cancelScroll(!0), e.requestAnimationFrame(H)
            }
        };
        var C = function(t) {
                if (!i() && 0 === t.button && !t.metaKey && !t.ctrlKey && "closest" in t.target && (w = t.target.closest(r)) && "a" === w.tagName.toLowerCase() && !t.target.closest(g.ignore) && w.hostname === e.location.hostname && w.pathname === e.location.pathname && /#/.test(w.href)) {
                    var n = c(a(w.hash)),
                        o = g.topOnEmptyHash && "#" === n ? document.documentElement : document.querySelector(n);
                    o = o || "#top" !== n ? o : document.documentElement, o && (t.preventDefault(), A.animateScroll(o, w))
                }
            },
            O = function(e) {
                if (history.state.smoothScroll && history.state.smoothScroll === JSON.stringify(g) && history.state.anchor) {
                    var t = document.querySelector(c(a(history.state.anchor)));
                    t && A.animateScroll(t, null, {
                        updateURL: !1
                    })
                }
            },
            I = function(e) {
                b || (b = setTimeout((function() {
                    b = null, E = m(y)
                }), 66))
            };
        return A.destroy = function() {
            g && (document.removeEventListener("click", C, !1), e.removeEventListener("resize", I, !1), e.removeEventListener("popstate", O, !1), A.cancelScroll(), g = null, v = null, w = null, y = null, E = null, b = null, S = null)
        }, A.init = function(i) {
            if (!n()) throw "Smooth Scroll: This browser does not support the required JavaScript methods and browser APIs.";
            A.destroy(), g = o(t, i || {}), y = g.header ? document.querySelector(g.header) : null, E = m(y), document.addEventListener("click", C, !1), y && e.addEventListener("resize", I, !1), g.updateURL && g.popstate && e.addEventListener("popstate", O, !1)
        }, A.init(p), A
    }
}));