<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
    $task = $_POST['task'];

    try {
        $stmt = $pdo->prepare("INSERT INTO tasks (task) VALUES (:task)");
        $stmt->bindParam(':task', $task);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit(); 
        } else {
            echo "Error in data insertion: " . implode(", ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Task data not provided or invalid request.";
}
?>
