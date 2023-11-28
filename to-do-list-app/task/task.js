// Handles requests from html to php
function addTask() {
    // Get the input value
    var taskInput = document.getElementById("taskInput");
    var taskText = taskInput.value;

    // Check if the input is not empty
    if (taskText.trim() !== "") {
        // Create a new task element
        var taskElement = document.createElement("div");
        taskElement.className = "task";
        taskElement.innerHTML = taskText + '<button onclick="removeTask(this)">Remove</button>';

        // Append the task element to the tasks container
        var tasksContainer = document.getElementById("tasks");
        tasksContainer.appendChild(taskElement);

        // Clear the input field
        taskInput.value = "";
    }
}

// Function to remove a task
function removeTask(button) {
    // Get the parent element (task) and remove it
    var taskElement = button.parentNode;
    taskElement.parentNode.removeChild(taskElement);
}