<?php declare(strict_types=1);
function pagination_form(int $no_of_records)
{
    if (!isset($_SESSION['page'])) {
        $_SESSION['page'] = 0;
    }

    $items_per_page = 25;
    $no_of_pages = ceil($no_of_records / $items_per_page) - 1;

    

    // Calculate pagination range
    $_SESSION['start_item'] = $_SESSION['page'] * $items_per_page;
    $_SESSION['end_item'] = min($_SESSION['start_item'] + $items_per_page, $no_of_records);

    // Display pagination controls
    echo "<form method='GET'>";
    echo '
    <button type="submit" name="decrease" ' . ($_SESSION['page'] == 0 ? 'disabled' : '') . '>Previous</button>
    <input type="number" name="page_number" style="width:50px" value="' . ($_SESSION['page'] + 1) . '" readonly>
    <button type="submit" name="increase" ' . ($_SESSION['page'] >= $no_of_pages ? 'disabled' : '') . '>Next</button>
    <button type="submit" name="reset">First</button>
    ';
    echo '</form>';
}

// Handle button clicks
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['increase']) && $_SESSION['page'] < $no_of_pages) {
        $_SESSION['page']++;
    } elseif (isset($_GET['decrease']) && $_SESSION['page'] > 0) {
        $_SESSION['page']--;
    } elseif (isset($_GET['reset'])) {
        $_SESSION['page'] = 0;
    }
}
?>
