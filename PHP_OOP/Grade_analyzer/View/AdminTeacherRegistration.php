<?php
use Grade_analyzer\Controller\FormHandling;
use Grade_analyzer\Config\Config;
require_once '../Controller/FormHandling.php';
require_once '../Config/Config.php'; 

$f_name = $l_name = $phone = $class = $email = $password = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitbtn"])) {
    $f_name = $_POST["firstname"] ?? ''; 
    $l_name = $_POST["lastname"] ?? '';
    $phone = $_POST["phone"] ?? '';
    $class = $_POST["class"] ?? '';
    $subject = $_POST["subject"] ?? '';
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';
    $subject = $_POST['subject'] ?? '';
}
?>

<?php 
    $f_name = $_POST["firstname"]; 
    $l_name = $_POST["lastname"];
    $phone = $_POST["phone"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $class = $_POST["class"];
    $subject = $_POST['subject'];

$data = [
        'first_name' => $f_name, 
        'last_name' => $l_name, 
        'phone' => $phone, 
        'class' => $class, 
        'email' => $email, 
        'password' => $password,
        'subject' => $subject
    ];

?>


<div class="container" style="max-width: 600px; margin: 50px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center" style="margin-bottom: 20px; font-family: 'Arial', sans-serif;">Accept Teacher Registration</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="firstname" style="font-size: 16px; font-weight: bold; color: #333;">First Name :</label>
            <input id="firstname" name="firstname" type="text" required onchange="validate_text(this)" oninput="capitalizeFirstLetter(event)" 
                   value="<?php echo htmlspecialchars($data['first_name'] ?? ''); ?>" 
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        <div class="mb-3">
            <label for="lastname" style="font-size: 16px; font-weight: bold; color: #333;">Last Name :</label>
            <input type="text" id="lastname" name="lastname" required onchange="validate_text(this)" oninput="capitalizeFirstLetter(event)" 
                   value="<?php echo htmlspecialchars($data['last_name'] ?? ''); ?>"
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        <div class="mb-3">
            <label for="phone" style="font-size: 16px; font-weight: bold; color: #333;">Phone Number :</label>
            <input id="phone" name="phone" type="text" maxlength="15" required 
                   value="<?php echo htmlspecialchars($data['phone'] ?? ''); ?>"
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        <div class="mb-3">
            <label for="class" style="font-size: 16px; font-weight: bold; color: #333;">Class :</label>
            <input id="class" type="number" min="1" max="10" name="class" required 
                   value="<?php echo htmlspecialchars($data['class'] ?? ''); ?>"
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        <div class="mb-3">
            <label for="subject" style="font-size: 16px; font-weight: bold; color: #333;">Subject :</label>
            <input id="subject" type="text" name="subject" required 
                   value="<?php echo htmlspecialchars($data['subject'] ?? ''); ?>"
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>
        
        <div class="mb-3">
            <label for="email" style="font-size: 16px; font-weight: bold; color: #333;">Email :</label>
            <input id="email" type="email" name="email" required 
                   value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>"
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        <div class="mb-3">
            <label for="password" style="font-size: 16px; font-weight: bold; color: #333;">Password :</label>
            <input id="password" type="password" name="password" required 
                    value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>"
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        
        <div class="mb-3">
            <p>Select role for Teacher :</p>
            <input id="Teacher" type="radio" name="role" value="Teacher"
            style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
            <label for="Teacher" style="font-size: 16px; font-weight: bold; color: #333;">Teacher</label>
        
            <input id="ClassTeacher" type="radio" name="role" value="ClassTeacher"
            style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
            <label for="ClassTeacher" style="font-size: 16px; font-weight: bold; color: #333;">Class Teacher</label>
        </div>

        <input type="submit" name="submitbtn" 
                style="width: 100%; padding: 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 20px;">
    </form>
</div>



