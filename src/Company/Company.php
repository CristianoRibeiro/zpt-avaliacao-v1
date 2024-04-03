<?php
namespace Company;

use Database\Database;

class Company {
	private int $id;
	private $db;

	public function greetings() {
		return "Greetings. Your ID is $this->id";
	}

	public function setDb(Database $db) {
        $this->db = $db;
    }
}

?>