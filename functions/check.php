<?php

if(isset($_POST['id'])) {
    // Database connection
    require '../includes/connection.php'; 

    $id = $_POST['id'];
    
 
    if(empty($id)) {
        // Check if the id is empty
        echo 'error';
    } else {
        // Changed checked status in the database
        $todos = $conn->prepare("SELECT id, checked FROM todos WHERE id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['id'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $conn->query("UPDATE todos SET checked=$uChecked WHERE id=$uId");


        // I'm Topher
        if($res) {
           echo $checked;
        } else {
            echo 'error';
        }

        $conn = null;
        exit();


    } 
    
   
} else {
    // Catch error
    header("Location: ../?status=error"); 
}
