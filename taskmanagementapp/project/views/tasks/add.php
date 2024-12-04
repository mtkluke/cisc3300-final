<h1>Add a New Task</h1>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form method="POST" action="/add">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" placeholder="Enter task title" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Enter task description"></textarea>

    <label for="deadline">Deadline:</label>
    <input type="date" id="deadline" name="deadline" required>

    <button type="submit">Add Task</button>
</form>
