<!DOCTYPE html>
<html>
<head>
    <title>To-Do List App</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>To-Do List</h1>
    <h2>Create New Record</h2>
    <form method="post" action="create.php">
        <div class="form-group">
            <label for="name">Task:</label>
            <input type="text" class="form-control" id="task" name="task" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    <h2>Tasks</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Task ID</th>
                <th>Task</th>
                <th>Timestamp</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
      //show function
</tbody>
    </table>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
