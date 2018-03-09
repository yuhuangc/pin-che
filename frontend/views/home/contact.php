<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2017/11/20
 * Time: 18:35:48
 */
?>

<!-- Page Title
================================================== -->
<div id="page-title">

    <div class="row">

        <div class="ten columns centered text-center">
<!--            <h1>联系我们<span></span></h1>-->

            <p>家是温柔港湾 你我停泊的港湾 风雨再大都不怕 只要有个温暖的家 祝大家拼车愉快！！！</p>
        </div>

    </div>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row page">

        <div id="primary" class="eight columns">

            <section>

                <h1>联系我们</h1>

                <p class="lead">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
                    nisi elit consequat ipsum </p>

                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
                    nisi elit consequat ipsum, nec sagitti </p>

                <div id="contact-form">

                    <!-- form -->
                    <form name="contactForm" id="contactForm" method="post" action="">
                        <fieldset>

                            <div class="half">
                                <label for="contactName">姓名 <span class="required">*</span></label>
                                <input name="contactName" type="text" id="contactName" size="35" value="" />
                            </div>

                            <div class="half pull-right">
                                <label for="contactEmail">Email <span class="required">*</span></label>
                                <input name="contactEmail" type="text" id="contactEmail" size="35" value="" />
                            </div>

                            <div>
                                <label for="contactSubject">主题</label>
                                <input name="contactSubject" type="text" id="contactSubject" size="35" value="" />
                            </div>

                            <div>
                                <label  for="contactMessage">内容 <span class="required">*</span></label>
                                <textarea name="contactMessage"  id="contactMessage" rows="15" cols="50" ></textarea>
                            </div>

                            <div>
                                <button class="submit">提 交</button>
                                <span id="image-loader">
                              <img src="/images/loader.gif" alt="" />
                           </span>
                            </div>

                        </fieldset>
                    </form> <!-- Form End -->

                    <!-- contact-warning -->
                    <div id="message-warning"></div>
                    <!-- contact-success -->
                    <div id="message-success">
                        <i class="icon-ok"></i>您的信息已经提交，谢谢!<br />
                    </div>

                </div>

            </section> <!-- section end -->

        </div>
        <?php $this->beginContent('@app/views/layouts/main_right.php', []); ?><?php $this->endContent(); ?>

    </div>

</div> <!-- Content End-->

