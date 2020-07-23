<?php

namespace App\Models;

use App\Models\Connection;

class Log extends Model
{
    /* Started to think about history of moves
     It would be nice to do this because then we coould
     have like "game snapshots". Maybe see the best moves? hahaha
                                        ____
                                       _|__|_
     It's sad that a I did not make it ( ;-;)
                                        <| |>
                                         |^| 
    */
    protected $attributes =  [
        'id' => null,
        'symbol' => null, 'position' => null, 'board_id' => null,
    ];

    public $dictionary = [
        "one" => "[0][0]", "two" => "[0][1]", "three" => "[0][2]",
        "four" => "[1][0]", "five" => "[1][1]", "six" => "[1][2]",
        "seven" => "[2][0]", "eight" => "[2][1]", "nine" => "[2][2]"
    ];

    public function __construct()
    {
    }

    public function save()
    {
        $conn = Connection::getConn();

        $symbol = $this->getAttribute("symbol");
        $position = $this->getAttribute("position");
        $board_id = $this->getAttribute("board_id");

        $sql = "INSERT INTO logs (symbol, position, board_id) VALUES (\"$symbol\",\"$position\",$board_id);";

        // var_dump($sql);

        // die();

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            // Ensuring connection closure
            $conn = null;
            $stmt = null;
        }
    }
}
