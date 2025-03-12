<?php
if (isset($_POST['search'])) {
    $marksData = $markHand->searchMarks($_POST['search'], $class_id);
    $dataByName = [];

    if (!empty($marksData)) {
        foreach ($marksData as $mark) {
            $studentName = $mark['first_name'] . ' ' . $mark['last_name'];
            $semester = $mark['semester'];

            if (!isset($dataByName[$studentName])) {
                $dataByName[$studentName] = [];
            }
            if (!isset($dataByName[$studentName][$semester])) {
                $dataByName[$studentName][$semester] = [];
            }
            $dataByName[$studentName][$semester][$mark['subject_name']] = $mark['subject_marks'];
        }
    }
}