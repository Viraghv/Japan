<?php
	include "Components/header.php";
	include "Components/nav.php";
?>

<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<title>Főoldal</title>
	<link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
</head>
<body>

<?php
	drawHeader();
	drawNavigation("KEZDŐLAP");
?>
<section class="side-by-side-content">
	<div class="text-container">
		<h2>Japán</h2>
		<p class="text">
			<img class="image" src="assets/image2.jpg" alt="Image of japan" style="float: left; margin: 0 20px 0 0" />
			<em> Japán </em> (japánul: 日本, átírással: <i>Nippon</i> vagy <i>Nihon</i>, hivatalosan: 日本国, átírással: <i>Nippon-koku</i> vagy <i>Nihon-koku</i>, vagyis Japán Állam) szigetország Kelet-Ázsiában. Nyugaton a Japán-tenger, északon az Ohotszki-tenger, keleten a Csendes-óceán és délen a Kelet-<wbr/>kínai<wbr/>-tenger mossa partjait. A <b>6852</b> szigetéből  az öt legnagyobb <u>Honsú</u>, <u>Hokkaidó</u>, <u>Kjúsú</u>, <u>Sikoku</u> és <u>Okinava</u>, melyek az ország területének <b>97%</b>-át adják. Az ország 47 prefektúrára <wbr/> oszlik, a legészakibb Hokkaidó, a legdélibb pedig Okinava. Népessége 2015-ben <b>127 millió</b><wbr/> fő volt. Fővárosa és legnagyobb városa <em>Tokió</em>, melynek lakossága <b>13 millió</b>.<wbr/> Az agglomerációt is beleszámítva a világ legnépesebb várostömörülésének számít, összesen 38 millió <wbr/> lakossal. A fővároson kívül még <em>tizenegy</em> milliós <wbr/> nagyváros található Japánban. A népesség 98,5%-a japán nemzetiségű, a lakosság túlnyomó része városokban él.
		</p>
	</div>
</section>
<section class="side-by-side-content">
	<div class="text-container">
		<h2>Kultúra</h2>
		<p class="text">
			<img class="image" src="assets/image1.jpg" alt="Image of japan" />
			A japán kultúra jelentős változásokon esett át a több évezredes fennállása során. Japán őshonos kultúrája elsősorban a jajoi nép emlékeiből ered, mely a japán szigetek területén telepedett le az időszámításunk előtt 1000 évvel. A <mark>jajoi kultúra</mark> gyorsan elterjedt, illetve a <mark>dzsómon kultúrával</mark> keveredett. A mai japánok hozzávetőleges származása 92%-ban jajoi és 8%-ban dzsómon.
			Az ókor és középkor folyamán a japán kultúrára elsődlegesen a különböző <mark>kínai dinasztiák</mark> gyakoroltak hatást. A kínai befolyás példája japán írásrendszer részét képző kandzsi nevű kínai írásjegyek, melyek annak ellenére is használatosak, hogy <strong>nincsen</strong> semminemű genetikai kapcsolat a kínai és japán nyelv között. A tágabb értelemben vett közelmúltban, azaz a 19. században kezdődött Meidzsi-kor óta inkább a nyugati világ influálja Japánt és kultúráját. E sokféle hatás hozzájárult a japán kultúra sajátos mai formájának kifejlődéséhez, s immár a világ legnagyobb kultúráinak egyike, mely főképpen a tömegkultúrája népszerűségének köszönhetően tehetett szert globális ismertségre.
		</p>
	</div>
</section>
<table class="korszakok-table">
	<tr>
		<th id="idopont">Időpont</th>
		<th id="kor">Kor</th>
		<th id="korszak">Korszak</th>
		<th id="alkorszak">Alkorszak</th>
		<th id="kormanyzat">Kormányzat</th>
	</tr>
	<tr>
		<td headers="idopont">i. e. 30 000–10 000</td>
		<td headers="kor" colspan="2">Őskor</td>
		<td headers="alkorszak"></td>
		<td headers="kormanyzat" rowspan="3"></td>
	</tr>
	<tr>
		<td headers="idopont">i. e. 10 000–300</td>
		<td headers="kor" rowspan="3">Ókor</td>
		<td headers="korszak">Dzsómon</td>
		<td headers="alkorszak"></td>
	</tr>
	<tr>
		<td headers="idopont">i. e. 900 – i. sz. 250 (átfedésekkel)</td>
		<td headers="korszak">Jajoi</td>
		<td headers="alkorszak"></td>
	</tr>
	<tr>
		<td headers="idopont">kb. 250–538</td>
		<td headers="korszak">Kofun</td>
		<td headers="alkorszak"></td>
		<td headers="kormanyzat" rowspan="4">császárság</td>
	</tr>
	<tr>
		<td headers="idopont">538–710</td>
		<td headers="kor" rowspan="3">Klasszikus kor</td>
		<td headers="korszak">Aszuka</td>
		<td headers="alkorszak"></td>
	</tr>
	<tr>
		<td headers="idopont">710–794</td>
		<td headers="korszak">Nara</td>
		<td headers="alkorszak"></td>
	</tr>
	<tr>
		<td headers="idopont">794–1185</td>
		<td headers="korszak">Heian</td>
		<td headers="alkorszak"></td>
	</tr>
	<tr>
		<td headers="idopont">1185–1333</td>
		<td headers="kor" rowspan="6">Középkor</td>
		<td headers="korszak">Kamakura</td>
		<td headers="alkorszak"></td>
		<td headers="kormanyzat">Kamakura-sógunátus</td>
	</tr>
	<tr>
		<td headers="idopont">1333–1336</td>
		<td headers="korszak">Kenmu restauráció</td>
		<td headers="alkorszak"></td>
		<td headers="kormanyzat">császárság</td>
	</tr>
	<tr>
		<td headers="idopont">1336–1392</td>
		<td headers="korszak" rowspan="3">Muromacsi</td>
		<td headers="alkorszak">Nanboku-csó</td>
		<td headers="kormanyzat" rowspan="2">Asikaga-sógunátus</td>
	</tr>
	<tr>
		<td headers="idopont">1392–1467</td>
		<td headers="alkorszak"></td>
	</tr>
	<tr>
		<td headers="idopont">1467–1573</td>
		<td headers="alkorszak" rowspan="2">Szengoku kor</td>
		<td headers="kormanyzat">Asikaga-sógunátus és szengoku daimjók</td>
	</tr>
	<tr>
		<td headers="idopont">1573–1603</td>
		<td headers="korszak">Azucsi–Momojama-kor</td>
		<td headers="kormanyzat">Oda Nobunaga, Tojotomi Hidejosi és Tokugava Iejaszu</td>
	</tr>
	<tr>
		<td headers="idopont">1603–1868</td>
		<td headers="kor">Kora újkor</td>
		<td headers="korszak">Edo</td>
		<td headers="alkorszak">Tokugava-kor</td>
		<td headers="kormanyzat">Tokugava-sógunátus</td>
	</tr>
	<tr>
		<td headers="idopont">1868–1912</td>
		<td headers="kor" rowspan="3">Újkor</td>
		<td headers="korszak">Meidzsi</td>
		<td headers="alkorszak" rowspan="3">Japán Birodalom</td>
		<td headers="kormanyzat" rowspan="3">császárság</td>
	</tr>
	<tr>
		<td headers="idopont">1912–1926</td>
		<td headers="kormanyzat">Taisó</td>
	</tr>
	<tr>
		<td headers="idopont">1926–1945</td>
		<td headers="kormanyzat">Sóva (második világháború előtti)</td>
	</tr>
	<tr>
		<td headers="idopont">1945–1952</td>
		<td headers="kor" rowspan="4">Mai Japán</td>
		<td headers="korszak">Sóva (háború utáni megszállás)</td>
		<td headers="alkorszak" rowspan="3">a háború után</td>
		<td headers="kormanyzat">szövetséges megszálló erők</td>
	</tr>
	<tr>
		<td headers="idopont">1952–1989</td>
		<td headers="korszak">Sóva (megszállás után)</td>
		<td headers="kormanyzat" rowspan="3">alkotmányos monarchia</td>
	</tr>
	<tr>
		<td headers="idopont">1989–2019</td>
		<td headers="korszak">Heiszei</td>
	</tr>
	<tr>
		<td headers="idopont">2019–</td>
		<td headers="korszak">Reiva</td>
		<td headers="alkorszak"></td>
	</tr>
</table>
<footer>
	<p>Készítette: <span style="text-shadow: 1px 1px black">Dékány Márk, Virágh Vivien</span></p>
</footer>
</body>
</html>
