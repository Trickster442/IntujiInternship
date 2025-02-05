<?php declare(strict_types=1);
session_start();

if (!isset($_SESSION['page'])) {
    $_SESSION['page'] = 0;
}

$list_of_items = 100;
$items_per_page = 25;
$no_of_pages = ceil($list_of_items / $items_per_page) - 1; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['increase']) && $_SESSION['page'] < $no_of_pages) {
        $_SESSION['page']++;
    } elseif (isset($_POST['decrease']) && $_SESSION['page'] > 0) {
        $_SESSION['page']--;
    } elseif (isset($_POST['reset'])) {
        $_SESSION['page'] = 0;
    }
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$page = $_SESSION['page'];
$start_item = $page * $items_per_page;
$end_item = min($start_item + $items_per_page, $list_of_items);

?>

<form method="POST">
    <button type="submit" name="decrease" <?php echo ($page == 0) ? 'disabled' : ''; ?>>Previous</button>
    <input type="number" name="page_number" value="<?php echo $page + 1; ?>" readonly>
    <button type="submit" name="increase" <?php echo ($page >= $no_of_pages) ? 'disabled' : ''; ?>>Next</button>
    <button type="submit" name="reset">Reset</button>
</form>

<?php

for ($i = $start_item; $i < $end_item; $i++) {
    echo "Item " . ($i + 1) . "<br>";
}
?>
