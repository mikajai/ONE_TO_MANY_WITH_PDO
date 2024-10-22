<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Deleting Photographer Info</title>
	<style>
		body {
			font-family: Times New Roman;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
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

        .deletePhotographer {
            margin-bottom: 20px;
        }

        .deleteBtn {
			text-align: right;
            margin-top: 20px;
        }
       
	</style>
</head>
<body>
	<?php $getPhotographerByID = getPhotographerByID($pdo, $_GET['photographer_id']); ?>
	<h1>Are you sure you want to delete this Photographer Information?</h1>
	<div class="deletePhotographer" style="border: 1px solid #9b9595; padding: 20px; width: 700px; border-radius: 8px;">
		
		<h2>Photographer Name: <?php echo $getPhotographerByID['photographer_name'] ?></h2>
		<h2>Available Schedule: <?php echo $getPhotographerByID['available_schedule'] ?></h2>
		<h2>Client Name: <?php echo $getPhotographerByID['client_name'] ?></h2>
		<h2>Date Added: <?php echo $getPhotographerByID['date_added'] ?></h2>

		<div class="deleteBtn">

			<form action="core/handleForms.php?photographer_id=<?php echo $_GET['photographer_id']; ?>&client_id=<?php echo $_GET['client_id']; ?>" method="POST">
				<input type="submit" name="deletePhotographerBtn" value="Delete">
				<input type="submit" name="deletePhotogbackBtn" value="Back">
			</form>			
			
		</div>	

	</div>
</body>
</html>
