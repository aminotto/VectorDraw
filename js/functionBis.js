var body;
var canvas;
var context;
var tabPoints;
var tabLines;
var tabCircle;
var toolActivated;

/*
Récupération des éléments et création des listener
 */
function load() {
    tabPoints=[];
    tabLines=[];
    tabCircle=[];
    body = document.getElementsByTagName("body")[0];
    canvas = document.getElementById("drawingField");
    context = canvas.getContext("2d");
    context.translate(-1, -1);
    toolActivated=new ToolPoint();
    toolActivated.showCursor();
    canvas.addEventListener("click", plot);
    canvas.addEventListener("mousemove", mouseListener);
    var tabTools = document.getElementsByTagName("input");
    for(var i=0; i<tabTools.length; i++) {
        tabTools[i].addEventListener("click", selectTool);
    }
}

function drawAll() {
    context.clearRect(0, 0, canvas.width, canvas.height);
    for(var i=0; i<tabPoints.length; i++) {
        tabPoints[i].draw();
    }
    for(var i=0; i<tabLines.length; i++) {
        tabLines[i].draw();
    }
    for(var i=0; i<tabCircle.length; i++) {
        tabCircle[i].draw();
    }
}

function plot(event) {
    toolActivated.plot(event);
}

function mouseListener(event) {
    toolActivated.mouseListener(event);
}

function selectTool(event) {
    switch (this.id) {
        case "point":
            toolActivated=new ToolPoint();
            break;
        case "line":
            toolActivated=new ToolLine();
            break;
        case "loupe":
            toolActivated=new ToolLoupe();
            break;
        case "cercle":
            toolActivated = new ToolCercle();
            break;
    }
    toolActivated.showCursor();
    drawAll();
}

function translation(point, x, y) {
    point.x+=x;
    point.y+=y;
}

function homotetie(point, k) {
    point.x*=k;
    point.y*=k;
}

function dist(point1, point2) {
    return Math.sqrt(Math.pow((point1.x-point2.x),2) + Math.pow((point1.y-point2.y), 2));
}

function getNearestPoint(point) {
    for(var i=0; i<tabPoints.length; i++) {
        if(dist(point, tabPoints[i])<10) {
            return tabPoints[i];
        }
    }
    return false;
}

function getMouseCoordonate(event) {
    var rect = canvas.getBoundingClientRect();
    var mouseX = Math.floor(event.clientX - rect.left);
    var mouseY = Math.floor(event.clientY - rect.top);
    var nearestPoint = getNearestPoint(new Point(mouseX, mouseY));
    if(nearestPoint!=false) {
        return nearestPoint;
    }
    else {
        return new Point(mouseX, mouseY);
    }
}


/*
Class Point
 */
function Point(x, y) {
    this.x=x;
    this.y=y;
    this.color="green";
}

Point.prototype.draw= function () {
    context.beginPath();
    context.arc(this.x, this.y, 3, 0, 2 * Math.PI, false);
    context.fillStyle = this.color;
    context.fill();
    context.lineWidth = 1;
    context.stroke();
    context.closePath();
};


/*
Class Line
 */

function Line(p1, p2) {
    this.p1=p1;
    this.p2=p2;
}

Line.prototype.draw= function () {
    this.p1.draw();
    this.p2.draw();
    context.beginPath();
    context.moveTo(this.p1.x, this.p1.y);
    context.lineTo(this.p2.x, this.p2.y);
    context.stroke();
    context.closePath();
};

/*
 Class Cercle
 */

function Cercle(p1, p2){
    this.p1 = p1;
    this.p2 = p2;
}

Cercle.prototype.draw = function (){
    this.p1.draw();
    this.p2.draw();
    context.beginPath();
    context.arc(this.p1.x, this.p1.y, dist(this.p1, this.p2), 0, 2 * Math.PI, false);
    context.lineWidth = 1;
    context.stroke();
    context.closePath();
};


/*
Class Tool
 */

function Tool(img) {
    this.img=img;
}

Tool.prototype.showCursor=function () {
    canvas.style.cursor="url(img/"+this.img+") 16 16, pointer";
};

Tool.prototype.plot=function (event) {};

Tool.prototype.mouseListener = function (event) {};

/*
Class ToolPoint
 */
function ToolPoint() {
    Tool.call(this, "cursor.png");
}

ToolPoint.prototype=Object.create(Tool.prototype);
ToolPoint.prototype.constructor = ToolPoint;

ToolPoint.prototype.plot=function (event) {
    var rect = canvas.getBoundingClientRect();
    var mouseX = Math.floor(event.clientX - rect.left);
    var mouseY = Math.floor(event.clientY - rect.top);
    var p = new Point(mouseX, mouseY);
    tabPoints.push(p);
    p.draw();
};

ToolPoint.prototype.mouseListener = function (event) {};

/*
Class ToolLine
 */
function ToolLine() {
    this.lineTemp = new Line();
    Tool.call(this, "cursor.png");
}

ToolLine.prototype=Object.create(Tool.prototype);
ToolLine.prototype.constructor = ToolLine;

ToolLine.prototype.mouseListener = function (event) {
    if(this.lineTemp.p1!=undefined) {
        var rect = canvas.getBoundingClientRect();
        var mouseX = Math.floor(event.clientX - rect.left);
        var mouseY = Math.floor(event.clientY - rect.top);
        this.lineTemp.p2 = new Point(mouseX, mouseY);
        drawAll();
        this.lineTemp.draw();
    }
};

ToolLine.prototype.plot=function (event) {
    var rect = canvas.getBoundingClientRect();
    var mouseX = Math.floor(event.clientX - rect.left);
    var mouseY = Math.floor(event.clientY - rect.top);
    var p = new Point(mouseX, mouseY);
    if(this.lineTemp.p1==undefined) {
        this.lineTemp.p1 = p;
    }
    else {
        this.lineTemp.p2 = p;
        tabPoints.push(this.lineTemp.p1);
        tabPoints.push(this.lineTemp.p2);
        tabLines.push(this.lineTemp);
        this.lineTemp = new Line();
    }
    p.draw();
};

/*
Class ToolLoupe
 */

function ToolLoupe() {
    Tool.call(this, "loupePLus.png");
}

ToolLoupe.prototype=Object.create(Tool.prototype);
ToolLoupe.prototype.constructor = ToolLoupe;

ToolLoupe.prototype.plot=function (event) {
    var rect = canvas.getBoundingClientRect();
    var mouseX = Math.floor(event.clientX - rect.left);
    var mouseY = Math.floor(event.clientY - rect.top);
    for(var i=0; i<tabPoints.length; i++) {
        translation(tabPoints[i], -mouseX, -mouseY);
        if(event.ctrlKey)
            homotetie(tabPoints[i], 0.5);
        else
            homotetie(tabPoints[i], 2);
        translation(tabPoints[i], mouseX, mouseY);
    }
    drawAll();
}

ToolLoupe.prototype.showCursor=function() {
    canvas.style.cursor="url(img/"+this.img+") 11 11, pointer";
}

/*
 Class ToolCercle
 */

function ToolCercle() {
    Tool.call(this, "cursor.png");
    this.tempCercle = new Cercle();
}

ToolCercle.prototype=Object.create(Tool.prototype);
ToolCercle.prototype.constructor = ToolCercle;

ToolCercle.prototype.plot = function (event){
    var rect = canvas.getBoundingClientRect();
    var mouseX = Math.floor(event.clientX - rect.left);
    var mouseY = Math.floor(event.clientY - rect.top);
    if(this.tempCercle.p1 == undefined) {
        this.tempCercle.p1 = new Point(mouseX, mouseY);
    }
    else {
        this.tempCercle.p2 = new Point(mouseX, mouseY);
        tabPoints.push(this.tempCercle.p1);
        tabPoints.push(this.tempCercle.p2);
        tabCircle.push(this.tempCercle);
        this.tempCercle = new Cercle();
        drawAll();
    }

};

ToolCercle.prototype.mouseListener = function (event){
    if(this.tempCercle.p1 != undefined) {
        this.tempCercle.p2 = getMouseCoordonate(event);
        drawAll();
        this.tempCercle.draw();
    }
};