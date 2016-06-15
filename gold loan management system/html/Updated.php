<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: Login.php');
}




                $p="";
        if(isset($_POST['submit']))
        {
            $id=$_POST['custid'];
            $name=$_POST['custname'];
            $age=$_POST['custage'];
            $gender=$_POST['gender'];
            $dob=$_POST['dob'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $occupation=$_POST['occupation'];
            $address=$_POST['address'];
            $pin=$_POST['pin'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $country=$_POST['country'];
            
            $con=mysql_connect("localhost","root","");
            if(!$con)
            {
                die("Cannot connect".mysql_error());
            }
            mysql_select_db("gold_loan",$con);
            
            $sql="UPDATE borrower SET name='$name',age=$age,gender='$gender',dob='$dob',phone=$phone,email='$email',
            occupation='$occupation',address='$address',pincode='$pin',city='$city',state='$state',country='$country' WHERE id=$id ";
            
            if(mysql_query($sql,$con))
            {
            $_SESSION['updated']="true";
            }
            
          
            mysql_close($con);
        }  
header("Location:Customers.php");




    ?>
    