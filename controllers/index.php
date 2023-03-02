<?php

$db = new \SQLite3('../db/project.sqlite3');

$result = $db->query("SELECT * FROM players WHERE team_id =1");
 class Player{
     public function __construct(
         public int $number,
         public string $name,
         public string $surname,
     )
     {}

     public function __toString(): string
     {
         return sprintf('#%d (%s. %s)', $this->number, $this->name, $this->surname);
     }
 }

$players = [];
while ($row = $result ->fetchArray()){
    $players[] = new PLayer($row['number'], $row['name'], $row ['surname']);
}
    dd($players);

require '../views/index.php';

