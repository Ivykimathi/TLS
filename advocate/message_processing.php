<?php
// your_php_script.php

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the sender and message from the request body
    $data = json_decode(file_get_contents('php://input'), true);
    $sender = $data['sender'];
    $message = $data['message'];
    $username = $data['username']; // Assuming you get the username from the client

    // Connect to your database (replace with your database credentials)
    $conn = new mysqli("localhost", "root", "", "legal_savannah");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and execute SQL statement to insert message into the database
    // Check if there are existing records for the client and advocate
    $stmt_check = $conn->prepare("SELECT * FROM messaging WHERE client = ? AND advocate = ?");
    $stmt_check->bind_param("ss", $username, $advname);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // If records exist, update the existing data
        $stmt_update = $conn->prepare("UPDATE messaging SET advocate_message = ? WHERE client = ? AND advocate = ?");
        $stmt_update->bind_param("sss", $message, $username, $advname);
        $stmt_update->execute();
        $stmt_update->close();
    } else {
        // If no records exist, insert new data
        $stmt_insert = $conn->prepare("INSERT INTO messaging (client, advocate, advocate_message) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("sss", $username, $advname, $message);
        $stmt_insert->execute();
        $stmt_insert->close();
    }

    // Close statement and database connection
    $stmt_check->close();
    $conn->close();

    // Echo a response (optional)
    echo json_encode(['status' => 'success']);
} 
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Connect to your database (replace with your database credentials)
    $conn = new mysqli("localhost", "root", "", "legal_savannah");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and execute SQL statement to fetch messages for the advocate
    $stmt = $conn->prepare("SELECT client, client_message FROM messaging WHERE advocate = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Display messages
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>{$row['client']}: {$row['client_message']}</p>";
        }
    } else {
        echo "<p>No messages available</p>";
    }
    
    // Close statement and database connection
    $stmt->close();
    $conn->close();
} 
else {
    // Return an error response if the request method is neither POST nor GET
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method Not Allowed']);
}
?>
