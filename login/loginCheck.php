<?php
if (!isset($_SESSION))session_start();
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
$u=new users();
if($_POST['type']=="login"){
    $data=$u->check($_POST['email'],$_POST['password']);
    if(isset($_SESSION['info'])){
        ?>
        <h4>Log In</h4>
        <h6 style="color:red;" class="err1">You are already logged in!</h6>
        <form class="tg-formtheme tg-formcontactus">
            <fieldset>
                <div class="form-group" style="width:100%;">
                    <input type="email" id="login-email" class="form-control" placeholder="Email*" value="<?php echo $_POST['email']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="password" id="login-password" class="form-control" placeholder="Password*" required>
                </div>
                <div class="form-group" style="display:none;">
                    <input type="password" id="type" value="login">
                </div>
            </fieldset>
        </form>
        <?php
        return;
    }else if(Count($data)==1){
        foreach($data as $v){
            $_SESSION['info']=['name'=>$v['name'],'email'=>$v['email'],'phone'=>$v['phone'],'address'=>$v['address']];
            print_r("Hi, ".$_SESSION['info']['name']);
            return;
        }
    }
    else{
        ?>
        <h4>Log In</h4>
        <h6 style="color:red;" class="err1">Incorrect email or password</h6>
        <form class="tg-formtheme tg-formcontactus">
            <fieldset>
                <div class="form-group" style="width:100%;">
                    <input type="email" id="login-email" class="form-control" placeholder="Email*" value="<?php echo $_POST['email']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="password" id="login-password" class="form-control" placeholder="Password*" required>
                </div>
                <div class="form-group" style="display:none;">
                    <input type="password" id="type" value="login">
                </div>
            </fieldset>
        </form>
        <?php
        return;
    }
    header("location:../login.php");
}else if($_POST['type']=="signup"){
    if(isset($_SESSION['info'])){
        ?>
        <h4>Sign Up</h4>
        <h6 style="color:red;" class="err2">You are already logged in!</h6>
        <form class="tg-formtheme tg-formcontactus">
            <fieldset>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="name" class="form-control" id="signup-name" placeholder="Full Name*" value="<?php echo $_POST['name']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="email" name="email" class="form-control" id="signup-email" placeholder="Email*" value="<?php echo $_POST['email']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="password" name="password" class="form-control" id="signup-password" placeholder="Password* (Must contain more than 1 character type and has 7+ characters)" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="address" class="form-control" id="signup-address" placeholder="Address*" value="<?php echo $_POST['address']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="phone" class="form-control" id="signup-phone" placeholder="Phone Number (Optional)" value="<?php echo $_POST['phone']?>">
                </div>
                <div class="form-group" style="display:none;">
                    <input type="password" name="type" id="type1" value="signup">
                </div>
                
            </fieldset>
        </form>
        <?php
        return;
    }
    else if($u->CheckEmail($_POST['email'])>=1){
        ?>
        <h4>Sign Up</h4>
        <h6 style="color:red;" class="err2">Email already in use!</h6>
        <form class="tg-formtheme tg-formcontactus">
            <fieldset>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="name" class="form-control" id="signup-name" placeholder="Full Name*" value="<?php echo $_POST['name']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="email" name="email" class="form-control" id="signup-email" placeholder="Email*" value="<?php echo $_POST['email']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="password" name="password" class="form-control" id="signup-password" placeholder="Password* (Must contain more than 1 character type and has 7+ characters)" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="address" class="form-control" id="signup-address" placeholder="Address*" value="<?php echo $_POST['address']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="phone" class="form-control" id="signup-phone" placeholder="Phone Number (Optional)" value="<?php echo $_POST['phone']?>">
                </div>
                <div class="form-group" style="display:none;">
                    <input type="password" name="type" id="type1" value="signup">
                </div>
                
            </fieldset>
        </form>
        <?php
        return;
    }else if(strlen($_POST['password'])<8){
        ?>
        <h4>Sign Up</h4>
        <h6 style="color:red;" class="err2">Password is smaller than 8 characters</h6>
        <form class="tg-formtheme tg-formcontactus">
            <fieldset>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="name" class="form-control" id="signup-name" placeholder="Full Name*" value="<?php echo $_POST['name']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="email" name="email" class="form-control" id="signup-email" placeholder="Email*" value="<?php echo $_POST['email']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="password" name="password" class="form-control" id="signup-password" placeholder="Password* (Must contain more than 1 character type and has 7+ characters)" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="address" class="form-control" id="signup-address" placeholder="Address*" value="<?php echo $_POST['address']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="phone" class="form-control" id="signup-phone" placeholder="Phone Number (Optional)" value="<?php echo $_POST['phone']?>">
                </div>
                <div class="form-group" style="display:none;">
                    <input type="password" name="type" id="type1" value="signup">
                </div>
                
            </fieldset>
        </form>
        <?php
        return;
    }else if(ctype_upper($_POST['password'])||ctype_lower($_POST['password'])||is_numeric($_POST['password'])){
        ?>
        <h4>Sign Up</h4>
        <h6 style="color:red;" class="err2">Password must contain more than 1 type of character(lowercase,UPPERCASE,numbers) or only symbols</h6>
        <form class="tg-formtheme tg-formcontactus">
            <fieldset>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="name" class="form-control" id="signup-name" placeholder="Full Name*" value="<?php echo $_POST['name']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="email" name="email" class="form-control" id="signup-email" placeholder="Email*" value="<?php echo $_POST['email']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="password" name="password" class="form-control" id="signup-password" placeholder="Password* (Must contain more than 1 character type and has 7+ characters)" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="address" class="form-control" id="signup-address" placeholder="Address*" value="<?php echo $_POST['address']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="phone" class="form-control" id="signup-phone" placeholder="Phone Number (Optional)" value="<?php echo $_POST['phone']?>">
                </div>
                <div class="form-group" style="display:none;">
                    <input type="password" name="type" id="type1" value="signup">
                </div>
                
            </fieldset>
        </form>
        <?php
        return;
    }else if(strlen($_POST['phone'])<10&&$_POST['phone']!=""){
        ?>
        <h4>Sign Up</h4>
        <h6 style="color:red;" class="err2">Incorrect phone number format (must contain atleast 10 numerals)</h6>
        <form class="tg-formtheme tg-formcontactus">
            <fieldset>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="name" class="form-control" id="signup-name" placeholder="Full Name*" value="<?php echo $_POST['name']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="email" name="email" class="form-control" id="signup-email" placeholder="Email*" value="<?php echo $_POST['email']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="password" name="password" class="form-control" id="signup-password" placeholder="Password* (Must contain more than 1 character type and has 7+ characters)" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="address" class="form-control" id="signup-address" placeholder="Address*" value="<?php echo $_POST['address']?>" required>
                </div>
                <div class="form-group" style="width:100%;">
                    <input type="text" name="phone" class="form-control" id="signup-phone" placeholder="Phone Number (Optional)" value="<?php echo $_POST['phone']?>">
                </div>
                <div class="form-group" style="display:none;">
                    <input type="password" name="type" id="type1" value="signup">
                </div>
            </fieldset>
        </form>
        <?php
        return;
    }
    if($_POST['phone']!=""){
        $u->addUser($_POST['email'],$_POST['name'],$_POST['password'],$_POST['address'],$_POST['phone']);
    }else{
        $u->addUser($_POST['email'],$_POST['name'],$_POST['password'],$_POST['address']);
    }
    $_SESSION['info']=['name'=>$_POST['name'],'email'=>$_POST['email'],'phone'=>$_POST['phone'],'address'=>$_POST['address']];
    print_r("Hi, ".$_SESSION['info']['name']);
    return;
}
?>
