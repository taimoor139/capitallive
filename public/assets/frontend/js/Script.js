 window.addEventListener("load", (function () {
         document.querySelector("body").classList.add("loaded")
     })),
     function () {
         const e = location.pathname.slice(location.pathname.lastIndexOf("/") + 1),
             t = window.matchMedia("(max-width: 960px)"),
             n = document.querySelectorAll(".uk-navbar-nav li"),
             a = document.querySelectorAll(".uk-nav-default li"),
             r = document.querySelectorAll(".uk-navbar-dropdown li"),
             s = document.querySelectorAll(".uk-nav-sub li");

         function o(t) {
             t.forEach((function (n) {
                 "/" === location.pathname[location.pathname.length - 1] ? t[0].classList.add("uk-active") : n.querySelectorAll("a")[0].getAttribute("href") === e && n.classList.add("uk-active")
             }))
         }

         function i(t) {
             t.forEach((function (n) {
                 if (t.length > 0 && n.querySelectorAll("a")[0].getAttribute("href") === e) {
                     const e = n.parentElement.parentElement,
                         t = n.parentElement.parentElement.parentElement.parentElement;
                     "LI" === e.parentElement.tagName ? e.parentElement.classList.add("uk-active") : "LI" === e.tagName ? e.classList.add("uk-active") : t.parentElement.classList.add("uk-active")
                 }
             }))
         }
         t.matches && (o(a), i(s)), o(n), i(r)
     }(),
     function () {
         const e = document.querySelectorAll(".uk-navbar-nav li.uk-active"),
             t = document.getElementsByClassName("uk-breadcrumb");
         if (t.length > 0 && "blog-article.html" != location.pathname.slice(location.pathname.lastIndexOf("/") + 1)) {
             const n = document.querySelectorAll(".uk-navbar-nav li")[0].getElementsByTagName("a")[0].pathname;
             t[0].innerHTML = `<li><a href="${n.slice(location.pathname.lastIndexOf("/") + 1)}">Home</a></li>`, e.forEach((function (e) {
                 const n = document.createElement("li");
                 breadTitle = e.childNodes[0].innerText, n.innerHTML = `<a href="${e.children[0].attributes[0].textContent}">${breadTitle}</a>`, t[0].insertBefore(n, t[0].firstElementChild.previousSibling)
             })), t[0].lastChild.innerHTML = `<span>${breadTitle}</span>`
         }
     }();
 const mainNav = document.querySelector(".uk-navbar-nav");
 if (null !== mainNav) {
     const e = mainNav.cloneNode(!0),
         t = e.querySelectorAll("ul.uk-nav");
     e.classList.remove("uk-navbar-nav", "uk-visible@m"), e.classList.add("uk-nav-default", "uk-nav-parent-icon"), e.setAttribute("data-uk-nav", ""), Array.from(e.children).forEach((function (e) {
         2 == e.children.length && (e.classList.add("uk-parent"), e.querySelectorAll(".fa-chevron-down")[0].remove())
     }));
     const n = e => e.replaceWith(...e.childNodes);
     t.forEach((function (e) {
         e.classList.remove("uk-nav", "uk-navbar-dropdown-nav"), e.classList.add("uk-nav-sub"), n(e.parentElement), null !== e.querySelector("a.uk-disabled") && (n(e.parentElement.parentElement), n(e.parentElement), e.querySelector("a.uk-disabled").parentElement.parentElement.remove())
     }));
     const a = document.querySelector(".in-optional-nav");
     let r = "";
     null !== a && a.children.length > 0 && (r = `<a href="${a.children[0].children[0].href}" class="uk-button uk-button-primary uk-border-rounded uk-align-center">${a.children[0].children[0].innerText}<i class="fas fa-sign-in-alt uk-margin-small-left"></i></a>`);
     const s = `\n    <div class="uk-navbar-item in-mobile-nav uk-hidden@m">\n        <a class="uk-button" href="#modal-full" data-uk-toggle><i class="fas fa-bars"></i></a>\n    </div>\n    <div id="modal-full" class="uk-modal-full" data-uk-modal>\n        <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" data-uk-height-viewport>\n            <a class="uk-modal-close-full uk-button"><i class="fas fa-times"></i></a>\n            <div class="uk-width-large uk-padding-large">\n                ${e.outerHTML}\n                ${r}\n            </div>\n        </div>\n    </div>\n    `;
     mainNav.insertAdjacentHTML("afterend", s)
 }

 function serialize(e) {
     return Array.from(new FormData(e), e => e.map(encodeURIComponent).join("=")).join("&")
 }

 function ajaxRequest(e, t, n, a) {
     const r = new XMLHttpRequest;
     r.open(e, t, !0), r.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), r.send(n), r.onreadystatechange = function () {
         4 == r.readyState && 200 == r.status ? a(!0, r.responseText) : a(!1, "")
     }
 }

 function emptyElements(e) {
     for (let t of e) t.innerHTML = ""
 }

 function counterUp(e) {
     "use strict";
     this.defaults = {
         duration: 2e3,
         prepend: "",
         append: "",
         selector: ".in-counter",
         start: 0,
         end: 100,
         intvalues: !1,
         interval: 100
     };
     var t = this;
     for (var n in this.upating = !1, this.intervalID = null, this.props = {}, this.defaults) void 0 !== n && (t.props[n] = t.defaults[n], e.hasOwnProperty(n) && t.props.hasOwnProperty(n) && (t.props[n] = e[n]));
     this.domelems = document.querySelectorAll(this.props.selector), this.elems = [];
     var a = {};
     this.domelems.forEach((function (e) {
         a.obj = e;
         var n = parseInt(e.getAttribute("data-counter-start"));
         isNaN(n) ? a.start = t.props.start : a.start = n;
         var r = parseInt(e.getAttribute("data-counter-end"));
         isNaN(r) ? a.end = t.props.end : a.end = r;
         var s = parseInt(e.getAttribute("data-counter-duration"));
         isNaN(s) ? a.duration = t.props.duration : a.duration = s;
         var o = e.getAttribute("data-counter-prepend");
         a.prepend = null == o ? t.props.prepend : o;
         var i = e.getAttribute("data-counter-append");
         a.append = null == i ? t.props.append : i;
         var l = e.getAttribute("data-counter-intval");
         a.intvalues = null == l ? t.props.intvalues : l, a.step = (a.end - a.start) / (a.duration / t.props.interval), a.val = a.start, t.elems.push(a), a = {}
     }))
 }

 function iframeVid(e) {
     for (var t in this.defaults = {
             selector: ".in-iframe",
             url: "",
             width: 900,
             height: 506
         }, this.props = {}, this.defaults) void 0 !== t && (this.props[t] = this.defaults[t], e.hasOwnProperty(t) && this.props.hasOwnProperty(t) && (this.props[t] = e[t]));
     if (null != document.querySelector(this.props.selector)) {
         let e = document.querySelector(this.props.selector),
             t = `<iframe src="${this.props.url}" width="${this.props.width}" height="${this.props.height}" data-uk-video="automute: true"></iframe>`;
         new IntersectionObserver((function (n) {
             !0 === n[0].isIntersecting && 1 === e.children.length && e.insertAdjacentHTML("beforeend", t)
         }), {
             threshold: [0]
         }).observe(document.querySelector(this.props.selector))
     }
 }! function () {
     const e = document.querySelector(".in-totop");
     window.addEventListener("scroll", (function () {
         setTimeout((function () {
             window.scrollY > 300 ? (e.style.opacity = 1, e.classList.add("uk-animation-slide-top")) : (e.style.opacity -= .1, e.classList.remove("uk-animation-slide-top"))
         }), 400)
     }))
 }(), document.addEventListener("DOMContentLoaded", () => {
     const e = document.getElementById("contact-form"),
         t = document.getElementById("sendemail");
     void 0 !== t && null != t && t.addEventListener("click", t => {
         t.preventDefault();
         ajaxRequest("POST", "./Contactmail.php", serialize(document.getElementById("contact-form")), (t, n) => {
             if (t) {
                 const t = JSON.parse(n);
                 t.isSuccess ? (UIkit.notification("<i class='fas fa-check-circle uk-margin-small-right'></i> Your message has been sent successfully. Thank you!", {
                     timeout: 3e3,
                     status: "primary",
                     pos: "bottom-right"
                 }), e.reset()) : (t.nameError && document.getElementById("name").classList.add("uk-form-danger"), document.getElementById("name").addEventListener("click", (function () {
                     document.getElementById("name").classList.remove("uk-form-danger")
                 })), t.emailError && document.getElementById("email").classList.add("uk-form-danger"), document.getElementById("email").addEventListener("click", (function () {
                     document.getElementById("email").classList.remove("uk-form-danger")
                 })), t.subjectError && document.getElementById("subject").classList.add("uk-form-danger"), document.getElementById("subject").addEventListener("click", (function () {
                     document.getElementById("subject").classList.remove("uk-form-danger")
                 })), t.messageError && document.getElementById("message").classList.add("uk-form-danger"), document.getElementById("message").addEventListener("click", (function () {
                     document.getElementById("message").classList.remove("uk-form-danger")
                 })))
             }
         })
     })
 }), counterUp.prototype.start = function () {
     "use strict";
     var e = this;
     if (null != document.querySelector(e.props.selector)) {
         new IntersectionObserver((function (t) {
             !0 === t[0].isIntersecting && (this.intervalID = setInterval((function () {
                 e.updating || e.update()
             }), e.props.interval))
         }), {
             threshold: [0]
         }).observe(document.querySelector(e.props.selector))
     }
 }, counterUp.prototype.update = function () {
     "use strict";
     this.updating = !0;
     var e = !0;
     this.elems.forEach((function (t) {
         t.val += t.step, t.val < t.end ? (1 == t.intvalues ? t.obj.innerHTML = t.prepend + Math.floor(t.val).toString() + t.append : t.obj.innerHTML = t.prepend + (Math.round(100 * t.val) / 100).toString() + t.append, e = !1) : t.obj.innerHTML = t.prepend + t.end.toString() + t.append
     })), 1 == e && clearInterval(this.intervalID), this.updating = !1
 }, document.querySelectorAll(".media").length > 0 && Plyr.setup(".media");
