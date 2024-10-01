<?php
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

if (!isset($_SESSION)) session_start();
if($_SESSION['allow']!="yes"){
	header("location:login");
}
$book = new Book();
$dataBook=$book->all();

$category=new Category();
$dataCat=$category->all();

$publisher=new Publisher();
$dataPub=$publisher->all();

$user=new users();
$dataUser=$user->all();

$order=new Order();
$dataOrder=$order->all();

$order_detail=new Orderdetails();
$dataOrderD=$order_detail->all();

$admin=new Admin();
$dataAdmin=$admin->all();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Simpla Admin</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
		<!--[if IE]><script type="text/javascript" src="resources/scripts/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile"><?php echo $_SESSION['adminr']['username']?></a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
				<br />
				<a href="../index" title="View the site">View the Site</a> | <a href="signout.php" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="javascript:void(0);" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				
				<li> 
					<a href="#" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->
					Articles
					</a>
					<ul>
						<li><a href="#">Write a new Article</a></li>
						<li><a class="current" href="#">Manage Articles</a></li> <!-- Add class "current" to sub menu items also -->
						<li><a href="#">Manage Comments</a></li>
						<li><a href="#">Manage Categories</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Pages
					</a>
					<ul>
						<li><a href="#">Create a new Page</a></li>
						<li><a href="#">Manage Pages</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Image Gallery
					</a>
					<ul>
						<li><a href="#">Upload Images</a></li>
						<li><a href="#">Manage Galleries</a></li>
						<li><a href="#">Manage Albums</a></li>
						<li><a href="#">Gallery Settings</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Events Calendar
					</a>
					<ul>
						<li><a href="#">Calendar Overview</a></li>
						<li><a href="#">Add a new Event</a></li>
						<li><a href="#">Calendar Settings</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Settings
					</a>
					<ul>
						<li><a href="#">General</a></li>
						<li><a href="#">Design</a></li>
						<li><a href="#">Your Profile</a></li>
						<li><a href="#">Users and Permissions</a></li>
					</ul>
				</li>      
				
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="#" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					Download From <a href="http://www.exet.tk">exet.tk</a></div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			
			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
					Write an Article
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					Create a New Page
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
					Upload an Image
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/clock_48.png" alt="icon" /><br />
					Add an Event
				</span></a></li>
				
				<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>
				
			</ul><!-- End .shortcut-buttons-set -->
			<div class="clear"></div>
			<h6 style="color:red"><?php if(isset($_GET['errs'])&&$_GET['errs']==1)echo "Your Sale Price is Higher Than Default Price";if(isset($_GET['errs'])&&$_GET['errs']==3)echo "Publisher name already taken";if(isset($_GET['errs'])&&$_GET['errs']==2)echo "Category name already taken"?></h6>
			<div class="edit-container">

			</div>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Table View</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Books</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2" >Category</a></li>
						<li><a href="#tab3" >Publisher</a></li>
						<li><a href="#tab4" >Users</a></li>
						<li><a href="#tab5" >Order</a></li>
						<li><a href="#tab6" >Order Details</a></li>
						<li><a href="#tab7" >Admin</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						<table>
							<thead>
								<tr>
								   <th>Book ID</th>
								   <th>Book name</th>
								   <th>Description</th>
								   <th>Price</th>
								   <th>Sale</th>
								   <th>Featured</th>
								   <th>Date added</th>
								   <th>Pages</th>
								   <th>Column 9</th>
								</tr>
								
							</thead>
						 
							<tbody>
								<?php
									foreach($dataBook as $b){
										?>
											<tr>
												<th class="id"><?php echo $b['book_id']?></th>
												<th><?php echo $b['book_name']?></th>
												<th><?php echo $b['description']?></th>
												<th><?php echo $b['price']?></th>
												<th><?php echo $b['SALE']?></th>
												<th><?php echo $b['FEATURED']?></th>
												<th><?php echo $b['DATEADDED']?></th>
												<th><?php echo $b['pages']?></th>
												<th class="type" style="display:none">book</th>
												<td>
													<a class="click" href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
													<a href="../CRUD/delete.php?type=book&id=<?php echo $b['book_id']?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
												</td>
											</tr>
										<?php
									}
								?>
							</tbody>
						</table>
					</div> <!-- End #tab1 -->
					<div class="tab-content" id="tab2"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							
							<thead>
								<tr>
								   <th>Category ID</th>
								   <th>Category Name</th>
								   <th>Books in same category</th>
								   <th>Column 4</th>
								</tr>
								
							</thead>
						 
							<tbody>
								<?php
									foreach($dataCat as $c){
										?>
											<tr>
											<th class="id"><?php echo $c['cat_id']?></th>
											<th><?php echo $c['cat_name']?></th>
											<th><?php echo $book->sameCatNum($c['cat_id'])?></th>
											<th class="type" style="display:none">category</th>
											<td>
												<a class="click" href="javascript:void(0);" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
												<a href="../CRUD/delete.php?type=cat&id=<?php echo $c['cat_id']?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
											</td>
											</tr>
										<?php
									}
								?>
							</tbody>
							
						</table>
						
					</div>
					<div class="tab-content" id="tab3"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							
							<thead>
								<tr>
								   <th>Publisher ID</th>
								   <th>Publisher Name</th>
								   <th>Books by same Publisher</th>
								   <th>Column 4</th>
								</tr>
								
							</thead>
						 
							<tbody>
								<?php
									foreach($dataPub as $p){
										?>
											<tr>
											<th class="id"><?php echo $p['pub_id']?></th>
											<th><?php echo $p['pub_name']?></th>
											<th><?php echo $book->samePubNum($p['pub_id'])?></th>
											<th class="type" style="display:none">publisher</th>
											<td>
												<a href="javascript:void(0);" class="click" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
												<a href="../CRUD/delete.php?type=pub&id=<?php echo $p['pub_id']?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
											</td>
											</tr>
										<?php
									}
								?>
							</tbody>
							
						</table>
						
					</div>
					<div class="tab-content" id="tab4"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							
							<thead>
								<tr>
								   <th>User's Email</th>
								   <th>User's Name</th>
								   <th>User's Address</th>
								   <th>User's Phone Number</th>
								   <th>Column 5</th>
								</tr>
								
							</thead>
						 
							<tbody>
								<?php
									foreach($dataUser as $u){
										?>
											<tr>
											<th><?php echo $u['email']?></th>
											<th><?php echo $u['name']?></th>
											<th><?php echo $u['address']?></th>
											<th><?php echo $u['phone']?></th>
											<td>
												<a href="../CRUD/delete.php?type=user&id=<?php echo $u['email']?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
											</td>
											</tr>
										<?php
									}
								?>
							</tbody>
							
						</table>
						
					</div>
					<div class="tab-content" id="tab5"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							
							<thead>
								<tr>
								   <th>Order ID</th>
								   <th>User's Email</th>
								   <th>User's Name</th>
								   <th>User's Phone Number</th>
								   <th>User's Address</th>
								</tr>
								
							</thead>
						 
							<tbody>
								<?php
									foreach($dataOrder as $o){
										?>
											<tr>
											<th><?php echo $o['order_id']?></th>
											<th><?php echo $o['email']?></th>
											<th><?php echo $o['consignee_name']?></th>
											<th><?php echo $o['consignee_phone']?></th>
											<th><?php echo $o['address']?></th>
											</tr>
										<?php
									}
								?>
							</tbody>
							
						</table>
						
					</div>
					<div class="tab-content" id="tab6"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							
							<thead>
								<tr>
								   <th>Order ID</th>
								   <th>Book ID</th>
								   <th>Book Name</th>
								   <th>Quantity</th>
								   <th>Total Price</th>
								</tr>
								
							</thead>
						 
							<tbody>
								<?php
									foreach($dataOrderD as $o){
										?>
											<tr>
											<th><?php echo $o['order_id']?></th>
											<th><?php echo $o['book_id']?></th>
											<th><?php echo $o['book_name']?></th>
											<th><?php echo $o['quantity']?></th>
											<th><?php echo $o['totalPrice']?></th>
											</tr>
										<?php
									}
								?>
							</tbody>
							
						</table>
						
					</div>
					<div class="tab-content" id="tab7"> <!-- This is the target div. id must match the href of this div's tab -->
						<h6 style="color:red;"><?php if(isset($_GET['del'])&&$_GET['del']==1)echo "Cannot delete 'Admin'"?></h6>
						<table>
							
							<thead>
								<tr>
								   <th>Username</th>
								   <th>Admin's Name</th>
								   <th>Admin's Email</th>
								   <th>Admin's Phone Number</th>
								   <th>Column 5</th>
								</tr>
								
							</thead>
						 
							<tbody>
								<?php
									foreach($dataAdmin as $a){
										?>
											<tr>
											<th><?php echo $a['username']?></th>
											<th><?php echo $a['name']?></th>
											<th><?php echo $a['email']?></th>
											<th><?php echo $a['phone']?></th>
											<td>
												<a href="../CRUD/delete.php?type=admin&id=<?php echo $a['username']?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
											</td>
											</tr>
										<?php
									}
								?>
							</tbody>
							
						</table>
						
					</div>      
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->




			<div class="clear"><hr><br></div>




			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header" id="err-display">
					
					<h3>Add Data</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab-1" class="default-tab">Books</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab-2" >Category</a></li>
						<li><a href="#tab-3" >Publisher</a></li>
						<li><a href="#tab-4" >Admin</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					<div class="tab-content default-tab" id="tab-1">
						<h6 style="color:red"><?php if(isset($_GET['err'])&&$_GET['err']==1)echo "Your Sale Price is Higher Than Default Price";
						else if(isset($_GET['err'])&&$_GET['err']==4)echo "Book Name already taken"?></h6>
						<form action="../CRUD/book_add.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<p>
									<label>Book Name</label>
									<input class="text-input large-input" type="text" id="small-input" name="book_name" required />
								</p>
								<p>
									<label>Description</label>
									<textarea class="text-input large-input" id="small-input" name="description" required ></textarea>
								</p>
								<p>
									<label>Price</label>
									<input class="text-input small-input" type="number" id="price" name="price" required />
								</p>
								<p>
									<label>Image</label>
									<input class="text-input medium-input" type="file" id="small-input" accept="image/" name="img" required />
								</p>
								<p>
									<label>Publisher's Name</label>
									<select class="medium-input" name="pub_id" required>
										<?php
											foreach($dataPub as $p){
												?>
													<option value="<?php echo $p['pub_id']?>"><?php echo $p['pub_name']?></option>
												<?php
											}
										?>
									</select> 
								</p>
								<p>
									<label>Category's Name</label>
									<select class="medium-input" name="cat_id" required>
										<?php
											foreach($dataCat as $c){
												?>
													<option value="<?php echo $c['cat_id']?>"><?php echo $c['cat_name']?></option>
												<?php
											}
										?>
									</select> 
								</p>
								<p>
									<label>Featured</label>
									<select class="medium-input" name="featured" required>
										<option value="yes">Yes</option>
										<option value="no">No</option>
									</select> 
								</p>
								<p>
									<label>Sale price</label>
									<input class="text-input small-input" type="number" id="small-input" name="sale" />
								</p>
								<p>
									<label>Pages</label>
									<input class="text-input large-input" type="number" id="small-input" name="pages" required />
								</p>
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div>
							
						</form>
						
					</div>
					<div class="tab-content" id="tab-2"> <!-- This is the target div. id must match the href of this div's tab -->
						<h6 style="color:red"><?php if(isset($_GET['err'])&&$_GET['err']==2)echo "Category name already taken"?></h6>
						<form action="../CRUD/cat_add.php" method="post">
							<fieldset>
								<p>
									<label>Category Name</label>
									<input class="text-input large-input" type="text" id="small-input" name="cat_name" required />
								</p>
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div>
							
						</form>
					</div>
					<div class="tab-content" id="tab-3"> <!-- This is the target div. id must match the href of this div's tab -->
						<h6 style="color:red"><?php if(isset($_GET['err'])&&$_GET['err']==3)echo "Publisher name already taken"?></h6>
						<form action="../CRUD/pub_add.php" method="post">
							<fieldset>
								<p>
									<label>Publisher Name</label>
									<input class="text-input large-input" type="text" id="small-input" name="pub_name" required />
								</p>
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div>
							
						</form>
					</div>
					<div class="tab-content" id="tab-4"> <!-- This is the target div. id must match the href of this div's tab -->
					<h6 style="color:red"><?php if(isset($_GET['err'])&&$_GET['err']==5)echo "Username already taken";
						else if(isset($_GET['err'])&&$_GET['err']==6)echo "Incorrect Phone number format";
						else if(isset($_GET['err'])&&$_GET['err']==7)echo "Password smaller than 8 characters";
						else if(isset($_GET['err'])&&$_GET['err']==8)echo "Password must contain more than one type of character (UPPERCASE,lowercase,numbers) or can contain only symbols";?></h6>
						<form action="../CRUD/admin_add.php" method="post">
							<fieldset>
								<p>
									<label>Admin's Username</label>
									<input class="text-input large-input" type="text" id="small-input" name="username" required />
								</p>
								<p>
									<label>Admin's password</label>
									<input class="text-input large-input" type="password" id="small-input" name="password" required ></input>
								</p>
								<p>
									<label>Admin's name</label>
									<input class="text-input small-input" type="text" id="price" name="name" required />
								</p>
								<p>
									<label>Email</label>
									<input class="text-input medium-input" type="email" name="email" required />
								</p>
								<p>
									<label>Phone</label>
									<input class="text-input large-input" type="number" id="small-input" name="phone" placeholder="(Optional)"/>
								</p>
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div>
							
						</form>
					</div>
				</div> <!-- End .content-box-content -->
				
			</div>
			<!-- End Notifications -->
			
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
	<script src="../js/vendor/jquery-library.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en">
    </script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.vide.min.js"></script>
    <script src="../js/countdown.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/parallax.js"></script>
    <script src="../js/countTo.js"></script>
    <script src="../js/appear.js"></script>
    <script src="../js/gmap3.js"></script>
    <script src="../js/main.js"></script>										
	<script>
		$(document).ready(function(){
			$('.click').click(function(){
				var a=$(this).parent().parent().find('th[class=id]').html();
				var b=$(this).parent().parent().find('th[class=type]').html();
				$.ajax({
                    url: '../CRUD/edit.php',
                    type: 'POST',
                    data: {
                        id: a,
                        type: b
                    },
                    success:function(result) {
						$('.edit-container').html(result);
                    }
                });
			});
		});
	</script>

<!-- Download From www.exet.tk-->
</html>