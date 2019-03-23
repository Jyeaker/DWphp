<?php
require_once __DIR__ . "/../connectDB.php";

$db = new DB();

$conn = $db->connect();

$sql = "SELECT 	bo.id as borrowId,
                bo.amount as borrowAmount ,
                bo.date as borrowDate,
                s.id as std_id,
                s.fname as fname,
                s.lname as lname,
                t.tools_id as toolsId,
                t.tools_name as toolsName
        FROM borrow as bo
        INNER JOIN student as s
        ON bo.std_id = s.id
        INNER JOIN tools as t
        ON t.tools_id = bo.tools_id
        WHERE NOT bo.id = ANY
        (SELECT re.borrow_id FROM revert as re
        GROUP BY re.borrow_id) 
        AND bo.std_id = '" . $_REQUEST["std_id"] . "'";

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
