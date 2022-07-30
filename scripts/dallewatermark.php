<?

	include("../settings.php");

	$path = DIR."/import";
	$files = scandir($path);
	$files = array_diff(scandir($path), array('.', '..'));

	$c = 0;
	$n = MAX;

	foreach($files as $f){
		
		$file = DIR."/import/".$f;
		
		$im = imagecreatefrompng($file);
		
		$size = min(imagesx($im), imagesy($im));
		
		$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size - 16, 'height' => $size - 16]);
		
		if ($im2 !== FALSE) {
			imagepng($im2, DIR."/data/g".$c.".png");
			
			echo "Saved: ".DIR."/data/g".$c.".png"."<br />";
			
			imagedestroy($im2);
		}
		
		imagedestroy($im);		
		
		if($n != -1 && $c == $n) break;
		
		$c++;
	}

?>