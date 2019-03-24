<?php
require_once __DIR__ . "/../connectDB.php";

$db = new DB();
$conn = $db->connect();

$sqlInsert = "INSERT INTO student
(id, fname, lname, phone)
VALUES (
    '" . $_REQUEST["std_id"] . "',
    '" . $_REQUEST["fname"] . "',
    '" . $_REQUEST["lname"] . "',
    '" . $_REQUEST["phone"] . "'
)";

if ($conn->query($sqlInsert) === true) {
    $data["result"] = true;
} else {
    $data["result"] = false;
    $data["resultMSG"] = $conn->error;
}

$conn->close();
echo json_encode($data);
?>