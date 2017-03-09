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
                        <li>Cliquer pour poser un point</li>
                    </ul>
                </div>
            </div>
            <div class="divlogo">
                <input type="image" src="img/segmentLogo.png" id="line" class="logo" width="40">
                <div class="popup">
                    <h2 class="titreNotice">Segment</h2>
                    <ul>
                        <li>Cliquer pour placer la première extrémité</li>
                        <li>Cliquer de nouveau pour placer la seconde extrémité</li>
                    </ul>
                </div>
            </div>
            <div class="divlogo">
                <input type="image" src="img/loupeLogo.png" id="loupe" class="logo" width="40">
                <div class="popup">
                    <h2 class="titreNotice">Zoom</h2>
                    <ul>
                        <li>Cliquer pour zoomer (x6 maximum)</li>
                        <li>Maintenir 'Ctrl' et cliquer pour dézoomer</li>
                    </ul>
                </div>
            </div>
            <div class="divlogo">
                <input type="image" src="img/cercleLogo.png" id="cercle" class="logo" width="40">
                <div class="popup">
                    <h2 class="titreNotice">Cercle</h2>
                    <ul>
                        <li>Cliquer pour poser le centre</li>
                        <li>Déplacer la souris et cliquer de nouveau pour définir le rayon</li>
                    </ul>
                </div>
            </div>
            <div class="divlogo">
                <input type="image" src="img/dropLogo.png" id="dragAndDrop" class="logo" width="40">
                <div class="popup">
                    <h2 class="titreNotice">Drag and drop</h2>
                    <ul>
                        <li>Cliquer dans une zone vide puis déplacer (déplacement de toute la zone)</li>
                        <li>Cliquer sur un point puis déplacer (déplacement du point)</li>
                        <li>Maintenir 'Ctrl', cliquer sur un point puis déplacer (déplacement de la figure associée)</li>
                    </ul>
                </div>
            </div>
            <div class="divlogo">
                <input type="image" src="img/rotationLogo.png" id="rotation" class="logo" width="40">
                <div class="popup">
                    <h2 class="titreNotice">Rotation</h2>
                    <ul>
                        <li>Cliquer dans zone vide (rotation de tous les points par rapport au centre)</li>
                        <li>Cliquer sur un point (rotation de la figure uniquement)</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="canvasContainer">
            <canvas id="drawingField" height="500" width="500"></canvas>
        </div>
    </body>
</html>