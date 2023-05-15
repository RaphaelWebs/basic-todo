<?php
require_once 'includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Raphael's Unoriginal To-Do list</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
    <script src="scripts.js"></script>  
    <script src="https://unpkg.com/@dotlottie/player-component@1.0.0/dist/dotlottie-player.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<link rel="apple-touch-icon" sizes="180x180" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/favicon-16x16.png">
<link rel="mask-icon" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/safari-pinned-tab.svg" color="#1f487e">
</head>
<body>



   <div class="main-section">
    <h1>The Millionth To-Do App You've Seen</h1>
    <h2>Literally nothin' special here</h2>
    

    

</dotlottie-player>
    
    
    <div class="add-section">
        <form action="functions/add.php" method="POST" autocomplete="off">
            <?php if(isset($_GET['status']) && $_GET['status'] == 'error') {
                echo '<input class="type-bar error-bar" type="text" name="title" placeholder="YOU NEED TO FILL ME UP! 😡"  maxlength="100">';
            } else {
            echo '<input class="type-bar" type="text" name="title"  placeholder="Fill me up with a to-do 😉" maxlength="100">';
        } ?>
            <button class="add-button" type="submit" aria-label="Add note"> <svg viewBox="0 96 960 960" aria-hidden="true"><path d="M450 856V606H200v-60h250V296h60v250h250v60H510v250h-60Z"/></svg></button>
        </form>
    </div>
    
    <?php 
    
    $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");    
       ?>


    <div class="show-todo-section">
        <?php if($todos->rowCount() <= 0) { ?>
        <div class="empty">
            <h2 style="margin-bottom:0.5em">You have nothing to do</h2>
            <h3>Please write a new to-do</h3>
            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_27cgfczo.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
         
        </div>

        <?php } ?>

<?php if(!$todos->rowCount() <= 0) { ?>
        <ul class="todo-list">
 <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
        <li class="todo-item">

          <label class="<?php echo ($todo['checked']) ? "checked" : "" ?>">  <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo['id']; ?>" <?php echo ($todo['checked']) ? "checked" : "" ?>/>
            <p><?php echo $todo['title'] ?></p></label>
            <small>Created: <?php echo $todo['date_time'] ?></small>
            <span id="<?php echo $todo['id']; ?>" class="remove-to-do" aria-label="Delete item"><svg  viewBox="0 96 960 960"  aria-hidden="true"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></span>
 </li>
        <?php } ?>
 </ul>
 <?php } ?>
    </div>
   </div>
    

</body>
</html>