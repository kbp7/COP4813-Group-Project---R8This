$(document).ready(function() {
  var mainCanvas = document.querySelector("#myCanvas");
  var back = mainCanvas.getContext("2d");
  var logo = mainCanvas.getContext("2d");
  var octo = mainCanvas.getContext("2d");
  var canvasWidth = mainCanvas.width;
  var canvasHeight = mainCanvas.height;

  function drawLogo() {
    back.beginPath();
    var radius = 110;
    logo.arc(150, 150, radius, 0, Math.PI * 2, false);
    logo.fillStyle = "white";
    logo.fill();
    logo.closePath();

    logo.beginPath();
    var radius = 100;
    logo.arc(150, 150, radius, 0, Math.PI * 2, false);
    logo.fillStyle = "#ff446b";
    logo.fill();
    logo.closePath();

    octo.beginPath();
    octo.strokeStyle = "white";
    octo.lineWidth = 10;
    octo.lineCap = "round";
    octo.arc(150, 150, 45, (Math.PI/6), (5 * Math.PI/6), true);
    octo.stroke();
    octo.closePath();
    octo.beginPath();
    octo.arc(87, 191, 30, (11 * Math.PI/6), (2 * Math.PI/3), false);
    octo.stroke();
    octo.closePath();
    octo.beginPath();
    octo.arc(95, 200, 45, 0, (Math.PI/4), false);
    octo.stroke();
    octo.closePath();
    octo.beginPath();
    octo.arc(205, 200, 45, Math.PI, (3 * Math.PI/4), true);
    octo.stroke();
    octo.closePath()
    octo.beginPath();
    //octo.arc(213, 190, 30, (6 * Math.PI/5), (Math.PI/3), true);
    octo.arc(213, 191, 30, (7*Math.PI/6), (Math.PI/3), true);

    octo.stroke();
    octo.closePath()
    octo.beginPath();
    octo.lineWidth = 15;
    octo.moveTo(130, 155);
    octo.lineTo(130, 155);
    octo.moveTo(170, 155);
    octo.lineTo(170, 155);
    octo.stroke();
    octo.lineWidth = 8;
    octo.moveTo(145, 170);
    octo.lineTo(155, 170);
    octo.stroke();
    octo.closePath();
  }
  drawLogo();
})
