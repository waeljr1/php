<?php
// username -Length 3<x<30 -characters -unique
// email   -Length  -valid -unique -characters
// phone -numeric -length 11 
// age    -numeric -range 13< x <150
// pass   - range > 10  - complexity 
// repass  - matching with pass
// submit & reset 
##############
##   START  ##
##############
$username=$phone=$pass=$repass=$email=$age="";


require 'func.php';
if($_SERVER["REQUEST_METHOD"]==="POST"){ #check the method
        global $username,$phone,$pass,$repass,$email,$age;

   
    if(isset($_POST['submit'])){ 
        $username = clean($_POST['username']);
        $phone =    clean($_POST['phone']);
        $email =    clean($_POST['email']);
        $pass  =    clean($_POST['pass']);
        $repass  =  clean($_POST['repass']);
        $age =      clean($_POST['age']);

    
    ############
    # username #
    ############

    if (!empty($_POST["username"])) {

        
        if(strlen($_POST["username"])>4 && strlen($_POST["username"])<30){
            
            #remove chars
            $_POST["username"] = sanitize($_POST["username"]); 
            $username = $_POST["username"];
        }
         else echo "Username must be between 4 and 30 characters<br>";
 
    }
        else echo "Username is required.<br>";

    #########
    # Email #
    #########
    
    if(!empty($_POST["email"])){
        
         if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            $email = $_POST["email"];
        }

    }
    else echo "Email is required.<br>";
 
    #########
    # phone #
    ######### 

 if(!empty($_POST['phone'])){
        if(ctype_digit($_POST['phone'])){
            if(strlen($_POST['phone'])==11){
                $phone = filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
            }else echo "phone less than 12" ;
        }else echo "phone should be 11 digit start with 0" ;
    }else echo" phone required ";


    #######
    # age #
    #######
    if(!empty($_POST["age"])){
       
        // Remove non-numeric characters from the phone number
      $_POST["age"]= preg_replace('/[^0-9]/', '', $_POST["age"]);

        if($_POST["age"]>=13 || $_POST["age"] <=150){
        $age = $_POST["age"] ;
       
          }else echo "your age must be more than 12<br>";


    }
    else echo "age is required<br>";

   if(!empty($_POST["pass"])){
        if(ctype_alnum($_POST["pass"])){
            if(strlen($_POST["pass"])>=9){
                $pass = $_POST["pass"];
            }else echo "pass less than 12 <br>" ;
        }else echo "Password must be alpha or numbers or sympols<br>" ;
    }else echo "password required<br>";


  if ($_POST['repass']=== $pass){
    $repass=$_POST['repass'];
  }
  else echo "password doesnot match";






}

}







?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> registration</title>
  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        

    label {
        display: inline-block;
        padding: 10px 5px;
        width: 50%;
        background-color: #4ca7af;
        color: #dce0e0;
        cursor: pointer;
        border-radius: 5px;
        margin-right: 5px;
        font-size: 16px;
    }

    input[type="radio"]:checked + label {
        background-color:#4ca7af;
    }

        input[type="submit"]{
            background-color: #4CAF50;
            color: white;
             width: 100%;
            padding: 10px ;
             margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
           cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .error {
            color: red;
            font-size: 0.8em;
        }
    </style>

</head>
<body>
    <form action="" method="POST">
        <p><span class="error">* required field</span></p>
        <tr>
            <td>USERNAME : <input type="text" name="username" placeholder="your username"></td>
        </tr>
        <br>

        <tr>
            <td>EMAIL : <input type="text" name="email" placeholder="your email"></td>
        </tr>
        <br>

        <tr>
            <td>PHONE : <input type="text" name="phone" placeholder="your phone"></td>
        </tr>
        <br>
        <tr>
            <td>AGE :<input type="text" name="age" ></td>
        </tr>
        <br>

        <tr>
            <td>PASSWORD :<input type="password" name="pass"></td><br>
            <td>RE-PASSWORD : <input type="password" name="repass"></td>
        </tr>
        <br>
        <label>
          <input type="radio" name="gender" value="male">
          Male
       
       </label>
        <label>
          <input type="radio" name="gender" value="female">
            Female
        </label>
        
        <tr>
            <td><input type="submit" name="submit" value="submit"></td>
            
        </tr>
        
        
        





    </form>
    
    
</body>
</html>