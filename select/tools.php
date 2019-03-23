<?php
require_once __DIR__ . "/../connectDB.php";

$db = new DB();

$conn = $db->connect();

$sql = "SELECT tt.tt_id as tools_type_id,
tt.tt_name as tools_type_name,
GROUP_CONCAT(t.tools_name,' ',t.amount-t.amount_borrow,' ',t.tools_id) as tools
FROM tools as t
INNER JOIN tools_type as tt
ON t.tt_id = tt.tt_id
GROUP BY t.tt_id";

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
