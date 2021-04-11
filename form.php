<?php

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "select * from supplier where supplier_email = '$email' and supplier_pass = '$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);


    if($email === "ictdpt@gmail.com" & $password === "ictdpt"){
        header("Location: ict");
    }elseif($email === "manager@gmail.com" & $password === "manager"){
        header("Location: manager");
    }elseif($email === "procure@gmail.com" & $password === "procure"){
        header("Location: procure");
    }elseif($count == 1) {
        $_SESSION['sup_id'] = $row['sup_id'];
        header("Location: sup" );              
    }
    else{
        echo "<p class='alert alert-danger'>Invalid Credentials</p>";
    }



}



?>



<form action="" method="post" class="probootstrap-form">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success btn-lg" id="submit" name="submit" value="Login">
    </div>
</form>