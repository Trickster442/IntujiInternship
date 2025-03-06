<?php
use Grade_analyzer\Config\Config;
use Grade_analyzer\Controller\UpdateForm;

require_once '../../Controller/FormHandling.php';
require_once '../../Config/Config.php'; 
require_once '../../Controller/UpdateForm.php';

$config = new Config();
$config = $config->getConnection();

$id =  $_POST['id'];

$query = "SELECT * FROM teachers WHERE id = $id ";
$stmt = $config->query($query);
$data = $stmt->fetch_assoc();
?>

<div class="container" style="max-width: 600px; margin: 50px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center" style="margin-bottom: 20px; font-family: 'Arial', sans-serif;">Accept Teacher Registration</h2>
    <form method="POST">
        <input type="hidden" name="id" value=<?php echo $id; ?>>
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
                   value="<?php echo htmlspecialchars($data['phone_num'] ?? ''); ?>"
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        <div class="mb-3">
            <label for="class" style="font-size: 16px; font-weight: bold; color: #333;">Class :</label>
            <input id="class" type="number" min="1" max="10" name="class" required 
                   value="<?php echo htmlspecialchars($data['class_id'] ?? ''); ?>"
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        <div class="mb-3">
            <label for="subject" style="font-size: 16px; font-weight: bold; color: #333;">Subject :</label>
            <input id="subject" type="text" name="subject" required 
                   value="<?php echo htmlspecialchars($data['subject_id'] ?? ''); ?>"
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
            <select name="role">
                <option value="Teacher">
                    Teacher
                </option>
                <option value="ClassTeacher">
                    Class Teacher
                </option>
            </select>
        </div>

        <div class="mb-3">
            <p>Select Status :</p>
            <select name="status">
                <option value="Active">
                    Active
                </option>
                <option value="Pending">
                    Pending
                </option>
            </select>
        </div>

        <input type="submit" name="submitbtn" 
                style="width: 100%; padding: 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 20px;">
    </form>
</div>


<?php
$con = new Config();
$updateForm = new UpdateForm($con);

if (isset($_POST['submitbtn'])){
    $updateForm -> updateTeacherForm($_POST['id'], $_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['role'], $_POST['status'], $_POST['class'], $_POST['subject'], $_POST['email'], $_POST['password']);
    if ($updateForm){
        echo "Updated successfully";
    }
}
