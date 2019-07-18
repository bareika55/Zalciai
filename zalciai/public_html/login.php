<?php

// Uzkraunam visus reikalingus failus
require '../config.php';
require ROOT . '/functions/html/builder.php';
require ROOT . '/functions/form/core.php';
require ROOT . '/functions/file.php';

session_start();

$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'email' => [
            'label' => 'Email:',
            'type' => 'email',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ],
            ],
        ],
        'password' => [
            'label' => 'Password:',
            'type' => 'password',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ],
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Login To Page',
            'extra' => [
                'attr' => [
                    'class' => 'blue-btn',
                ],
            ],
        ],
    ],
    'validators' => [
            'validate_login'
    ],
    'callbacks' => [
        'success' => 'form_success',
     //   'fail' => 'form_fail',
    ],
];

// VALIDATING EMAIL INPUT
function validate_login($filtered_input, &$fields, &$form)
{
    $users = file_to_array(STORAGE_FILE);
    $entered_email = $filtered_input['email'];
    $entered_pass = $filtered_input['password'];

    foreach ($users as $user_id => $user) {
        if ($user['email'] == $entered_email && $user['password'] == $entered_pass) {
            return true;
        }
    }

    $fields['email']['error'] = 'Patikrink email';
    $fields['password']['error'] = 'Patikrink password';

    return false;
}

function form_success($filtered_input, &$form)
{
    $_SESSION = $filtered_input;
    header("Location:login-success.php");

}


$filtered_input = get_form_input($form);
if (!empty($filtered_input)) {
    $success = validate_form($filtered_input, $form);
}


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
<?php require ROOT . '/templates/form.tpl.php'; ?>

</body>
</html>