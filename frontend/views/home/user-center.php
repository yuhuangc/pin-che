<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2018/2/2
 * Time: 11:31
 */
?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0">
    <title>用户中心</title>
    <link rel="stylesheet" type="text/css" href="/css/user_center.css">
</head>

<body>

<header class="ui-header ui-header-positive ui-border-b" style="background-color: #FD6B71">
    <i style="" class="ui-icon-return" onclick="javascript:location.href = '/home/index'"></i>
    <i class="ui-icon-arrow"></i>
    <h1>用户中心</h1>
<!--    <button class="ui-btn">回</button>-->
</header>


<section class="ui-container">

    <ul style="margin-top: 15px;margin-bottom: 15px;" class="ui-list ui-border-tb">
        <li class="ui-border-t">
            <div class="ui-avatar-lg">
                <span style="background-image:url()"></span>
            </div>
            <div class="ui-list-info">
                <h4 style="padding-top: 10px;" class="ui-nowrap"></h4>
                <p style="color: #515151;font-size: 13px;" class="ui-nowrap">余额: 0 元</p>
            </div>
        </li>
    </ul>

    <ul class="ui-list ui-list-link ui-border-tb">

        <li class="ui-border-t" onclick="javascript:location.href = ">
            <div class="ui-list-thumb-s">
                <span style="background-image:url(/images/add.png)"></span>
            </div>
            <div class="ui-list-info">
                <h4 class="ui-nowrap">我发布的</h4>
            </div>
        </li>

        <li class="ui-border-t" onclick="javascript:location.href = ">
            <div class="ui-list-thumb-s">
                <span style="background-image:url(/images/mon.png)"></span>
            </div>
            <div class="ui-list-info">
                <h4 class="ui-nowrap">
                    充值中心</h4>
            </div>
        </li>


        <li class="ui-border-t" onclick="javascript:location.href = ">
            <div class="ui-list-thumb-s">
                <span style="background-image:url(/images/car_cert.png)"></span>
            </div>
            <div class="ui-list-info">
                <h4 class="ui-nowrap">车主认证</h4>
            </div>
        </li>
    </ul>

</section>


</body></html>
