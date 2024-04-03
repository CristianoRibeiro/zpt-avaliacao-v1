<?php
require_once './User.php';

function setDb(User\User $user, $db) {
	$user->setDb($db);
}

?>