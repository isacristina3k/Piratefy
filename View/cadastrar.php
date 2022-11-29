<?php

require_once("../Model/Conexao.php");
include("../Model/Conta.php");
include("../Model/Constantes.php");

$conta = new Conta($con);

include("../Controller/cCadastrar.php");
include("../Controller/cLogin.php");

function getValorEntrada($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/cadastrar.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/index.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <title> Login | Piratefy </title>
</head>

<body>

    <?php
    if (isset($_POST['cadastrarButton'])) {
        echo '
            <script>
                $(document).ready(function() {
                    $("#loginForm").hide();
                    $("#cadastroForm").show();
                });
            </script>';
    } else {
        echo '
            <script>
                $(document).ready(function() {
                    $("#loginForm").show();
                    $("#cadastroForm").hide();
                });
            </script>';
    }

    ?>
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="cadastrar.php" method="post">

                    <h2>Entre na sua conta</h2>

                    <p>
                    </p>

                    <p>
                        <?php echo $conta->getErro(Constantes::$loginFailed); ?>
                        <label for="loginUsername">Nome de Usuário:</label>
                    <div class="row">
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="Nome de Usuário" value="<?php getValorEntrada('loginUsername') ?>" required>
                    </div>
                    </p>

                    <p>
                        <label for="loginSenha">Senha:</label>
                    <div class="row">
                        <input id="loginSenha" name="loginSenha" type="password" placeholder="Senha" required>
                        <img src="./img/icons/invisible.png" onclick="loginsenha()" class="pass-icon" id="pass-icon">
                        <script src="./js/script.js"></script>
                    </div>
                    </p>

                    <button class="buttonL" type="submit" name="loginButton">ENTRAR</button>

                    <div class="possuiConta">
                        <span id="esconderLogin">Ainda não tem uma conta? Cadastre-se aqui.</span>
                    </div>

                </form>

                <form id="cadastroForm" action="cadastrar.php" method="post">

                    <h2>Crie sua conta</h2>

                    <p>
                    </p>

                    <p>
                        <?php echo $conta->getErro(Constantes::$usernameLen); ?>
                        <?php echo $conta->getErro(Constantes::$usernameExiste); ?>
                        <label for="username">Nome de Usuário:</label>
                    <div class="row">
                        <input id="username" name="username" type="text" placeholder="Insira seu nome de usuário" value="<?php getValorEntrada('username') ?>" required>
                    </div>
                    </p>

                    <p>
                        <?php echo $conta->getErro(Constantes::$nomeLen); ?>
                        <label for="nome">Nome:</label>
                    <div class="row">
                        <input id="nome" name="nome" type="text" placeholder="Insira seu nome" value="<?php getValorEntrada('nome') ?>" required>
                    </div>
                    </p>

                    <p>
                        <?php echo $conta->getErro(Constantes::$sobrenomeLen); ?>
                        <label for="sobrenome">Sobrenome:</label>
                    <div class="row">
                        <input id="sobrenome" name="sobrenome" type="text" placeholder="Insira seu sobrenome" value="<?php getValorEntrada('sobrenome') ?>" required>
                    </div>
                    </p>

                    <p>
                        <?php echo $conta->getErro(Constantes::$emailsNaoCombinam); ?>
                        <?php echo $conta->getErro(Constantes::$emailInvalido); ?>
                        <?php echo $conta->getErro(Constantes::$emailExiste); ?>
                        <label for="email">e-mail:</label>
                    <div class="row">
                        <input id="email" name="email" type="email" placeholder="Insira seu e-mail" value="<?php getValorEntrada('email') ?>" required>
                    </div>
                    </p>

                    <p>
                        <label for="email2">Confirme seu e-mail:</label>
                    <div class="row">
                        <input id="email2" name="email2" type="email" placeholder="Insira seu e-mail novamente" value="<?php getValorEntrada('email2') ?>" required>
                    </div>
                    </p>

                    <p>
                        <?php echo $conta->getErro(Constantes::$senhasNaoCombinam); ?>
                        <?php echo $conta->getErro(Constantes::$senhaLetraNumero); ?>
                        <?php echo $conta->getErro(Constantes::$senhaLen); ?>

                        <label for="senha">Senha:</label>
                    <div class="row">
                        <input id="senhaCad" name="senhaCad" type="password" placeholder="Crie sua senha" required>
                        <img src="./img/icons/invisible.png" onclick="senhacad()" class="pass-icon" id="pass-icon2">
                        <script src="./js/script.js"></script>
                    </div>
                    </p>

                    <p>
                        <label for="senha2">Confirme sua senha:</label>
                    <div class="row">
                        <input id="senhaConfirm" name="senhaConfirm" type="password" placeholder="Confirme sua senha" required>
                        <img src="./img/icons/invisible.png" onclick="senhaconfirm()" class="pass-icon" id="pass-icon3">
                        <script src="./js/script.js"></script>
                    </div>
                    </p>

                    <button class="buttonC" type="submit" name="cadastrarButton">CADASTRAR</button>

                    <div class="possuiConta">
                        <span id="esconderCadastrar">Já tem uma conta? Entre aqui.</span>
                    </div>
                </form>
            </div>

            <div id="textoLogin">
                <h1>Comece a curtir, agora mesmo</h1>
                <h2>Ouça os maiores sucessos gratuitamente</h2>
                <ul>
                    <li>Descubra músicas que você vai amar</li>
                    <li>Ouça os maiores hits gratuitamente</li>
                    <li>Navegue pelas playlists</li>
                </ul>
            </div>

        </div>
    </div>
    <script src="./js/cadastrar.js"></script>
</body>

</html>