<?php
/*
    

    
<!-- Jean Pierre NIYONSHUTI        REG_NO:  222003223  -->
 <!--  to fit the better appearence was summarized to be AR Platiform -->


*/



// Include database connection file
require_once "config.php";
$tableName = $_POST['tableName'];


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tableData = "";
$result = $conn->query("SELECT * FROM $tableName");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tableData .= implode(", ", $row) . "\n";
    }
} else {
    $tableData = "No data found in the table.";
}

$conn->close();
echo $tableData;
?>
