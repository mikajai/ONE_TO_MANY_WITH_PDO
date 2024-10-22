<?php  

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewClientBtn'])) {

    $query = newClientRec ($pdo, $_POST['first_name'], $_POST['last_name'],
    $_POST['gender'], $_POST['birth_date'], $_POST['contact_num'], $_POST['service_application']);

        if ($query) {
            header("Location: ../index.php");
        }
        else {
            echo "Insertion failed";
        }
}

if (isset($_POST['editNewClientBtn'])) {
    $query = updateNewClientRec($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['gender'], $_POST['birth_date'], $_POST['contact_num'], $_POST['service_application'], $_GET['client_id']);

    if ($query){
        header("Location: ../index.php");
    }
    else {
        echo "Editing client information failed";
    }
}

if (isset($_POST['deleteNewClientBtn'])) {
    $query = deleteNewClientRec($pdo, $_GET['client_id']);

    if ($query) {
        header("Location: ../index.php");
    }
    else {
        echo "Client Information Deletion failed";
    }
}

if (isset($_POST['insertNewPhotographerBtn'])) {
	$query = insertPhotographer($pdo, $_POST['photographer_name'], $_POST['available_schedule'], $_GET['client_id']);

	if ($query) {
		header("Location: ../viewPhotographer.php?client_id=" . $_GET['client_id']);
	}
	else {
		echo "The insertion failed";
	}
}


if (isset($_POST['editPhotographerBtn'])) {
	$query = updatePhotographer($pdo, $_POST['photographer_name'], $_POST['available_schedule'], $_GET['photographer_id']);

	if ($query) {
		header("Location: ../viewPhotographer.php?client_id=" . $_GET['client_id']);
	}
	else {
		echo "Update failed";
	}

}


if (isset($_POST['deletePhotographerBtn'])) {
	$query = deletePhotographer($pdo, $_GET['photographer_id']);

	if ($query) {
		header("Location: ../viewPhotographer.php?client_id=" . $_GET['client_id']);
        exit();
	}
	else {
		echo "The deletion failed";
	}
}

if (isset($_POST['backBtn'])) {
    header("Location: ../index.php");
    exit();
}


if (isset($_POST['deletePhotogbackBtn'])) {
    header("Location: ../index.php");
    exit();
}

?>