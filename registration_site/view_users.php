<?php
// Կապ՝ տվյալների բազայի հետ
$servername = "localhost";
$username = "root"; // Ստանդարտ օգտատեր
$password = ""; // Ստանդարտ գաղտնաբառ
$dbname = "user_db"; // Տվյալների բազայի անունը

// Ստեղծել միացում
$conn = new mysqli($servername, $username, $password, $dbname);

// Ստուգել միացման սխալներ
if ($conn->connect_error) {
    die("Միացման սխալ: " . $conn->connect_error);
}

// Ստանալ բոլոր գրանցված տվյալները
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Տպել տվյալները
    echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Password</th></tr>";
    while($row = $result->fetch_assoc()) {
        // Ստուգեք, որ դաշտերը գոյություն ունեն
        $id = isset($row["id"]) ? $row["id"] : "N/A";
        $username = isset($row["username"]) ? $row["username"] : "N/A";
        $password = isset($row["password"]) ? $row["password"] : "N/A";
        
        echo "<tr><td>$id</td><td>$username</td><td>$password</td></tr>";
    }
    echo "</table>";
} else {
    echo "Տվյալներ չկան";
}

$conn->close();
?>