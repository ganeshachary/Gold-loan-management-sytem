<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
}



                $p="";
        if(isset($_POST['submit']))
        {
                  
            $date=$_POST['date1'];
            $loan_id=$_POST['loan_id1'];
            $cust_id=$_POST['cust_id1'];
            $amount_lend=$_POST['amount_lend1'];
            $interest=$_POST['interest1'];
            $emidate=$_POST['amt_pergram1'];
            $auction_period=$_POST['auction_period1'];
            $settlement=$_POST['settlement1'];
            $balance=$_POST['balance1'];
            $paid=$_POST['paid1'];
            $item_description=$_POST['item_description1'];
            $item_quantity=$_POST['item_quantity1'];
            $gross_wt=$_POST['gross_weight1'];
            $net_wt=$_POST['net_weight1'];
            $emi=$_POST['quality1'];

            $con=mysql_connect("localhost","root","");
            if(!$con)
            {
                die("Cannot connect".mysql_error());
            }
            mysql_select_db("gold_loan",$con);
            
            $sql="UPDATE loan_details SET date='$date',amount_lend=$amount_lend,interest=$interest,
                 emidate='$emidate',auction_period=$auction_period,settlement='$settlement',balance=$balance,
                 paid=$paid,item_description='$item_description',item_quantity=$item_quantity,gross_wt=$gross_wt,
                  net_wt=$net_wt,emi=$emi   WHERE loan_id=$loan_id";
                
                 
            
                
                
                
                
                
               
                
                
               
                

            
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
header("Location:loandetails.php");


      


    ?>
    