<?
require_once __DIR__ ."/../connectDB.php"; //เรียกที่อยู่ของไฟล์connect

$db = new DB();
$conn = $db->connect();

$sqlInsert = "INSERT INTO tools_type
(tt_id,tt_name)
VALUES (
    '".$_REQUEST["tt_id"]."',
    '".$_REQUEST["tt_name"]."'
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