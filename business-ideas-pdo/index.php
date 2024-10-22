<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <style>
        body {
			font-family: Times New Roman;
            background-color: #f4f4f4;
            margin: 0;
            padding: 10px;
        }

        .header {
            text-align: center;
            background-color: #E4E0E1;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .header h1 {
            color: #493628;
            margin: 0;
        }

        .header p {
            font-size: 15px;
            color: #000000;
        }

        .container {
            border: 1px solid #9b9595; /* Light grey border */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Space inside the container */
            margin: 10px 0; /* Space between containers */
            background-color: #f9f9f9; /* Light background color */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
            display: inline-block;
        }

        .container h3 {
            margin: 2px 0; 
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
            color: #000000;
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
            width: 98%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .insert-button{
            text-align: right;
            margin-top: 20px;
        }

        a {
            display: inline-block;
            color: blue;
            margin-top: 20px;
            text-decoration: none;
        }
    </style>
    
</head>
<body>
    <div class="header">
        <h1> ˙✧˖° [ ◉¯] Welcome to Shutter Charm Photography Services [ ◉¯] ˙✧˖° </h1>
        <p>Enter clients information below.</p></div>
    
    <form action="core/handleForms.php" method="POST">
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

        <div class="insert-button">
            <input type="submit" name="insertNewClientBtn" value="Save Client Info">
        </div>

    </form>

    <?php $getAllNewClients = getAllNewClients($pdo); ?>
        <?php foreach ($getAllNewClients as $row) { ?>
        <div class="container">
            <h3>Client ID: <?php echo $row['client_id']; ?></h3>
            <h3>First Name: <?php echo $row['first_name']; ?></h3>
            <h3>Last Name: <?php echo $row['last_name']; ?></h3>
            <h3>Birthdate: <?php echo $row['birth_date']; ?></h3>
            <h3>Contact Number: <?php echo $row['contact_num']; ?></h3>
            <h3>Service Application: <?php echo $row['service_application']; ?></h3>

            <div class="editAndDelete" style="float: right; margin-right: 10px;">
			<a href="viewPhotographer.php?client_id=<?php echo $row['client_id']; ?>"> Assigned Photographer | </a>
			<a href="editClientRec.php?client_id=<?php echo $row['client_id']; ?>"> Edit | </a>
			<a href="deleteClientRec.php?client_id=<?php echo $row['client_id']; ?>"> Delete </a>
		    </div>

        </div>
        <?php } ?>
</body>
</html>
