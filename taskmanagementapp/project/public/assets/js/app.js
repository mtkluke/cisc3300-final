// Function to handle form submissions dynamically using AJAX
function submitForm(event, formId, endpoint) {
    event.preventDefault();
    const form = document.getElementById(formId);
    const formData = new FormData(form);

    fetch(endpoint, {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Operation successful!');
                window.location.href = '/'; // Redirect to task list
            } else if (data.error) {
                alert(`Error: ${data.error}`);
            }
        })
        .catch(error => console.error('Error:', error));
}

// Function to dynamically populate the edit form
function loadEditForm(taskId) {
    fetch(`/api/task/${taskId}`)
        .then(response => response.json())
        .then(task => {
            if (task) {
                document.getElementById('edit-title').value = task.title;
                document.getElementById('edit-description').value = task.description;
                document.getElementById('edit-deadline').value = task.deadline;
                document.getElementById('edit-task-id').value = task.id;
            } else {
                alert('Task not found!');
            }
        })
        .catch(error => console.error('Error:', error));
}
//Function to handle deletion
function deleteTask(taskId) {
    if (!confirm("Are you sure you want to delete this task?")) {
        return;
    }

    fetch(`/delete?id=${taskId}`, { method: "GET" })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Task deleted successfully!");
                window.location.reload();
            } else if (data.error) {
                alert(`Error: ${data.error}`);
            }
        })
        .catch(error => console.error("Error:", error));
}
