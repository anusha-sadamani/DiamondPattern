<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $task= $_POST["task"];
           $errors = array();
           if empty($task) {
            array_push($errors," Enter the task");
           }
           require_once "database.php";
           
           $sql = "INSERT INTO list (task) VALUES ( ?)";
           $stmt = mysqli_stmt_init($conn);
           $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
           if ($prepareStmt) {
               mysqli_stmt_bind_param($stmt,"s",$task);
               mysqli_stmt_execute($stmt);

               die("Something went wrong");
           }
          }


        ?> 
         <form action="index.php" method="post">  
        <div class="todo-app">

            <h2>To-Do List</h2>

            <div class="row">
                <input type="text" name="" id="input-box" placeholder="Add your Text">
                <button onclick="addTask()">Add Task</button>
            </div>

            <ul id="list-container">
                <!-- <li class="checked">Task 1</li>
                <li>Task 2</li>
                <li>Task 3</li> -->
            </ul>
        </div>
        </form>
        
    </div>
    <script src="script.js"></script>
</body>
</html>