<?php

namespace App;

class Player{
    public function __construct(
        public int $id,
        public int $number,
        public string $name,
        public string $surname,
    )
    {}

    public function __toString(): string
    {
        return sprintf('#%d (%s. %s)', $this->number, $this->name, $this->surname);
    }

    public static function getPlayers(int $teamId): array
    {
        $db = new \SQLite3('../db/project.sqlite3');

        $result = $db->query("SELECT * FROM players WHERE team_id = 1");

        $players = [];
        while ($row = $result->fetchArray()){
            $players[] = new \App\Player($row['id'], $row['number'], $row['name'], $row['surname']);
        }

        return $players;
    }

}