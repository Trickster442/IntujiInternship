<?php
include('./authorization.php');
include('./import.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitbtn"])) {
    $formHand->addSubject($_POST['subject'], $_POST['class']);
}

$connection = $config->getConnection(); 
$query = "SELECT class FROM classes"; 

$stmt = $connection->prepare($query);
if (!$stmt) {
    die("Error preparing statement: " . $connection->error);
}

$stmt->execute(); 

$result = $stmt->get_result(); // Get the result set
$classes = $result->fetch_all(MYSQLI_ASSOC); // Fetch data

$stmt->close(); 
?>

<div class="container"
    style="max-width: 600px; margin: 50px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center" style="margin-bottom: 20px; font-family: 'Arial', sans-serif;">Subject Registration</h2>
    <form method="POST">

        <div class="mb-3">
            <label for="subject" style="font-size: 16px; font-weight: bold; color: #333;">Subject :</label>
            <input id="subject" type="text" name="subject" required
                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>"
                oninput="capitalizeFirstLetter(this)">
        </div>

        <div class="mb-3">
            Select Class : 
            <select name="class">
                <?php
                foreach($classes as $class){
                    echo '<option value="' . $class['class'] . '">' . $class['class'] . '</option>';
                }
                ?>
            </select>
        </div>

        <input type="submit" name="submitbtn"
            style="width: 100%; padding: 12px; background-color: rgb(150, 158, 206); color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 20px;">
    </form>
</div>


<script>
    function capitalizeFirstLetter(input) {
        let value = input.value;
        if (value.length > 0) {
            input.value = value.charAt(0).toUpperCase() + value.slice(1);
        }
    }
</script>
