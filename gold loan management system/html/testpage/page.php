<?php
//session_start();
//if(empty($_SESSION['login_user']))
//{
//header('Location: Login.php');
//}

$server="localhost";
$dbname="gold_loan";


$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM borrower";  
     $results=mysqli_query($con,$sql);
   
    // $sql1 = "SHOW TABLE STATUS LIKE 'borrower'";
  //  $showId = mysqli_query($con, $sql1);
       //     $rowId = mysqli_fetch_array($showId);
       //     $nextId = $rowId['Auto_increment'];
   
   
}
else
{
echo "Error in connection";
}
mysqli_close($con);
?>
 <script>
     $(document).ready(function() {
    $('#example1').DataTable();
} );
</script>

<!DOCTYPE html>
<html>
    <head>
    
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        
<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.8/css/dataTables.bootstrap.min.css" rel="stylesheet">

        
    </head>
    <body>
    
                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                                   <th>Select</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Occupation</th>
                                    <th>Address</th>
                                  <th>pincode</th>
                                  <th>city</th>
                                  <th>state</th>
                                  <th>country</th>
                                <th>option</th>
                         
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                                  <th>Select</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Occupation</th>
                                    <th>Address</th>
                                  <th>pincode</th>
                                  <th>city</th>
                                  <th>state</th>
                                  <th>country</th>
                                  <th>option</th>
            </tr>
        </tfoot>
 
        <tbody>
              <?php
                   
                            while($emp=mysqli_fetch_array($results))
  
                            {
                                echo "<tr>";

                                echo "<td ><input type='checkbox' value='".$emp['id']."' onclick='showvalue(this.value)'/></td>";
                                echo "<td>".$emp['id']."</td>";
                                echo "<td>".$emp['name']."</td>";
                                echo "<td>".$emp['age']."</td>";
                                echo "<td>".$emp['gender']."</td>";
                                echo "<td>".$emp['dob']."</td>";
                                echo "<td>".$emp['phone']."</td>";
                                echo "<td>".$emp['email']."</td>";
                                echo "<td>".$emp['occupation']."</td>";
                                echo "<td>".$emp['address']."</td>";
                                echo "<td>".$emp['pincode']."</td>";
                                echo "<td>".$emp['city']."</td>";
                                echo "<td>".$emp['state']."</td>";
                                echo "<td>".$emp['country']."</td>";
                                echo "<td><button type='button'  name='Update' value='".$emp['id']."' class='btn btn-primary update' data-toggle='modal' data-target='#modal2'>Update</button></td>";

                                echo "</tr>";
                  }

              ?>
             
        </tbody>
    </table>

    <script>
     $(document).ready(function() {
    $('#example1').DataTable();
} );
</script>
    </body>
</html>

