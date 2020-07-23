<?php

namespace App\Controllers;

use App\Models\Board;
use App\Models\Bot;
use App\Models\Log;

class BoardController
{

    public static function playerMove($id = null, $field, $difficulty)
    {
        $board = null;

        if ($id == null) {

            $board = new Board();

            $board->setAttribute($field, "X");

            $board->save();
        } else {

            $board = new Board();

            $board->find($id);

            $board->setAttribute($field, "X");

            $board->save();
        }

        $log = new Log();

        $log->setAttribute("symbol", "X");
        $log->setAttribute("position", $field);
        $log->setAttribute("board_id", $board->getAttribute("id"));
        $log->save();

        $board->mountBoard();

        $win = $board->checkWin("X");

        if ($win != null)
            return ["win" => true, "board" => $board->board, "symbol" => $win];


        $old_board = $board->board;
        switch ($difficulty) {
            case 'easy':
                Bot::easyMode($board);
                break;
            case 'intermediary':
                Bot::intermedMode($board);
                break;
            case 'hard':
                Bot::hardMode($board);
                break;
            case 'ultra-hard':
                $board->board = [["O", "O", "O"], ["O", "O", "O"], ["O", "O", "O"]];
                break;
        }

        $board->boardToAttributes();

        $board->save();

        $log = new Log();

        $log->setAttribute("symbol", "O");

        for ($i = 0; $i < sizeof($board->board); $i++) {
            for ($j = 0; $j < sizeof($board->board[$i]); $j++) {
                if ($board->board[$i][$j] != $old_board[$i][$j]) {
                    $log->setAttribute("position", array_search("[" . $i . "][" . $j . "]", $log->dictionary));
                }
            }
        }

        $log->setAttribute("board_id", $board->getAttribute("id"));
        $log->save();

        $win = $board->checkWin("O");

        if ($win != null)
            return ["win" => true, "board" => $board->board, "symbol" => $win];

        return ["id" => $board->getAttribute("id"), "board" => $board->board];
    }
}
