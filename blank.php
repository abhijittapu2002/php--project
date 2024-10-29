<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Project Tracker</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .red {
            color: red;
        }
    </style>
</head>

<body>

    <h2>Project Tracker</h2>
    <div><a href="index.php" class="btn btn-info">Add Task</a></div><br><br>
    
    <table>
        <tr>
            <td>
                <table>
                    <tr id="red">
                        <th>Zone</th>
                        <th colspan="7">Important And Urgent</th>
                    </tr>
                    <tr class="red">
                        <th>SlN</th>
                        <th>Projects</th>
                        <th>Activities</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Remarks</th>
                    </tr>
                    <?php
                    include './connection.php';
                    $sql = "SELECT * FROM `project_table` WHERE `zone`='Important and Urgent'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $slno = 1;
                    foreach ($row as $project) {
                        ?>
                        <tr data-id="<?php echo $project['id']; ?>" class="clickable-row">
                            <td><?php echo $slno++; ?></td>
                            <td><?php echo htmlspecialchars($project['project']); ?></td>
                            <td><?php echo htmlspecialchars($project['activity']); ?></td>
                            <td><?php echo htmlspecialchars($project['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($project['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($project['status']); ?></td>
                            <td><?php echo htmlspecialchars($project['priority']); ?></td>
                            <td><?php echo htmlspecialchars($project['remark']); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </td>
            <td>
                <table>
                    <tr id="orange">
                        <th>Zone</th>
                        <th colspan="7">Not Important But Urgent</th>
                    </tr>
                    <tr class="red">
                        <th>SlN</th>
                        <th>Projects</th>
                        <th>Activities</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Remarks</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM `project_table` WHERE `zone`='Not Important but Urgent'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $slno = 1;
                    foreach ($row as $project) {
                        ?>
                        <tr data-id="<?php echo $project['id']; ?>" class="clickable-row">
                            <td><?php echo $slno++; ?></td>
                            <td><?php echo htmlspecialchars($project['project']); ?></td>
                            <td><?php echo htmlspecialchars($project['activity']); ?></td>
                            <td><?php echo htmlspecialchars($project['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($project['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($project['status']); ?></td>
                            <td><?php echo htmlspecialchars($project['priority']); ?></td>
                            <td><?php echo htmlspecialchars($project['remark']); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr id="lgreen">
                        <th>Zone</th>
                        <th colspan="7">Important But Not Urgent</th>
                    </tr>
                    <tr class="red">
                        <th>SlN</th>
                        <th>Projects</th>
                        <th>Activities</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Remarks</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM `project_table` WHERE `zone`='Important but not Urgent'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $slno = 1;
                    foreach ($row as $project) {
                        ?>
                        <tr data-id="<?php echo $project['id']; ?>" class="clickable-row">
                            <td><?php echo $slno++; ?></td>
                            <td><?php echo htmlspecialchars($project['project']); ?></td>
                            <td><?php echo htmlspecialchars($project['activity']); ?></td>
                            <td><?php echo htmlspecialchars($project['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($project['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($project['status']); ?></td>
                            <td><?php echo htmlspecialchars($project['priority']); ?></td>
                            <td><?php echo htmlspecialchars($project['remark']); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </td>
            <td>
                <table>
                    <tr id="dgreen">
                        <th>Zone</th>
                        <th colspan="7">Not Important And Not Urgent</th>
                    </tr>
                    <tr class="red">
                        <th>SlN</th>
                        <th>Projects</th>
                        <th>Activities</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Remarks</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM `project_table` WHERE `zone`='Not Important and not Urgent'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $slno = 1;
                    foreach ($row as $project) {
                        ?>
                        <tr data-id="<?php echo $project['id']; ?>" class="clickable-row">
                            <td><?php echo $slno++; ?></td>
                            <td><?php echo htmlspecialchars($project['project']); ?></td>
                            <td><?php echo htmlspecialchars($project['activity']); ?></td>
                            <td><?php echo htmlspecialchars($project['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($project['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($project['status']); ?></td>
                            <td><?php echo htmlspecialchars($project['priority']); ?></td>
                            <td><?php echo htmlspecialchars($project['remark']); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.clickable-row').dblclick(function () {
                var id = $(this).data('id');
                var project = $(this).find('td:nth-child(2)').text();
                var activity = $(this).find('td:nth-child(3)').text();
                var startDate = $(this).find('td:nth-child(4)').text();
                var endDate = $(this).find('td:nth-child(5)').text();
                var status = $(this).find('td:nth-child(6)').text();
                var priority = $(this).find('td:nth-child(7)').text();
                var remark = $(this).find('td:nth-child(8)').text();

                var url = 'update.php?id=' + encodeURIComponent(id) +
                    '&project=' + encodeURIComponent(project) +
                    '&activity=' + encodeURIComponent(activity) +
                    '&start_date=' + encodeURIComponent(startDate) +
                    '&end_date=' + encodeURIComponent(endDate) +
                    '&status=' + encodeURIComponent(status) +
                    '&priority=' + encodeURIComponent(priority) +
                    '&remark=' + encodeURIComponent(remark);

                window.location.href = url;
            });
        });
    </script>
</body>

</html>
