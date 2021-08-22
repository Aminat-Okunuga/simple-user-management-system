<?php
include "db.php";
$msg = "";
// Get user Id from query string
$user_id = $_GET['edit'];
// fetch all users record
$all_user = mysqli_query($connect, "SELECT * FROM users WHERE id = $user_id");
$fetch_data = mysqli_fetch_array($all_user);
// while($row)
    if(isset($_GET['edit'])){
        // $user_id = $_GET['edit'];
        if(empty($_POST['username']) && empty($_POST['firstname']) && empty($_POST['lastname']) && empty($_POST['email'])){
            $msg = "Fields cannot be empty!";
        }elseif ((empty($_POST['first_name']) || ($_POST['first_name'] == ""))) {
            $msg = "First Name is required!";
        }elseif ((empty($_POST['last_name']) || ($_POST['last_name'] == ""))) {
            $msg = "Last Name is required!";
        }elseif ((empty($_POST['email']) || ($_POST['email'] == ""))) {
            $msg = "Email is required!";
        } else{
            // $username = mysqli_real_escape_string($connect, $_POST['username']);
            $first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
            $email = mysqli_real_escape_string($connect, $_POST['email']);
        // update user record
        $update_user = mysqli_query($connect, "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE id = $user_id");
        if($update_user){
            $msg = "User Record Has Been Updated Successfully!";
        }else{
            $msg = "Something Went Wrong!";
        }
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.ico">
</head>
<body>
    <div class="container">
        <h1>A Simple User Management System</h1>
        <p>Developed By: Aminat Okunuga</p>
        <h3>Update Details</h3>
    </div>
    <div class="middle-container">
        <form action="" method="POST">
           <p class="message"> <?php echo $msg; ?></p>
            <!-- <label for="Name">Username:</label>
            <input id="username" class="form-input" type="text" name="username" value="<?php echo $fetch_data['first_name']; ?>" id=""><br> -->
            <label for="First Name">First Name:</label>
            <input class="form-input" type="text" name="first_name" value="<?php echo $fetch_data['first_name'];  ?>" id=""><br>
            <label for="Last Name">Last Name:</label>
            <input class="form-input" type="text" name="last_name" value="<?php echo $fetch_data['last_name']; ?>" id=""><br>
            <label for="Email">Email:</label>
            <input id="email" class="form-input" type="email" name="email" value="<?php echo $fetch_data['email']; ?>" id=""><br>
            <input class="form-input" type="submit" name="edit" value="Update">
        </form>
    </div>
