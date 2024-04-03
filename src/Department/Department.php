<?php
namespace Department;


use Database\Database;
use User\User;

require_once './User.php';

class Department {
	private $db;
    private $user;

	public function __construct() {
        $this->user = new User(); // Instanciando a classe User
	}

	public function setDb(Database $db) {
        $this->db = $db;
    }
}
?>