<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Client Info</title>
    
    <style>
        body {
            font-family: Times New Roman;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .edit {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            color: black;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
        }

        p {
            margin: 10px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="date"],
        input[type="tel"],
        
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button-sub {
            text-align: right;
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <?php $getNewClientByID = getNewClientByID($pdo, $_GET['client_id']); ?>
    <div class='edit'>
        <h1> You are editing the Client's Information... </h1>
    </div>
    <form action="core/handleForms.php?client_id=<?php echo $_GET['client_id']; ?>" method="POST">

        <p><label for="firstName"> First Name: </label> <input type="text" name="first_name" required></p>
        <p><label for="lastName"> Last Name: </label> <input type="text" name="last_name" required></p>
        <p><label for="birth_date"> Birthdate: </label> <input type="date" name="birth_date" required></p>
        <p><label for="contact_num"> Contact Number: </label> <input type="tel" name="contact_num" required></p>
        <p>
            <label for="service_application"> Service Application: </label> 
            <select name="service_application" required>
                <option value="Pet Photography"> Pet Photography </option>
                <option value="Event Photography"> Event Photography </option>
                <option value="Food Photography"> Food Photography </option>
                <option value="Fashion Photography"> Fashion Photography </option>
                <option value="Portrait Photography"> Portrait Photography </option>
                <option value="Commercial Photography"> Commercial Photography </option>
                <option value="Others"> Others </option>
            </select>
        </p>
        <div class="button-sub">
            <input type="submit" name="editNewClientBtn" value="Update Client Info">
        </div>
    </form>
</body>
</html>