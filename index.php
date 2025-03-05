<?php

require __DIR__ . '/vendor/autoload.php';
require_once 'gerador_user.php';

use App\UserGenerator;


$userGenerator = new UserGenerator();


$users = $userGenerator->generateUsers(10);


$emailDomains = ['gmail.com', 'hotmail.com', 'outlook.com', 'yahoo.com', 'live.com'];

$generatedEmails = [];


foreach ($users as &$user) {
    if (!isset($user['name']) || empty($user['name'])) {
        $user['name'] = 'Usuario' . rand(1000, 9999);
    }
    do {
        $nameParts = explode(' ', $user['name']);
        $firstName = strtolower($nameParts[0]);
        $randomNumber = rand(100, 999);
        $randomDomain = $emailDomains[array_rand($emailDomains)];
        $user['email'] = $firstName . $randomNumber . '@' . $randomDomain;
    } while (in_array($user['email'], $generatedEmails));
    $generatedEmails[] = $user['email'];
}

array_pop($users);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Gerados</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form method="post">
        <button type="submit" name="generate">Gerar Novos Dados</button>
    </form>
</body>
</html>