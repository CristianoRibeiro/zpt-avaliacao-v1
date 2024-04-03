<?php
namespace Department;

require_once './User.php';

class Department {
	private User\User $user;

	public function __construct() {
		$this->user = new User\User(); // @todo fixme
	}
}
?>