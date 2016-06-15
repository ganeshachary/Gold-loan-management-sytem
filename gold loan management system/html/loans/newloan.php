 <?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
}
$v="";
        if(isset($_POST['submit']))
        {
                   
            $date=$_POST['date1'];
            $loan_id=$_POST['loan_id1'];
            $cust_id=$_POST['cust_id1'];
            $amount_lend=$_POST['amount_lend1'];
            $interest=$_POST['interest1'];
            //$emidate=$_POST['emidate'];
            $auction_period=$_POST['auction_period1'];
            $settlement=$_POST['settlement1'];
            //$balance=$_POST['balance1'];
            //$paid=$_POST['paid1'];
            $item_description=$_POST['item_description1'];
            $item_quantity=$_POST['item_quantity1'];
            $gross_wt=$_POST['gross_weight1'];
            $net_wt=$_POST['net_weight1'];
            //$emi=$_POST['quality1'];
            
            
            $con=mysql_connect("localhost","root","");
            if(!$con)
            {
                die("Cannot connect".mysql_error());
            }
            mysql_select_db("gold_loan",$con);
            
                $sql="INSERT INTO loan_details (date,cust_id,amount_lend,interest,emidate,auction_period,settlement,item_description,
item_quantity,gross_wt,net_wt,emi,balance,paid) VALUES ('$date',$cust_id,$amount_lend,$interest,NULL,$auction_period,'$settlement','$item_description',$item_quantity,$gross_wt,$net_wt,0,$amount_lend,0)";
                
                
                
              
                
                 
            
            $v="success";
            
        if(mysql_query($sql,$con))
            {
            $_SESSION['success']="true";
          //  echo "suceess";
            }
            else{
                echo "error";
            }
            
          
            mysql_close($con);
        }  
header("Location:loandetails.php");






    ?>
    