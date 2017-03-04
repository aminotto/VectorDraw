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
    <input type="submit" value="Point" id="point">
    <input type="submit" value="Segment" id="line">
    <input type="submit" value="Loupe" id="loupe">
    <input type="submit" value="Cercle" id="cercle">
    <input type="submit" value="Drag And Drop" id="dragAndDrop">
</div>
<div id="canvasContainer">
    <canvas id="drawingField" height="500" width="500">
    </canvas>
</div>
</body>
</html>