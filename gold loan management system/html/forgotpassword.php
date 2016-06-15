


<!DOCTYPE html>
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
       
       
     <script>
       
            $(document).ready(function(){
            
                $("#verifyuser").click(function(){
                    
                    var value=$("#username").val();
                
                    $.ajax({
                                         
                                          url: 'validateusername.php',
                                           type: 'POST',
                                          data: {username:value},
                                          success: function(result){
                                                $("#successcontent").html("");
                                              $("#successmsg").fadeIn(1000).delay(3000).fadeOut(1000);
                                              $("#successcontent").html(result);
                                       
                                          }
                                        });   
                });     
            
            });
       
       </script>
       <style>
          body {
  
    background-color: grey;
}
       </style>
    </head> 


                               
  
    
    
    
    <body>
        
        <div class="container-fluid">
            
          <div id="loginpanel">
              
               <div class="jumbotron">
                 
   
 
     <div id="successmsg" class="alert alert-warning alert-dismissible" role="alert" hidden>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Message!</strong> <div id="successcontent"></div>
</div>
        
            <form name="forgotpassword">  
              <h2>Forgot Password</h2> 
        <div class="form-group">
                    
                <label for="usernamelogin"> Enter Username</label>
                <input  class="form-control" id="username" type="text" placeholder="Username" name="username" required autofocus/>
            
                      
     
        </div>
            
            
            
        <div class="form-group">
                       
            
        </div>
                <div class="form-group">
                    
                
                <button id="verifyuser" class="btn btn-primary btn-lg btn-block"  type="button">Verify</button>
        </div>
            
                
            </form>
             
            </div>
            </div>
             </div>
        <div class="clearfix"></div>
       
    </body>
    
    
</html>