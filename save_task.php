<?php

include('db.php');

if (isset($_POST['save_task'])){
    // DATA
    $title = $_POST['title'];
    $description = $_POST['description'];

    // QUERY
    $query = "INSERT INTO tasks(title, description) VALUES ('$title', '$description')";
    
    $result = mysqli_query($conn, $query);
    if (!isset($result)){
        die("Query Failed");
    } 

    $_SESSION['message'] = 'Task Saved Successfully';
    $_SESSION['message_type'] = 'success';

    header("location: index.php");

}

?>