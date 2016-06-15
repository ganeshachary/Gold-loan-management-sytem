<?php
session_start();
$server="localhost";
$dbname="gold_loan";
//$username = $_GET["username"];
//$password = $_GET["password"];
$username = $_POST["username"];

$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
    
      $sql= "SELECT * FROM user where username='".$username."'";  
     $results=mysqli_query($con,$sql);
   
     if($results->num_rows>0)
    {
          
           while($emp=mysqli_fetch_array($results))
    {
            
             if($emp['email']!="")
             {
             
        $emailTo="acharya.ganesh2@gmail.com";
        $subject="Pasword Recovered!";
        $body= $username."Your password is ".$emp['password'];
        $headers="From: acharya.ganesh2@gmail.com";
        if (mail($emailTo, $subject, $body, $headers))
        {
            echo "Password sent successfully to Your Email ID! ";
        } else 
        {
            echo "Mail not sent to Some Customer!";
            }
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

