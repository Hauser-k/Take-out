var kdm;
(function (kdm) {
    /**
     * 某一种校验类型，如不能为空，长度不超过n等
     *
     * @export
     * @class validateType
     * @template T
     */
    var validateType = (function () {
        function validateType(msg, valiFn) {
            this.msg = msg;
            this.valiFn = valiFn;
        }
        /**
         * 执行校验
         *
         * @param {T} vconfig (description)
         * @param {*} val (description)
         * @returns (description)
         */
        validateType.prototype.vali = function (vconfig, val) {
            return this.valiFn(vconfig, val);
        };
        return validateType;
    }());
    kdm.validateType = validateType;
    /**
     * 表单校验组件
     *
     * @export
     * @class validate
     */
    var validate = (function () {
        /**
         * 实例化一个表单校验组件对象
         *
         * @param {validateConfig} cfg 配置对象
         */
        function validate(cfg) {
            /**
             * 配置对象
             *
             * @type {validateConfig}
             */
            this.config = null;
            /**
             * 表单校验组件的显示错误信息的dom元素
             *
             * @type {ZeptoCollection}
             */
            this.element = null;
            /**
             * 要获取检验值的目标元素，可以是input文本框，也可以是普通dom元素，或是一个函数
             *
             * @type {ZeptoCollection}
             */
            this.target = null;
            /**
             * 储存要校验的校验类型对象的数组
             *
             * @private
             * @type {validateItem<any>[]}
             */
            this.vdItems = [];
            var noop = function () { };
            var def = {
                element: $("<span>").addClass("validate"),
                target: null,
                isBlurValidate: true,
                isChangeValidate: true,
                title: "",
                onValidate: noop,
                onComplete: noop,
                onMessage: noop,
                onGetValidateData: noop,
                onMessageHide: noop
            };
            this.config = $.extend(true, def, cfg);
            //解决zepto在深拷贝时导致的zepto对象原型丢失而导致的isZ判断失败
            if (cfg.target != undefined)
                def.target = cfg.target;
            if (cfg.element != undefined)
                def.element = cfg.element;
            //检测当前DOM对象是否已经被validate初始化过一次
            var vd = this.config.target.data("validate");
            if (vd instanceof validate) {
                // console.warn("validate已经被初始化过,不再重新实例化组件");
                return vd;
            }
            this.create();
            this.setValidateItem();
            this.bind();
            this.target.data("validate", this);
            this.element.data("validate", this);
        }
        /**
         * 创建校验组件的DOM对象
         *
         * @private
         */
        validate.prototype.create = function () {
            this.element = this.config.element;
            this.target = this.config.target;
            if (!this.isZepto(this.element)) {
                throw new Error("element need zepto or jquery");
            }
            if (this.target != null && !this.isZepto(this.target) && typeof this.target != "function") {
                throw new Error("target element need zepto or jquery or function");
            }
            //todo 增加对非表单项，如右箭头选择项的校验
        };
        /**
         * 注册绑定校验组件的事件
         *
         * @private
         * @returns {void} (description)
         */
        validate.prototype.bind = function () {
            var _this = this;
            if (this.target == null) {
                return;
            }
            //如果目标元素不是zepto对象则不绑定任何事件
            if (this.isZepto != null && !this.isZepto(this.target) && typeof this.target != "function") {
                return;
            }
            //光标移出立即校验
            if (this.config.isBlurValidate == true) {
                this.target.bind("blur", blurChangeEvent.bind(this));
            }
            //input变更change校验
            if (this.config.isChangeValidate == true) {
                this.target.bind("change", blurChangeEvent.bind(this));
            }
            //光标置入焦点后隐藏错误信息
            this.target.bind("focus", function (e) {
                if (_this.target.get(0).tagName.toLocaleLowerCase() == "input" || _this.target.get(0).tagName.toLocaleLowerCase() == "select") {
                    //如果目标是Input则隐藏错误信息对象
                    _this.hide();
                }
            });
            function blurChangeEvent(e) {
                var val;
                if (this.target.get(0).tagName.toLocaleLowerCase() == "input" || this.target.get(0).tagName.toLocaleLowerCase() == "select") {
                    //所有文本输入框光标移出后自动trim
                    this.target.val($.trim(this.target.val()));
                    //如果目标是Input或者select则取出val值
                    val = this.target.val();
                }
                else {
                    //如果不是则取出其text值
                    val = this.target.text();
                }
                // console.log(val);
                this.validate(val);
            }
        };
        /**
         * 从target目标元素上读取validate属性，生成校验类型对象
         *
         * @private
         * @returns {void} (description)
         */
        validate.prototype.setValidateItem = function () {
            if (this.target == null) {
                return;
            }
            var vdstr = this.getAttr(this.target, "validate");
            if (vdstr == undefined || vdstr.length == 0) {
                throw new Error("target element validate attrib error");
            }
            vdstr = vdstr.replace(/^\s+|\s+$/g, "");
            this.target.attr("validate", vdstr);
            var result;
            var reg = /([$_\w\d_]+)=?([^,=]*)(?:,$)?/g;
            while ((result = reg.exec(vdstr)) != null) {
                var match = result[0];
                var vtype = result[1];
                var vconfig = result[2];
                if (kdm.validate.validateTypes[vtype] == undefined) {
                    continue;
                }
                var vdItem = kdm.validate.validateTypes[vtype];
                this.vdItems.push(this.createValidateTypeConfigItem(vdItem, vconfig));
            }
        };
        /**
         * 生成校验类型及配置值的字典
         *
         * @private
         * @param {validateType<any>} vdtypeitem (description)
         * @param {*} vdconfig (description)
         * @returns {validateTypeConfig} (description)
         */
        validate.prototype.createValidateTypeConfigItem = function (vdtypeitem, vdconfig) {
            return {
                vdType: vdtypeitem,
                vdConfig: vdconfig
            };
        };
        /**
         * 当校验失败后，设定错误信息
         *
         * @private
         * @param {validateType<any>} vdType 校验失败的校验规则
         * @param {*} vdConfig 当前校验规则的配置值
         * @param {*} vdData 被校验的数据
         */
        validate.prototype.setError = function (vdType, vdConfig, vdData) {
            //格式化字符串
            var errstr = this.stringFormat(vdType.msg, this.config.title, vdConfig, vdData);
            //触发用户注册事件
            var userResult = this.config.onMessage.call(this, errstr, false, vdType, vdConfig, vdData);
            //若返回字符串则替换默认要显示的信息字符串
            if (typeof userResult === "string") {
                errstr = userResult;
            }
            this.setErrorText(errstr);
        };
        /**
         * 设置错误信息并显示
         *
         * @param {string} msg (description)
         */
        validate.prototype.setErrorText = function (msg) {
            this.element.text(msg).show();
            //自入驻PC的袋鼠UI框架使用的样式
            if (!!$.fn.layout) {
                this.element.parent().addClass("has-error");
            }
        };
        /**
         * 删除错误信息并隐藏
         */
        validate.prototype.hide = function () {
            this.element.text("").hide();
            if (typeof this.config.onMessageHide == "function") {
                this.config.onMessageHide.call(this);
            }
            //自入驻PC的袋鼠UI框架使用的样式
            if (!!$.fn.layout) {
                this.element.parent().removeClass("has-error");
            }
        };
        /**
         * 开始校验当前设定的所有校验项
         *
         * @param {(string | any)} [vdData] 要校验的数据，若不传则校验当前设定目标元素对象的内容
         * @returns {boolean} (description)
         */
        validate.prototype.validate = function (vdData) {
            var _this = this;
            var result = true;
            if (arguments.length == 0) {
                if (this.target == null) {
                    throw new Error("need validate Data");
                }
                else if (this.isZepto != null && !this.isZepto(this.target) && typeof this.target != "function") {
                    throw new Error("target element error");
                }
                else if (typeof this.target === "function") {
                    vdData = this.target();
                }
                else if (this.target.get(0).tagName.toLocaleLowerCase() === "input" || this.target.get(0).tagName.toLocaleLowerCase() == "select") {
                    vdData = $.trim(this.target.val()); //增加所有文本输入框均按照trim后的数值校验
                }
                else {
                    vdData = $.trim(this.target.text());
                }
            }
            //触发可重写要校验数据的事件
            var tmpVdData = this.config.onGetValidateData.call(this, vdData);
            if (tmpVdData !== null && tmpVdData !== undefined) {
                vdData = tmpVdData;
            }
            //遍历用户设定的所有校验规则，并一次校验
            $.each(this.vdItems, function (i, vdTypeCfg) {
                var vdtype = vdTypeCfg.vdType;
                var vdconfig = vdTypeCfg.vdConfig;
                //执行设定的具体某个校验规则
                var itemResult = vdtype.vali(vdconfig, vdData);
                //触发用户注册事件
                var userResult = _this.config.onValidate.call(_this, itemResult, vdtype, vdconfig, vdData);
                //如果用户事件返回bool值则修改默认的校验结果
                if (typeof userResult === "boolean") {
                    itemResult = userResult;
                }
                //如果有一条校验失败，则退出循环，并设定错误信息
                if (itemResult === false) {
                    result = false;
                    _this.setError(vdtype, vdconfig, vdData);
                    // var errstr = this.stringFormat(vdtype.msg, this.config.title, vdconfig);
                    // this.setErrorText(errstr);
                    return false;
                }
            });
            if (result === true) {
                this.hide();
            }
            this.config.onComplete.call(this, result, vdData);
            return result;
        };
        /**
         * 字符串格式化
         * @param {string} str 含格式替换符的字符串
         * @param {any[]} args 要被替换的对象
         */
        validate.prototype.stringFormat = function (str) {
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
        };
        ;
        /**
         * 获取当前元素的属性，用于解决zepto框架的attr方法的坑！！
         *
         * @private
         * @param {ZeptoCollection} ele 要获取属性的元素
         * @param {string} attr 要获取的属性名称
         * @returns {string} (description)
         */
        validate.prototype.getAttr = function (ele, attr) {
            var e = ele.get(0);
            var attrs = e.attributes;
            if (attrs == undefined) {
                return "";
            }
            else if (attrs[attr] == undefined) {
                return "";
            }
            else {
                return attrs[attr].value;
            }
        };
        /**
         * 返回当前对象是否为Zepto对象
         *
         * @private
         * @param {*} ele (description)
         * @returns (description)
         */
        validate.prototype.isZepto = function (ele) {
            if ("Zepto" in window) {
                return Zepto.zepto.isZ(ele);
            }
            else if ("jQuery" in window) {
                return ele instanceof window.jQuery;
            }
            else {
                throw new Error("need Zepto or jQuery");
            }
        };
        //============静态方法==================
        /**
         * 扫描当前页面的所有含有validate属性的input元素，自动为其生成validate对象
         * 可传回调函数，来自己实例化validate对象，或是返回false来阻止创建当前对象的操作
         *
         * @static
         * @param {((defOpt?: validateConfig, ele?: Element) => validate | any)} [callbak] (description)
         * @returns {validate[]} (description)
         */
        validate.scan = function (callbak) {
            var vds = [];
            $("[validate]").each(function (i, ipt) {
                var $ipt = $(ipt);
                var title = 
                //移动端SUI的DOM结构
                $ipt.closest(".item-content").find(".item-title").text() ||
                    //PC端袋鼠UI的DOM结构
                    ($ipt.closest(".form-group").find(".control-label").eq(0).text() || "").replace(/\*/g, "") ||
                    ($ipt.parent().parent().find(".control-label").eq(0).text() || "").replace(/\*/g, "");
                var defConfig = {
                    target: $ipt,
                    title: title || "当前项"
                };
                var result = (typeof callbak === "function") ? callbak(defConfig, ipt) : null;
                var vd = null;
                //触发用户回调函数
                if (result instanceof validate) {
                    vd = result; //若函数返回validate实例化对象则替换默认的。
                }
                else if (result === false) {
                    return true; //若函数返回false则忽略创建当前validate对象
                }
                else {
                    vd = new kdm.validate(defConfig); //否则执行实例化操作
                }
                //如果表单后方紧邻着单位元素（.item-tail）则追加到单位元素后方
                if ($ipt.next().hasClass("item-tail")) {
                    $ipt.next().after(vd.element);
                }
                else {
                    $ipt.after(vd.element);
                }
                // $ipt.data("validate", vd);
                vds.push(vd);
            });
            return vds;
        };
        /**
         * 批量校验所有表单项
         *
         * @static
         * @param {validate[]} vds 校验组件数组
         * @param {boolean} isAll 是否强制校验全部组件，默认为false，即遇到有一个错误即停止继续校验其他组件
         * @returns {boolean} (description)
         */
        validate.validateBatch = function (vds, isAll) {
            if (isAll === void 0) { isAll = false; }
            for (var i = 0; i < vds.length; i++) {
                var res = vds[i].validate();
                if (res === false && isAll == false) {
                    return false;
                }
            }
            return true;
        };
        return validate;
    }());
    /**
     * 校验类型集合字典
     */
    validate.validateTypes = {
        /**
         * 长度不能超过某值，配置值为具体数值，单位是“位”
         */
        maxLenNum: new validateType("{0}最多{1}位", function (vconfig, val) {
            var result = true;
            var t = val;
            if (typeof vconfig != "number" && isNaN(Number(vconfig))) {
                throw new Error("validate config need number");
            }
            if (typeof t != "string") {
                t = String(t);
            }
            if (t.length > Number(vconfig)) {
                return false;
            }
            return result;
        }),
        /**
         * 长度不能少于某值，配置值为具体数值，单位是“位”
         */
        minLenNum: new validateType("{0}最少{1}位", function (vconfig, val) {
            var result = true;
            var t = val;
            if (typeof vconfig != "number" && isNaN(Number(vconfig))) {
                throw new Error("validate config need number");
            }
            if (typeof t != "string") {
                t = String(t);
            }
            if (t.length < Number(vconfig)) {
                return false;
            }
            return result;
        }),
        /**
         * 长度不能超过某值，配置值为具体数值
         */
        maxLen: new validateType("{0}最多{1}个字", function (vconfig, val) {
            var result = true;
            var t = val;
            if (typeof vconfig != "number" && isNaN(Number(vconfig))) {
                throw new Error("validate config need number");
            }
            if (typeof t != "string") {
                t = String(t);
            }
            if (t.length > Number(vconfig)) {
                return false;
            }
            return result;
        }),
        /**
         * 长度不能少于某值，配置值为具体数值
         */
        minLen: new validateType("{0}最少{1}个字", function (vconfig, val) {
            var result = true;
            var t = val;
            if (typeof vconfig != "number" && isNaN(Number(vconfig))) {
                throw new Error("validate config need number");
            }
            if (typeof t != "string") {
                t = String(t);
            }
            if (t.length < Number(vconfig)) {
                return false;
            }
            return result;
        }),
        /**
         * 必须全部为数字(0-9),无配置值
         */
        number: new validateType("{0}必须全部为数字", function (vconfig, val) {
            var result = true;
            var t = val;
            if (val === null || val === undefined) {
                return false;
            }
            else if (typeof val == "string" && val.length == 0) {
                return false;
            }
            else {
                t = String(t);
                if (t.match(/[^\d]/g) != null) {
                    return false;
                }
            }
            return result;
        }),
        /**
         * 必须全部为数字(0-9)和空格,无配置值
         */
        bankAccount: new validateType("{0}必须全部为数字", function (vconfig, val) {
            var result = true;
            var t = val;
            if (val === null || val === undefined) {
                return false;
            }
            else if (typeof val == "string" && val.length == 0) {
                return false;
            }
            else {
                t = String(t);
                /**
                 *  另外一种更严格的正则
                 *  /^((\d{4}) )+\d{1,4} *$/
                 *  1233 3333 12
                 */
                if (t.match(/[^\d ]/g) != null) {
                    return false;
                }
            }
            return result;
        }),
        /**
         * 只能为数字、字母,无配置值
         */
        numberAndLetter: new validateType("{0}只能为数字、字母", function (vconfig, val) {
            var result = true;
            var reg = /^[A-Za-z0-9]{1,}$/g;
            var t = val;
            if (val === null || val === undefined) {
                return false;
            }
            else if (typeof val == "string" && val.length == 0) {
                return false;
            }
            else if (!reg.test(t)) {
                return false;
            }
            return result;
        }),
        /**
         * 只含有汉字、数字、字母、下划线,无配置值
         */
        noSpecialCode: new validateType("{0}不能有特殊字符", function (vconfig, val) {
            var result = true;
            var reg = /^[a-zA-Z0-9_\u4e00-\u9fa5]+$/g;
            var t = val;
            if (val === null || val === undefined) {
                return false;
            }
            else if (typeof val == "string" && val.length == 0) {
                return false;
            }
            else if (!reg.test(t)) {
                return false;
            }
            return result;
        }),
        /**
         * 不能含有表情符号
         */
        noEmojiCode: new validateType("{0}不能有表情符号", function (vconfig, val) {
            var result = true;
            var replaced = "";
            var ranges = [
                //原有方案：
                // '\ud83c[\udf00-\udfff]',
                // '\ud83d[\udc00-\ude4f]',
                // '\ud83d[\ude80-\udeff]'
                //粗暴方案：-jicanghai 2016年12月21日
                '\ud83c[\ud000-\udfff]',
                '\ud83d[\ud000-\udfff]'
            ];
            replaced = val.replace(new RegExp(ranges.join('|'), 'g'), '');
            if (replaced.length !== val.length) {
                result = false;
            }
            else {
                result = true;
            }
            return result;
        }),
        /**
         * 校验手机号码,无配置值
         */
        phonenumber: new validateType("{0}格式不正确", function (vconfig, val) {
            var reg = /^(?:13\d|14\d|15\d|17\d|18\d)\d{8}$/;
            var t = String(val);
            if (!reg.test(t)) {
                return false;
            }
            else {
                return true;
            }
        }),
        /**
         * 必须为合法数值(允许负数，小数点等，不能为NaN),无配置值
         */
        numeric: new validateType("{0}必须为合法数值", function (vconfig, val) {
            var result = true;
            var t = val;
            if (val === null || val === undefined) {
                return false;
            }
            else if (typeof val == "string" && val.length == 0) {
                return false;
            }
            else if (isNaN(Number(val)) || !isFinite(Number(val))) {
                return false;
            }
            else if (Number(t) * 0 !== 0) {
                return false;
            }
            // return result;
        }),
        /**
         * 必须为数值类型且允许保留两位小数
         */
        decimalMaxLength: new validateType("{0}最多{1}位小数", function (vconfig, val) {
            var t = String(val);
            var reg = new RegExp("^\\d+(\\.\\d{0," + vconfig + "})?$", "g");
            if (!reg.test(t)) {
                return false;
            }
            else {
                return true;
            }
        }),
        /**
         * 最大不超过某值
         */
        maxVal: new validateType("{0}最大不超过{1}", function (vconfig, val) {
            var result = true;
            var t = val;
            if (Number(t) > Number(vconfig)) {
                return false; //超过最大限制值
            }
            else {
                return true;
            }
        }),
        /**
         * 最小不小于某值
         */
        minVal: new validateType("{0}不能小于{1}", function (vconfig, val) {
            var result = true;
            var t = val;
            if (Number(t) < Number(vconfig)) {
                return false; //小于最小限制值
            }
            else {
                return true;
            }
        }),
        /**
         * 必须为正整数,不能为0（n>0）,无配置值
         */
        positive: new validateType("{0}必须为正整数", function (vconfig, val) {
            var result = true;
            var t = Number(val);
            if (val === null || val === undefined) {
                return false;
            }
            else if (typeof val == "string" && val.length == 0) {
                return false;
            }
            else if (isNaN(Number(val)) || !isFinite(Number(val))) {
                return false;
            }
            else if (t * 0 !== 0) {
                return false; //是否合法数值
            }
            else if (t - t % 1 !== t) {
                return false; //是否有小数点
            }
            else {
                return t > 0;
            }
        }),
        /**
         * 必须为正整数,可为0（n>=0）,无配置值
         */
        positiveZero: new validateType("{0}必须为正整数", function (vconfig, val) {
            //todo 跟positive校验类型99%相似，需修改
            var result = true;
            var t = Number(val);
            if (val === null || val === undefined) {
                return false;
            }
            else if (typeof val == "string" && val.length == 0) {
                return false;
            }
            else if (isNaN(Number(val)) || !isFinite(Number(val))) {
                return false;
            }
            else if (t * 0 !== 0) {
                return false; //是否合法数值
            }
            else if (t - t % 1 !== t) {
                return false; //是否有小数点
            }
            else {
                return t >= 0;
            }
        }),
        /**
         * 必须为某值，配置值为需要等于的某值
         */
        equal: new validateType("{0}不正确", function (vconfig, val) {
            var result = true;
            var t = val;
            if (typeof vconfig === typeof t) {
                return t === vconfig;
            }
            else {
                //如果类型不一致按照字符串去校验
                return String(t) === String(vconfig);
            }
            // return result;
        }),
        /**
         * 必须为有效日期格式，无配置项
         */
        date: new validateType("{0}不正确", function (vconfig, val) {
            var result = true;
            var t = val;
            if (t == null)
                return false;
            if (String(t).length == 0)
                return false;
            var d = new Date(t);
            if (Object.prototype.toString.call(d) === "[object Date]") {
                if (isNaN(d.getTime())) {
                    return false;
                }
                else {
                    return true;
                }
            }
            else {
                return false;
            }
        }),
        //--------反向匹配（not...）---------
        /**
         * 不能为空，无配置值
         */
        notEmpty: new validateType("请填写{0}", function (vconfig, val) {
            var result = true;
            var t = val;
            if (val === null || val === undefined) {
                return false;
            }
            else if (typeof val == "string" && val.length == 0) {
                return false;
            }
            return result;
        }),
        /**
         * 必须不能为某值，配置值为需要不相等的某值
         */
        notEqual: new validateType("{0}不正确", function (vconfig, val) {
            var result = true;
            var t = val;
            //去除可能的两侧单双引号
            t = t.replace(/^['"](.*)['"]$/g, '');
            if (typeof vconfig === typeof t) {
                return t !== vconfig;
            }
            else {
                //如果类型不一致按照字符串去校验
                return String(t) !== String(vconfig);
            }
            // return result;
        }),
        /**
         * 不能以什么结尾 例如  路|道|街
         */
        notEndWithOptions: new validateType("{0}不能以{1}结尾", function (vconfig, val) {
            var result = true;
            // 路|道|街
            // var keyword = vconfig.split('|') ; 
            var reg = new RegExp("(" + vconfig + ")$", "g");
            var t = val;
            if (val === null || val === undefined) {
                return false;
            }
            else if (typeof val == "string" && val.length == 0) {
                return false;
            }
            else if (reg.test(t)) {
                return false;
            }
            return result;
        }),
        /**
         * 非必填url规则
         * http:// 不是必须的
         * 下面是更严格的正则
         * /^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i
         */
        url: new validateType("{0}不是合法的url", function (vconfig, val) {
            var result = false;
            var reg = /(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?/i;
            var t = val;
            if (val === null || val === undefined) {
                return true;
            }
            else if (typeof val == "string" && val.length == 0) {
                // 不是非必填
                return true;
            }
            else if (reg.test(t)) {
                return true;
            }
            return result;
        })
    };
    kdm.validate = validate;
})(kdm || (kdm = {}));
requirejs.config({
    baseUrl: MT.STATIC_ROOT + '/javascripts'
});
define([], function () {
    return kdm.validate;
});
//# sourceMappingURL=validate.js.map