<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>VectorDraw</title>
	<link href="css/style.css" rel="stylesheet">
	<script type="text/javascript" src="js/functionBis.js"></script>
</head>
<body onload="load();" id="container">
<div id="panelLeft">
	<div id="titrepanel">
		<h1>Outils</h1>
	</div>
	<div class="divlogo">
		<input type="image" src="img/cursorLogo.png" id="point" class="logo" width="40">
		<div class="popup">
			<h2 class="titreNotice">Point</h2>
            <ul>
			<li><p>Cliquer pour poser un point</p></li>
            </ul>
		</div>
	</div>
	<div class="divlogo">
		<input type="image" src="img/segmentLogo.png" id="line" class="logo" width="40">
		<div class="popup">
			<h2 class="titreNotice">Segment</h2>
            <ul>
			<li><p>Cliquer pour placer la première extrémité</p></li>
			<li><p>Cliquer de nouveau pour placer la seconde extrémité</p></li>
            </ul>
		</div>
	</div>
	<div class="divlogo">
		<input type="image" src="img/loupeLogo.png" id="loupe" class="logo" width="40">
		<div class="popup">
			<h2 class="titreNotice">Zoom</h2>
            <ul>
			<li><p>Cliquer pour zoomer (x6 maximum)</p></li>
			<li><p>Maintenir 'Ctrl' et cliquer pour dézoomer</p></li>
            </ul>
		</div>
	</div>
	<div class="divlogo">
		<input type="image" src="img/cercleLogo.png" id="cercle" class="logo" width="40">
		<div class="popup">
			<h2 class="titreNotice">Cercle</h2>
            <ul>
			<li><p>Cliquer pour poser le centre</p></li>
			<li><p>Déplacer la souris et cliquer de nouveau pour définir le rayon</p></li>
                </ul>
		</div>
	</div>
	<div class="divlogo">
		<input type="image" src="img/dropLogo.png" id="dragAndDrop" class="logo" width="40">
		<div class="popup">
			<h2 class="titreNotice">Drag and drop</h2>
			<ul>
                <li><p>Cliquer puis déplacer la souris sur une zone vide (déplacement de toute la zone)</p></li>
                <li><p>Cliquer puis déplacer la souris sur un point (déplacement du point)</p></li>
                <li><p>Maintenir 'Ctrl' et cliquer sur un point (déplacement de la figure associée)</p></li>
			</ul>
		</div>
	</div>
	<div class="divlogo">
		<input type="image" src="img/rotationLogo.png" id="rotation" class="logo" width="40">
		<div class="popup">
			<h2 class="titreNotice">Rotation</h2>
            <ul>
			<li><p>Cliquer sur une zone vide (rotation de tous les poits par rapport au centre)</p></li>
            <li><p>Cliquer sur un point (rotation de la figure uniquement)</p></li>
            </ul>
		</div>
	</div>
</div>
<div id="canvasContainer">
	<canvas id="drawingField" height="500" width="500">
	</canvas>
</div>
</body>
</html>