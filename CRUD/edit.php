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
$book=new Book();
$category=new Category();
$dataCat=$category->all();

$publisher=new Publisher();
$dataPub=$publisher->all();
if(isset($_POST['type'])&&$_POST['type']=='book'){
	$data=$book->search($_POST['id']);
	foreach($data as $book){
		?>	
		<div class="content-box">
			<div class="content-box-header">
				
				<h3>Edit</h3>
				<div class="clear"></div>
				
			</div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab-1">
					
					<form action="../CRUD/edit_book.php" method="post" enctype="multipart/form-data">
						<fieldset>
							<input style="display:none;" name="book_id" type="text" value="<?php echo $book['book_id']?>">
							<p>
								<label>Book Name</label>
								<input class="text-input large-input" value="<?php echo $book['book_name']?>" type="text" id="small-input" name="book_name" required />
							</p>
							<p>
								<label>Description</label>
								<textarea class="text-input large-input" id="small-input" name="description" required ><?php echo $book['description']?></textarea>
							</p>
							<p>
								<label>Price</label>
								<input class="text-input small-input" value="<?php echo $book['price']?>" type="number" id="price" name="price" required />
							</p>
							<p>
								<label>Image</label>
								<img src="../images/book/<?php echo $book['img']?>" height="200px;"><br>
								<input class="text-input medium-input" type="file" id="small-input" accept="image/*" name="img"/>
							</p>
							<p>
								<label>Publisher's Name</label>
								<select class="medium-input" name="pub_id" required>
									<?php
										foreach($dataPub as $p){
											if($book['pub_id']==$p['pub_id']){
												?>
													<option value="<?php echo $p['pub_id']?>" selected><?php echo $p['pub_name']?></option>
												<?php
											}else{
												?>	
													<option value="<?php echo $p['pub_id']?>"><?php echo $p['pub_name']?></option>
												<?php
											}
										}
									?>
								</select> 
							</p>
							<p>
								<label>Category's Name</label>
								<select class="medium-input" name="cat_id" required>
									<?php
										foreach($dataCat as $c){
											if($book['cat_id']==$c['cat_id']){
												?>
													<option value="<?php echo $c['cat_id']?>" selected><?php echo $c['cat_name']?></option>
												<?php
											}else{
												?>	
													<option value="<?php echo $c['cat_id']?>"><?php echo $c['cat_name']?></option>
												<?php
											}
										}
									?>
								</select> 
							</p>
							<p>
								<label>Featured</label>
								<select class="medium-input" name="featured" required>
									<?php
										if($book['FEATURED']=='yes'){
											?>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											<?php
										}else{
											?>	
												<option value="no">No</option>
												<option value="yes">Yes</option>
											<?php
										}
									?>
								</select> 
							</p>
							<p>
								<label>Sale price</label>
								<input class="text-input small-input" value="<?php if(isset($book['SALE']))echo $book['SALE']?>" type="number" id="small-input" name="sale" />
							</p>
							<p>
								<label>Pages</label>
								<input class="text-input large-input" value="<?php echo $book['pages']?>" type="number" id="small-input" name="pages" required />
							</p>
							<p>
								<input type="submit" value="Submit" />
							</p>
							
						</fieldset>
						
						<div class="clear"></div>
						
					</form>
					
				</div>
			</div>
		</div>
		<?php
	}
}else if(isset($_POST['type'])&&$_POST['type']=='publisher'){
	$data=$publisher->search($_POST['id']);
	foreach($data as $v){
		?>
			<div class="content-box">
				<div class="content-box-header">
					
					<h3>Edit</h3>
					<div class="clear"></div>
					
				</div>
				<div class="content-box-content">
					<div class="tab-content default-tab" id="tab-3"> <!-- This is the target div. id must match the href of this div's tab -->
						<form action="../CRUD/edit_pub.php" method="post">
							<fieldset>
							<input type="text" name="pub_id" value="<?php echo $v['pub_id']?>">
								<p>
									<label>Publisher Name</label>
									<input class="text-input large-input" value="<?php echo $v['pub_name']?>"type="text" id="small-input" name="pub_name" required />
								</p>
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div>
							
						</form>
					</div>
				</div>
			</div>
		<?php
	}
}else if(isset($_POST['type'])&&$_POST['type']=='category'){
	$data=$category->search($_POST['id']);
	foreach($data as $v){
		?>
			<div class="content-box">
				<div class="content-box-header">
					
					<h3>Edit</h3>
					<div class="clear"></div>
					
				</div>
				<div class="content-box-content">
				<div class="tab-content default-tab" id="tab-2"> <!-- This is the target div. id must match the href of this div's tab -->
						<h6 style="color:red"></h6>
						<form action="../CRUD/edit_cat.php" method="post">
							<fieldset>
								<input type="text" name="cat_id" value="<?php echo $v['cat_id']?>">
								<p>
									<label>Category Name</label>
									<input class="text-input large-input" value="<?php echo $v['cat_name']?>"type="text" id="small-input" name="cat_name" required />
								</p>
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div>
							
						</form>
					</div>
				</div>
			</div>
		<?php
	}
}