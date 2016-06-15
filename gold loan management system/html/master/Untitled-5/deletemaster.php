
    
                     <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                                  <th>Select</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Percentage</th>
                                  
                                    <th>Description</th>
                                    
                                
                                  <th>option</th>
                         
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                                  
                                 
                                  <th>Select</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Percentage</th>
                                  
                                    <th>Description</th>
                                    
                                
                                  <th>option</th>
                         
            </tr>
        </tfoot>
 
        <tbody>
            
            
<?php


session_start();
if(empty($_SESSION['login_user']))
{
header('Location:../Login.php');
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
             
            $sql= "delete FROM master where interest_id=".$value;  
            $results=mysqli_query($con,$sql);
    }
    
    if($results)
    {
    $sql2= "SELECT * FROM master";  
     $results2=mysqli_query($con,$sql2);
     if($results2)
                    {
                                              while($emp=mysqli_fetch_array($results2))
  
                            {
                                echo "<tr>";

                                echo "<td ><input type='checkbox' value='".$emp['interest_id']."' onclick='showvalue(this.value)'/></td>";
                                echo "<td>".$emp['interest_id']."</td>";
                                echo "<td>".$emp['name']."</td>";
                                echo "<td>".$emp['amount']."</td>";
                                echo "<td>".$emp['percentage']."</td>";
                                
                                echo "<td>".$emp['description']."</td>";
                                
                                
                                 echo "<td><button type='button'  name='Update' value='".$emp['interest_id']."' class='btn btn-success update' data-toggle='modal' data-target='#modal2'>view</button></td>";

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
    