<?php


$server="localhost";
$dbname="gold_loan";

$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");
 $results="";
if($con)
{
    if(isset($_POST["uname"]))
            {
            $username=$_POST["uname"];
            $sql= "SELECT * FROM borrower where name LIKE'".$username."%'";  
            $results=mysqli_query($con,$sql);
}
      
     $sql2= "SELECT * FROM borrower";  
     $results2=mysqli_query($con,$sql2);
    
   
   
}

mysqli_close($con);
?>
  
                        <table class="table table-hover table-bordered">
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
                                  <th>Pincode</th>
                                  <th>City</th>
                                  <th>State</th>
                                  <th>Country</th>
                                    <th>option</th>
                            </tr>
            
                            <?php
                   if($results)
                   {
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
                   }
                    else  if($results2)
                    {
                                                   while($emp=mysqli_fetch_array($results2))
  
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
                    }

              ?>
             
             
             
                        </table>
          