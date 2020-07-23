<?php

namespace App\Models;

class Bot
{
    public static function easyMode($board)
    {

        for ($i = 0; $i < sizeof($board->board); $i++) {
            for ($j = 0; $j < sizeof($board->board[$i]); $j++) {
                if ($board->board[$i][$j] == null) {
                    $board->board[$i][$j] = 'O';
                    break 2;
                }
            }
        }
        return $board;
    }

    public static function intermedMode($board)
    {

        $move = true;

        while ($move) {
            if (rand(0, 1)) {
                for ($j = 0; $j < 3; $j++) {
                    for ($i = 0; $i < 3; $i++) {
                        if ($board->board[$i][$j] == null) {
                            $board->board[$i][$j] = 'O';
                            $move = true;
                            break 3;
                        }
                    }
                }
            } else {
                if ($move) {
                    for ($i = 0; $i < sizeof($board->board); $i++) {
                        for ($j = 0; $j < sizeof($board->board[$i]); $j++) {
                            if ($board->board[$i][$j] == null) {
                                $board->board[$i][$j] = 'O';
                                break 3;
                            }
                        }
                    }
                }
            }
        }
    }

    public static function hardMode($board)
    {
        $move = true;

        if ($board->board[1][1] == null) {
            $board->board[1][1] = 'O';
            $move = false;
        }

        if ($move) {
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j < 3; $j++) {
                    if ($i == $j)
                        if ($board->board[$i][$j] == null) {
                            $board->board[$i][$j] = 'O';
                            $move = false;
                            break 2;
                        }
                }
            }
        }

        if ($move) {
            if ($board->board[0][1] == null) {
                $board->board[0][1] = 'O';
                $move = false;
            } else if ($board->board[1][2] == null) {
                $board->board[1][2] = 'O';
                $move = false;
            } else if ($board->board[2][0] == null) {
                $board->board[2][0] = 'O';
                $move = false;
            } else if ($board->board[2][1] == null) {
                $board->board[2][1] = 'O';
                $move = false;
            } else if ($board->board[1][0] == null) {
                $board->board[1][0] = 'O';
                $move = false;
            } else if ($board->board[2][0] == null) {
                $board->board[2][0] = 'O';
                $move = false;
            } else if ($board->board[0][2] == null) {
                $board->board[0][2] = 'O';
                $move = false;
            }
        }

        return $board;
    }
}
