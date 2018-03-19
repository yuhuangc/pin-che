<?php
use frontend\assets\AppAsset;

//AppAsset::register($this);

?>

<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title>微拼车</title>
    <link href="/css/base.css" rel="stylesheet">
    <link href="/css/base(1).css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <script src="/js/jquery.js."></script>

    <style>
        /*base.css*/
        @font-face {
            font-family: 'iconfont';
            src: url('/font/iconfont.woff?v=5') format('woff'), /* chrome、firefox */ url('/font/iconfont.ttf?v=5') format('truetype');/* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
        }

        .iconfont {
            font-family: "iconfont" !important;
            font-size: 16px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
        }

        @font-face {
            font-family: 'sysiconfont';
            src: url('/font/iconfont.woff?v=6') format('woff'), /* chrome、firefox */ url('/font/iconfont.ttf?v=6') format('truetype');
        }

        .sysiconfont {
            font-family: "sysiconfont" !important;
            font-size: 16px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
        }

    </style>

    <link href="/css/index.css" rel="stylesheet">

<body id="index">

<div class="header100">
    <a href="" class="a back"><i class="iconfont"></i></a>
    <div class="tab">
        <a href="" class="sel"><i class="iconfont"></i>人找车</a>
        <a href="" class=""><i class="iconfont"></i>车找人</a>
    </div>

    <a href="/home/publish" class="a pub"><i class="iconfont"></i></a>

</div>

<div class="wrap" id="main">

    <div class="swipe focus" id="focus" style="height: 213.333px; visibility: visible;">
        <div class="swipe-wrap" style="width: 640px;">

            <div class="p" data-index="0" style="width: 640px; left: 0px; transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
                <a href="#">
                    <img src="">
                </a>
            </div>

        </div>
        <div class="swipe-btn swipe-btn3" id="focus-btn">
            <ul>
                <li class="on"></li>
            </ul>
        </div>
    </div>



    <div class="tools">
        <div class="se">
            <input type="text" id="txtFrom" placeholder="从哪" value="">-<input type="text" id="txtTo" value="" placeholder="到哪"> <a href="javascript:;" onclick="search100()">查询</a>
        </div>

        <div class="sort">
            <a href="" class="sel">发布时间</a>
            <a href="" class="">出发时间</a>
        </div>
    </div>

    <div class="list" id="list" loading="">
        <ul>
            <li class="a ">
                <a href="">
                    <div class="user">
                        <img src="/images/0">壹種生活 <i class="iconfont"></i>
                        <div class="type type2">乘客</div>
                    </div>
                    <div class="y time">时间：2018-01-03 18:38:38</div>
                    <div class="y from">路线：<em>北京</em> <i></i><em>广西</em></div>
                    <div class="y re">其它：4个人 <em>面议</em></div>
                    <div class="remark">649794</div>
                </a><a href="tel:1596666666" class="iconfont tel"></a>
                <div class="over"></div>
            </li>

            <li class="a ">
                <a href="">
                    <div class="user">
                        <img src="/images/0(1)">刘传平 <i class="iconfont"></i>
                        <div class="type type2">乘客</div>
                    </div>
                    <div class="y time">时间：2017-12-30 15:52:16</div>
                    <div class="y from">路线：<em>南京</em> <i></i><em>宜昌</em></div>
                    <div class="y re">其它：1个人 <em>面议</em></div>

                </a><a href="tel:15812341234" class="iconfont tel"></a>
                <div class="over"></div>
            </li>

            <li class="a ">
                <a href="">
                    <div class="user">
                        <img src="/images/0(2)">Shireli <i class="iconfont"></i>
                        <div class="type">车主</div>
                    </div>
                    <div class="y time">时间：2017-11-30 13:03:32</div>
                    <div class="y from">路线：<em>吐鲁番</em> <i></i><em>乌鲁木齐</em></div>
                    <div class="y re">其它：小轿车&nbsp; 4个座位 &nbsp; 途经：鄯善 <em>50元</em></div>
                    <div class="remark">没有</div>
                </a><a href="tel:13779000074" class="iconfont tel"></a>
                <div class="over"></div>
            </li>

            <li class="a ">
                <a href="#">
                    <div class="user">
                        <img src="/images/0(3)">卖土蜂蜜的熊本熊 <i class="iconfont"></i>
                        <div class="type">车主</div>
                    </div>
                    <div class="y time">时间：2017-11-05 12:34:00</div>
                    <div class="y from">路线：<em>测试</em> <i></i><em>测试</em></div>
                    <div class="y re">其它：小轿车&nbsp; 3个座位 &nbsp; 途经：测试 <em>10元</em></div>

                </a><a href="tel:11111111111" class="iconfont tel"></a>
                <div class="over"></div>
            </li>

            <li class="a ">
                <a href="#">
                    <div class="user">
                        <img src="/images/0(4)">重金属 <i class="iconfont"></i>
                        <div class="type">车主</div>
                    </div>
                    <div class="y time">时间：2017-10-15 15:46:00</div>
                    <div class="y from">路线：<em>中宁</em> <i></i><em>银川</em></div>
                    <div class="y re">其它：小轿车&nbsp; 3个座位 &nbsp; 途经：永宁 <em>面议</em></div>

                </a><a href="tel:15500856666" class="iconfont tel"></a>
                <div class="over"></div>
            </li>

            <li class="a ">
                <a href="#">
                    <div class="user">
                        <img src="/images/0(4)">重金属 <i class="iconfont"></i>
                        <div class="type type2">乘客</div>
                    </div>
                    <div class="y time">时间：2017-10-15 18:43:00</div>
                    <div class="y from">路线：<em>中宁县政府</em> <i></i><em>银川金凤区</em></div>
                    <div class="y re">其它：3个人 <em>100元</em></div>
                    <div class="remark">行李箱两个</div>
                </a><a href="tel:1383838438" class="iconfont tel"></a>
                <div class="over"></div>
            </li>

            <li class="a ">
                <a href="#">
                    <div class="user">
                        <img src="/images/0(4)">重金属 <i class="iconfont"></i>
                        <div class="type type2">乘客</div>
                    </div>
                    <div class="y time">时间：2017-10-15 11:50:00</div>
                    <div class="y from">路线：<em>兰州</em> <i></i><em>银川</em></div>
                    <div class="y re">其它：1个人 <em>100元</em></div>

                </a><a href="tel:15809676534" class="iconfont tel"></a>
                <div class="over"></div>
            </li>

            <li class="a ">
                <a href="#">
                    <div class="user">
                        <img src="/images/0(5)">淘宝省钱助手-优惠购APP免费 <i class="iconfont girl"></i>
                        <div class="type">车主</div>
                    </div>
                    <div class="y time">时间：2017-10-14 14:24:51</div>
                    <div class="y from">路线：<em>可能</em> <i></i><em>哦哟哟</em></div>
                    <div class="y re">其它：小轿车&nbsp; 2个座位 <em>面议</em></div>

                </a><a href="tel:12365245256" class="iconfont tel"></a>
                <div class="over"></div>
            </li>

            <li class="a ">
                <a href="#">
                    <div class="user">
                        <img src="/images/0(6)">聂正国 <i class="iconfont"></i>
                        <div class="type">车主</div>
                    </div>
                    <div class="y time">时间：2017-10-14 05:48:00</div>
                    <div class="y from">路线：<em>织里</em> <i></i><em>潜山</em></div>
                    <div class="y re">其它：小轿车&nbsp; 3个座位 <em>100元</em></div>

                </a><a href="tel:13525252525" class="iconfont tel"></a>
                <div class="over"></div>
            </li>

        </ul>
    </div>
    <button class="ui-btn">点击加载更多</button>
    <div class="list_loading" style="display: none"><div class="ll_box"><div class="loadingAn"></div><div class="ll_txt">更多数据加载中</div></div></div>
</div>


<div id="b-menu" class="animated fadeInUp">
    <a href="/home/index" style="width: 33%"><i class="iconfont"></i>首页</a>
    <a href="/home/publish" class="sel" style="width: 34%"><i class="iconfont"></i>发布</a>
    <a href="/home/my" style="width: 33%"><i class="iconfont"></i>我的</a>
</div>

</body>
</html>
<script>
    $(function () {
        $.ajax({
            type: "get",
            url: "/home/get-list",
            dataType: "json",
            beforeSend:function () {
                $('.list_loading').show();
            },
            success: function (data) {
                if(data && data.status === true){
                    $.each(data.list,function (index,item) {
                        var appendHtml = '<li class="a ">';
                        appendHtml+='<a href="">';
                        appendHtml+='<div class="user">';
                        appendHtml+='<img src="/images/0">'+item.contact_name+'<i class="iconfont"></i>';
                        appendHtml+='<div class="type type2">乘客</div></div>';
                        appendHtml+='<div class="y time">时间：'+item.start_time+'</div>';
                        appendHtml+='<div class="y from">路线：<em>'+item.from_address+'</em> <i></i><em>'+item.to_address+'</em></div>';
                        appendHtml+='<div class="y re">其它：'+item.seat_num+'个人 <em>'+item.cost+'</em></div>';
                        appendHtml+='<div class="remark">'+item.remark+'</div>';
                        appendHtml+=' </a><a href="tel:'+item.contact_phone+'" class="iconfont tel"></a>';
                        appendHtml+='<div class="over"></div></li>';
                        $('#list ul').append(appendHtml);
                    });
                }else{
                    $("#message-warning").html(data.message).show(appendHtml);
                }
            },
            error: function () {
                alert("服务器出错！");
            },
            complete:function () {
                $('.list_loading').hide();
            }
        });
    })
</script>
