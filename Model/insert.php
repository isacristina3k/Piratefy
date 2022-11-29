<?php

include("Conexao.php");

$idMusica = $_SESSION['idMusica'];
$titulomsc = $_SESSION['tituloMusica'];

$id = $_SESSION['id'];
$_SESSION['idMusica'] = $idMusica;
$sql = mysqli_query($con, "SELECT * FROM `albuns` WHERE id = '$id' ORDER BY titulo ASC");
$row = mysqli_fetch_array($sql);
$idDoAlbum = $row['id'];

$username = $_SESSION['usuarioLogado'];
$query = mysqli_query($con, "SELECT * FROM usuarios WHERE username = '$username'");
$r = mysqli_fetch_array($query);
$usuarioLogado = $r['username'];
$username = $usuarioLogado;

$playlistQuery = mysqli_query($con, "SELECT * FROM playlists WHERE autor LIKE '$username' AND nome LIKE 'favoritas'");
$result = mysqli_fetch_array($playlistQuery);
$idPlaylist = $result['id'];
//$qtdlinhas = mysqli_num_rows($playlistQuery);

$consulta = mysqli_query($con, "SELECT * FROM `musicas` WHERE id = '$idMusica'");
$resultado = mysqli_fetch_array($consulta);
//$idMusica = $resultado['id'];
//$titulo = $resultado['titulo'];
//$fotoArt = $resultado['fotoArt'];
//$file = $resultado['file'];

$insertQuery = mysqli_query($con, "INSERT INTO musicasPlaylists (idMusica, idPlaylist) VALUES ($idMusica, $idPlaylist)");

//echo "<script> alert ('Música adicionada às favoritas 🤩');</script>";
echo $idMusica, $titulomsc;
//header("Location: ../View/favoritas.php");
?>