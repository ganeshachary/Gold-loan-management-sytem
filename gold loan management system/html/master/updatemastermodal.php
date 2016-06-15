
<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
}

$server="localhost";
$dbname="gold_loan";

$interest_id=$name=$amount=$percentage=$description=$fine=$schedule="";

           
if(isset($_POST['id']))
{
    $id2=$_POST['id'];
    $con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM master where interest_id=".$id2;  
     $results=mysqli_query($con,$sql);
    
    
    
   // $sql2= "SELECT percentage FROM master";  
  //  $interest_option=mysqli_query($con,$sql2);
    
    
     
    while($emp=mysqli_fetch_array($results))
    {
                
            $interest_id=$emp['interest_id'];   
            $name=$emp['name'];
            $amount=$emp['amount'];
            $percentage=$emp['percentage'];
            $description=$emp['description'];
            $fine=$emp['fine'];
            $schedule=$emp['schedule'];
     

        
        
        
        
        
        
             
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
                                        <h3 class="modal-title">Master Information</h3>
                                    </div>
                                
                                    <div class="modal-body">
                                        
                                        <ul class="nav nav-tabs">
                                              <li id="tab1" role="presentation"><a id="personal"><h4>Master information</h4></a></li>
                                             <!--<li id="tab2" role="presentation"><a id="financial"><h4>Address information</h4></a></li>--> 
                                              <!-- <li id="tab3" role="presentation"><a id="attach"><h4>Attachment</h4></a></li>--> 
                                        </ul>

                                        
                                        
                                        <div id="display" style="padding-top:10px;">
                                         <form id="mca2" method="POST" action="updatemaster.php">
                                              <!--personalinfo-->
                                             <div id="ptab" class="panel panel-default" >
        
            <div class="panel-heading"> 
                Master Information
            </div>
            
           
               
               
                 <div class="panel-body">
                      
                         <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="interest_id1" class="control-label">&nbsp;&nbsp; ID: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="interest_id" name="interest_id1" placeholder="Username" value = '<?php echo  $interest_id; ?>'/>
                            </div>
                          </div>
                          
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="name" class="control-label">&nbsp;&nbsp;Name: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="name"  name="name1" placeholder="Name"  value = '<?php echo  $name; ?>'>
                           </div>
                       </div>
                     
                    
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="amount" class="control-label">&nbsp;&nbsp; Amount: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="amount"  name="amount1" placeholder="Amount"  value = '<?php echo  $amount; ?>'/>
                            </div>
                          </div>
                          
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="percentage" class="control-label">&nbsp;&nbsp; Percentage: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="password2" class="form-control" id="percentage"  name="percentage1" placeholder="Percentage"  value = '<?php echo  $percentage; ?>'/>
                            </div>
                          </div>
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="description" class="control-label">&nbsp;&nbsp;Description: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text"  class="form-control" id="description" placeholder="Description"  name="description1" title="enter number only"  value = '<?php echo  $description; ?>'/>
                           </div>
                       </div>
                     
                      <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="fine" class="control-label">&nbsp;&nbsp;Fine: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="number"  class="form-control" id="fine" placeholder="schedule"  name="fine1" title="enter number only"  value = '<?php echo  $fine; ?>'/>
                           </div>
                       </div>
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="schedule" class="control-label">&nbsp;&nbsp; schedule: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                <select class="form-control" id="schedule"  name="schedule1">
                                    <?php
                                                    if($schedule=="12")
                                                        {
                                                            echo "<option value='12' selected>12 months</option>
                                                                  <option value='6'>6 months</option>
                                                                 <option value='3'>3 months</option>";
                                                          }     
                                                 elseif($schedule=="6")
                                                        {
                                                            echo "<option value='12'>12 months</option>
                                                            <option value='6' selected>6 months</option>
                                                            <option value='3' >3 months</option>";
                                                    }         
                                                elseif($schedule=="3")
                                                        {
                                                            echo "<option value='12' >12 months</option>
                                                                  <option value='6'>6 months</option>
                                                                  <option value='3' selected>3 months</option>";
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
                                        <button type="submit" id="savedata" form="mca2" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                    
                                </div>
                            
                            
                            </div>