<?php
$im = imagecreatefrompng('board.png');
$uri= $_SERVER['REQUEST_URI'];
$uri_array = explode("/", $uri);
unset($uri_array[0]);
unset($uri_array[1]);
unset($uri_array[2]);
$uri_array = array_values($uri_array);

for($i=0; $i<count($uri_array)/2; $i=$i+1)
	{
		$stamp = imagecreatefrompng($uri_array[2*$i]);
		$xy = explode(",", $uri_array[2*$i + 1]);
		$x = $xy[0];
		$y = $xy[1];
		$sx = imagesx($stamp);
        $sy = imagesy($stamp);
        imagecopy($im, $stamp, $x, $y, 0, 0, $sx, $sy);
	}

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>