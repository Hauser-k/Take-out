/**
 * 店铺信息页面
 *
 * @Date 2017-02-16
 * @author jicanghai
 *
 **/
requirejs.config({
    baseUrl: MT.STATIC_ROOT + '/javascripts'
});
requirejs(['module/validate', 'module/weburls', 'module/utilities', 'module/coordtransform',
    'vue_module/amapmixin', 'vue_module/autoselect', 'vue_module/imgupload', 'page/open_store/nav', 'module/webenum'], function (validate, weburls, utilities, coordtransform, amapmixin, autoselect, imgupload, nav, webenum) {
    'use strict';
    var toastDelay = 2000;
    var toast = function (msg, delay) {
        if (delay === void 0) { delay = toastDelay; }
        $().inform({
            type: "general",
            title: msg,
            delay: delay,
            size: "large"
        });
    };
    var vm;
    var defaultLonAndLat = { lat: 0, lng: 0 };
    var vmData = {
        // 经营品类
        tagIdLevel1: 0,
        tagIdLevel2: 0,
        tagIdLevel3: 0,
        tagIdLevelTree: [],
        // 美团地图体系中的省市县
        provinceData: [],
        countyData: [],
        //图片上传
        uploadurl: "/open_store_m/upload/fileuploadcdn",
        // 高德地图相关的 amapmixin 中使用的 
        autocomplateInput: '',
        amapLocation: {},
        shippingType: 1,
        outMeituan: false // 默认在美团范围内
    };
    var vmComputed = {
        // TODO:computedTagId
        computedTagId: function () {
            vm = this;
            // 如果第三个品类选择不存在, 那么是-1
            if (vm.tagIdLevel3 == -1) {
                return vm.tagIdLevel2;
            }
            else {
                return vm.tagIdLevel3;
            }
        },
        // 是否显示底部按钮
        computedButtons: function () {
            vm = this;
            if (vm.query.status == 'notPassed' || vm.query.status == 'checking' || vm.step[vm.pagename].stepStatus == 'needModify_Passed') {
                return false;
            }
            else {
                return true;
            }
        },
        // 是否显示保存按钮
        computedSaveButton: function () {
            if (vm.query.status == 'needImprove') {
                return false;
            }
            else {
                return true;
            }
        }
    };
    var vmMethods = {
        // 用户手动点击 页面
        mouseCreateMarkder: function () {
            vm = this;
            vm.mouseTool.marker();
            vm.mouseTool.on('draw', function (data) {
                var position = data.obj.getPosition();
                vm.geocoder.getAddress(position, function (status, result) {
                    if (status === 'complete' && result.info === 'OK') {
                        console.log(result);
                        var _address = result.regeocode.addressComponent;
                        var poi = {
                            location: position,
                            address: _address.district + _address.street + _address.streetNumber,
                            name: result.regeocode.formattedAddress
                        };
                        vm.renderSearchMarker([poi], true);
                    }
                });
            });
        },
        checkCountyBorder: function (location) {
            return new Promise(function (resolve, reject) {
                console.log(location.lng, location.lat);
                var lat = location.lat * 1000000;
                var lng = location.lng * 1000000;
                weburls.geographyoutofrange.get({ latitude: lat, longitude: lng, countyId: vm.pageData.countyId }, function (d) {
                    if (d.data === "in") {
                        resolve(location);
                    }
                    else {
                        var errorMsg = "您搜索或定位位置超出县级范围内，请重新调整坐标";
                        var template = "\n                            <div class=\"toast_board\">\n                                <div class=\"toast_title\">\n                                    <i class=\"fa fa-times fa-lg red\"></i> \n                                    \u5B9A\u4F4D\u5730\u5740\u5931\u8D25\n                                </div>\n                                <div class=\"toast_content\">" + errorMsg + "</div>\n                            </div>\n                        ";
                        toast(template, 2000);
                        reject(location);
                    }
                });
            });
        },
        /**
         * 检查左边是否在坐标位置内
         * @param location 位置
         * @param needUserConfirm 是否需要用户点击确定
         */
        setMarkerLocation: function (location, needUserConfirm) {
            if (needUserConfirm === void 0) { needUserConfirm = false; }
            vm = this;
            console.log(location.lng, location.lat);
            var lat = location.lat * 1000000;
            var lng = location.lng * 1000000;
            vm.map.setCenter(location);
            weburls.geographyoutofrange.get({ latitude: lat, longitude: lng, countyId: vm.pageData.countyId }, function (d) {
                if (d.data === "in") {
                    vm.amapLocation = location;
                    // 只有第一次 和 suggest 之后不需要 true 剩下的都需要true
                    vm.selectedPoi.isMoved = needUserConfirm;
                    // 当不需要用户确认或者用户手动确认的时候,才将值写入
                    if (!needUserConfirm) {
                        // 设置vm的值
                        vm.pageData.latitude = lat;
                        vm.pageData.longitude = lng;
                    }
                }
                else {
                    var errorMsg = "";
                    if (needUserConfirm) {
                        // vm.map.clearMap();
                        errorMsg = "当前定位位置超出县级范围内，请重新调整坐标";
                    }
                    else {
                        // vm.map.clearMap();
                        errorMsg = "当前搜索位置超出县级范围内，请检查地址后重新搜索定位";
                    }
                    var template = "\n                        <div class=\"toast_board\">\n                            <div class=\"toast_title\">\n                                <i class=\"fa fa-times fa-lg red\"></i> \n                                \u5B9A\u4F4D\u5730\u5740\u5931\u8D25\n                            </div>\n                            <div class=\"toast_content\">" + errorMsg + "</div>\n                        </div>\n                    ";
                    toast(template, 4000);
                }
            });
            weburls.tasksrShippingType.get({}, function (d) {
                if (d.data == false) {
                    vm.outMeituan = true;
                    // 如果不在范围内 强制改成 商家自配送
                    vm.pageData.shippingType = 0;
                }
                else if (d.data == true) {
                    vm.outMeituan = false;
                }
            }, lng, lat);
        },
        /**
         * ==================================
         * 品类接口
         */
        // 获取品类树
        getTagList: function () {
            var _this = this;
            weburls.tagtree.get({}, function (d) { return _this.tagIdLevelTree = d.data; });
        },
        // 获取品类链
        getTagChain: function (tagId) {
            weburls.taglist.get({ tagId: tagId }, function (d) {
                //循环复制 并回写
                for (var _i = 0, _a = d.data; _i < _a.length; _i++) {
                    var tagItem = _a[_i];
                    var _key = 'tagIdLevel' + tagItem.level.toString();
                    vm.$data[_key] = tagItem.id;
                }
            });
        },
        /**
         * ==================================
         * 省市县接口
         */
        // 获取省市
        getProvinceCity: function () {
            var _this = this;
            console.log(vm.pageData);
            weburls.geographyprovincecityall.get({}, function (d) {
                _this.provinceData = d.data;
            });
        },
        provinceChange: function (province) {
            vm = this;
            vm.pageData.provinceName = province.provinceName;
        },
        // 获取县
        cityChange: function (city) {
            var _this = this;
            // 清除所有覆盖物
            vm.map.clearMap();
            if (city && city.cityId > 0) {
                vm.pageData.cityName = city.cityName;
                var cityKeyword_1 = utilities.boradCountyName(city.cityName);
                var timer = setTimeout(function () {
                    vm.autocomplete.setCity(cityKeyword_1);
                    vm.placeSearch.setCity(cityKeyword_1);
                }, 500);
                // clearTimeout(timer);
                weburls.geographycounty.get({ provinceId: this.pageData.provinceId, cityId: city.cityId }, function (d) { return _this.countyData = d.data; });
            }
            else {
                this.countyData = [];
            }
        },
        // 县修改
        countyChange: function (county) {
            // 清除所有覆盖物
            vm.map.clearMap();
            vm.pageData.countyName = county.countyName;
            if (county.countyId !== vm.pageData.countyId) {
                // 清空原有坐标
                vm.pageData.longitude = 0;
                vm.pageData.latitude = 0;
            }
            if (county.countyId != -1 && county.countyId != "") {
                var countyName = utilities.boradCountyName(county.countyName);
                vm.initAMapDistrictSearch(countyName, function (_amapCounty) {
                    vm.amapCounty = _amapCounty;
                });
            }
        },
        /**
         * 提交业务数据
         */
        submitData: function (opt) {
            // check数据
            if (vm.pageData.provinceId == -1 || vm.pageData.cityId == -1 || vm.pageData.countyId == -1) {
                toast("您还没有选择门店区域");
                return;
            }
            if (vm.pageData.latitude == 0 || vm.pageData.longitude == 0) {
                toast("您还没有选择具体的门店坐标");
                return;
            }
            // 组装数据
            var submitData = {};
            for (var key in pageDataConstruct) {
                submitData[key] = vm.pageData[key];
            }
            /**
             * 不可见属性以及不确定属性 tagId 品类ID
             * 有可能是 tagIdLeve2 或者 tagIDLevel3
             */
            if (vm.computedTagId && vm.computedTagId !== vm.pageData.tagId) {
                submitData['tagId'] = vm.computedTagId;
            }
            // 默认帮用户上传商标图
            if (submitData.shopLogoUrl == '') {
                submitData.shopLogoUrl = "http://p1.meituan.net/xianfu/92ce909868967bc438eee95cb3a3e7e315205.png.webp";
            }
            weburls.restfulWrite.post(JSON.stringify(submitData), function (d) {
                // TODO: 成功或者失败的跳转情况
                if (vm.step.base.stepStatus == 'needModify_reject') {
                    if (opt === 'saveCommit') {
                        weburls.committask.post({
                            taskId: parseInt(vm.taskId),
                            userId: vm.userinfo.userid,
                            source: parseInt(vm.query.source)
                        }, function (d) {
                            weburls.page_my.goto({ source: vm.query.source });
                        });
                    }
                    else if (opt === 'save') {
                        weburls.page_my.goto({ source: vm.query.source });
                    }
                }
                else {
                    weburls.page_qualification.goto(vm.query);
                }
            }, vm.query.taskId);
        },
        onPrevClick: function (e) {
            weburls.page_info_prompt.goto(vm.query);
        },
        onImguploadSuccessShopFront: function (url, data) {
            var v = this;
            v.onImguploadSuccess(v.$refs["shop_front_url"], url, data);
        },
        onImguploadSuccessEnvironmental: function (url, data) {
            var v = this;
            v.onImguploadSuccess(v.$refs["environmental_url"], url, data);
        },
        onImguploadSuccess: function (dom, url, data) {
            var ele = $(dom.$el);
            vm.$nextTick(function () {
                ele.closest(".img-panel").eq(0).data("validate").validate();
            });
        },
        onNextClick: function (opt) {
            var vds = validate.scan().filter(function (v) { return v.target.is(":visible"); });
            vds.filter(function (v) { return v.target.hasClass("img-panel"); }).forEach(function (v) {
                // 跳过商标图的校验
                if (v.target.hasClass('shop_logo_url_panel'))
                    return;
                v.config.onGetValidateData = function (innerHTML) {
                    var ref = this.target.find(".imgupload[refname]").eq(0).attr("refname");
                    var url = vm.$refs[ref].value;
                    return url;
                };
                v.config.onMessage = function (msg, result, vdType, vdConfig, vdData) {
                    return "请上传" + this.config.title;
                };
            });
            if (validate.validateBatch(vds)) {
                vm.submitData(opt);
            }
            else {
                if ($(".has-error").length > 0) {
                    var top = Number($(".has-error").get(0).offsetTop) - 10;
                    $(document).scrollTop(top);
                    $("body,html").scrollTop(top);
                }
                return toast("提交失败，请修改标红信息");
            }
        }
    };
    var vmMounted = function () {
        vm = this;
        //vm.pageData 中没有 shippingType, 所以此处单独获取, TODO
        weburls.restfulRead.post(JSON.stringify(["shippingType"]), function (d) {
            vm.pageData.shippingType = (d.data.shippingType == undefined || d.data.shippingType == -1) ? 1 : d.data.shippingType;
        }, vm.query.taskId);
        console.log('357', vm.pageData);
        // 初始化 domId
        this.initAmap('amap-container');
        // 自动完成 ''代表默认全国
        this.initAutocomplate('');
        this.mouseCreateMarkder();
        // 品类信息初始化
        vm.getTagList();
        // 省市县初始化
        vm.getProvinceCity();
        // 如果没有配送类型 增加默认类型(默认商家自配送 0)
        // if(vm.pageData.shippingType !== 0 && vm.pageData.shippingType !== 1){
        //     vm.pageData.shippingType = 0;
        // }
        // TODO: 如何判断是编辑状态
        if (!(vm.step.base.stepStatus === 'needImprove_noRecord' || vm.step.base.stepStatus === 'needImprove_nowWrite')) {
            // 品类信息编辑回显
            vm.getTagChain(vm.pageData.tagId);
            /**
             * FIXME: settimeout解决一下 gb.getPosition()问题
             * 反查高德显示信息窗体, 并定位
             */
            setTimeout(function () {
                var gcj02 = [];
                // 取高德地图的数据
                if (vm.pageData.longitude && vm.pageData.latitude) {
                    gcj02 = [vm.pageData.longitude / 1000000, vm.pageData.latitude / 1000000];
                }
                else {
                    return;
                }
                var gdLnglat = new AMap.LngLat(gcj02[0], gcj02[1]);
                // 反查高德显示信息窗体
                vm.geocoder.getAddress(gdLnglat, function (status, result) {
                    if (status === 'complete' && result.info === 'OK') {
                        var _address = result.regeocode.addressComponent;
                        vm.selectedPoi.location = gdLnglat;
                        vm.selectedPoi.address = _address.district + _address.street + _address.streetNumber;
                        vm.selectedPoi.name = result.regeocode.formattedAddress;
                        vm.selectedPoi.isMoved = false;
                        // 定位显示
                        var pois = [
                            {
                                location: gdLnglat,
                                name: result.regeocode.formattedAddress,
                                address: _address.district + _address.street + _address.streetNumber
                            },
                        ];
                        vm.renderSearchMarker(pois, false);
                    }
                });
            }, 1000);
        }
    };
    var pageDataConstruct = {
        shopName: '',
        description: '',
        contractName: '',
        contractTel: '',
        tagId: 0,
        provinceId: "",
        provinceName: '',
        cityId: "",
        cityName: '',
        countyId: "",
        countyName: '',
        address: '',
        latitude: 0,
        longitude: 0,
        environmentalUrl: '',
        shopFrontUrl: '',
        shopLogoUrl: '',
        otherKaidianLink: '',
        shippingType: 1
    };
    var processedVmData = utilities.setServerVue(vmData);
    // 非编辑状态 将 pageData 替换为空的对象
    if (processedVmData.step.base.stepStatus === 'needImprove_noRecord' || processedVmData.step.base.stepStatus === 'needImprove_nowWrite') {
        processedVmData.pageData = pageDataConstruct;
    }
    vm = new Vue({
        el: '#base-page',
        mixins: [amapmixin],
        data: processedVmData,
        methods: vmMethods,
        mounted: vmMounted,
        computed: vmComputed,
        components: {
            autoselect: autoselect,
            imgupload: imgupload
        }
    });
    // 页面逻辑初始化
    var init = function () {
        // 将输入框点击默认选中全部文字
        $("input#autocomplate-input").click(function () {
            $(this).select();
        });
        //给每个带有tooltip的元素添加hover样式
        $('.tooltip-ele').each(function (i) {
            $(this).tooltip();
        });
        validate.scan();
    };
    init();
});
//# sourceMappingURL=base.js.map