<?php
session_start();
//unset($_SESSION['login_user']);

if(!empty($_SESSION['login_user']))
{
header('Location: home.php');
}
?>

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
                     
           function validate()
           {
                
                        if(document.forms["loginform"]["username"].value == "")
                        { 
                            document.getElementById("usernameerror").style.display = "block";
                              document.getElementById("usernameerror").innerHTML="Please enter the username";
                        
                        }
                         else
                         {
                          document.getElementById("usernameerror").style.display = "none";
                                                           document.getElementById("usernameerror").innerHTML="";
                         }
                     
                         if(document.forms["loginform"]["password"].value == "")
                        {
                            document.getElementById("passworderror").style.display = "block";
                              document.getElementById("passworderror").innerHTML="Please enter the Password";
                            
                        }
                     else{
                                 document.getElementById("passworderror").style.display = "none";
                              document.getElementById("passworderror").innerHTML="";
                     }
               
                    if(document.forms["loginform"]["username"].value!="" && document.forms["loginform"]["password"].value!="")
                    {
                           document.getElementById("usernameerror").style.display = "none";
                         
                    validateForm();
                    }
              
           }
                    function validateForm(){
                        

                                     var nameRegex =/^[a-zA-Z\-]+$/;
                            var validUsername =    document.forms["loginform"]["username"].value.match(nameRegex);
                            var validpassword =     document.forms["loginform"]["password"].value;  
                        if(validUsername == null){
                                document.getElementById("usernameerror").style.display = "block";
                                
                                document.forms["loginform"]["username"].focus();
                                
                                    }
                        else
                         {
                             
                             showUser(validUsername,validpassword);
                         }
                                }
           
                        function showUser(n,p) {
                             document.getElementById("usernameerror").style.display = "block";
                                        if (n == "") {
                                        document.getElementById("txtHint").innerHTML = "";
                                                return;
                                        } 
                                            else { 
                                            if (window.XMLHttpRequest) {
                                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                                xmlhttp = new XMLHttpRequest();
                                            } else {
                                                // code for IE6, IE5
                                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                            }
                                            xmlhttp.onreadystatechange = function() {
                                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                                     
                                                     window.location.href = "home.php";
                                          document.getElementById("usernameerror").innerHTML = xmlhttp.responseText;
                                                }
                                            }
                                            xmlhttp.open("POST","validate2.php?q="+n+"&p="+p,true);
            xmlhttp.send();
    }
}
           
       </script>
    </head> 


                               
  
    
    
    
    <body>
        
        <div class="container-fluid">
          <div id="loginpanel">
            <form name="loginform" action="" onsubmit="validateForm()">  
              <h1>Login</h1> 
        <div class="form-group">
                    
                <label for="usernamelogin">username</label>
                <input class="form-control" id="usernamelogin" type="text" placeholder="Username" name="username" required autofocus/>
            
                      <div id="usernameerror" class="alert alert-danger  hideerror" role="alert">Only characters A-Z, a-z and '-' are  acceptable.</div>
     
        </div>
            
            
            
        <div class="form-group">
                    
                <label for="passwordlogin">Password</label>
                <input class="form-control" id="passwordlogin" type="password" placeholder="password" name="password" required/> 
                       
                          <div id="passworderror" class="alert alert-danger hideerror" role="alert"></div>

        </div>
                <div class="form-group">
                    
                
                <button class="btn btn-primary btn-lg btn-block"   onclick="validate()" type="button">Login</button>
        </div>
            
                <div class="form-group">
                   
                    <a href="forgotpassword.php">forgot password</a>
                </div>
            </form>
             
            </div>
            </div>
        <div class="clearfix"></div>
       
    </body>
    
    
</html>