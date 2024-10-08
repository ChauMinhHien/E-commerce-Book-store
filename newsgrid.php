<?php
include './config.php';
function loadClass($name)
{
	if (is_file("model/$name.php"))
		include "model/$name.php";
	else {
		echo 'not found';
	}
}
spl_autoload_register('loadClass');
$category = new Category();
$dataCat = $category->all();
$book=new Book();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <title>Book Library</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<?php include 'nav.php'?>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>News &amp; Articles</h1>
							<ol class="tg-breadcrumb">
								<li><a href="javascript:void(0);">home</a></li>
								<li class="tg-active">News</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					News Grid Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">
									<div class="tg-newsgrid">
										<div class="tg-sectionhead">
											<h2><span>Latest News &amp; Articles</span>What's Hot in The News</h2>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-01.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-02.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-03.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-04.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-05.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-06.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-07.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-08.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-09.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-10.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-11.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-12.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-13.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-14.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure><a href="javascript:void(0);"><img src="images/blog/img-15.jpg" alt="image description"></a></figure>
													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">Adventure</a></li>
															<li><a href="javascript:void(0);">Fun</a></li>
														</ul>
														<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
														<div class="tg-posttitle">
															<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
														</ul>
													</div>
												</article>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetsearch">
										<form class="tg-formtheme tg-formsearch">
											<div class="form-group">
												<button type="submit"><i class="icon-magnifier"></i></button>
												<input type="search" name="search" class="form-group" placeholder="Search Here">
											</div>
										</form>
									</div>
									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Categories</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li><a href="javascript:void(0);"><span>Art &amp; Photography</span><em>28245</em></a></li>
												<li><a href="javascript:void(0);"><span>Biography</span><em>4856</em></a></li>
												<li><a href="javascript:void(0);"><span>Children’s Book</span><em>8654</em></a></li>
												<li><a href="javascript:void(0);"><span>Craft &amp; Hobbies</span><em>6247</em></a></li>
												<li><a href="javascript:void(0);"><span>Crime &amp; Thriller</span><em>888654</em></a></li>
												<li><a href="javascript:void(0);"><span>Fantasy &amp; Horror</span><em>873144</em></a></li>
												<li><a href="javascript:void(0);"><span>Fiction</span><em>18465</em></a></li>
												<li><a href="javascript:void(0);"><span>Fod &amp; Drink</span><em>3148</em></a></li>
												<li><a href="javascript:void(0);"><span>Graphic, Anime &amp; Manga</span><em>77531</em></a></li>
												<li><a href="javascript:void(0);"><span>Science Fiction</span><em>9247</em></a></li>
												<li><a href="javascript:void(0);"><span>View All</span></a></li>
											</ul>
										</div>
									</div>
									<div class="tg-widget tg-widgettrending">
										<div class="tg-widgettitle">
											<h3>Trending Posts</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-04.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-05.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-06.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-07.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
											</ul>
										</div>
									</div>
									<div class="tg-widget tg-widgetinstagram">
										<div class="tg-widgettitle">
											<h3>Instagram</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li>
													<figure>
														<img src="images/instagram/img-01.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-02.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-03.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-04.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-05.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-06.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-07.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-08.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-09.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
											</ul>
										</div>
									</div>
									<div class="tg-widget tg-widgetblogers">
										<div class="tg-widgettitle">
											<h3>Top Bloogers</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li>
													<div class="tg-author">
														<figure><a href="javascript:void(0);"><img src="images/author/imag-03.jpg" alt="image description"></a></figure>
														<div class="tg-authorcontent">
															<h2><a href="javascript:void(0);">Jude Morphew</a></h2>
															<span>21,658 Published Books</span>
														</div>
													</div>
												</li>
												<li>
													<div class="tg-author">
														<figure><a href="javascript:void(0);"><img src="images/author/imag-03.jpg" alt="image description"></a></figure>
														<div class="tg-authorcontent">
															<h2><a href="javascript:void(0);">Jude Morphew</a></h2>
															<span>21,658 Published Books</span>
														</div>
													</div>
												</li>
												<li>
													<div class="tg-author">
														<figure><a href="javascript:void(0);"><img src="images/author/imag-03.jpg" alt="image description"></a></figure>
														<div class="tg-authorcontent">
															<h2><a href="javascript:void(0);">Jude Morphew</a></h2>
															<span>21,658 Published Books</span>
														</div>
													</div>
												</li>
												<li>
													<div class="tg-author">
														<figure><a href="javascript:void(0);"><img src="images/author/imag-03.jpg" alt="image description"></a></figure>
														<div class="tg-authorcontent">
															<h2><a href="javascript:void(0);">Jude Morphew</a></h2>
															<span>21,658 Published Books</span>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</aside>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					News Grid End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-footerarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-clientservices">
								<li class="tg-devlivery">
									<span class="tg-clientserviceicon"><i class="icon-rocket"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Fast Delivery</h3>
										<p>Shipping Worldwide</p>
									</div>
								</li>
								<li class="tg-discount">
									<span class="tg-clientserviceicon"><i class="icon-tag"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Open Discount</h3>
										<p>Offering Open Discount</p>
									</div>
								</li>
								<li class="tg-quality">
									<span class="tg-clientserviceicon"><i class="icon-leaf"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Eyes On Quality</h3>
										<p>Publishing Quality Work</p>
									</div>
								</li>
								<li class="tg-support">
									<span class="tg-clientserviceicon"><i class="icon-heart"></i></span>
									<div class="tg-titlesubtitle">
										<h3>24/7 Support</h3>
										<p>Serving Every Moments</p>
									</div>
								</li>
							</ul>
						</div>
						<div class="tg-threecolumns">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol">
									<strong class="tg-logo"><a href="javascript:void(0);"><img src="images/flogo.png" alt="image description"></a></strong>
									<ul class="tg-contactinfo">
										<li>
											<i class="icon-apartment"></i>
											<address>Suit # 07, Rose world Building, Street # 02, AT246T Manchester</address>
										</li>
										<li>
											<i class="icon-phone-handset"></i>
											<span>
												<em>0800 12345 - 678 - 89</em>
												<em>+4 1234 - 4567 - 67</em>
											</span>
										</li>
										<li>
											<i class="icon-clock"></i>
											<span>Serving 7 Days A Week From 9am - 5pm</span>
										</li>
										<li>
											<i class="icon-envelope"></i>
											<span>
												<em><a href="mailto:support@domain.com">support@domain.com</a></em>
												<em><a href="mailto:info@domain.com">info@domain.com</a></em>
											</span>
										</li>
									</ul>
									<ul class="tg-socialicons">
										<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
										<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgetnavigation">
									<div class="tg-widgettitle">
										<h3>Shipping And Help Information</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li><a href="javascript:void(0);">Terms of Use</a></li>
											<li><a href="javascript:void(0);">Terms of Sale</a></li>
											<li><a href="javascript:void(0);">Returns</a></li>
											<li><a href="javascript:void(0);">Privacy</a></li>
											<li><a href="javascript:void(0);">Cookies</a></li>
											<li><a href="javascript:void(0);">Contact Us</a></li>
											<li><a href="javascript:void(0);">Our Affiliates</a></li>
											<li><a href="javascript:void(0);">Vision &amp; Aim</a></li>
										</ul>
										<ul>
											<li><a href="javascript:void(0);">Our Story</a></li>
											<li><a href="javascript:void(0);">Meet Our Team</a></li>
											<li><a href="javascript:void(0);">FAQ</a></li>
											<li><a href="javascript:void(0);">Testimonials</a></li>
											<li><a href="javascript:void(0);">Join Our Team</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgettopsellingauthors">
									<div class="tg-widgettitle">
										<h3>Top Selling Authors</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li>
												<figure><a href="javascript:void(0);"><img src="images/author/imag-09.jpg" alt="image description"></a></figure>
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Jude Morphew</a></h4>
													<p>21,658 Published Books</p>
												</div>
											</li>
											<li>
												<figure><a href="javascript:void(0);"><img src="images/author/imag-10.jpg" alt="image description"></a></figure>
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Shaun Humes</a></h4>
													<p>20,257 Published Books</p>
												</div>
											</li>
											<li>
												<figure><a href="javascript:void(0);"><img src="images/author/imag-11.jpg" alt="image description"></a></figure>
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Kathrine Culbertson</a></h4>
													<p>15,686 Published Books</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-newsletter">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<h4>Signup Newsletter!</h4>
							<h5>Consectetur adipisicing elit sed do eiusmod tempor incididunt.</h5>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<form class="tg-formtheme tg-formnewsletter">
								<fieldset>
									<input type="email" name="email" class="form-control" placeholder="Enter Your Email ID">
									<button type="button"><i class="icon-envelope"></i></button>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-footerbar">
				<a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<span class="tg-paymenttype"><img src="images/paymenticon.png" alt="image description"></span>
							<span class="tg-copyright">2017 All Rights Reserved By &copy; Book Library</span>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.vide.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/countTo.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/gmap3.js"></script>
	<script src="js/main.js"></script>
</body>

</html>