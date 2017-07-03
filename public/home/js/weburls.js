var kdm;
(function (kdm) {
    /**
     * 防止线上Nginx的路径/api被占用，遂新增自定义路径
     */
    var NodePath = "/node";
    /**
    * 服务器接口地址的BaseUrl
    */
    var APIPath = NodePath + "/api/kangaroo";
    var RestAPIPath = NodePath + "/api/v1/kaidian/restful";
    /**
     * 移动端-服务器页面地址的BaseUrl
     */
    var PagePath_m = "/open_store_m";
    /**
     * PC端-服务器页面地址的BaseUrl
     */
    var PagePath = "/open_store";
    var noop = function () { };
    $.hidePreloader = $.hidePreloader || noop;
    $.showPreloader = $.showPreloader || noop;
    $.alert = $.alert || function (text) { alert(text); };
    /**
    * 所有url接口
    */
    kdm.weburls = {
        createWebUrlItem: createWebUrlItem,
        /*
         * ------前后端逻辑接口URL------
         */
        /**
        * 申请任务
        */
        newtask: createWebUrlItem(APIPath + "/kaidian/w/newtask", "申请任务", 2 /* POST */),
        /**
        * 提交开店信息
        */
        commit: createWebUrlItem(APIPath + "/kaidian/w/commit", "提交开店信息", 2 /* POST */),
        /**
        * 获取是否有提交过的任务
        */
        commitstatus: createWebUrlItem(APIPath + "/kaidian/r/commitstatus", "获取是否有提交过的任务", 1 /* GET */),
        /**
        * 根据任务ID获取任务
        */
        taskbytaskid: createWebUrlItem(APIPath + "/kaidian/r/taskbytaskid", "根据任务ID获取任务", 1 /* GET */),
        /**
        * 根据用户ID获取所有的任务状态
        */
        tasksbyuserid: createWebUrlItem(APIPath + "/kaidian/r/tasksbyuserid", "根据用户ID获取所有的任务状态", 1 /* GET */),
        /**
        * 获取驳回原因
        */
        rejectreason: createWebUrlItem(APIPath + "/kaidian/r/rejectreason", "获取驳回原因", 1 /* GET */),
        /**
        * 获取工单任务id
        */
        ticketid: createWebUrlItem(APIPath + "/kaidian/r/ticketid", "获取工单任务id", 1 /* GET */ | 2 /* POST */),
        /**
        * 获取商家是否在美团配送范围内
        */
        shippingcheck: createWebUrlItem(APIPath + "/kaidian/r/shipping/check", "获取商家是否在美团配送范围内", 1 /* GET */),
        /**
        * 获取此商店是否需要录入商品
        */
        productcheck: createWebUrlItem(APIPath + "/kaidian/r/product/check", "获取此商店是否需要录入商品", 1 /* GET */),
        /**
        * 商品品类的增删改
        */
        producttag: createWebUrlItem(APIPath + "/kaidian/w/product/tag", "商品品类的增删改", 2 /* POST */),
        /**
        * 品类信息查询
        */
        producttagall: createWebUrlItem(APIPath + "/kaidian/r/product/tag/all", "品类信息查询", 1 /* GET */),
        /**
        * 商品的增删改
        */
        productPost: createWebUrlItem(APIPath + "/kaidian/w/product", "商品的增删改", 2 /* POST */),
        /**
        * 商品的查询
        */
        productGet: createWebUrlItem(APIPath + "/kaidian/r/product", "商品的查询", 1 /* GET */),
        /**
        * 商品查询字典
        */
        productdict: createWebUrlItem(APIPath + "/kaidian/r/product/dict", "商品查询字典", 1 /* GET */),
        /**
        * 填写完成提交任务
        */
        committask: createWebUrlItem(APIPath + "/kaidian/w/commit/task", "填写完成提交任务", 2 /* POST */),
        /*
         * ------前后端接口URL------
         */
        /**
        * 获取银行省份信息
        */
        bankprovinces: createWebUrlItem(APIPath + "/bank/provinces", "获取银行省份信息", 1 /* GET */),
        /**
        * 获取银行城市信息
        */
        bankcities: createWebUrlItem(APIPath + "/bank/cities", "获取银行城市信息", 1 /* GET */),
        /**
        * 获取银行列表信息
        */
        bankbanks: createWebUrlItem(APIPath + "/bank/banks", "获取银行列表信息", 1 /* GET */),
        /**
        * 获取支行信息
        */
        banksubbranch: createWebUrlItem(APIPath + "/bank/subbranch", "获取支行信息", 1 /* GET */),
        /**
        * 获取特许证件类型信息
        */
        credentialsall: createWebUrlItem(APIPath + "/credentials/all", "获取特许证件类型信息", 1 /* GET */),
        /**
        * 图片上传
        */
        fileuploadcdn: createWebUrlItem(APIPath + "/file/upload/cdn", "图片上传", 2 /* POST */),
        /**
        * 美团云图片上传
        */
        fileuploadmtcloud: createWebUrlItem(APIPath + "/file/upload/mtcloud", "美团云图片上传", 2 /* POST */),
        /**
        * 图片裁剪
        */
        filecut: createWebUrlItem(APIPath + "/file/cut", "图片裁剪", 2 /* POST */),
        /**
        * 获取品类树
        */
        tagtree: createWebUrlItem(APIPath + "/tag/allV6", "获取品类树", 1 /* GET */),
        /**
        * 获取品类链
        */
        taglist: createWebUrlItem(APIPath + "/tag/tagList", "获取品类链", 1 /* GET */),
        /**
        * 获取省市信息
        */
        geographyprovincecityall: createWebUrlItem(APIPath + "/geography/province/city/all", "获取省市信息", 2 /* POST */),
        /**
        * 获取县
        */
        geographycounty: createWebUrlItem(APIPath + "/geography/county", "获取县", 2 /* POST */),
        /**
         * 经纬度是否超出县/区范围 高德地图数据
         */
        geographyoutofrange: createWebUrlItem(APIPath + "/geography/r/wmPoiPointStatusGD", "超出区县范围", 1 /* GET */),
        /**
        * 信息统计接口
        */
        metriccount: createWebUrlItem(APIPath + "/metric/count", "信息统计接口", 2 /* POST */),
        /**
        * 录入进度统计接口
        */
        tracePoint: createWebUrlItem(APIPath + "/metric/tracePoint", "录入进度统计接口", 2 /* POST */),
        /*
         * ------restful 新接口地址 -----
         */
        /**
         * 信息组合-获取值接口
         */
        restfulRead: createWebUrlItem(RestAPIPath + "/tasks/r/{0}", " ", 2 /* POST */),
        /**
         * 信息组合-更新值接口
         */
        restfulWrite: createWebUrlItem(RestAPIPath + "/tasks/w/{0}", " ", 2 /* POST */),
        /**
         * 获取某个任务的品类类型接口,是否超市以及是否鲜花绿植
         */
        tagType: createWebUrlItem(RestAPIPath + "/tasks/r/{0}/tag/type", "获取某个任务的品类类型接口 - 是否超市", 2 /* POST */),
        /**
         * 获取某个用户的基本信息
         */
        userInfo: createWebUrlItem(RestAPIPath + "/tasks/r/user/info", "获取某个用户的基本信息", 1 /* GET */),
        /**
         * 获取实名认证支持的银行列表
         */
        verifiedBankList: createWebUrlItem(RestAPIPath + "/verified/bank/list", "获取实名认证支持的银行列表", 1 /* GET */),
        /**
         * 获取实名认证默认信息
         */
        verifiedDefaultInfo: createWebUrlItem(RestAPIPath + "/verified/{0}/default/info", "获取实名认证默认信息", 1 /* GET */),
        /**
         * 提交实名认证信息
         */
        verifiedInfo: createWebUrlItem(RestAPIPath + "/verified/{0}/info", "提交实名认证信息", 2 /* POST */),
        /**
         * 校验提交实名认证信息
         */
        verifiedCheck: createWebUrlItem(RestAPIPath + "/verified/{0}/check", "提交实名认证信息", 2 /* POST */),
        /**
         * 获取实名认证状态
         */
        verifiedStatus: createWebUrlItem(RestAPIPath + "/verified/{0}/status", "获取实名认证状态", 1 /* GET */),
        /**
         * 开始实名认证
         */
        tasksBeginVerified: createWebUrlItem(RestAPIPath + "/tasks/{0}/begin/verified", "开始实名认证", 1 /* GET */),
        /**
         * 根据经纬度判断是否支持美团配送
         */
        tasksrShippingType: createWebUrlItem(RestAPIPath + "/tasks/r/shippingType/{0}/{1}", "根据经纬度判断是否支持美团配送", 1 /* GET */),
        /**
         * 实名制预认证
         */
        verifiedPreVerified: createWebUrlItem(RestAPIPath + "/verified/{0}/preVerified", " " /*实名制预认证*/, 2 /* POST */),
        /*
         * ------移动端-页面URL地址------
         */
        /**
        * 页面_账户信息页
        */
        page_account_m: createWebUrlItem(PagePath_m + "/account", "账户信息页", 0 /* PAGE */),
        /**
        * 页面_配送信息页
        */
        page_delivery_m: createWebUrlItem(PagePath_m + "/delivery", "配送信息页", 0 /* PAGE */),
        /**
        * 页面_欢迎页，我要开店页
        */
        page_info_prompt_m: createWebUrlItem(PagePath_m + "/info_prompt", "欢迎页，我要开店页", 0 /* PAGE */),
        /**
        * 页面_提交成功页
        */
        page_status_m: createWebUrlItem(PagePath_m + "/status", "提交成功页", 0 /* PAGE */),
        /**
        * 页面_引导页面
        */
        page_introduction_m: createWebUrlItem(PagePath_m + "/introduction", "引导页面", 0 /* PAGE */),
        /**
        * 页面_店铺基础信息页
        */
        page_base_m: createWebUrlItem(PagePath_m + "/base", "店铺基础信息页", 0 /* PAGE */),
        /**
        * 页面_商家详情页
        */
        page_details_m: createWebUrlItem(PagePath_m + "/details", "商家详情页", 0 /* PAGE */),
        /**
        * 页面_KNB接口测试页
        */
        page_knbtest_m: createWebUrlItem(PagePath_m + "/knbtest", "KNB接口测试页", 0 /* PAGE */),
        /**
        * 页面_商品信息页，外卖分类菜品列表页
        */
        page_food_m: createWebUrlItem(PagePath_m + "/food", "商品信息页，外卖分类菜品列表页", 0 /* PAGE */),
        /**
        * 页面_我的店铺列表，申请记录页。参数tabIndex为0待处理，1审核中，2已完成
        */
        page_my_m: createWebUrlItem(PagePath_m + "/my", "我的店铺列表，申请记录页", 0 /* PAGE */),
        /**
        * 页面_合同预览页面
        */
        page_contract_m: createWebUrlItem(PagePath_m + "/contract", "合同预览页面", 0 /* PAGE */),
        /**
        * 页面_商品信息为空页，新建商品页
        */
        page_food_empty_m: createWebUrlItem(PagePath_m + "/food_empty", "商品信息为空页，新建商品页", 0 /* PAGE */),
        /**
        * 页面_资质信息页
        */
        page_qualification_m: createWebUrlItem(PagePath_m + "/qualification", "资质信息页", 0 /* PAGE */),
        /**
        * 页面_签约认证页面
        */
        page_certification_m: createWebUrlItem(PagePath_m + "/certification", "签约认证页面", 0 /* PAGE */),
        /*
         * ------PC端-页面URL地址------
         */
        /**
        * 页面_账户信息页
        */
        page_account: createWebUrlItem(PagePath + "/account", "账户信息页", 0 /* PAGE */),
        /**
        * 页面_配送信息页
        */
        page_delivery: createWebUrlItem(PagePath + "/delivery", "配送信息页", 0 /* PAGE */),
        /**
        * 页面_欢迎页，我要开店页
        */
        page_info_prompt: createWebUrlItem(PagePath + "/info_prompt", "欢迎页，我要开店页", 0 /* PAGE */),
        /**
        * 页面_提交成功页
        */
        page_status: createWebUrlItem(PagePath + "/status", "提交成功页", 0 /* PAGE */),
        /**
        * 页面_引导页面
        */
        page_introduction: createWebUrlItem(PagePath + "/introduction", "引导页面", 0 /* PAGE */),
        /**
        * 页面_店铺基础信息页
        */
        page_base: createWebUrlItem(PagePath + "/base", "店铺基础信息页", 0 /* PAGE */),
        /**
        * 页面_商家详情页
        */
        page_details: createWebUrlItem(PagePath + "/details", "商家详情页", 0 /* PAGE */),
        /**
        * 页面_KNB接口测试页
        */
        page_knbtest: createWebUrlItem(PagePath + "/knbtest", "KNB接口测试页", 0 /* PAGE */),
        /**
        * 页面_商品信息页，外卖分类菜品列表页
        */
        page_food: createWebUrlItem(PagePath + "/food", "商品信息页，外卖分类菜品列表页", 0 /* PAGE */),
        /**
        * 页面_我的店铺列表，申请记录页。参数tabIndex为0待处理，1审核中，2已完成
        */
        page_my: createWebUrlItem(PagePath + "/my", "我的店铺列表，申请记录页", 0 /* PAGE */),
        /**
        * 页面_合同预览页面
        */
        page_contract: createWebUrlItem(PagePath + "/contract", "合同预览页面", 0 /* PAGE */),
        /**
        * 页面_商品信息为空页，新建商品页
        */
        page_food_empty: createWebUrlItem(PagePath + "/food_empty", "商品信息为空页，新建商品页", 0 /* PAGE */),
        /**
        * 页面_资质信息页
        */
        page_qualification: createWebUrlItem(PagePath + "/qualification", "资质信息页", 0 /* PAGE */),
        /**
        * 页面_签约认证页面
        */
        page_certification: createWebUrlItem(PagePath + "/certification", "签约认证页面", 0 /* PAGE */),
        /**
        * 页面_vue组件demo页
        */
        page_vuedemo: createWebUrlItem(PagePath + "/vuedemo", "vue组件demo", 0 /* PAGE */)
    };
    /**
     * 创建 一个URL对象，使用泛型T指定此URL使用的参数对象结构，使用泛型U指定此接口的返回值类型
     *
     * @template T 泛型T为url的输入参数对象
     * @template U 泛型U为url的返回值对象
     * @param {string} path 实际url地址
     * @param {string} des url的描述
     * @param {urlMethodType} type url请求方式的类型
     * @returns {kdm.WebUrlItem<T, U>} (description)
     */
    function createWebUrlItem(path, des, type) {
        if (des === void 0) { des = ""; }
        if (type === void 0) { type = 1 /* GET */; }
        var obj = {};
        var noop = function () { };
        obj.path = path;
        obj.url = location.protocol + "//" + location.host + path;
        obj.des = des;
        obj.type = type;
        obj.goto = function (data) {
            return gotoUrl(path, data);
        };
        obj.get = function (data, callback) {
            var pathQuery = [];
            for (var _i = 2; _i < arguments.length; _i++) {
                pathQuery[_i - 2] = arguments[_i];
            }
            return obj.ajax.apply(obj, [{
                    type: "get",
                    data: data,
                    success: callback
                }].concat(pathQuery));
        };
        obj.post = function (data, callback) {
            var pathQuery = [];
            for (var _i = 2; _i < arguments.length; _i++) {
                pathQuery[_i - 2] = arguments[_i];
            }
            return obj.ajax.apply(obj, [{
                    type: "post",
                    data: data,
                    success: callback
                }].concat(pathQuery));
        };
        obj.ajax = function (config) {
            var pathQuery = [];
            for (var _i = 1; _i < arguments.length; _i++) {
                pathQuery[_i - 1] = arguments[_i];
            }
            var timerId = null;
            var newPath = stringFormat.apply(this, [path].concat(pathQuery));
            config = $.extend(true, {
                url: newPath,
                type: "get",
                data: {},
                dataType: "json",
                cache: false
            }, config);
            //如果要提交的数据是字符串，同时可以被解析成json对象，那么增加contentType属性为json（默认为formdata）
            if (typeof config.data === "string") {
                try {
                    var tmp = JSON.parse(config.data);
                    config.contentType = "application/json; charset=utf-8";
                }
                catch (ex) {
                }
            }
            funHook(config, "beforeSend", function (xhr, settings) {
                //请求发送前显示“加载中...”弹出框
                //修改SUI框架的加载框由$.showIndicator为$.showPreloader
                //虽然$.showPreloader更为重量级，优点是可以跨page（页面）显示
                //同时增加显示延迟，若超过一定时间请求仍然未返回再显示加载框
                // console.log("ajax beforeSend:", xhr, settings);
                timerId = setTimeout(function () {
                    $.showPreloader();
                }, 500);
                return true; //zepto新增必须返回bool
            });
            funHook(config, "error", function (xhr, errorType, error) {
                // console.log("ajax error:", xhr, errorType, error, xhr.getAllResponseHeaders());
                clearTimeout(timerId);
                $.hidePreloader();
                onErr(null, obj.des);
            });
            funHook(config, "success", function (data, status, xhr) {
                // console.log("ajax success:", data, status, xhr, xhr.getAllResponseHeaders());
                clearTimeout(timerId);
                $.hidePreloader();
                //返回false，阻止业务页面默认success函数执行
                if (data == null) {
                    onErr(data, obj.des);
                    return false;
                }
                if (data.code != 0) {
                    onErr(data, obj.des);
                    return false;
                }
                // if ((<any>data).data == null) { onErr(data, obj.des); return false; }//某些接口的data为null但也是正确的
            });
            return $.ajax(config);
        };
        /**
         * 字符串格式化
         * @param {string} str 含格式替换符的字符串
         * @param {any[]} args 要被替换的对象
         * 举例: /tast/{0}/{1},[123,456] => /task/123/456
         */
        function stringFormat(str) {
            var args = [];
            for (var _i = 1; _i < arguments.length; _i++) {
                args[_i - 1] = arguments[_i];
            }
            if (arguments.length == 0) {
                return null;
            }
            else if (args.length == 0) {
                return str;
            }
            for (var i = 0; i < args.length; i++) {
                var re = new RegExp('\\{' + i + '\\}', 'gm');
                str = str.replace(re, args[i]);
            }
            return str;
        }
        ;
        /**
         * 挂载函数钩子
         *
         * @param {ZeptoAjaxSettings} cfg ajax的setting对象
         * @param {string} hookFnName 要挂钩子的函数名称
         * @param {Function} newBeforeFn 要在原始函数之前执行的函数,若返回false则阻止原始函数执行
         * @param {Function} newAfterFn 要在原始函数之后执行的函数,返回任意值则替换原始函数返回值，若不返回则直接返回原始函数返回值
         * @returns {Function} 返回新组装的被替换的函数
         */
        function funHook(cfg, hookFnName, newBeforeFn, newAfterFn) {
            if (newAfterFn === void 0) { newAfterFn = function () { }; }
            var oldFn = cfg[hookFnName];
            if (!(oldFn instanceof Function)) {
                oldFn = function () { };
            }
            return cfg[hookFnName] = function () {
                var newBeforeReturn = newBeforeFn.apply(this, [].slice.call(arguments));
                if (newBeforeReturn === false) {
                    return;
                }
                var oldReturn = oldFn.apply(this, [].slice.call(arguments));
                var newAfterReturn = newAfterFn.apply(this, [].slice.call(arguments).concat(oldReturn));
                if (newAfterReturn === undefined) {
                    return oldReturn;
                }
                else {
                    return newAfterReturn;
                }
            };
        }
        /**
         * 当发生错误时弹出提示框显示错误原因
         *
         * @param {serverBase<any>} [data=null] 服务器返回的数据
         * @param {string} [des=""] 接口的描述信息
         */
        function onErr(data, des) {
            if (data === void 0) { data = null; }
            if (des === void 0) { des = ""; }
            var info = "";
            des = des || "服务器接口";
            if (data != null) {
                info = data.msg || "未知错误";
            }
            else {
                info = "网络操作失败";
            }
            $.alert(des + "" + info, "失败");
            console.error(data, obj);
            return false;
        }
        return obj;
    }
    /**
     * 页面跳转
     * @param {string} dstUrl 目标地址，完整路径
     * @param {any = {}} queryObj 参数对象(中文不要手动编码)
     */
    function gotoUrl(dstUrl, queryObj) {
        if (queryObj === void 0) { queryObj = {}; }
        var url = dstUrl;
        var queryArr = [];
        var queryStr = "";
        if ($.isPlainObject(queryObj)) {
            $.each(queryObj, function (name, val) {
                queryArr.push({ name: name, val: val });
                return true; //zepto新增必须返回bool
            });
            queryStr = $.map(queryArr, function (o, i) {
                if (o.val === null || o.val === undefined) {
                    return null;
                }
                else {
                    return encodeURIComponent(o.name) + "=" + encodeURIComponent(String(o.val)); //必须编码
                }
            }).join("&");
            if (queryStr.length > 0) {
                queryStr = "?" + queryStr;
            }
            url += queryStr;
        }
        //重写所有页面跳转(3/3)
        if (MT && typeof MT.goto == "function") {
            MT.goto(url);
        }
        else {
            window.location.href = url;
        }
    }
})(kdm || (kdm = {}));
requirejs.config({
    baseUrl: MT.STATIC_ROOT + '/javascripts'
});
define([], function () {
    return kdm.weburls;
});
// enum restfulUrlEnum {
//     /**
//      * 自入驻任务id，注：非电销工单id {number}
//      */
//     taskId,
//     /**
//      * 商家名称 {string}
//      */
//     shopName,
//     /**
//      * 商家品类 {number}
//      */
//     tagId,
//     /**
//      * 创建时间 unix时间戳 {number}
//      */
//     ctime,
//     /**
//      * 商家商标图 {string}
//      */
//     shopLogoUrl,
//     /**
//      * 商家位置省份名称 {string}
//      */
//     provinceName,
//     /**
//      * 商家位置省份id {number}
//      */
//     provinceId,
//     /**
//      * 商家位置城市名称 {string}
//      */
//     cityName,
//     /**
//      * 商家位置城市id {number}
//      */
//     cityId,
//     /**
//      * 商家位置县名称 {string}
//      */
//     countyName,
//     /**
//      * 商家位置县id {number}
//      */
//     countyId,
//     /**
//      * 商家详细地址 {string}
//      */
//     address,
//     /**
//      * 商家联系人姓名 {string}
//      */
//     contractName,
//     /**
//      * 商家联系方式 {string}
//      */
//     contractTel,
//     /**
//      * 百度地图坐标系，纬度乘以1,000,000的结果 {number}
//      */
//     latitude,
//     /**
//      * 百度地图坐标系，经度乘以1,000,000的结果 {number}
//      */
//     longitude,
//     /**
//      * 商家门脸图 {string}
//      */
//     shopFrontUrl,
//     /**
//      * 商家环境图 {string}
//      */
//     environmentalUrl,
// }
// class restfulUrlClass {
//     /**
//      * 自入驻任务id，注：非电销工单id
//      * 
//      * @type {number}
//      */
//     static taskId: string = "taskId";
//     /**
//      * 商家名称
//      * 
//      * @type {string}
//      */
//     static shopName: string = "shopName";
//     /**
//      * 商家品类
//      * 
//      * @type {number}
//      */
//     static tagId: string = "tagId";
//     /**
//      * 创建时间 unix时间戳
//      * 
//      * @type {number}
//      */
//     static ctime: string = "ctime";
//     /**
//      * 商家商标图
//      * 
//      * @type {string}
//      */
//     static shopLogoUrl: string = "shopLogoUrl";
//     /**
//      * 商家位置省份名称
//      * 
//      * @type {string}
//      */
//     static provinceName: string = "provinceName";
//     /**
//      * 商家位置省份id
//      * 
//      * @type {number}
//      */
//     static provinceId: string = "provinceId";
//     /**
//      * 商家位置城市名称
//      * 
//      * @type {string}
//      */
//     static cityName: string = "cityName";
//     /**
//      * 商家位置城市id
//      * 
//      * @type {number}
//      */
//     static cityId: string = "cityId";
//     /**
//      * 商家位置县名称
//      * 
//      * @type {string}
//      */
//     static countyName: string = "countyName";
//     /**
//      * 商家位置县id
//      * 
//      * @type {number}
//      */
//     static countyId: string = "countyId";
//     /**
//      * 商家详细地址
//      * 
//      * @type {string}
//      */
//     static address: string = "address";
//     /**
//      * 商家联系人姓名
//      * 
//      * @type {string}
//      */
//     static contractName: string = "contractName";
//     /**
//      * 商家联系方式
//      * 
//      * @type {string}
//      */
//     static contractTel: string = "contractTel";
//     /**
//      * 百度地图坐标系，纬度乘以1,000,000的结果
//      * 
//      * @type {number}
//      */
//     static latitude: string = "latitude";
//     /**
//      * 百度地图坐标系，经度乘以1,000,000的结果
//      * 
//      * @type {number}
//      */
//     static longitude: string = "longitude";
//     /**
//      * 商家门脸图
//      * 
//      * @type {string}
//      */
//     static shopFrontUrl: string = "shopFrontUrl";
//     /**
//      * 商家环境图
//      * 
//      * @type {string}
//      */
//     static environmentalUrl: string = "environmentalUrl";
// }
// interface restfulUrlInterface {
//     /**
//      * 自入驻任务id，注：非电销工单id
//      */
//     taskId: number;
//     /**
//      * 商家名称
//      */
//     shopName?: string;
//     /**
//      * 商家品类
//      */
//     tagId?: number;
//     /**
//      * 创建时间 unix时间戳
//      */
//     ctime?: number;
//     /**
//      * 商家商标图
//      */
//     shopLogoUrl?: string;
//     /**
//      * 商家位置省份名称
//      */
//     provinceName?: string;
//     /**
//      * 商家位置省份id
//      */
//     provinceId?: number;
//     /**
//      * 商家位置城市名称
//      */
//     cityName?: string;
//     /**
//      * 商家位置城市id
//      */
//     cityId?: number;
//     /**
//      * 商家位置县名称
//      */
//     countyName?: string;
//     /**
//      * 商家位置县id
//      */
//     countyId?: number;
//     /**
//      * 商家详细地址
//      */
//     address?: string;
//     /**
//      * 商家联系人姓名
//      */
//     contractName?: string;
//     /**
//      * 商家联系方式
//      */
//     contractTel?: string;
//     /**
//      * 百度地图坐标系，纬度乘以1,000,000的结果
//      */
//     latitude?: number;
//     /**
//      * 百度地图坐标系，经度乘以1,000,000的结果
//      */
//     longitude?: number;
//     /**
//      * 商家门脸图
//      */
//     shopFrontUrl?: string;
//     /**
//      * 商家环境图
//      */
//     environmentalUrl?: string;
// }
// var restfulUrlDic = {
//     /**
//      * 自入驻任务id，注：非电销工单id
//      */
//     taskId: "taskId",
//     /**
//      * 商家名称
//      */
//     shopName: "shopName",
//     /**
//      * 商家品类
//      */
//     tagId: "tagId",
//     /**
//      * 创建时间 unix时间戳
//      */
//     ctime: "ctime",
//     /**
//      * 商家商标图
//      */
//     shopLogoUrl: "shopLogoUrl",
//     /**
//      * 商家位置省份名称
//      */
//     provinceName: "provinceName",
//     /**
//      * 商家位置省份id
//      */
//     provinceId: "provinceId",
//     /**
//      * 商家位置城市名称
//      */
//     cityName: "cityName",
//     /**
//      * 商家位置城市id
//      */
//     cityId: "cityId",
//     /**
//      * 商家位置县名称
//      */
//     countyName: "countyName",
//     /**
//      * 商家位置县id
//      */
//     countyId: "countyId",
//     /**
//      * 商家详细地址
//      */
//     address: "address",
//     /**
//      * 商家联系人姓名
//      */
//     contractName: "contractName",
//     /**
//      * 商家联系方式
//      */
//     contractTel: "contractTel",
//     /**
//      * 百度地图坐标系，纬度乘以1,000,000的结果
//      */
//     latitude: "latitude",
//     /**
//      * 百度地图坐标系，经度乘以1,000,000的结果
//      */
//     longitude: "longitude",
//     /**
//      * 商家门脸图
//      */
//     shopFrontUrl: "shopFrontUrl",
//     /**
//      * 商家环境图
//      */
//     environmentalUrl: "environmentalUrl",
// }
// var arrEnum: { [index: number]: restfulUrlEnum };
// arrEnum = [restfulUrlEnum.address, restfulUrlEnum.latitude];
// var arrClass: { [index: number]: restfulUrlClass };
// arrClass = [];
// var arrInterface: { [index: number]: restfulUrlInterface };
// arrInterface = [];
// type restfulUrlType =
//     /**
//      * 自入驻任务id，注：非电销工单id
//      */
//     "taskId" |
//     /**
//      * 商家名称
//      */
//     "shopName" |
//     /**
//      * 商家品类
//      */
//     "tagId" |
//     /**
//      * 创建时间 unix时间戳
//      */
//     "ctime" |
//     /**
//      * 商家商标图
//      */
//     "shopLogoUrl" |
//     /**
//      * 商家位置省份名称
//      */
//     "provinceName" |
//     /**
//      * 商家位置省份id
//      */
//     "provinceId" |
//     /**
//      * 商家位置城市名称
//      */
//     "cityName" |
//     /**
//      * 商家位置城市id
//      */
//     "cityId" |
//     /**
//      * 商家位置县名称
//      */
//     "countyName" |
//     /**
//      * 商家位置县id
//      */
//     "countyId" |
//     /**
//      * 商家详细地址
//      */
//     "address" |
//     /**
//      * 商家联系人姓名
//      */
//     "contractName" |
//     /**
//      * 商家联系方式
//      */
//     "contractTel" |
//     /**
//      * 百度地图坐标系，纬度乘以1,000,000的结果
//      */
//     "latitude" |
//     /**
//      * 百度地图坐标系，经度乘以1,000,000的结果
//      */
//     "longitude" |
//     /**
//      * 商家门脸图
//      */
//     "shopFrontUrl" |
//     /**
//      * 商家环境图
//      */
//     "environmentalUrl";
// function get(arr: restfulUrlType[], ...a) {
// }
// get(["environmentalUrl"], function (d) {
// }) 
//# sourceMappingURL=weburls.js.map