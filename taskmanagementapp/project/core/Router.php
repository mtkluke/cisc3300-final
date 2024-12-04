<?php

require_once PROJECT_ROOT . '/core/setup.php';
require_once PROJECT_ROOT . '/controllers/TaskController.php';

$controller = new TaskController($pdo);

// Get the request URI without query parameters
$requestUri = strtok($_SERVER['REQUEST_URI'], '?');

// Routing
if ($requestUri === '/' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    // List all tasks
    $controller->listTasks();
} elseif ($requestUri === '/add' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    // Display the add task form
    $controller->addTask();
} elseif ($requestUri === '/add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add a new task
    $controller->addTask();
} elseif ($requestUri === '/edit' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    // Display the edit task form
    $taskId = $_GET['id'] ?? null;
    if ($taskId) {
        $controller->editTask($taskId);
    } else {
        echo "Task ID is required!";
    }
} elseif ($requestUri === '/update-task' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update a task
    $controller->updateTask();
} elseif ($requestUri === '/delete' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    // Delete a task
    $taskId = $_GET['id'] ?? null;
    if ($taskId) {
        $controller->deleteTask($taskId);
    } else {
        echo json_encode(['error' => 'Task ID is required']);
    }
} else {
    // 404 Not Found
    http_response_code(404);
    echo "Page not found!";
}
