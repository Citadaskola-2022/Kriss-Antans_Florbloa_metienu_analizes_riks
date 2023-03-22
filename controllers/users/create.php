<?php

$db = new \SQLite3(ROOT. '/db/project.sqlite3');

$stmt = $db->prepare(<<<SQL
    INSERT INTO users (email, password)
    VALUES (:email, :password);
SQL);

$stmt->bindValue(':email', $_GET['email']);
$stmt->bindValue(':password', password_hash('password', PASSWORD_BCRYPT));

$stmt->execute();

header('Location: /');