// TODO: 使用的袋鼠UI的inform, 今后可能要换成Vue的
var toastDelay = 2000;
var toast = function (msg) {
    $().inform({
        type: "general",
        title: msg,
        delay: toastDelay,
        size: "large"
    });
};
var amapmixin = {
    data: {
        hello: 'world',
        map: {},
        autocomplete: {},
        placeSearch: {},
        amapCounty: {},
        geocoder: {},
        editingPolygon: {},
        mouseTool: {},
        selectedPoi: {
            isMoved: false,
            location: {},
            address: '',
            name: ''
        }
    },
    mounted: function () {
        console.log('amapmixin');
        // this.initAmap('#container-id'); // 在调用方初始化
        // this.initAutocomplate('#complate-input-id'); // 在调用方初始化
    },
    methods: {
        /**
         * 初始化amap对象
         */
        initAmap: function (domContainer) {
            var vm = this;
            vm.map = new AMap.Map(domContainer, {
                resizeEnable: true,
                zoom: 12,
                center: [116.397428, 39.90923]
            });
            AMap.plugin(['AMap.ToolBar', 'AMap.Scale'], function () {
                vm.map.addControl(new AMap.ToolBar());
                vm.map.addControl(new AMap.Scale());
            });
            vm.geocoder = new AMap.Geocoder({
                radius: 1000,
                extensions: "all"
            });
            if (AMap.MouseTool) {
                vm.mouseTool = new AMap.MouseTool(vm.map);
            }
        },
        /**
         * 初始化搜索菜单
         *
         * @param {string} cityname
         */
        initAutocomplate: function (cityname) {
            var vm = this;
            AMap.plugin(['AMap.Autocomplete', 'AMap.PlaceSearch'], function () {
                var autoOptions = {
                    city: cityname && '',
                    input: "autocomplate-input" //使用联想输入的input的id
                };
                vm.autocomplete = new AMap.Autocomplete(autoOptions);
                vm.placeSearch = new AMap.PlaceSearch({
                    city: cityname,
                    map: '',
                    pageSize: 1
                });
                AMap.event.addListener(vm.autocomplete, "select", function (e) {
                    //TODO 针对选中的poi实现自己的功能
                    console.log('autocomplate select event');
                    vm.autocomplateInput = e.poi.name;
                    vm.placeSearch.search(e.poi.name, function (status, result) {
                        if (status === 'complete' && result.info === 'OK') {
                            // 绘制自己的坐标点
                            vm.renderSearchMarker(result.poiList.pois, false);
                            // 地图自适应显示
                            vm.map.setFitView();
                            vm.map.setZoom(14);
                            // 清除搜索结果
                            vm.placeSearch.clear();
                        }
                        else {
                            toast("未搜索到结果,请重新输入后搜索");
                        }
                    });
                });
            });
        },
        // 如果有一个结果, 自动设置. 如果没有让用户选择
        // 用户点击搜索按钮
        searchDefaultSuggestion: function (event) {
            console.log(event);
            var searchWord = this.autocomplateInput;
            // 判断是不是另一来源
            if ($(event.target).attr("id") === "shopaddress") {
                searchWord = $(event.target).val();
            }
            var vm = this;
            // TODO: 隐藏suggest框
            $(".amap-sug-result").hide();
            vm.placeSearch.search(searchWord, function (status, result) {
                if (status === 'complete' && result.info === 'OK') {
                    // 绘制自己的坐标点
                    vm.renderSearchMarker(result.poiList.pois, true);
                    // 地图自适应显示
                    vm.map.setFitView();
                    vm.map.setZoom(14);
                    // 清除搜索结果
                    vm.placeSearch.clear();
                }
                else {
                    toast("未搜索到结果,请重新输入后搜索");
                }
            });
        },
        /**
         * 显示自定义的marker
         */
        renderSearchMarker: function (poiList, needUserConfirm) {
            var vm = this;
            var infoWindow = new AMap.InfoWindow({ offset: new AMap.Pixel(-9, -30) });
            var _loop_1 = function (poi) {
                vm.checkCountyBorder(poi.location).then(function (location) {
                    vm.map.clearMap();
                    // OK in 
                    var marker = new AMap.Marker({
                        position: poi.location,
                        map: vm.map,
                        // icon: 'http://webapi.amap.com/theme/v1.3/markers/n/mark_b'+(i+1)+'.png',
                        icon: '../../images/location_marker.png',
                        draggable: true
                    });
                    marker.content = vm.$refs["marker-content"];
                    // 默认没有移动过
                    marker.setExtData({ isMoved: needUserConfirm });
                    marker.on('click', function (e) {
                        //  如果信息有更改
                        // if (!this.getExtData().isMoved){
                        vm.selectedPoi.location = poi.location;
                        vm.selectedPoi.address = poi.address;
                        vm.selectedPoi.name = poi.name;
                        vm.selectedPoi.isMoved = this.getExtData().isMoved;
                        // }
                        infoWindow.setContent(e.target.content);
                        infoWindow.open(vm.map, e.target.getPosition());
                    });
                    // 触发一次click显示
                    marker.emit('click', { target: marker });
                    // 因为会自动触发 拖拽之后也会触发 所以在这里做检查
                    vm.setMarkerLocation(poi.location, needUserConfirm);
                    marker.on('dragstart', function (e) {
                        vm.map.clearInfoWindow();
                    });
                    marker.on('dragend', function (e) {
                        var that = this;
                        vm.checkCountyBorder(e.lnglat).then(function (location) {
                            console.log(e.lnglat);
                            that.setExtData({ isMoved: true });
                            var lat = e.lnglat.lat, lng = e.lnglat.lng;
                            that.setPosition(new AMap.LngLat(lng, lat));
                            vm.geocoder.getAddress(e.lnglat, function (status, result) {
                                if (status === 'complete' && result.info === 'OK') {
                                    console.log(result.regeocode.formattedAddress);
                                    var _address = result.regeocode.addressComponent;
                                    vm.selectedPoi.location = e.lnglat;
                                    vm.selectedPoi.address = _address.district + _address.street + _address.streetNumber;
                                    vm.selectedPoi.name = result.regeocode.formattedAddress;
                                    vm.selectedPoi.isMoved = true;
                                    console.log(vm.selectedPoi.name);
                                    infoWindow.setContent(that.content);
                                    infoWindow.open(vm.map, e.target.getPosition());
                                }
                            });
                        }, function (location) {
                            var oldPosition = vm.selectedPoi.location;
                            that.setPosition(new AMap.LngLat(oldPosition.lng, oldPosition.lat));
                            infoWindow.setContent(that.content);
                            infoWindow.open(vm.map, e.target.getPosition());
                        });
                    });
                }, function (location) {
                    // do nothing
                    var getAllOverlays = vm.map.getAllOverlays('marker');
                    console.log(getAllOverlays);
                    // vm.map删除
                    // 新建状态 不在范围内
                    if (vm.selectedPoi.location.lat == undefined || vm.selectedPoi.location.lat == "") {
                        vm.map.remove(getAllOverlays[getAllOverlays.length - 1]);
                    }
                    else {
                        if (getAllOverlays.length > 1) {
                            vm.map.remove(getAllOverlays[getAllOverlays.length - 1]);
                        }
                    }
                });
            };
            for (var _i = 0, poiList_1 = poiList; _i < poiList_1.length; _i++) {
                var poi = poiList_1[_i];
                _loop_1(poi);
            }
        },
        /**
         * 相应区域变化改变地图的中心点
         */
        initAMapDistrictSearch: function (keyword, callback) {
            var vm = this;
            AMap.service('AMap.DistrictSearch', function () {
                var opts = {
                    subdistrict: 1,
                    extensions: 'base',
                    showbiz: false,
                    level: 'district' //查询行政级别为 县
                };
                //实例化DistrictSearch
                var district = new AMap.DistrictSearch(opts);
                //行政区查询
                district.search(keyword, function (status, result) {
                    var county = result.districtList[0];
                    // 设置地图中心点
                    vm.map.setCenter(county.center);
                    vm.map.setZoom(12);
                    callback(county);
                });
            });
        },
        /**
         * 绘制多个polygonEditor
         * @param pathArray
         * @param color
         */
        drawPolyAreaEditer: function (pathArray, color) {
            var vm = this;
            var result = '';
            var _polygon = new AMap.Polygon({
                map: vm.map,
                path: pathArray,
                strokeColor: color,
                strokeOpacity: 1,
                strokeWeight: 2,
                fillColor: color,
                fillOpacity: 0.35
            });
            var editor = new AMap.PolyEditor(vm.map, _polygon);
            editor.polygon = _polygon;
            return editor;
        }
    }
};
define([], function () {
    return amapmixin;
});
//# sourceMappingURL=amapmixin.js.map