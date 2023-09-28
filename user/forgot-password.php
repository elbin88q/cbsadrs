<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT MobileNumber FROM tbluser WHERE MobileNumber=:mobile";
$query= $dbh -> prepare($sql);

$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{

  $con = "UPDATE tbluser SET Password=:newpassword WHERE MobileNumber=:mobile";
  $chngpwd1 = $dbh->prepare($con);
  $chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
  $chngpwd1->execute();
  

echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Mobile no is invalid');</script>"; 
}
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>Forgot Password | Online Birth And Death Certificate System</title>
   
   
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
<style>
body{
    font: 1em ink free;
    font-size: 20px;
}

.top{
    font-size: 40px;
    font-weight: bold;
    color:rgb(103, 3, 170);
    padding: 40px;
text-align: center;
}
.new{
    text-decoration: none;
    color: #000000;
    font-weight: bold;
}

    .contactbox h1{
    text-decoration: none;
    color: rgb(103, 3, 170);
    
    }
    .contactbox a{
    text-decoration: none;
    color: rgb(112, 112, 112);
    font-size: 13px;
}
    .contain{
    display: flex;
    width: auto;
}
.contain p{
    color: rgb(103, 3, 170);
}


.contactbox{
    width: 50%;
    background: white;
    justify-content: center;
    align-self: center;
    text-align: center;
    margin: auto;
}
.contactbox{
    padding: 40px 60px;
}
.contactbox p{
    color: grey;
}

.input-row{
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}
.input-row .input-group{
    flex-basis: 45%;
}
input{
    width: 100%;
    border: none;
    border-bottom: 1px solid rgb(103, 3, 170);
    outline: none;
    padding-bottom: 5px;
}
.inp input{
    position: relative;
    bottom: 25px;

}

label{
    margin-top: 10px;
    margin-bottom: 6px;
    display: block;
    color: rgb(112, 112, 112);
}
form button{
margin-left: 0%;

    width: 100px;
    height: 50px;
    outline: none;
    background: rgb(103, 3, 170);
    color: white;
    padding: 10px;
    border: 2px solid black;
}
form button:hover{
    background-color: white;
    text-decoration: none;
    color: rgb(103, 3, 170);
    font-weight: bold;
    clear: both;
}
  

 
.footer-copyright-area{
  background-color: black;
  width: 100%;
  height: 100px;
}

.footer-copy-right{
  padding: 20px;
  color: white;
  text-align: center;

}

</style>

</head>

<body>
                                                    
                        <h1 class="top">ONLINE BIRTH AND <br>
    DEATH CERTIFICATION SYSTEM</h1>
    
    
    
    
    <div class="contain">
        <div class="contactbox">


        <form method="post" name="chngpwd" onSubmit="return valid();">
          
           
            <div class="input-group">
              <label>Phone Number:</label>
              <input type="text" name="mobile" placeholder="Mobile Number" required="true">
            </div>
            
                                   
          
         <div class="input-group">
              <label>New Password:</label>
              <input type="password" name="newpassword" placeholder="New Password" required="true"/>
            </div>
        
            <div class="input-group">
              <label>Confirm Password:</label>
              <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required="true" />
            </div>
            <p><a href="login.php">Already Have Account ? Sign In</a></p>
   
            <button type="submit" class="login-button login-button-lg" name="submit">Reset</button>
        </form>

    
      </div>
      
    </div>
      
    <?php include_once('includes/footer.php');?>
   
    <script src="js/main.js"></script>
</body>

</html>