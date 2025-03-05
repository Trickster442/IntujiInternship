<?php
session_start();
use Grade_analyzer\Controller\FormHandling;
use Grade_analyzer\Config\Config;
require_once '../../Controller/FormHandling.php';
require_once '../../Config/Config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitbtn"])) {
    $f_name = $_POST["firstname"]; 
    $l_name = $_POST["lastname"];
    $phone = $_POST["phone"];
    $roll = $_POST["rollno"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $student_class = $_POST["class"];
    $config = new Config();
    $form_submit = new FormHandling($config);

    $form_submit->register_student($f_name, $l_name, $roll, $phone, $student_class, $email, $password);
}
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
            <input id="class" type="number" step="0" min="1" name="class" required 
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                   value="<?php echo isset($_POST['class']) ? htmlspecialchars($_POST['class']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="email" style="font-size: 16px; font-weight: bold; color: #333;">Email :</label>
            <input id="email" type="email" name="email" required 
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="password" style="font-size: 16px; font-weight: bold; color: #333;">Password :</label>
            <input id="password" type="password" name="password" required 
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        <input type="submit" name="submitbtn" 
                style="width: 100%; padding: 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 20px;">
    </form>
</div>


