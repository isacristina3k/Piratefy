<?php

require_once("../Model/Conexao.php");
include("../Model/Usuarios.php");
include("../Model/Artistas.php");
include("../Model/Albuns.php");
include("../Model/Musicas.php");
include("../Model/Playlists.php");

$username = $_SESSION['usuarioLogado'];

if (isset($_POST['sairButton'])) {
    session_destroy();
    unset($_SESSION['usuarioLogado']);
    header("Location: cadastrar.php");
}

if ($username == null) {
    header("Location: cadastrar.php");
}

$search = $_POST['search'];
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

    <title>Busca | Piratefy</title>
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
                <div class="resultados">
                    <div class="row consulta">
                        <span>Álbuns</span>
                        <div class="busca">

                            <?php

                            $sql = mysqli_query($con, "SELECT * FROM `albuns` WHERE titulo LIKE '$search%' ORDER BY titulo ASC LIMIT 6");
                            $row = mysqli_num_rows($sql);

                            if ($row > 0) {
                                while ($row = mysqli_fetch_array($sql)) {
                            ?>

                                    <div class="perfilalbum">

                                        <?php echo "<a href='album.php?id={$row['id']}'>"; ?>
                                        <img src="<?php echo $row['capa']; ?>">
                                        <?php echo "</a>"; ?>

                                        <br />
                                        <div class="nomeartista">
                                            <b>
                                                <?php echo $row['titulo']; ?>
                                            </b>
                                        </div>
                                    </div>

                            <?php
                                }
                            } else {
                                echo "Desculpe, pesquisa não encontrada 😢";
                            }
                            ?>

                        </div>
                    </div>
                    <br>
                    <div class="row consulta">
                        <span>Artistas</span>
                        <div class="busca">

                            <?php

                            $sql = mysqli_query($con, "SELECT * FROM `artistas` WHERE nome LIKE '$search%' ORDER BY nome ASC LIMIT 6");
                            $row = mysqli_num_rows($sql);

                            if ($row > 0) {
                                while ($row = mysqli_fetch_array($sql)) {
                            ?>

                                    <div class="perfilartista">

                                        <?php echo "<a href='artista.php?id={$row['id']}'>"; ?>
                                        <img src="<?php echo $row['fotoArtista']; ?>">
                                        <?php echo "</a>"; ?>

                                        <br />
                                        <div class="nomeartista">
                                            <b>
                                                <?php echo $row['nome']; ?>
                                            </b>
                                        </div>
                                    </div>

                            <?php
                                }
                            } else {
                                echo "Desculpe, pesquisa não encontrada 😢";
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <br>
                <div class="row consulta" id="scroll">
                    <span>Músicas</span>
                    <div class="busca">

                        <?php

                        $sql = mysqli_query($con, "SELECT * FROM `musicas` WHERE titulo LIKE '$search%' ORDER BY titulo ASC");
                        $row = mysqli_num_rows($sql);

                        if ($row > 0) {
                        ?>

                            <div>
                                <div class="row">
                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6" style="font-size: 12px; color: #a0a0a08c; margin-left: 65px;">
                                        TÍTULO
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2" style="font-size: 12px; color: #a0a0a08c;">
                                        DURAÇÃO
                                    </div>
                                </div>

                                <?php
                                $i = 0;
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                    <div class="row" style="margin-left: 10px;">
                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                        <img class='<?php echo "playbtn" . $i; ?>' src="./img/icons/play4list.png" style="width: 14px; height: 14px; cursor: pointer; margin-top: 35px;">
                                        <img class='<?php echo "pausebtn" . $i; ?>' src="./img/icons/pause4list.png" style="width: 14px; height: 14px; cursor: pointer; margin-top: 35px;">
                                            <audio class="audio" src="<?php echo $row['file']; ?>"></audio>
                                        </div>
                                        <div class="col-sm-2 col-md-2 col-lg-2 fotoArt">
                                            <img src="<?php echo $row['fotoArt']; ?>" style="width: 55px; height: 55px;">
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 nomeartista" style="margin-top: 25px; margin-left: 65px;">
                                            <?php echo $row['titulo']; ?>
                                        </div>
                                        <div class="col-sm-2 col-md-2 col-lg-2" style="margin-top: 25px; margin-left: 15px;">
                                            <?php echo $row['duracao']; ?>
                                        </div>
                                    </div>
                            <?php
                            $i++;
                                }
                            } else {
                                echo "Desculpe, pesquisa não encontrada 😢";
                            }
                            ?>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>

</html>