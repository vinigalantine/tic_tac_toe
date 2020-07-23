<?php

namespace App\Models;

use App\Models\Model;

class Board extends Model
{
    protected $attributes =  [
        'id' => null,
        'one' => null, 'two' => null, 'three' => null,
        'four' => null, 'five' => null, 'six' => null,
        'seven' => null, 'eight' => null, 'nine' => null
    ];
    public $board = [];

    public function __construct()
    {
    }

    public function find($id)
    {
        parent::find($id);

        $this->mountBoard();
    }

    public function mountBoard()
    {
        $this->board =  [
            [$this->attributes['one'], $this->attributes['two'], $this->attributes['three']],
            [$this->attributes['four'], $this->attributes['five'], $this->attributes['six']],
            [$this->attributes['seven'], $this->attributes['eight'], $this->attributes['nine']]
        ];
    }

    public function boardToAttributes()
    {
        $this->attributes['one'] = $this->board[0][0];
        $this->attributes['two'] = $this->board[0][1];
        $this->attributes['three'] = $this->board[0][2];
        $this->attributes['four'] = $this->board[1][0];
        $this->attributes['five'] = $this->board[1][1];
        $this->attributes['six'] = $this->board[1][2];
        $this->attributes['seven'] = $this->board[2][0];
        $this->attributes['eight'] = $this->board[2][1];
        $this->attributes['nine'] = $this->board[2][2];
    }

    public function checkWin($symbol)
    {

        $principal_diagonal = 0;
        $secondary_diagonal = 0;

        $secondary_diagonal_count = 2;

        for ($i = 0; $i < sizeof($this->board); $i++) {
            $line = 0;

            // Here I will use $i to check if the column is a win
            if (
                $this->board[0][$i] == $symbol
                && $this->board[1][$i] == $symbol
                && $this->board[2][$i] == $symbol
            )
                return $symbol;

            for ($j = 0; $j < sizeof($this->board[$i]); $j++) {

                // This add 1 to the line counter
                if ($this->board[$i][$j] == $symbol)
                    $line++;

                // This add 1 to the principal diagonal counter
                if ($i == $j)
                    if ($this->board[$i][$j] == $symbol)
                        $principal_diagonal++;
            }

            // This check the line counter 
            if ($line == 3)
                return $symbol;

            // This add 1 to the secondary diagonal counter
            if ($this->board[$i][$secondary_diagonal_count--] == $symbol)
                $secondary_diagonal++;
        }

        // This check the principal diagonal counter
        if ($principal_diagonal == 3)
            return $symbol;

        // This check the secondary diagonal counter
        if ($secondary_diagonal == 3)
            return $symbol;

        // Return null if non of the above is a win
        return null;
    }
}
