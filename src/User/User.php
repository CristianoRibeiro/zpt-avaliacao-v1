<?php
namespace User;

class User {
	private $db;

	public function getUsernamesByIds($ids) {
        $usernames = [];

        $query = 'SELECT username FROM user WHERE id IN (' . implode(',', $ids) . ')';
        $results = $this->db->q($query);

        foreach ($results as $result) {
            $usernames[] = $result['username'];
        }
		
        return $usernames;
    }

	public function setDb($db) {
		if (!$db || $db->isClosed()) {
			return false;
		}

		if ($db->debug) {
			$db->setGeneralLog('on');
			error_log($db);
		}

		if ($db->profiling) {
			$db->setSlowLog('on');
		}

		$this->db = $db;
	}
}

?>