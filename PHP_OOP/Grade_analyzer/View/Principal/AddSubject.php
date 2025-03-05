<?php
session_start();
use Grade_analyzer\Controller\FormHandling;
use Grade_analyzer\Config\Config;
require_once '../../Controller/FormHandling.php';
require_once '../../Config/Config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitbtn"])) {
    $config = new Config();
    $form_submit = new FormHandling($config);

    $form_submit->add_subject($_POST['subject'],$_POST['class']);
}
?>


<div class="container"
    style="max-width: 600px; margin: 50px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center" style="margin-bottom: 20px; font-family: 'Arial', sans-serif;">Student Registration</h2>
    <form method="POST">

        <div class="mb-3">
            <label for="subject" style="font-size: 16px; font-weight: bold; color: #333;">Subject :</label>
            <input id="subject" type="text" name="subject" required
                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="class" style="font-size: 16px; font-weight: bold; color: #333;">Class :</label>
            <input id="class" type="number" step="0" min="1" name="class" required
                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;"
                value="<?php echo isset($_POST['class']) ? htmlspecialchars($_POST['class']) : '' ?>">
        </div>

        <input type="submit" name="submitbtn"
            style="width: 100%; padding: 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 20px;">
    </form>
</div>