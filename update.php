<?php
// Include database connection
include './connection.php';

// Retrieve the project ID from the URL
$id = $_GET['id'] ?? '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve updated data from the form
    $zone = $_POST['zone'];
    $project = $_POST['project'];
    $activity = $_POST['activity'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $remark = $_POST['remark'];

    // Update the project in the database
    $sql = "UPDATE `project_table` SET 
            zone = ?, 
            project = ?, 
            activity = ?, 
            start_date = ?, 
            end_date = ?, 
            status = ?, 
            priority = ?, 
            remark = ? 
            WHERE id = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssssssi", $zone, $project, $activity, $start_date, $end_date, $status, $priority, $remark, $id);

    if ($stmt->execute()) {
        echo "<p class='alert alert-success'>Project updated successfully!</p>";
        header('Location: view.php');
    } else {
        echo "<p class='alert alert-danger'>Error updating project: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

// Fetch existing project details for the form
$sql = "SELECT * FROM `project_table` WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$projectData = $result->fetch_assoc();
$stmt->close();

$zone = $projectData['zone'] ?? '';
$project = $projectData['project'] ?? '';
$activity = $projectData['activity'] ?? '';
$start_date = $projectData['start_date'] ?? '';
$end_date = $projectData['end_date'] ?? '';
$status = $projectData['status'] ?? '';
$priority = $projectData['priority'] ?? '';
$remark = $projectData['remark'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Project</title>
</head>

<body>
    <div class="container mt-5">
        <div><a href="view.php" class="btn btn-success">View</a></div><br><br>
        <h2>Update Project</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="zone">Zone</label>
                <select class="form-control" id="zone" name="zone" required>
                    <option value="" disabled>Select Zone</option>
                    <option value="Important and Urgent" <?php echo $zone === 'Important and Urgent' ? 'selected' : ''; ?>>Important and Urgent</option>
                    <option value="Not Important but Urgent" <?php echo $zone === 'Not Important but Urgent' ? 'selected' : ''; ?>>Not Important but Urgent</option>
                    <option value="Important but not Urgent" <?php echo $zone === 'Important but not Urgent' ? 'selected' : ''; ?>>Important but not Urgent</option>
                    <option value="Not Important and not Urgent" <?php echo $zone === 'Not Important and not Urgent' ? 'selected' : ''; ?>>Not Important and not Urgent</option>
                </select>
            </div>

            <div class="form-group">
                <label for="project">Project</label>
                <select class="form-control" name="project" id="project" required>
                    <option value="" disabled>Select Project</option>
                    <option value="project1" <?php echo $project === 'project1' ? 'selected' : ''; ?>>Project 1</option>
                    <option value="project2" <?php echo $project === 'project2' ? 'selected' : ''; ?>>Project 2</option>
                    <option value="project3" <?php echo $project === 'project3' ? 'selected' : ''; ?>>Project 3</option>
                    <option value="project4" <?php echo $project === 'project4' ? 'selected' : ''; ?>>Project 4</option>
                </select>
            </div>

            <div class="form-group">
                <label for="activity">Activity</label>
                <input type="text" class="form-control" name="activity" id="activity"
                    value="<?php echo htmlspecialchars($activity); ?>" placeholder="Enter activity" required>
            </div>

            <div class="form-group">
                <label for="startDate">Start Date and Time</label>
                <input type="datetime-local" name="start_date" class="form-control" id="startDate"
                    value="<?php echo htmlspecialchars($start_date); ?>" required>
            </div>

            <div class="form-group">
                <label for="endDate">End Date and Time</label>
                <input type="datetime-local" name="end_date" class="form-control" id="endDate"
                    value="<?php echo htmlspecialchars($end_date); ?>" required>
            </div>

            <div class="form-group">
                <label for="priority">Priority</label>
                <select class="form-control" name="priority" id="priority" required>
                    <option value="" disabled>Select Priority</option>
                    <option value="1" <?php echo $priority === '1' ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo $priority === '2' ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo $priority === '3' ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo $priority === '4' ? 'selected' : ''; ?>>4</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="" disabled>Select Status</option>
                    <option value="in-progress" <?php echo $status === 'in-progress' ? 'selected' : ''; ?>>In Progress
                    </option>
                    <option value="to-start" <?php echo $status === 'to-start' ? 'selected' : ''; ?>>To Start</option>
                    <option value="completed" <?php echo $status === 'completed' ? 'selected' : ''; ?>>Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="remark">Remarks</label>
                <textarea class="form-control" name="remark" id="remark" rows="3"
                    placeholder="Enter remarks"><?php echo htmlspecialchars($remark); ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="view.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>