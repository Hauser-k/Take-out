@extends('layout.home.home')
@section('content')
        <div class="page-wrap">
            <div class="inner-wrap" style="width:980px;">
                <svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1">
                    <defs>
                        <symbol id="icon-question" viewBox="0 0 32 32">
                            <path fill="#ffde90" style="" d="M2.963 8.296h23.704v18.37h-23.704v-18.37z"></path>
                            <path fill="#333" style="" d="M26.074 8.889v17.185h-22.519v-17.185h22.519zM27.259 7.704h-24.889v19.556h24.889v-19.556z"></path>
                            <path fill="#fff" style="" d="M5.926 5.333h23.111v18.37h-23.111v-18.37z"></path>
                            <path fill="#333" style="" d="M28.444 5.926v17.185h-21.926v-17.185h21.926zM29.63 4.741h-24.296v19.556h24.296v-19.556z"></path>
                            <path fill="#333" style="" d="M19.793 10.074c0.533 0.474 0.77 1.126 0.77 2.015 0 0.652-0.178 1.185-0.533 1.659-0.119 0.178-0.533 0.533-1.126 1.067-0.296 0.296-0.533 0.533-0.652 0.77-0.178 0.296-0.296 0.652-0.296 1.067v0.356h-1.126v-0.356c0-0.474 0.059-0.889 0.237-1.244 0.178-0.415 0.652-0.948 1.422-1.659 0.237-0.237 0.415-0.415 0.474-0.533 0.296-0.356 0.415-0.711 0.415-1.126 0-0.593-0.178-1.007-0.474-1.304-0.356-0.356-0.77-0.474-1.422-0.474-0.711 0-1.244 0.237-1.6 0.711-0.296 0.415-0.474 0.948-0.474 1.659h-1.126c0-1.007 0.296-1.778 0.83-2.37 0.593-0.652 1.363-0.948 2.37-0.948s1.778 0.237 2.311 0.711zM18.015 18.252c0.178 0.178 0.237 0.356 0.237 0.593s-0.059 0.474-0.237 0.593c-0.178 0.178-0.356 0.237-0.593 0.237s-0.415-0.059-0.593-0.237-0.237-0.356-0.237-0.593c0-0.237 0.059-0.415 0.237-0.593s0.356-0.237 0.593-0.237 0.415 0.059 0.593 0.237z"></path>
                        </symbol>
                        <symbol id="icon-agent" viewBox="0 0 32 32">
                            <path fill="#ffde90" style="" d="M5.509 18.529l15.085-15.085 10.057 10.057-15.085 15.085-10.057-10.057z"></path>
                            <path fill="#ffd161" opacity="0.7" style="" d="M5.509 18.529l15.085-15.085 10.057 10.057-15.085 15.085-10.057-10.057z"></path>
                            <path fill="#333" style="" d="M20.622 4.267l9.244 9.244-14.222 14.222-9.304-9.244 14.281-14.222zM20.622 2.607l-15.941 15.881 10.904 10.904 15.941-15.941-10.904-10.844z"></path>
                            <path fill="#fff" style="" d="M1.349 14.309l10.895-10.895 14.247 14.247-10.895 10.895-14.247-14.247z"></path>
                            <path fill="#333" style="" d="M12.207 2.607l-11.733 11.733 15.111 15.111 11.733-11.733-15.111-15.111zM23.526 19.793l-5.037-5.037-0.83 0.83 5.037 5.037-1.659 1.659-5.037-5.037-0.83 0.83 5.037 5.037-1.659 1.659-5.037-5.037-0.83 0.83 5.037 5.037-2.074 2.074-13.452-13.333 10.074-10.074 13.393 13.393-2.133 2.133z"></path>
                        </symbol>
                        <symbol id="icon-openplat" viewBox="0 0 32 32">
                            <path fill="#ffde90" style="" d="M15.407 11.852h13.037v8.296h-13.037v-8.296z"></path>
                            <path fill="#333" style="" d="M27.852 12.444v7.111h-11.852v-7.111h11.852zM29.037 11.259h-14.222v9.481h14.222v-9.481z"></path>
                            <path fill="#333" style="" d="M23.111 14.815h2.37v2.37h-2.37v-2.37z"></path>
                            <path fill="#333" style="" d="M27.852 8.889v-4.148h-25.481v22.519h25.481v-4.148h-1.185v2.963h-17.778v-20.148h17.778v2.963h1.185zM7.704 26.074h-4.148v-20.148h4.148v20.148z"></path>
                        </symbol>
                        <symbol id="icon-download" viewBox="0 0 32 32">
                            <path fill="#ffde90" style="" d="M2.963 23.111h26.074v3.556h-26.074v-3.556z"></path>
                            <path fill="#333" style="" d="M28.444 23.704v2.37h-24.889v-2.37h24.889zM29.63 22.519h-27.259v4.741h27.259v-4.741z"></path>
                            <path fill="#333" style="" d="M29.63 27.259h-27.259v-22.519h7.704v1.185h-6.519v20.148h24.889v-20.148h-6.519v-1.185h7.704z"></path>
                            <path fill="#333" style="" d="M24 13.748l-7.407 4.741v-13.748h-1.185v13.748l-7.407-4.741-0.593 0.948 8.593 5.57 8.593-5.57z"></path>
                        </symbol>
                        <symbol id="icon-join" viewBox="0 0 32 32">
                            <path fill="#333" style="" d="M9.481 17.481h1.185v7.111h-1.185v-7.111z"></path>
                            <path fill="#333" style="" d="M13.63 17.481h1.185v7.111h-1.185v-7.111z"></path>
                            <path fill="#333" style="" d="M17.778 17.481h1.185v7.111h-1.185v-7.111z"></path>
                            <path fill="#333" style="" d="M21.926 17.481h1.185v7.111h-1.185v-7.111z"></path>
                            <path fill="#ffde90" style="" d="M2.37 9.778h27.259v4.741h-27.259v-4.741z"></path>
                            <path fill="#333" style="" d="M30.222 9.185h-6.281l-5.333-5.333-0.83 0.83 4.504 4.504h-12.741l4.504-4.504-0.83-0.83-5.333 5.333h-6.104v5.926h2.489l1.067 13.037h21.333l1.067-13.037h2.489v-5.926zM25.6 26.963h-19.2l-1.007-11.852h21.156l-0.948 11.852zM29.037 13.926h-26.074v-3.556h26.074v3.556z"></path>
                        </symbol>
                        <symbol id="icon-delivery" viewBox="0 0 32 32">
                            <path fill="#fff" style="" d="M5.985 26.074l1.126-16.593h4.444c1.185 1.126 2.785 1.778 4.504 1.778 1.659 0 3.259-0.652 4.444-1.778h4.385l1.126 16.593h-20.030z"></path>
                            <path fill="#333" style="" d="M24.356 10.074l1.067 15.407h-18.844l1.067-15.407h3.615c1.304 1.126 2.963 1.778 4.681 1.778s3.378-0.652 4.681-1.778h3.733zM25.422 8.889h-5.215c-1.067 1.126-2.548 1.778-4.207 1.778s-3.141-0.652-4.207-1.778h-5.215l-1.244 17.778h21.333l-1.244-17.778z"></path>
                            <path fill="#333" style="" d="M17.778 27.852v1.778c0 0.652-0.533 1.185-1.185 1.185h-1.185c-0.652 0-1.185-0.533-1.185-1.185v-1.778h3.556zM18.963 26.667h-5.926v2.963c0 1.304 1.067 2.37 2.37 2.37h1.185c1.304 0 2.37-1.067 2.37-2.37v-2.963z"></path>
                            <path fill="#333" style="" d="M5.333 3.556h7.111v1.185h-7.111v-1.185z"></path>
                            <path fill="#333" style="" d="M19.556 3.556h7.111v1.185h-7.111v-1.185z"></path>
                            <path fill="#fff" style="" d="M11.259 27.259v-4.148c0-2.607 2.133-4.741 4.741-4.741s4.741 2.133 4.741 4.741v4.148h-9.481z"></path>
                            <path fill="#333" style="" d="M16 18.963c2.311 0 4.148 1.837 4.148 4.148v3.556h-8.296v-3.556c0-2.311 1.837-4.148 4.148-4.148zM16 17.778v0c-2.963 0-5.333 2.37-5.333 5.333v4.741h10.667v-4.741c0-2.963-2.37-5.333-5.333-5.333v0z"></path>
                            <path fill="#ffde90" style="" d="M20.148 4.741c0 2.291-1.857 4.148-4.148 4.148s-4.148-1.857-4.148-4.148c0-2.291 1.857-4.148 4.148-4.148s4.148 1.857 4.148 4.148z"></path>
                            <path fill="#333" style="" d="M16 1.185c1.956 0 3.556 1.6 3.556 3.556s-1.6 3.556-3.556 3.556-3.556-1.6-3.556-3.556 1.6-3.556 3.556-3.556zM16 0c-2.607 0-4.741 2.133-4.741 4.741s2.133 4.741 4.741 4.741 4.741-2.133 4.741-4.741-2.133-4.741-4.741-4.741v0z"></path>
                        </symbol>
                        <symbol id="icon-cooperate" viewBox="0 0 32 32">
                            <path fill="#ffde90" style="" d="M11.319 11.911l4.681-7.289 5.274 7.348-5.274 14.637z"></path>
                            <path fill="#333" style="" d="M22.993 3.556h-13.985l-7.23 8.296 14.222 16.593 14.222-16.593-7.23-8.296zM22.459 4.741l5.689 6.519h-6.637l-4.681-6.519h5.63zM12.089 12.444h8.356l-4.385 12.326-3.97-12.326zM12.444 11.259l3.615-5.57 3.97 5.57h-7.585zM9.541 4.741h5.689l-4.207 6.519h-7.17l5.689-6.519zM3.852 12.444h6.993l4.207 13.096-11.2-13.096zM21.689 12.444h6.4l-10.963 12.859 4.563-12.859z"></path>
                        </symbol>
                        <symbol id="icon-merchant" viewBox="0 0 32 32">
                            <path fill="#ffde90" style="" d="M2.37 4.741h27.259v10.667h-27.259v-10.667z"></path>
                            <path fill="#333" style="" d="M21.333 19.556v6.519h-4.741v-6.519h4.741zM22.519 18.37h-7.111v8.889h7.111v-8.889z"></path>
                            <path fill="#333" style="" d="M15.407 19.556v6.519h-4.741v-6.519h4.741zM16.593 18.37h-7.111v8.889h7.111v-8.889z"></path>
                            <path fill="#333" style="" d="M7.111 10.074c0.652 0 1.185-0.533 1.185-1.185s-0.533-1.185-1.185-1.185-1.185 0.533-1.185 1.185 0.533 1.185 1.185 1.185zM10.667 10.074c0.652 0 1.185-0.533 1.185-1.185s-0.533-1.185-1.185-1.185-1.185 0.533-1.185 1.185 0.533 1.185 1.185 1.185zM14.222 10.074c0.652 0 1.185-0.533 1.185-1.185s-0.533-1.185-1.185-1.185-1.185 0.533-1.185 1.185 0.533 1.185 1.185 1.185z"></path>
                            <path fill="#333" style="" d="M28.444 5.926v8.296h-24.889v-8.296h24.889zM29.63 4.741h-27.259v10.667h27.259v-10.667z"></path>
                            <path fill="#333" style="" d="M2.37 26.074h27.259v1.185h-27.259v-1.185z"></path>
                            <path fill="#333" style="" d="M26.667 15.407v10.667h-21.333v-10.667h21.333zM27.852 14.222h-23.704v13.037h23.704v-13.037z"></path>
                        </symbol>
                    </defs>
                </svg>
                <div class="contact">
                    <div class="outer">
                        <div class="new-version">
                            <ul class="export">
                                <li>
                                    <a href="#" target="_blank">
                                        <svg class="new-icon">
                                            <desc>
                                                <div class="new-icon-bg"></div>
                                            </desc>
                                            <use xlink:href="#icon-merchant"></use>
                                        </svg>
                                        <h3>商家入驻</h3>
                                        <p>平台优势，成单量更有保证</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <svg class="new-icon">
                                            <desc>
                                                <div class="new-icon-bg icon-app"></div>
                                            </desc>
                                            <use xlink:href="#icon-download"></use>
                                        </svg>
                                        <h3>商家客户端</h3>
                                        <p>iPhone、Android、PC客户端</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <svg class="new-icon">
                                            <desc>
                                                <div class="new-icon-bg icon-join"></div>
                                            </desc>
                                            <use xlink:href="#icon-delivery"></use>
                                        </svg>
                                        <h3>配送加盟</h3>
                                        <p>更多业务量，更大知名度</p>
                                    </a>
                                </li>
                                <li class="rborder-none">
                                    <a href="#" target="_blank">
                                        <svg class="new-icon">
                                            <desc>
                                                <div class="new-icon-bg icon-proxy"></div>
                                            </desc>
                                            <use xlink:href="#icon-agent"></use>
                                        </svg>
                                        <h3>城市代理</h3>
                                        <p>代理美团外卖，合作共赢</p>
                                    </a>
                                </li>
                                <li class="bborder-none">
                                    <a href="#" target="_blank">
                                        <svg class="new-icon">
                                            <desc>
                                                <div class="new-icon-bg icon-market"></div>
                                            </desc>
                                            <use xlink:href="#icon-join"></use>
                                        </svg>
                                        <h3>零售加盟</h3>
                                        <p>便利店、水果连锁店、超市招商</p>
                                    </a>
                                </li>
                                <li class="bborder-none">
                                    <a href="#" target="_blank">
                                        <svg class="new-icon">
                                            <desc>
                                                <div class="new-icon-bg icon-fortune"></div>
                                            </desc>
                                            <use xlink:href="#icon-openplat"></use>
                                        </svg>
                                        <h3>开放平台</h3>
                                        <p>提供团购、外卖、闪惠接口</p>
                                    </a>
                                </li>
                                <li class="bborder-none">
                                    <a href="#" target="_blank">
                                        <svg class="new-icon">
                                            <desc>
                                                <div class="new-icon-bg icon-qa"></div>
                                            </desc>
                                            <use xlink:href="#icon-question"></use>
                                        </svg>
                                        <h3>常见问题</h3>
                                        <p>如何加盟、加盟条件、驳回原因</p>
                                    </a>
                                </li>
                                <li class="rborder-none bborder-none">
                                    <svg class="new-icon icon-cooper">
                                        <desc>
                                            <div class="new-icon-bg icon-cooper"></div>
                                        </desc>
                                        <use xlink:href="#icon-cooperate"></use>
                                    </svg>
                                    <h3>品牌合作</h3>
                                    <p>wpbg.marketing@meituan.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection