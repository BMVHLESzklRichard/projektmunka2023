<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../../kapcsolat/kapcsproj.php");

include("../both/alapadatok.php");

include("../both/negyfutam.php");

include("tabella.php");

include("sportfooter.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../../cssek/footer.css">
  <link rel="stylesheet" href="../../cssek/stilus.css" id="stilus">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="../../kepek/ujlogo.png" type="image/x-icon">
  <title>RNMotorsport - Statisztika</title>
  <!-- <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://cdn.plot.ly/plotly-2.27.0.min.js'></script>
  <style>
    .anyaa {
      margin-top: 100px;
    }

    .polewinPie {
      display: flex;
      justify-content: center;
      margin: 10px auto;
      background-color: #fff;
      padding: 10px;
      width: 1280px
    }

    .polewinPie h3 {
      font-family: "Open Sans", verdana, arial, sans-serif;
      font-size: 25px;
      fill: rgb(68, 68, 68);
      opacity: 1;
      font-weight: normal;
      white-space: pre;
    }

    .polesPie,
    .winsPie {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  </style>
</head>

<body>

  <?php include("sportnavbar.php") ?>
  <?php include("../both/displey.php"); ?>

  <div class="wrapper">
    <h1>Statisztika</h1>
    <div id='myDiv'><!-- Plotly chart will be drawn inside this DIV --></div>
    <div id='myDivteam'><!-- Plotly chart will be drawn inside this DIV --></div>
    <div class="polewinPie">
      <div class="winsPie">
        <h3>Nagydíj győzelmek!</h3>
        <div id='myPlot2'><!-- Plotly chart will be drawn inside this DIV --></div>
      </div>
      <div class="polesPie">
        <h3>Pole pozíciók!</h3>
        <div id='myPlot3'><!-- Plotly chart will be drawn inside this DIV --></div>
      </div>
    </div>
    <div class="polewinPie">
      <div class="winsPie">
        <h3>Sprint győzelmek!</h3>
        <div id='myPlot4'><!-- Plotly chart will be drawn inside this DIV --></div>
      </div>
      <div class="polesPie">
        <h3>Sprintpole pozíciók!</h3>
        <div id='myPlot5'><!-- Plotly chart will be drawn inside this DIV --></div>
      </div>
    </div>
  </div>

  <script>
    var Max = {
      name: 'Max Verstappen',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 26, 51, 51, 77, 110, 136, 161, 169, 194, 219, 237, 255, 265, 277, 295, 303, 313, 331, 354, 362, 398, 403, 429, 437],
      type: 'scatter',
      marker: {
        color: '#13152c'  // Itt állítsd át a kívánt színre
      },
    };

    var Perez = {
      name: 'Sergio Perez',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 18, 36, 46, 64, 85, 103, 107, 107, 107, 111, 118, 118, 124, 131, 139, 143, 143, 144, 150, 150, 151, 152, 152, 152],
      type: 'scatter',
      marker: {
        color: '#13152c'  // Itt állítsd át a kívánt színre
      },
    };

    var Hamilton = {
      name: 'Lewis Hamilton',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 6, 8, 8, 10, 19, 27, 35, 42, 55, 70, 85, 110, 125, 150, 154, 164, 166, 174, 177, 189, 190, 208, 211, 223],
      type: 'scatter',
      marker: {
        color: 'grey'  // Itt állítsd át a kívánt színre
      },
    };

    var Alonso = {
      name: 'Fernando Alonso',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 2, 12, 16, 24, 31, 33, 33, 33, 41, 41, 41, 45, 45, 49, 50, 50, 58, 62, 62, 62, 62, 62, 68, 70],
      type: 'scatter',
      marker: {
        color: '#145243'  // Itt állítsd át a kívánt színre
      },
    };

    var Leclerc = {
      name: 'Charles Leclerc',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 12, 27, 45, 57, 76, 98, 113, 138, 138, 148, 150, 150, 162, 177, 192, 217, 235, 245, 275, 291, 307, 319, 341, 356],
      type: 'scatter',
      marker: {
        color: '#930418'  // Itt állítsd át a kívánt színre
      },
    };

    var Norris = {
      name: 'Lando Norris',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 8, 12, 27, 37, 58, 83, 101, 113, 131, 150, 156, 171, 189, 199, 225, 241, 254, 279, 297, 315, 331, 340, 349, 374],
      type: 'scatter',
      marker: {
        color: '#fb7415'  // Itt állítsd át a kívánt színre
      },
    };

    var Sainz = {
      name: 'Carlos Sainz',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 15, 15, 40, 55, 69, 83, 93, 108, 108, 116, 135, 146, 154, 162, 172, 184, 184, 190, 215, 240, 244, 259, 272, 290],
      type: 'scatter',
      marker: {
        color: '#930418'  // Itt állítsd át a kívánt színre
      },
    };

    var Russell = {
      name: 'George Russell',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 10, 18, 18, 24, 33, 37, 44, 54, 69, 81, 111, 111, 116, 116, 122, 128, 143, 155, 167, 177, 192, 217, 235, 245],
      type: 'scatter',
      marker: {
        color: 'grey'  // Itt állítsd át a kívánt színre
      },
    };

    var Piastri = {
      name: 'Oscar Piastri',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 4, 16, 28, 32, 38, 41, 53, 71, 81, 87, 112, 124, 149, 167, 179, 197, 222, 237, 247, 251, 262, 268, 291, 292],
      type: 'scatter',
      marker: {
        color: '#fb7415'  // Itt állítsd át a kívánt színre
      },
    };

    var Stroll = {
      name: 'Lance Stroll',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 1, 1, 9, 9, 9, 9, 11, 11, 17, 17, 17, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24],
      type: 'scatter',
      marker: {
        color: '#145243'  // Itt állítsd át a kívánt színre
      },
    };

    var Gasly = {
      name: 'Pierre Gasly',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 1, 3, 5, 6, 6, 6, 6, 8, 8, 8, 8, 8, 9, 26, 26, 36, 42],
      type: 'scatter',
      marker: {
        color: '#f38ec2 '  // Itt állítsd át a kívánt színre
      },
    };

    var Ocon = {
      name: 'Esteban Ocon',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 1, 1, 1, 2, 3, 3, 3, 3, 5, 5, 5, 5, 5, 5, 5, 23, 23, 23, 23],
      type: 'scatter',
      marker: {
        color: '#f38ec2'  // Itt állítsd át a kívánt színre
      },
    };

    var Albon = {
      name: 'Alexander Albon',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 2, 2, 4, 4, 4, 4, 6, 12, 12, 12, 12, 12, 12, 12, 12],
      type: 'scatter',
      marker: {
        color: '#0c234f'  // Itt állítsd át a kívánt színre
      },
    };

    var Tsunoda = {
      name: 'Yuki Tsunoda',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 6, 7, 7, 14, 15, 19, 19, 19, 19, 20, 22, 22, 22, 22, 22, 22, 22, 22, 28, 30, 30, 30],
      type: 'scatter',
      marker: {
        color: '#172d54'  // Itt állítsd át a kívánt színre
      },
    };

    var Bottas = {
      name: 'Valtteri Bottas',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
      type: 'scatter',
      marker: {
        color: '#00e701'  // Itt állítsd át a kívánt színre
      },
    };

    var Hulkenberg = {
      name: 'Nico Hulkenberg',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 1, 3, 3, 4, 6, 6, 6, 6, 6, 14, 22, 22, 22, 22, 22, 22, 24, 29, 31, 31, 35, 37, 41],
      type: 'scatter',
      marker: {
        color: '#a7a7a7'  // Itt állítsd át a kívánt színre
      },
    };

    var Zhou = {
      name: 'Guanyu Zhou',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4],
      type: 'scatter',
      marker: {
        color: '#00e701'  // Itt állítsd át a kívánt színre
      },
    };

    var Ricciardo = {
      name: 'Daniel Ricciardo',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 5, 5, 5, 9, 9, 11, 11, 11, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12],
      type: 'scatter',
      marker: {
        color: '#172d54'  // Itt állítsd át a kívánt színre
      },
    };

    var Magnussen = {
      name: 'Kevin Magnussen',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 5, 5, 5, 5, 5, 6, 6, 6, 8, 14, 14, 14, 16, 16],
      type: 'scatter',
      marker: {
        color: '#a7a7a7'  // Itt állítsd át a kívánt színre
      },
    };

    var Sargeant = {
      name: 'Logan Sargent',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
      type: 'scatter',
      marker: {
        color: '#0c234f'  // Itt állítsd át a kívánt színre
      },
    };

    var Lawson = {
      name: 'Liam Lawson',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 4, 4, 4, 4],
      type: 'scatter',
      marker: {
        color: '#172d54'  // Itt állítsd át a kívánt színre
      },
    };

    var Bearman = {
      name: 'Oliver Bearman',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 7],
      type: 'scatter',
      marker: {
        color: '#a7a7a7'  // Itt állítsd át a kívánt színre
      },
    };

    var Colapinto = {
      name: 'Franco Colapinto',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 5, 5, 5, 5, 5, 5],
      type: 'scatter',
      marker: {
        color: '#0c234f'  // Itt állítsd át a kívánt színre
      },
    };

    var Doohan = {
      name: 'Jack Doohan',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
      type: 'scatter',
      marker: {
        color: '#f38ec2'  // Itt állítsd át a kívánt színre
      },
    };

    var Empty = {
      name: 'Empty',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
      type: 'scatter',
      marker: {
        color: 'black'  // Itt állítsd át a kívánt színre
      },
      showlegend: false
    };

    var data = [
      Max,
      Perez,
      Hamilton,
      Alonso,
      Leclerc,
      Norris,
      Sainz,
      Russell,
      Piastri,
      Stroll,
      Gasly,
      Ocon,
      Albon,
      Tsunoda,
      Bottas,
      Hulkenberg,
      Zhou,
      Ricciardo,
      Magnussen,
      Colapinto,
      Sargeant,
      Lawson,
      Bearman,
      Doohan,
      Empty
    ];

    var layout = {
      title: 'Egyéni bajnokság!',
      font: { size: 18 },
      // plot_bgcolor:"black",
      //     paper_bgcolor:"#FFF3"             
    };

    var config = { responsive: true }

    Plotly.newPlot('myDiv', data, layout, config);


    var RedBull = {
      name: 'Red Bull',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 44, 87, 97, 141, 195, 239, 268, 276, 301, 330, 355, 373, 389, 408, 434, 446, 456, 475, 504, 512, 544, 555, 581, 589],
      type: 'scatter',
      marker: {
        color: '#13152c'  // Itt állítsd át a kívánt színre
      },
    };

    var McLaren = {
      name: 'McLaren',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 12, 28, 55, 69, 96, 124, 154, 184, 212, 237, 268, 295, 338, 366, 404, 438, 476, 516, 544, 566, 593, 608, 640, 666],
      type: 'scatter',
      marker: {
        color: '#fb7415'  // Itt állítsd át a kívánt színre
      },
    };

    var Mercedes = {
      name: 'Mercedes',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 16, 26, 26, 34, 52, 64, 79, 96, 124, 151, 196, 221, 241, 266, 276, 292, 309, 329, 344, 366, 382, 425, 446, 468],
      type: 'scatter',
      marker: {
        color: 'grey'  // Itt állítsd át a kívánt színre
      },
    };

    var AstonMartin = {
      name: 'Astoin Martin',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 3, 13, 25, 33, 40, 42, 44, 44, 58, 58, 58, 68, 69, 73, 74, 74, 82, 86, 86, 86, 86, 86, 92, 94],
      type: 'scatter',
      marker: {
        color: '#145243'  // Itt állítsd át a kívánt színre
      },
    };

    var Ferrari = {
      name: 'Ferrari',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 27, 42, 85, 112, 145, 181, 206, 246, 246, 264, 285, 296, 316, 339, 364, 407, 425, 441, 496, 537, 557, 584, 613, 652],
      type: 'scatter',
      marker: {
        color: '#930418'  // Itt állítsd át a kívánt színre
      },
    };


    var Alpine = {
      name: 'Alpine',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 1, 1, 2, 5, 8, 9, 9, 9, 11, 13, 13, 13, 13, 13, 14, 49, 49, 59, 65],
      type: 'scatter',
      marker: {
        color: '#f38ec2 '  // Itt állítsd át a kívánt színre
      },
    };

    var Williams = {
      name: 'Williams',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 2, 2, 4, 4, 4, 4, 6, 16, 16, 17, 17, 17, 17, 17, 17],
      type: 'scatter',
      marker: {
        color: '#0c234f'  // Itt állítsd át a kívánt színre
      },
    };

    var VisaRB = {
      name: 'Visa RB',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 6, 7, 7, 19, 20, 24, 28, 28, 30, 31, 33, 34, 34, 34, 34, 34, 36, 36, 44, 46, 46, 46],
      type: 'scatter',
      marker: {
        color: '#172d54'  // Itt állítsd át a kívánt színre
      },
    };

    var Haas = {
      name: 'Haas',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 1, 4, 4, 5, 7, 7, 7, 7, 7, 19, 27, 27, 27, 27, 28, 29, 31, 38, 46, 46, 50, 53, 58],
      type: 'scatter',
      marker: {
        color: '#a7a7a7'  // Itt állítsd át a kívánt színre
      },
    };

    var Sauber = {
      name: 'Sauber',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4],
      type: 'scatter',
      marker: {
        color: '#00e701'  // Itt állítsd át a kívánt színre
      },
    };

    var Empty = {
      name: 'Empty',
      x: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      y: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
      type: 'scatter',
      marker: {
        color: 'black'  // Itt állítsd át a kívánt színre
      },
      showlegend: false
    };

    var datateam = [
      RedBull,
      McLaren,
      Ferrari,
      Mercedes,
      AstonMartin,
      VisaRB,
      Haas,
      Alpine,
      Williams,
      Sauber,
      Empty
    ];

    var layoutteam = {
      title: 'Csapat bajnokság!',
      font: { size: 18 },
      // plot_bgcolor:"black",
      //     paper_bgcolor:"#FFF3"             
    };

    var configteam = { responsive: true }

    Plotly.newPlot('myDivteam', datateam, layoutteam, configteam);




    var ultimateColors = [
      ['#13152c', '#930418', '#fb7415', '#930418', '#54b8b0', '#54b8b0', '#fb7415'], //győzelmek
      ['#13152c', '#fb7415', '#fb7415'],
      ['#13152c', '#930418', '#54b8b0', '#fb7415', '#930418'], // pole
      ['#13152c', '#fb7415', '#fb7415'],
    ];
    // győzelmek
    var data2 = [{
      type: "pie",
      values: [9, 2, 4, 3, 2, 2, 2],
      labels: ["Max Verstappen", "Carlos Sainz", "Lando Norris", "Charles Leclerc", "George Russell", "Lewis Hamilton", "Oscar Piastri"],
      textinfo: "label+percent",
      textposition: "inside",
      automargin: true,
      marker: {
        colors: ultimateColors[0]
      },
    }]


    var layout2 = {

      height: 400,
      width: 600,
      margin: { "t": 0, "b": 0, "l": 0, "r": 0 },
      showlegend: false
    }

    Plotly.newPlot("myPlot2", data2, layout2, config);

    // pole
    var data3 = [{
      type: "pie",
      values: [8, 3, 4, 8, 1],
      labels: ["Max Verstappen", "Charles Leclerc", "George Russell", "Lando Norris", "Carlos Sainz"],
      textinfo: "label+percent",
      textposition: "inside",
      automargin: true,
      marker: {
        colors: ultimateColors[2]
      },
    }]

    var layout3 = {
      height: 400,
      width: 600,
      margin: { "t": 0, "b": 0, "l": 0, "r": 0 },
      showlegend: false
    }

    Plotly.newPlot("myPlot3", data3, layout3, config);

    // sprint win
    var data4 = [{
      type: "pie",
      values: [4, 1, 1],
      labels: ["Max Verstappen", "Lando Norris", "Oscar Piastri"],
      textinfo: "label+percent",
      textposition: "inside",
      automargin: true,
      marker: {
        colors: ultimateColors[3]
      },
    }]

    var layout4 = {
      height: 400,
      width: 600,
      margin: { "t": 0, "b": 0, "l": 0, "r": 0 },
      showlegend: false
    }

    Plotly.newPlot("myPlot4", data4, layout4, config);

    // sprint pole
    var data5 = [{
      type: "pie",
      values: [3, 2, 1],
      labels: ["Max Verstappen", "Lando Norris", "Oscar Piastri"],
      textinfo: "label+percent",
      textposition: "inside",
      automargin: true,
      marker: {
        colors: ultimateColors[1]
      },
    }]

    var layout5 = {
      height: 400,
      width: 600,
      margin: { "t": 0, "b": 0, "l": 0, "r": 0 },
      showlegend: false
    }

    Plotly.newPlot("myPlot5", data5, layout5, config);

  </script>
  <?php include("../both/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>
  <script src="../../script/java.js"></script>
  <script src="../../script/alapdarkmode.js"></script>
  <script src="../../script/tabellacarousel.js"></script>
</body>

</html>