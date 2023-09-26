<?php require 'controllers/database.php'; 

$sql_query = "SELECT * From `countries`";
$result = mysqli_query($connection, $sql_query);
$sql_query2 = "SELECT * From `states` WHERE country_code='HU'";
$result2 = mysqli_query($connection, $sql_query2);





?>


<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentikációs rendszer alapjai</title>
    <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
    <script src="bootstrap\js\bootstrap.bundle.js"></script>

    <link rel="stylesheet" href="style.css">
    <script src="scripts/jquery_3_7.js"></script>
    <script src="scripts/input-mask.js"></script>
</head>
<body>
    
<div class="container">

    <div class="row mt-4 mb-2">

        <div class="col-2"></div>
        <div class="col-8">

            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">Registration form</h4>
                    <!-- Form eleje -->
                    <form action="controllers/register.php" method="POST">

                        <div class="form-floating mb-3">

                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                        <label for="email">Email address</label>

                        </div>
                        <div class="form-floating mb-3">

                        <input type="username" class="form-control" name="username" id="username" placeholder="name@example.com">
                        <label for="username">Username</label>

                        </div>
                        <div class="pwd">

                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <span class="passwordIconHolder">
                            <i class="passwordIcon" id="passwordIcon" onclick="showPassword()">X</i>
                        </span>

                        </div>
                        <div class="pwd">

                        <input type="password" class="form-control mt-3" name="passwordconfirm" id="passwordconfirm" placeholder="Password Confirm">
                        <span class="passwordIconHolder">
                         <i class="passwordIcon" id="passwordIconconfirm" onclick="showPasswordconfirm()">X</i>
                        </span>

                        </div>
                        

                        <select class="form-select mt-3 mb-2" name="country" id="country">

                        <option value="" disabled selected>Please choose a country...</option>
                        <?php
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                        ?>
                        </select>


                        
                        

                        <select class="form-select mt-3" name="state" id="state">

                        <option value="" disabled selected>Please choose a state...</option>
                        <?php
                        while($row=mysqli_fetch_assoc($result2)){
                        echo '<option value="'.$row['id'].'">'.$row['state_name'].'</option>';
                        }
                        ?>
                        </select>

                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" name="postal" id="postal"placeholder=" ">
                            <label for="postal">Postal code</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="street" id="street" placeholder=" ">
                            <label for="street">Street</label>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="" data-mask="(99) 999-9999" >
                            <span class="font-13 text-muted">(99) 999-9999</span>
                         </div>

                        <hr>

                        <button class="btn mt-3" name="submit" type="submit" id="submit">Register</button>

                    </form>
                    <!-- Form vége -->
                </div>
            </div>

        </div>
        <div class="col-2"></div>

    </div>

</div>

</body>
<script>
    let passwordSeen=false;
    let pwnInput= document.getElementById("password");
    function showPassword(){
        if (passwordSeen == false) {
            pwnInput.setAttribute("type","text");
            passwordSeen=true;
        }
        else{
            pwnInput.setAttribute("type","password");
            passwordSeen=false;
        }
    }
    let pwnInputConf= document.getElementById("passwordconfirm");
    let passwordSeenConfirm=false;
        function showPasswordconfirm(){
        if (passwordSeenConfirm == false) {
            pwnInputConf.setAttribute("type","text");
            passwordSeenConfirm=true;
        }
        else{
            pwnInputConf.setAttribute("type","password");
            passwordSeenConfirm=false;
        }
    }
</script>
</html>