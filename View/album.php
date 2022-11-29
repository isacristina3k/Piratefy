<?php

include("../Model/Conexao.php");
include("../Model/Usuarios.php");
include("../Model/Artistas.php");
include("../Model/Albuns.php");
include("../Model/Musicas.php");
include("../Model/Playlists.php");

$idMusica = $_SESSION['idMusica'];
$titulomsc = $_SESSION['tituloMusica'];
//$_SESSION['idMusica'] = $idMusica;
$username = $_SESSION['usuarioLogado'];

$query = mysqli_query($con, "SELECT * FROM usuarios WHERE username = '$username'");

$r = mysqli_fetch_array($query);

$usuarioLogado = $r['username'];

if (isset($_POST['sairButton'])) {
    session_destroy();
    unset($_SESSION['usuarioLogado']);
    header("Location: cadastrar.php");
}

if ($username == null) {
    header("Location: cadastrar.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/index.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <title>Piratefy</title>

</head>

<body>
    <div id="mainContainer">
        <div class="header">
            <div class="row sair">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div class="msg">
                        <?php echo "👋 Boas-vindas, $username 🥰"; ?>
                    </div>
                </div>
                <div id="col6" class="col-sm-6 col-md-6 col-lg-6">
                    <form id="searchForm" action="search.php" method="post">
                        <input id="search" name="search" type="text" placeholder="Procure por álbuns, artistas ou músicas...">
                        <button type="submit" class="btn btn-outline-secondary" style="width: 40px; height: 32px; display: flex; justify-content: center; margin-bottom: 3px;">
                            <img src="./img/icons/search.png" style="width: 22px; height: 22px;">
                        </button>
                    </form>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <form method="POST">
                        <button type="submit" name="sairButton" class="sairButton">SAIR</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="corpo">
            <div class="navBar">
                <div class="col insideNav">
                    <nav>
                        <div class="logo">
                            <a href="index.php">
                                <img src="./img/icons/wicon.png">
                            </a>
                        </div>
                        <div class="group">
                            <div class="navItem">
                                <a href="index.php" class="navItemLink">Início</a>
                            </div>
                            <div class="navItem">
                                <a href="favoritas.php" class="navItemLink">Favoritas</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="insideBody">
                <div class="dadosAlbum" id="height">

                    <?php

                    $id = mysqli_real_escape_string($con, $_GET['id']);
                    $_SESSION['id'] = $id;
                    $sql = mysqli_query($con, "SELECT * FROM `albuns` WHERE id = '$id' ORDER BY titulo ASC");

                    $row = mysqli_num_rows($sql);

                    $idAlbum = mysqli_real_escape_string($con, $_GET['id']);
                    $query = mysqli_query($con, "SELECT * FROM `musicas` WHERE album = '$idAlbum' ORDER BY titulo ASC");
                    $resultados = mysqli_num_rows($query);

                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <div class="row">
                            <div class="secaodireita">
                                <img src="<?php echo $row['capa']; ?>">
                            </div>

                            <div class="secaoesquerda">
                                <b> <?php echo $row['titulo']; ?> </b>
                                <div class="by" style="margin-left: 15px;">
                                    <div class="row">
                                        <p>by:
                                        <div style="text-decoration: underline; margin-left:10px;"><?php echo "<a href='artista.php?id={$row['id']}'>{$row['artista']}</a>"; ?></div>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p> <?php echo $resultados; ?> músicas </p>
                                    </div>
                                </div>
                            </div>

                        <?php
                    }
                        ?>

                        <div class="dadosMusicas" id="scroll">
                            <div class="row">
                                <div class="col-sm-1 col-md-1 col-lg-1" style="font-size: 12px; margin-left: 60px; color: #a0a0a08c;">
                                    ORDEM
                                </div>
                                <div class="col-sm-1 col-md-1 col-lg-1">
                                </div>
                                <div class="col-sm-1 col-md-1 col-lg-1">
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6" style="font-size: 12px; color: #a0a0a08c;">
                                    TÍTULO
                                </div>
                                <div class="col-sm-1 col-md-1 col-lg-1">
                                </div>
                                <div class="col-sm-1 col-md-1 col-lg-1" style="font-size: 12px; color: #a0a0a08c;">
                                    DURAÇÃO
                                </div>
                            </div>

                            <?php

                            $idDoAlbum = mysqli_real_escape_string($con, $_GET['id']);
                            $consulta = mysqli_query($con, "SELECT * FROM `musicas` WHERE album = '$idDoAlbum'");
                            $row = mysqli_num_rows($sql);

                            $i = 0;

                            while ($r = mysqli_fetch_array($consulta)) {
                                $_SESSION['idMusica'] = $r['id'];
                                $_SESSION['tituloMusica'] = $r['titulo'];
                                //inicio do laco da consulta
                            ?>
                                <div class="row">
                                    <div class="col-sm-1 col-md-1 col-lg-1" style="font-size: 12px; margin-left: 75px; margin-top: 35px; color: #a0a0a08c;">
                                        <?php echo $r['ordemAlbum']; ?>
                                    </div>
                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                        <img class='<?php echo "playbtn" . $i; ?>' id='<?php echo "play_" . $i; ?>' src="./img/icons/play4list.png" style="width: 14px; height: 14px; cursor: pointer; margin-top: 35px;">
                                        <img class='<?php echo "pausebtn" . $i; ?>' id='<?php echo "pause_" . $i; ?>' src="./img/icons/pause4list.png" style="width: 14px; height: 14px; cursor: pointer; margin-top: 35px;">
                                        <audio class="audio" src="<?php echo $r['file']; ?>"></audio>
                                    </div>
                                    <div class="col-sm-1 col-md-1 col-lg-1 fotoArt">
                                        <img src="<?php echo $r['fotoArt']; ?>" style="width: 55px; height: 55px;">
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 nomeartista" style="margin-top: 25px;">
                                        <?php echo $r['titulo'], $r['id']; ?>
                                    </div>
                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                        <form action="../Model/insert.php" method="POST">
                                            <button class="buttonFavorito" type="submit">
                                                <img class="favButton" src="./img/icons/heart.png" style="width: 20px; height: 20px; cursor: pointer; margin-left: -7px; margin-bottom: 7px;">
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-sm-1 col-md-1 col-lg-1" style="margin-top: 25px; margin-left: 5px;">
                                        <?php echo $r['duracao']; ?>
                                    </div>
                                </div>
                            <?php
                            $i++;
                            }
                            ?>
                        </div>

                        </div>
                </div>
            </div>
        </div>
        <script src="./js/script.js"></script>
</body>

</html>