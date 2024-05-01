<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Overview</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Task Overview</h1>
    
    <!-- Search Form -->
    <div class="mb-3">
        <input type="text" id="searchInput" onkeyup="searchTasks()" placeholder="Search for tasks.." class="form-control">
    </div>

    <!-- Task Table -->
    <form id="taskForm">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th><input type="checkbox" id="selectAll" onclick="selectAllTasks(this)"></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>Due Date</th>
                    <th>Finish Date</th>
                    <th>Status</th>
                    <th>Category ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="taskTableBody">
                <?php foreach ($data as $task): ?>
                    <tr>
                        <td><input type="checkbox" class="taskCheckbox" value="<?= htmlspecialchars($task['id']); ?>"></td>
                        <td><?= htmlspecialchars($task['id']); ?></td>
                        <td><?= htmlspecialchars($task['name']); ?></td>
                        <td><?= htmlspecialchars($task['description']); ?></td>
                        <td><?= htmlspecialchars($task['start_date']); ?></td>
                        <td><?= htmlspecialchars($task['due_date']); ?></td>
                        <td><?= htmlspecialchars($task['finish_date'] ?? 'N/A'); ?></td>
                        <td><?= htmlspecialchars($task['status']); ?></td>
                        <td><?= htmlspecialchars($task['category_id']); ?></td>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Added me-3 to add space on the right side of the Edit button -->
                                <a href="/task-management/task/editTask/<?= $task['id']; ?>" class="btn btn-primary btn-sm me-3">Edit</a>
                                <button type="button" onclick="deleteTask(<?= $task['id']; ?>)" class="btn btn-danger btn-sm">Delete</button>
                            </div>
                        </td>


                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="button" onclick="deleteSelectedTasks()" class="btn btn-danger">Delete Selected</button>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
// Search Tasks Function
function searchTasks() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("taskTableBody");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2]; // Assumes the 'Name' column is the third column
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}

// Select All Tasks Function
function selectAllTasks(source) {
    checkboxes = document.getElementsByClassName('taskCheckbox');
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
    }
}

// Delete Task Function
function deleteTask(taskId) {
    if (!confirm('Are you sure you want to delete this task?')) return;

    fetch(`/task-management/task/delete/${taskId}`, {
        method: 'POST', // Assuming your backend looks for POST requests
        headers: {
            'Content-Type': 'application/json',
            // 'X-CSRF-Token': csrfToken // include this if you need to handle CSRF protection
        },
        body: JSON.stringify({ id: taskId })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Or 'response.text()' if the response is not JSON
    })
    .then(data => {
        // This is where you would handle a successful response
        window.location.reload(); // or redirect to the task list
    })
    .catch(error => {
        // Handle any errors here
        console.error('Error:', error);
    });
}

// Delete Selected Tasks Function
function deleteSelectedTasks() {
    let selectedTasks = document.querySelectorAll('.taskCheckbox:checked');
    let taskIds = Array.from(selectedTasks).map(checkbox => checkbox.value);

    if (taskIds.length === 0 || !confirm('Are you sure you want to delete the selected tasks?')) return;

    fetch(`/task-management/task/deleteMultiple`, {
        method: 'POST', // Again, assuming your backend looks for POST requests
        headers: {
            'Content-Type': 'application/json',
            // 'X-CSRF-Token': csrfToken // include this if you need to handle CSRF protection
        },
        body: JSON.stringify({ ids: taskIds })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Or 'response.text()' if the response is not JSON
    })
    .then(data => {
        // This is where you would handle a successful response
        window.location.reload(); // or redirect to the task list
    })
    .catch(error => {
        // Handle any errors here
        console.error('Error:', error);
    });
}


</script>

</body>
</html>
