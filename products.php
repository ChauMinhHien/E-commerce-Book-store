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
$trend=new Trending_Prod();
$data = $book->random();
$featured= $book->featured();
$category = new Category();
$dataCat = $category->all();
$publisher = new Publisher();
$order_d=new Orderdetails();
$dataNew = $book->newBook();
$dataPub = $publisher->all();
$topTrend=$trend->getTrending();
$bestseller=isset($_GET['x'])?$_GET['x']:[];
$catid=isset($_GET['id'])?$_GET['id']:[];
if($bestseller!=[]){
    $books=$book->all();
    $bestSellers=$order_d->bestSellers();
    $a="Showing best sellers";
}
else if(isset($_GET['search'])){
    $books=$book->advancedSearch($_GET['search']);
    $a="Showing search: '{$_GET['search']}'";
}
else if($catid!=[]){
    $catname=$category->catName($catid);
    $books=$book->sameCat($catid);
    foreach($catname as $v){
        $a="Showing books in category: '{$v['cat_name']}'";
    }
}else{
    $books=$book->all();
    $a="Showing all books";
}
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
        <?php
        include 'nav.php';
        ?>
        <!--************************************
				Header End
		*************************************-->
        <!--************************************
				Inner Banner Start
		*************************************-->
        <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100"
            data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-innerbannercontent">
                            <h1>All Products</h1>
                            <ol class="tg-breadcrumb">
                                <li><a href="javascript:void(0);">home</a></li>
                                <li class="tg-active">Products</li>
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
                                    <div class="tg-products">
                                        <div class="tg-sectionhead">
                                            <h2><span>People’s Choice</span>Best Selling book</h2>
                                        </div>
                                        <?php
											foreach($featured as $feat){
												?>
												<div class="tg-featurebook alert" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<div class="tg-featureditm">
														<div class="row">
															<div
																class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
																<figure><img src="images/book/<?php echo $feat['img'] ?>" alt="image description">
																</figure>
															</div>
															<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
																<div class="tg-featureditmcontent">
                                                                <?php
                                                                    $newbook=false;
                                                                    foreach($dataNew as $new){
                                                                        if($new['book_id']==$feat['book_id']){
                                                                            $newbook=true;
                                                                        }
                                                                    }
                                                                    ?>
                                                                        <div class="tg-themetagbox"><span class="tg-themetag">
                                                                            <?php
                                                                                $stat='featured';
                                                                                if($feat['SALE']!=null){
                                                                                    $stat.=" & sale";
                                                                                }
                                                                                if($newbook==true){
                                                                                    $stat.=" & new";
                                                                                }echo $stat;
                                                                            ?>
                                                                        </span></div>
                                                                    <?php
                                                                ?>
																	<div class="tg-booktitle">
																		<h3><a href="productdetail?id=<?php echo $feat['book_id']?>"><?php echo $feat['book_name']?></a></h3>
																	</div>
																	<span class="tg-bookwriter">Publisher: 
																		<a href="javascript:void(0);">
																		<?php
																			foreach($dataPub as $pub){
																				if($pub['pub_id']==$feat['pub_id']){
																					echo $pub['pub_name'];
																				}
																			}
																		?>
																		</a>
																	</span>
																	<span class="tg-stars"><span></span></span>
																	<div class="tg-priceandbtn">
																		<span class="tg-bookprice">
                                                                        <?php
                                                                            if($feat['SALE']!=null){
                                                                                ?>
                                                                                <ins>
                                                                                    <?php echo number_format($feat['SALE'])?> VND
                                                                                </ins>
                                                                                <del>
                                                                                    <?php echo number_format($feat['price'])?> VND
                                                                                </del>
                                                                                <?php
                                                                            }
                                                                            else{
                                                                                ?>
                                                                                    <ins>
                                                                                        <?php echo number_format($feat['price'])?> VND
                                                                                    </ins>
                                                                                <?php
                                                                            }
                                                                        ?>
																		</span>
																		<a class="tg-btn tg-btnstyletwo tg-active add-cart"
																			href="javascript:void(0);">
																			<i class="fa fa-shopping-basket"></i>
																			<em>Add To Basket</em>
																		</a>
                                                                        <div class="id" style="display:none;"><?php echo $feat['book_id']?></div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
                                        	<?php
											}
										?>
                                        <div class="tg-productgrid">
                                        <div class="tg-refinesearch">
												<span><?php echo $a;?></span>
											</div>
                                            <?php
												foreach($books as $item){
                                                    if(isset($_GET['x'])){
                                                        foreach($bestSellers as $best){
                                                            if($best['book_id']==$item['book_id']){
                                                            ?>
                                                                <div style="margin-bottom: 50px;"class="col-xs-6 col-sm-6 col-md-4 col-lg-3 ">
                                                                    <div style="height:536px;"class="tg-postbook">
                                                                        <figure class="tg-featureimg">
                                                                            <div class="tg-bookimg">
                                                                                <div class="tg-frontcover">
                                                                                    <img src="images/book/<?php echo $item['img']?>" alt="image description">
                                                                                </div>
                                                                                <div class="tg-backcover">
                                                                                    <img src="images/book/<?php echo $item['img']?>" alt="image description">
                                                                                    </div>
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
                                                                                </a>
                                                                                </li>
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
                                                                                <h3><a href="productdetail?id=<?php echo $item['book_id']?>"><?php echo $item['book_name']?></a></h3>
                                                                            </div>
                                                                            <span class="tg-bookwriter">Publisher: 
                                                                                <?php
                                                                                    foreach($dataPub as $pub){
                                                                                        if($pub['pub_id']==$item['pub_id']){
                                                                                            echo $pub['pub_name'];
                                                                                        }
                                                                                    }
                                                                                ?>		
                                                                            </span>
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
                                                    }else{
                                                        ?>
                                                            <div style="margin-bottom: 50px;"class="col-xs-6 col-sm-6 col-md-4 col-lg-3 ">
                                                                <div style="height:536px;"class="tg-postbook">
                                                                    <figure class="tg-featureimg">
                                                                        <div class="tg-bookimg">
                                                                            <div class="tg-frontcover">
                                                                                <img src="images/book/<?php echo $item['img']?>" alt="image description">
                                                                            </div>
                                                                            <div class="tg-backcover">
                                                                                <img src="images/book/<?php echo $item['img']?>" alt="image description">
                                                                                </div>
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
                                                                            </a>
                                                                            </li>
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
                                                                            <h3><a href="productdetail?id=<?php echo $item['book_id']?>"><?php echo $item['book_name']?></a></h3>
                                                                        </div>
                                                                        <span class="tg-bookwriter">Publisher: 
                                                                            <?php
                                                                                foreach($dataPub as $pub){
                                                                                    if($pub['pub_id']==$item['pub_id']){
                                                                                        echo $pub['pub_name'];
                                                                                    }
                                                                                }
                                                                            ?>		
                                                                        </span>
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
											?>
                                            
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
                                                <input type="search" name="search" class="form-group"
                                                    placeholder="Search by title, author, key...">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tg-widget tg-catagories">
                                        <div class="tg-widgettitle">
                                            <h3>Categories</h3>
                                        </div>
                                        <div class="tg-widgetcontent">
                                            <ul>
                                                <?php
                                                    foreach($dataCat as $cat){
                                                        if(Count($book->sameCat($cat['cat_id']))!=0){
                                                            ?>
                                                                <li>
                                                                    <a href="products.php?id=<?php echo $cat['cat_id']?>">
                                                                        <span>
                                                                            <?php echo $cat['cat_name']?>
                                                                        </span>
                                                                        <em>
                                                                            <?php echo Count($book->sameCat($cat['cat_id']))?>
                                                                        </em>
                                                                    </a>
                                                                </li>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tg-widget tg-widgettrending">
                                        <div class="tg-widgettitle">
                                            <h3>Trending Products</h3>
                                        </div>
                                        <div class="tg-widgetcontent">
                                            <ul>
                                                <?php
                                                    foreach($topTrend as $v){
                                                        ?>
                                                            <li>
                                                                <article class="tg-post">
                                                                    <figure><a href="javascript:void(0);"><img
                                                                                src="images/book/<?php echo $v['img']?>"
                                                                                alt="image description"></a></figure>
                                                                    <div class="tg-postcontent">
                                                                        <div class="tg-posttitle">
                                                                            <h3><a href="productdetail?id=<?php echo $v['book_id']?>">
                                                                                <?php echo $v['book_name']?>
                                                                            </a></h3>
                                                                        </div>
                                                                        <span class="tg-bookwriter">Publisher: 
                                                                            <a href="javascript:void(0);">
                                                                                <?php 
                                                                                    foreach($dataPub as $pub){
                                                                                        if($pub['pub_id']==$v['pub_id']){
                                                                                            echo $pub['pub_name'];
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                            </a>
                                                                        </span>
                                                                    </div>
                                                                </article>
                                                            </li>
                                                        <?php
                                                    }
                                                ?>
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
                                                        <figcaption><a href="javascript:void(0);"><i
                                                                    class="icon-heart"></i><em>50,134</em></a>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/instagram/img-02.jpg" alt="image description">
                                                        <figcaption><a href="javascript:void(0);"><i
                                                                    class="icon-heart"></i><em>50,134</em></a>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/instagram/img-03.jpg" alt="image description">
                                                        <figcaption><a href="javascript:void(0);"><i
                                                                    class="icon-heart"></i><em>50,134</em></a>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/instagram/img-04.jpg" alt="image description">
                                                        <figcaption><a href="javascript:void(0);"><i
                                                                    class="icon-heart"></i><em>50,134</em></a>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/instagram/img-05.jpg" alt="image description">
                                                        <figcaption><a href="javascript:void(0);"><i
                                                                    class="icon-heart"></i><em>50,134</em></a>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/instagram/img-06.jpg" alt="image description">
                                                        <figcaption><a href="javascript:void(0);"><i
                                                                    class="icon-heart"></i><em>50,134</em></a>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/instagram/img-07.jpg" alt="image description">
                                                        <figcaption><a href="javascript:void(0);"><i
                                                                    class="icon-heart"></i><em>50,134</em></a>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/instagram/img-08.jpg" alt="image description">
                                                        <figcaption><a href="javascript:void(0);"><i
                                                                    class="icon-heart"></i><em>50,134</em></a>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/instagram/img-09.jpg" alt="image description">
                                                        <figcaption><a href="javascript:void(0);"><i
                                                                    class="icon-heart"></i><em>50,134</em></a>
                                                        </figcaption>
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
                                                        <figure><a href="javascript:void(0);"><img
                                                                    src="images/author/imag-03.jpg"
                                                                    alt="image description"></a></figure>
                                                        <div class="tg-authorcontent">
                                                            <h2><a href="javascript:void(0);">Jude Morphew</a></h2>
                                                            <span>21,658 Published Books</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tg-author">
                                                        <figure><a href="javascript:void(0);"><img
                                                                    src="images/author/imag-04.jpg"
                                                                    alt="image description"></a></figure>
                                                        <div class="tg-authorcontent">
                                                            <h2><a href="javascript:void(0);">Jude Morphew</a></h2>
                                                            <span>21,658 Published Books</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tg-author">
                                                        <figure><a href="javascript:void(0);"><img
                                                                    src="images/author/imag-05.jpg"
                                                                    alt="image description"></a></figure>
                                                        <div class="tg-authorcontent">
                                                            <h2><a href="javascript:void(0);">Jude Morphew</a></h2>
                                                            <span>21,658 Published Books</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tg-author">
                                                        <figure><a href="javascript:void(0);"><img
                                                                    src="images/author/imag-06.jpg"
                                                                    alt="image description"></a></figure>
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