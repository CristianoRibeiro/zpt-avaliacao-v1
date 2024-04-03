<?php

require_once 'CompanyClient.php';

use Company\CompanyClient;

// Exemplo de uso:
$companyClient = new CompanyClient(123, "ABC123");
echo $companyClient->greetings(); 
?>
