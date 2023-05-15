bai<?php

    if (isset($_POST['id'])) {
        // Database connection
        require '../includes/connection.php';

        $id = $_POST['id'];


        if (empty($id)) {
            // Check if there's and id
            echo 0;
        } else {
            // Delete from the database
            $stmt = $conn->prepare("DELETE FROM todos WHERE id=?");
            $res = $stmt->execute([$id]);

            // I'm Topher
            if ($res) {
                echo 1;
            } else {
                echo 0;
            }

            $conn = null;
            exit();
        }
    } else {
        // Catch error
        header("Location: ../?status=error");
    }
