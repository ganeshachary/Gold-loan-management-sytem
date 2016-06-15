<?php


session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
}

   if(isset($_POST['custvalue1']))
   {
       $id2=$_POST['custvalue1'];
       
    $con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

       if($con)
       {
   
      $sql= "SELECT * FROM borrower where id=".$id2;  
     $results=mysqli_query($con,$sql);
    
       if($results)
       {
       echo "Success":
       }
       }
       
       mysqli_close($con);
   }

?>