<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
}
        if(isset($_POST['submit']))
        {
            $interest_id=$_POST['interest_id1'];
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
            
            $sql="update master set name='$name',amount='$amount',percentage='$percentage',description='$description',fine='$fine',schedule='$schedule'  where interest_id=".$interest_id;
      
            
            
            
        if(mysql_query($sql,$con))
            {
            $_SESSION['updated']="true";
            }
            else
            {
            echo "error";
            }
          
            mysql_close($con);
        }  
header("Location:master.php");






    ?>
    