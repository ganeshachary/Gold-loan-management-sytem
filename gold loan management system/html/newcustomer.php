<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: Login.php');
}

$server="localhost";
$dbname="gold_loan";


$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
         $sql = "SHOW TABLE STATUS LIKE 'borrower'";
    $showId = mysqli_query($con, $sql);
            $rowId = mysqli_fetch_array($showId);
            $nextId = $rowId['Auto_increment'];
            //echo $nextId;

   
   
}
else
{
echo "Error in connection";
}
mysqli_close($con);
?>



<html lang="en">
   <head>
               <title>GOLD LOAN</title>
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="../bootsstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!-- <script src="/"jquery-ui-1.11.4/jquery-ui.min.js"  ></script> -->
      <script src="../bootsstrap/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/Loginpage.css" type="text/css"/>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       <script src="../bootsstrap/bootstrap-3.3.5/js/dropdown.js"></script>
       <scrip src="../bootsstrap/bootstrap-3.3.5/js/collapse.js"></scrip>
     <link rel="stylesheet" href="css/home.css">
        
       
       
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
       
       
       
       
       
       
       
       
       </script>
       
       
       
       
       
       
       <style type="text/css">
            
            
            
            
        </style>


    </head>
    

<div class="container">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">New Customer</button>
                        
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
                                        
                                        
                                        
                                        <script>
                                           $(document).ready(function(){
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
                                                
                                         });
                                    </script>
                                        
                                        
                                        
                                        
                                        <div id="display" style="padding-top:10px;">
                                       
                                              <!--personalinfo-->
                                             <div id="ptab" class="panel panel-default" >
        
            <div class="panel-heading"> 
                Personal Information
            </div>
            
            <div class="panel-body">
               
                 <form id="mca">
                
                      
                         <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="custid" class="control-label">&nbsp;&nbsp; Id: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input required type="text" class="form-control" id="custid" value="<?php echo $nextId; ?>" placeholder="CustomerID" readonly/>
                            </div>
                          </div>
                          
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="name" class="control-label">&nbsp;&nbsp;Name: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="name" placeholder="CustomerName" >
                           </div>
                       </div>
                     
                     
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="age" class="control-label">&nbsp;&nbsp; Age: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="number" max="100" min="18" class="form-control" id="age" placeholder="AGE"/>
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
                                 <input type="date" class="form-control" id="dob" placeholder="Date OF Birth"/>
                            </div>
                          </div>
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="phone" class="control-label">&nbsp;&nbsp;Phone: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="number"  class="form-control" id="phone" placeholder="Phone Number" title="enter number only"/>
                           </div>
                       </div>
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="email" class="control-label">&nbsp;&nbsp; Email: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="email" class="form-control" id="email" placeholder="EMail" data-error="paka matt" required/>
                            </div>
                          </div>
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="occupation" class="control-label">&nbsp;&nbsp; Occupation: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="occupation" placeholder="Occupation"/>
                           </div>
                       </div>
                                             
                     
                </form>
            
            </div>
            
        </div>
                                            
                                            
                                            
                                          
                                                 
                                                 
                                                 
                                                 
                                                 
                                                   <!--Financial-->
                                                 
                                                  <div id="ftab" class="panel panel-default" >
        
            <div class="panel-heading">
                Address Information 
            </div>
            
            <div class="panel-body">
               
                 <form role="form" data-toggle="validator">
                 
                 
                
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="address" class="control-label">&nbsp;&nbsp; Address: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="address" placeholder="Address"/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="pincode" class="control-label">&nbsp;&nbsp; Pincode: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="pincode" placeholder="PinCode"/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="city" class="control-label">&nbsp;&nbsp; City: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="city" placeholder="City"/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="state" class="control-label">&nbsp;&nbsp; State: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="state" placeholder="State"/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="country" class="control-label">&nbsp;&nbsp; Country: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="country" placeholder="Country"/>
                           </div>
                       </div>
                                        
                     
                     
                </form>
            
            </div>
            
        </div>
                                            
                                            <!--attachment-->
                                            <div id="atab"class="panel panel-default" >
        
                                                <div class="panel-heading">
                                                        Attachment
                                                </div>
            
                                                    <div class="panel-body">
               
                                            <form>
                
                                            <div class="row">
                                               <div class="col-md-3" style="padding-top:15px;">
                                                <label for="files" class="control-label">&nbsp;&nbsp; Select Documents: </label> 
                                                </div>
                                                        <div class="col-md-8" style="padding-top:10px;">
                                                <input type="file"  id="files" name="datafile" size="40"/>
                                                        </div>
                                                </div>
                                
                     
                                                </form>
            
                                                </div>
            
                                            </div>
        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                        <button type="submit"  form="mca" class="btn btn-primary">Submit</button>
                                    </div>
                                    
                                </div>
                            
                            
                            </div>
                        
                        
                        </div>
    
    </div>
    
</html>