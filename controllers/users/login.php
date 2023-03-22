<?php

use Rakit\Validation\Validator;

$db = new \SQLite3(ROOT. '/db/project.sqlite3');

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // composer require "rakit/validation"

    $validator = new Validator();
    $validation = $validator->make($_POST, [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);

    $validation->validate();

    $errors = [];

    if ($validation->fails()) {
        $errors = $validation->errors()->toArray();
    } else {
        $stmt = $db->prepare("SELECT * FROM users WHERE email =:email");
        $stmt->bindValue(':email', $_POST['email']);
        $result = $stmt->execute();

        $test = $result->fetchArray();

        if (password_verify($_POST['password'], PASSWORD_BCRYPT)) {
            $errors = ['password' => ['required' => 'Wrong password']];
        }
    }

    if (!empty($errors)) {
        view('login/index.view.php', [
            'errors' => $errors
        ]);
        die();
    }

    header('Location: /');
}

view('login/index.view.php');