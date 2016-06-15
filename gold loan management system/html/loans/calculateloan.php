<?php
session_start();
if(empty($_SESSION['login_user']))
{
//header('Location: ../Login.php');
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
   
      $sql= "SELECT * FROM loan_details";  
     $results=mysqli_query($con,$sql);
    
    
    
     $sql2= "SELECT percentage FROM master";  
     $interest_option=mysqli_query($con,$sql2);
    
    
     
    while($emp=mysqli_fetch_array($results))
    {
                
            
        $date=$emp['date'];
        $loan_id=$emp['loan_id'];
            $cust_id=$emp['cust_id'];
            $amount_lend=$emp['amount_lend'];
            $interest=$emp['interest'];
            $emidate=$emp['emidate'];
            $auction_period=$emp['auction_period'];
            $settlement=$emp['settlement'];
            $balance=$emp['balance'];
            $paid=$emp['paid'];
            $item_description=$emp['item_description'];
            $item_quantity=$emp['item_quantity'];
            $gross_wt=$emp['gross_wt'];
            $net_wt=$emp['net_wt'];
            $emi=$emp['emi'];
         $today=date('Y-m-d');
    if($emidate=="" or $emidate==NULL or $emidate=="0000-00-00")  
    {
    $fromdate=$date;
    }
    else
    {
    $fromdate=$emidate;
    }
        $day1=date_create($fromdate);
        $day2=date_create($today);
          $diff=date_diff($day1,$day2);
     $value=$diff->format("%a");
    // echo $fromdate."<br>";
    // echo $value."<br>";
     $daysincured=$value/30;
    // echo $daysincured."<br>";
     $daysincured=round($daysincured, 1);
         $daysincured=$daysincured-$auction_period;
        if($daysincured>=1)
        {
    $emiamountcalculated=($amount_lend*($interest/100))*$daysincured;
  // echo $emiamountcalculated;
 $emiamountcalculated=$emi+$emiamountcalculated;
    $balanceupdate=$balance+$emiamountcalculated;
      $monthspending=$auction_period+$daysincured;      
      
      $sql="UPDATE loan_details SET balance=$balanceupdate,emi=$emiamountcalculated,auction_period=$monthspending WHERE loan_id=$loan_id";
        }
                 mysqli_query($con,$sql);

    }
   
            
                
                
                
                
                
               
                
                
               
                

            
            
       
mysqli_close($con);
}
}

  ?>    