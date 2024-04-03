<?php
namespace Department;


use Database\Database;
use User\User;

require_once './User.php';

class Department {
	private $db;
    private User $user;

	public function __construct() {
        $this->user = new User(); // Commit Questao 6. Aonde foi aplicado boas boas praticas de desenvolvimento.
	}

	public function setDb(Database $db) {
        $this->db = $db;
    }
}
?>