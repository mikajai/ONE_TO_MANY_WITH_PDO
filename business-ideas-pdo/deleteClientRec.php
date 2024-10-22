<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting Client Info</title>
    <style>
        body {
            font-family: Times New Roman;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .deleteInfo {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: black;
        }

        h2 {
            background: #fff;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .deleteBtn {
            text-align: right;
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <div class='deleteInfo'>
        <h1> Are you sure you want to delete this Client Information? </h1>
    </div>
    <?php $getNewClientByID = getNewClientByID($pdo, $_GET['client_id']); ?>
        <h2>First Name: <?php echo $getNewClientByID['first_name']; ?></h2>
        <h2>Last Name: <?php echo $getNewClientByID['last_name']; ?></h2>
        <h2>Birthdate: <?php echo $getNewClientByID['birth_date']; ?></h2>
        <h2>Contact Number: <?php echo $getNewClientByID['contact_num']; ?></h2>
        <h2>Service Application: <?php echo $getNewClientByID['service_application']; ?></h2>
        <h2>Date Added: <?php echo $getNewClientByID['date_added']; ?></h2>

        <div class="deleteBtn">
        <form action="core/handleForms.php?client_id=<?php echo ($_GET['client_id']); ?>" method="POST">
            <input type="submit" name="deleteNewClientBtn" value="Delete">
            <input type="submit" name="backBtn" value="Back">
        </form>
    </div>
</body>
</html>