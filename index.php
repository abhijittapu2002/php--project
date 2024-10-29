<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Task Management Form</title>
</head>
<body>
<div class="container mt-5">
<div><a href="view.php" class="btn btn-success">View</a></div><br><br>
    <h2>Task Management Form</h2>
    <form action="save.php" method="POST">
        <div class="form-group">
            <label for="zone">Zone</label>
            <select class="form-control" id="zone" name="zone" required>
                <option value="">Select Zone</option>
                <option value="Important and Urgent">Important and Urgent</option>
                <option value="Not Important but Urgent">Not Important but Urgent</option>
                <option value="Important but not Urgent">Important but not Urgent</option>
                <option value="Not Important and not Urgent">Not Important and not Urgent</option>
            </select>
        </div>
        <div class="form-group">
            <label for="project">Project</label>
            <select class="form-control" name="project" id="project" required>
                <option value="">Select Project</option>
                <option value="project1">Project 1</option>
                <option value="project2">Project 2</option>
                <option value="project3">Project 3</option>
                <option value="project4">Project 4</option>
            </select>
        </div>

        <div class="form-group">
            <label for="activity">Activity</label>
            <input type="text" class="form-control" name="activity" id="activity" placeholder="Enter activity" required>
        </div>

        <div class="form-group">
            <label for="startDate">Start Date and Time</label>
            <input type="datetime-local" name="start_date" class="form-control" id="startDate" required>
        </div>

        <div class="form-group">
            <label for="endDate">End Date and Time</label>
            <input type="datetime-local" name="end_date" class="form-control" id="endDate" required>
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select class="form-control" name="priority" id="priority" required>
                <option value="">Select Priority</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status" required>
                <option value="">Select Status</option>
                <option value="in-progress">In Progress</option>
                <option value="to-start">To Start</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="remark">Remarks</label>
            <textarea class="form-control" name="remark" id="remark" rows="3" placeholder="Enter remarks"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
