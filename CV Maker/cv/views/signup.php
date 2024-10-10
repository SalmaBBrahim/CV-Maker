<?php
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
//connexion à la base de données
    try {
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "La connexion a échoué: " . $e->getMessage();
      exit;
    }
  }

  public function insertUser($name, $email, $password) {
    $q = $this->conn->prepare("INSERT INTO users (nom, email,password) VALUES (:name, :email, :password)");
    $q->bindParam(":name", $name);
    $q->bindParam(":email", $email);
    $q->bindParam(":password",$password);

    try {
      $q->execute();
      return true;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
  }
//il faut que email ne se répète pas 
  public function checkEmailExists($email) {
    $q = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
    $q->bindParam(":email", $email);
    $q->execute();
    $count = $q->fetchColumn();

    return $count > 0;
  }
}

$db = new Database("localhost", "bd_cv", "root", "");

// User Input
$name = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validation
if (empty($name) || empty($email) || empty($password)) {
  echo '<script>alert("Remplissez tous les champs");</script>';
  echo '<script>window.location.replace("signupForm.php");</script>';
  exit;
}

if ($db->checkEmailExists($email)) {
  echo '<script>alert("adresse email existe déjà. Veuillez essayer une autre adresse e-mail");</script>';
  echo '<script>window.location.replace("signupForm.php");</script>';
  exit;
}

if ($db->insertUser($name, $email, $password)) {
  echo '<script>alert("vous êtes inscrit avec succès !");</script>';
  header('location:cv.php');
} else {
  echo '<script>alert(" Échec de enregistrement!");</script>';
  echo '<script>window.location.replace("signupForm.php");</script>';
}

