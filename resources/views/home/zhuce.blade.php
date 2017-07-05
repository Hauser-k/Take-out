<!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"
        />
        <link rel="dns-prefetch" href="#">
        <link rel="apple-touch-icon" href="#">
        <link rel="shortcut icon" href="#">
        <link rel="icon" href="#"
        sizes="16x16 32x32">
        <link rel="alternate" href="#" title="订阅更新"
        type="application/rss+xml">
        <link rel="canonical" href="#">
        <meta name="keywords" content="美团,登录,注册,美团登录,美团注册">
        <title>
            注册 | 美团外卖
        </title>
        <!--[if lt IE 9]>
            <script src="//s0.meituan.net/bs/jsm/?f&#x3D;fe-sso-fs:build/page/vendor/html5shiv.min.js">
            </script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="./css/zhuce.css">
        <script>
            !
            function(e, t, n) {
                function s() {
                    var e = t.createElement("script");
                    e.async = !0,
                    e.src = "//s0.meituan." + ( - 1 === t.location.protocol.indexOf("https") ? "net": "com") + "/bs/js/?f=mta-js:mta.min.js";
                    var n = t.getElementsByTagName("script")[0];
                    n.parentNode.insertBefore(e, n)
                }
                if (e.MeituanAnalyticsObject = n, e[n] = e[n] ||
                function() { (e[n].q = e[n].q || []).push(arguments)
                },
                "complete" === t.readyState) s();
                else {
                    var i = "addEventListener",
                    r = "attachEvent";
                    if (e[i]) e[i]("load", s, !1);
                    else if (e[r]) e[r]("onload", s);
                    else {
                        var a = e.onload;
                        e.onload = function() {
                            s(),
                            a && a()
                        }
                    }
                }
            } (window, document, "mta"),
            function(e, t, n) {
                if (t && !("_mta" in t)) {
                    t._mta = !0;
                    var s = e.location.protocol;
                    if ("file:" !== s) {
                        var i = e.location.host,
                        r = t.prototype.open;
                        t.prototype.open = function(t, n, a, o, l) {
                            if (this._method = "string" == typeof t ? t.toUpperCase() : null, n) {
                                if (0 === n.indexOf("http://") || 0 === n.indexOf("https://") || 0 === n.indexOf("//")) this._url = n;
                                else if (0 === n.indexOf("/")) this._url = s + "//" + i + n;
                                else {
                                    var h = s + "//" + i + e.location.pathname;
                                    h = h.substring(0, h.lastIndexOf("/") + 1),
                                    this._url = h + n
                                }
                                var u = this._url.indexOf("?"); - 1 !== u ? (this._searchLength = this._url.length - 1 - u, this._url = this._url.substring(0, u)) : this._searchLength = 0
                            } else this._url = null,
                            this._searchLength = 0;
                            return this._startTime = (new Date).getTime(),
                            r.apply(this, arguments)
                        };
                        var a = "onreadystatechange",
                        o = "addEventListener",
                        l = t.prototype.send;
                        t.prototype.send = function(t) {
                            function n(n, i) {
                                if (0 !== n._url.indexOf(s + "//frep.meituan.net/_.gif")) {
                                    var r;
                                    if (n.response) switch (n.responseType) {
                                    case "json":
                                        r = JSON && JSON.stringify(n.response).length;
                                        break;
                                    case "blob":
                                    case "moz-blob":
                                        r = n.response.size;
                                        break;
                                    case "arraybuffer":
                                        r = n.response.byteLength;
                                    case "document":
                                        r = n.response.documentElement && n.response.documentElement.innerHTML && n.response.documentElement.innerHTML.length + 28;
                                        break;
                                    default:
                                        r = n.response.length
                                    }
                                    e.mta("send", "browser.ajax", {
                                        url: n._url,
                                        method: n._method,
                                        error: !(0 === n.status.toString().indexOf("2") || 304 === n.status),
                                        responseTime: (new Date).getTime() - n._startTime,
                                        requestSize: n._searchLength + (t ? t.length: 0),
                                        responseSize: r || 0
                                    })
                                }
                            }
                            if (o in this) {
                                var i = function(e) {
                                    n(this, e)
                                };
                                this[o]("load", i),
                                this[o]("error", i),
                                this[o]("abort", i)
                            } else {
                                var r = this[a];
                                this[a] = function(t) {
                                    r && r.apply(this, arguments),
                                    4 === this.readyState && e.mta && n(this, t)
                                }
                            }
                            return l.apply(this, arguments)
                        }
                    }
                }
            } (window, window.XMLHttpRequest, "mta");

            mta("create", "56b169118135d3e3104fdd0f");
            mta("send", "page");
        </script>
    </head>
    
    <body class="pg-unitive-signup theme--waimai">
        <header class="header--mini">
            <div class="wrapper cf">
                <a class="site-logo" href="#">
                    美团
                </a>
            </div>
        </header>
        <div class="content">
            <div class="J-unitive-signup-form">
                <div class="sheet" style="display:block">
                    <form action="/account/unitivesignup" method="POST">
                        <div class="form-field form-field--mobile">
                            <label>
                                手机号
                            </label>
                            <input type="text" name="mobile" class="f-text J-mobile" />
                            <span class="J-unitive-tip unitive-tip">
                                注册成功后，全美团通用
                            </span>
                        </div>
                        <div class="form-field form-field--vbtn">
                            <label>
                                图片验证码
                            </label>
                            <div class="J-captcha captcha-wrapper" style="display:none" hidden="true">
                                <input type="text" id="captcha-mobile" class="f-text J-captcha" name="captcha-mobile"
                                autocomplete="off" />
                                <img id="signup-captcha-mobile-img" height="34px" width="60px" class="signup-captcha-img J-captcha-refresh"
                                src="https://passport.meituan.com/account/captcha" />
                                <a tabindex="-1" class="J-captcha-refresh captcha-refresh inline-link"
                                href="javascript:void(0)">
                                    看不清楚？换一张
                                </a>
                                <span class="J-captcha-tip inline-tip">
                                </span>
                            </div>
                            <div class="verify-wrapper">
                                <input type="button" class="btn-normal btn-mini verify-btn J-verify-btn"
                                value="免费获取短信动态码" />
                                <span class="f1 verify-tip" id="J-verify-tip">
                                </span>
                            </div>
                        </div>
                        <div class="form-field form-field--sms">
                            <label>
                                短信动态码
                            </label>
                            <input type="text" name="verifycode" class="f-text J-sms" />
                        </div>
                        <div class="form-field form-field--pwd">
                            <div class="pw-strength">
                                <div class="pw-strength__bar" id="J-pw-strength__bar">
                                </div>
                                <div class="pw-strength__letter">
                                    <span class="pw-strength__label">
                                        弱
                                    </span>
                                    <span class="pw-strength__label">
                                        中
                                    </span>
                                    <span class="pw-strength__label pw-strength__label--noborder">
                                        强
                                    </span>
                                </div>
                            </div>
                            <label>
                                创建密码
                            </label>
                            <input type="password" name="password" class="f-text J-pwd" />
                        </div>
                        <div class="form-field form-field--pwd2">
                            <label>
                                确认密码
                            </label>
                            <input type="password" name="password2" class="f-text J-pwd2" />
                        </div>
                        <div class="form-field">
                            <input data-mtevent="signup.submit" type="submit" name="commit" class="btn"
                            value="同意以下协议并注册" />
                            <a href="" target="_blank">
                            </a>
                        </div>
                        <input type="hidden" name="fingerprint" class="J-fingerprint" value=""
                        />
                    </form>
                </div>
            </div>
            <div class="term">
                <a class="f1" href="#">
                    《美团网用户协议》
                </a>
            </div>
        </div>
        <footer class="footer--mini">
            <p class="copyright">
                ©
                <a class="f1" href="#">
                    meituan.com
                </a>
                &nbsp;
                <a class="f1" href="#">
                    京ICP证070791号
                </a>
                &nbsp;
                <span class="f1">
                    京公网安备11010502025545号
                </span>
            </p>
        </footer>
        <script>
            window.onunload = function() {};
        </script>
        <span id="csrf" style="display:none">
            4haRau8E-vlQ3iUkgqUYEe2cxyQCOwym_UmQ
        </span>
        <script src="//s0.meituan.net/bs/jsm/?f&#x3D;fe-sso-fs:build/page/vendor/jquery-1.11.3.min.js">
        </script>
        <script src="//s0.meituan.net/bs/js/?f=fe-sso-fs:build/page/common.b64560a.js;fe-sso-fs:build/page/signup/index.b64560a.js">
        </script>
    </body>

</html>