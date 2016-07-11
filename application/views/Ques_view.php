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
<body class="topic">
	<div class="container-fluid">
		<div class="headernav">
			<div class="container">
				<div class="row">
					<div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.jpg" alt=""  /></a></div>
					<div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
						<div class="dropdown">
							<a href="<?php echo base_url();?>" >Forum Edo</a>
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
						<?php
						if($isLogin === "notlogged"){
							echo "
							<div class=\"pull-right\">
							</div>
							<div class=\"btn-group pull-right\">
								<button type=\"button\" class=\"btn btn-primary dropdown-toggle \" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
									Sign up / Log in <span class=\"caret\"></span>
								</button>
								<ul class=\"dropdown-menu\">
									<li><a href='".base_url()."index.php/member/add_member_view'>Sign up</a></li>
									<li role=\"separator\" class=\"divider\"></li>
									<li><a href='".base_url()."index.php/member/login_view'>Log in</a></li>
								</ul>
							</div>
							";
						} else {
							echo "
							<div class=\"env pull-left\"><i class=\"fa fa-envelope\"></i></div>
							<div class=\"avatar pull-left dropdown\">
								<a data-toggle=\"dropdown\" href=\"#\"><img src=\"".base_url()."assets/images/member/".$mem_loginpic."\" alt=\"\" /></a> <b class=\"caret\"></b>
								<div class=\"status green\">&nbsp;</div>
								<ul class=\"dropdown-menu\" role=\"menu\">
									<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-3\" href='".base_url()."index.php/member/logout'>Log out</a></li>
								</ul>
							</div>
							";
						}
						?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 breadcrumbf">
						<a href="<?php echo base_url()?>">Forum</a> <span class="diviver">&gt;</span> <a>Question Detail</a>
					</div>
				</div>
			</div>


			<div class="container">
				<div class="row">
					<!-- <div class="col-lg-8 col-md-8"> -->
					<div>

						<!-- POST -->
						<div class="post beforepagination">
							<div class="topwrap">
								<div class="userinfo pull-left">
									<div class="avatar">
										<img src="<?php echo base_url(),"assets/images/member/",$question[0]->mem_pic?>" alt="" />
										<div class="status green">&nbsp;</div>
									</div>
									<div class="icons" style="word-wrap: break-word;font-size:13px;">
										<!--
										<img src=\"assets/images/icon3.jpg\" alt=\"\" /><img src=\"assets/images/icon4.jpg\" alt=\"\" /><img src=\"assets/images/icon5.jpg\" alt=\"\" /><img src=\"assets/images/icon6.jpg\" alt=\"\" />
									-->
									<b><?php echo $question[0]->mem_name ?></b>
								</div>
							</div>
							<div class="posttext pull-left">
								<h2>
									<?php
									echo $question[0]->ques_title;
									?>
								</h2>
								<p>
									<?php
									echo $question[0]->ques_content;
									?>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>                              
						<div class="postinfobot">

							<div class="likeblock pull-left">
								<a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>25</a>
								<a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>3</a>
							</div>

								<!-- <div class="prev pull-left">                                        
									<a href="#"><i class="fa fa-reply"></i></a>
								</div> -->

								<div class="posted pull-right"><i class="fa fa-clock-o"></i> Posted on : <?php echo date("F j, Y, g:i a",strtotime($question[0]->ques_createdat)) ?></div>

								<!-- <div class="next pull-right">                                        
									<a href="#"><i class="fa fa-share"></i></a>

									<a href="#"><i class="fa fa-flag"></i></a>
								</div> -->

								<div class="clearfix"></div>
							</div>
						</div><!-- POST -->

						<br>
						<br>
						<h2>Answers</h2>
						<br>
						<?php 
						foreach($answers as $a){
							echo "
							<div class=\"post\">
								<div class=\"topwrap\">
									<div class=\"userinfo pull-left\">
										<div class=\"avatar\">
											<img src=\"".base_url()."assets/images/member/".$a->mem_pic."\" alt=\"\" />
											<div class=\"status red\">&nbsp;</div>
										</div>

										<div class=\"icons\" style=\"word-wrap: break-word;font-size:13px\">
											<b>". $a->mem_name ."</b>
										</div>
									</div>
									<div class=\"posttext pull-left\">
										<p>$a->ans_content</p>
									</div>
									<div class=\"clearfix\"></div>
								</div>                              
								<div class=\"postinfobot\">

									<div class=\"likeblock pull-left\">
										<a href=\"#\" class=\"up\"><i class=\"fa fa-thumbs-o-up\"></i>55</a>
										<a href=\"#\" class=\"down\"><i class=\"fa fa-thumbs-o-down\"></i>12</a>
									</div>

									<!--
									<div class=\"prev pull-left\">                                        
										<a href=\"#\"><i class=\"fa fa-reply\"></i></a>
									</div>
								-->

								<div class=\"posted pull-right\"><i class=\"fa fa-clock-o\"></i> Posted on : ". date("F j, Y, g:i a",strtotime($a->ans_createdat)) ."</div>

								<!--
								<div class=\"next pull-right\">                                        
									<a href=\"#\"><i class=\"fa fa-share\"></i></a>

									<a href=\"#\"><i class=\"fa fa-flag\"></i></a>
								</div>
							-->

							<div class=\"clearfix\"></div>
						</div>
					</div><!-- POST -->
					";
				}
				?>


				<br><br>
				<!-- POST -->
				
				<?php
				if($isLogin === "logged"){
					echo "<h4>Your Answer</h4>";
					echo "<div class=\"post\">";
					echo form_open('question/add_ans/'.$question[0]->ques_id);
					echo "	
					<div class=\"topwrap\">
						<div class=\"userinfo pull-left\">
							<div class=\"avatar\">
								<img src=\"".base_url()."assets/images/member/".$mem_loginpic."\" alt=\"\" />
								<div class=\"status green\">&nbsp;</div>
							</div>

							<div class=\"icons\" style=\"word-wrap: break-word;font-size:13px\">
								<b>". $mem_name ."</b>
							</div>
						</div>
						<div class=\"posttext pull-left\">
							<div class=\"textwraper\">
								<div class=\"postreply\">Post your Answer</div>
								<textarea name=\"reply\" id=\"reply\" placeholder=\"Type your message here\" required></textarea>
								<script>
									var config = {};
									config.placeholder = \"Type your message here ...\";
									CKEDITOR.replace(\"reply\", config);

								</script>
							</div>
						</div>
						<div class=\"clearfix\"></div>
					</div>                              
					<div class=\"postinfobot\">

						<div class=\"notechbox pull-left\">
							<input type=\"checkbox\" name=\"note\" id=\"note\" class=\"form-control\" />
						</div>

						<div class=\"pull-left\">
							<label for=\"note\"> Email me when some one post a reply</label>
						</div>

						<div class=\"pull-right postreply\">
							<div class=\"pull-left\"><button type=\"submit\" class=\"btn btn-primary\">Post Your Answer</button></div>
							<div class=\"clearfix\"></div>
						</div>

						<div class=\"clearfix\"></div>
					</div>
					";
				} else {
					echo "
					<div style=\"font-size: 1.2em;\">
						<a href=\"",base_url(),"index.php/member/add_member_view\">Sign up
						</a> 
						or 
						<a href=\"",base_url(),"index.php/member/login_view\"\">Log in
						</a>
						to post your answer.
					</div>
					<br><br>
					";
					echo "<div class=\"post\">";
				}
				?>
				<?php echo form_close(); ?>
			</div><!-- POST -->
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
<script src="assets/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		if(document.getElementById('reply') === null){
			var docHeight = $(window).height();
			var contentHeight = $('.content').height();
			var footerTop = $('footer').position().top;

			if (footerTop < docHeight) {
				$('.content').css('height', contentHeight -69+ (docHeight - footerTop) + 'px');
			}
		}
	});
</script>
</body>
</html>