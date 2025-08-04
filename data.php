<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "internship"; // Replace with your actual database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the last user entry
$sql = "SELECT * FROM intern_data ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo json_encode([
        "referral_code" => "N/A",
        "amount_raised" => "0"
    ]);
}

$conn->close();
?>
