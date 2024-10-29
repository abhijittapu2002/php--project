<?php
include './connection.php';

$zone = $_REQUEST['zone'];
$project = $_REQUEST['project'];
$activity = $_REQUEST['activity'];
$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$priority = $_REQUEST['priority'];
$status = $_REQUEST['status'];
$remark = $_REQUEST['remark'];
$table_query = "SHOW TABLES LIKE 'project_table'";
$result = mysqli_query($con, $table_query);
if (mysqli_num_rows($result) == 0) {
    $createTableSql = "CREATE TABLE `project_table` (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        activity VARCHAR(255) NOT NULL,
        zone VARCHAR(255) NOT NULL,
        project VARCHAR(255) NOT NULL,
        start_date DATETIME NOT NULL,
        end_date DATETIME NOT NULL,
        priority INT(1) NOT NULL,
        status VARCHAR(50) NOT NULL,
        remark TEXT
    )";
    if (!mysqli_query($con, $createTableSql)) {
        die('Error creating table: ' . mysqli_error($con));
    }
}
$insert_query = "INSERT INTO project_table (activity, zone, project, start_date, end_date, priority, status, remark) 
        VALUES ('$activity', '$zone', '$project', '$start_date', '$end_date', '$priority', '$status', '$remark')";
if (mysqli_query($con, $insert_query)) {
    header('Location: view.php');
} else {
    die('Error: ' . mysqli_error($con));
}


