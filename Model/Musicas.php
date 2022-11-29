<?php

    class Musicas{

        private $con;
        private $idMusicas;
        private $dadosMySql;
        private $titulo;
        private $idArtista;
        private $idAlbum;
        private $duracao;
        private $file;
        private $fotoArt;

        public function __construct($con, $idMusicas) {
            $this->con = $con;
            $this->idMusicas = $idMusicas;

			$query = mysqli_query($this->con, "SELECT * FROM musicas WHERE id='$this->idMusicas'");
			$this->dadosMySql = mysqli_fetch_array($query);
            $this->titulo = $this->dadosMySql['titulo'];
            $this->idArtista = $this->dadosMySql['artista'];
            $this->idAlbum = $this->dadosMySql['album'];
            $this->duracao = $this->dadosMySql['duracao'];
            $this->file = $this->dadosMySql['file'];
            $this->fotoArt = $this->dadosMySql['fotoArt'];
            
        }

        public function getIdMusicas() {
            return $this->idMusicas;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function getArtista() {
            return new Artista($this->con, $this->idArtista);
        }

        public function getAlbum() {
            return new Album($this->con, $this->idAlbum);
        }

        public function getDuracao() {
            return $this->duracao;
        }

        public function getFile() {
            return $this->file;
        }

        public function getfotoArt() {
            return $this->fotoArt;
        }

        public function getDados() {
            return $this->dadosMySql;
        }
    }

/*

-- TABELA MUSICAS ---

CREATE TABLE `musicas` (
  `id` SERIAL PRIMARY KEY,
  `titulo` varchar(250) NOT NULL,
  `artista` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `duracao` varchar(8) NOT NULL,
  `file` varchar(500) NOT NULL,
  `ordemAlbum` int(11) NOT NULL,
  `fotoArt` varchar(500) NOT NULL
);

-- ALBUM JUSTICE --

INSERT INTO `musicas` (`titulo`, `artista`, `album`, `duracao`, `file`, `ordemAlbum`, `fotoArt`) VALUES
('2 Much', 4, 1, '2:32', './music/jb-justice-1-2much.mp3', 1, './img/justice.png'),
('Deserve You', 4, 1, '3:07', './music/jb-justice-2-deserveyou.mp3', 2, './img/justice.png'),
('As I Am (feat. Khalid)', 4, 1, '2:54', './music/jb-justice-3-asiam.mp3', 3, './img/justice.png'),
('Off My Face', 4, 1, '2:36', './music/jb-justice-4-offmyface.mp3', 4, './img/justice.png'),
('Holy (feat. Chance The Rapper)', 4, 1, '3:32', './music/jb-justice-5-holy.mp3', 5, './img/justice.png'),
('Unstable (feat. The Kid LAROI)', 4, 1, '2:38', './music/jb-justice-6-unstable.mp3', 6, './img/justice.png'),
('MLK Interlude', 4, 1, '1:44', './music/jb-justice-7-mlkinterlude.mp3', 7, './img/justice.png'),
('Die For You (feat. Dominic Fike)', 4, 1, '3:18', './music/jb-justice-8-dieforyou.mp3', 8, './img/justice.png'),
('Hold On', 4, 1, '2:50', './music/jb-justice-9-holdon.mp3', 9, './img/justice.png'),
('Somebody', 4, 1, '2:59', './music/jb-justice-10-somebody.mp3', 10, './img/justice.png'),
('Ghost', 4, 1, '2:33', './music/jb-justice-11-ghost.mp3', 11, './img/justice.png'),
('Peaches (feat. Daniel Caesar & Giveon)', 4, 1, '3:18', './music/jb-justice-12-peaches.mp3', 12, './img/justice.png'),
('Love You Different (feat. BEAM)', 4, 1, '3:06', './music/jb-justice-13-loveyoudifferent.mp3', 13, './img/justice.png'),
('Loved By You (feat. Burna Boy)', 4, 1, '2:39', './music/jb-justice-14-lovedbyyou.mp3', 14, './img/justice.png'),
('Anyone', 4, 1, '3:10', './music/jb-justice-15-anyone.mp3', 15, './img/justice.png'),
('Lonely (feat. benny blanco)', 4, 1, '2:29', './music/jb-justice-16-lonely.mp3', 16, './img/justice.png');

-- ALBUM HOLY FVCK --

INSERT INTO `musicas` (`titulo`, `artista`, `album`, `duracao`, `file`, `ordemAlbum`, `fotoArt`) VALUES
('FREAK (feat. YUNGBLUD)', 8, 2, '2:36', './music/dl-holyfvck-1-freak.mp3', 1, './img/holyfvck.png'),
('SKIN OF MY TEETH', 8, 2, '2:42', './music/dl-holyfvck-2-skinofmyteeth.mp3', 2, './img/holyfvck.png'),
('SUBSTANCE', 8, 2, '2:40', './music/dl-holyfvck-3-substance.mp3', 3, './img/holyfvck.png'),
('EAT ME (feat. Royal & the Serpent)', 8, 2, '3:00', './music/dl-holyfvck-4-eatme.mp3', 4, './img/holyfvck.png'),
('HOLY FVCK', 8, 2, '2:34', './music/dl-holyfvck-5-holyfvck.mp3', 5, './img/holyfvck.png'),
('29', 8, 2, '2:43', './music/dl-holyfvck-6-29.mp3', 6, './img/holyfvck.png'),
('HAPPY ENDING', 8, 2, '3:49', './music/dl-holyfvck-7-happyending.mp3', 7, './img/holyfvck.png'),
('HEAVEN', 8, 2, '2:27', './music/dl-holyfvck-8-heaven.mp3', 8, './img/holyfvck.png'),
('CITY OF ANGELS', 8, 2, '2:51', './music/dl-holyfvck-9-cityofangels.mp3', 9, './img/holyfvck.png'),
('BONES', 8, 2, '2:31', './music/dl-holyfvck-10-bones.mp3', 10, './img/holyfvck.png'),
('WASTED', 8, 2, '3:03', './music/dl-holyfvck-11-wasted.mp3', 11, './img/holyfvck.png'),
('COME TOGETHER', 8, 2, '3:33', './music/dl-holyfvck-12-cometogether.mp3', 12, './img/holyfvck.png'),
('DEAD FRIENDS', 8, 2, '2:57', './music/dl-holyfvck-13-deadfriends.mp3', 13, './img/holyfvck.png'),
('HELP ME (with Dead Sara)', 8, 2, '3:23', './music/dl-holyfvck-14-helpme.mp3', 14, './img/holyfvck.png'),
('FEED', 8, 2, '3:13', './music/dl-holyfvck-15-feed.mp3', 15, './img/holyfvck.png'),
('4 EVER 4 ME', 8, 2, '3:46', './music/dl-holyfvck-16-4ever4me.mp3', 16, './img/holyfvck.png');

-- ALBUM SOUR --

INSERT INTO `musicas` (`titulo`, `artista`, `album`, `duracao`, `file`, `ordemAlbum`, `fotoArt`) VALUES
('brutal', 7, 3, '2:23', './music/or-sour-1-brutal.mp3', 1, './img/sour.png'),
('traitor', 7, 3, '3:49', './music/or-sour-2-traitor.mp3', 2, './img/sour.png'),
('drivers license', 7, 3, '4:02', './music/or-sour-3-driverslicense.mp3', 3, './img/sour.png'),
('1 step forward, 3 steps back', 7, 3, '2:43', './music/or-sour-4-1sf3sb.mp3', 4, './img/sour.png'),
('deja vu', 7, 3, '3:35', './music/or-sour-5-dejavu.mp3', 5, './img/sour.png'),
('good 4 u', 7, 3, '2:58', './music/or-sour-6-good4u.mp3', 6, './img/sour.png'),
('enough for you', 7, 3, '3:22', './music/or-sour-7-efu.mp3', 7, './img/sour.png'),
('happier', 7, 3, '2:55', './music/or-sour-8-happier.mp3', 8, './img/sour.png'),
('jealousy, jealousy', 7, 3, '2:53', './music/or-sour-9-jj.mp3', 9, './img/sour.png'),
('favorite crime ', 7, 3, '2:32', './music/or-sour-10-favoritecrime.mp3', 10, './img/sour.png'),
('hope ur ok', 7, 3, '3:29', './music/or-sour-11-hopeurok.mp3', 11, './img/sour.png');

-- ALBUM FAMILIA --

INSERT INTO `musicas` (`titulo`, `artista`, `album`, `duracao`, `file`, `ordemAlbum`, `fotoArt`) VALUES
('Familia', 1, 4, '0:18', './music/cc-familia-1-familia.mp3', 1, './img/familia.png'),
('Celia', 1, 4, '2:33', './music/cc-familia-2-celia.mp3', 2, './img/familia.png'),
('psychofreak (feat. WILLOW)', 1, 4, '3:21', './music/cc-familia-3-psychofreak.mp3', 3, './img/familia.png'),
('Bam Bam (feat. Ed Sheeran)', 1, 4, '3:26', './music/cc-familia-4-bambam.mp3', 4, './img/familia.png'),
('La Buena Vida', 1, 4, '3:17', './music/cc-familia-5-labuenavida.mp3', 5, './img/familia.png'),
('Quiet', 1, 4, '2:43', './music/cc-familia-6-quiet.mp3', 6, './img/familia.png'),
("Boys Don't Cry", 1, 4, '3:43', './music/cc-familia-7-boysdontcry.mp3', 7, './img/familia.png'),
('Hasta los Dientes (feat. María Becerra)', 1, 4, '3:08', './music/cc-familia-8-hastalosdientes.mp3', 8, './img/familia.png'),
('No Doubt', 1, 4, '3:11', './music/cc-familia-9-nodoubt.mp3', 9, './img/familia.png'),
("Don't Go Yet", 1, 4, '2:45', './music/cc-familia-10-dontgoyet.mp3', 10, './img/familia.png'),
('Lola (feat. de Yotuel)', 1, 4, '3:05', './music/cc-familia-11-lola.mp3', 11, './img/familia.png'),
('everyone at this party', 1, 4, '2:49', './music/cc-familia-12-eatp.mp3', 12, './img/familia.png');

-- ALBUM MANIC --

INSERT INTO `musicas` (`titulo`, `artista`, `album`, `duracao`, `file`, `ordemAlbum`, `fotoArt`) VALUES
('Ashley', 5, 5, '3:06', './music/hy-manic-1-ashley.mp3', 1, './img/manic.png'),
('clementine', 5, 5, '3:54', './music/hy-manic-2-clementine.mp3', 2, './img/manic.png'),
('Graveyard', 5, 5, '3:01', './music/hy-manic-3-graveyard.mp3', 3, './img/manic.png'),
('You should be sad', 5, 5, '3:25', './music/hy-manic-4-ysbs.mp3', 4, './img/manic.png'),
('Forever ... (is a long time)', 5, 5, '2:47', './music/hy-manic-5-forever.mp3', 5, './img/manic.png'),
("Dominic's Interlude", 5, 5, '1:16', './music/hy-manic-6-dominic.mp3', 6, './img/manic.png'),
('I HATE EVERYBODY', 5, 5, '2:51', './music/hy-manic-7-ihe.mp3', 7, './img/manic.png'),
('3 am', 5, 5, '3:54', './music/hy-manic-8-3am.mp3', 8, './img/manic.png'),
('Without Me', 5, 5, '3:21', './music/hy-manic-9-withoutme.mp3', 9, './img/manic.png'),
('Finally // beautiful stranger', 5, 5, '3:41', './music/hy-manic-10-fbs.mp3', 10, './img/manic.png'),
("Alanis' Interlude", 5, 5, '2:41', './music/hy-manic-11-alanis.mp3', 11, './img/manic.png'),
('killing boys', 5, 5, '2:23', './music/hy-manic-12-killingboys.mp3', 12, './img/manic.png'),
("SUGA's Interlude", 5, 5, '2:18', './music/hy-manic-13-suga.mp3', 13, './img/manic.png'),
('More', 5, 5, '2:33', './music/hy-manic-14-more.mp3', 14, './img/manic.png'),
('Still Learning', 5, 5, '3:31', './music/hy-manic-15-stilllearning.mp3', 15, './img/manic.png'),
('929', 5, 5, '2:54', './music/hy-manic-16-929.mp3', 16, './img/manic.png');

-- ALBUM Happier Than Ever --

INSERT INTO `musicas` (`titulo`, `artista`, `album`, `duracao`, `file`, `ordemAlbum`, `fotoArt`) VALUES
('Getting Older', 2, 6, '4:04', './music/be-hte-1-gettingolder.mp3', 1, './img/happierthanever.png'),
("I didn't change my number", 2, 6, '2:38', './music/be-hte-2-idcmn.mp3', 2, './img/happierthanever.png'),
('Billie Bossa Nova', 2, 6, '3:16', './music/be-hte-3-bbn.mp3', 3, './img/happierthanever.png'),
('my future', 2, 6, '3:30', './music/be-hte-4-myfuture.mp3', 4, './img/happierthanever.png'),
('Oxytocin', 2, 6, '3:30', './music/be-hte-5-oxytocin.mp3', 5, './img/happierthanever.png'),
('GOLDWING', 2, 6, '2:31', './music/be-hte-6-goldwing.mp3', 6, './img/happierthanever.png'),
('Lost Cause', 2, 6, '3:32', './music/be-hte-7-lostcause.mp3', 7, './img/happierthanever.png'),
("Halley's Comet", 2, 6, '3:54', './music/be-hte-8-halleyscomet.mp3', 8, './img/happierthanever.png'),
('Not My Responsibility', 2, 6, '3:47', './music/be-hte-9-nmr.mp3', 9, './img/happierthanever.png'),
('OverHeated', 2, 6, '3:34', './music/be-hte-10-overheated.mp3', 10, './img/happierthanever.png'),
('Everybody Dies', 2, 6, '3:26', './music/be-hte-11-everybodydies.mp3', 11, './img/happierthanever.png'),
('Your Power', 2, 6, '4:05', './music/be-hte-12-yourpower.mp3', 12, './img/happierthanever.png'),
('NDA', 2, 6, '3:15', './music/be-hte-13-nda.mp3', 13, './img/happierthanever.png'),
('Therefore I Am', 2, 6, '2:53', './music/be-hte-14-thereforeiam.mp3', 14, './img/happierthanever.png'),
('Happier Than Ever', 2, 6, '4:58', './music/be-hte-15-happierthanever.mp3', 15, './img/happierthanever.png'),
('Male Fantasy', 2, 6, '3:14', './music/be-hte-16-malefantasy.mp3', 16, './img/happierthanever.png');

-- ALBUM 7/27 --

INSERT INTO `musicas` (`titulo`, `artista`, `album`, `duracao`, `file`, `ordemAlbum`, `fotoArt`) VALUES
("That's My Girl", 3, 7, '3:24', './music/fh-727-1-thatsmygirl.mp3', 1, './img/727.png'),
('Work From Home (Feat. Ty Dolla $ign)', 3, 7, '3:34', './music/fh-727-2-workfromhome.mp3', 2, './img/727.png'),
('The Life', 3, 7, '3:20', './music/fh-727-3-thelife.mp3', 3, './img/727.png'),
('Write On Me', 3, 7, '3:39', './music/fh-727-4-writeonme.mp3', 4, './img/727.png'),
('I Lied', 3, 7, '3:23', './music/fh-727-5-ilied.mp3', 5, './img/727.png'),
('All In My Head (Flex) (Feat. Fetty Wap)', 3, 7, '3:30', './music/fh-727-6-allinmyhead.mp3', 6, './img/727.png'),
('Squeeze', 3, 7, '3:33', './music/fh-727-7-squeeze.mp3', 7, './img/727.png'),
('Gonna Get Better', 3, 7, '3:36', './music/fh-727-8-gonnagetbetter.mp3', 8, './img/727.png'),
('Scared Of Happy', 3, 7, '3:23', './music/fh-727-9-scaredofhappy.mp3', 9, './img/727.png'),
('Not That Kinda Girl (feat. Missy Elliott)', 3, 7, '3:11', './music/fh-727-10-ntkg.mp3', 10, './img/727.png'),
('Dope', 3, 7, '3:32', './music/fh-727-11-dope.mp3', 11, './img/727.png'),
('No Way', 3, 7, '2:57', './music/fh-727-12-noway.mp3', 12, './img/727.png');

-- ALBUM EU FEAT. VOCE --
INSERT INTO `musicas` (`titulo`, `artista`, `album`, `duracao`, `file`, `ordemAlbum`, `fotoArt`) VALUES
('Eu Feat. Você', 6, 8, '3:05', './music/ml-eufeatvoce-1-eufeatvoce.mp3', 1, './img/eufeatvoce.png'),
('Relax', 6, 8, '2:28', './music/ml-eufeatvoce-2-relax.mp3', 2,  './img/eufeatvoce.png'),
('Cabelo de Anjo', 6, 8, '3:34', './music/ml-eufeatvoce-3-cabelodeanjo.mp3', 3,  './img/eufeatvoce.png'),
('Gelo', 6, 8, '2:29', './music/ml-eufeatvoce-4-gelo.mp3', 4, './img/eufeatvoce.png'),
('Menina De Rua', 6, 8, '3:13', './music/ml-eufeatvoce-5-meninaderua.mp3', 5, './img/eufeatvoce.png'),
('Quem Me Viu', 6, 8, '3:10', './music/ml-eufeatvoce-6-quemmeviu.mp3', 6, './img/eufeatvoce.png'),
('Pega A Visão', 6, 8, '2:42', './music/ml-eufeatvoce-7-pegaavisão.mp3', 7, './img/eufeatvoce.png'),
('Cantando Eu Vou', 6, 8, '2:48', './music/ml-eufeatvoce-8-cantandoeuvou.mp3', 8, './img/eufeatvoce.png');

*/
?>