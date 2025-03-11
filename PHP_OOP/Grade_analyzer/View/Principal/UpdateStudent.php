<?php
include('./import.php');
include('./authorization.php');

$studentID = $_POST['id'] ?? null;
$studentData = $formHand->getStudentById($studentID);
$connection = $config->getConnection();

if ($studentID) {

    $studentData = $formHand->getStudentById($studentID);

    $classQuery = "SELECT class FROM classes c WHERE id = ?";
    $classStmt = $connection->prepare($classQuery);
    $classStmt->bind_param("s", $studentData['class_id']);
    $classStmt->execute();
    $classResult = $classStmt->get_result();
    $classID = $classResult->fetch_assoc();
    $className = $classID['class'];
}

?>

<div class="container"
    style="max-width: 600px; margin: 50px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center" style="margin-bottom: 20px; font-family: 'Arial', sans-serif;">Student Registration</h2>
    <form method="POST" action="">
        <input type="hidden" name="studentID"
            value="<?php echo isset($studentData['id']) ? htmlspecialchars($studentData['id']) : ''; ?>">

        <div class="mb-3">
            <label for="firstname" style="font-size: 16px; font-weight: bold; color: #333;">First Name :</label>
            <input id="firstname" name="firstname" type="text" required oninput="capitalizeFirstLetter(event)"
                value="<?php echo isset($studentData['first_name']) ? htmlspecialchars($studentData['first_name']) : ''; ?>"
                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
        </div>

        <div class="mb-3">
            <label for="lastname" style="font-size: 16px; font-weight: bold; color: #333;">Last Name :</label>
            <input type="text" id="lastname" name="lastname" required oninput="capitalizeFirstLetter(event)"
                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                value="<?php echo isset($studentData['last_name']) ? htmlspecialchars($studentData['last_name']) : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="rollno" style="font-size: 16px; font-weight: bold; color: #333;">Roll No :</label>
            <input id="rollno" name="rollno" type="number" min="1" max="100" required
                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                value="<?php echo isset($studentData['roll_no']) ? htmlspecialchars($studentData['roll_no']) : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="phone" style="font-size: 16px; font-weight: bold; color: #333;">Phone Number :</label>
            <input id="phone" name="phone" type="text" step="0" maxlength="15" required
                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                value="<?php echo isset($studentData['phone_num']) ? htmlspecialchars($studentData['phone_num']) : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="class" style="font-size: 16px; font-weight: bold; color: #333;">Class :</label>
            <input id="class" type="number" step="0" min="1" name="class" required
                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                value="<?php echo isset($className) ? htmlspecialchars($className) : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="email" style="font-size: 16px; font-weight: bold; color: #333;">Email :</label>
            <input id="email" type="email" name="email" required
                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                value="<?php echo isset($studentData['email']) ? htmlspecialchars($studentData['email']) : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="password" style="font-size: 16px; font-weight: bold; color: #333;">Password :</label>
            <input id="password" type="password" name="password" required style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;
                   value=" <?php echo isset($studentData['password']) ? htmlspecialchars($studentData['password']) : ''; ?>">
        </div>

        <input type="submit" name="submitbtn"
            style="width: 100%; padding: 12px; background-color: rgb(150, 158, 206); color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 20px;">
    </form>
</div>

<?php
if (isset($_POST['submitbtn'])) {
    $updateForm->updateStudentForm(
        $_POST['studentID'],
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['rollno'],
        $_POST['phone'],
        $_POST['class'],
        $_POST['email'],
        $_POST['password']
    );

    echo "Updated successfully";
}
?>