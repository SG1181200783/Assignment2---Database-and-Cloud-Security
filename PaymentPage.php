<?php
// Include DB config
define('DB_SERVER', 'crud-db.cr4kozvtstto.us-east-1.rds.amazonaws.com');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'admin1234!');
define('DB_DATABASE', 'sample');

// Connect to DB
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Create
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $payer = $_POST['payer'];
    $amount = $_POST['amount'];
    $conn->query("INSERT INTO payments (payer, amount) VALUES ('$payer', '$amount')");
    header("Location: PaymentPage.php");
    exit;
}

// Handle Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $payer = $_POST['payer'];
    $amount = $_POST['amount'];
    $conn->query("UPDATE payments SET payer='$payer', amount='$amount' WHERE id=$id");
    header("Location: PaymentPage.php");
    exit;
}




?>

