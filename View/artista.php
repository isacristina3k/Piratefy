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
                <div class="dadosalbum">

                    <?php

                    $id = mysqli_real_escape_string($con, $_GET['id']);
                    $sql = mysqli_query($con, "SELECT * FROM `artistas` WHERE id = '$id'");
                    $row = mysqli_num_rows($sql);

                    $queryArtista = mysqli_query($con, "SELECT * FROM `albuns`");
                    $results = mysqli_fetch_array($queryArtista);
                    $artista = $results['artista'];

                    while ($row = mysqli_fetch_array($sql)) {


                        $query = mysqli_query($con, "SELECT * FROM `albuns` WHERE artista LIKE '$artista'");
                        $resultados = mysqli_num_rows($query);
                    ?>
                        <div class="row">
                            <div class="secaodireita">
                                <div class="fotoArtista">
                                    <img src="<?php echo $row['fotoArtista']; ?>">
                                </div>
                            </div>

                            <div class="secaoesquerda">
                                <b> <?php echo $row['nome']; ?> </b>
                            </div>
                        </div>

                        <br />
                        <br />

                        <p>
                        <h5>Álbuns</h5>
                        <br />

                        <div class="row campo">

                            <?php

                            $idAlbum = mysqli_real_escape_string($con, $_GET['id']);
                            $sql = mysqli_query($con, "SELECT * FROM `albuns` WHERE id = '$idAlbum'");
                            $row = mysqli_num_rows($sql);


                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <div class="artista">
                                    <br />

                                    <?php echo "<a href='album.php?id={$row['id']}'>"; ?>
                                    <img src="<?php echo $row['capa']; ?>">
                                    <?php echo "</a>"; ?>

                                    <div class="nomealbum">
                                        <b>
                                            <p>
                                                <?php echo $row['titulo']; ?>
                                            </p>
                                        </b>
                                    </div>
                                </div>
                                </p>

                            <?php
                            }
                            ?>

                        </div>

                    <?php
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