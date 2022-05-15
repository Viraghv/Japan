<?php
	include "Components/header.php";
	include "Components/nav.php";
?>

<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<title>Himedzsi várkastély</title>
	<link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
</head>
<body>
<?php
	drawHeader();
	drawNavigation("HIMEDZSI VÁRKASTÉLY");
?>
<div>
	<img id="himeji-img" src="assets/himeji.jpg" alt="Himedzsi-várkastély" />
	<h2 id="himeji-header">A kastélyról röviden</h2>
	<p class="himeji-txt" > A Muromachi-kor kulturális virágzását politikai válság követte, az ōnin háború (1467-1477) nyomán megdőlt az Ashikaga sógunátus hatalma. A Momoyama-korban (1573-1600) a hatalom valódi birtokosai a nagy földterületekkel rendelkező földesurak (daimyō) lettek. Közülük néhányan szövetségek és komoly haderők létrehozásával megpróbálták egyesíteni az országot. Oda Nobunaga (1534-1582) megbuktatta az utolsó Ashikaga sógunt és jelentős lépéseket tett az ország egyesítése felé. Azuchiban, Kyototól keletre akarta kialakītani az új politikai és kulturális centrumot, kastélyával a középpontban. Toyotomi Hideyoshi (1536-1598) folytatta országegyesítő törekvéseit, majd halála után Tokugawa Ieyasu (1542-1616) ragadta magához a hatalmat. A korszak művészetét a szekuláris tematika felvirágzása jellemzi. A centralizáló politikai törekvéseket gazdasági fellendülés követte, mely kedvezett a művészetek kiteljesedésének. Különleges színfoltot hozott a korszak művészetébe az európaiak megjelenése 1542 után. A Momoyama-kor művészetének két legvirágzóbb területe az építészet és a festészet volt. Az építészetben két új épülettípus alakult ki a szamurájkultúra igényeihez igazodva, a kastélyerődítmény és a shoin stílusú lakóépületek, melyek egyik legfontosabb helyisége a tatami matracokkal borītott padlójú fogadószoba volt, ahol jellegzetes polcokon vagy az alkóvban, a szoba legkitüntettebb helyén műtárgyakat, íróeszközöket is elhelyeztek.</p>
	<img id="himeji-layout" src="assets/himeji-layout.png" alt="Himedzsi alaprajz">
	<p class="himeji-txt">A kastélyerődítmények nagy része 100 esztendő alatt épült ki, az 1530-as évektől kezdődően. Korábban az erődítmények egyszerű, ideiglenes kőépületek voltak a stratégiailag fontos helyeken, csak a folyamatos háborúskodás tette szükségessé, hogy olyan erődítések épüljenek ki, ahol helyet kap a kormányzat, a földesúr rezidenciája reprezentatív fogadóhelyiségekkel, elszállásolható a hadsereg, védhető a nyilakkal és a falbontó eszközökkel, illetve a tűzfegyverekkel szemben is. Ugyanakkor fontos szerepe volt az impozáns épületeknek a politikai reprezentációban is. </p>
	<p class="himeji-txt">Himeji, vagy másnéven a „Fehér gém“ kastélyerődítmény a legszebb, eredeti formájában fennmaradt kastély Japánban. 1581-ben Toyotomi Hideyoshi építetett itt, Osakatól nyugatra egy háromszintes vártornyot (tenshu), majd a Toyotomi klán sekigaharai veresége után az erődítményt átadták a győzelmet aratott Tokugawa Ieyasu vejének, Ikeda Terumasanak. Ő építette ki Himejit jelenlegi formájában 1601-1609 között. Az épületet méretei és összetett szerkezete emelte a többi erődítmény fölé. Az épületkomplexum magja a négyszögletes alaprajzú Öregtorony, ezt övezi a központi terület, melyet labirintusra emlékeztető fallal védenek. A különböző méretű és formájú, egymásba nyíló területek kialakításával jött létre a bonyolult védelmi rendszer. A megerősített Öregtoronyhoz széles, nyílt terepen, valamint szűk ösvényeken, keskeny kapukon, kanyargós utakon lehet csak eljutni, azonban kívülről az íves tetőzetek sora könnyeddé teszi az épület látványát.</p>
</div>
<div>
	<video id="himeji-vid" controls width="600">
		<source src="assets/video.mp4" type="video/mp4"/>
	</video>
</div>
<footer>
	<p>Készítette: <span style="text-shadow: 1px 1px black">Dékány Márk, Virágh Vivien</span></p>
</footer>
</body>
</html>
