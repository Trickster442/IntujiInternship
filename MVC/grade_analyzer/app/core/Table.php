<?php
require_once __DIR__ . '/../models/Marks.php';
require_once __DIR__ . '/../models/Classes.php';
require_once __DIR__ . '/../models/Students.php';
require_once __DIR__ . '/../models/Subjects.php';
require_once __DIR__ . '/../models/Teachers.php';

class Table
{
    use Database;

    protected $models;

    public function __construct()
    {
        // Initialize models
        $this->models = [
            new Classes(),
            new Students(),
            new Subjects(),
            new Teachers(),
            new Marks(),
        ];
    }

    public function createTables()
    {
        $con = $this->connection(); // Get database connection

        foreach ($this->models as $model) {
            if (method_exists($model, 'createDatabase')) {
                $sql = $model->createDatabase(); // Get the table creation SQL
                try {
                    $con->exec($sql); // Execute the SQL query
                } catch (PDOException $e) {
                    echo "Error creating table for " . get_class($model) . ": " . $e->getMessage() . "<br>";
                }
            }
        }
    }
}

// Run the table creation process
$create = new Table();
$create->createTables();
