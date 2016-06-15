<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: Login.php');
}
if(isset( $_SESSION['userrole']))
{
$role=$_SESSION['userrole'];
   // unset($_SESSION['success']);
}
$server="localhost";
$dbname="gold_loan";
$con=mysqli_connect($server,"root","",$dbname) or die("Error in connection");
$totalamtlend=$totalamtbalance=$totalemipending=$setteledcount=$nonsettledcount=$g3=$g6=$g12=$g2=$num_loancustomers=$num_customers=$num_loan=$totalgold=$totalgoldamt=$buisness=0;
if($con)
{
   
      $sql= "SELECT * FROM loan_details";  
     $results=mysqli_query($con,$sql);
     
     while($emp=mysqli_fetch_array($results))
    {
                
            
         //  $date=$emp['date'];
          // $loan_id=$emp['loan_id'];
          //  $cust_id=$emp['cust_id'];
            $amount_lend=$emp['amount_lend'];
           // $interest=$emp['interest'];
           // $amt_pergram=$emp['emidate'];
            $auction_period=$emp['auction_period'];
            $settlement=$emp['settlement'];
            $balance=$emp['balance'];
            $paid=$emp['paid'];
            //$item_description=$emp['item_description'];
           // $item_quantity=$emp['item_quantity'];
           // $gross_wt=$emp['gross_wt'];
         $net_wt=$emp['net_wt'];
          $quality=$emp['emi'];
           $totalamtlend=$amount_lend+$totalamtlend;
           $totalamtbalance=$balance+$totalamtbalance;
           $totalemipending=$totalemipending+$quality;
        if( $settlement=="yes" || $settlement==1)
        {
            $setteledcount=$setteledcount+1;
        }
         else
         {
         $nonsettledcount=$nonsettledcount+1;
             if($auction_period>=3)
         {
             if($auction_period>=6)
                {
                  if($auction_period>=12)
                {
            $g12=$g12+1;
                }
                 else
                 {
            $g6=$g6+1;
                 }
                 }
            
             else
             {
           $g3=$g3+1;
             }
         }
             else
             {
             $g2=$g2+1;
             }
         }
         
        
           $totalgold=$net_wt+$totalgold;        
           $totalgoldamt=$totalgold*2600;
           if($totalgoldamt>$totalamtbalance)
           {
            $buisness="Profit";
           
           }
         else
         {
         $buisness="Loss";
         }
         
        
     }
     $sql= "SELECT * FROM borrower";  
     $results=mysqli_query($con,$sql);
       $num_customers = mysqli_num_rows($results); 
     $sql= "SELECT * FROM borrower where id in(select cust_id from loan_details)";  
     $results=mysqli_query($con,$sql);
        $num_loancustomers = mysqli_num_rows($results);    
        $sql= "SELECT * FROM loan_details";  
     $results=mysqli_query($con,$sql);
       $num_loan = mysqli_num_rows($results); 
    
    
    
   
}
?>


<!DOCTYPE html>
<html lang="en">
   <head>
                <title>GOLD LOAN</title>
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
     <link rel="stylesheet" href="css/home.css">
        <style type="text/css">
            html {
                overflow: auto;
            }
        </style>

<script>
       $(document).ready(function(){
                               
                                 var role="<?php echo $role;?>";
                                     if(role=="manager")
                                     {
                                         $(".sendemail").removeAttr("href");;
                                     }
                                   
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
    </head>
    
    <body>
         

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">GBV Loans</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span>&nbsp;<?php echo "".ucfirst($_SESSION['login_user']); ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="Logout.php"><span class="glyphicon glyphicon-off"></span> &nbsp; Log Out</a></li>
               
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
       
    <!-- Main content-->
        
        <div class="container">
            <div class="row">
                       <div class="col-lg-4 col-md-4 col-sm-4" style=""><br/>
                   <a  href="Customers.php">
                     &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;   <img class=" img-circle" src="../images/customer1.jpg" alt="No image to diaplay" height="100px"/>
                          <h4 style="position:relative,left:20px;">Customer</h4></a>
                         <p> Add, Update, Delete, and </br> Search Customer </p>
                      </div>
        
        
        
                    



<div class="col-lg-4 col-md-4 col-sm-4" style=""><br/>
                        <div>
                        <a href="loans/loandetails.php">
                       &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;   <img class=" img-circle" src="../images/laons.jpg" alt="No image to diaplay" height="100px"/>
                            <h4 style="position:relative,left:20px;">Loans</h4></a>
                        <p> Add, Update, Delete, and </br> Search Loans  </p>
                    </div>
                   </div>



<div class="col-lg-4 col-md-4 col-sm-4" style="">
                        
                         <a href="../html/loans/loanemi/loandetails.php">
                             <br>
                        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  <img class=" img-circle" src="../images/borrower2.jpg" alt="No image to diaplay" height="100px"/>
                            <h4 style="position:relative,left:20px;">EMI</h4></a>
                        <p> Add, Update, Delete, and </br> Search borrowers  </p>

                   </div>




                   </div>
<br/>
<br/>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4" style="">
                        <div>
                        <a class="sendemail" href="createuser/createuser.php">
                        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;<img class="img-circle" src="../images/emp2.jpg" alt="No image to diaplay" height="100px"/>
                            <h4 style="position:relative,left:-20px;">User</h4></a>
                        <p> Add, Update, Delete, and </br> Search Employee  </p>
                    </div>
 </div>
    <div class="col-lg-4 col-md-4 col-sm-4" style="">
                        <div >
                        <a class="sendemail" href="master/master.php">
                        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  <img class=" img-circle" src="../images/master.jpg" alt="No image to diaplay" height="100px"/>
                           <br>
                          <h4 style="position:relative,left:20px;">Master</h4></a>
                        <p> Add, Update, Delete, and </br> Search Setting  </p>
                    </div>

</div>
 <div class="col-lg-4 col-md-4 col-sm-4" style="">
                        <div >
                        <a  href="" data-toggle='modal' data-target='#modal2'>
                        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  <img class=" img-square" src="../images/tmobile-usage-statistic.png" alt="No image to diaplay" height="100px"/>
                           <br>
                        
                          <h4 style="position:relative,left:20px;">Report</h4></a>
                        <p> Check your stats </br> Results  </p>
                    </div>

</div>

                   
        
       
</div>
</div>

  <div id="modalcontainer">                                          
                      <div class="modal fade" id="modal2">
                            
                            <div class="modal-dialog modal-lg">
                            
                                <div class="modal-content">
                                
                                    <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">Report Information</h3>
                                    </div>
                                
                                    <div class="modal-body">
                                        
                                        <ul class="nav nav-tabs">
                                              <li id="tab1" role="presentation"><a id="personal"><h4>Report information</h4></a></li>
                                              <li id="tab2" role="presentation"><a id="financial"><h4>Settled...<span class="badge"><?php echo $setteledcount;?></h4></a></li>
                                              <li id="tab3" role="presentation"><a id="attach"><h4>Non-Settled ...<span class="badge"><?php echo $nonsettledcount;?></span></h4></a></li>
                                        </ul>

                                        
                                        
                                        <div id="display" style="padding-top:10px;">
                                         <form id="mca" method="POST" action="newinsert.php">
                                              <!--personalinfo-->
                                             <div id="ptab" class="panel panel-default" >
        
            <div class="panel-heading"> 
            <span  style="font-size:1.2emc;" class="badge"><?php echo "Your Buisness is in :      ".$buisness."" ?></span>
            </div>
            
           
               
               
                 <div class="panel-body">
                   
                     <div class="alert alert-info" role="alert" style="font-size:1.2em;">Total Customers..<span class="badge"><?php echo "".$num_customers."<br>";?></span> |   Total Loan Customers..<span class="badge"><?php echo "".$num_loancustomers."<br>";?></span> |   Total Loan Taken..<span class="badge"><?php echo "".$num_loan."<br>";?></span></div>
                  
                     
                 <div class="alert alert-success" role="alert" style="font-size:1.2em;"><?php echo "Total Amount Lended to Customers is  :    Rs.".$totalamtlend."<br>";?></div>
                
               <div class="alert alert-warning" role="alert" style="font-size:1.2em;"><?php  echo "Total Amount Balance from Customers is  :    Rs.". $totalamtbalance."<br>";?></div>
              <div class="alert alert-danger" role="alert" style="font-size:1.2em;"><?php  echo "Total Amount EMI Amount pending from Customers is  :   Rs.". $totalemipending."<br>";?></div>                
                     <div class="alert alert-success" role="alert" style="font-size:1.2em;"><?php
                         echo "Total Gold  :    .".$totalgold.".gms &nbsp;  &nbsp; &nbsp; &nbsp; "; 
                     echo "Total value of Gold  :    Rs.".$totalgoldamt."<br>";
                         ?>  
                        </div>
                            
            
            </div>
            
        </div>
                                            
                                            
                                            
                                          
                                                 
                                                 
                                                 
                                                 
                                                 
                                                   <!--Financial-->
                                                 
                                                  <div id="ftab" class="panel panel-default" >
        
            <div class="panel-heading">
                Settled
            </div>
            
            <div class="panel-body">
               
        <div class="alert alert-success" role="alert" style="font-size:1.2em;"><?php echo "Number of successfull loan Buisness  :    ".$setteledcount."<br>";?></div>
                                        
                     
                     
                           
            </div>
            
        </div>
                                            
                                            <!--attachment-->
                                            <div id="atab"class="panel panel-default" >
        
                                                <div class="panel-heading">
                                                       Non-Settled
                                                </div>
            
                                                    <div class="panel-body">
                                                        
                                                   <div class="alert alert-success" role="alert" style="font-size:1.2em;">EMI  lessthan  3   :<span class="badge"><?php  echo "". $g2."<br>";?></span></div> 
                                                        <div class="alert alert-warning" role="alert" style="font-size:1.2em;">EMI >= 3   :<span class="badge"><?php  echo "". $g3."<br>";?></span></div> 
                                                        <div class="alert alert-info" role="alert" style="font-size:1.2em;">EMI >= 6   :<span class="badge"><?php  echo "". $g6."<br>";?></span></div> 
                                                        <div class="alert alert-danger" role="alert" style="font-size:1.2em;">EMI >= 12   :<span class="badge"><?php  echo "". $g12."<br>";?></span></div> 
                                                        
                                                        
                                                </div>
            
                                            </div>
                                                       </form>
        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                       
                                    </div>
                                    
                                </div>
                            
                            
                            </div>
                        
                        
                        </div>
                             <div class="modal fade" id="modal2">
                                 
                          </div>
    </div>
       <footer class="navbar navbar-default navbar-fixed-bottom">
      <div class="container">
        <p class="text-muted" style="padding-top:25px;padding-left:60px;">Copyrights &copy; 2015. All rights reserved . Powered by : OnesTech.Solutions.&trade; </p>
      </div>
    </footer>   
    </body>
    
</html>