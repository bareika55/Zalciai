<?php

// Uzkraunam visus reikalingus failus
require '../config.php';
require ROOT . '/functions/html/builder.php';
require ROOT . '/functions/form/core.php';
require ROOT . '/functions/file.php';

$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'first_name' => [
            'label' => 'First name:',
            'type' => 'text',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ],
            ],
        ],
        'last_name' => [
            'label' => 'Last name:',
            'type' => 'text',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ],
            ],
        ],
        'email' => [
            'label' => 'Email:',
            'type' => 'email',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                    'validate_email_unique'
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
            'title' => 'Send',
            'extra' => [
                'attr' => [
                    'class' => 'blue-btn',
                ],
            ],
        ],
    ],
    'callbacks' => [
        'success' => 'form_success',
     //   'fail' => 'form_fail',
    ],
];

function validate_email_unique($field_input, &$field)
{
    $users = file_to_array(STORAGE_FILE);
    foreach ($users as $user_id => $user) {
        if ($user['email'] === $field_input) {
            $field['error'] = 'Toks email jau egzistuoja';
            return false;
        }
    }

    return true;
}

function form_success($filtered_input, &$form)
{
    $users = [];
    $user = $filtered_input;

    $users_in_file = file_to_array(STORAGE_FILE);
    if ($users_in_file) {
        $users = $users_in_file;
    }

    $users[] = $user;
    array_to_file($users, STORAGE_FILE);
    header("Location: login.php");
}

$filtered_input = get_form_input($form);
if (!empty($filtered_input)) {
        $success = validate_form($filtered_input, $form);
        if ($success) {
            $form = [];
            var_dump('Uzsiregistravai');
        }
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