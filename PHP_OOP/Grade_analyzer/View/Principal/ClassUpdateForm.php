<?php
use Grade_analyzer\Config\Config;
use Grade_analyzer\Controller\UpdateForm;

require_once '../../Controller/FormHandling.php';
require_once '../../Config/Config.php'; 
require_once '../../Controller/UpdateForm.php';

$config = new Config();
$config = $config->getConnection();

$id =  $_POST['id'];

$query = "SELECT * FROM classes WHERE id = $id ";
$stmt = $config->query($query);
$data = $stmt->fetch_assoc();

$query2 = "SELECT id, first_name, last_name FROM teachers WHERE NOT role = 'principal' AND status = 'Active' ";
$stmt2 = $config->query($query2);
$data2 = $stmt2->fetch_all();

?>

<div class="container" style="max-width: 600px; margin: 50px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center" style="margin-bottom: 20px; font-family: 'Arial', sans-serif;">Update Class</h2>
    <form method="POST">
        <input type="hidden" name="id" value=<?php echo $id; ?> >

        <div class="mb-3">
            <label for="class" style="font-size: 16px; font-weight: bold; color: #333;">Class :</label>
            <input type="text" id="class" name="class" required readonly 
                   value="<?php echo htmlspecialchars($data['class'] ?? ''); ?>"
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>


        <div class="mb-3">
            <p>Select Class Teacher For Class :</p>
            <select name="classTeacher">
            <option value="none">None</option>
            <?php
            foreach ($data2 as $value) {
                echo '<option value="' . $value[0] . '">';
                echo htmlspecialchars($value[1] . ' ' . $value[2]);
                echo '</option>';
            }
            ?>
    </select>
</div>
        <input type="submit" name="submitbtn" 
                style="width: 100%; padding: 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 20px;">
    </form>
</div>

<?php
$con = new Config();
$updateForm = new UpdateForm($con);


if(isset($_POST['submitbtn'])){
    $updateForm -> updateClassForm($_POST['classTeacher'], $id);
}
