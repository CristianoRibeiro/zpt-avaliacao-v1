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

	public function getMaxDepartmentForEachUser() {
        // Consulta SQL para obter o maior departamento de cada usuário
        $query = 'SELECT ud.user, MAX(d.employees) AS max_employees, d.name AS department_name
                  FROM user_department ud
                  JOIN department d ON ud.department = d.id
                  GROUP BY ud.user';

        $results = $this->db->q($query);

        $maxDepartments = [];

        // Iterar sobre os resultados
        foreach ($results as $result) {
            $userId = $result['user'];
            $maxEmployees = $result['max_employees'];
            $departmentName = $result['department_name'];

            // Armazenar o maior departamento para cada usuário no array
            $maxDepartments[$userId] = [
                'max_employees' => $maxEmployees,
                'department_name' => $departmentName
            ];
		}

		return $maxDepartments;

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