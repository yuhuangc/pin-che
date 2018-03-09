<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2017/11/21
 * Time: 10:35:19
 */

/* @var $this yii\web\View*/
$this->title = '用户登录';
?>
<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">

            <section>

                <div id="contact-form">

                        <fieldset>

                            <div>
                                <label for="username">用户名 <span class="required">*</span></label>
                                <input name="username" type="text" id="username" size="10" value="" />
                            </div>

                            <div>
                                <label for="password">密码 <span class="required">*</span></label>
                                <input name="password" type="password" id="password" size="20" value="" />
                            </div>

                            <div>
                                <button id="btn-login">登 录</button>
                                <span id="image-loader">
                              <img src="/images/loader.gif" alt="" />
                           </span>
                            </div>

                        </fieldset>

                    <!-- login-warning -->
                    <div id="message-warning"></div>
                    <!-- login-success -->
                    <div id="message-success">
                        <i class="icon-ok"></i>登录成功<br />
                    </div>

                </div>

            </section> <!-- section end -->

        </div>

    </div>

</div> <!-- Content End-->

<script>
$(function () {
    $("#btn-login").click(function () {
        $.ajax({
            type: "POST",
            url: "/home/login",
            data:
                {
                    'username': $.trim($("#username").val()),
                    'password': $.trim($("#password").val()),
                },
            dataType: "json",
            success: function (data) {
                if(data && data.success === true){
                   //$("#message-success").show();
                   window.location.href = 'index';
                }else{
                    $("#message-warning").html(data.message).show();
                }
            },
            error: function () {
                alert("服务器出错！");
            }
        });
    });
})
</script>

