 <?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../../Login.php');
}
$v="";
        if(isset($_POST['submit']))
        {
            $loan_id=$_POST['loan_id1'];
           
            $transaction_date=$_POST['transaction_date1'];
      //  $transaction_id=$_POST['transaction_id1'];
         //   $emi_amount=$_POST['emi_amount1'];
          //  $balance=$_POST['balance1'];
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
            
            $sql="INSERT INTO loan_emi (loan_id,transaction_date,remarks,cash_paid)
            VALUES ($loan_id,'$transaction_date','$remarks', $cash_paid)";
            
            $v="success";
            
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








$server="localhost";
$dbname="gold_loan";


$date=$loan_id=$cust_id=$amount_lend=$interest=$amt_pergram=$auction_period=$settlement=$balance=$paid=$item_description=$item_quantity=$gross_wt=$net_wt=$quality="";


           
//if(isset($_POST['id']))
{
 //   $id2=$_POST['id'];
    $con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM loan_details where  loan_id=".$_POST['loan_id1'];  
     $results=mysqli_query($con,$sql);
    
    
    
    
    
     
    while($emp=mysqli_fetch_array($results))
    {
                
            
        //$date=$emp['date'];
       // $loan_id=$emp['loan_id'];
         //   $cust_id=$emp['cust_id'];
         //   $amount_lend=$emp['amount_lend'];
           // $interest=$emp['interest'];
           // $emidate=$emp['emidate'];
          $auction_period=$emp['auction_period'];
          //  $settlement=$emp['settlement'];
         $balance=$emp['balance'];
            $paid=$emp['paid'];
            //$item_description=$emp['item_description'];
          //  $item_quantity=$emp['item_quantity'];
          //  $gross_wt=$emp['gross_wt'];
           // $net_wt=$emp['net_wt'];
            $emi=$emp['emi'];
            $monthspaid=$paid+$remarks;
         $auction_period= $auction_period-$remarks;
    $balanceupdate=$balance-$cash_paid;
    $emiamountcalculated=$emi-$cash_paid;
        if( $emiamountcalculated<0)
        {
        $emiamountcalculated=0;
        }
      $sql2="UPDATE loan_details SET balance=$balanceupdate,emi=$emiamountcalculated ,emidate='$transaction_date',paid=$monthspaid,auction_period=$auction_period WHERE loan_id=".$_POST['loan_id1'];
                echo "success";
                 mysqli_query($con,$sql2);

    }
   
            
                
                
                
                
                
               
                
                
               
                

            
            
       
mysqli_close($con);
}
}
header("Location:loandetails.php");
  ?>    
    