<?php
session_start();
include 'db.php';

// Check if the user is logged in and is a landlord
if (!isset($_SESSION['loggedin']) || $_SESSION['user_type'] != 'landlord') {
    header("Location: index.html");
    exit;
}

// Initialize variables for error handling
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the form
    $property_type = $_POST['property_type'];
    $tenant_name = $_POST['tenant_name'];
    $tenant_email = $_POST['tenant_email'];
    $tenant_mobile = $_POST['tenant_mobile'];
    $landlord_name = $_POST['landlord_name'];
    $landlord_address = $_POST['landlord_address'];
    $landlord_email = $_POST['landlord_email'];
    $landlord_mobile = $_POST['landlord_mobile'];
    $minimum_notice = $_POST['minimum_notice'];
    $property_address = $_POST['property_address'];
    $move_in_date = $_POST['move_in_date'];
    $move_out_date = $_POST['move_out_date'];
    $rent_amount = $_POST['rent_amount'];
    $deposit_amount = $_POST['deposit_amount'];

    // SQL to insert data into the leaseagreement table
    // Use prepared statements for security
    $stmt = $conn->prepare("INSERT INTO leaseagreements (property_type, tenant_name, tenant_email, tenant_mobile, landlord_name, landlord_address, landlord_email, landlord_mobile, minimum_notice, property_address, move_in_date, move_out_date, rent_amount, deposit_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssssssssd", $property_type, $tenant_name, $tenant_email, $tenant_mobile, $landlord_name, $landlord_address, $landlord_email, $landlord_mobile, $minimum_notice, $property_address, $move_in_date, $move_out_date, $rent_amount, $deposit_amount);

    if ($stmt->execute()) {
        // Redirect to landlord.html after successful creation
        header("Location: Landlord.php");
        exit;
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>