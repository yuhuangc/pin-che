<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2017/11/21
 * Time: 10:35:19
 */

/* @var $this yii\web\View*/
$this->title = '发布拼车信息';
?>
<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">

            <section>

                <div id="contact-form">

                    <fieldset>

                        <div class="half">
                            <label for="title">标题 <span class="required">*</span></label>
                            <input name="title" type="text" id="title" size="10" value="" />
                        </div>

                        <div class="half pull-right">
                            <label for="cost">费用 <span class="required">*</span></label>
                            <input name="cost" type="text" id="cost" size="10" value="" />
                        </div>

                        <div class="half">
                            <label for="place_departure">出发地 <span class="required">*</span></label>
                            <input name="place_departure" type="text" id="place_departure" size="10" value="" />
                        </div>

                        <div class="half pull-right">
                            <label for="destination">目的地 <span class="required">*</span></label>
                            <input name="destination" type="text" id="destination" size="10" value="" />
                        </div>

                        <div class="half">
                            <label for="departure_time">出发时间</label>
                            <input name="departure_time" type="date" id="departure_time" size="100" value="" />
                        </div>


                        <div class="half pull-right">
                            <label for="arrival_time">预计到达时间</label>
                            <input name="arrival_time" type="date" id="arrival_time" size="20" value="" />
                        </div>


                        <div class="half">
                            <label for="contact_name">联系人 <span class="required">*</span></label>
                            <input name="contact_name" type="text" id="contact_name" size="20" value="<?= Yii::$app->user->identity->username?>" />
                        </div>

                        <div class="half pull-right">
                            <label for="contact_mobile">联系电话</label>
                            <input name="contact_mobile" type="text" id="contact_mobile" size="100" value="<?= Yii::$app->user->identity->phone?>" />
                        </div>

                        <?php if (Yii::$app->user->identity->type == \common\models\UserFront::TYPE_DRIVER) {?>
                        <div>
                            <label for="car_models">车型</label>
                            <select id="car_models">
                                <option value="2">轿车</option>
                                <option value="3">SUV</option>
                            </select>
                        </div>
                        <?php }?>

                        <div>
                            <label for="remark">其他描述信息</label>
                            <input name="remark" type="text" id="remark" size="100" value="" />
                        </div>

                        <div>
                            <button id="btn-login">发 布</button>
                            <span id="image-loader">
                              <img src="/images/loader.gif" alt="" />
                           </span>
                        </div>

                    </fieldset>

                    <!-- login-warning -->
                    <div id="message-warning"></div>
                    <!-- login-success -->
                    <div id="message-success">
                        <i class="icon-ok"></i>发布成功<br />
                    </div>

                </div>

            </section> <!-- section end -->

        </div>
        <?php $this->beginContent('@app/views/layouts/main_right.php', []); ?><?php $this->endContent(); ?>
    </div>

</div> <!-- Content End-->

<script>
    $(function () {
        $("#btn-login").click(function () {
            $.ajax({
                type: "POST",
                url: "/home/create",
                data:
                    {
                        'title': $.trim($("#title").val()),
                        'cost': $.trim($("#cost").val()),
                        'place_departure': $.trim($("#place_departure").val()),
                        'destination': $.trim($("#destination").val()),
                        'departure_time': $.trim($("#departure_time").val()),
                        'car_models': $.trim($("#car_models").val()),
                        'arrival_time': $.trim($("#arrival_time").val()),
                        'contact_name': $.trim($("#contact_name").val()),
                        'contact_mobile': $.trim($("#contact_mobile").val()),
                        'remark': $.trim($("#remark").val()),
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

