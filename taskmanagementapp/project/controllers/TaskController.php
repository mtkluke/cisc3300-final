<?php

require_once PROJECT_ROOT . '/models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct($pdo) {
        $this->taskModel = new Task($pdo);
    }

    // List all tasks
    public function listTasks() {
        $tasks = $this->taskModel->getAllTasks();
        ob_start();
        require PROJECT_ROOT . '/views/tasks/list.php';
        $content = ob_get_clean();
        require PROJECT_ROOT . '/views/layout.php';
    }

    // Add a new task
    public function addTask() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $deadline = $_POST['deadline'];

            if ($title && $deadline) {
                $this->taskModel->addTask($title, $description, $deadline);
                header('Location: /');
            } else {
                $error = "Title and Deadline are required!";
                ob_start();
                require PROJECT_ROOT . '/views/tasks/add.php';
                $content = ob_get_clean();
                require PROJECT_ROOT . '/views/layout.php';
            }
        } else {
            ob_start();
            require PROJECT_ROOT . '/views/tasks/add.php';
            $content = ob_get_clean();
            require PROJECT_ROOT . '/views/layout.php';
        }
    }

    // Edit a task (render the edit form)
    public function editTask($id) {
        $task = $this->taskModel->getTaskById($id);

        if ($task) {
            ob_start();
            require PROJECT_ROOT . '/views/tasks/edit.php'; // Render the edit form
            $content = ob_get_clean();
            require PROJECT_ROOT . '/views/layout.php';
        } else {
            http_response_code(404);
            echo "Task not found!";
        }
    }

    // Update an existing task
    public function updateTask() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id']);
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $deadline = $_POST['deadline'];

            if ($id && $title && $deadline) {
                $this->taskModel->updateTask($id, $title, $description, $deadline);
                header('Location: /');
            } else {
                $error = "All fields are required!";
                ob_start();
                require PROJECT_ROOT . '/views/tasks/edit.php';
                $content = ob_get_clean();
                require PROJECT_ROOT . '/views/layout.php';
            }
        } else {
            http_response_code(405); // Method Not Allowed
            echo "Invalid request method!";
        }
    }

    // Delete a task
    public function deleteTask($id) {
        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            echo json_encode(['error' => 'Invalid Task ID']);
            return;
        }

        $task = $this->taskModel->getTaskById($id);
        if ($task) {
            $this->taskModel->deleteTask($id);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Task not found']);
        }
    }
}
