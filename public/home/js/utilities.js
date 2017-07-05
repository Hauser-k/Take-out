/**
 * web端(非node)通用工具类
 * 处理 query 获得 queryData, queryString 等
 */
var kdm;
(function (kdm) {
    var utilities;
    (function (utilities) {
        /**
         * 获取当前url中的参数列表，返回参数字典对象
         *
         * @param {string} [url] (description)
         * @returns {{ [index: string]: string }} (description)
         */
        function getQueryObject(url) {
            url = url == null ? window.location.href : url;
            var search = url.substring(url.lastIndexOf("?") + 1);
            if (search.lastIndexOf("#") != -1) {
                search = search.substr(0, search.lastIndexOf("#"));
            }
            var obj = {};
            var reg = /([^?&=]+)=([^?&=]*)/g;
            search.replace(reg, function (rs, $1, $2) {
                var name = decodeURIComponent($1);
                var val = decodeURIComponent($2);
                val = String(val);
                obj[name] = val;
                return rs;
            });
            return obj;
        }
        utilities.getQueryObject = getQueryObject;
        /**
         * 获取将指定对象拼接成查询参数字符串（eg:name=value&name2=value2&...）
         *
         * @export
         * @param {*} queryData 参数对象
         * @returns {string} (description)
         */
        function getQueryString(queryData) {
            if (queryData === void 0) { queryData = {}; }
            var queryArr = [];
            var queryStr = "";
            // TODO 应该用$.isPlainObject来判断
            if (typeof queryData !== "object")
                throw new Error("queryData need Object");
            //遍历读取        
            Object.keys(queryData).forEach(function (name) {
                if (typeof queryData[name] == "function")
                    return;
                queryArr.push({
                    name: name,
                    val: queryData[name]
                });
            });
            //拼接
            queryStr = queryArr.map(function (o) {
                return encodeURIComponent(o.name) + "=" + encodeURIComponent(String(o.val)); //必须编码
            }).join("&");
            return queryStr;
        }
        utilities.getQueryString = getQueryString;
        /**
         * 获取将指定查询参数对象，hash值拼接成完成url
         *
         * @export
         * @param {string} path 要拼接的url的path
         * @param {*} queryData 查询参数对象
         * @param {string} [hash=""] hash值（锚点）
         * @returns {string} (description)
         */
        function getQueryStringUrl(path, queryData, hash) {
            if (queryData === void 0) { queryData = {}; }
            if (hash === void 0) { hash = ""; }
            var queryStr = getQueryString(queryData);
            var result = "";
            if (typeof hash != "string")
                throw new Error("hash need string");
            if (queryStr.length > 0) {
                queryStr = "?" + queryStr;
            }
            if (hash.length > 0) {
                hash = "#" + hash;
            }
            result = path + queryStr + hash;
            return result;
        }
        utilities.getQueryStringUrl = getQueryStringUrl;
        /**
         * 合并两个URL路径，解决合并过程中斜线（/）符号的问题
         *
         * @param {string} path1 前一个url路径
         * @param {string} path2 后一个url路径
         * @returns {string} (description)
         */
        function urlCombine(path1, path2) {
            if (typeof path1 != "string" || typeof path2 != "string") {
                throw new Error("path need string");
            }
            else if (path1.length == 0 || path2.length == 0) {
                return path1 + path2;
            }
            //去除前路径末尾及后路径开头的多个斜线
            path1 = path1.replace(/\/+$/g, "/");
            path2 = path2.replace(/^\/+/g, "/");
            var last = path1[path1.length - 1];
            var first = path2[0];
            var result = "";
            if (last == "/" && first == "/") {
                result = path1 + path2.substr(1);
            }
            else if (last != "/" && first != "/") {
                result = path1 + "/" + path2;
            }
            else {
                result = path1 + path2;
            }
            return result;
        }
        utilities.urlCombine = urlCombine;
        /**
        * 获得一个任意长度的随机字符串
        * @param {number = 8} count 随机字符串长度，默认长度8
        */
        function getRandomStr(count) {
            if (count === void 0) { count = 8; }
            var str = "";
            for (var i = 0; i < count; i++) {
                str += (Math.random() * 10).toString(36).charAt(parseInt(((Math.random() * 5) + 2).toString()));
            }
            return str;
        }
        utilities.getRandomStr = getRandomStr;
        ;
        /**
         * 将Vue的data值与服务器的Node层数据以及Ejs页面变量合并
         *
         * @export
         * @param {*} vmData 用于初始化Vue的data字段的对象
         */
        function setServerVue(vmData) {
            var formRender = $.extend(true, {}, MT.FORMRENDER);
            var newVmData = $.extend(true, formRender, vmData);
            return $.extend(true, vmData, newVmData);
        }
        utilities.setServerVue = setServerVue;
        /**
         * 将延庆县,密云县 等等 变成延庆密云  忽率: 莘县,莒县等2个字地名
         *
         */
        function boradCountyName(countyName) {
            var boradCountyName = '';
            if (countyName.length > 2) {
                boradCountyName = countyName.replace(/[省市区县]|自治区|自治州|自治县$/, '');
            }
            else {
                boradCountyName = countyName;
            }
            return boradCountyName;
        }
        utilities.boradCountyName = boradCountyName;
        // 转化为长整形
        function latlngLongInt(latorlng) {
            var longInt = 0;
            if (typeof latorlng == 'string') {
                longInt = parseInt((parseFloat(latorlng) * 1000000).toFixed(0));
            }
            else if (typeof latorlng == 'number') {
                longInt = parseInt((latorlng * 1000000).toFixed(0));
            }
            else {
                longInt = 0;
            }
            return longInt;
        }
        utilities.latlngLongInt = latlngLongInt;
        /**
         * 深度clone 一个对象
         * @param obj
         */
        function clone(obj) {
            if (null == obj || "object" != typeof obj)
                return obj;
            var copy = obj.constructor();
            for (var attr in obj) {
                if (obj.hasOwnProperty(attr))
                    copy[attr] = obj[attr];
            }
            return copy;
        }
        utilities.clone = clone;
    })(utilities = kdm.utilities || (kdm.utilities = {}));
})(kdm || (kdm = {}));
requirejs.config({
    baseUrl: MT.STATIC_ROOT + '/javascripts'
});
define([], function () {
    return kdm.utilities;
});
//# sourceMappingURL=utilities.js.map