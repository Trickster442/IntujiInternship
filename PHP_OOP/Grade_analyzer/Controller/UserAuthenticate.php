<?php
namespace Grade_analyzer\Controller;
use Grade_analyzer\Config\Config;

class UserAuthentication
{
    private $config;

    public function __construct(Config $conn)
    {
        $this->config = $conn->getConnection();
    }

    public function authenticate_principal($username, $password, $role){
        $query = "SELECT * FROM teachers WHERE email = ? AND password = ? AND role = ? ";
    
        $stmt = $this->config->prepare($query);
        $stmt->bind_param("sss", $username, $password, $role);
        $stmt->execute();
        
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        
        if ($result) {
            echo "Successful login";
        } else {
            echo "No user found.";
        }
        
        $stmt->close();
    
        $this->config->close();

    }
}