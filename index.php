<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Random Number Picker</title>
  <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.8/js/tether.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  <style>
  body {
    margin-top: 40px;
  }
  .num {
  	width: 65px;
  	height: 65px;
  	background-color: #ECECEC;
  	margin: 0 0 20px;
  	line-height: 65px;
  	text-align: center;
  	border-radius: 33px;
  	font-size: 32px;
  	display: inline-block;
  }
  .once {
  	background-color: #FC0;
  }
  .selected {
  	background-color: green;
    color: #FFF;
    font-weight: bold;
  }
  </style>
</head>
<body>
<div class="container">
  <div class="row">

    <div class="col-xs-12 col-sm-8 offset-sm-2">

<h1>Random Number Draw</h1>
<hr/>
<div id='nums'></div>
<?php 
$min = ( !empty( $_GET['min'] ) ) ? $_GET['min']:1;
$max = ( !empty( $_GET['max'] ) ) ? $_GET['max']:10;

for ($i= $min; $i <= $max; $i++) { 
?>
	<span data-num="<?= $i; ?>" class="num"><?= $i; ?></span>
<?php 
} 
?>
</div>

<script>
function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

var numArray = new Array();

function myCallback() {
  var getNum = getRandomIntInclusive(<?= $min; ?>, <?= $max; ?>);

  if ( $.inArray( getNum, numArray ) >= 0 ){
    $("[data-num=" + getNum + "]").removeClass('once');
    $("[data-num=" + getNum + "]").addClass('selected');
    clearInterval(intervalID);
  } else {
    numArray.push(getNum);

    $("[data-num=" + getNum + "]").addClass('once');
  }
}

$(document).ready(function(){
  intervalID = window.setInterval(myCallback, 500);
});

</script>

</body>
</html>