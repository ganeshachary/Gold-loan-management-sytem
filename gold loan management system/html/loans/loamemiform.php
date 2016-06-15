
<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../../Login.php');
}

$server="localhost";
$dbname="gold_loan";

          
if(isset($_POST['id']))
{
    $id2=$_POST['id'];
    $con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM loan_emi where transaction_id=".$id2;  
     $results=mysqli_query($con,$sql);
     
    while($emp=mysqli_fetch_array($results))
    {
                
           
            $loan_id=$emp['loan_id'];
         //   $cust_id=$emp['cust_id'];
            $transaction_date=$emp['transaction_date'];
            $transaction_id=$emp['transaction_id'];
         //   $emi_amount=$emp['emi_amount'];
           // $balance=$emp['balance'];
            $remarks=$emp['remarks'];
            $cash_paid=$emp['cash_paid'];
           // $late_fine=$emp['late_fine'];
            //$discount=$emp['discount'];
           // $total_payment=$emp['total_payment'];
                    
        
             
    }
    
    
    
 /*   $checked1=$checked2="";
    
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
                                        $("#tab22").click(function(){
                                                    $("#ftab2").show();
                                                   $("#ptab2").hide();  
                                                    
                                                     $("#atab2").hide();  
                                               }); 
                                                
                                                
                                               // $("#tab32").click(function(){
                                                 //   $("#atab2").show();            
                                               // $("#ptab2").hide();  
                                               //   $("#ftab2").hide();
                                                         
                                               
                                            //   }); 
                                                
                                                
                                                 $("#tab12").click(function(){
                                                         $("#ptab2").show();  
                                                        $("#ftab2").hide();
                                                     $("#atab2").hide();        
                                                  
                                               }); 
                                                    
                                               
                                                $("#tab12").click(function()
                                                                 {
                                                    $("#tab12").attr("class","active");
                                                    $("#tab22").attr("class","inactive");
                                                   // $("#tab32").attr("class","inactive");
                                                });
                                                
                                                 $("#tab22").click(function()
                                                                 {
                                                  $("#tab12").attr("class","inactive");
                                                    $("#tab22").attr("class","active");
                                                   // $("#tab32").attr("class","inactive");
                                                });
                                                
                                                 $("#tab32").click(function()
                                                                 {
                                                    $("#tab12").attr("class","inactive");
                                                    $("#tab22").attr("class","inactive");
                                                   // $("#tab32").attr("class","active");
                                                });
                                
</script>             

                            <div class="modal-dialog modal-lg">
                            
                                <div class="modal-content">
                                
                                    <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">EMI Information</h3>
                                    </div>
                                
                                    <div class="modal-body">
                                        
                                        <ul class="nav nav-tabs">
                                              <li id="tab12" role="presentation"><a id="personal"><h4>EMI details</h4></a></li>
                                              <li id="tab22" role="presentation"><a id="financial"><h4>Balance</h4></a></li>                                             
                                        </ul>

                                        
                                        
                                        <div id="display" style="padding-top:10px;">
                                         <form id="mca2" method="POST" action="updateemi.php">
                                              <!--personalinfo-->
                                             <div id="ptab2" class="panel panel-default" >
        
            <div class="panel-heading"> 
                EMI Details
            </div>
            
           
               
               
                 <div class="panel-body">
                      
                     <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="transaction_id" class="control-label">&nbsp;&nbsp; Transaction ID: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="transaction_id"  name="transaction_id1" placeholder="Transaction ID" readonly  value="<?php  echo $transaction_id;?>"/>
                           </div>
                       </div>
                     
                     
                     
                         <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="loan_id" class="control-label">&nbsp;&nbsp; Loan Id: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="loan_id" name="loan_id1" placeholder="Loan ID" value="<?php  echo $loan_id;?>" />
                            </div>
                          </div>
                          
                          
                       
                     
                                         
                       
                                       
                       
                       
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="transaction_date" class="control-label">&nbsp;&nbsp;Transaction Date: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="date"  class="form-control" id="transaction_date" placeholder="Transaction Date"  name="transaction_date1" title="enter number only" value="<?php  echo $transaction_date;?>"/>
                           </div>
                       </div>
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="remarks" class="control-label">&nbsp;&nbsp; Remarks: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="remarks"  name="remarks1" placeholder="Remarks" data-error="Enter Remarks " required value="<?php  echo $remarks;?>"/>
                            </div>
                          </div>
                          
                        <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="cash_paid" class="control-label">&nbsp;&nbsp; Amount Paid: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="cash_paid"  name="cash_paid1" placeholder="Cash Paid" value="<?php  echo $cash_paid;?>"/>
                           </div>
                       </div>
                         
                                             
                     
          
            
            </div>
            
        </div>
                                            
                                            
                                            
                                          
                                                 
                                                 
                                                 
                                                 
                                                 
                                                   <!--Financial-->
                                                 
                                                  
                                            
                                    
                                                       </form>
        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                        <button type="submit" id="savedata" form="mca2" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                    
                                </div>
                            
                            
</div>

                        