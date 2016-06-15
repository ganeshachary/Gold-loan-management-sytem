
    
                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
             <tr>
                                 
                                
                                  <th>Select</th>
                                    <th>Loan ID</th>
                                    <th>Customer ID</th>
                                   
                                    <th>Amount Lend</th>
                                     <th>Balance</th>
                                   <th>EMI Paid</th>
                                       <th>EMI pending</th>
                                    <th>Settlement</th>    
                                
                                  <th>option</th>
                         
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                                 <th>Select</th>
                                    <th>Loan ID</th>
                                    <th>Customer ID</th>
                                   
                                    <th>Amount Lend</th>
                                     <th>Balance</th>
                                   <th>EMI Paid</th>
                    <th>EMI pending</th>
                                    <th>Settlement</th>    
                                
                                  <th>option</th>
                         
            </tr>
        </tfoot>
 
        <tbody>
            
<?php

session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
}


$server="localhost";
$dbname="gold_loan";

if(isset($_POST['checkedarray']))
{
        $array=$_POST['checkedarray'];
        

$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");
 $results="";
if($con)
{
            foreach($array as $value)
    {
             
            $sql= "delete FROM loan_details where loan_id =".$value;  
            $results=mysqli_query($con,$sql);
    }
    
    if($results)
    {
    $sql2= "SELECT * FROM loan_details";  
     $results2=mysqli_query($con,$sql2);
     if($results2)
                    {
                                                   while($emp=mysqli_fetch_array($results2))
  
                           {
                                echo "<tr>";

                                echo "<td ><input type='checkbox' value='".$emp['loan_id']."' onclick='showvalue(this.value)'/></td>";
                                echo "<td>".$emp['loan_id']."</td>";
                                echo "<td>".$emp['cust_id']."</td>";
                                
                                 echo "<td>".$emp['amount_lend']."</td>";
                                echo "<td>".$emp['balance']."</td>";
                                
                                echo "<td>".$emp['paid']."</td>";
                               if($emp['auction_period']>6)
                                {
                                   if($emp['auction_period']>12)
                                   {
                                    echo "<td bgcolor='red' style='color:black;'>".$emp['auction_period']."</td>";
                                   }
                                    else
                                    {
                                 echo "<td bgcolor='yellow' style='color:black;'>".$emp['auction_period']."</td>";
                                    }
                                }
                                else
                                {
                                     echo "<td>".$emp['auction_period']."</td>";
                                }
                                
                                if($emp['settlement']=="yes")
                                {
                                     
                                
                                echo "<td bgcolor='#8ff279' style='color:black;'>".$emp['settlement']."</td>";
                                }
                                else
                                {
                                  echo "<td>".$emp['settlement']."</td>";
                                }
                               
                                 echo "<td><button type='button'  name='Update' value='".$emp['loan_id']."' class='btn btn-success update' data-toggle='modal' data-target='#modal2'>view</button></td>";

                                echo "</tr>";
                  }
                    }        
    }
           

      
     
    
   
   
}

mysqli_close($con);

}
?>
                  
        </tbody>
    </table>

    <script>
     $(document).ready(function() {
    $('#example1').DataTable();
} );
</script>
    