<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2017/11/20
 * Time: 18:13:02
 */

/* @var $model common\models\PcTravel*/
/* @var $commentList array*/
/* @var $item common\models\PcComment*/
?>



<!-- Page Title
================================================== -->
<div id="page-title">

    <div class="row">

        <div class="ten columns centered text-center">
<!--            <h1>拼车详情<span></span></h1>-->

            <p> 家是温柔港湾
                你我停泊的港湾
                风雨再大都不怕
                只要有个温暖的家
                祝大家拼车愉快！！！
            </p>
        </div>

    </div>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">

            <article class="post">

                <div class="entry-header cf">

                    <h1><?= $model['title']?></h1>

                    <p class="post-meta">

                        <time class="date" datetime=""><?= $model['create_time']?></time>
                        /
                        <span class="categories">
                     <a href="#"><?= $model['contact_name']?></a>
                     </span>

                    </p>

                </div>

                <div class="post-thumb">
                    <img src="/images/post-image/post-image-1300x500-01.jpg" alt="post-image" title="post-image">
                </div>

                <div class="post-content">
                    <ul class="portfolio-meta-list">
                        <li><span>发布：</span><?= $model->createByModel->userType?></li>
                        <li><span>车型： </span><?= $model->carModels?></li>
                        <li><span>费用： </span><?= $model->cost?></li>
                        <li><span>出发日期： </span><?= date('Y/m/d', strtotime($model->departure_time))?></li>
                        <li><span>出发地：</span><?= $model->place_departure?></li>
                        <li><span>目的地：</span><?= $model->destination?></li>
                        <li><span>联系人：</span><?=$model->contact_name?></li>
                        <li><span>联系电话：</span><?=$model->contact_mobile?></li>
                    </ul>
                    <p class="lead"><?= $model->remark?></p>

                    <ul class="post-nav cf">
                        <li class="next"><strong>个性签名</strong>
                            <?= empty($model->createByModel->signature) ? '一切，从心开始' : $model->createByModel->signature?>
                        </li>
                    </ul>

                </div>

            </article> <!-- post end -->

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <h3>5 评论</h3>

                <!-- commentlist -->
                <ol class="commentlist">

                    <?php foreach ($commentList as $item) {?>
                        <div><?= $item->content?></div>
                    <?php }?>
                    <li class="depth-1">

                        <div class="avatar">
                            <img width="50" height="50" class="avatar" src="/images/user-01.png" alt="">
                        </div>

                        <div class="comment-info">
                            <cite>客串而已</cite>

                            <div class="comment-meta">
                                <time class="comment-time" datetime="">2017-11-21 15:15:58</time>
                                <span class="sep">/</span><a class="reply" href="javascript:;">回复</a>
                            </div>
                        </div>

                        <div class="comment-text">
                            <p>希望大家平平安安</p>
                        </div>

                    </li>

                    <li class="thread-alt depth-1">

                        <div class="avatar">
                            <img width="50" height="50" class="avatar" src="/images/user-03.png" alt="">
                        </div>

                        <div class="comment-info">
                            <cite>曼妙的兔子</cite>

                            <div class="comment-meta">
                                <time class="comment-time" datetime="2014-01-14T24:05">2017-11-21 15:16:49</time>
                                <span class="sep">/</span><a class="reply" href="javascript:;">回复</a>
                            </div>
                        </div>

                        <div class="comment-text">
                            <p>春节即将到来，希望大家一路顺风</p>
                        </div>

                        <ul class="children">

                            <li class="depth-2">

                                <div class="avatar">
                                    <img width="50" height="50" class="avatar" src="/images/user-03.png" alt="">
                                </div>

                                <div class="comment-info">
                                    <cite>奔跑的蜗牛</cite>

                                    <div class="comment-meta">
                                        <time class="comment-time" datetime="2014-01-14T25:05">2017-11-21 15:17:09</time>
                                        <span class="sep">/</span><a class="reply" href="javascript:;">回复</a>
                                    </div>
                                </div>

                                <div class="comment-text">
                                    <p>gogogo，一起走</p>
                                </div>

                                <ul class="children">

                                    <li class="depth-3">

                                        <div class="avatar">
                                            <img width="50" height="50" class="avatar" src="/images/user-03.png" alt="">
                                        </div>

                                        <div class="comment-info">
                                            <cite>天长地久</cite>

                                            <div class="comment-meta">
                                                <time class="comment-time" datetime="2014-01-14T25:15">2017-11-21 15:17:24</time>
                                                <span class="sep">/</span><a class="reply" href="javascript:;">回复</a>
                                            </div>
                                        </div>

                                        <div class="comment-text">
                                            <p>要的哦，到时候可以联系</p>
                                        </div>

                                    </li>

                                </ul>

                            </li>

                        </ul>

                    </li>

                    <li class="depth-1">

                        <div class="avatar">
                            <img width="50" height="50" class="avatar" src="/images/user-02.png" alt="">
                        </div>

                        <div class="comment-info">
                            <cite>夜的徽章</cite>

                            <div class="comment-meta">
                                <time class="comment-time" datetime="2014-01-14T25:15">2017-11-21 15:17:55</time>
                                <span class="sep">/</span><a class="reply" href="javascript:;">回复</a>
                            </div>
                        </div>

                        <div class="comment-text">
                            <p>可以可以，拼车不错</p>
                        </div>

                    </li>

                </ol> <!-- Commentlist End -->


                <!-- respond -->
                <div class="respond">

                    <h3>留下你的评论</h3>

                    <!-- form -->
                    <form name="contactForm" id="contactForm" method="post" action="">
                        <fieldset>

                            <div class="message cf">
                                <label  for="cMessage">评论内容 <span class="required">*</span></label>
                                <textarea name="cMessage"  id="cMessage" rows="10" cols="50" ></textarea>
                            </div>

                            <button type="submit" class="submit">提 交</button>

                        </fieldset>
                    </form> <!-- Form End -->

                </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

        </div>

        <div id="secondary" class="four columns end">

            <aside id="sidebar">

                <div class="widget widget_search">
                    <h5>Search</h5>
                    <form action="#">

                        <input class="text-search" type="text" onfocus="if (this.value == '搜索拼车信息...') { this.value = ''; }" onblur="if(this.value == '') { this.value = '搜索拼车信息...'; }" value="搜索拼车信息...">
                        <input type="submit" class="submit-search" value="">

                    </form>
                </div>

                <div class="widget widget_text">
                    <h5 class="widget-title">Text Widget</h5>
                    <div class="textwidget">Proin gravida nibh vel velit auctor aliquet.</div>
                </div>

                <div class="widget widget_categories">
                    <h5 class="widget-title">热门拼车评论</h5>6
                    <ul class="link-list cf">
                        <li><a href="#">深圳出发</a></li>
                        <li><a href="#">福永</a></li>
                        <li><a href="#">龙岗发车了</a></li>
                    </ul>
                </div>

                <div class="widget widget_tag_cloud">
                    <h5 class="widget-title">近期热门标签</h5>
                    <div class="tagcloud cf">
                        <a href="#">奚梦瑶</a>
                        <a href="#">攻守道</a>
                        <a href="#">马云</a>
                    </div>
                </div>

            </aside> <!-- Sidebar End -->

        </div> <!-- Comments End -->

    </div>

</div> <!-- Content End-->

<script>
    $('body').on('click', '.button', function() {
        $.ajax({
            type: "POST",
            url: "/home/save-comment",
            data:
                {
                    'content': $(this).siblings('textarea').val(),
                    'travel_id':'<?=$model->id?>',
                    'parent_id':''
                },
            dataType: "json",
            success: function (data) {
                if(data && data.success === true){
                    $(this).closest('#reply_div').remove();
                }else{
                    alert(data.message);
                }
            },
            error: function () {
                alert("服务器出错！");
            }
        });
    });

    $('.reply').click(function () {
        $('body').find('#reply_div').remove();
        if ($(this).closest('li').find('#reply_div').length == 0) {
            $(this).closest('.comment-info').
            after('<div id="reply_div"><textarea name="cMessage"  id="cMessage" rows="5" cols="50" ></textarea><button type="button" class="button">提 交</button></div>');
        }
    });

</script>