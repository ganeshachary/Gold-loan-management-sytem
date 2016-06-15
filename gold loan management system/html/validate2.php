<?php
session_start();
$server="localhost";
$dbname="gold_loan";
//$username = $_GET["username"];
//$password = $_GET["password"];
$username = $_REQUEST["q"];
$password = $_REQUEST["p"];
$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
    
      $sql= "SELECT * FROM user where username='".$username."'";  
     $results=mysqli_query($con,$sql);
   
     if($results)
    {
       while($row=mysqli_fetch_array($results))
   {
        if($password==$row['password'])
        {
                $_SESSION['login_user']=$row['username'];
                 $_SESSION['userrole']=$row['role'];
                 $_SESSION['useremail']=$row['email'];
            
            
      //   echo "$username";
        }
        else
        {
            
        }
   }
    }
    else
    {
   echo "no user found";
    }
    
    
}
else
{
//echo "Error in connection";
}
mysqli_close($con);
?>

