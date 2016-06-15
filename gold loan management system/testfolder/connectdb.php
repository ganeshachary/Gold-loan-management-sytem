<?php


$server="localhost";
$dbname="gold_loan";


$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM borrower";  
     $results=mysqli_query($con,$sql);
   
    
   
   
}

mysqli_close($con);
?>
  <!DOCTYPE html>
<html lang="en">
   <head>
               
    </head>
    
    <body>
        
        <div class="container-fluid table-responsive">
          <div class="row">
            <div class="col-lg-12">
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
   


                                echo "</tr>";
                  }
                   }
                    else
                    {
                    echo "No Data";
                    }

              ?>
             
             
             
                        </table>
            </div>
        
          </div>
       </div>
    </body>
</html>
      
