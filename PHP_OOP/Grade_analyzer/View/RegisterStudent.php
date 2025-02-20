<?php
use Controller\FormHandling;
use Config\Config;
require_once '../Controller/FormHandling.php';
require_once '../Config/Config.php'; 
?>

<div class="container" style="max-width: 600px; margin: 50px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center" style="margin-bottom: 20px; font-family: 'Arial', sans-serif;">Student Registration</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="firstname" style="font-size: 16px; font-weight: bold; color: #333;">First Name :</label>
            <input id="firstname" name="firstname" type="text" required onchange="validate_text(this)" oninput="capitalizeFirstLetter(event)" 
                   value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '' ?>" 
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        <div class="mb-3">
            <label for="lastname" style="font-size: 16px; font-weight: bold; color: #333;">Last Name :</label>
            <input type="text" id="lastname" name="lastname" required onchange="validate_text(this)" oninput="capitalizeFirstLetter(event)" 
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                   value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="rollno" style="font-size: 16px; font-weight: bold; color: #333;">Roll No :</label>
            <input id="rollno" name="rollno" type="number" min="1" max="100" required 
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                   value="<?php echo isset($_POST['rollno']) ? htmlspecialchars($_POST['rollno']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="phone" style="font-size: 16px; font-weight: bold; color: #333;">Phone Number :</label>
            <input id="phone" name="phone" type="text" step="0" maxlength="15" required 
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                   value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="class" style="font-size: 16px; font-weight: bold; color: #333;">Class :</label>
            <input id="class" type="number" step="0" min="1" max="10" name="class" required 
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                   value="<?php echo isset($_POST['class']) ? htmlspecialchars($_POST['class']) : '' ?>">
        </div>

        <input type="submit" name="submitbtn" 
                style="width: 100%; padding: 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 20px;">
        </input>
    </form>
</div>

<script>
    function capitalizeFirstLetter(event){
        let value = event.target.value;
        event.target.value = value.charAt(0).toUpperCase() + value.slice(1).toLowerCase();
    }
    function validate_text(input) {
        const input_value = input.value;
        if (input_value.match(/[^a-zA-Z]/g)) { 
            input.setCustomValidity("Input must be alphabet only");
        } else {
            input.setCustomValidity("");
        }
    }

</script>

<?php
$f_name = '';
$l_name = '';
$phone = '';
$roll = 1;
$student_class = 1;

if (isset($_POST["submitbtn"]) && isset($_POST['firstname'])) {
    $f_name = $_POST["firstname"]; 
    $l_name = $_POST["lastname"];
    $phone = $_POST["phone"];
    $roll = $_POST["rollno"];
    $student_class = $_POST["class"];

    $config = new Config();
    $form_submit = new FormHandling($config);

    // Call register_student method
    $form_submit->register_student($f_name, $l_name, $roll, $phone, $student_class);

}

?>
