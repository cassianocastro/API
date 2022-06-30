<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" type="image/x-icon" size="24x24" href="src/public/favicons/favicon.ico">
	<link rel="stylesheet" type="text/css" href="src/public/css/table.css">

  <title>API | Server Info</title>
</head>
<body>
	<?php include_once __DIR__ . '/includes/header.inc'; ?>
	<main>

		<section>
			<h2>Server</h2>

			<table border="1">
				<caption>Server Info</caption>
				<thead>
					<tr>
						<th>Keys</th>
						<th>Values</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($this->params as $key => $value) : ?>
						<tr>
							<td><?= $key; ?></td>
							<td><?= $value; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

		</section>

	</main>
	<?php include_once __DIR__ . '/includes/footer.inc'; ?>
</body>
</html>