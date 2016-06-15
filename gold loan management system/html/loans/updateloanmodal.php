
<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
}

$server="localhost";
$dbname="gold_loan";


$date=$loan_id=$cust_id=$amount_lend=$interest=$amt_pergram=$auction_period=$settlement=$balance=$paid=$item_description=$item_quantity=$gross_wt=$net_wt=$quality="";


           
if(isset($_POST['id']))
{
    $id2=$_POST['id'];
    $con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM loan_details where loan_id=".$id2;  
     $results=mysqli_query($con,$sql);
    
    
    
     $sql2= "SELECT percentage FROM master";  
     $interest_option=mysqli_query($con,$sql2);
    
    
     
    while($emp=mysqli_fetch_array($results))
    {
                
            
        $date=$emp['date'];
        $loan_id=$emp['loan_id'];
            $cust_id=$emp['cust_id'];
            $amount_lend=$emp['amount_lend'];
            $interest=$emp['interest'];
            $amt_pergram=$emp['emidate'];
            $auction_period=$emp['auction_period'];
            $settlement=$emp['settlement'];
            $balance=$emp['balance'];
            $paid=$emp['paid'];
            $item_description=$emp['item_description'];
            $item_quantity=$emp['item_quantity'];
            $gross_wt=$emp['gross_wt'];
            $net_wt=$emp['net_wt'];
            $quality=$emp['emi'];

        
        
        
        
        
        
             
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
                          
                           
                              $("#amount_lend").keyup(function(){
                                  
                                   var value=$("#amount_lend").val();
                                            $("#balance").val(value);
                               
                               });
                    
    
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
                                        <h3 class="modal-title">Loan Information</h3>
                                    </div>
                                
                                    <div class="modal-body">
                                        
                                        <ul class="nav nav-tabs">
                                              <li id="tab12" role="presentation"><a id="personal"><h4>Loan information</h4></a></li>
                                              <li id="tab22" role="presentation"><a id="financial"><h4>Items information</h4></a></li>
                                              <li id="tab32" role="presentation"><a id="attach"><h4>Attachment</h4></a></li>
                                        </ul>

                                        
                                        
                                        <div id="display" style="padding-top:10px;">
                                         <form id="mca2" method="POST" action="updateloanvalue.php">
                                              <!--personalinfo-->
                                             <div id="ptab2" class="panel panel-default" >
        
            <div class="panel-heading"> 
                Loan Information
            </div>
            
           
               
               
                 <div class="panel-body">
                      
                     
                     
                       <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="loan_id" class="control-label">&nbsp;&nbsp; Loan Id: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="loan_id" name="loan_id1" placeholder="Loan ID" value = '<?php echo $loan_id; ?>' readonly/>
                            </div>
                          </div>
                     

                     <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="cust_id" class="control-label">&nbsp;&nbsp; Cust ID: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="cust_id" name="cust_id1" placeholder="Customer ID" value = '<?php echo $cust_id; ?>' readonly/>
                            </div>
                          </div>
                          
                     
                   <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="date" class="control-label">&nbsp;&nbsp; Date: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="date" class="form-control" id="date"  name="date1" placeholder="Date" value = '<?php echo $date; ?>' />
                            </div>
                          </div>
                     

                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="amount_lend" class="control-label">&nbsp;&nbsp; Amount Lend: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <div class="input-group">
                               <span class="input-group-addon" id="basic-addon1">Rs.</span>
                               <input type="number" class="form-control"  id="amount_lend" name="amount_lend1" placeholder="Amount Lend" value = '<?php echo $amount_lend; ?>' >
                               </div>       
                           </div>
                       </div>
                     
                     
                     
                     
                      <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="balance" class="control-label">&nbsp;&nbsp; Balance: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                                <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rs.</span>
                               <input type="number" class="form-control" id="balance" name="balance1" placeholder="Balance" value = '<?php echo $balance; ?>' >
                               </div>
                           </div>
                       </div>
                     
                     
                   
                     
                     
                     
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="interest" class="control-label">&nbsp;&nbsp;Interest: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                <div class="input-group">
                                
                                 <select  class="form-control" id="interest"  name="interest1" >
                                        
                                     <?php
                                     
                                                  while($interest_option2=mysqli_fetch_array($interest_option))
                                                    {
                                                      if($interest==$interest_option2['percentage'])
                                                      {
                                                    echo "<option value=".$interest_option2['percentage']." selected>".$interest_option2['percentage']."</option>";
                                                    }
                                                      else{
                            echo "<option value=".$interest_option2['percentage']." >".$interest_option2['percentage']."</option>";
                                                      }
                                                  }
                                            
                                     ?>
                                    </select><span class="input-group-addon" id="basic-addon1">%</span>
                                </div>
                                    
                            </div>
                          </div>
                     
                      <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="amt_pergram" class="control-label">&nbsp;&nbsp;EMI: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                <div class="input-group">
                                 <span class="input-group-addon" id="basic-addon1">Rs.</span>
                                    <input type="date"  class="form-control" id="amt_pergram"  name="amt_pergram1" placeholder="Amount pergram" value = '<?php echo $amt_pergram; ?>'/></div>
                            </div>
                          </div>
                     
                  
                            <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="paid" class="control-label">&nbsp;&nbsp; Months paid: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rs.</span>
                               <input type="number" class="form-control" id="paid" name="paid1" placeholder="Paid" value = '<?php echo $paid; ?>' >
                               </div>
                           </div>
                       </div> 
                      <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="auction_period" class="control-label">&nbsp;&nbsp; Months pending : </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="number" class="form-control" id="auction_period"  name="auction_period1" placeholder="Auction period" value = '<?php echo $auction_period; ?>'/>
                            </div>
                          </div>
                            
                      <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="settlement" class="control-label">&nbsp;&nbsp;Settlement: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                              
                                 <select  class="form-control" id="settlement"  name="settlement1" placeholder="Settlement" required>
                                      <?php if($settlement==yes)
                                     {
                                      echo "<option value='no' >No</option>
                                    <option value='yes' selected>Yes</option>";
                                     }
                                    else
                                    {
                                      echo "<option value='no' selected>No</option>
                                    <option value='yes' >Yes</option>";
                                    }
                                     
                                     ?>
                                   
                                </select>
                            </div>
                          </div>
                     
                     
                       
                       
                       
                       
                        
                          
                 
                                             
                     
          
            
            </div>
            
        </div>
                                            
                                            
                                            
                                          
                                                 
                                                 
                                                 
                                                 
                                                 
                                                   <!--Financial-->
                                                 
                                                  <div id="ftab2" class="panel panel-default" >
        
            <div class="panel-heading">
                Item Information 
            </div>
            
            <div class="panel-body">
               
        
                 
                 
                
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="item_description" class="control-label">&nbsp;&nbsp; Item Description: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="textarea" class="form-control" id="item_description"  name="item_description1" placeholder="Item Description" value = '<?php echo $item_description; ?>'/>
                           </div>
                       </div>
                
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="item_quantity" class="control-label">&nbsp;&nbsp; Item Quantity: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="number" class="form-control" id="item_quantity"  name="item_quantity1" placeholder="Item Quantity" value = '<?php echo $item_quantity; ?>'/>
                           </div>
                       </div>
                   
                       
                
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="gross_weight" class="control-label">&nbsp;&nbsp; Gross Weight: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <div class="input-group">
                               <input type="number" class="form-control" id="gross_weight"  name="gross_weight1" placeholder="Gross Weight" value = '<?php echo $gross_wt; ?>'/>
                                <span class="input-group-addon" id="basic-addon1">gms</span>
                               </div>
                           </div>
                       </div>
                   
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="net_weight" class="control-label">&nbsp;&nbsp; Net Weight: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <div class="input-group">
                               <input type="number" class="form-control" id="net_weight"  name="net_weight1" placeholder="Net Weight" value = '<?php echo $net_wt; ?>'/>
                                <span class="input-group-addon" id="basic-addon1">gms</span>
                               </div>           
                           </div>
                       </div>
                
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="quality" class="control-label">&nbsp;&nbsp; EMI: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <div class="input-group">
                               <input type="number" class="form-control" id="quality"  name="quality1" placeholder="Quality" value = '<?php echo $quality; ?>'/>
                                <span class="input-group-addon" id="basic-addon1">%</span>  
                               </div>       
                           </div>
                       </div>
                       
                                        
                     
                     
                           
            </div>
            
        </div>
                                            
                                            <!--attachment-->
                                            <div id="atab2" class="panel panel-default" >
        
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
                                        <button type="submit" id="savedata" form="mca2" class="btn btn-primary" name="submit">Update</button>
                                    </div>
                                    
                                </div>
                                
                                
</div>
