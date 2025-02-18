<?php
declare(strict_types= 1);

namespace Grade_analyzer\View;

class FormHolder
{
    public function grade_form_by_input($num_of_students){
        echo '
        <div class="bg-white w-9/12 my-10 mx-auto p-6 shadow-md rounded-md">
        <form method="post">
        ';

    for ($i = 0; $i < $num_of_students; $i++) {
        echo "
        <label class='font-semibold block mb-2' >Id : " . ($i + 1) . " </label>
        <label class='font-semibold block mb-2'>Name of Student :</label>
        <input type='text' name='name[]' maxlength='30' required onchange='validate_name(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br>
        <label class='font-semibold block mb-2'>Science score : </label>
        <input type='number' name='science[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br>
        <label class='font-semibold block mb-2'>Math score : </label>
        <input type='number' name='math[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br>
        <label class='font-semibold block mb-2'>English score : </label>
        <input type='number' name='english[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br><br>
        <label class='font-semibold block mb-2'>Computer score : </label>
        <input type='number' name='computer[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br><br>
        <label class='font-semibold block mb-2'>Social score : </label>
        <input type='number' name='social[$i]' max='100' min='0' step='0.1' required onchange='validate_score(this)' class='w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400'><br><br>
        <hr class='border-2 mb-3'>  
        ";
    }

    echo '<label class="font-semibold block mb-2">Enter name for your file : </label>';
    echo '<input type="text" name="give_filename" maxlength="20" minlength="3" class="w-full border border-gray-300 rounded-xl p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400"></input>';
    echo "<button type='submit' name='submit_scores' class='bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition mb-4'>Submit Scores</button>";
    echo '</form></div>';

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

function validate_name(input){
    const name = input.value;
    if (name.match(/[!,@,#,$,%,^,&,*,/,[0-9]/g)){
        input.setCustomValidity("Input must be alphabet only")
    } else{
        input.setCustomValidity("");
    }
}
</script>


