
<?php
session_start();
include "../../config/database.php";

// Only admin users can access this page
if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
    header("location: ../../index.php?message=Subject Deleted Successfully");
    exit;
}

// Get and sanitize the subject ID
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if($id > 0) {
    // Delete query targeting the subjects table
    $sql = "DELETE FROM subjects WHERE id = $id";
    
    if(mysqli_query($conn, $sql)) {
        header("Location: index.php?message=Subject+deleted+successfully");
        exit;
    } else {
        header("Location: index.php?message=Error+deleting+subject");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>