<?php
//session_start();
//if(empty($_SESSION['login_user']))
{
//header('Location: Login.php');
}

$server="localhost";
$dbname="gold_loan";

          
if(isset($_POST['checkedarray2']))
{
        $array=$_POST['checkedarray2'];
    $con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
     foreach($array as $value)
    {
      $sql= "SELECT name,email FROM borrower where id=".$value;  
     $results=mysqli_query($con,$sql);
     if(results)
     {
    while($emp=mysqli_fetch_array($results))
    {
              if($emp['name']!="")     
               $name=$emp['name'];
             if($emp['email']!="")
              $emailTo=$emp['email'];
          
       // $emailTo="acharya.ganesh2@gmail.com";
        $subject="I hope this works!";
        $body= $name."Your Loan Amount Is pending Plzz Pay it";
        $headers="From: acharya.ganesh2@gmail.com";
        if (mail($emailTo, $subject, $body, $headers))
        {
            echo "Mail sent successfully! ";
        } else 
        {
            echo "Mail not sent to Some Customer!";
            }
             
    }
     }
         else
         {
          echo "Mail not sent to Some Customer!";
         }
     }
  
    // $sql1 = "SHOW TABLE STATUS LIKE 'borrower'";
    //$showId = mysqli_query($con, $sql1);
            //$rowId = mysqli_fetch_array($showId);
           // $nextId = $rowId['Auto_increment'];
   
   
}

mysqli_close($con);
}

  ?>    