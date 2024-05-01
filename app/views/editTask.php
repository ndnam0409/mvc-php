<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Task #<?= htmlspecialchars($task['id']); ?></h2>
    <form action="/task-management/task/update/<?= $task['id']; ?>" method="post">
        <div class="mb-3">
            <label for="taskName" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="taskName" name="name" value="<?= htmlspecialchars($task['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="taskDescription" class="form-label">Description</label>
            <textarea class="form-control" id="taskDescription" name="description" required><?= htmlspecialchars($task['description']); ?></textarea>
        </div>
        <!-- Include other fields like start date, due date, etc. -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="TODO" <?= $task['status'] == 'TODO' ? 'selected' : ''; ?>>To Do</option>
                <option value="IN_PROGRESS" <?= $task['status'] == 'IN PROGRESS' ? 'selected' : ''; ?>>In Progress</option>
                <option value="FINISHED" <?= $task['status'] == 'FINISHED' ? 'selected' : ''; ?>>Finished</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="/task-management/task/get" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
