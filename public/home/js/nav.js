/**
 * 导航部分
 * @date 2017年03月01日
 * @author limingyue
 **/
requirejs.config({
    baseUrl: MT.STATIC_ROOT + '/javascripts'
});
requirejs(['module/utilities', 'module/weburls',], function (utilities, weburls) {
    'use strict';
    var vm;
    var vmData = {
        basePageUrl: '',
        quaPageUrl: '',
        // deliveryPageUrl: '',   //配送信息页面url
        accountPageUrl: '',
        // foodPageUrl: '',       //商品信息页面url
        certPageUrl: '',
        shopName: '',
        tagNames: '',
        rejectReason: '',
        statusInfoH: '',
        baseClass: defautStyle(),
        qualificationClass: defautStyle(),
        // deliveryClass: defautStyle(),  //店配送息页面的导航样式class
        accountClass: defautStyle(),
        // foodClass: defautStyle(),  //商品信息页面的导航样式class
        certificationClass: defautStyle()
    };
    function defautStyle() {
        return {
            error: false,
            finish: false,
            passed: false,
            active: false
        };
    }
    ;
    var vmMethods = {
        /**
         * 配置每个页面的url
         */
        setPageUrl: function (name) {
            console.log('vm.step', vm.step);
            var queryData = 'taskId=' + vm.query.taskId + '&status=' + vm.query.status + '&source=' + vm.query.source;
            vm.basePageUrl = (vm.step.base.stepStatus != 'needImprove_noRecord') ? '/open_store/base?' + queryData : '#';
            vm.quaPageUrl = (vm.step.qualification.stepStatus != 'needImprove_noRecord') ? '/open_store/qualification?' + queryData : '#';
            // vm.deliveryPageUrl = (vm.step.delivery.stepStatus != 'needImprove_noRecord') ? '/open_store/delivery?' + queryData : '#';
            vm.accountPageUrl = (vm.step.account.stepStatus != 'needImprove_noRecord') ? '/open_store/account?' + queryData : '#';
            // vm.foodPageUrl = (vm.step.food.stepStatus != 'needImprove_noRecord') ? '/open_store/food?' + queryData : '#';
            vm.certPageUrl = (vm.step.certification.stepStatus == 'needImprove_nowWrite') ? '/open_store/certification?' + queryData : '#';
        },
        /*
        * 填写时判断每个步骤的样式
        */
        setStepClass: function () {
            var stepArrayClass = [vm.baseClass, vm.qualificationClass, vm.accountClass, vm.certificationClass];
            console.log('vm', vm.pagename);
            // if(vm.pagename != 'certification'){
            $.each(vm.step, function (key, val) {
                if (vm.step[key].stepStatus == 'needModify_reject') {
                    changeArrItem(vm[key + 'Class'], {
                        error: true,
                        finish: false,
                        passed: false,
                        active: false
                    });
                    //如果是当前base页面，则添加active类
                    if (key === vm.pagename) {
                        vm[key + 'Class'].active = true;
                    }
                }
                else if (vm.step[key].stepStatus == 'needModify_Passed') {
                    changeArrItem(vm[key + 'Class'], {
                        error: false,
                        finish: true,
                        passed: true,
                        active: false
                    });
                    //如果是当前base页面，则添加active类
                    if (key === vm.pagename) {
                        vm[key + 'Class'].active = true;
                    }
                }
                else if (vm.step[key].stepStatus == 'needImprove_noRecord') {
                    changeArrItem(vm[key + 'Class'], {
                        error: false,
                        finish: false,
                        passed: false,
                        active: false
                    });
                    //如果是当前base页面，则添加active类
                    if (key === vm.pagename) {
                        vm[key + 'Class'].active = true;
                    }
                }
                else if ((vm.step[key].stepStatus == 'needImprove_hasRecord')
                    || (vm.step[key].stepStatus == 'needImprove_nowWrite')
                    || (vm.step[key].stepStatus == 'checkPassed')
                    || (vm.step[key].stepStatus == 'checking')
                    || (vm.step[key].stepStatus == 'notPassed')
                    || (vm.step[key].stepStatus == 'verified_fail')
                    || (vm.step[key].stepStatus == 'verified_success')) {
                    changeArrItem(vm[key + 'Class'], {
                        error: false,
                        finish: true,
                        passed: false,
                        active: false
                    });
                    //如果是当前base页面，则添加active类
                    if (key === vm.pagename) {
                        vm[key + 'Class'].active = true;
                    }
                }
                else {
                    console.log('步骤状态异常');
                }
            });
            // }
            function changeArrItem(arrItem, obj) {
                Object.keys(obj).forEach(function (name) { return arrItem[name] = obj[name]; });
            }
        },
        /**
         * 获取店铺名称
         * new pattern interface
         */
        getShopName: function () {
            var data = ["shopName", "tagId"];
            weburls.restfulRead.post(JSON.stringify(data), function (d) {
                vm.shopName = d.data.shopName;
                //获取品类
                if (!d.data.tagId)
                    return;
                weburls.taglist.get({ tagId: d.data.tagId }, function (d) {
                    var tagNames = d.data.map(function (a) { return a.name; }).join("-");
                    vm.tagNames = tagNames;
                });
            }, vm.taskId);
        },
        /**
         * 点击查看全部操作
        */
        showAll: function (e) {
            $(e.target).toggleClass('turnBtm');
            $(this.$refs.statusInfo).toggleClass('h114');
        }
    };
    var vmMounted = function () {
        vm = this;
        vm.setPageUrl();
        vm.setStepClass();
        vm.getShopName();
        vm.rejectReason = vm.step[vm.pagename].reject ? vm.step[vm.pagename].reject.message : '';
        vm.statusInfoH = this.$refs.statusInfo ? this.$refs.statusInfo.getBoundingClientRect().height : '';
    };
    vm = new Vue({
        el: '#navbar',
        data: utilities.setServerVue(vmData),
        methods: vmMethods,
        mounted: vmMounted
    });
});
//# sourceMappingURL=nav.js.map