<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $taskId = $_GET['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $taskId);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit(); 
        } else {
            echo "Error in deleting task: " . implode(", ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request or task ID not provided.";
}
?>
