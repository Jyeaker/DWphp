<?php
require_once __DIR__ . "/../connectDB.php";

$db = new DB();
$conn = $db->connect();

$sql = "SELECT *
FROM tools as t";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = null;
}

$json_return["result"] = $data;
$json_return["length"] = $result->num_rows;

$conn->close();
echo json_encode($json_return);
?>