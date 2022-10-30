<?php
	$cnt = isset($_REQUEST['cnt']) ? $_REQUEST['cnt'] : null;
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>로또복권 당첨예상번호</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://kit.fontawesome.com/?????????.js" crossorigin="anonymous"></script>
<style>
	body, html {
		margin: 0;
	}
</style>
</head>
<body class="w3-auto" style="max-width:600px" oncontextmenu="return false" onselectstart="return true">

<div style="margin:30px 0 15px">
	<div class="w3-light-green w3-card-2 w3-xlarge w3-center" style="height:50px;line-height:50px;text-shadow:1px 1px 0 #CACACA"><b>Lotto 당첨확률 100%에 도전</b></div>
</div>

<div class="w3-card-2 w3-margin-bottom">
	<table class="w3-table w3-centered">
		<tr>
			<td style="width:30.84%;vertical-align:middle;line-height:1.2" class="w3-hide-small w3-blue w3-large w3-card-2"><?=date("Y-m-d")?><br>(<?=date("l")?>)</td>
			<td style="width:30.84%;vertical-align:middle;line-height:1.2" class="w3-hide-large w3-hide-medium w3-blue w3-large w3-card-2"><?=date("y-m-d")?><br>(<?=date("l")?>)</td>
			<td style="vertical-align:middle">
				<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
					<input class="w3-button w3-center w3-medium w3-green w3-hover-blue w3-card-4 w3-round w3-mobile" type="number" name="cnt" <?if($cnt) echo "value=$cnt"; else echo "value=1";?> min="1" style="width:80px">
					<input class="w3-button w3-medium w3-green w3-hover-blue w3-card-4 w3-round w3-mobile" type="submit" value="당첨번호추천">
					<input class="w3-button w3-medium w3-green w3-hover-blue w3-card-4 w3-round w3-mobile" type="button" value="초기화" onclick="location.href='index.php'">
				</form>
			</td>
		</tr>
	</table>
</div>

<?php
if(!$cnt) {
	for($no_cnt=1; $no_cnt <= 3; $no_cnt++) { ?>
		<div class="w3-margin-bottom w3-hover-shadow">
			<table class="w3-table w3-centered">
				<tr>
					<td style="width:17%;vertical-align:middle" class="w3-yellow w3-large w3-card-2"><?=$no_cnt?> Lotto</td>
					<td style="width:13.84%;vertical-align:middle" class="w3-green w3-large w3-card-2"><i class="far fa-smile-beam" style="font-size:27px;color:gold"></i></td>
					<td style="width:13.84%;vertical-align:middle" class="w3-green w3-large w3-card-2"><i class="far fa-smile-beam" style="font-size:27px;color:chartreuse"></i></td>
					<td style="width:13.84%;vertical-align:middle" class="w3-green w3-large w3-card-2"><i class="far fa-smile-beam" style="font-size:27px;color:greenyellow"></i></td>
					<td style="width:13.84%;vertical-align:middle" class="w3-green w3-large w3-card-2"><i class="far fa-smile-beam" style="font-size:27px;color:lime"></i></td>
					<td style="width:13.84%;vertical-align:middle" class="w3-green w3-large w3-card-2"><i class="far fa-smile-beam" style="font-size:27px;color:yellow"></i></td>
					<td style="width:13.84%;vertical-align:middle" class="w3-green w3-large w3-card-2"><i class="far fa-smile-beam" style="font-size:27px;color:white"></i></td>
				</tr>
			</table>
		</div>
	<?php
	}
} else {
	for($z=1; $z <= $cnt; $z++) {
		for($i=1; $i <= 45; $i++) {
			$randm[] = $i;
		}
		shuffle($randm);
		shuffle($randm);
		$luckyNo = array_rand($randm, 6);

		$goodNo = [];
		for($k=0; $k < count($luckyNo); $k++) {
			array_push($goodNo, $randm[$luckyNo[$k]]);
		}
		sort($goodNo);
	?>
		<div class="w3-margin-bottom w3-hover-shadow">
			<table class="w3-table w3-centered">
				<tr>
					<td style="width:17%;vertical-align:middle" class="w3-yellow w3-large w3-card-2"><?=$z?> Lotto</td>
					<td style="width:13.84%;vertical-align:middle" class="w3-light-green w3-large w3-card-2"><?=$goodNo[0]?></td>
					<td style="width:13.84%;vertical-align:middle" class="w3-light-green w3-large w3-card-2"><?=$goodNo[1]?></td>
					<td style="width:13.84%;vertical-align:middle" class="w3-light-green w3-large w3-card-2"><?=$goodNo[2]?></td>
					<td style="width:13.84%;vertical-align:middle" class="w3-light-green w3-large w3-card-2"><?=$goodNo[3]?></td>
					<td style="width:13.84%;vertical-align:middle" class="w3-light-green w3-large w3-card-2"><?=$goodNo[4]?></td>
					<td style="width:13.84%;vertical-align:middle" class="w3-light-green w3-large w3-card-2"><?=$goodNo[5]?></td>
				</tr>
			</table>
		</div>
		<?php
		unset($randm);
		unset($luckyNo);
		unset($goodNo);
	}
}
?>

<div class="w3-center w3-margin-top">
	<span style="font-size:12px;color:#A2A2A2">This program is optimized for the Chrome browser.</span><br>
	<span style="font-size:12px;color:#555555">Copyright &copy 2022 Made by Kim Inho. All right reserved.</span>
</div>

<!-- <div class="w3-center w3-margin-top">
	<button class="w3-button w3-green w3-hover-blue w3-card-4 w3-round" style="width:57%" type="button" onclick="window.print()">PRINT</button>
</div> -->

</body>
</html>