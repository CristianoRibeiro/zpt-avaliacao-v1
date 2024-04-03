<?php

namespace Company;

require_once 'Company.php';

class CompanyClient extends Company {
    private $id;
    private $registration;

    public function __construct($id, $registration) {
        $this->id = $id;
        $this->registration = $registration;
    }

    public function greetings() {
        return "Greetings. Your ID is $this->id and your registration number is $this->registration";
    }
}
?>