<?php
if(isset($_POST['submit'])){

    require 'database.php';

        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $passwordConfirm = mysqli_real_escape_string($connection,$_POST['passwordconfirm']);
        $country = mysqli_real_escape_string($connection,$_POST['country']);
        $state = mysqli_real_escape_string($connection,$_POST['state']);
        $postal= mysqli_real_escape_string($connection,$_POST['postal']);
        $street= mysqli_real_escape_string($connection,$_POST['street']);
        $phone= mysqli_real_escape_string($connection,$_POST['phone']);
        $address_id =0;

        $email_Query = "SELECT * FROM users WHERE UserEmail='$email'";
        $emailResult = mysqli_query($connection,$email_Query);

        if (mysqli_num_rows($emailResult)!=0) {
            header("Location: ../index.php?error=emailTaken");
            exit();
        }

        $user_Query = "SELECT * FROM users WHERE UserName='$username'";
        $userResult = mysqli_query($connection,$user_Query);

        if (mysqli_num_rows($userResult)!=0) {
            header("Location: ../index.php?error=usernameTaken");
            exit();
        }

        $errors=array();
        foreach ($_POST as $key => $value) {
            if($value==""){
                if($key!="submit"){
                    array_push($errors,$key);
                }
            }
        }
        $uppercase = preg_match('@[A-Z]@',$password);
        $lowercase = preg_match('@[a-z]@',$password);
        $number = preg_match('@[0-9]@',$password);
        $specialChars = preg_match('@[^\w]@',$password);
        if(count($errors)!=0){
            echo "Valami ures: ";
            foreach($errors as $key => $values){
                echo $values."<br>";
            }
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
            echo "HÁT HOL AZ EAMIL!!!";
        }
        else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password)<8 || $password!==$passwordConfirm) {
            $date = date("Y-m-d h:i:s");

            $streetQuery = "SELECT * FROM addresses WHERE Street='$street'";
            $streetResult = mysqli_query($connection,$streetQuery);
            $addressExists = false;
            if (mysqli_num_rows($streetResult)!=0) {
                $adatok=mysqli_fetch_row($streetResult);
                if ($adatok[2]==$postal && $adatok[1]==$country) {
                    $address_id=$adatok[0];
                    $addressExists=true;
                }
            }
            else {
                echo'address_stmt_error';
            }
        
            if (!$addressExists) {
                $address_Query = "INSERT INTO `addresses`( `Country_ID`, `Postal`, `Street`, `Created_at`)
            VALUES (?,?,?,?)";
            $address_statement = mysqli_stmt_init($connection);
            if(mysqli_stmt_prepare($address_statement,$address_Query)){
                mysqli_stmt_bind_param($address_statement,'isss',$country,$postal,$street,$date);
                mysqli_stmt_execute($address_statement);
                $idQuery = "SELECT MAX(id) FROM addresses";
                $result = mysqli_query($connection,$idQuery);
                $address_id = mysqli_fetch_row($result)[0];
                # code...
            }
            }
            

            $hashedPassword  = password_hash($password,PASSWORD_DEFAULT);


            echo $address_id;

            $sql_query="INSERT INTO `users`( `UserName`, `UserPassword`, `UserEmail`, `UserPhoneNumber`, `Addres_Id`, `Created_at`) 
            VALUES (?,?,?,?,?,?)";
            $statement = mysqli_stmt_init($connection);
            if(mysqli_stmt_prepare($statement,$sql_query)){
                mysqli_stmt_bind_param($statement,'ssssis',$username,$hashedPassword,$email,$phone,$address_id,$date);
                mysqli_stmt_execute($statement);
            }
            else{
                echo 'Prepare statement error. Preparing not works. Check SQL syntax or connection.';
            }
     
        }
    else{
    echo 'HAHA nyomjad a gombot is.';
    }
        
}