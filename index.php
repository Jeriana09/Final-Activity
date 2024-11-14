<?php
include('db.php');

$stmt = $pdo->query("SELECT * FROM $table");
$reads = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>ToDoList</title>
    </head>
    <body>
        <form action = "add_task.php" method = "POST">
            <h2>To Do List Application</h2>
            
            <fieldset>
                <legend>Create Tasks</legend>
                
                <label for = "tasks">Input your tasks</label><br>
                <input type = "text" name = "task" required><br><br>
                
                <label for = "dates">Select Date</label><br>
                <input type = "date" name = "date"><br><br>
                
                <button type="submit">Add task</button>
            </fieldset>
        </form>
        
        <fieldset>
        <legend>My Task List</legend>
        
        <ul>
        <?php foreach($reads as $read): ?>
            <li>
                <?php echo htmlspecialchars($read['task']?? ''); ?><br>
                <?php echo htmlspecialchars($read['date']?? ''); ?><br>
            </li>
            <?php endforeach; ?>
        </ul>
        </fieldset>
    </body>
</html>