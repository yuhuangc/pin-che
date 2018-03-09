<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2018/2/2
 * Time: 10:14
 */
?>

<!DOCTYPE html>
<!-- saved from url=(0062)http://w.kuhou.net/index.php?s=/addon/pinche/mobile/add/mpid/1 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title>发布拼车信息</title>
    <link href="/css/base.css" rel="stylesheet">
    <link href="/css/base(1).css?v=3" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <script src="/js/jquery.js"></script>
    <script src="/js/base.js"></script>

    <link href="/css/pub.css" rel="stylesheet">
    <link href="/css/base(1).css?v=4" rel="stylesheet">
    <link href="/css/date.css?v=1" rel="stylesheet">
    <script src="/js/date.js"></script>
    <script src="/js/iscroll.js"></script>
    <link href="/css/jquery-labelauty.css" rel="stylesheet">
    <script src="/js/jquery-labelauty.js"></script>

    <script type="text/javascript">
        var lock = false;
        $(function () {
            $("#TopIndex").select();
            $("#CarType").select();
            $('#DepTime').date({theme: "datetime"});
            //$(".radio").labelauty();
            $("input[name='Type']").change(function () {
                $(".rSeat,.rPeople").hide();
                if ($(this).val() == "1")
                    $(".rSeat").show();
                else
                    $(".rPeople").show();
            })
            $("input[name='Type'][checked]").change();
        })

        function sub() {
            if (lock)
                return;

            var tel = $("#Tel").val();
            err = "";

            if ($("#DepTime").val().length == 0)
                err = '请填写出发时间';
            else if ($("#From").val().length == 0)
                err = '请填写出发地';
            else if ($("#To").val().length == 0)
                err = '请填写目的地';
            else if ($("#SeatCount:visible").length > 0 && $("#SeatCount").val().length == 0)
                err = '请填写可提供座位数';
            else if ($("#PeopleCount:visible").length > 0 && $("#PeopleCount").val().length == 0)
                err = '请填写提供人数';
            else if (tel.length < 5 || tel.length > 12)
                err = '联系电话必须为5-12字符';
            if (err != "") {
                $.toast(err, "ok");
                return false;
            }
            lock = true;

            $(".red-btn").attr("onclick", "");

            $.ajax({
                url: $("#form1").attr("action"),
                type: "post",
                data: $("#form1").serialize(),
                success: function (result) {
                    // result = $.parseJSON(result);
                    if (result.status) {
                        if(result.error!==''){
                            $.toast(result.error);
                        }
                        window.location = result.data;
                    }
                    else
                        $.toast(result.error);
                    lock = false;
                },
                error: function (result) {
                    $.toast(result);
                    lock = false;
                }
            });
            return false;

        }

        function rule() {
            $(".rule").toggle();
        }
    </script>


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

        .list .over {
            width: 80px;
            height: 50px;
            position: absolute;
            bottom: 50px;
            right: 80px;
            background: url(/Addons/pinche/View/Public/images/over.png) no-repeat;
            background-size: 100% auto;
        }

    </style>

<body id="pub">
<div class="header">
    <a class="back iconfont" href="javascript:;history.back(-1)"></a>
    <div class="tit">
        发布拼车信息
    </div>
</div>

<div class="wrap" id="main">

    <form action="#" id="form1">

        <div class="form">

            <div class="row rs">

                <div class="label">
                    类型
                </div>
                <div class="con">
                    <ul>
                        <li>
                            <input type="radio" id="labelauty-889998" class="radio labelauty" name="Type" value="1" checked=""  style="display: none;">
                            <label for="labelauty-889998">
                                <span class="labelauty-unchecked-image"></span>
                                <span class="labelauty-unchecked">我是车主</span>
                                <span class="labelauty-checked-image"></span>
                                <span class="labelauty-checked">我是车主</span>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="labelauty-75813" class="radio labelauty" name="Type" value="2" style="display: none;">
                            <label for="labelauty-75813">
                                <span class="labelauty-unchecked-image"></span>
                                <span class="labelauty-unchecked">我是乘客</span>
                                <span class="labelauty-checked-image"></span>
                                <span class="labelauty-checked">我是乘客</span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="row">
                <div class="label">
                    时间
                </div>
                <div class="con">
                    <input name="DepTime" type="text" id="DepTime" class="inp" placeholder="出发时间" value="">
                </div>
            </div>
            <div class="row">
                <div class="label">
                    从哪
                </div>
                <div class="con">
                    <input name="From" type="text" id="From" class="inp" value="">
                </div>
            </div>
            <div class="row">
                <div class="label">
                    到哪
                </div>
                <div class="con">
                    <input name="To" type="text" id="To" class="inp" value="">
                </div>
            </div>
            <div class="row" id="rPrice">
                <div class="label">
                    费用
                </div>
                <div class="con">
                    <input name="Money" type="text" id="Money" class="inp" placeholder="元 留空为面议" value="">
                </div>
            </div>
            <div class="row rSeat" style="display: block;">
                <div class="label">
                    座位
                </div>
                <div class="con">
                    <input name="SeatCount" type="text" id="SeatCount" class="inp" placeholder="个" value="">
                </div>
            </div>
            <div class="row  rSeat" style="display: block;">
                <div class="label">
                    车型
                </div>
                <div class="con">
                    <select id="CarType" name="CarType" class="select" style="display: none;">
                        <option value="0">请选择</option>
                        <option value="1">小轿车</option>
                        <option value="2">SUV</option>
                        <option value="3">微面</option>
                        <option value="4">货车</option>
                    </select>
                </div>
            </div>


            <div class="row rSeat" style="display: block;">
                <div class="label">
                    途经
                </div>
                <div class="con">
                    <input name="Through" type="text" id="Through" class="inp" placeholder="" value="">
                </div>
            </div>
            <div class="row rPeople" style="display:none">
                <div class="label">
                    人数
                </div>
                <div class="con">
                    <input name="PeopleCount" type="text" id="PeopleCount" class="inp" placeholder="个" value="">
                </div>
            </div>
            <div class="row textarea">
                <div class="label">备注</div>
                <div class="con">
                    <textarea class="" placeholder="比如对行李的要求等等" style="height:60px" id="Remark" name="Remark"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="label">
                    联系人
                </div>
                <div class="con">
                    <input name="Contact" type="text" id="Contact" class="inp" value="">
                </div>
            </div>
            <div class="row">
                <div class="label">
                    电话
                </div>
                <div class="con">
                    <input name="Tel" type="text" id="Tel" class="inp" value="">
                </div>
            </div>



            <div class="row">
                <div class="label">
                    置顶
                </div>
                <div class="con">
                    <select id="TopIndex" name="TopIndex" class="select" style="display: none;">
                        <option value="0">无需置顶</option>
                        <option value="1">置顶1天(0.1元)</option>
                        <option value="2">置顶3天(2元)</option>
                        <option value="3">置顶30天(10元)</option>
                    </select>
                </div>
            </div>



            <div class="row ru" style="padding-left: 0px;">
                <em style="display:block;margin: 0 auto;text-align: center !important;color: #FD6B71;">发布收费 0.01元/条</em>
            </div>


            <div class="row ru">
                <div class="label">

                </div>
                <div class="con">
                    <div class="sw"><input type="checkbox" class="cus_checkbox_1 small" name="IsRule" checked="checked" id="IsRule"><label for="IsRule"></label></div>
                    <em>我已阅读并同意 <a href="javascript:;" onclick="rule()">《拼车平台声明》</a></em>
                </div>
            </div>

            <div class="b-row">
                <a href="javascript:;" onclick="sub()" class="red-btn">提交</a>
                <input data-val="true" data-val-number="字段 Id 必须是一个数字。" data-val-required="Id 字段是必需的。" id="Id" name="Id" type="hidden" value="">
            </div>
        </div>

    <div id="datePlugin"></div>

    <div class="rule">
        <div class="mask"></div>
        <div class="d"><p>
                本拼车平台是一家非经营性网站和公益性信息平台，本身不进行商业运作。旨在为开车人、想拼车上下班，拼车上下学或出门旅游的人提供信息发布和配对平台。我们的宗旨是：减少交通拥堵，提高汽车的利用效率，减少环境污染；让您上下班更加方便省心，出门旅游更加便捷愉快。任何使用本平台的用户将被视为对本声明全部内容的认可；任何使用本平台的用户均应遵守中国的法律，不得侵犯他人的合法权益。在拼车的过程中，无论是开车人还是搭车人，都要注意自身的人身安全。在同意拼车前，各自需要对另一方的情况进行调查，判断。本网站不能对任何人提供任何形式的安全担保，一旦发生侵犯人身安全的事件，本平台不能承担任何责任。</p>
            <p>本平台保留下述权利：随时修改、删除在本平台发布的任何信息；随时停止本网站提供的服务；公安司法部门在对本平台上出现的不良信息进行调查时，向相关部门提供信息发布者的IP地址以及其他信息。</p>
            <p>
                再次提醒您：为保障车主和乘客双方权益，可以要求对方出示相关身份证明，并在启程前双方协商好各项事宜。平台内各项拼车信息均为网友自行发布，网上信息有风险，在实际拼车过程中，请您务必保持警惕！本平台概不负任何责任。</p>

            <br>


        </div>
        <a href="javascript:;" onclick="rule()">
            <!--<button style="margin: 0 auto;border: 0px;-->
            <!--background: #E22630;-->
            <!--color: #fff!important;-->
            <!--padding: 6px;-->
            <!--display: block;-->
            <!--text-align: center;-->
            <!--border-radius: 4px;">我知道了</button>-->

            <i class="iconfont"></i>
        </a>


    </div>

</div>


<div id="b-menu" class="animated fadeInUp">
    <a href="/home/index" style="width: 33%"><i class="iconfont"></i>首页</a>
    <a href="/home/publish" class="sel" style="width: 34%"><i class="iconfont"></i>发布</a>
    <a href="/home/my" style="width: 33%"><i class="iconfont"></i>我的</a>
</div>

</body></html>

