<?php declare(strict_types= 1); ?>

<?php
//control structure according to PER coding style
// An if structure looks like the following. Note the placement of parentheses, spaces, and braces;
// and that else and elseif are on the same line as the closing brace from the earlier body.

$t = date("H");
if ($t < "10") {
    echo "Have a good morning!";
} elseif ($t < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}

echo '<br>';

//switch case
$favcolor = 'red';

switch ($favcolor) {
    case 'red':
        echo 'Your favorite color is red!';
        break;
    case 'blue':
        echo 'Your favorite color is blue!';
        break;
    case 'green':
        echo 'Your favorite color is green!';
        break;
    default:
        echo 'Your favorite color is neither red, blue, nor green!';
}

echo '<br>';

// match expression;
$month = (int) date('m') ;
$monthName = match ($month)
{
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    default => 'December'
};

echo $monthName;