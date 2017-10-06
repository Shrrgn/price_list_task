<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Prices</title>
	</head>
	<body>
		
		<table>
			<caption>Answer of db</caption>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>DocId</th>
				<th>Date</th>
				<th>Price</th>
			</tr>

			<tr>
				<?php foreach ($data as $i): ?>
					<th><?php echo $i[0]; ?></th>
					<th><?php echo $i[1]; ?></th>
					<th><?php echo $i[2]; ?></th>
					<th><?php echo $i[3]; ?></th>
					<th><?php echo $i[4]; ?></th>
				<?php endforeach; ?>
			</tr>


		</table>


	</body>
</html>