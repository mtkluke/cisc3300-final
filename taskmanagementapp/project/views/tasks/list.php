<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luke's Task List</title>
    <link rel="stylesheet" href="/assets/styles/styles.css">
    <script src="/assets/js/app.js" defer></script>
</head>
<body>
    <header>
        <h1>Luke's Task Manager!</h1>
    </header>
    <main>
        <?php if (isset($tasks) && !empty($tasks)): ?>
            <h1>Task List</h1>
            <ul class="task-list">
                <?php foreach ($tasks as $task): ?>
                    <li class="task-item">
                        <div class="task-item-content">
                            <h3><?= htmlspecialchars($task['title']) ?></h3>
                            <p><?= htmlspecialchars($task['description']) ?></p>
                            <small>Deadline: <?= htmlspecialchars($task['deadline']) ?></small>
                        </div>
                        <div class="task-actions">
                            <a href="/edit?id=<?= $task['id'] ?>" class="button">Edit</a>
                            <button class="button delete-button" onclick="deleteTask(<?= $task['id'] ?>);">Delete</button>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href="/add" class="button">Add a New Task</a>
        <?php else: ?>
            <h1>No Tasks Found</h1>
            <p>You have no tasks at the moment. <a href="/add" class="button">Add your first task</a></p>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; <?= date("Y") ?> Made by Luke!</p>
    </footer>
</body>
</html>
