<?php
require('conndb.php');

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Username: " . $row["username"]. " Password " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>