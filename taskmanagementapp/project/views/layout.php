<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="/assets/styles/styles.css">
</head>
<body>
    <header>
        <h1>Task Manager</h1>
    </header>
    <main>
        <?php if (isset($content)) {
            echo $content; // Insert page-specific content
        } ?>
    </main>
</body>
</html>
