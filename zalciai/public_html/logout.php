<?php

// Uzkraunam visus reikalingus failus
require '../config.php';
require ROOT . '/functions/html/builder.php';
require ROOT . '/functions/form/core.php';
require ROOT . '/functions/file.php';


session_start();
unset($_SESSION);
session_destroy();
session_unset();
setcookie (session_id(), null, -1);

header('Location: login.php');
die;

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
    Welcome to the GAME!!!
</h1>
<?php if (isset($message)): ?>
    <div class="message">
        <span class="text"><?php print $message; ?></span>
        <span class="close">X</span>
    </div>
<?php endif; ?>

<!-- $form HTML generator -->


</body>
</html>