<?php
class DbConfig 
{	
	private $_host = 'localhost';
	private $_username = 'infonetu_Repos';
	private $_password = 'InfoRepos@@123';
	private $_database = 'infonetu_registration';
	
	protected $connection;
	
	public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
		if(isset($_SESSION['login']) && $_SESSION['login']){
			$this->connection = new mysqli($this->_host, $_SESSION['db_uname'], $_SESSION['db_pwd'], $_SESSION['dbname']);

			if (!$this->connection) {
				die('Cannot connect to database server');
				exit;
			}	
		}

		if (!isset($this->connection)) {
			
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
			
			if (!$this->connection) {
				die('Cannot connect to database server');
				exit;
			}			
		}	
		
		return $this->connection;
	}
}
?>
