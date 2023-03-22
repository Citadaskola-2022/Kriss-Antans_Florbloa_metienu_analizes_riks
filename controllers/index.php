<?php

use Rakit\Validation\Validator;

$db = new \SQLite3('../db/project.sqlite3');

if ($_SERVER['REQUEST_METHOD']=== 'POST') {

    $validator = new Validator();
    $validation = $validator->make($_POST, [
        'player_id' => 'required|numeric',
        'pos_x' => 'required|numeric',
        'pos_y' => 'required|numeric',
    ]);

    $validation->validate();

    if ($validation->fails()) {

        view('views/index.php', [
            'error' => 'nepareizi ievadīti dati',
        ]);
        die();
    }

    $sql = <<<SQL
        INSERT INTO score_map (player_id, pos_x, pos_y) VALUES (:player, :x, :y)
    SQL;

    $stm = $db->prepare($sql);
    $stm->bindValue(':player', $_POST['player_id'], SQLITE3_INTEGER);
    $stm->bindValue(':x', $_POST['pos_x'], SQLITE3_INTEGER);
    $stm->bindValue(':y', $_POST['pos_y'], SQLITE3_INTEGER);
    $stm->execute();

    header ('location: /');
    die();
}

$players = \App\Player::getPlayers(1);

view('index.php', [
    'players' => $players,
]);
