<?php

    class Album{

    private $con;
    private $idAlbum;
    private $titulo;
    private $artista;
    private $capa;

    public function __construct($con, $idAlbum) {
        $this->con = $con;
        $this->idAlbum = $idAlbum;

        $query = mysqli_query($this->con, "SELECT * FROM albuns WHERE id = '$this->idAlbum'");
        $album = mysqli_fetch_array($query);

        $this->titulo = $album['titulo'];
        $this->artista = $album['artista'];
        $this->capa = $album['capa'];
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getArtista() {
        return $this->artista;
    }

    public function getCapa() {
        return $this->capa;
    }

    public function getQtdMsc() {
        $query = mysqli_query($this->con, "SELECT id FROM musicas WHERE album = $this->id");
        return mysqli_num_rows($query);
    }

    public function getIdMusicas() {
        $query = mysqli_query($this->con, "SELECT id FROM musicas WHERE album = $this->id ORDER BY 
            ordemAlbum ASC");
        $array = [];

        while ($row = mysqli_fetch_array($query)) {
            array_push($array, $row['id']);
        }
        return $array;
    }
}

/*
-- TABELA ALBUNS ---

CREATE TABLE `albuns` (
  `id` SERIAL PRIMARY KEY,
  `titulo` varchar(250) NOT NULL,
  `artista` varchar(250) NOT NULL,
  `capa` varchar(500) NOT NULL
); 

INSERT INTO `albuns` (`titulo`, `artista`, `capa`) VALUES
('Justice', 'Justin Bieber', './img/justice.png'),
('HOLY FVCK', 'Demi Lovato', './img/holyfvck.png'),
('SOUR', 'Olivia Rodrigo', './img/sour.png'),
('Familia', 'Camila Cabello', './img/familia.png'),
('Manic', 'Halsey', './img/manic.png'),
('Happier Than Ever', 'Billie Eilish', './img/happierthanever.png'),
('7/27', 'Fifth Harmony', './img/727.png'),
('Eu Feat. Você', 'Melim', './img/eufeatvoce.png');

*/
?>