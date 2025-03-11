<?php
include('./authorization.php');
include('./import.php');

if (!isset($_SESSION['class_id'])) {
  die("Error: Class ID is not set in session.");
}

$class_id = $_SESSION['class_id'];
?>

<form method="post" id="semester">
  <label for="semester">Semester :</label>
  <input id="semester" name="semester" type="text"><br>
  <button type="submit">Submit</button>
</form>

<?php
require('./summary.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marks Summary Report</title>
  <link rel="stylesheet" href="MarksSummarize.css">
</head>

<body>
  <div class="main-container">
    <h2>Marks Summary Report for Semester
      <?php echo isset($_POST['semester']) ? htmlspecialchars($_POST['semester']) : ''; ?>
    </h2>

    <?php if (empty($dataByName)): ?>
      <p>No data to show</p>
    <?php else: ?>

      <!-- Individual Student Marks -->
      <h3>Student Marks</h3>
      <table class="summary-table">
        <tr>
          <th>Student Name</th>
          <?php foreach (array_keys($subjectTotals) as $subject): ?>
            <th><?php echo htmlspecialchars($subject); ?></th>
          <?php endforeach; ?>
          <th>Percentage</th>
        </tr>
        <?php foreach ($dataByName as $name => $subjects): ?>
          <tr>
            <td><?php echo htmlspecialchars($name); ?></td>
            <?php foreach (array_keys($subjectTotals) as $subject): ?>
              <td><?php echo isset($subjects[$subject]) ? $subjects[$subject] : '-'; ?></td>
            <?php endforeach; ?>
            <td><?php echo number_format($studentTotals[$name]['percentage'], 2); ?>%</td>
          </tr>
        <?php endforeach; ?>
      </table>

      <!-- Summary Statistics -->
      <h3>Summary Statistics</h3>
      <table class="summary-table">
        <tr>
          <th>Class Average</th>
          <td><?php echo number_format($classAverage, 2); ?>%</td>
        </tr>
        <tr>
          <th>Students Below Average</th>
          <td><?php echo $belowAverageCount . ' out of ' . $studentCount; ?></td>
        </tr>
      </table>

      <!-- Highest Scorers -->
      <h3>Highest Scorers by Subject</h3>
      <table class="summary-table">
        <tr>
          <th>Subject</th>
          <th>Student</th>
          <th>Mark</th>
        </tr>
        <?php foreach ($highestScorers as $subject => $data): ?>
          <tr>
            <td><?php echo htmlspecialchars($subject); ?></td>
            <td><?php echo htmlspecialchars($data['name']); ?></td>
            <td><?php echo $data['mark']; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>

      <!-- Lowest Scorers -->
      <h3>Lowest Scorers by Subject</h3>
      <table class="summary-table">
        <tr>
          <th>Subject</th>
          <th>Student</th>
          <th>Mark</th>
        </tr>
        <?php foreach ($lowestScorers as $subject => $data): ?>
          <tr>
            <td><?php echo htmlspecialchars($subject); ?></td>
            <td><?php echo htmlspecialchars($data['name']); ?></td>
            <td><?php echo $data['mark']; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>
  </div>
</body>

</html>