<?php

ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

// Initialize the last regeneration time if not already set.
if (!isset($_SESSION["last_regeneration"])) {
    $_SESSION["last_regeneration"] = time();
}

if (isset($_SESSION["user_id"])) {
    $interval = 60 * 30; // 30 minutes
    // Check if session needs regeneration for logged-in users.
    if (time() - $_SESSION["last_regeneration"] >= $interval) {
        regenerate_session_id_loggedin();
    }
} else {
    $interval = 60 * 30; // 30 minutes
    // Check if session needs regeneration for non-logged-in users.
    if (time() - $_SESSION["last_regeneration"] >= $interval) {
        regenerate_session_id();
    }
}

function regenerate_session_id_loggedin() 
{
    // Regenerate the session ID and delete the old session file.
    session_regenerate_id(true);

    // Store the new regeneration time.
    $_SESSION["last_regeneration"] = time();
}

function regenerate_session_id() 
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}
