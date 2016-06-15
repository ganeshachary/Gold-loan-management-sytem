ot<?php
$server="localhost";
$dbname="gold_loan";


$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM borrower";  
     $results=mysqli_query($con,$sql);
   
    
   
   
}
else
{
echo "Error in connection";
}
mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	
    <link href="css/dashboard.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <style>
      body
        {
       // margin:0;
        }
    </style>    
    
    
    </head>
    
<body>
          
<nav class="navbar navbar-default navbar-fixed-top">
   <div class="container-fluid">
    
      
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
       <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            
         
          
          <a class="navbar-brand" href="#">GBV LOANS</a>
    </div>
    
      <ul class="nav navbar-nav">
        
      </ul>
       <div id="navbar" class="navbar-collapse collapse">
        
            <form  class="navbar-form navbar-right" action="validate2.php">
            <div class="form-group">
     <input type="text" class="form-control" placeholder="username" name="username"></input>
                </div>
        <div class="form-group">
     <input type="Password" class="form-control" placeholder="password" name="password"></input>
              </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">LOGIN</button>
       </div>
       </form>
       </div>
    </div>
</nav>
    
   <!-- <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
       <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
     <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                     <li><a href="" id="master">Master</a></li>
                      
                   </ul>
                    <ul class="nav nav-sidebar">
                     <li><a  href="#">Customers</a></li>
                      
                    </ul>
                    <ul class="nav nav-sidebar">
                     <li><a  href="#">Loans</a></li>
                      
                    </ul>
                    <ul class="nav nav-sidebar">
                     <li><a  href="#">Dashboard</a></li>
                      
                    </ul>
                    <ul class="nav nav-sidebar">
                     <li><a  href="#">EMI calculator</a></li>
                      
                    </ul>
                </div>
                 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                 
               
                  </div>
        
        </div>
    
    </div>-->
    <div class="clear-fix"></div>
           
    <div class="container" style="padding:10px;background-color:#EEEEEE;">
    <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4" >
                 Borrowers
            </div>
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4   col-sm-4 col-sm-offset-4">
            
           <a href="" class="btn btn-primary">New Borrower</a>
        </div> 
    </div>
   </div>
    
  <div class="clear-fix"></div>
      
      <div class="container" style="padding:20px;">
          <div class="row">
               <div class="col-md-4 col-sm-4">
                   <a href="" class="btn btn-danger">Delete</a>
                <a href="" class="btn btn-success">Email</a>
              </div>
          <div class="col-md-4 col-sm-4">
                  
              </div>
           </div>
       </div>
    

  <div class="clear-fix"></div>
    
    
    <div class="container">                             
    <div class="row">
        <div class="col-lg-12">
         <table class="table">
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
                   
                  while($emp=mysqli_fetch_array($results))
  
                 {
                     echo "<tr>";

                        echo "<td class='warning'><input type='checkbox' value='".$emp['id']."' onclick='showvalue(this.value)'/></td>";
                        echo "<td class='warning'>".$emp['id']."</td>";
                        echo "<td class='warning'>".$emp['name']."</td>";
                        echo "<td class='warning'>".$emp['age']."</td>";
                        echo "<td class='warning'>".$emp['gender']."</td>";
                        echo "<td class='warning'>".$emp['dob']."</td>";
                        echo "<td class='warning'>".$emp['phone']."</td>";
                        echo "<td class='warning'>".$emp['email']."</td>";
                        echo "<td class='warning'>".$emp['occupation']."</td>";
                        echo "<td class='warning'>".$emp['address']."</td>";
   


                     echo "</tr>";
                  }

              ?>
             
             
             
             
             
             
             
         </table>
         </div>
        </div>
        </div>
    <script>

function showvalue(str)
        {
 
  alert(""+str);
        };
    </script>
</body>
</html>