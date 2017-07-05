var vueModule;
(function (vueModule) {
    var toastDelay = 3000;
    var toast = function (msg) {
        $().inform({
            type: "general",
            title: msg,
            delay: toastDelay,
            size: "large"
        });
    };
    /**
     * vue图片上传组件实例
     */
    vueModule.imguploadComponent = Vue.extend({
        template: "\n            <div ref=\"box\" class=\"imgupload\">\n                <input class=\"file\" v-show=\"!isFinish\" ref=\"file\" type=\"file\" @change=\"onFileChange\" :accept=\"accept\"/>\n                <div ref=\"img\" v-show=\"isFinish\" v-if=\"value.length>0\" class=\"img\" :style=\"imgurlCSS\"></div>\n                <div ref=\"delete\" v-show=\"isFinish && !readonly\" class=\"delete\" @click=\"onDelClick\"></div>\n                <div ref=\"reupload\" v-show=\"isFinish && !readonly\" class=\"reupload\" @click=\"onReuploadClick\">\u91CD\u65B0\u4E0A\u4F20</div>\n                <div ref=\"loading\" v-show=\"isUploading\" class=\"loading\"></div>\n\n                <div ref=\"imgexample\" v-show=\"exampleurl.length>0\" class=\"imgexample\" :style=\"exampleurlCSS\"></div>\n                <div ref=\"example\" v-show=\"exampleurl.length>0\" class=\"example\">\u793A\u4F8B</div>\n            </div>\n        ",
        data: function () {
            return {
                domBox: null,
                domFile: null,
                domDelete: null,
                domReupload: null,
                domLoading: null,
                domImg: null,
                domDrag: null,
                domImgExample: null,
                isUploading: false,
                isFinish: false,
                xhr: XMLHttpRequest
            };
        },
        watch: {
            value: function (val) {
                if (typeof val == "string" && val.length > 0) {
                    this.isFinish = true;
                    this.isUploading = false;
                }
                //不能为空时自动删除，会操作重新上传图片时失败
                // else {
                //     this.delete();
                // }
            }
        },
        computed: {
            imgurlCSS: function () {
                return "background-image:url('" + this.value + "')";
            },
            exampleurlCSS: function () {
                return "background-image:url('" + this.exampleurl + "')";
            }
        },
        props: {
            value: {
                type: [String],
                "default": ""
            },
            uploadurl: {
                type: String,
                required: false,
                "default": ""
            },
            accept: {
                type: String,
                required: false,
                "default": "image/jpg,image/jpeg,image/png"
            },
            exampleurl: {
                type: String,
                required: false,
                "default": ""
            },
            drag: {
                type: [String, Object],
                required: false,
                "default": ""
            },
            readonly: {
                type: Boolean,
                required: false,
                "default": false
            }
        },
        methods: {
            selectFile: function () {
                if (this.isUploading) {
                    toast("当前正在上传图片，请稍后再试");
                    return;
                }
                this.domFile.click();
            },
            onFileChange: function (e) {
                this["delete"]();
                var files = this.domFile.files;
                if (files.length == 0) {
                    return;
                }
                this.startUpload(files[0]);
            },
            startUpload: function (file) {
                var _this = this;
                if (this.isUploading) {
                    toast("当前正在上传图片，请稍后再试");
                    return;
                }
                this.xhr = new XMLHttpRequest();
                var xhr = this.xhr;
                xhr.upload.addEventListener("progress", function (e) {
                    if (e.lengthComputable) {
                        var percentage = Math.round((e.loaded * 100) / e.total);
                        _this.$emit("progress", percentage);
                    }
                }, false);
                // xhr.upload.addEventListener("load", function (e) {
                //     // console.log("上传完毕...")
                // }, false);
                xhr.open("POST", this.uploadurl);
                xhr.overrideMimeType('text/plain; charset=x-user-defined-binary');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            // alert(xhr.responseText);
                            // console.log(xhr.responseText,xhr);
                            var resp = null;
                            try {
                                resp = JSON.parse(xhr.responseText);
                                _this.onUploadEnd(resp);
                            }
                            catch (ex) {
                                toast("图片上传失败");
                                _this.$emit("error", xhr.responseText);
                            }
                        }
                        else {
                            _this.isFinish = false;
                            _this.isUploading = false;
                            toast("图片未上传成功");
                            console.error(xhr);
                            _this.$emit("error", xhr);
                        }
                    }
                };
                var fd = new FormData();
                fd.append(file.name, file);
                xhr.send(fd);
                this.isFinish = false;
                this.isUploading = true;
            },
            onUploadEnd: function (d) {
                // console.log("onUploadEnd", d);
                if (d.code == 0) {
                    this.isFinish = true;
                    this.isUploading = false;
                    this.setValue(d.data);
                    this.$emit("success", d.data, d);
                }
                else {
                    this["delete"]();
                    toast(d.msg);
                    this.$emit("error", d);
                }
                this.domFile.value = "";
            },
            "delete": function () {
                this.abort();
                this.isFinish = false;
                this.isUploading = false;
                this.setValue("");
            },
            abort: function () {
                if (this.isUploading == true && this.xhr) {
                    try {
                        this.xhr.abort();
                    }
                    catch (ex) { }
                    this.$emit("progress", 0);
                    this.domFile.value = "";
                }
            },
            reupload: function () {
                this.selectFile();
            },
            onDelClick: function (e) {
                if (typeof $.fn.tooltip == "function") {
                    var tooltip = $(this.domDelete).data("bs.tooltip");
                    if (tooltip == undefined) {
                        tooltip = $(this.domDelete).tooltip({
                            title: "\n                            <div class=\"confirm_del\">\n                                <div class=\"confirm_del_title\">\u786E\u5B9A\u5220\u9664\u5DF2\u4E0A\u4F20\u7684\u56FE\u7247\u5417\uFF1F</div>\n                                <div>\n                                    <button type=\"button\" class=\"btn btn-primary confirm_delete\">\u786E\u5B9A</button>\n                                    <button type=\"button\" class=\"btn btn-default confirm_cancel\">\u53D6\u6D88</button>\n                                </div>\n                            </div>\n                            ",
                            html: true,
                            trigger: "click"
                        }).data("bs.tooltip");
                        $(this.domDelete).tooltip("show");
                        //确定
                        tooltip.$tip.on("click", ".confirm_delete", confirm_delete_click.bind(this));
                        function confirm_delete_click() {
                            this["delete"]();
                            $(this.domDelete).tooltip("hide");
                        }
                        //取消
                        tooltip.$tip.on("click", ".confirm_cancel", confirm_cancel_click.bind(this));
                        function confirm_cancel_click() {
                            $(this.domDelete).tooltip("hide");
                        }
                    }
                    else {
                        $(this.domDelete).tooltip("show");
                    }
                }
                else {
                    this["delete"]();
                }
            },
            onReuploadClick: function (d) {
                this.reupload();
            },
            setValue: function (val) {
                this.$emit("input", val);
            },
            onDragEnter: function (e) {
                console.log("ondragenter", e);
                // e.dataTransfer.effectAllowed = "move";
                this.domDrag.classList.add("imgupload_ondrag");
            },
            onDragLeave: function (e) {
                console.log("ondragleave", e);
                if (e.target == this.domDrag) {
                    this.domDrag.classList.remove("imgupload_ondrag");
                }
            },
            onDragOver: function (e) {
                // console.log("ondragover", e);
                e.preventDefault();
            },
            onDrop: function (e) {
                var files = e.dataTransfer.files;
                var file = files[0];
                // console.log("ondrop", e, files);
                e.preventDefault();
                this.domDrag.classList.remove("imgupload_ondrag");
                if (files.length == 0) {
                    return;
                }
                if (file.type.indexOf("image") < 0) {
                    toast("仅支持上传图片文件");
                    return;
                }
                if (this.accept.split(",").indexOf(file.type.toLocaleLowerCase()) < 0) {
                    toast("仅支持上传 " + this.accept.replace(/image\//g, "") + " 的文件");
                    return;
                }
                if (this.isUploading) {
                    toast("当前有图片正在上传，请稍后");
                    return;
                }
                if (this.isFinish) {
                    this["delete"]();
                }
                //默认拖拽文件后开始上传文件
                this.startUpload(file);
            }
        },
        created: function () {
        },
        mounted: function () {
            this.domBox = this.$refs["box"];
            this.domFile = this.$refs["file"];
            this.domDelete = this.$refs["delete"];
            this.domReupload = this.$refs["reupload"];
            this.domLoading = this.$refs["loading"];
            this.domImg = this.$refs["img"];
            this.domImgExample = this.$refs["imgexample"];
            this.isFinish = (typeof this.value == "string" && this.value.length > 0);
            //设定支持拖拽上传的DOM区域
            if (this.drag.length > 0) {
                this.domDrag = document.querySelector(this.drag);
            }
            //绑定拖拽事件
            if (this.exampleurl.length == 0 && this.domDrag != null) {
                this.domDrag.addEventListener("dragenter", this.onDragEnter.bind(this));
                this.domDrag.addEventListener("dragleave", this.onDragLeave.bind(this));
                this.domDrag.addEventListener("dragover", this.onDragOver.bind(this));
                this.domDrag.addEventListener("drop", this.onDrop.bind(this));
            }
            //默认阻止所有直接拖拽到input file元素上的拖拽事件
            this.domFile.addEventListener("drop", function (e) {
                e.preventDefault();
            });
            if (typeof $.fn.tooltip == "function" && this.exampleurl.length > 0) {
                $(this.domImgExample).tooltip({
                    title: "<img src=\"" + this.exampleurl + "\" />",
                    html: true
                });
            }
        }
    });
})(vueModule || (vueModule = {}));
requirejs.config({
    baseUrl: MT.STATIC_ROOT + '/javascripts'
});
define([], function () {
    return vueModule.imguploadComponent;
});
//# sourceMappingURL=imgupload.js.map