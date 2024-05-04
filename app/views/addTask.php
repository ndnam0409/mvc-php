<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Task</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Add New Task</h2>
    <form id="addTaskForm" onsubmit="return validateForm()" action="/task-management/task/addTask" method="post">
        <div class="form-group">
            <label for="taskName">Task Name</label>
            <input type="text" class="form-control" id="taskName" name="taskName" required>
        </div>
        <div class="form-group">
            <label for="taskDescription">Description</label>
            <textarea class="form-control" id="taskDescription" name="taskDescription" required></textarea>
        </div>
        <div class="form-group">
            <label for="startDate">Start Date</label>
            <input type="date" class="form-control" id="startDate" name="startDate" required>
        </div>
        <div class="form-group">
            <label for="dueDate">Due Date</label>
            <input type="date" class="form-control" id="dueDate" name="dueDate" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.11/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function validateForm() {
    var name = document.getElementById('taskName').value;
    var description = document.getElementById('taskDescription').value;
    var startDate = document.getElementById('startDate').value;
    var dueDate = document.getElementById('dueDate').value;
    
    if (!name || !description || !startDate || !dueDate) {
        alert('Please fill out all required fields.');
        return false;
    }

    return true; 
}
</script>

</body>
</html>
