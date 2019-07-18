<?php

// Uzkraunam visus reikalingus failus
require '../config.php';
require ROOT . '/functions/html/builder.php';
require ROOT . '/functions/form/core.php';
require ROOT . '/functions/file.php';


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To PHP FightClub!</title>
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="media/js/app.js"></script>
</head>
<body>
<!-- $nav Navigation generator -->
<?php require ROOT . '/templates/navigation.tpl.php'; ?>
<h1>
    Welcome to the GAME !!!
</h1>

<div class="welcome-picture" style="text-align: center;">
    <img src="https://media0.giphy.com/media/H6oV7ZbFYSTlvoG0R5/giphy.gif" alt="succesful">
</div>
<a href="logout.php">Logout</a>
<?php if (isset($message)): ?>
    <div class="message">
        <span class="text"><?php print $message; ?></span>
        <span class="close">X</span>
    </div>
<?php endif; ?>

</body>
</html>