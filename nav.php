<?php
if (!isset($_SESSION)) session_start();
$cart = isset($_SESSION['cart'])?$_SESSION['cart']:[];
?>
<header id="tg-header" class="tg-header tg-haslayout">
<div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="tg-addnav">
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-envelope"></i>
                                <em>Contact</em>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-question-circle"></i>
                                <em>Help</em>
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown tg-themedropdown tg-currencydropdown">
                        <a href="javascript:void(0);" id="tg-currenty" class="tg-btnthemedropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-earth"></i>
                            <span>Currency</span>
                        </a>
                        <ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-currenty">
                            <li>
                                <a href="javascript:void(0);">
                                    <i>£</i>
                                    <span>British Pound</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <i>$</i>
                                    <span>Us Dollar</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <i>€</i>
                                    <span>Euro</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
                        if(isset($_SESSION['info'])){
                            ?>
                                <div class="tg-userlogin">
                                    <a href="login-page">
                                        
                                        <span>Hi, <?php echo $_SESSION['info']['name']?>
                                        <a href="./model/logout.php" class="tg-btn tg-active">Log Out</a></span>
                                        
                                    </a>
                                    
                                </div>
                            <?php
                        }else{
                            ?>
                                <div class="tg-userlogin">
                                    <a href="login-page" class="username">
                                        Log In
                                    </a>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="index"><img src="images/logo.png"
                                alt="company name here"></a></strong>
                    <div class="tg-wishlistandcart">

                        <div class="dropdown tg-themedropdown tg-minicartdropdown">
                            <a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="tg-themebadge"><?php
                                            $count=0;
                                            foreach($cart as $book_id=>$item){ 
                                                $count +=1;
                                            }
                                            echo $count;
                                        ?></span>
                                <i class="icon-cart"></i>
                                <span class="total"><?php 
                                            $total=0;
                                            foreach($cart as $book_id=>$item){ 
                                                $total += $item['price'] * $item['qty'];
                                            }
                                            echo number_format($total);
                                        ?>VND</span>
                            </a>
                            <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                                <div class="tg-minicartbody">
                                    <?php
                                        foreach($cart as $book_id=>$item){
                                            ?>
                                                <div class="tg-minicarproduct">
                                                    <figure>
                                                        <img style="width:100px;height:100px;"src="images/book/<?php echo $item['img']?>" alt="image description">

                                                    </figure>
                                                    <div class="tg-minicarproductdata">
                                                        <h5><a href="productdetail?id=<?php echo $book_id?>"><?php echo $item['book_name']?></a></h5>
                                                        <h6><a href="javascript:void(0);"><?php echo number_format($item['price'])?>VND</a></h6>
                                                        <h6><a class="quantity<?php echo $book_id?>" href="javascript:void(0);">x<?php echo $item['qty']?></a></h6>
                                                        <p class="quantity1<?php echo $book_id?>" style="display:none"><?php echo $item['qty']?></p>
                                                        <p class="price" style="display:none"><?php echo number_format($item['price'])?></p>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                        
                                    ?>
                                </div>
                                <div class="tg-minicartfoot">
                                    <a class="tg-btnemptycart" href="./model/deleteSes.php">
                                        <i class="fa fa-trash-o"></i>
                                        <span>Clear Your Cart</span>
                                    </a>

                                    <span class="tg-subtotal">Total: <strong class="total1"><?php 
                                            $total=0;
                                            foreach($cart as $book_id=>$item){ 
                                                $total += $item['price'] * $item['qty'];
                                            }
                                            echo number_format($total);
                                        ?>VND</strong></span>
                                    <div class="tg-btns">
                                        <a class="tg-btn" href="./model/checkout.php">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tg-searchbox">
                        <form class="tg-formtheme tg-formsearch" action="searching/search" method="get">
                            <fieldset>
                                <input type="text" name="search" class="typeahead form-control"
                                    placeholder="Search by title, author, keyword, ISBN...">
                                <button type="submit"><i class="icon-magnifier"></i></button>
                            </fieldset>
                            <a href="javascript:void(0);">+ Advanced Search</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-navigationarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <nav id="tg-nav" class="tg-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#tg-navigation" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                            <ul>
                            <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">All Categories</a>
                                    <ul class="sub-menu">
                                        <li><a href="products">All</a></li>
                                        <?php
                                            foreach($dataCat as $cat){
                                                if(Count($book->sameCat($cat['cat_id']))!=0){
                                                    ?> 
                                                    <li><a href="products?id=<?php echo $cat['cat_id']?>"><?php echo $cat['cat_name']?></a></li>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="products?x=bestselling">Best Selling</a></li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">Latest News</a>
                                    <ul class="sub-menu">
                                        <li><a href="newslist">News List</a></li>
                                        <li><a href="newsgrid">News Grid</a></li>
                                        <li><a href="newsdetail">News Detail</a></li>
                                    </ul>
                                </li>
                                <li><a href="contactus">Contact</a></li>
                                <li class="menu-item-has-children current-menu-item">
                                    <a href="javascript:void(0);"><i class="icon-menu"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="aboutus">About Us</a></li>
                                        <li><a href="404error">404 Error</a></li>
                                        <li><a href="comingsoon" >Coming Soon</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>