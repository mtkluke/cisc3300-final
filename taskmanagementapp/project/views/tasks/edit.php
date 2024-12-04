<?php if (isset($task)): ?>
    <h1>Edit Task</h1>
    <form method="POST" action="/update-task">
        <!-- Hidden field to include the task ID -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= htmlspecialchars($task['description']) ?></textarea>

        <label for="deadline">Deadline:</label>
        <input type="date" id="deadline" name="deadline" value="<?= htmlspecialchars($task['deadline']) ?>" required>

        <button type="submit">Update Task</button>
    </form>
<?php else: ?>
    <h1>Task Not Found</h1>
    <p>The task you are trying to edit does not exist.</p>
<?php endif; ?>
