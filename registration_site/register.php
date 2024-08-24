<?php
// Կապ՝ տվյալների բազայի հետ
$servername = "localhost";
$username = "root"; // Ստանդարտ օգտատեր
$password = ""; // Ստանդարտ գաղտնաբառ
$dbname = "user_db";

// Ստեղծել միացում
$conn = new mysqli($servername, $username, $password, $dbname);

// Ստուգել միացման սխալներ
if ($conn->connect_error) {
    die("Միացման սխալ: " . $conn->connect_error);
}

// Ստանալ տվյալները ձևից
$user = $_POST['username'];
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT); // Գաղտնաբառի հեշավորում

// Փոխանցել տվյալները տվյալների բազա
$sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Գրանցումը հաջողվեց!";
} else {
    echo "Սխալ կատարվեց. " . $conn->error;
}

$conn->close();
?>