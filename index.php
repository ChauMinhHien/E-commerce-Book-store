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
$book = new Book();
$data = $book->all();
$data1=$book->random();
$featured= $book->featured();
$category = new Category();
$dataCat = $category->all();
$publisher = new Publisher();
$dataPub = $publisher->all();
$dataNew = $book->newBook();
$dataLatest = $book->latestBooks();
$order_d=new orderDetails();
$bestSellers=$order_d->bestSellers();
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

<body class="tg-home tg-homeone">

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        <?php
        include 'nav.php';
        ?>
        <!--************************************
				Header End
		*************************************-->

        <!--************************************
					Best Selling Start
			*************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2><span>People’s Choice</span>Bestselling Books</h2>
                            <a class="tg-btn" href="products?x=bestselling">View All</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-bestsellingbooksslider"
                            class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                            <?php
								foreach($data as $k=>$item){
									foreach($bestSellers as $best){
                                        if($best['book_id']==$item['book_id']){
                                            ?>
                                                <div class="item">
                                                    <div class="tg-postbook">
                                                        <figure class="tg-featureimg">
                                                            <div class="tg-bookimg">
                                                                <div class="tg-frontcover"><img src="images/book/<?php echo $item['img']?>"
                                                                        alt="image description"></div>
                                                                <div class="tg-backcover"><img src="images/book/<?php echo $item['img']?>"
                                                                        alt="image description"></div>
                                                            </div>
                                                            <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                                                <i class="icon-heart"></i>
                                                                <span>add to wishlist</span>
                                                            </a>
                                                        </figure>
                                                        <div class="tg-postbookcontent">
                                                            <ul class="tg-bookscategories">
                                                                <li><a href="javascript:void(0);">
                                                                        <?php
                                                                            foreach($dataCat as $cat){
                                                                                if($cat['cat_id']==$item['cat_id']){
                                                                                    echo $cat['cat_name'];
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </a></li>
                                                            </ul>
                                                            <?php
                                                                $newbook=false;
                                                                foreach($dataNew as $new){
                                                                    if($new['book_id']==$item['book_id']){
                                                                        $newbook=true;
                                                                    }
                                                                }
                                                                if($item['FEATURED']=='yes'||$item['SALE']!=null||$newbook==true){
                                                                    ?>
                                                                        <div class="tg-themetagbox"><span class="tg-themetag">
                                                                            <?php
                                                                                $stat='';
                                                                                if($item['FEATURED']=='yes'){
                                                                                    if($stat==''){
                                                                                        $stat.=" featured";
                                                                                    }else{
                                                                                        $stat.=" & featured";
                                                                                    }
                                                                                }
                                                                                if($item['SALE']!=null){
                                                                                    if($stat==''){
                                                                                        $stat.=" sale";
                                                                                    }else{
                                                                                        $stat.=" & sale";
                                                                                    }
                                                                                }
                                                                                if($newbook==true){
                                                                                    if($stat==''){  
                                                                                        $stat.=" new";
                                                                                    }else{
                                                                                        $stat.=" & new";
                                                                                    }
                                                                                }echo $stat;
                                                                            ?>
                                                                        </span></div>
                                                                    <?php
                                                                }
                                                            ?>
                                                            <div class="tg-booktitle">
                                                                <h3><a href="./productdetail?id=<?php echo $item['book_id']?>"><?php echo $item['book_name']?></a></h3>
                                                            </div>
                                                            <span class="tg-bookwriter">Publisher: <a href="javascript:void(0);">
                                                                    <?php
                                                                        foreach($dataPub as $pub){
                                                                            if($pub['pub_id']==$item['pub_id']){
                                                                                echo $pub['pub_name'];
                                                                            }
                                                                        }
                                                                    ?>
                                                                </a></span>
                                                            <span class="tg-stars"><span></span></span>
                                                            <span class="tg-bookprice">
                                                                <?php
                                                                    if($item['SALE']!=null){
                                                                        ?>
                                                                        <ins>
                                                                            <?php echo number_format($item['SALE'])?> VND
                                                                        </ins>
                                                                        <del>
                                                                            <?php echo number_format($item['price'])?> VND
                                                                        </del>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                            <ins>
                                                                                <?php echo number_format($item['price'])?> VND
                                                                            </ins>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </span>
                                                            <a class="tg-btn tg-btnstyletwo add-cart" href="javascript:void(0);">
                                                                <i class="fa fa-shopping-basket"></i>
                                                                <em>Add To Basket</em>
                                                            </a>
                                                            <div class="id" style="display:none;"><?php echo $item['book_id']?></div>								
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    }
								}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
					Best Selling End
			*************************************-->

        <!--************************************
					Featured Item Start
			*************************************-->
        <section class="tg-bglight tg-haslayout">
            <div class="container">
                <div class="row">
                    <?php
						foreach($featured as $item){
							?>
                                <div class="tg-featureditm">
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
                                        <figure><img src="./images/book/<?php echo $item['img'] ?>" alt="image description">
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                        <div class="tg-featureditmcontent">
                                            <?php
                                                $newbook=false;
                                                foreach($dataNew as $new){
                                                    if($new['book_id']==$item['book_id']){
                                                        $newbook=true;
                                                    }
                                                }
                                                ?>
                                                    <div class="tg-themetagbox"><span class="tg-themetag">
                                                        <?php
                                                            $stat='featured';
                                                            if($item['SALE']!=null){
                                                                $stat.=" & sale";
                                                            }
                                                            if($newbook==true){
                                                                $stat.=" & new";
                                                            }echo $stat;
                                                        ?>
                                                    </span></div>
                                                <?php
                                            ?>
                                            <div class="tg-booktitle" style="max-width: 430px;">
                                                <h3><a href="./productdetail?id=<?php echo $item['book_id']?>"><?php echo $item['book_name'] ?></a></h3>
                                            </div>
                                            <span class="tg-bookwriter">Publisher: <a href="javascript:void(0);">
                                                    <?php
                                                            foreach($dataPub as $pub){
                                                                if($pub['pub_id']==$item['pub_id']){
                                                                    echo $pub['pub_name'];
                                                                }
                                                            }
                                                        ?>
                                                </a></span>
                                            <span class="tg-stars"><span></span></span>
                                            <div class="tg-priceandbtn">
                                                <span class="tg-bookprice">
                                                    <?php
                                                        if($item['SALE']!=null){
                                                            ?>
                                                            <ins>
                                                                <?php echo ($item['SALE']/1000)?>K VND
                                                            </ins>
                                                            <del>
                                                                <?php echo ($item['price']/1000)?>K VND
                                                            </del>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                                <ins>
                                                                    <?php echo ($item['price']/1000)?>K VND
                                                                </ins>
                                                            <?php
                                                        }
                                                    ?>
                                                </span>
                                                <a class="tg-btn tg-btnstyletwo tg-active add-cart" href="javascript:void(0);">
                                                    <i class="fa fa-shopping-basket"></i>
                                                    <em>Add To Basket</em>
                                                </a>
                                                <div class="id" style="display:none;"><?php echo $item['book_id']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
						}
					?>
                </div>
            </div>
        </section>
        <!--************************************
					Featured Item End
			*************************************-->
        <!--************************************
					New Release Start
			*************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-newrelease">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="tg-sectionhead">
                                <h2><span>Taste The New Spice</span>Latest Release Books</h2>
                            </div>
                            <div class="tg-description">
                                <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip
                                    commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat
                                    nulla pariatur cepteur sint occaecat cupidatat.</p>
                            </div>
                            <div class="tg-btns">
                                <a class="tg-btn tg-active" href="javascript:void(0);">View All</a>
                                <a class="tg-btn" href="javascript:void(0);">Read More</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="tg-newreleasebooks">
                                    <?php
                                        foreach($dataLatest as $item){
                                            ?>
                                                <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                                                    <div class="tg-postbook">
                                                        <figure class="tg-featureimg">
                                                            <div class="tg-bookimg">
                                                                <div class="tg-frontcover"><img src="images/book/<?php echo $item['img']?>"
                                                                        alt="image description"></div>
                                                                <div class="tg-backcover"><img src="images/books/<?php echo $item['img']?>"
                                                                        alt="image description"></div>
                                                            </div>
                                                        </figure>
                                                        <div class="tg-postbookcontent">
                                                            <ul class="tg-bookscategories">
                                                                <li><a href="javascript:void(0);">
                                                                    <?php
                                                                        foreach($dataCat as $cat){
                                                                            if($cat['cat_id']==$item['cat_id']){
                                                                                echo $cat['cat_name'];
                                                                            }
                                                                        }
                                                                    ?>
                                                                </a></li>
                                                            </ul>
                                                            <div class="tg-booktitle">
                                                                <h3><a href="productdetail?id=<?php echo $item['book_id']?>"><?php echo $item['book_name']?></a></h3>
                                                            </div>
                                                            <span class="tg-bookwriter">Publisher: 
                                                                <a href="javascript:void(0);">
                                                                    <?php
                                                                        foreach($dataPub as $pub){
                                                                            if($pub['pub_id']==$item['pub_id']){
                                                                                echo $pub['pub_name'];
                                                                            }
                                                                        }
                                                                    ?>
                                                                </a></span>
                                                            <span class="tg-stars"><span></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
					New Release End
			*************************************-->
        <!--************************************
					Collection Count Start
			*************************************-->
        <section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600"
            data-parallax="scroll" data-image-src="images/parallax/bgparallax-04.jpg">
            <div class="tg-sectionspace tg-collectioncount tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div id="tg-collectioncounters" class="tg-collectioncounters">
                            <div class="tg-collectioncounter tg-drama">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-bubble"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Drama</h2>
                                    <h3 data-from="0" data-to="6179213" data-speed="8000" data-refresh-interval="50">
                                        6,179,213</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-horror">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-heart-pulse"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Horror</h2>
                                    <h3 data-from="0" data-to="3121242" data-speed="8000" data-refresh-interval="50">
                                        3,121,242</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-romance">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-heart"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Romance</h2>
                                    <h3 data-from="0" data-to="2101012" data-speed="8000" data-refresh-interval="50">
                                        2,101,012</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-fashion">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-star"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Fashion</h2>
                                    <h3 data-from="0" data-to="1158245" data-speed="8000" data-refresh-interval="50">
                                        1,158,245</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
					Collection Count End
			*************************************-->
        <!--************************************
					Picked By Author Start
			*************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2><span>Some Great Books</span>Picked By Authors</h2>
                            <a class="tg-btn" href="javascript:void(0);">View All</a>
                        </div>
                    </div>
                    <div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
                        <?php
							foreach($data1 as $key=>$item){
								if($key<=4){
									?>
										<div class="item">
											<div class="tg-postbook">
												<figure class="tg-featureimg">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img src="images/book/<?php echo $item['img']?>"
																alt="image description"></div>
													</div>
													<div class="tg-hovercontent">
														<div class="tg-description">
															<p><?php echo $item['description']?></p>
														</div>
														<strong class="tg-bookpage">Book Pages: <?php echo $item['pages']?></strong>
														<strong class="tg-bookcategory">Category: 
														<?php
															foreach($dataCat as $cat){
																if($cat['cat_id']==$item['cat_id']){
																	echo $cat['cat_name'];
																}
															}
														?>
														</strong>
														<strong class="tg-bookprice">Price: <?php echo $item['price']?> VND</strong>
														<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
													</div>
												</figure>
												<div class="tg-postbookcontent">
													<div class="tg-booktitle">
														<h3><a href="./productdetail?id=<?php echo $item['book_id']?>"><?php echo $item['book_name']?></a></h3>
													</div>
													<span class="tg-bookwriter">Publisher: <a href="javascript:void(0);">
													<?php
														foreach($dataPub as $pub){
															if($pub['pub_id']==$item['pub_id']){
																echo $pub['pub_name'];
															}
														}
													?>
													</a></span>
													<a class="tg-btn tg-btnstyletwo add-cart" href="javascript:void(0);">
														<i class="fa fa-shopping-basket"></i>
														<em>Add To Basket</em>
													</a>
                                                    <div class="id" style="display:none;"><?php echo $item['book_id']?></div>
												</div>
											</div>
										</div>
									<?php
									}
							}
						?>
                        
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
					Picked By Author End
			*************************************-->
        <!--************************************
					Testimonials Start
			*************************************-->
        <section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600"
            data-parallax="scroll" data-image-src="images/parallax/bgparallax-05.jpg">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                            <div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
                                <div class="item tg-testimonial">
                                    <figure><img src="images/author/imag-02.jpg" alt="image description"></figure>
                                    <blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut
                                            labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation
                                            ullamcoiars nisi ut aliquip commodo.</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3>Holli Fenstermacher</h3>
                                        <span>Manager @ CIFP</span>
                                    </div>
                                </div>
                                <div class="item tg-testimonial">
                                    <figure><img src="images/author/imag-02.jpg" alt="image description"></figure>
                                    <blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut
                                            labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation
                                            ullamcoiars nisi ut aliquip commodo.</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3>Holli Fenstermacher</h3>
                                        <span>Manager @ CIFP</span>
                                    </div>
                                </div>
                                <div class="item tg-testimonial">
                                    <figure><img src="images/author/imag-02.jpg" alt="image description"></figure>
                                    <blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut
                                            labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation
                                            ullamcoiars nisi ut aliquip commodo.</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3>Holli Fenstermacher</h3>
                                        <span>Manager @ CIFP</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
					Testimonials End
			*************************************-->

        <!--************************************
					Call to Action Start
			*************************************-->
        <section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600"
            data-parallax="scroll" data-image-src="images/parallax/bgparallax-06.jpg">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-calltoaction">
                                <h2>Open Discount For All</h2>
                                <h3>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore.
                                </h3>
                                <a class="tg-btn tg-active" href="javascript:void(0);">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
					Call to Action End
			*************************************-->
        <!--************************************
					Latest News Start
			*************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2><span>Latest News &amp; Articles</span>What's Hot in The News</h2>
                            <a class="tg-btn" href="javascript:void(0);">View All</a>
                        </div>
                    </div>
                    <div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
                        <article class="item tg-post">
                            <figure><a href="javascript:void(0);"><img src="images/blog/img-01.jpg"
                                        alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine
                                        Culbertson</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415
                                                Comments</i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <article class="item tg-post">
                            <figure><a href="javascript:void(0);"><img src="images/blog/img-02.jpg"
                                        alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine
                                        Culbertson</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415
                                                Comments</i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <article class="item tg-post">
                            <figure><a href="javascript:void(0);"><img src="images/blog/img-03.jpg"
                                        alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine
                                        Culbertson</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415
                                                Comments</i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <article class="item tg-post">
                            <figure><a href="javascript:void(0);"><img src="images/blog/img-04.jpg"
                                        alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);">Dance Like Nobody’s Watching</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine
                                        Culbertson</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415
                                                Comments</i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <article class="item tg-post">
                            <figure><a href="javascript:void(0);"><img src="images/blog/img-02.jpg"
                                        alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine
                                        Culbertson</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415
                                                Comments</i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <article class="item tg-post">
                            <figure><a href="javascript:void(0);"><img src="images/blog/img-03.jpg"
                                        alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine
                                        Culbertson</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415
                                                Comments</i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
					Latest News End
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
                                    <strong class="tg-logo"><a href="javascript:void(0);"><img src="images/flogo.png"
                                                alt="image description"></a></strong>
                                    <ul class="tg-contactinfo">
                                        <li>
                                            <i class="icon-apartment"></i>
                                            <address>Suit # 07, Rose world Building, Street # 02, AT246T Manchester
                                            </address>
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
                                        <li class="tg-facebook"><a href="javascript:void(0);"><i
                                                    class="fa fa-facebook"></i></a></li>
                                        <li class="tg-twitter"><a href="javascript:void(0);"><i
                                                    class="fa fa-twitter"></i></a></li>
                                        <li class="tg-linkedin"><a href="javascript:void(0);"><i
                                                    class="fa fa-linkedin"></i></a></li>
                                        <li class="tg-googleplus"><a href="javascript:void(0);"><i
                                                    class="fa fa-google-plus"></i></a></li>
                                        <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a>
                                        </li>
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
                                                <figure><a href="javascript:void(0);"><img
                                                            src="images/author/imag-09.jpg" alt="image description"></a>
                                                </figure>
                                                <div class="tg-authornamebooks">
                                                    <h4><a href="javascript:void(0);">Jude Morphew</a></h4>
                                                    <p>21,658 Published Books</p>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><a href="javascript:void(0);"><img
                                                            src="images/author/imag-10.jpg" alt="image description"></a>
                                                </figure>
                                                <div class="tg-authornamebooks">
                                                    <h4><a href="javascript:void(0);">Shaun Humes</a></h4>
                                                    <p>20,257 Published Books</p>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><a href="javascript:void(0);"><img
                                                            src="images/author/imag-11.jpg" alt="image description"></a>
                                                </figure>
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
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter Your Email ID">
                                    <button type="button"><i class="icon-envelope"></i></button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-footerbar">
                <a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i
                        class="icon-chevron-up"></i></a>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <span class="tg-paymenttype"><img src="images/paymenticon.png"
                                    alt="image description"></span>
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
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en">
    </script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.vide.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/countTo.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/gmap3.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-cart').click(function() {
                var a = id=$(this).parent().find('div[class=id]').html();
                var b=1;
                
                $.ajax({
                    url: 'ajax/cart.php',
                    type: 'POST',
                    data: {
                        id: a,
                        qty: b
                    },
                    success: function(result) {
                        var a=result;
                        var b=a.split(/\s+/)
                        var c=parseInt(b[1]);
                        if(Number.isInteger(c)){
                            $(".quantity"+b[0]).text("x"+c);
                            $(".quantity1"+b[0]).text(c);
                        }
                        $(result).appendTo(".tg-minicartbody")
                        var b=$(".tg-minicartbody .tg-minicarproduct").length;
                        $(".tg-themebadge").text(b);
                        const notes = document.querySelectorAll('.tg-minicarproductdata');
                        const count = notes.length;
                        var c=0;
                        for (let i = 0; i < count; i++) {
                            // console.log(notes[i].children[3].innerHTML)
                            // console.log(notes[i].children[4].innerHTML)
                            var c=c+(parseInt(notes[i].children[3].innerHTML)*parseInt(notes[i].children[4].innerHTML));
                        }
                        var c=c*1000
                        $(".total").text(c.toLocaleString('en-US')+"VND");
                        $(".total1").text(c.toLocaleString('en-US')+"VND");
                    }
                });
            });
        });
    </script>
</body>

</html>