<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2017/11/21
 * Time: 10:35:19
 */

/* @var $this yii\web\View*/
$this->title = '用户注册';
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
                            <label for="phone">手机号码 <span class="required">*</span></label>
                            <input name="phone" type="text" id="phone" size="10" value="" />
                        </div>

                        <div>
                            <label for="type">用户类型 <span class="required">*</span></label>
                            <select id="type">
                                <option value="1">车主</option>
                                <option value="2">乘客</option>
                            </select>
                        </div>

                        <div>
                            <label for="email">邮箱 <span class="required">*</span></label>
                            <input name="email" type="text" id="email" size="10" value="" />
                        </div>

                        <div>
                            <label for="signature">个性签名</label>
                            <input name="signature" type="text" id="signature" size="100" value="" />
                        </div>

                        <div>
                            <label for="password">密码 <span class="required">*</span></label>
                            <input name="password" type="password" id="password" size="20" value="" />
                        </div>

                        <div>
                            <label for="re_password">确认密码 <span class="required">*</span></label>
                            <input name="re_password" type="password" id="re_password" size="20" value="" />
                        </div>

                        <div>
                            <button id="btn-login">注 册</button>
                            <span id="image-loader">
                              <img src="/images/loader.gif" alt="" />
                           </span>
                        </div>

                    </fieldset>

                    <!-- login-warning -->
                    <div id="message-warning"></div>
                    <!-- login-success -->
                    <div id="message-success">
                        <i class="icon-ok"></i>注册成功<br />
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
                url: "/home/signup",
                data:
                    {
                        'username': $.trim($("#username").val()),
                        'phone': $.trim($("#phone").val()),
                        'type': $.trim($("#type").val()),
                        'email': $.trim($("#email").val()),
                        'signature': $.trim($("#signature").val()),
                        'password': $.trim($("#password").val()),
                        're_password': $.trim($("#re_password").val()),
                    },
                dataType: "json",
                success: function (data) {
                    if(data && data.success === true){
                        $("#message-success").show();
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

