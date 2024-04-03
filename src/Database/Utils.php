<?php
require_once './Database.php';

/*
passar qualquer objeto para essa função, desde que ele tenha um método setDb. 
Isso permite que você use a função setDb com instâncias de User, Company, Department 
ou qualquer outra classe que você criar no futuro e que precise de uma 
conexão com o banco de dados.
*/
function setDb($object, Database $db) {
    if (method_exists($object, 'setDb')) {
        $object->setDb($db);
    } else {
        throw new InvalidArgumentException('O objeto não possui um método setDb.');
    }
}

?>
