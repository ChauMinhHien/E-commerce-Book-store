<?php 
if (!isset($_SESSION)) session_start();
$cart = isset($_SESSION['cart'])?$_SESSION['cart']:[];
$id = isset($_POST['id'])?$_POST['id']:'';
$qty = isset($_POST['qty'])?$_POST['qty']:1;
include '../config.php';
function loadClass($name)
{
	if (is_file("../model/$name.php"))
		include "../model/$name.php";
	else {
		echo 'not found';
	}
}
spl_autoload_register('loadClass');
$book = new Book();
$data=$book->search1($id);
if (is_array($data))
{
    if (isset($cart[$id])) {
        $cart[$id]['qty'] += $qty;
    }
    else 
        if($data['SALE']>0){
            $cart[$id]=['book_name'=>$data['book_name'],
                    'price'=>$data['SALE'],
                    'img'=>$data['img'],
                    'qty'=>$qty
            ];
        }else{
            $cart[$id]=['book_name'=>$data['book_name'],
                    'price'=>$data['price'],
                    'img'=>$data['img'],
                    'qty'=>$qty
            ];
        }
}
foreach($cart as $book_id=>$item){
    if($book_id==$id){  
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $ses_id=>$ses_item){
                if($ses_id==$book_id){
                    echo $ses_id." ".$item['qty'];
                    $_SESSION['cart']=$cart;
                    return;
                }
            }
        }
        ?>
            <div class="tg-minicarproduct">
                <figure>
                    <img style="width:100px;height:100px;"src="images/book/<?php echo $item['img']?>" alt="image description">

                </figure>
                <div class="tg-minicarproductdata">
                    <h5><a href="productdetail.php?id=<?php echo $book_id?>"><?php echo $item['book_name']?></a></h5>
                    <h6><a href="javascript:void(0);"><?php echo number_format($item['price'])?>VND</a></h6>
                    <h6><a class="quantity<?php echo $book_id?>" href="javascript:void(0);">x<?php echo $item['qty']?></a></h6>
                    <p class="quantity1<?php echo $book_id?>" style="display:none"><?php echo $item['qty']?></p>
                    <p class="price" style="display:none"><?php echo number_format($item['price'])?></p>
                </div>
            </div>
        <?php
    }
}
$_SESSION['cart']=$cart;

