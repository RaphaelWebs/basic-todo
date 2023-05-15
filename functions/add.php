<?php

if(isset($_POST['title'])) {
    // Database connection
    require '../includes/connection.php'; 

    $title = $_POST['title'];
    
 
    if(empty($title)) {
        // Check if title is empty
        header("Location: ../?status=error");
    } else {
        // Add todo to the database
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE (?)");
        $res = $stmt->execute([$title]);

        // I apologize for the nested conditions, I promise I'm usually not like this. I'm well aware guard clauses exist.
        if($res) {
            header("Location: ../?status=success");
        } else {
            header("Location: ../");
        }

        $conn = null;
        exit();


    } 
    
   
} else {
     // Catch error
    header("Location: ../?status=error"); 
}
