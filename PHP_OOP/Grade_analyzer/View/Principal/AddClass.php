<?php
include('./import.php');
include('./authorization.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitbtn"])) {
    $formHand->addClass($_POST['class']);
}
?>

<div class="container" style="max-width: 600px; margin: 50px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center" style="margin-bottom: 20px; font-family: 'Arial', sans-serif;">Class Registration</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="class" style="font-size: 16px; font-weight: bold; color: #333;">Class :</label>
            <input id="class" type="text" name="class" required 
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                   value="<?php echo isset($_POST['class']) ? htmlspecialchars($_POST['class']) : '' ?>"
                   oninput="capitalizeFirstLetter(this)">
        </div>

        <input type="submit" name="submitbtn" 
                style="width: 100%; padding: 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 20px;">
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
