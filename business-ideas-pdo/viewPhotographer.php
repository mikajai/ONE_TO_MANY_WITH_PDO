<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Viewing your Photographer</title>

	<style>
		body {
            font-family: Times New Roman;
            margin: 20px;
            background-color: #f4f4f4;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        p {
            margin: 20px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
			text-align: right;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 5px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
		
        a {
            color: blue;
            text-decoration: none;
        }

	</style>
</head>
<body>
	<form action="core/handleForms.php?client_id=<?php echo $_GET['client_id']; ?>" method="POST">
		<p>
			<label for="photographer_name">Photographer Name: </label> 
			<input type="text" name="photographer_name">
		</p>
		<p>
			<label for="available_schedule">Available Schedule: </label> 
			<input type="date" name="available_schedule">
		</p>
		<input type="submit" name="insertNewPhotographerBtn">
	</form>

	<a href="index.php">Return to Home</a>

	<table style="width:80%; margin-top: 30px;">
	  <tr>
	    <th>Photographer ID</th>
	    <th>Photographer Name</th>
	    <th>Available Schedule</th>
	    <th>Client Name</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  
      <?php $getPhotographerByClientRec = getPhotographerByClientRec($pdo, $_GET['client_id']); ?>
	  	<?php foreach ($getPhotographerByClientRec as $row) { ?>
			<tr>
				<td><?php echo $row['photographer_id']; ?> </td>	  	
				<td><?php echo $row['photographer_name']; ?></td>	  	
				<td><?php echo $row['available_schedule']; ?></td>	  	
				<td><?php echo $row['client_name']; ?></td>	  	
				<td><?php echo $row['date_added']; ?></td>
				<td>
					<a href="editPhotographer.php?photographer_id=<?php echo $row['photographer_id']; ?>&client_id=<?php echo $_GET['client_id']; ?>"> Edit </a>
					<a href="deletePhotographer.php?photographer_id=<?php echo $row['photographer_id']; ?>&client_id=<?php echo $_GET['client_id']; ?>"> Delete </a>
				</td>	  	
			</tr>
		<?php } ?>
	</table>
</body>
</html>