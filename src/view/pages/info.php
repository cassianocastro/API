<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API | Server Info</title>
    <link rel="icon" type="image/x-icon" size="24x24" href="src/view/res/api.png">
</head>
<body>
    <?php require_once __DIR__ . '/templates/header.php'; ?>
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
                    <?php foreach ($this->params as $key => $value): ?>
                        <tr>
                            <td><?= $key; ?></td>
                            <td><?= $value; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php require_once __DIR__ . '/templates/footer.php'; ?>
</body>
</html>
