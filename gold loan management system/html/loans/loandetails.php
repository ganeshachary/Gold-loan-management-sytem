<?php
session_start();

if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
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
$server="localhost";
$dbname="gold_loan";


$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");

if($con)
{
   
      $sql= "SELECT * FROM loan_details";  
     $results=mysqli_query($con,$sql);
    
    
   
     $sql1 = "SHOW TABLE STATUS LIKE 'loan_details'";
    $showId = mysqli_query($con, $sql1);
            $rowId = mysqli_fetch_array($showId);
            $nextId = $rowId['Auto_increment'];

    
    
    
      $sql123= "SELECT * FROM loan_emi";  
     $results123=mysqli_query($con,$sql123);
   
     $sql123 = "SHOW TABLE STATUS LIKE 'loan_emi'";
    $showId123 = mysqli_query($con, $sql123);
            $rowId123 = mysqli_fetch_array($showId123);
            $nextId123= $rowId123['Auto_increment'];
    
    
    
     $sql2= "SELECT percentage FROM master";  
     $interest_option=mysqli_query($con,$sql2);
    //$interest_option2=mysqli_fetch_array($interest_option);
   
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
  <script src="../excel/save.js"></script>
       
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
              <li><a href="../home.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
              
              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-th-list"></span>&nbsp;Options<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../Customers.php"><img src="../../images/customer1.jpg" height="20px" width="20px"/>&nbsp;<b>Customer</b></a></li>
                        <li><a href="../loans/loanemi/loandetails.php"><img src="../../images/borrower2.jpg" height="20px" width="20px"/>&nbsp;<b>EMI</b></a></li>
                        <li><a href="../loans/loandetails.php"><img src="../../images/laons.jpg" height="20px" width="20px"/>&nbsp;<b>Loans</b></a></li>
                       
                        <li><a  href="../../html/createuser/createuser.php"><img src="../../images/emloyee.png" height="20px" width="20px"/>&nbsp;<b>Users</b></a></li>
                        <li><a href="../master/master.php"><img src="../../images/master.jpg" height="20px" width="20px"/>&nbsp;<b>Master</b></a></li>
              </ul>
            </li>
              
          </ul>
               <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span>&nbsp;<?php echo "".ucfirst($_SESSION['login_user']); ?>  <span class="caret"></span></a>
              <ul class="dropdown-menu">
               
            
                <li role="separator" class="divider"></li>
                <li><a href="../Logout.php"><span class="glyphicon glyphicon-off"></span> &nbsp; Log Out</a></li>
               
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
                        <img src="../../images/laons.jpg" height="90px" width="100px"/>
                           <i style="font: 25px arial;">Loans</i>
                       </div>
                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-top:15px;">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">New Loan</button>
                       &nbsp;  <button id="saveMe" type="button" class="btn btn-success">Export Excel</button>
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
                                
                                   $.ajax({
                                         
                                          url: 'calculateloan.php',
                                           type: 'POST',
                                          //data: {checkedarray2:checked2},
                                          success: function(result){
                                        // location.reload(); 
                                            
                                          
                                          }
                                        });   
                                           
                                $('.payemi').click(function(){
                                
                                         var value=this.value;
                                    $("#loanemiid").val(value);
                                });
                               
                               $("#amount_lend").keyup(function(){
                                  
                                     var value=$("#amount_lend").val();
                                            $("#balance").val(value);
                               
                               });
                               
                               
                                
                                /*$("#ok").hide();
                                               $("#notok").hide();
                                   $("#cust_id").keyup(function(){
                                   
                                 
                                            if($("#cust_id").val()!="")
                                            {
                                                var custvalue=$("#cust_id").val();
                                             
                                                $.ajax({
                                         
                                          url: 'custsearch.php',
                                           type: 'POST',
                                          data: {
                                               custvalue1:custvalue
                                          },
                                          success: function(result){
                                              
                                                 
                                              
                                              
                                                // $("#ok").show();
                                              // $("#notok").hide();
                                              
                                              if(result)
                                              {
                                                 $("#ok").show();
                                               $("#notok").hide();
                                              }
                                              if(!result)
                                              {
                                                 $("#ok").hide();
                                               $("#notok").show();
                                              }
                                             
                                              
                                          
                                          },
                                        
                                      
                                        });    
                                            }
                                       else
                                       {
                                             //   $("#notok").show();
                                             //  $("#ok").hide();
                                       }
                                   
                                   });*/
                                             
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
                                         
                                          url: 'deleteloans.php',
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
                                                        url:'updateloanmodal.php',
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
                                    <th>Loan ID</th>
                                    <th>Customer ID</th>
                                   
                                    <th>Amount Lend</th>
                                     <th>Balance</th>
                                   <th>EMI Paid</th>
                                       <th>EMI pending</th>
                                    <th>Settlement</th>    
                                
                                  <th>option</th>
                         
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                                 <th>Select</th>
                                    <th>Loan ID</th>
                                    <th>Customer ID</th>
                                   
                                    <th>Amount Lend</th>
                                     <th>Balance</th>
                                   <th>EMI Paid</th>
                    <th>EMI pending</th>
                                    <th>Settlement</th>    
                                
                                  <th>option</th>
            </tr>
        </tfoot>
 
        <tbody>
            
                            <?php
                   
                            while($emp=mysqli_fetch_array($results))
  
                            {
                                echo "<tr>";

                                echo "<td ><input type='checkbox' value='".$emp['loan_id']."' onclick='showvalue(this.value)'/></td>";
                                echo "<td>".$emp['loan_id']."</td>";
                                echo "<td>".$emp['cust_id']."</td>";
                              
                                
                                
                                 echo "<td>".$emp['amount_lend']."</td>";
                            
                                echo "<td>".$emp['balance']."</td>";
                                
                                echo "<td>".$emp['paid']."</td>";
                                if($emp['auction_period']>6)
                                {
                                   if($emp['auction_period']>12)
                                   {
                                    echo "<td bgcolor='red' style='color:black;'>".$emp['auction_period']."</td>";
                                   }
                                    else
                                    {
                                 echo "<td bgcolor='yellow' style='color:black;'>".$emp['auction_period']."</td>";
                                    }
                                }
                                else
                                {
                                     echo "<td>".$emp['auction_period']."</td>";
                                }
                                
                                if($emp['settlement']=="yes")
                                {
                                     
                                
                                echo "<td bgcolor='#8ff279' style='color:black;'>".$emp['settlement']."</td>";
                                }
                                else
                                {
                                  echo "<td>".$emp['settlement']."</td>";
                                }
                               
                               
                                 echo "<td><button type='button'  name='Update' value='".$emp['loan_id']."' class='btn btn-success update' data-toggle='modal' data-target='#modal2'>view</button> <button type='button' class='btn btn-primary payemi' value='".$emp['loan_id']."' data-toggle='modal' data-target='#modal3'>Pay EMI</button></td>";

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
                                        <h3 class="modal-title">Loan Information</h3>
                                    </div>
                                
                                    <div class="modal-body">
                                        
                                        <ul class="nav nav-tabs">
                                              <li id="tab1" role="presentation"><a id="personal"><h4>Loan information</h4></a></li>
                                              <li id="tab2" role="presentation"><a id="financial"><h4>Items information</h4></a></li>
                                              <li id="tab3" role="presentation"><a id="attach"><h4>Attachment</h4></a></li>
                                        </ul>

                                        
                                        
                                        <div id="display" style="padding-top:10px;">
                                         <form id="mca" method="POST" action="newloan.php">
                                              <!--personalinfo-->
                                             <div id="ptab" class="panel panel-default" >
        
            <div class="panel-heading"> 
                Loan Information
            </div>
            
           
               
               
                 <div class="panel-body">
                      
                     
                     
                       <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="loan_id" class="control-label">&nbsp;&nbsp; Loan Id: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="loan_id" name="loan_id1" placeholder="Loan ID" value = "<?php echo $nextId; ?>" readonly/>
                            </div>
                          </div>
                     

                     <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="cust_id" class="control-label">&nbsp;&nbsp; Cust ID: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                  <div class="input-group">
                                 <input type="text" class="form-control" id="cust_id" name="cust_id1" placeholder="Customer ID" value = "" required/><span class="input-group-addon" id="basic-addon1"></span>                                                               
                                </div>

                                                           
                            </div>
                          </div>
                          
                     
                   <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="date" class="control-label">&nbsp;&nbsp; Date: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="date" class="form-control" id="date"  name="date1" placeholder="Date"  required/>
                            </div>
                          </div>
                     

                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="amount_lend" class="control-label">&nbsp;&nbsp; Amount Lend: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <div class="input-group">
                               <span class="input-group-addon" id="basic-addon1">Rs.</span>
                               <input  type="text" class="form-control"  id="amount_lend" name="amount_lend1" placeholder="Amount Lend" required >
                               </div>       
                           </div>
                       </div>
                     
                     
                     
                     
                  
                     
                     
                     
                     
                     
                     
                     
                     
                    
                     
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="interest" class="control-label">&nbsp;&nbsp;Interest: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                <div class="input-group">
                                 
                   
                          
                                 <select  class="form-control" id="interest"  name="interest1" required >
                                        
                                     <?php
                                     
                                                  while($interest_option2=mysqli_fetch_array($interest_option))
                                                    {
                                                    echo "<option>".$interest_option2['percentage']."</option>";
                                                    }
                                            
                                     ?>
                                    </select>
                         
                                    
                                    <span class="input-group-addon" id="basic-addon1">%</span>
                                </div>
                  
                                    
                            </div>
                          </div>
                    
                     
                     
                          
                      <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="auction_period" class="control-label">&nbsp;&nbsp;Auction period: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input  type="text" class="form-control" id="auction_period"  name="auction_period1" placeholder="Auction period" required/>
                            </div>
                          </div>
                            
                      <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="settlement" class="control-label">&nbsp;&nbsp;Settlement: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                <select  class="form-control" id="settlement"  name="settlement1" placeholder="Settlement" required>
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                   
                                </select>
                            </div>
                          </div>
                     
                     
                       
                       
                       
                       
                        
                          
                 
                                             
                     
          
            
            </div>
            
        </div>
                                            
                                            
                                            
                                          
                                                 
                                                 
                                                 
                                                 
                                                 
                                                   <!--Financial-->
                                                 
                                                  <div id="ftab" class="panel panel-default" >
        
            <div class="panel-heading">
                Item Information 
            </div>
            
            <div class="panel-body">
               
        
                 
                 
                
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="item_description" class="control-label">&nbsp;&nbsp; Item Description: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="textarea" class="form-control" id="item_description"  name="item_description1" placeholder="Item Description" required/>
                           </div>
                       </div>
                
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="item_quantity" class="control-label">&nbsp;&nbsp; Item Quantity: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="item_quantity"  name="item_quantity1" placeholder="Item Quantity" required/>
                           </div>
                       </div>
                   
                       
                
                       <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="gross_weight" class="control-label">&nbsp;&nbsp; Gross Weight: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <div class="input-group">
                               <input type="text"  class="form-control" id="gross_weight"  name="gross_weight1" placeholder="Gross Weight" required/>
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
                               <input type="text" class="form-control" id="net_weight"  name="net_weight1" placeholder="Net Weight" required/>
                                <span class="input-group-addon" id="basic-addon1">gms</span>
                               </div>           
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
                          <div>
                          
                          
        <!--modal for loan emi-->
                              
                              
                                              
                      <div class="modal fade" id="modal3">
                            
                            <div class="modal-dialog modal-lg">
                            
                                <div class="modal-content">
                                
                                    <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">EMI Information</h3>
                                    </div>
                                
                                    <div class="modal-body">
                                        
                                        <ul class="nav nav-tabs">
                                              <li id="tab1" role="presentation"><a id="personal"><h4>EMI details</h4></a></li>
                                              <li id="tab2" role="presentation"><a id="financial"><h4></h4></a></li>                                             
                                        </ul>

                                        
                                        
                                        <div id="display" style="padding-top:10px;">
                                         <form id="mca3" method="POST" action="loanemi/newemi.php">
                                              <!--personalinfo-->
                                             <div id="ptab" class="panel panel-default" >
        
            <div class="panel-heading"> 
                EMI Details
            </div>
            
           
               
               
                 <div class="panel-body">
                      
                     <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="transaction_id" class="control-label">&nbsp;&nbsp; Transaction ID: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="transaction_id"  name="transaction_id1" placeholder="Transaction ID" readonly  value="<?php echo $nextId123; ?>"/>
                           </div>
                       </div>
                     
                     
                     
                         <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              
                              <label  for="loan_id" class="control-label">&nbsp;&nbsp; Loan Id: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="loanemiid" name="loan_id1" placeholder="Loan ID" value = "" readonly />
                            </div>
                          </div>
                          
                          
                       
                       
                     
                                         
                       
                                       
                       
                       
                          
                       
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="transaction_date" class="control-label">&nbsp;&nbsp;Transaction Date: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="date"  class="form-control" id="transaction_date" placeholder="Transaction Date"  name="transaction_date1" title="enter number only"/>
                           </div>
                       </div>
                       
                       
                        <div class="row">
                            <div class="col-md-3" style="padding-top:15px;">
                              <label  for="remarks" class="control-label">&nbsp;&nbsp; Enter months: </label>
                            </div>
                            <div class="col-md-8" style="padding-top:10px;">
                                 <input type="text" class="form-control" id="remarks"  name="remarks1" placeholder="No of months" data-error="Enter Remarks " required/>
                            </div>
                          </div>
                        
                         <div class="row">
                           <div class="col-md-3" style="padding-top:15px;">
                               <label for="cash_paid" class="control-label">&nbsp;&nbsp; Amount Paid: </label> 
                           </div>
                           <div class="col-md-8" style="padding-top:10px;">
                               <input type="text" class="form-control" id="cash_paid"  name="cash_paid1" placeholder="Cash Paid"/>
                           </div>
                       </div>
                       
                         
                                             
                     
          
            
            </div>
            
        </div>
                                            
                                            
                                            
                                          
                                                 
                                                 
                                                 
                                                 
                                                 
                                                   <!--Financial-->
                                                 
                                                  
                                            
                                            <!--attachment-->
                                          
                                                       </form>
        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                        <button type="submit" id="savedata" form="mca3" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                    
                                </div>
                            
                            
                            </div>
                        
                        
                        </div>
                             <div class="modal fade" id="modal2">
                                 
                          </div>
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