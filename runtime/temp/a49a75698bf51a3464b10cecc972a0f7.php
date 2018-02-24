<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"E:\WINS\phpStudy\WWW\EacooPHP-1.2.0\public/../apps/install\view\index\check.html";i:1518759424;s:70:"E:\WINS\phpStudy\WWW\EacooPHP-1.2.0\apps\install\view\public\base.html";i:1504774030;}*/ ?>
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
			
<script type="text/javascript" src="/EacooPHP-1.2.0/public/static/libs/layer/layer.js"></script>
	<h1>环境检测</h1>

	<table class="table table-hover table-bordered">
		<caption><h2>运行环境检查</h2></caption>
		<thead>
			<tr>
				<th>项目</th>
				<th>所需配置</th>
				<th>当前配置</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($env) || $env instanceof \think\Collection || $env instanceof \think\Paginator): $i = 0; $__LIST__ = $env;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><?php echo $item[0]; ?></td>
					<td><?php echo $item[1]; ?></td>
					<td><span class="badge <?php echo $item[4]; ?>"><?php echo $item[3]; ?></span></td>       
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<?php if(isset($dirfile)): ?>
	<table class="table table-hover table-bordered">
		<caption><h2>目录、文件权限检查</h2></caption>
		<thead>
			<tr>
				<th>目录/文件</th>
				<th>所需状态</th>
				<th>当前状态</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($dirfile) || $dirfile instanceof \think\Collection || $dirfile instanceof \think\Paginator): $i = 0; $__LIST__ = $dirfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><?php echo $item[3]; ?></td>
					<td>可写</td>
					<td><span class="badge <?php echo $item[2]; ?>"><?php echo $item[1]; ?></span></td>
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<?php endif; ?>
	<table class="table table-hover table-bordered">
		<caption><h2>函数依赖性检查</h2></caption>
		<thead>
			<tr>
				<th>函数名称</th>
				<th>检查结果</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($func) || $func instanceof \think\Collection || $func instanceof \think\Paginator): $i = 0; $__LIST__ = $func;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><?php echo $item[0]; ?>()</td>
					<td><span class="badge <?php echo $item[2]; ?>"><?php echo $item[1]; ?></span></td>
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<div class="margin-top">
		<div class="text-center">
		    <a class="btn btn-primary ajax-post" href="javascript:void(0);">下一步</a>
		    <a class="btn btn-default" href="<?php echo url('install/index/index'); ?>">上一步</a>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			$(".ajax-post").click(function(){
				$.post("<?php echo url('install/index/check'); ?>",function(result){
					if(result.code==1){
						window.location.href=result.url
					}else{
						 layer.msg(result.msg, {shift: 6});
					}
				})
			})
		});
	</script>


		</div>
	</div>
</div>
</body>
</html>