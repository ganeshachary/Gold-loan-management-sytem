
    
                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                                   <th>Select</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Phone</th>
                                  
                                    <th>Role</th>
                                    
                                
                                  <th>option</th>
                         
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                                  <th>Select</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Phone</th>
                                  
                                    <th>Role</th>
                                    
                                
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
             
            $sql= "delete FROM user where username ='".$value."'";  
            $results=mysqli_query($con,$sql);
    }
    
    if($results)
    {
    $sql2= "SELECT * FROM user";  
     $results2=mysqli_query($con,$sql2);
     if($results2)
                    {
                                                   while($emp=mysqli_fetch_array($results2))
  
                           {
                                echo "<tr>";

                                echo "<td ><input type='checkbox' value='".$emp['username']."' onclick='showvalue(this.value)'/></td>";
                                echo "<td>".$emp['username']."</td>";
                                echo "<td>".$emp['password']."</td>";
                                echo "<td>".$emp['email']."</td>";
                                echo "<td>".$emp['phone']."</td>";
                                echo "<td>".$emp['role']."</td>";
                               
                                echo "<td><button type='button'  name='Update' value='".$emp['username']."' class='btn btn-primary update' data-toggle='modal' data-target='#modal2'>View</button></td>";

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
    