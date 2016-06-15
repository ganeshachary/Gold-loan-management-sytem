<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
}
        if(isset($_POST['submit']))
        {
            $name=$_POST['name1'];
            $amount=$_POST['amount1'];
            $percentage=$_POST['percentage1'];
            $description=$_POST['description1'];
            $fine=$_POST['fine1'];
            $schedule=$_POST['schedule1'];
     
            $con=mysql_connect("localhost","root","");
            if(!$con)
            {
                die("Cannot connect".mysql_error());
            }
            mysql_select_db("gold_loan",$con);
            
            $sql="INSERT INTO master (name,amount,percentage,description,schedule,fine)
            VALUES ('$name','$amount','$percentage','$description','$schedule','$fine')";
            
            
            
        if(mysql_query($sql,$con))
            {
            $_SESSION['success']="true";
            }
            else
            {
            echo "error";
            }
          
            mysql_close($con);
        }  
header("Location:master.php");






    ?>
    