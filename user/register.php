<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mobno=$_POST['mobno'];
    $add=$_POST['address'];
    $password=md5($_POST['password']);
    $ret="select MobileNumber from tbluser where MobileNumber=:mobno";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':mobno', $mobno, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FirstName,LastName,MobileNumber,Address,Password)Values(:fname,:lname,:mobno,:add,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':add',$add,PDO::PARAM_STR);

$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have signup  Succesfully');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "<script>alert('This Mobile Number already exist. Please try again');</script>";
}
}


?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>Register | Online Birth And Death Certificate System</title>
   
		
  
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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

    .contactleft h1{
    text-decoration: none;
    color: rgb(103, 3, 170);
    
    }
    .contactleft a{
    text-decoration: none;
    color: rgb(112, 112, 112);
    font-size: 13px;
}
    .contain{
    width: 50%;
    margin: 50px auto;
}
.contactright h1{
    color: white;
    margin-bottom: 20px;
}
.contain p{
    color: rgb(103, 3, 170);
}

.contactbox .contactleft h3{
    color: rgb(103, 3, 170);
    margin-bottom: 30px;
    font-weight: 600;
}

.contactbox{
    background: white;
    display: flex;
}
.contactleft{
    flex-basis: 50%;
    padding: 40px 60px;
}
.contactleft p{
    color: grey;
}
.contactright{
    font-size: 15px;
    color: white;
  text-align: center;
    flex-basis: 50%;
    padding: 40px;
    background-color: rgb(103, 3, 170);
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
border-radius: 20px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
}
.contactright p{

    color: white;
}
.contactright a{
    text-decoration: none;
    color: rgb(112, 112, 112);
    font-weight: bold;
}
.contactright a:hover{
    color: white;
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

.inp{
    font-size: 10px;
    padding: 20px;
}

label{
    margin-top: 10px;
    margin-bottom: 6px;
    display: block;
    color: rgb(112, 112, 112);
}
form button{
margin-left: 0%;
font-weight: bold;
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
}
  
button{
    font-weight: bold;
    float: left;
margin-left: 50px;

    width: 100px;
    height: 50px;
    outline: none;
    background: rgb(103, 3, 170);
    color: white;
    padding: 10px;
    border: 2px solid black;
}
button:hover{
    background-color: white;
    text-decoration: none;
    color: rgb(103, 3, 170);
    font-weight: bold;
}

  

.log{
    background-color: white;
    font-weight: bold;
    text-decoration: none;
    color: hsl(32, 98%, 51%);

}
.log:hover{
    background-color: rgb(103, 3, 170);
    color: white;
}
.logo{
   display: flex;
   justify-content: center;
   align-items: center;
    height: auto;
    padding: 10px;
    margin-top: auto;
    text-align: center;
    margin-bottom: auto;

}
.contactright button{

margin-left: 35px;

    width: 200px;
    height: 50px;
    outline: none;
    background: black;
    color: white;
    padding: 10px;
    border: 2px solid black;
    font-weight: bold;

}
.contactright button:hover{
background-color: white;
    text-decoration: none;
    color: rgb(103, 3, 170);
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
  
    
                            
                                           
                                  
                                              
                                               
                                           
                        
                    


                       
    <header>
    <h1 class="top">ONLINE BIRTH AND <br>
    DEATH CERTIFICATION SYSTEM</h1>
    </header>
    <div class="contain">
        <div class="contactbox">
        <div class="contactleft">
        <h1>User Registration Form</h1>
       
        <form method="post">
           <div class="input-group">                        
              <label>First Name</label>
              <input type="text" name="fname" required="true" />
            </div>
           
            <div class="input-group">                        
              <label>Last Name</label>
              <input type="text" name="lname" required="true" />
            </div>
          
            <div class="input-group">
              <label>Phone Number</label>
              <input type="text" name="mobno" maxlength="10" pattern="[0-9]+" required="true" />
            </div>
            
            <div class="input-group">
                <label>Address</label>
                <input type="text" name="address" />
              </div>
          
            <div class="input-group">
              <label>Enter Password</label>
              <input type="password" name="password" required="true" />
            </div>

            
              <div class="inp">By creating account you will accept the following <a href=""> Terms and conditions</a></div>

              <button type="submit" name="submit">REGISTER</button>
        </form>
        <a href="login.php"><button>Back</button></a>

    
      </div>
      
        <div class="contactright"> 
            <br>
            <br>
            <br>
        <h1>YOU'R ONE STEP</h1>
         <h1>FURTHER</h1>   
         <BR>
        <h1>OR,</h1>
        <br>
    
        <p>Do you have an account? <a href="login.php">Sign in.</a></p>
        <a href="login.php"><button>LOGIN</button></a>
        <p>
    </p>
      
        </div>
      </div>
      </div>
      
                        

   <?php include_once('includes/footer.php');?>
   
    <script src="js/main.js"></script>
</body>

</html>