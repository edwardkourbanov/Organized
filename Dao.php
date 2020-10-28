<?php
require_once 'KLogger.php';

class Dao {
	private $host = "us-cdbr-east-02.cleardb.com";
	private $db = "heroku_7f3ca4f0a241444";
	private $user = "bb02ab37eccc80";
	private $pass = "5fef022c";

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
  
  
  
}

?>