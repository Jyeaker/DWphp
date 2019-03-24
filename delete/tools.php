<?php
require_once __DIR__ . "/../connectDB.php";

$db = new DB();
$conn = $db->connect();

$sql = "DELETE FROM tools WHERE tools_id='" . $_REQUEST["id"] . "'";

if ($conn->query($sql) === TRUE) {
    $data["result"] = true;
} else {
    $data["result"] = false;
    $data["resultMSG"] = $conn->error;
}

$conn->close();
echo json_encode($data);