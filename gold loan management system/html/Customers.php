<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: Login.php');
}
$success="";
if(isset($_SESSION['updated']))
{
$success="updated";
    unset($_SESSION['updated']);
}
if(isset($_SESSION['success']))
{
$success="success";
    unset($_SESSION['success']);
}
if(isset( $_SESSION['userrole']))
{
$role=$_SESSION['userrole'];
   // unset($_SESSION['success']);
}
$server="localhost";
$dbname="gold_loan";


$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM borrower";  
     $results=mysqli_query($con,$sql);
   
     $sql1 = "SHOW TABLE STATUS LIKE 'borrower'";
    $showId = mysqli_query($con, $sql1);
            $rowId = mysqli_fetch_array($showId);
            $nextId = $rowId['Auto_increment'];
   
   
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
               <title>GOLD LOAN</title>
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://datatables.net/release-datatables/extensions/Plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    
    <script src="http://datatables.net/download/build/nightly/jquery.dataTables.js"></script>
    <script src="http://datatables.net/release-datatables/extensions/TableTools/js/dataTables.tableTools.js"></script>
    <script src="http://datatables.net/release-datatables/extensions/Plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script>

    <!--XLSX-->
    <script type="text/javascript" src="http://oss.sheetjs.com/js-xlsx/xlsx.core.min.js"></script>
<script type="text/javascript" src="http://sheetjs.com/demos/Blob.js"></script>
<script type="text/javascript" src="http://sheetjs.com/demos/FileSaver.js"></script>
  <script src="../html/excel/save.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <!-- <script src="/"jquery-ui-1.11.4/jquery-ui.min.js"  ></script> -->
     
        <link rel="stylesheet" href="css/Loginpage.css" type="text/css"/>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      
     <link rel="stylesheet" href="css/home.css">
       
       
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    
       </script>
      
       <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        
<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.8/css/dataTables.bootstrap.min.css" rel="stylesheet">

      
    </head>
    
    <body>
        
         <nav class="navbar navbar-default navbar-fixed-top">
             
             <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                </button>
                                        <a class="navbar-brand" href="#"><b>GBV Loans</b></a>
                        </div>
                 
                 
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li><a href="home.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
              
              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-th-list"></span>&nbsp;Options<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href=""><img src="../images/customer1.jpg" height="20px" width="20px"/>&nbsp;<b>Customer</b></a></li>
                        <li><a href="../html/loans/loanemi/loandetails.php"><img src="../images/borrower2.jpg" height="20px" width="20px"/>&nbsp;<b>EMI</b></a></li>
                        <li><a href="../html/loans/loandetails.php"><img src="../images/laons.jpg" height="20px" width="20px"/>&nbsp;<b>Loans</b></a></li>
                        <li><a href="../html/createuser/createuser.php"><img src="../images/emloyee.png" height="20px" width="20px"/>&nbsp;<b>Users</b></a></li>
                        <li><a href="master/master.php"><img src="../images/master.jpg" height="20px" width="20px"/>&nbsp;<b>Master</b></a></li>
              </ul>
            </li>
              
          </ul>
               <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span>&nbsp;<?php echo "".ucfirst($_SESSION['login_user']); ?>  <span class="caret"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="Logout.php"><span class="glyphicon glyphicon-off"></span> &nbsp; Log Out</a></li>
               
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
        <div class="clear-fix"></div>
       <br/>
          <br/>
          <br/>
      
        
        <div style="background-color:grey"></div>
        <div class="container">
               <div class="row">
                    
            
           
            
          
               
                       <div class="col-lg-8 col-md-8 col-sm-8">
                        <img src="../images/customer1.jpg" height="70px" width="70px"/>
                           <i style="font: 25px arial;"> Customers</i>
                       </div>
                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-top:15px;">
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">New Customer</button>
                       &nbsp;  <button id="saveMe"type="button" class="btn btn-success">Export Excel</button>
                       </div>
                  
                       
                        
                </div>
        </div>
           <div style="clear: both; margin-bottom: 20px"></div>
         
        
     
        <div class="container">
            <div class="row">
                       <div class="col-lg-4 col-md-4 col-sm-4">
                       <button type="button" id="sendemail" class="btn btn-primary">Email</button>
                       &nbsp;  <button id = "deletebtn" type="button" class="btn btn-danger">Delete</button>
                       </div>
                 <div class="col-lg-4 col-md-4 col-sm-4">
                       &nbsp;
                       </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                      <div class="input-group">
                           
</div>
            
            </div>
        </div>
        </div>
    
        
                  <script>
                            $(document).ready(function(){
                               
                                 var role="<?php echo $role;?>";
                                     if(role=="manager")
                                     {
                                         $("#sendemail").attr("disabled", "disabled");
                                     }
                                var successmg="<?php echo $success;?>";
                                if(successmg=="success")
                                {
                                 $("#successmsg").fadeIn(1000).delay(3000).fadeOut(1000);
                                  $("#successcontent").html("Data Saved successfully");
                                }   
                                
                                 if(successmg=="updated")
                                {
                                 $("#successmsg").fadeIn(1000).delay(3000).fadeOut(1000);
                                  $("#successcontent").html("Data Updated successfully");
                                }   
                                $("#sendemail").click(function(event)
                                                     {
                               
                                        var checked2=[];
                                     $('input:checkbox:checked').each(function () {
                                      checked.push($(this).val());
                                     })
                                      
                                       
                                      $.ajax({
                                         
                                          url: 'sendemail.php',
                                           type: 'POST',
                                          data: {checkedarray2:checked2},
                                          success: function(result){
                                              
                                              alert(result);
                                          
                                          }
                                        });   
                                           
                                              
                               });
                               
                                
                                
                                $("#searchbox").keyup(function(){
                                   var username= $("#searchbox").val();
                                if($("#searchbox").val()!="")
                             {
                             $.ajax({
                                    url: "customers/loaddetails.php",
                                 type:"POST",
                                 data :{
                                        uname:username
                                        },
                                  success: function(result){
                                    $("#tabledetails").html(result);
                                  }});}
                                else
                                {
                                   $.ajax({
                                    url: "customers/loaddetails.php",
                                 type:"POST",
                                  success: function(result){
                                    $("#tabledetails").html(result);
                                  }});
                                }
                            });
                                
                                  
                                               $("#deletebtn").click(function(event){
                                      
                                        var checked=[];
                                     $('input:checkbox:checked').each(function () {
                                      checked.push($(this).val());
                                     })
                                      
                                       
                                      $.ajax({
                                         
                                          url: 'deletecustomer.php',
                                           type: 'POST',
                                          data: {checkedarray:checked},
                                          success: function(result){
                                              $("#successmsg").fadeIn(1000).delay(3000).fadeOut(1000);
                                              $("#successcontent").html("Data deleted successfully");
                                              
                                           $("#tabledetails").html("");
                                           $("#tabledetails").html(result);
                                          }
                                        });   
                                 
                                               
                                               });
                                               
                                               
                                               $(".update").click(function(event){
                                                     $("#modal2").html("");
                                                    var value1=$(this).val();
                                                    $.ajax({
                                                        url:'updatecustomers.php',
                                                        type:'POST',
                                                        data:{
                                                            id:value1
                                                        },
                                                        success:function(result)
                                                        {
                                                       
                                                            
                                                        $("#modal2").html(result);
                                                            $("#tab12").attr("class","active");                                     
                                                            $("#ptab2").show();  
                                                            $("#ftab2").hide();
                                                            $("#atab2").hide();   
                                                        }
                                                    });
                                                         
                                               });
                                
                                $(".update").click(function(event){
                                                     $("#modal2").html("");
                                                    var value1=$(this).val();
                                                    $.ajax({
                                                        url:'updatecustomers.php',
                                                        type:'POST',
                                                        data:{
                                                            id:value1
                                                        },
                                                        success:function(result)
                                                        {
                                                       
                                                            
                                                        $("#modal2").html(result);
                                                            $("#tab12").attr("class","active");                                     
                                                            $("#ptab2").show();  
                                                            $("#ftab2").hide();
                                                            $("#atab2").hide();   
                                                        }
                                                    });
                                                         
                                               });
                                
                                
                                /* $("#savedata").click(function(event){
                                                    
                                                       id1=$('[name="custid"]').val();
                                                       name1=$('[name="custname"]').val();
                                                        age1=$('[name="custage"]').val();
                                                        gender1=$('[name="gender"]').val();
                                                        dob1=$('[name="dob"]').val();
                                                        phone1=$('[name="phonr"]').val();
                                                        email1=$('[name="email"]').val();
                                                        occupation1=$('[name="occupation"]').val();
                                                        address1=$('[name="address"]').val();
                                                        pin1=$('[name="pin"]').val();
                                                        city1=$('[name="city"]').val();
                                                        state1=$('[name="state"]').val();
                                                        country1=$('[name="country"]').val();
                                     
                                     $("#modal1").hide();
                                     
                                                          
                                     alert(name);
                                                    $.ajax({
                                                        url:'updatecustomers.php',
                                                        type:'POST',
                                                        data:{
                                                            id:value1
                                                        },
                                                        success:function(result)
                                                        {
                                                       
                                                            
                                                        $("#modal2").html(result);
                                                            $("#tab12").attr("class","active");                                     
                                                            $("#ptab2").show();  
                                                            $("#ftab2").hide();
                                                            $("#atab2").hide();   
                                                        }
                                                    });
                                                         
                                               });*/
                                
                                
                                
                                               $("#tab1").attr("class","active");                                     
                                                $("#ptab").show();  
                                                  $("#ftab").hide();
                                                     $("#atab").hide();        
                                            
                                               
                                               $("#tab2").click(function(){
                                                    $("#ftab").show();
                                                   $("#ptab").hide();  
                                                    
                                                     $("#atab").hide();  
                                               }); 
                                                
                                                
                                                $("#tab3").click(function(){
                                                    $("#atab").show();            
                                                $("#ptab").hide();  
                                                  $("#ftab").hide();
                                                         
                                               
                                               }); 
                                                
                                                
                                                 $("#tab1").click(function(){
                                                         $("#ptab").show();  
                                                        $("#ftab").hide();
                                                     $("#atab").hide();        
                                                  
                                               }); 
                                                    
                                               
                                                $("#tab1").click(function()
                                                                 {
                                                    $("#tab1").attr("class","active");
                                                    $("#tab2").attr("class","inactive");
                                                    $("#tab3").attr("class","inactive");
                                                });
                                                
                                                 $("#tab2").click(function()
                                                                 {
                                                  $("#tab1").attr("class","inactive");
                                                    $("#tab2").attr("class","active");
                                                    $("#tab3").attr("class","inactive");
                                                });
                                                
                                                 $("#tab3").click(function()
                                                                 {
                                                    $("#tab1").attr("class","inactive");
                                                    $("#tab2").attr("class","inactive");
                                                    $("#tab3").attr("class","active");
                                                });
                                
                                
                                
                                
                                
                                //for modal2
                                
                                
                                 
                                            
                                               
                                              
                                
                                
                            });
</script>
 <div style="clear: both; margin-bottom: 20px"></div>
<div class="container">
     <div id="successmsg" class="alert alert-warning alert-dismissible" role="alert" hidden>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <div id="successcontent">Better check yourself, you're not looking too good.</div>
</div>
        </div>

        
        
        
         <div style="clear: both; margin-bottom: 20px"></div>
        
        <div class="container">
          <div class="row">
            <div id="tabledetails">
                            <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                                  <th>Select</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                  
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Occupation</th>
                                   
                                  <th>city</th>
                                
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
                                  
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Occupation</th>
                                   
                                  <th>city</th>
                                
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
                                
                                echo "<td>".$emp['phone']."</td>";
                                echo "<td class='emailid'>".$emp['email']."</td>";
                                echo "<td>".$emp['occupation']."</td>";
                               
                                echo "<td>".$emp['city']."</td>";
                                
                                 echo "<td><button type='button'  name='Update' value='".$emp['id']."' class='btn btn-success update' data-toggle='modal' data-target='#modal2'>view</button></td>";

                                echo "</tr>";
                  }

              ?>
             
             
             
                        </tbody>
    </table>

            </div>
        
          </div>
       </div>
    
    
     <!--Modal class code-->
                      <div id="modalcontainer">                                          
                      <div class="modal fade" id="modal1">
                            
                            <div class="modal-dialog modal-lg">
                            
                                <div class="modal-content">
                                
                                    <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">Borrower Information</h3>
                                    </div>
                                
                                    <div class="modal-body">
                                        
                                        <ul class="nav nav-tabs">
                                              <li id="tab1" role="presentation"><a id="personal"><h4>Personal information</h4></a></li>
                                              <li id="tab2" role="presentation"><a id="financial"><h4>Address information</h4></a></li>
                                              <li id="tab3" role="presentation"><a id="attach"><h4>Attachment</h4></a></li>
                                        </ul>

                                        
                                        
                                        <div id="display" style="padding-top:10px;">
                                         <form id="mca" method="POST" action="newinsert.php">
                                              <!--personalinfo-->
                                             <div id="ptab" class="panel panel-default" >
        
            <div class="panel-heading"> 
                Personal Information
            </div>
            
           
               
               
                 <div class="panel-body">
                      
                         <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="custid" class="control-label">&nbsp;&nbsp; Id: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="custid" name="custid" placeholder="CustomerID" value = "<?php echo $nextId; ?>" readonly/>
                            </div>
                          </div>
                          
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="name" class="control-label">&nbsp;&nbsp;Name: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="name"  name="custname" placeholder="CustomerName" >
                           </div>
                       </div>
                     
                     
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="age" class="control-label">&nbsp;&nbsp; Age: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="number" max="100" min="18" class="form-control" id="age"  name="custage" placeholder="AGE"/>
                            </div>
                          </div>
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="gender" class="control-label">&nbsp;&nbsp;Gender: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="radio"  id="male" required value="male" name="gender"/>&nbsp;Male &nbsp;&nbsp;
                               
                                <input type="radio"  id="female" required value="female" name="gender"/>&nbsp;Female
                               
                           </div>
                       </div>
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="dob" class="control-label">&nbsp;&nbsp; DOB: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="date" class="form-control" id="dob"  name="dob" placeholder="Date OF Birth"/>
                            </div>
                          </div>
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="phone" class="control-label">&nbsp;&nbsp;Phone: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="number"  class="form-control" id="phone" placeholder="Phone Number"  name="phone" title="enter number only"/>
                           </div>
                       </div>
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="email" class="control-label">&nbsp;&nbsp; Email: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="email" class="form-control" id="email"  name="email" placeholder="EMail" data-error="paka matt" required/>
                            </div>
                          </div>
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="occupation" class="control-label">&nbsp;&nbsp; Occupation: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="occupation"  name="occupation" placeholder="Occupation"/>
                           </div>
                       </div>
                                             
                     
          
            
            </div>
            
        </div>
                                            
                                            
                                            
                                          
                                                 
                                                 
                                                 
                                                 
                                                 
                                                   <!--Financial-->
                                                 
                                                  <div id="ftab" class="panel panel-default" >
        
            <div class="panel-heading">
                Address Information 
            </div>
            
            <div class="panel-body">
               
        
                 
                 
                
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="address" class="control-label">&nbsp;&nbsp; Address: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="address"  name="address" placeholder="Address"/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="pincode" class="control-label">&nbsp;&nbsp; Pincode: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="pincode"  name="pin" placeholder="PinCode"/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="city" class="control-label">&nbsp;&nbsp; City: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="city" name="city" placeholder="City"/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="state" class="control-label">&nbsp;&nbsp; State: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="state"  name="state" placeholder="State"/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="country" class="control-label">&nbsp;&nbsp; Country: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="country"  name="country" placeholder="Country"/>
                           </div>
                       </div>
                                        
                     
                     
                           
            </div>
            
        </div>
                                            
                                            <!--attachment-->
                                            <div id="atab"class="panel panel-default" >
        
                                                <div class="panel-heading">
                                                        Attachment
                                                </div>
            
                                                    <div class="panel-body">
               
                                                          
                                            <div class="row">
                                               <div class="col-md-3" style="padding-top:15px;">
                                                <label for="files" class="control-label">&nbsp;&nbsp; Select Documents: </label> 
                                                </div>
                                                        <div class="col-md-8" style="padding-top:10px;">
                                                <input type="file"  id="files" name="datafile" size="40"/>
                                                        </div>
                                                </div>
                                
                     
                                                
            
                                                </div>
            
                                            </div>
                                                       </form>
        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                        <button type="submit" id="savedata" form="mca" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                    
                                </div>
                            
                            
                            </div>
                        
                        
                        </div>
                             <div class="modal fade" id="modal2">
                                 
                          </div>
    </div>
    
    
    
    
    </body>
     <script>
     $(document).ready(function() {
    $('#example1').DataTable();
} );
</script>
      
        <div style="clear: both; margin-bottom: 50px"></div>
     <footer class="navbar navbar-default navbar-fixed-bottom">
      <div class="container">
        <p class="text-muted" style="padding-top:25px;padding-left:60px;">Copyrights &copy; 2015. All rights reserved . Powered by : OnesTech.Solutions.&trade; </p>
      </div>
    </footer>
</html>