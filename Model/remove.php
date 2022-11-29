<?php

include("Conexao.php");

$username = $_SESSION['usuarioLogado'];

$query = mysqli_query($con, "SELECT * FROM usuarios WHERE username = '$username'");
$r = mysqli_fetch_array($query);

$usuarioLogado = $r['username'];

$username = $usuarioLogado;

$playlistQuery = mysqli_query($con, "SELECT * FROM playlists WHERE autor LIKE '$username' AND nome LIKE 'favoritas'");
$result = mysqli_fetch_array($playlistQuery);

$idPlaylist = $result['id'];

$musicasQuery = mysqli_query($con, "SELECT musicas.id, musicas.titulo, musicas.duracao, musicas.file, musicas.fotoArt FROM musicas, musicasPlaylists, playlists WHERE playlists.id = $idPlaylist AND musicasPlaylists.idPlaylist = playlists.id AND musicas.id = musicasPlaylists.idMusica ORDER BY titulo ASC");
$fetch = mysqli_fetch_array($musicasQuery);
$idMusica = $fetch['id'];

$removeQuery = mysqli_query($con, "DELETE FROM musicasPlaylists WHERE idMusica = $idMusica");

header("Location: ../View/favoritas.php");

//echo "<script> alert ('Música removida das favoritas 😅');</script>";
?>