<?php
require_once 'KLogger.php';

class Dao_local {
	private $host = "us-cdbr-east-02.cleardb.com";
	private $db = "heroku_7f3ca4f0a241444";
	private $user = "bb02ab37eccc80";
	private $pass = "5fef022c";
	private $logger;

	public function __construct () {
		$this->logger = new KLogger ("log.txt" , KLogger::DEBUG);
	}

	public function getConnection () {
		$this->logger->LogDebug("getting a connection");
		try {
		  $pdo = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
		  return $pdo;
		} catch (Exception $e) {
		  //echo print_r($e,1);
		  $this->logger->LogFatal("Ooops the database crapped its pants: " . print_r($e, 1));
		  exit;
			}
	}
  
	public function getUsers(){
		$this->logger->LogDebug("getting users");
		$conn = $this->getConnection();
		//echo print_r($conn,1);
		return $conn->query("SELECT * FROM user", PDO::FETCH_ASSOC);
	}
	
	public function getUserId($username){
		$conn = $this->getConnection();
		$saveQuery = "SELECT id FROM user WHERE username LIKE :username;";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":username", $username);
		$q->execute();
		$result = $q->fetchAll();
		$this->logger->LogDebug("getUserId got userID [{$result[0][0]}]");
		return $result[0][0];
	}
	
	public function userLogin($username, $password){
		$conn = $this->getConnection();
		$this->logger->LogDebug("attempting to login user [{$username}] with password [{$password}]");
		$saveQuery = "SELECT password FROM user WHERE username LIKE :username AND password LIKE :password;";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":username", $username);
		$q->bindParam(":password", $password);
		$q->execute();
		$result = $q->rowCount();
		if($result == 1)
		{
			$this->logger->LogDebug("login success");
			return true;
		}
		else
		{
			$this->logger->LogDebug("login failure");
			return false;
		}
	}
	
	public function register($email, $username, $password){
		$conn = $this->getConnection();
		$this->logger->LogDebug("attempting to register user [{$username}] with password [{$password}] and email [{$email}]");
		$saveQuery = "INSERT INTO user (email, username, password) VALUES (:email, :username, :password);";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":email", $email);
		$q->bindParam(":username", $username);
		$q->bindParam(":password", $password);
		$success = $q->execute();

		if($success)
		{
			$this->logger->LogDebug("register success");
			return true;
		}
		else
		{
			$this->logger->LogDebug("register failure");
			return false;
		}
	}
	
	public function checkEmail($email){
		$conn = $this->getConnection();
		$saveQuery = "SELECT email FROM user WHERE email LIKE :email;";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":email", $email);
		$q->execute();
		$result = $q->rowCount();
		if($result == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	public function checkUsername($username){
		$conn = $this->getConnection();
		$saveQuery = "SELECT username FROM user WHERE username LIKE :username;";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":username", $username);
		$q->execute();
		$result = $q->rowCount();
		if($result == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function createFolder($user_id, $category, $icon, $folder_name){
		$conn = $this->getConnection();
		$saveQuery = "INSERT INTO folder (user_id, category, icon, folder_name) VALUES (:user_id, :category, :icon, :folder_name);";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":user_id", $user_id);
		$q->bindParam(":category", $category);
		$q->bindParam(":icon", $icon);
		$q->bindParam(":folder_name", $folder_name);
		$success = $q->execute();
		$this->logger->LogDebug("createFolder for userID [{$user_id}], category [{$category}], icon [{$icon}], folder name [{$folder_name}]");
		if($success)
		{
			$this->logger->LogDebug("createFolder SUCCESS");
			return true;
		}
		else
		{
			$this->logger->LogDebug("createFolder FAIL");
			return false;
		}
	}
	
	/* Checks to see if user has <= 7 folders in DB
	 * Returns true or false; true if good to insert, false if not
	*/
	public function checkFolder($user_id){
		$conn = $this->getConnection();
		$saveQuery = "SELECT COUNT(user_id) from folder WHERE user_id LIKE :user_id;";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":user_id", $user_id);
		$q->execute();
		$result = $q->fetchAll();
		$this->logger->LogDebug("checkFolder returned [{$result[0][0]}] for user [{$username}]");
		if($result[0][0] < 7)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getFolders($user_id){
		$conn = $this->getConnection();
		$saveQuery = "SELECT * from folder WHERE user_id LIKE :user_id;";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":user_id", $user_id);
		$q->execute();
		return $q->fetchAll();
	}	

	/* Checks to see if user has <= 3 lists on the main page
	 * Returns true or false; true if good to insert, false if not
	*/
	public function checkLists($user_id){
		$conn = $this->getConnection();
		$saveQuery = "SELECT user_id FROM list WHERE user_id = :user_id AND folder = NULL;";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":user_id", $user_id);
		$q->execute();
		$result = $q->fetchAll();
		$this->logger->LogDebug("checkListsreturned [{$result[0][0]}] for user [{$username}]");
		if($result[0][0] < 3)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getLists($user_id){
		$conn = $this->getConnection();
		$saveQuery = "SELECT * from list WHERE user_id = :user_id AND folder = NULL;";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":user_id", $user_id);
		$q->execute();
		return $q->fetchAll();
	}	

}
?> 