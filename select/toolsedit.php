<?php
require_once __DIR__ . "/../connectDB.php";

$db = new DB();
$conn = $db->connect();

$sqlUpdate = "UPDATE tools
SET tools_name='" . $_REQUEST["t_name"] . "',
amount='" . $_REQUEST["amount"] . "' 
WHERE tools_id='" . $_REQUEST["t_id"] . "'";

if ($conn->query($sqlUpdate) === TRUE) {
    $data["result"] = true;
} else {
    $data["result"] = false;
    $data["resultMSG"] = $conn->error;
}

$json_return["result"] = $data;
$json_return["length"] = $result->num_rows;

$conn->close();
echo json_encode($data);