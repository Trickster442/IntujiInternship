<?php
declare(strict_types=1);

namespace Grade_analyzer\View;
use Dom\Document;
use Grade_analyzer\Controller\FormHandling;
use Config\Config;
class FormHolder
{
    public function grade_form_by_input(array $students_by_class)
    {
        if (!count($students_by_class) < 1) {
            echo '
        <div class="bg-white w-9/12 my-10 mx-auto p-6 shadow-md rounded-md">
        <form method="POST">
        ';
            foreach ($students_by_class as $value) {
                $fullName = $value['FirstName'] . ' ' . $value['LastName'];
                echo "
            <label class='font-semibold block mb-2'>Name of Student :</label>
            <input type='text' maxlength='30' value='$fullName' readonly onchange='validate_name(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br>
            <label class='font-semibold block mb-2'>Science score : </label>
            <input type='number' name='science[" . $value['RollNo'] . "]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br>
            <label class='font-semibold block mb-2'>Math score : </label>
            <input type='number' name='math[" . $value['RollNo'] . "]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br>
            <label class='font-semibold block mb-2'>English score : </label>
            <input type='number' name='english[" . $value['RollNo'] . "]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br><br>
            <label class='font-semibold block mb-2'>Computer score : </label>
            <input type='number' name='nepali[" . $value['RollNo'] . "]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br><br>
            <label class='font-semibold block mb-2'>Social score : </label>
            <input type='number' name='social[" . $value['RollNo'] . "]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br><br>
            <label class='font-semibold block mb-2'>Health score : </label>
            <input type='number' name='health[" . $value['RollNo'] . "]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br><br>
            <hr class='border-2 mb-3'>  
            ";
            }

            echo '<label class="font-semibold block mb-2">Enter name for your file : </label>';
            echo '<input type="text" name="give_filename" maxlength="20" minlength="3" class="w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400"></input>';
            echo "<button type='submit' name='submit_scores' class='bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition mb-4'>Submit Scores</button>";
            echo '</form></div>';
    
        } else {
            echo "No student found for that class";
        }

    echo '<div id="result"></div>' ;
    }

}
?>

<script>
    function validate_score(input) {
        const value = input.value;
        if (value % 0.5 !== 0) {
            input.setCustomValidity("Score must be in .5 or real value");
        } else {
            input.setCustomValidity("");
        }
    }

    // function validate_name(input) {
    //    const name = input.value;
    //    if (name.match(/[!,@,#,$,%,^,&,*,/,[0-9]/g)) {
    //        input.setCustomValidity("Input must be alphabet only")
    //    } else {
    //        input.setCustomValidity("");
    //    }
    // }
</script>

<?php
if (isset($_POST['science'])) {
    $social = $_POST['social'];
    $science = $_POST['science'];
    $math = $_POST['math'];
    $english = $_POST['english'];
    $nepali = $_POST['nepali'];
    $health = $_POST['health'];

    $config = new Config;
    $new = new FormHandling($config);
    $new->insert_student_data($math,$science,$english,$nepali,$social,$health);

    $roll_keys = array_keys($social);
    foreach ($roll_keys as $value){
        $total = $social[$value] + $science[$value] + $math[$value] + $english[$value] + $nepali[$value] + $health[$value];
        $percentage = ($total / 600) * 100 ;
        echo $percentage . '%' . '<br>' ;
    }

}
