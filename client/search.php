
<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "legal_savannah";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve location entered by the user
$location = $_GET['location'];

// Query database for lawyers in the specified location
$sql = "SELECT * FROM advocate WHERE advaddress LIKE '%$location%'";
$result = $conn->query($sql);

// Check if any lawyers are found
if ($result->num_rows > 0) {
  // Display the list of lawyers
  echo "<h2>Lawyers in $location:</h2>";
  echo "<ul>";
  while($row = $result->fetch_assoc()) {
    echo "<li>" . $row["advname"] . "</li>";
  }
  echo "</ul>";
} else {
  // Notify the user if no lawyers are found
  echo "<p>No lawyers found in $location.</p>";
}


$conn->close();

?>