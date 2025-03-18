<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        // Check if the username and password fields are empty
        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Fill in ALL Fields!";
        }

        // Fetch user from the database
        $result = get_user($pdo, $username);

        // Check if user exists
        if (!$result) {
            $errors["login_incorrect"] = "Incorrect Login INFO!";
        } else {
            // Check if the password is incorrect
            if (is_password_wrong($pwd, $result["pwd"])) {
                $errors["login_incorrect"] = "Incorrect Login INFO!";
            }
        }

        // Handle errors
        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../login.php");
            die();
        }

        // Successful login - create a new session ID
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        // Update session every 30 minutes
        $_SESSION["last_regeneration"] = time();

        header("Location: ../home/home.php?login=success");
        $pdo = null;
        $statement = null;
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../home/home.php");
    die();
}