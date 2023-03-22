<?php

$db = new \SQLite3('../db/project.sqlite3');

$stmt = $db->prepare(<<<SQL
    SELECT * FROM score_map 
--     WHERE team_id = :teamId
    WHERE player_id = :playerId
SQL);
$stmt->bindValue(':teamId', 1);
$stmt->bindValue(':playerId', 1);

$res = $stmt->execute();



$data = [];

while($row = $res->fetchArray()) {
    $data[] = [$row['pos_x'], $row['pos_y']];
}

view('results.php', [
    'data' => $data
]);