<?php  

function newClientRec($pdo, $first_name, $last_name, $gender, $birth_date, $contact_num, $service_application) {

    $sql = "INSERT INTO client_records (first_name, last_name, gender, birth_date, contact_num, service_application) 
            VALUES(?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $gender, $birth_date, $contact_num, $service_application]);

    if ($executeQuery) {
        return true;
    }
}

function getAllNewClients($pdo) {
    $sql = "SELECT * FROM client_records";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getNewClientByID ($pdo, $client_id){
    $sql = "SELECT * FROM client_records WHERE client_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$client_id]);

    if ($executeQuery){
        return $stmt->fetch();
    }
}

function updateNewClientRec($pdo, $first_name, $last_name, $gender, $birth_date, $contact_num, $service_application, $client_id){

    $sql = "UPDATE client_records
            SET first_name = ?,
                last_name = ?,
                gender = ?,
                birth_date = ?,
                contact_num = ?,
                service_application = ?
            WHERE client_id = ?
        ";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $gender, $birth_date, $contact_num, $service_application, $client_id]);

    if ($executeQuery){
        return true;
    }
}

function deleteNewClientRec($pdo, $client_id) {
    $deleteClientPhotogRec = "DELETE FROM photographer WHERE client_id = ?";
    $deleteStmt = $pdo->prepare($deleteClientPhotogRec);
    $executeDeleteQuery = $deleteStmt->execute([$client_id]);

    if ($executeDeleteQuery) {
        $sql = "DELETE FROM client_records WHERE client_id = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$client_id]);

        if ($executeQuery) {
            return true;
        }
    }
}

function getPhotographerByClientRec($pdo, $client_id) {
    $sql = "SELECT
                photographer.photographer_id AS photographer_id,
                photographer.photographer_name AS photographer_name,
                photographer.available_schedule AS available_schedule,
                photographer.date_added AS date_added,
                CONCAT(client_records.first_name, ' ',client_records.last_name) AS client_name
            FROM photographer
            JOIN client_records ON photographer.client_id = client_records.client_id
            WHERE photographer.client_id = ?
            GROUP BY photographer.photographer_id
            ";

    $stmt = $pdo->prepare($sql); 
    $executeQuery = $stmt->execute([$client_id]);
    
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}


function insertPhotographer($pdo, $photographer_name, $available_schedule, $client_id) {
    $sql = "INSERT INTO photographer (photographer_name, available_schedule, client_id)
            VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$photographer_name, $available_schedule, $client_id]);

    if ($executeQuery) {
        return true;
    }
}

function getPhotographerByID($pdo, $photographer_id) {
	$sql = "SELECT 
				photographer.photographer_id AS photographer_id,
                photographer.photographer_name AS photographer_name,
                photographer.available_schedule AS available_schedule,
				photographer.date_added AS date_added,
				CONCAT(client_records.first_name, ' ',client_records.last_name) AS client_name
			FROM photographer
			JOIN client_records ON photographer.client_id = client_records.client_id
			WHERE photographer.photographer_id  = ? 
			GROUP BY photographer.photographer_id
            ";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$photographer_id]);
	
    if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updatePhotographer($pdo, $photographer_name, $available_schedule, $photographer_id) {
	$sql = "UPDATE photographer
			SET photographer_name = ?,
				available_schedule = ?
			WHERE photographer_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$photographer_name, $available_schedule, $photographer_id]);

	if ($executeQuery) {
		return true;
	}
}

function deletePhotographer($pdo, $photographer_id) {
	$sql = "DELETE FROM photographer WHERE photographer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$photographer_id]);
	if ($executeQuery) {
		return true;
	}
}
?>