<?php

require_once("includes/color.php");

$color = $_GET['color'];

$result = Color::obtain_votes($color);

$row = mysqli_fetch_array($result);

if($row['votes'])
    echo $row['votes'];
else
    echo "0";