<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../../Login.php');
}

?>
    
                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                                 <th>Select</th>
                                    <th>Loan ID</th>
                                  
                                  
                                                    
                                    <th>Cash Paid</th>
                                 
                                    <th>Transaction Date</th>
                                    <th>Remarks</th>
                                    <th>Transaction ID</th>                                
                                  <th>option</th>
                         
                         
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                                   <th>Select</th>
                                    <th>Loan ID</th>
                                  
                                                                  
                                    <th>Cash Paid</th>
                                   
                                    <th>Transaction Date</th>
                                    <th>Remarks</th>
                                    <th>Transaction ID</th>                                
                                  <th>option</th>
                         
            </tr>
        </tfoot>
 
        <tbody>
            
<?php

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
             
            $sql= "delete FROM loan_emi where transaction_id =".$value;  
            $results=mysqli_query($con,$sql);
    }
    
    if($results)
    {
    $sql2= "SELECT * FROM loan_emi";  
     $results2=mysqli_query($con,$sql2);
     if($results2)
                    {
                                                   while($emp=mysqli_fetch_array($results2))
  
                           {
                              echo "<tr>";

                                echo "<td ><input type='checkbox' value='".$emp['transaction_id']."' onclick='showvalue(this.value)'/></td>";
                                echo "<td>".$emp['loan_id']."</td>";
                              
                                //echo "<td>".$emp['balance']."</td>";
                                //echo "<td>".$emp['emi_amount']."</td>";                        
                                echo "<td>".$emp['cash_paid']."</td>";                           
                                //echo "<td>".$emp['late_fine']."</td>";                            
                                //echo "<td>".$emp['discount']."</td>";
                                //echo "<td>".$emp['total_payment']."</td>";
                                echo "<td>".$emp['transaction_date']."</td>";
                                echo "<td>".$emp['remarks']."</td>";
                                echo "<td>".$emp['transaction_id']."</td>";
                                
                                 echo "<td><button type='button'  name='Update' value='".$emp['transaction_id']."' class='btn btn-success update' data-toggle='modal' data-target='#modal2'>view</button></td>";

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
    