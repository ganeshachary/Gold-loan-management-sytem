 <?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: Login.php');
}
$v="";
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
            
            $sql="INSERT INTO borrower (name,age,gender,dob,phone,email,occupation,address,pincode,city,state,country)
            VALUES ('$name',$age,'$gender','$dob',$phone,' $email','$occupation','$address','$pin','$city','$state',' $country')";
            
            $v="success";
            
        if(mysql_query($sql,$con))
            {
            $_SESSION['success']="true";
            }
            
          
            mysql_close($con);
        }  
header("Location:Customers.php");






    ?>
    