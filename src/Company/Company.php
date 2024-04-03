<?php
namespace Company;

class Company {
	private int $id;

	public function greetings() {
		return "Greetings. Your ID is $this->id";
	}
}

?>