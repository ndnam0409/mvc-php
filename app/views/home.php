<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Task Management System</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="#">Task Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto d-flex justify-content-right" style="width: 100%;"> <!-- Adjusted classes and inline style -->
        <a class="nav-item nav-link" href="/task-management/task/addTask">New Task</a>
        <a class="nav-item nav-link" href="/task-management/task/viewAllTask">Task List</a>
        </div>
    </div>
</nav>


<!-- Main Content -->
<div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="jumbotron text-center">
        <h1>Welcome to Task Management System</h1>
        <p class="lead">Manage your tasks efficiently and effectively.</p>
        <p>Click on the tasks to add new tasks, view the task list, and manage categories.</p>
    </div>
</div>


<!-- Bootstrap JS, Popper.js, and jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.11/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
