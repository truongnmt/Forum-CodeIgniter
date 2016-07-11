<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forum EDO :: Home Page</title>
	<!-- http://forum.azyrusthemes.com/index.html -->
	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- http://localhost/forum/css/bootstrap.min.css -->
	<!-- Custom -->
	<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome-4.6.3/css/font-awesome.min.css">

	<!-- CSS STYLE-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css" media="screen" />
	<script src="<?php echo base_url();?>assets/js/ckeditor/ckeditor.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="headernav">
			<div class="container">
				<div class="row">
					<div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.jpg" alt=""  /></a></div>
					<div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
						<div class="dropdown">
							<a href="<?php echo base_url();?>">Forum Edo</a> 
						</div>
					</div>
					<div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
						<div class="wrap">
							<form action="#" method="post" class="form">
								<div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
								<div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
						<div class="stnt pull-left">                            
							<?php echo form_open('question/new'); ?>
							<button class="btn btn-primary">New Topic</button>
							<?php echo form_close(); ?>
						</div>
						<div class="env pull-left"><i class="fa fa-envelope"></i></div>

						<div class="avatar pull-left dropdown">
							<a data-toggle="dropdown" href="#"><img src="<?php echo base_url() ,"assets/images/member/", $mem_loginpic?>" alt="" /></a> <b class="caret"></b>
							<div class="status green">&nbsp;</div>
							<ul class="dropdown-menu" role="menu" >
								<li role="presentation"><a role="menuitem" tabindex="-3" href="<?php echo base_url();?>index.php/member/logout">Log Out</a></li>
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 breadcrumbf">
						<a href="<?=base_url()?>">Forum</a> <span class="diviver">&gt;</span> <a>Add Question</a>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<!-- <div class="col-lg-8 col-md-8"> -->
					<div>
						<!-- POST -->
						<div class="post">
							<?php 
							$attributes = array('class' => 'form newtopic');
							echo form_open('question/add_ques', $attributes);
							?>	
							<div class="topwrap">
								<div class="userinfo pull-left">
									<div class="avatar">
										<img src="<?php echo base_url() ,"assets/images/member/", $mem_loginpic ?>" alt="" />
										<div class="status green">&nbsp;</div>
									</div>

									<div class="icons" style="word-wrap: break-word;font-size:13px">
										<b><?php echo $mem_name ?></b>
									</div>
								</div>
								<div class="posttext pull-left">

									<div>
										<label for="title">Enter Topic Title: *</label>
										<input type="text" name="title" class="form-control" required value="<?php echo set_value('title');?>"/>
										<div class="err" id="title_err">
											<?php echo form_error('title')?>
										</div>
									</div>

									<!-- <div class="row">
										<div class="col-lg-6 col-md-6">
											<select name="category" id="category"  class="form-control" >
												<option value="" disabled selected>Select Category</option>
												<option value="op1">Option1</option>
												<option value="op2">Option2</option>
											</select>
										</div>
										<div class="col-lg-6 col-md-6">
											<select name="subcategory" id="subcategory"  class="form-control" >
												<option value="" disabled selected>Select Subcategory</option>
												<option value="op1">Option1</option>
												<option value="op2">Option2</option>
											</select>
										</div>
									</div> -->

									<div>
										<br>
										<label for="content">Enter Question Description: *</label>
										<textarea name="content" placeholder="Description" class="form-control" required value="<?php echo set_value('content');?>"></textarea>
										<script>
											var config = {};
											config.placeholder = "Type your message here ...";
											CKEDITOR.replace("content", config);
										</script>
										<div class="err" id="content_err">
											<?php echo form_error('content')?>
										</div>

										<br><br>
										<label for="tag">Enter Topic Tags:</label>
										<input type="text" name="tag" placeholder="Enter Topic Tags" class="form-control" value="<?php echo set_value('tag');?>"></textarea>
									</div>
								</div>
							</div>                              
							<div class="postinfobot">

								<div class="notechbox pull-left">
									<input type="checkbox" name="note" id="note" class="form-control" />
								</div>

								<div class="pull-left">
									<label for="note"> Email me when some one post a reply</label>
								</div>

								<div class="pull-right postreply">
									<div class="pull-left"><button type="submit" class="btn btn-primary">Post Your Question</button></div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php echo form_close(); ?>
						</div><!-- POST -->
						<br><br><br><br><br><br><br><br><br>
					</div>
					<!-- <div class="col-lg-4 col-md-4">
						<div class="sidebarblock">
							<h3>Categories</h3>
							<div class="divline"></div>
							<div class="blocktxt">
								<ul class="cats">
									<li><a href="#">Trading for Money <span class="badge pull-right">20</span></a></li>
									<li><a href="#">Vault Keys Giveway <span class="badge pull-right">10</span></a></li>
									<li><a href="#">Misc Guns Locations <span class="badge pull-right">50</span></a></li>
									<li><a href="#">Looking for Players <span class="badge pull-right">36</span></a></li>
									<li><a href="#">Stupid Bugs &amp; Solves <span class="badge pull-right">41</span></a></li>
									<li><a href="#">Video &amp; Audio Drivers <span class="badge pull-right">11</span></a></li>
									<li><a href="#">2K Official Forums <span class="badge pull-right">5</span></a></li>
								</ul>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</section>

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-1 col-xs-3 col-sm-2 logo "><a href="#"><img src="<?php echo base_url();?>assets/images/logo.jpg" alt=""  /></a></div>
					<div class="col-lg-8 col-xs-9 col-sm-5 ">Copyrights 2016, FORUM.EDO.VN</div>
					<div class="col-lg-3 col-xs-12 col-sm-5 sociconcent">
						<ul class="socialicons">
							<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-cloud"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- get jQuery from the google apis -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			var docHeight = $(window).height();
			var contentHeight = $('.content').height();
			var footerTop = $('footer').position().top;

			if (footerTop < docHeight) {
				$('.content').css('height', contentHeight -69+ (docHeight - footerTop) + 'px');
			}
		});
	</script>
</body>
</html>