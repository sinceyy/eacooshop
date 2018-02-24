<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"E:\WINS\phpStudy\WWW\EacooPHP-1.2.0\public/../apps/install\view\index\index.html";i:1508670972;s:70:"E:\WINS\phpStudy\WWW\EacooPHP-1.2.0\apps\install\view\public\base.html";i:1504774030;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $product_name; ?>系统安装</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="/EacooPHP-1.2.0/public/static/assets/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/EacooPHP-1.2.0/public/static/admin/css/AdminLTE.min.css"/>
<link type="text/css" rel="stylesheet" href="/EacooPHP-1.2.0/public/static/admin/css/_all-skins.min.css"/>
<link type="text/css" rel="stylesheet" href="/EacooPHP-1.2.0/public/static/assets/css/base.css"/>
<link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="/EacooPHP-1.2.0/public/static/assets/js/jquery-1.10.2.min.js"></script>
<style>
/*	body{font-family: "Microsoft Yahei",'新宋体';}*/
	.container{background: #ffffff; margin: 50px auto; padding: 20px 0; width: 1024px;}
	.header-title{border-bottom: 1px solid #dedede; margin-bottom: 10px;}
	.progress-tool{padding: 10px;}
	.progress{height: 30px;}
	.progress-bar{line-height: 30px; font-size: 14px;}
	.article{padding: 0 20px;}
	h1{font-size: 18px; color: #333333; font-weight: bold;}
	h2{font-size: 16px; color: #333333; font-weight: bold;}
</style>
</head>

<body style="background:  rgb(230, 234, 234)">
<div class="container">
	<div class="margin">
		<div class="text-center header-title margin-top">
			<h1><?php echo $product_name; ?>系统<?php if(session('update')): ?>升级<?php else: ?>安装<?php endif; ?></h1>
		</div>
		<div class="progress-tool">
			<div class="progress">
				<div class="progress-bar progress-bar-<?php echo $status['index']; ?> progress-bar-striped" style="width: 20%">
					<span>系统安装</span>
				</div>
				<div class="progress-bar progress-bar-<?php echo $status['check']; ?> progress-bar-striped" style="width: 20%">
					<span>环境检查</span>
				</div>
				<div class="progress-bar progress-bar-<?php echo $status['config']; ?> progress-bar-striped" style="width: 20%">
					<span>系统配置</span>
				</div>
				<div class="progress-bar progress-bar-<?php echo $status['sql']; ?> progress-bar-striped" style="width: 20%">
					<span>数据库安装</span>
				</div>
				<div class="progress-bar progress-bar-<?php echo $status['complete']; ?> progress-bar-striped" style="width: 20%">
					<span>安装完成</span>
				</div>
			</div>
		</div>
		<div class="article margin-top">
			
<div class="margin-top">

	<header>
		<h2 class="text-center"><?php echo $product_name; ?> 安装协议</h2>

	</header>
	
	<section class="article-content" >
		<div class="protocol">
	        <p>
	        版权所有 (c) 2016-2018，eacoo123.com保留所有权利。<br><br>
	        感谢您选择EacooPHP。希望我们的努力能为您提供一个简单.快速、高效.稳定的建站解决方案。<br>
	        EacooPHP官方网址为 <a href="<?php echo $company_website_domain; ?>" target="_blank"><?php echo $company_website_domain; ?></a>，产品交流社区网址为<a href="<?php echo $website_domain; ?>" target="_blank"><?php echo $website_domain; ?></a>。<br><br>
	        用户须知：本协议是您与Eacoo123.COM（以下简称EacooPHP）之间关于您使用EacooPHP公司提供的各种软件产品及服务的法律协议。无论您是个人或组织、盈利与否、用途如何（包括以学习和研究为目的），均需仔细阅读本协议，包括免除或者限制EacooPHP责任的免责条款及对您的
	        权利限制。请您审阅并接受或不接受本服务条款。如您不同意本服务条款或EacooPHP随时对其的修改，您应不使用或主动取消EacooPHP公司提供的相关产品。否则，您的任何对EacooPHP产品中的相关服务的注册、登陆、下载、查看等使用行为将被视为您对本服务条款全部的完全接受，包括接受EacooPHP对服务条款随时所做的任何修改。<br><br>
	        本服务条款一旦发生变更, EacooPHP将在网页上公布修改内容。修改后的服务条款一旦在网站管理后台上公布即有效代替原来的服
	        务条款。您可随时登陆EacooPHP官方论坛查阅最新版服务条款。如果您选择接受本条款，即表示您同意接受协议各项条件的约束。
	        如果您不同意本服务条款，则不能获得使用本服务的权利。您若有违反本条款规定，EacooPHP公司有权随时中止或终止您对EacooPHP产品的使用资格并保留追究相关法律责任的权利。<br><br>
	        在理解、同意、并遵守本协议的全部条款后，方可开始使用EacooPHP产品。您可能与EacooPHP公司直接签订另一书面协议，以补充
	        或者取代本协议的全部或者任何部分EacooPHP拥有EacooPHP的全部知识产权。本软件只供许可协议，并非出售。EacooPHP只允许您
	        在遵守本协议各项条款的情况下复制、下载、安装、使用或者以其他方式受益于本软件的功能或者知识产权。<br><br>
	        I. 协议许可的权利 <br><br>
	        您可以在完全遵守本许可协议的基础上，将本软件应用于商业用途，而不必支付软件版权许可费用。<br>
	        您可以在协议规定的约束和限制范围内修改EacooPHP产品源代码(如果被提供的话)或界面风格以适应您的网站要求，但必须保留软件版本信息的正常显示及相关连接正常。<br>
	        您拥有使用本软件构建的网站中全部会员资料、文章及相关信息的所有权，并独立承担与使用本软件构建的网站内容的
	        审核、注意义务，确保其不侵犯任何人的合法权益，独立承担因使用EacooPHP软件和服务带来的全部责任，若造成EacooPHP公司或
	        用户损失的，您应予以全部赔偿。 <br>
	        您可以从EacooPHP提供的应用市场服务中下载适合您网站的应用程序，但应向应用程序开发者/所有者支付相应的费用。<br><br>
	        II. 协议规定的约束和限制 <br><br>
	        禁止去除EacooPHP源码里的版权信息，商业授权版本可去除后台界面及前台界面的相关版权信息。<br>
	        禁止在EacooPHP整体或任何部分基础上发展任何派生版本、修改版本或第三方版本用于重新分发。<br><br>
	        </p>
	    </div>

	</section>
	<section class="text-center abstract">版权所有 (c) 2016-2018，保留所有权利。</section>
</div>
<hr>
<div class="margin-top">
	<div class="text-center">
		<a class="btn btn-primary" href="<?php echo url('install/index/check'); ?>">同意安装协议</a>
		<a class="btn btn-default" style="background: white;" href="<?php echo $website_domain; ?>">不同意</a>
	</div>
</div>

		</div>
	</div>
</div>
</body>
</html>