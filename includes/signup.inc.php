<?php

//Returns the user if they did not connect correctly//
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $pwd_repeat = $_POST["pwd_repeat"]; // Capture re-entered password
    $email = $_POST["email"];

//Order is important//
    try{
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR HANDLERS
        $errors = [];

        //Check if the u,p, and e are empty
        if (is_input_empty($username, $pwd, $email, $pwd_repeat)) {
            $errors["empty_input"] = "Fill in ALL Fields!";
        }
        //Check if the email is valid
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid Email Used!";
        }
        //Check if the username is taken
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username Already Taken!";
        }
        //Check if the username is registered
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email Already Registered!";
        }
        // Check if passwords match
        if ($pwd !== $pwd_repeat) {
            $errors["pwd_mismatch"] = "Passwords do not match!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
        
            //You do not to repeat typing your user and email if there's an error
            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../signup.php");
            die();
        }

        create_user($pdo, $pwd, $username,  $email);
        header("Location: ../signup.php?signup=success");


        $pdo = null;
        $stmt = null;


        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../home/home.php");
    die();
}