<?php

// Recursively evaluate a scoreboard
function score($board, $r, $c) {
	// Top case
	if (($r - 1) >= 0 && $board[$r - 1][$c]) {
		$board[$r][$c] = false; // Visited
		return 1 + score($board, $r - 1, $c);
	}
	// Bottom case
	if (($r + 1) < count($board) && $board[$r + 1][$c]) {
		$board[$r][$c] = false; // Visited
		return 1 + score($board, $r + 1, $c);
	}
	// Left case
	if (($c - 1) >= 0 && $board[$r][$c - 1]) {
		$board[$r][$c] = false; // Visited
		return 1 + score($board, $r, $c - 1);
	}
	// Right case
	if (($c + 1) < count($board[$r]) && $board[$r][$c + 1]) {
		$board[$r][$c] = false; // Visited
		return 1 + score($board, $r, $c + 1);
	}
	// Starting point is a real start point
	if ($board[$r][$c])
		return 1;
}

// Print a scoreboard to evaluate
function printBoard($board) {
	for ($i = 0; $i < count($board); $i++) {
		for ($j = 0; $j < count($board[$i]); $j++) {
			if ($board[$i][$j])
				echo "*";
			else
				echo "+";
			echo " ";
		}
		echo PHP_EOL;
	}
}

$scoreBoard = array();

// Row 1
$scoreBoard[0][0] = false;
$scoreBoard[0][1] = false;
$scoreBoard[0][2] = true;
$scoreBoard[0][3] = false;

// Row 2
$scoreBoard[1][0] = true;
$scoreBoard[1][1] = true;
$scoreBoard[1][2] = true;
$scoreBoard[1][3] = false;

// Row 3
$scoreBoard[2][0] = true;
$scoreBoard[2][1] = true;
$scoreBoard[2][2] = false;
$scoreBoard[2][3] = false;

// Row 4
$scoreBoard[3][0] = false;
$scoreBoard[3][1] = false;
$scoreBoard[3][2] = false;
$scoreBoard[3][3] = false;

// Print the result
echo PHP_EOL;
echo "Scoreboard to evaluate: ".PHP_EOL;
printBoard($scoreBoard);
echo "The score is: ".score($scoreBoard, 0, 2).PHP_EOL.PHP_EOL;