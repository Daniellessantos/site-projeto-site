<?php
// Inicializa variáveis para armazenar mensagens de erro
$nomeErr = $emailErr = $senhaErr = "";
$nome = $email = $senha = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação do nome
    if (empty($_POST["nome"])) {
        $nomeErr = "Nome é obrigatório";
    } else {
        $nome = htmlspecialchars($_POST["nome"]);
    }

    // Validação do email
    if (empty($_POST["email"])) {
        $emailErr = "Email é obrigatório";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato de email inválido";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    // Validação da senha
    if (empty($_POST["senha"])) {
        $senhaErr = "Senha é obrigatória";
    } elseif (strlen($_POST["senha"]) < 6) {
        $senhaErr = "A senha deve ter pelo menos 6 caracteres";
    } else {
        $senha = htmlspecialchars($_POST["senha"]);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <h2>Formulário de Cadastro</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nome: <input type="text" name="nome" value="<?php echo $nome;?>">
        <span style="color:red;">* <?php echo $nomeErr;?></span>
        <br><br>
        Email: <input type="text" name="email" value="<?php echo $email;?>">
        <span style="color:red;">* <?php echo $emailErr;?></span>
        <br><br>
        Senha: <input type="password" name="senha">
        <span style="color:red;">* <?php echo $senhaErr;?></span>
        <br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>

