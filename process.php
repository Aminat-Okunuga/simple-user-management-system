<?php
if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email'])){
        return "Fields cannot be empty!";
        header("Location: index.php");
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