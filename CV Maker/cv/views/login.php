<?php
session_start();

class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;
//constructeur
    public function __construct($host, $db_name, $username, $password) {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }

    public function login($email, $password) {
        $q = $this->conn->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $q->bindParam(':email', $email);
        $q->bindParam(':password', $password);
        $q->execute();

        $user = $q->fetch();

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    }
}

$db = new Database('localhost', 'bd_cv', 'root', '');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo '<script>alert("Entrez votre adresse email et votre mot de passe !");</script>';
        echo '<script>window.location.replace("loginForm.php");</script>';
        exit;
    }

    if ($db->login($email, $password)) {
        header('Location: cv.php');
        exit;
    } else {
        echo '<script>alert("Adresse email ou mot de passe incorrect !");</script>';
        echo '<script>window.location.replace("loginForm.php");</script>';
    }
}
?>

