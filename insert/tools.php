<?php
require_once __DIR__ . "/../connectDB.php";

$db = new DB();
$conn = $db->connect();

$sqlInsert = "INSERT INTO tools
(tools_id, tools_name, tt_id, amount)
VALUES (
    '" . $_REQUEST["t_id"] . "',
    '" . $_REQUEST["t_name"] . "',
    '" . $_REQUEST["tt_id"] . "',
    '" . $_REQUEST["amount"] . "'
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