<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <?php if (isset($data['task']) && is_array($data['task'])): ?>
            <h2 class="mb-4">Edit Task</h2>
            <form action="/task-management/task/editTask/<?= htmlspecialchars($data['task']['id']); ?>" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($data['task']['id']); ?>">

                <div class="form-group">
                    <label for="name">Task Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($data['task']['name']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($data['task']['description']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Chưa hoàn thành" <?= $data['task']['status'] == 'Chưa hoàn thành' ? 'selected' : ''; ?>>Chưa hoàn thành</option>
                        <option value="Đang tiến hành" <?= $data['task']['status'] == 'Đang tiến hành' ? 'selected' : ''; ?>>Đang tiến hành</option>
                        <option value="Hoàn thành" <?= $data['task']['status'] == 'Hoàn thành' ? 'selected' : ''; ?>>Hoàn thành</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="<?= htmlspecialchars($data['task']['start_date']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date:</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" value="<?= htmlspecialchars($data['task']['due_date']); ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Task</button>
            </form>
        <?php else: ?>
            <div class="alert alert-danger">Task data is not available.</div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
