<?php
include('db.php');

$id=$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM $table WHERE id = ?");
$stmt->execute([$id]);
$updates = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $task = $_POST['task'];
    $date = $_POST['date'];
    
    $stmtupdater = $pdo->prepare("UPDATE $table SET task = ?, date = ? WHERE id = ?");
    $stmtupdater->execute([$task, $date, $id]);
    
    header("Location: index.php");
    
}
?>
<DOCTYPE html>
<html>
    <head>
        <title>ToDoList</title>
    </head>
    <body>
        <form method = "POST">
            <h2>Update To Do List</h2>
            
            <fieldset>
                <legend>Create Tasks</legend>
                
                <label for = "tasks">Input your tasks</label><br>
                <input type = "text" name = "task" value="<?php echo htmlspecialchars($updates['task']?? ''); ?>"><br><br>
                
                <label for = "dates">Select Date</label><br>
                <input type = "date" name = "date" value="<?php echo htmlspecialchars($updates['date']?? ''); ?>"><br><br>
                <button type="submit">Update task</button>
            </fieldset>
        </form>
        </body>
        </html>