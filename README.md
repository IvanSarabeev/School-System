public function playMove($x, $y, $player) {
        if ($this->board[$x][$y] === '') {
            $this->board[$x][$y] = $player;
            return true;
        }
        return false;
    }

public function checkWinner() {
        // Check rows
        for ($i = 0; $i < 3; $i++) {
            if ($this->board[$i][0] != '' &&
                $this->board[$i][0] == $this->board[$i][1] &&
                $this->board[$i][1] == $this->board[$i][2]) {
                return $this->board[$i][0];
            }
        }
        // Check columns
        for ($i = 0; $i < 3; $i++) {
            if ($this->board[0][$i] != '' &&
                $this->board[0][$i] == $this->board[1][$i] &&
                $this->board[1][$i] == $this->board[2][$i]) {
                return $this->board[0][$i];
            }
        }
        // Check diagonals
        if ($this->board[0][0] != '' &&
            $this->board[0][0] == $this->board[1][1] &&
            $this->board[1][1] == $this->board[2][2]) {
            return $this->board[0][0];
        }
        if ($this->board[0][2] != '' &&
            $this->board[0][2] == $this->board[1][1] &&
            $this->board[1][1] == $this->board[2][0]) {
            return $this->board[0][2];
        }
        // No winner
        return '';
    }
