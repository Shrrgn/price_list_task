<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Prices</title>
	</head>
	<body>
		
		<table border="1" cellpadding="7">
			<caption><b>Answer of db</b></caption>
			<tr>
				<th>Title</th><th>Description</th><th>DocId</th><th>Date</th><th>Price</th>
			</tr>
			
			<?php foreach ($data as $i): ?>
				<tr>
						<td><?php echo htmlspecialchars($i[0], ENT_QUOTES, 'UTF-8'); ?></td>
						<td><?php echo htmlspecialchars($i[1], ENT_QUOTES, 'UTF-8'); ?></td>
						<td><?php echo htmlspecialchars($i[2], ENT_QUOTES, 'UTF-8'); ?></td>
						<td><?php echo htmlspecialchars($i[3], ENT_QUOTES, 'UTF-8'); ?></td>
						<td><?php echo htmlspecialchars($i[4], ENT_QUOTES, 'UTF-8'); ?></td>	
				</tr>
			<?php endforeach; ?>

		</table>


	</body>
</html>