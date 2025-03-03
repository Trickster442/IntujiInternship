<?php
namespace Grade_analyzer\Controller;
use Grade_analyzer\Config\Config;

require_once '../Config/Config.php';

class UpdateForm
{
    private $config;
    public function __construct(Config $conn){
        $this->config = $conn->getConnection();
    }

    

}