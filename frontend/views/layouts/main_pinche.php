<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

    <!--- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/media-queries.css">

    <!-- Script
    ================================================== -->
    <script src="/js/modernizr.js"></script>

    <script src="/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
    <script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>

    <script src="/js/jquery.flexslider.js"></script>
    <script src="/js/doubletaptogo.js"></script>
<!--    <script src="/js/init.js"></script>-->

    <?php $this->endBody() ?>
    <!-- Favicons ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" >

</head>

<body>
<?php $this->beginBody() ?>

<!-- Header
================================================== -->
<header>

    <div class="row">

        <div class="twelve columns">

<!--            <div class="logo">-->
<!--                <a href="index"><img alt="" src="/images/logo.png"></a>-->
<!--            </div>-->

            <nav id="nav-wrap">

                <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
                <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

                <ul id="nav" class="nav">

                    <li><a href="/">首页</a></li>
<!--                    <li class="current"><span><a href="test">test</a></span>-->
<!--                        <ul>-->
<!--                            <li><a href="test1">test1</a></li>-->
<!--                            <li><a href="test2">test2</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li><span><a href="test3">test3</a></span>-->
<!--                        <ul>-->
<!--                            <li><a href="test4">test4</a></li>-->
<!--                            <li><a href="test5">test5</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <li><a href="/home/about">关于我们</a></li>
                    <li><a href="/home/contact">联系我们</a></li>
                    <?php
                    if (Yii::$app->user->isGuest) {
                        echo '<li><a href="/home/signup">注册</a></li><li><a href="login">登录</a></li>';
                    } else {
                        echo '<li><a href="/home/create">发布拼车</a></li>';
                        echo '<li><a href="/home/logout">注销 ('.Yii::$app->user->identity->username.')'.'</a></li>';
                    }
                    ?>
                </ul> <!-- end #nav -->

            </nav> <!-- end #nav-wrap -->

        </div>

    </div>

</header> <!-- Header End -->

<div class="wrap">
    <?= $content ?>
</div>

<!-- footer
================================================== -->
<footer>

    <div class="row">

        <div class="twelve columns">

            <ul class="footer-nav">
                <li><a href="/">首页</a></li>
                <li><a href="/home/about">关于我们</a></li>
                <li><a href="/home/contact">联系我们</a></li>
                <?php
                if (Yii::$app->user->isGuest) {
                    echo '<li><a href="/home/signup">注册</a></li><li><a href="login">登录</a></li>';
                } else {
                    echo '<li><a href="/home/create">发布拼车</a></li>';
                    echo '<li><a href="/home/logout">注销 ('.Yii::$app->user->identity->username.')'.'</a></li>';
                }
                ?>
            </ul>

            <ul class="copyright">
                <!--<li>&copy; 2017 Sparrow</li> -->
                <li>设计 <a title="Styleshout" href="#">客串而已</a></li>
                <li>交流QQ群 <a rel="nofollow" href="#">235165279</a></li>
            </ul>

        </div>

        <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

    </div>

</footer> <!-- Footer End-->

</body>
</html>
<?php $this->endPage() ?>
