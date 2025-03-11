<?php
if (isset($_POST['semester'])) {
    $data = $markHand->getMarksByClassAndSemester($class_id, $_POST['semester']);
    $dataByName = [];
    $studentTotals = [];
    $subjectTotals = [];
    $subjectCounts = [];

    // Organize data and calculate totals
    foreach ($data as $mark) {
        $studentName = $mark['first_name'] . ' ' . $mark['last_name'];

        if (!isset($dataByName[$studentName])) {
            $dataByName[$studentName] = [];
            $studentTotals[$studentName] = ['total' => 0, 'count' => 0];
        }

        $dataByName[$studentName][$mark['subject_name']] = $mark['subject_marks'];
        $studentTotals[$studentName]['total'] += $mark['subject_marks'];
        $studentTotals[$studentName]['count']++;

        if (!isset($subjectTotals[$mark['subject_name']])) {
            $subjectTotals[$mark['subject_name']] = 0;
            $subjectCounts[$mark['subject_name']] = 0;
        }
        $subjectTotals[$mark['subject_name']] += $mark['subject_marks'];
        $subjectCounts[$mark['subject_name']]++;
    }

    // Calculate averages and percentages
    $classTotal = 0;
    $studentCount = count($studentTotals);
    $belowAverageCount = 0;
    $highestScorers = [];
    $lowestScorers = [];

    foreach ($studentTotals as $name => $stats) {
        $studentTotals[$name]['percentage'] = ($stats['total'] / ($stats['count'] * 100)) * 100;
        $classTotal += $studentTotals[$name]['percentage'];
    }

    $classAverage = $studentCount > 0 ? $classTotal / $studentCount : 0;

    // Find students below average and highest/lowest scorers
    foreach ($studentTotals as $name => $stats) {
        if ($stats['percentage'] < $classAverage) {
            $belowAverageCount++;
        }
    }

    foreach ($dataByName as $student => $subjects) {
        foreach ($subjects as $subject => $mark) {
            if (!isset($highestScorers[$subject])) {
                $highestScorers[$subject] = ['name' => $student, 'mark' => $mark];
                $lowestScorers[$subject] = ['name' => $student, 'mark' => $mark];
            } else {
                if ($mark > $highestScorers[$subject]['mark']) {
                    $highestScorers[$subject] = ['name' => $student, 'mark' => $mark];
                }
                if ($mark < $lowestScorers[$subject]['mark']) {
                    $lowestScorers[$subject] = ['name' => $student, 'mark' => $mark];
                }
            }
        }
    }
}
