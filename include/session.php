<?php
session_start(); // Ensure session is started

// Function to check if the user is logged in
function logged_in() {
    return isset($_SESSION['USERID']);
}

// Redirect to login page if not logged in
function confirm_logged_in() {
    if (!logged_in()) {
        header('Location: login.php');
        exit();
    }
}

// Function to check if a student is logged in
function studlogged_in() {
    return isset($_SESSION['IDNO']);
}

// Redirect to index page if student is not logged in
function studconfirm_logged_in() {
    if (!studlogged_in()) {
        header('Location: index.php');
        exit();
    }
}

// Set or get a session message
function message($msg = "", $msgtype = "") {
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
        $_SESSION['msgtype'] = $msgtype;
    } else {
        return isset($_SESSION['message']) ? $_SESSION['message'] : "";
    }
}

// Display session message
function check_message() {
    if (isset($_SESSION['message'])) {
        $msgtype = isset($_SESSION['msgtype']) ? $_SESSION['msgtype'] : "";
        $message = $_SESSION['message'];

        switch ($msgtype) {
            case "info":
                echo '<div class="alert alert-info">' . htmlspecialchars($message) . '</div>';
                break;
            case "error":
                echo '<div class="alert alert-danger">' . htmlspecialchars($message) . '</div>';
                break;
            case "success":
                echo '<div class="alert alert-success">' . htmlspecialchars($message) . '</div>';
                break;
        }

        unset($_SESSION['message']);
        unset($_SESSION['msgtype']);
    }
}

// Set or get the active key
function keyactive($key = "") {
    if (!empty($key)) {
        $_SESSION['active'] = $key;
    } else {
        return isset($_SESSION['active']) ? $_SESSION['active'] : "";
    }
}

// Set active status based on session or GET parameter
function check_active() {
    $active = isset($_SESSION['active']) ? $_SESSION['active'] : (isset($_GET['active']) ? $_GET['active'] : 'basicInfo');

    switch ($active) {
        case 'basicInfo':
            $_SESSION['basicInfo'] = "active";
            break;
        case 'otherInfo':
            $_SESSION['otherInfo'] = 'active';
            break;
        case 'work':
            $_SESSION['work'] = 'active';
            break;
        default:
            $_SESSION['basicInfo'] = "active";
            break;
    }
}
?>
