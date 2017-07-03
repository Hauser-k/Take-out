    /**
     * 仅PC端 退出登陆
     */
    $('.J-logout').on('click', function () {
        //下面根据针对ie无window.location.host属性做兼容处理
        var lHost = window.location.hostname + (window.location.port ? ':' + window.location.port : '');
        lHost = window.location.host ||  lHost;
        defLocationHref(lHost);
    });

    /**
     * kaidian.waimai.meituan.com 和 kd.waimaie.meituan.com 两个线上域名会共存
     * kaidian 支持 http和https,  kd.waimaie 只支持 http
     */
    var defLocationHref = function (lHost) {
        // 拿到环境然后判断 判断登陆服务器
        // 线上都是开店域名
        if (lHost.indexOf('kaidian') != -1) {
            switch (lHost){ 
                case 'kaidian.waimai.meituan.com':
                    location.href = 'https://waimaie.meituan.com/logout?service=kaidian&callback=' + encodeURIComponent(location.origin + '/logout');
                    // location.href = 'https://passport.meituan.com/account/unitivelogout?service=waimai&continue=' + encodeURIComponent(location.origin + '/logout');
                    break;
                case 'kaidian.waimai.st.meituan.com':
                    location.href = 'http://dx-waimai-e-staging01.dx.sankuai.com:8420/logout?service=kaidian&callback=' + encodeURIComponent(location.origin + '/logout');
                    break;
                default:
                    location.href = 'https://waimaie.meituan.com/logout?service=kaidian&callback=' + encodeURIComponent(location.origin + '/logout');
            }
        } else if (lHost.indexOf('kd.waimaie') != -1) {
            switch (lHost) {
                case 'kd.waimaie.meituan.com':
                    location.href = 'https://waimaie.meituan.com/logout?service=kaidian&callback=' + encodeURIComponent(location.origin + '/logout');
                    break;
                case 'kd.waimaie.waimai.st.meituan.com':
                    location.href = 'http://dx-waimai-e-staging01.dx.sankuai.com:8420/logout?service=kaidian&callback=' + encodeURIComponent(location.origin + '/logout');
                    break;
                case 'qa.kd.waimaie.waimai.sankuai.info':
                    location.href = 'http://e.b.waimai.test.sankuai.com/logout?service=kaidian&callback=' + encodeURIComponent(location.origin + '/logout');
                    break;
                case 'beta.kd.waimaie.waimai.sankuai.info':
                    location.href = 'http://e.b.waimai.beta.sankuai.com/logout?service=kaidian&callback=' + encodeURIComponent(location.origin + '/logout');
                    break;
                default:
                    location.href = 'http://develop.waimai.e.waimai.sankuai.info/logout?service=kaidian&callback=' + encodeURIComponent(location.origin + '/logout');
            }                
        } else {
            location.href = 'http://develop.waimai.e.waimai.sankuai.info/logout?service=kaidian&callback=' + encodeURIComponent(location.origin + '/logout');
        }
    }
