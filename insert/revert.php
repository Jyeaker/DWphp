<?php
require_once __DIR__ . "/../connectDB.php";

$db = new DB();
$conn = $db->connect();

$sqlInsert = "INSERT INTO revert
(borrow_id)
VALUES (
    '" . $_REQUEST["borrow_id"] . "'
)";

if ($conn->query($sqlInsert) === true) {
    $sqlUpdate = "UPDATE tools SET
            amount_borrow=amount_borrow-'" . $_REQUEST["amount"] . "'
            WHERE tools_id='" . $_REQUEST["tools_id"] . "'";
    if ($conn->query($sqlUpdate) === true) {
        $data["result"] = true;
    } else {
        $data["result"] = false;
        $data["resultMSG"] = $conn->error;
    }
} else {
    $data["result"] = false;
    $data["resultMSG"] = $conn->error;
}

$conn->close();
echo json_encode($data);
