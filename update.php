<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $taskId = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $taskId);
        $stmt->execute();
        $task = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($task) {
            ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Update Task</title>
                <link rel="icon" type="image/x-icon" href="resources/favicon.ico">
            </head>
            <body>
                <h1>Update Task</h1>
                <form method="post" action="update.php">
                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                    <label for="task">Task:</label>
                    <input type="text" name="task" value="<?php echo $task['task']; ?>">
                    <button type="submit" name="submit">Update</button>
                </form>
            </body>
            </html>
            <?php
        } else {
            echo "Task not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['task'])) {
    $taskId = $_POST['id'];
    $newTask = $_POST['task'];

    try {
        $stmt = $pdo->prepare("UPDATE tasks SET task = :task, ts = CURRENT_TIMESTAMP WHERE id = :id");
        $stmt->bindParam(':task', $newTask);
        $stmt->bindParam(':id', $taskId);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit(); 
        } else {
            echo "Error in updating task: " . implode(", ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
