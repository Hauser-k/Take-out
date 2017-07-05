var vueModule;
(function (vueModule) {
    /**
     * 【事件】：
     * change : 当select被手动变更时触发
     *
     * value-change : 当value值被修改时触发（包括手动修改，父级联动，外层v-model变更）
     *
     */
    vueModule.autoselectComponent = Vue.extend({
        template: "\n            <select @change=\"onChange\" ref=\"select\" v-show=\"!isHidden\">\n                <option \n                    v-for=\"d in dataSource\" \n                    :value=\"d[value_member]\" \n                    v-text=\"d[display_member]\"\n                    :selected=\"d[value_member] == value\">\n                </option>\n            </select>\n        ",
        data: function () {
            return {
                nextComp: null,
                dataSource: [],
                domSelect: null,
                isHidden: false
            };
        },
        watch: {
            data: function (d) {
                // console.info("watch-data", this._uid, d);
                if (d instanceof Array) {
                    this.setDataSource(d);
                }
            },
            value: function (val) {
                if (this.domSelect.innerHTML.replace(/\s/g, "").length == 0)
                    return;
                if (val == this.value && val == this.domSelect.value)
                    return;
                if (val != this.value || (val == this.value && this.domSelect.value.length > 0)) {
                    // console.info("watch-value", `${this._uid} [${this.domSelect.value}] -> [${val}]`);
                    this.valueChange(val, "value");
                }
            }
        },
        props: {
            nextref: {
                type: String,
                required: false,
                "default": ""
            },
            value: {
                type: [String, Number]
            },
            data: {
                type: Array,
                required: false,
                "default": function () {
                    return [];
                }
            },
            display_member: {
                type: String,
                required: false,
                "default": "text"
            },
            value_member: {
                type: String,
                required: false,
                "default": "value"
            },
            child_member: {
                type: String,
                required: false,
                "default": "child"
            },
            empty_value: {
                type: String,
                required: false,
                "default": "-1"
            },
            unselect_text: {
                type: String,
                required: false,
                "default": ""
            },
            unselect_value: {
                type: String,
                required: false,
                "default": ""
            },
            is_empty_hidden: {
                type: Boolean,
                required: false,
                "default": false
            }
        },
        methods: {
            onChange: function (e) {
                //通过DOM获取实际新value值
                var newVal = this.domSelect.value;
                this.valueChange(newVal, "onChange");
                //对外触发change事件,即触发用户在自定义组件上绑定的change事件
                this.$emit("change", e);
            },
            valueChange: function (val, trigger) {
                var _this = this;
                if (trigger === void 0) { trigger = ""; }
                // console.log("valueChange", `${this._uid} ${trigger}触发 [${this.value}] -> [新值:${val},DOM值:${this.domSelect.value}]`);
                var newOpt = this.getOptionByValue(val);
                var oldOpt = this.getOptionByValue(this.value);
                this.$emit("value-change", newOpt, oldOpt);
                //检测若valueChange由外部调用则修改原生select的value值
                if (this.domSelect.value != val) {
                    this.domSelect.value = val;
                }
                //vue2特殊：修改value，即修改外层v-model的值的方法：向外emit一个input事件 (http://vue.sike.io/v2/guide/components.html#在表单控件上使用自定义事件-Form-Input-Components-using-Custom-Events)
                this.$emit("input", val);
                if (this.nextComp) {
                    var opt = this.dataSource.filter(function (d) { return d[_this.value_member] == val; });
                    if (opt.length > 0) {
                        var arr = opt[0][this.child_member];
                        if (arr instanceof Array && this.nextComp.dataSource != arr) {
                            this.nextComp.setDataSource(arr);
                        }
                    }
                    else {
                        this.nextComp.setDataSource([]);
                    }
                }
            },
            setDataSource: function (d) {
                var _this = this;
                var newVal;
                // console.log("setDataSource", this._uid, d);
                if (!(d instanceof Array))
                    return;
                var json = JSON.stringify(d);
                this.dataSource = JSON.parse(json);
                if (this.dataSource.filter(function (o) { return o[_this.value_member] != _this.unselect_value; }).length == 0 && this.is_empty_hidden) {
                    this.isHidden = true;
                }
                else {
                    this.isHidden = false;
                }
                this.insertUnselectItem();
                var opt = d.filter(function (o) { return o[_this.value_member] == _this.value; });
                if (opt.length > 0) {
                    // console.log("setDataSource", this._uid, "找到已匹配<" + this.value + ">元素", opt[0].name);
                    newVal = this.value;
                }
                else if (this.dataSource.length > 0) {
                    newVal = this.dataSource[0][this.value_member];
                }
                else {
                    newVal = this.empty_value;
                }
                // console.error("dataSource valueChange", this._uid, this.value, newVal, JSON.stringify(d[0]));
                this.valueChange(newVal, "setDataSource");
            },
            getOptionByValue: function (val) {
                var _this = this;
                return this.dataSource.filter(function (d) { return d[_this.value_member] == val; })[0];
            },
            createUnselectItem: function () {
                var obj = {};
                obj[this.display_member] = this.unselect_text;
                obj[this.value_member] = this.unselect_value;
                obj[this.child_member] = [];
                return obj;
            },
            insertUnselectItem: function () {
                var item = this.createUnselectItem();
                //未设定默认选项的不做插入处理
                if (typeof this.unselect_text != "string" || this.unselect_text.length == 0) {
                    return;
                }
                // //数据源为空的不做插入处理
                // if (this.dataSource.length == 0) {
                //     return;
                // }
                //若当前数据源已有默认项的不做重复插入处理
                if (this.dataSource.length > 0 && this.dataSource[0][this.value_member] == this.unselect_value) {
                    return;
                }
                //数据源首部插入默认项
                this.dataSource.unshift(item);
            }
        },
        computed: {},
        created: function () {
            var json = JSON.stringify(this.data);
            this.dataSource = JSON.parse(json);
            this.insertUnselectItem();
        },
        mounted: function () {
            this.domSelect = this.$refs["select"];
            this.domSelect.value = this.value;
            if (typeof this.nextref == "string" && this.nextref.length > 0) {
                this.nextComp = this.$parent.$refs[this.nextref];
            }
        }
    });
})(vueModule || (vueModule = {}));
requirejs.config({
    baseUrl: MT.STATIC_ROOT + '/javascripts'
});
define([], function () {
    return vueModule.autoselectComponent;
});
//# sourceMappingURL=autoselect.js.map