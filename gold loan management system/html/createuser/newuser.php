<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../Login.php');
}
        if(isset($_POST['submit']))
        {
            $username=$_POST['username1'];
            $password=$_POST['password1'];
            $email=$_POST['email1'];
            $phone=$_POST['phone1'];
            $role=$_POST['role1'];
     
            $con=mysql_connect("localhost","root","");
            if(!$con)
            {
                die("Cannot connect".mysql_error());
            }
            mysql_select_db("gold_loan",$con);
            
            $sql="INSERT INTO user (username,password,email,phone,role)
            VALUES ('$username','$password','$email','$phone','$role')";
            
            
            
        if(mysql_query($sql,$con))
            {
            $_SESSION['success']="true";
            }
            else
            {
            echo "error";
            }
          
            mysql_close($con);
        }  
header("Location:createuser.php");






    ?>
    