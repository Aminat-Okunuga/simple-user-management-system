<?php
include "db.php";

$msg = "";
if(isset($_POST['submit'])){
    if(empty($_POST['username']) && empty($_POST['firstname']) && empty($_POST['lastname']) && empty($_POST['email'])){
        $msg = "Fields cannot be empty!";
    }elseif ((empty($_POST['username']) || ($_POST['username'] == ""))) {
        $msg = "Username is required!";
    }elseif ((empty($_POST['first_name']) || ($_POST['first_name'] == ""))) {
        $msg = "First Name is required!";
    }elseif ((empty($_POST['last_name']) || ($_POST['last_name'] == ""))) {
        $msg = "Last Name is required!";
    }elseif ((empty($_POST['email']) || ($_POST['email'] == ""))) {
        $msg = "Email is required!";
    } else{
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);

        // insert into database
        $create_user = mysqli_query($connect, "INSERT INTO users (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email') ");
        if($create_user){
            $msg = "User Record Has Been Created Successfully!";
        }else{
            $msg = "Something Went Wrong!";
        }
    }
}

// fetch all users record
$all_user = mysqli_query($connect, "SELECT * FROM users");

// delete user record
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete_user = mysqli_query($connect, "DELETE FROM users WHERE id = $id");
    if($delete_user){
        $msg = "User Record Has Been Deleted Successfully!";
        header("location: index.php");
    }else{
        $msg = "Something Went Wrong!";
    }
}

// edit user record



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
            <input id="email" class="form-input" type="email" name="email" id=""><br>
            <input class="form-input" type="submit" name="submit" value="Submit">
        </form>
    </div>

    <!-- all users table -->
    <h2>All Users</h2>
    <div class="table-container">
        <table cellspacing = "40px" class="table">
            <thead>
                <tr>
                    <!-- <th>S/N</th> -->
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
            
                foreach($all_user as $user){?>
                <tr>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <a class="edit" href="edit.php?edit=<?php echo $user['id']; ?>">Edit</a>
                        <a class="delete" href="index.php?delete=<?php echo $user['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php }
                    // }
                // } 
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>