/*
 * WebJs使用的TS枚举对象
 * ! 注意此文件必须与nodeenum.ts保持一致 ！
 *
 */
/**
 * 所有枚举对象
 */
var kdm;
(function (kdm) {
    var enums;
    (function (enums) {
        /**
         * 枚举，服务器操作返回码枚举
         *
         * @export
         * @enum {number}
         */
        var serverBaseCodeEnum;
        (function (serverBaseCodeEnum) {
            /**
            * 服务器操作成功
            */
            serverBaseCodeEnum[serverBaseCodeEnum["success"] = 0] = "success";
            /**
            * 服务操作失败
            */
            serverBaseCodeEnum[serverBaseCodeEnum["error"] = 1] = "error";
        })(serverBaseCodeEnum = enums.serverBaseCodeEnum || (enums.serverBaseCodeEnum = {}));
        /**
         * 任务来源枚举
         *
         * @export
         * @enum {number}
         */
        var taskSourceEnum;
        (function (taskSourceEnum) {
            /**
            * 1:外卖PC
            */
            taskSourceEnum[taskSourceEnum["wmPC"] = 1] = "wmPC";
            /**
            * 2:外卖Android
            */
            taskSourceEnum[taskSourceEnum["wmAndroid"] = 2] = "wmAndroid";
            /**
             * 3:外卖IOS
             */
            taskSourceEnum[taskSourceEnum["wmIOS"] = 3] = "wmIOS";
            /**
            * 4:外卖I版
            */
            taskSourceEnum[taskSourceEnum["wmI"] = 4] = "wmI";
            /**
            * 5:团购PC
            */
            taskSourceEnum[taskSourceEnum["tgPC"] = 5] = "tgPC";
            /**
            * 6:团购Android
            */
            taskSourceEnum[taskSourceEnum["tgAndroid"] = 6] = "tgAndroid";
            /**
            * 7:团购IOS
            */
            taskSourceEnum[taskSourceEnum["tgIOS"] = 7] = "tgIOS";
            /**
            * 8:团购I版
            */
            taskSourceEnum[taskSourceEnum["tgI"] = 8] = "tgI";
        })(taskSourceEnum = enums.taskSourceEnum || (enums.taskSourceEnum = {}));
        /**
         * 开店基本信息实体的地图类型(MapType)枚举//0:用户自己点的位置 1:有明确poi信息的
         *
         * @export
         * @enum {number}
         */
        var KaidianBaseVoMapTypeEnum;
        (function (KaidianBaseVoMapTypeEnum) {
            /**
            * 0:用户自己点的位置
            */
            KaidianBaseVoMapTypeEnum[KaidianBaseVoMapTypeEnum["user"] = 0] = "user";
            /**
            * 1:有明确poi信息的
            */
            KaidianBaseVoMapTypeEnum[KaidianBaseVoMapTypeEnum["poi"] = 1] = "poi";
        })(KaidianBaseVoMapTypeEnum = enums.KaidianBaseVoMapTypeEnum || (enums.KaidianBaseVoMapTypeEnum = {}));
        /**
         * 配送信息实体的配送方式枚举
         *
         * @export
         * @enum {number}
         */
        var KaidianShippingVoShippingTypeEnum;
        (function (KaidianShippingVoShippingTypeEnum) {
            /**
            * 0:自配送
            */
            KaidianShippingVoShippingTypeEnum[KaidianShippingVoShippingTypeEnum["user"] = 0] = "user";
            /**
            * 1:美团配送
            */
            KaidianShippingVoShippingTypeEnum[KaidianShippingVoShippingTypeEnum["meituan"] = 1] = "meituan";
        })(KaidianShippingVoShippingTypeEnum = enums.KaidianShippingVoShippingTypeEnum || (enums.KaidianShippingVoShippingTypeEnum = {}));
        /**
         * 配送范围的类型
         *
         * @export
         * @enum {number}
         */
        var KaidianShippingAreaVoTypeEnum;
        (function (KaidianShippingAreaVoTypeEnum) {
            /**
            * 1:多边形
            */
            KaidianShippingAreaVoTypeEnum[KaidianShippingAreaVoTypeEnum["polygon"] = 1] = "polygon";
        })(KaidianShippingAreaVoTypeEnum = enums.KaidianShippingAreaVoTypeEnum || (enums.KaidianShippingAreaVoTypeEnum = {}));
        /**
         * 证件类型一级枚举
         *
         * @export
         * @enum {number}
         */
        var KaidianCertVoTypeLevelOneEnum;
        (function (KaidianCertVoTypeLevelOneEnum) {
            /**
            * 门店营业执照=1
            */
            KaidianCertVoTypeLevelOneEnum[KaidianCertVoTypeLevelOneEnum["businessLicense"] = 1] = "businessLicense";
            /**
             * 餐饮服务许可证=2
             */
            KaidianCertVoTypeLevelOneEnum[KaidianCertVoTypeLevelOneEnum["FoodServicePermit"] = 2] = "FoodServicePermit";
            /**
            * 身份证=4
            */
            KaidianCertVoTypeLevelOneEnum[KaidianCertVoTypeLevelOneEnum["IDCard"] = 4] = "IDCard";
            /**
            * 特许证件	=6
            */
            KaidianCertVoTypeLevelOneEnum[KaidianCertVoTypeLevelOneEnum["SpecialCertificates"] = 6] = "SpecialCertificates";
        })(KaidianCertVoTypeLevelOneEnum = enums.KaidianCertVoTypeLevelOneEnum || (enums.KaidianCertVoTypeLevelOneEnum = {}));
        /**
         * 银行信息的类型
         *
         * @export
         * @enum {number}
         */
        var KaidianSettleVoTypeEnum;
        (function (KaidianSettleVoTypeEnum) {
            /**
            * 1:对私
            */
            KaidianSettleVoTypeEnum[KaidianSettleVoTypeEnum["private"] = 1] = "private";
            /**
            * 2:对公
            */
            KaidianSettleVoTypeEnum[KaidianSettleVoTypeEnum["public"] = 2] = "public";
        })(KaidianSettleVoTypeEnum = enums.KaidianSettleVoTypeEnum || (enums.KaidianSettleVoTypeEnum = {}));
        /**
         * 获取是否有提交过的任务的状态码枚举
         *
         * @export
         * @enum {number}
         */
        var commitstatusEnum;
        (function (commitstatusEnum) {
            /**
            * status = 0 表示没有申请记录，进入新建页面
            */
            commitstatusEnum[commitstatusEnum["noRecord"] = 0] = "noRecord";
            /**
            * status = 1有申请记录 进入店铺管理页
            */
            commitstatusEnum[commitstatusEnum["hasRecord"] = 1] = "hasRecord";
        })(commitstatusEnum = enums.commitstatusEnum || (enums.commitstatusEnum = {}));
        /**
         * 店铺信息状态码枚举
         *
         * @export
         * @enum {number}
         */
        var KaidianBaseVoStatusEnum;
        (function (KaidianBaseVoStatusEnum) {
            /**
            * 1:未提交(待提交审核 | 完善信息)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["unSubmitted"] = 1] = "unSubmitted";
            /**
            * 10:BD待跟进(审核中)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["BDWaitFollow"] = 10] = "BDWaitFollow";
            /**
            * 20:BD跟进中(审核中)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["BDFollowing"] = 20] = "BDFollowing";
            /**
            * 21:BD驳回(审核不通过 | 修改)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["BDReject"] = 21] = "BDReject";
            /**
            * 22:用户重新提交(审核中)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["reSubmit"] = 22] = "reSubmit";
            /**
            * 24:提交品控审核(审核中)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["submitQualityReview"] = 24] = "submitQualityReview";
            /**
            * 26:品控审核避讳(审核不通过 | 修改)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["qualityTaboo"] = 26] = "qualityTaboo";
            /**
            * 28:重新提交品控审核(审核中)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["reSubmitQualityReview"] = 28] = "reSubmitQualityReview";
            /**
            * 40:审核通过(审核通过)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["reviewPassed"] = 40] = "reviewPassed";
            /**
            * 30:暂不合作(暂不合作)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["uncooperative"] = 30] = "uncooperative";
            /**
            * 50:通过其他渠道合作成功(无)
            */
            KaidianBaseVoStatusEnum[KaidianBaseVoStatusEnum["otherChannelSuccess"] = 50] = "otherChannelSuccess";
        })(KaidianBaseVoStatusEnum = enums.KaidianBaseVoStatusEnum || (enums.KaidianBaseVoStatusEnum = {}));
        /**
         * 获取商家是否在美团配送范围内状态码枚举
         *
         * @export
         * @enum {number}
         */
        var shippingcheckStatusEnum;
        (function (shippingcheckStatusEnum) {
            /**
            * status = 0 表示不在美团配送范围内
            */
            shippingcheckStatusEnum[shippingcheckStatusEnum["outMeituan"] = 0] = "outMeituan";
            /**
            * status = 1在美团配送范围内
            */
            shippingcheckStatusEnum[shippingcheckStatusEnum["inMeituan"] = 1] = "inMeituan";
        })(shippingcheckStatusEnum = enums.shippingcheckStatusEnum || (enums.shippingcheckStatusEnum = {}));
        /**
         * 判断此商店是否需要录入商品的返回状态码枚举
         *
         * @export
         * @enum {number}
         */
        var productcheckStatusEnum;
        (function (productcheckStatusEnum) {
            /**
            * status = 0 表示不需要录入菜品
            */
            productcheckStatusEnum[productcheckStatusEnum["noNeed"] = 0] = "noNeed";
            /**
            * status = 1需要录入菜品
            */
            productcheckStatusEnum[productcheckStatusEnum["need"] = 1] = "need";
        })(productcheckStatusEnum = enums.productcheckStatusEnum || (enums.productcheckStatusEnum = {}));
        /**
         * 认证类型
         *
         * @export
         * @enum {number}
         */
        var verifiedTypeEnum;
        (function (verifiedTypeEnum) {
            /**
             * 0:个人
             */
            verifiedTypeEnum[verifiedTypeEnum["person"] = 0] = "person";
            /**
             * 1:企业法人
             */
            verifiedTypeEnum[verifiedTypeEnum["legalRepresentative"] = 1] = "legalRepresentative";
        })(verifiedTypeEnum = enums.verifiedTypeEnum || (enums.verifiedTypeEnum = {}));
        /**
         * 实名认证状态。0:未开始 1:待认证 2:认证成功 3:认证失败
         *
         * @export
         * @enum {number}
         */
        var verifiedStatusEnum;
        (function (verifiedStatusEnum) {
            /**
             * 0 未开始
             */
            verifiedStatusEnum[verifiedStatusEnum["unStart"] = 0] = "unStart";
            /**
             * 1 待认证
             */
            verifiedStatusEnum[verifiedStatusEnum["unVerified"] = 1] = "unVerified";
            /**
             * 2 认证成功
             */
            verifiedStatusEnum[verifiedStatusEnum["verifiedSuccess"] = 2] = "verifiedSuccess";
            /**
             * 3 认证失败
             */
            verifiedStatusEnum[verifiedStatusEnum["validationFail"] = 3] = "validationFail";
        })(verifiedStatusEnum = enums.verifiedStatusEnum || (enums.verifiedStatusEnum = {}));
    })(enums = kdm.enums || (kdm.enums = {}));
})(kdm || (kdm = {}));
requirejs.config({
    baseUrl: MT.STATIC_ROOT + '/javascripts'
});
define([], function () {
    return kdm.enums;
});
//# sourceMappingURL=webenum.js.map