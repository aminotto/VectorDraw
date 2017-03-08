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
		<span class="popup">Placer des points</span>
	</div>
	<div class="divlogo">
		<input type="image" src="img/segmentLogo.png" id="line" class="logo" width="40">
		<span class="popup">Tracer des segments</span>
	</div>
	<div class="divlogo">
		<input type="image" src="img/loupeLogo.png" id="loupe" class="logo" width="40">
		<span class="popup">Zoomer</span>
	</div>
	<div class="divlogo">
		<input type="image" src="img/cercleLogo.png" id="cercle" class="logo" width="40">
		<span class="popup">Tracer un cercle</span>
	</div>
    <div class="divlogo">
		<input type="image" src="img/dropLogo.png" id="dragAndDrop" class="logo" width="40">
		<span class="popup">Drag and drop</span>
	</div>
	<div class="divlogo">
		<input type="image" src="img/rotationLogo.png" id="rotation" class="logo" width="40">
		<span class="popup">Rotation</span>
	</div>
</div>
<div id="canvasContainer">
    <canvas id="drawingField" height="500" width="500">
    </canvas>
</div>
</body>
</html>
