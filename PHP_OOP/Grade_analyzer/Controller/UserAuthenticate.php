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

    public function authenticatePrincipal($username, $password, $role){
        $query = "SELECT * FROM teachers WHERE email = ? AND password = ? AND role = ? ";
        $stmt = $this->config->prepare($query);
        $stmt->bind_param("sss", $username, $password, $role);
        $stmt->execute();
        
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        
        if ($result) {
            $_SESSION['user'] = 'Principal';
            header('Location: ../View/Principal/PrincipalHomePage.php');
            exit();
        } else {
            echo "No user found.";
        }
        
        $stmt->close();
    
        $this->config->close();
        exit();

    }

    public function authenticateStudent($username, $password){
    $query = "SELECT * FROM students WHERE email = ? AND password = ?";
    
    $stmt = $this->config->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
    if ($result) {
        $_SESSION['user'] = 'Student';
        header('Location:../View/StudentHomePage.php');
    } else {
        echo "No user found.";
    }
    
    $stmt->close();
    }











}