
<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: Login.php');
}

$server="localhost";
$dbname="gold_loan";

            $id=$name=$age=$gender=$dob=$phone=$email=$occupation=$address=$pin=$city=$state=$country=$checked1=$checked2="";
if(isset($_POST['id']))
{
    $id2=$_POST['id'];
    $con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM borrower where id=".$id2;  
     $results=mysqli_query($con,$sql);
     
    while($emp=mysqli_fetch_array($results))
    {
                
            $id=$emp['id'];
            $name=$emp['name'];
            $age=$emp['age'];
            $gender=$emp['gender'];
            $dob=$emp['dob'];
            $phone=$emp['phone'];
            $email=$emp['email'];
            $occupation=$emp['occupation'];
            $address=$emp['address'];
            $pin=$emp['pincode'];
            $city=$emp['city'];
            $state=$emp['state'];
            $country=$emp['country'];
        
             
    }
    
    
    
    $checked1=$checked2="";
    
        if($gender=='male')
    { 
           $checked1="checked";
    } 
    else if($gender=='female')
    {
    $checked2="checked";
    }

    
    
    
    
  
    // $sql1 = "SHOW TABLE STATUS LIKE 'borrower'";
    //$showId = mysqli_query($con, $sql1);
            //$rowId = mysqli_fetch_array($showId);
           // $nextId = $rowId['Auto_increment'];
   
   
}

mysqli_close($con);
}

  ?>    
        
<script>
                                        $("#tab22").click(function(){
                                                    $("#ftab2").show();
                                                   $("#ptab2").hide();  
                                                    
                                                     $("#atab2").hide();  
                                               }); 
                                                
                                                
                                                $("#tab32").click(function(){
                                                    $("#atab2").show();            
                                                $("#ptab2").hide();  
                                                  $("#ftab2").hide();
                                                         
                                               
                                               }); 
                                                
                                                
                                                 $("#tab12").click(function(){
                                                         $("#ptab2").show();  
                                                        $("#ftab2").hide();
                                                     $("#atab2").hide();        
                                                  
                                               }); 
                                                    
                                               
                                                $("#tab12").click(function()
                                                                 {
                                                    $("#tab12").attr("class","active");
                                                    $("#tab22").attr("class","inactive");
                                                    $("#tab32").attr("class","inactive");
                                                });
                                                
                                                 $("#tab22").click(function()
                                                                 {
                                                  $("#tab12").attr("class","inactive");
                                                    $("#tab22").attr("class","active");
                                                    $("#tab32").attr("class","inactive");
                                                });
                                                
                                                 $("#tab32").click(function()
                                                                 {
                                                    $("#tab12").attr("class","inactive");
                                                    $("#tab22").attr("class","inactive");
                                                    $("#tab32").attr("class","active");
                                                });
                                
</script>             

                            
                            <div class="modal-dialog modal-lg">
                            
                                <div class="modal-content">
                                
                                    <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">Borrower Information</h3>
                                    </div>
                                
                                    <div class="modal-body">
                                        
                                        <ul class="nav nav-tabs">
                                              <li id="tab12" role="presentation"><a id="personal"><h4>Personal information</h4></a></li>
                                              <li id="tab22" role="presentation"><a id="financial"><h4>Address information</h4></a></li>
                                              <li id="tab32" role="presentation"><a id="attach"><h4>Attachment</h4></a></li>
                                        </ul>

                                        
                                        
                                        <div id="display" style="padding-top:10px;">
                                         <form id="mca2" method="POST" action="Updated.php">
                                              <!--personalinfo-->
                                             <div id="ptab2" class="panel panel-default" >
        
            <div class="panel-heading"> 
                Personal Information
            </div>
            
           
               
               
                 <div class="panel-body">
                      
                         <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="custid" class="control-label">&nbsp;&nbsp; Id: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="custid" name="custid" placeholder="CustomerID" value ='<?php echo $id;?>'  readonly/>
                            </div>
                          </div>
                          
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="name" class="control-label">&nbsp;&nbsp;Name: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="name"  name="custname" placeholder="CustomerName" value ='<?php echo $name;?>' >
                           </div>
                       </div>
                     
                     
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="age" class="control-label">&nbsp;&nbsp; Age: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="number" max="100" min="18" class="form-control" id="age"  name="custage" placeholder="AGE" value ='<?php echo $age;?>'/>
                            </div>
                          </div>
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="gender" class="control-label">&nbsp;&nbsp;Gender: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="radio"  id="male" required value="male" name="gender" <?php echo $checked1; ?>     />&nbsp;Male &nbsp;&nbsp;
                               
                                <input type="radio"  id="female" required value="female" name="gender" <?php echo $checked2; ?> />&nbsp;Female
                               
                           </div>
                       </div>
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="dob" class="control-label">&nbsp;&nbsp; DOB: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="date" class="form-control" id="dob"  name="dob" placeholder="Date OF Birth" value ='<?php echo $dob;?>'/>
                            </div>
                          </div>
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="phone" class="control-label">&nbsp;&nbsp;Phone: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="number"  class="form-control" id="phone" placeholder="Phone Number"  name="phone" title="enter number only" value ="<?php echo $phone;?>"/>
                           </div>
                       </div>
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="email" class="control-label">&nbsp;&nbsp; Email: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="email" class="form-control" id="email"  name="email" placeholder="EMail" data-error="paka matt" required value ='<?php echo $email;?>'/>
                            </div>
                          </div>
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="occupation" class="control-label">&nbsp;&nbsp; Occupation: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="occupation"  name="occupation" placeholder="Occupation" value ='<?php echo $occupation;?>'/>
                           </div>
                       </div>
                                             
                     
          
            
            </div>
            
        </div>
                                            
                                            
                                            
                                          
                                                 
                                                 
                                                 
                                                 
                                                 
                                                   <!--Financial-->
                                                 
                                                  <div id="ftab2" class="panel panel-default" >
        
            <div class="panel-heading">
                Address Information 
            </div>
            
            <div class="panel-body">
               
        
                 
                 
                
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="address" class="control-label">&nbsp;&nbsp; Address: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="address"  name="address" placeholder="Address" value ='<?php echo $address;?>'/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="pincode" class="control-label">&nbsp;&nbsp; Pincode: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="pincode"  name="pin" placeholder="PinCode" value ='<?php echo $pin;?>'/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="city" class="control-label">&nbsp;&nbsp; City: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="city" name="city" placeholder="City" value ='<?php echo $city;?>'/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="state" class="control-label">&nbsp;&nbsp; State: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="state"  name="state" placeholder="State" value ='<?php echo $state;?>'/>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="country" class="control-label">&nbsp;&nbsp; Country: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="country"  name="country" placeholder="Country" value ='<?php echo $country;?>'/>
                           </div>
                       </div>
                                        
                     
                     
                           
            </div>
            
        </div>
                                            
                                            <!--attachment-->
                                            <div id="atab2"class="panel panel-default" >
        
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
                                        <button type="submit" id="updatedata" form="mca2" class="btn btn-primary" name="submit">Update</button>
                                    </div>
                                    
                                </div>
                            
                            
                            </div>
                        
                        
                        
                                                    
                                                  
    