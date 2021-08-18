<?php
$msg = "";
if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email'])){
        $msg = "Fields cannot be empty!";
        // header("Location: index.php");
    }elseif ((empty($_POST['username']) || ($_POST['username'] == ""))) {
        echo "Username is required!";
    }elseif ((empty($_POST['firstname']) || ($_POST['firstname'] == ""))) {
        echo "First NAme is required!";
    }elseif ((empty($_POST['lastname']) || ($_POST['lastname'] == ""))) {
        echo "Last Name is required!";
    }elseif ((empty($_POST['email']) || ($_POST['email'] == ""))) {
        echo "Email is required!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple User Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.ico">
</head>
<body>
    <div class="container">
        <h1>A Simple User Management System</h1>
        <p>Developed By: Aminat Okunuga</p>
    </div>
    <div class="middle-container">
        <form action="" method="POST">
           <p class="message"> <?php echo $msg; ?></p>
            <label for="Name">Username:</label>
            <input id="username" class="form-input" type="text" name="username" id=""><br>
            <label for="First Name">First Name:</label>
            <input class="form-input" type="text" name="first_name" id=""><br>
            <label for="Last Name">Last Name:</label>
            <input class="form-input" type="text" name="last_name" id=""><br>
            <label for="Email">Email:</label>
            <input id="email" class="form-input" type="text" name="email" id=""><br>
            <input class="form-input" type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>