<!DOCTYPE html>
<html>
<head>
    <title>To-Do List App</title>
    <link rel="icon" type="image/x-icon" href="resources/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
</head>
<body>
<div class="container">
    <h1>To-Do List</h1>
    <h2>Create New Record</h2>
    <form method="post" action="create.php">
        <div class="form-group">
            <label for="task">Task:</label>
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
        <?php
        include("config.php");
        $query = "SELECT * FROM tasks";
        $statement = $pdo->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($rows) {
            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['task'] . "</td>";
                echo "<td>" . $row['ts'] . "</td>";
                echo "<td>
                        <a href='update.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>
                        <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>List is Empty !!!</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', () => {
        navigator.serviceWorker.register('service-worker.js')
          .then(registration => {
            console.log('Service Worker registered:', registration);
          })
          .catch(error => {
            console.error('Service Worker registration failed:', error);
          });
      });
    }
  </script>
</body>
</html>
