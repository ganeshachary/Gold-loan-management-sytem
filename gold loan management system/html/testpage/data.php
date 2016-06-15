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
                                 //echo "<td><button type='button'  name='Update' value='".$emp['id']."' class='btn btn-primary update' data-toggle='modal' data-target='#modal2'>Update</button></td>";

                                echo "</tr>";
                  }

              ?>