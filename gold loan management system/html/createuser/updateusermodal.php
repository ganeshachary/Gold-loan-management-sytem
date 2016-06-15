
<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
}

$server="localhost";
$dbname="gold_loan";


$username=$password=$email=$phone=$role="";
$admin=$manager=$restricted="";
           
if(isset($_POST['id']))
{
    $id2=$_POST['id'];
    $con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM user where username='".$id2."'";  
     $results=mysqli_query($con,$sql);
    
    
    
    // $sql2= "SELECT percentage FROM master";  
     //$interest_option=mysqli_query($con,$sql2);
    
    
     
    while($emp=mysqli_fetch_array($results))
    {
                
            
            $username=$emp['username'];
            $password=$emp['password'];
            $email=$emp['email'];
            $phone=$emp['phone'];
            $role=$emp['role'];

       
        
        
        
        
        
             
    }
      if($role=="admin")
         {
         $admin="selected";
         }
           if($role=="manager")
         {
         $manager="selected";
         }
           if($role=="restricted")
         {
         $restricted="selected";
         }
    
    
  /*  $checked1=$checked2="";
    
        if($gender=='male')
    { 
           $checked1="checked";
    } 
    else if($gender=='female')
    {
    $checked2="checked";
    }
*/
    
    
    
    
  
    // $sql1 = "SHOW TABLE STATUS LIKE 'borrower'";
    //$showId = mysqli_query($con, $sql1);
            //$rowId = mysqli_fetch_array($showId);
           // $nextId = $rowId['Auto_increment'];
   
   
}

mysqli_close($con);
}

  ?>    
        
<script>
                                        //$("#tab22").click(function(){
                                              //      $("#ftab2").show();
                                              //     $("#ptab2").hide();  
                                                    
                                                  //   $("#atab2").hide();  
                                             //  }); 
                                                
                                                
                                              //  $("#tab32").click(function(){
                                                 //   $("#atab2").show();            
                                               ///// $("#ptab2").hide();  
                                                 // $("#ftab2").hide();
                                                         
                                               
                                              // }); 
                                                
                                                
                                                 $("#tab12").click(function(){
                                                         $("#ptab2").show();  
                                                      //  $("#ftab2").hide();
                                                   //  $("#atab2").hide();        
                                                  
                                               }); 
                                                    
                                               
                                                $("#tab12").click(function()
                                                                 {
                                                    $("#tab12").attr("class","active");
                                                   // $("#tab22").attr("class","inactive");
                                                    //$("#tab32").attr("class","inactive");
                                                });
                                              //  
                                                // $("#tab22").click(function()
                                                //                {
                                                  //$("#tab12").attr("class","inactive");
                                                   // $("#tab22").attr("class","active");
                                                   // $("#tab32").attr("class","inactive");
                                               // });
                                                
                                                // $("#tab32").click(function()
                                                     //            {
                                                   // $("#tab12").attr("class","inactive");
                                                 // //  $("#tab22").attr("class","inactive");
                                                   // $("#tab32").attr("class","active");
                                               // });
                                
</script>             

                             <div class="modal-dialog modal-lg">
                            
                                <div class="modal-content">
                                
                                    <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">User Information</h3>
                                    </div>
                                
                                    <div class="modal-body">
                                        
                                        <ul class="nav nav-tabs">
                                              <li id="tab12" role="presentation"><a id="personal"><h4>User information</h4></a></li>
                                             <!--<li id="tab2" role="presentation"><a id="financial"><h4>Address information</h4></a></li>--> 
                                              <!-- <li id="tab3" role="presentation"><a id="attach"><h4>Attachment</h4></a></li>--> 
                                        </ul>

                                        
                                        
                                        <div id="display" style="padding-top:10px;">
                                         <form id="mca2" method="POST" action="updateuser.php">
                                              <!--personalinfo-->
                                             <div id="ptab" class="panel panel-default" >
        
            <div class="panel-heading"> 
                User Information
            </div>
            
           
               
               
                 <div class="panel-body">
                      
                         <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="username" class="control-label">&nbsp;&nbsp; Username: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="username" name="username1" placeholder="Username" value ='<?php echo $username; ?>' readonly/>
                            </div>
                          </div>
                          
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="email" class="control-label">&nbsp;&nbsp;Email: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="email"  name="email1" placeholder="Email"  value='<?php echo $email; ?>'>
                           </div>
                       </div>
                     
                    
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="password" class="control-label">&nbsp;&nbsp; Password: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="password" class="form-control" id="password"  name="password1" placeholder="Password" value='<?php echo $password; ?>'/>
                            </div>
                          </div>
                          
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="password2" class="control-label">&nbsp;&nbsp; Password: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="password2" class="form-control" id="password2"  name="password12" placeholder="Password" value='<?php echo $password; ?>'/>
                            </div>
                          </div>
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="phone" class="control-label">&nbsp;&nbsp;Phone: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="number"  class="form-control" id="phone" placeholder="Phone"  name="phone1" title="enter number only" value='<?php echo $phone; ?>'/>
                           </div>
                       </div>
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="role" class="control-label">&nbsp;&nbsp; Role: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                <select class="form-control" id="role"  name="role1">
                                    <?php
                                            if($role=="admin")
                                                {
                                                    echo "<option value='admin' selected>Admin</option>
                                                            <option value='manager'>Manager</option>
                                                            <option value='restricted'>Restricted</option>";
                                                }
                                            if($role=="manager")
                                                    {
                                                    echo "<option value='admin'>Admin</option>
                                                            <option value='manager'  selected>Manager</option>
                                                            <option value='restricted'>Restricted</option>";
                                                    }
                                            if($role=="restricted")
                                                {
                                                      echo "<option value='admin'>Admin</option>
                                                            <option value='manager'  >Manager</option>
                                                            <option value='restricted' selected>Restricted</option>";
                                                }
                                   
                                        
                                    ?>
                                </select>
                                
                            </div>
                          </div>
                          
                       
                        
                                             
                     
          
            
            </div>
            
        </div>
                                            
                                            
                                            
                                          
                                                 
                                                 
                                                 
                                                 
                                                 
                                                   <!--Financial-->
                                                 
                                                 <!-- <div id="ftab" class="panel panel-default" >
        
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
            
        </div>  --!>
                                            
                                            <!--attachment-->
                                    <!--       <div id="atab"class="panel panel-default" >
        
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
            
                                            </div> -->
                                                       </form>
        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                        <button type="submit" id="savedata" form="mca2" class="btn btn-primary" name="submit">Update</button>
                                    </div>
                                    
                                </div>
                            
                            
                            </div>
                        