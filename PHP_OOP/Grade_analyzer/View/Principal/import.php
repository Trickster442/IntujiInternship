<?php
use Grade_analyzer\Config\Config;
require_once '../../Config/Config.php';

use Grade_analyzer\Controller\FormHandling;
require_once '../../Controller/FormHandling.php';

use Grade_analyzer\Controller\UpdateForm;
require_once '../../Controller/UpdateForm.php';

$config = new Config();
$formHand = new FormHandling($config);
$updateForm = new UpdateForm($config);
