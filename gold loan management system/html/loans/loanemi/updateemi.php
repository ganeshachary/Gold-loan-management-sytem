 <?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../../Login.php');
}
        if(isset($_POST['submit']))
        {
           $loan_id=$_POST['loan_id1'];
            //$cust_id=$_POST['cust_id1'];
            $transaction_date=$_POST['transaction_date1'];
            $transaction_id=$_POST['transaction_id1'];
           // $emi_amount=$_POST['emi_amount1'];
           // $balance=$_POST['balance1'];
            $remarks=$_POST['remarks1'];
            $cash_paid=$_POST['cash_paid1'];
           // $late_fine=$_POST['late_fine1'];
           // $discount=$_POST['discount1'];
           // $total_payment=$_POST['total_payment1'];
                    
            $con=mysql_connect("localhost","root","");
            if(!$con)
            {
                die("Cannot connect".mysql_error());
            }
            mysql_select_db("gold_loan",$con);
            
         
            
        
            $sql="UPDATE loan_emi SET loan_id=$loan_id,transaction_date='$transaction_date',remarks='$remarks',cash_paid=$cash_paid WHERE 
 transaction_id= $transaction_id";          
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
    