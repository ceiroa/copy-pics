<?php

ini_set('display_errors', 1);
error_reporting(-1);
error_reporting(E_ALL);


function copyPics($from, $to) {

	echo 'Source directory: ' . $from . "\n";
	echo 'Target directory: ' . $to . "\n";
	
	//get list of files and folders
	$children = scandir($from);
	
	print_r($children);
	
	if(!empty($children)) {
		foreach($children as $value) {
		
			echo '***Inspecting ' . $value . "\n";
			
			$isfile = is_file($from . '/' . $value);
			$ispic1 = strtolower(substr($value, -strlen('.jpg'))) === '.jpg';
			$ispic2 = strtolower(substr($value, -strlen('.png'))) === '.png';
			$ispic3 = strtolower(substr($value, -strlen('.png'))) === '.gif';
			$ispic4 = strtolower(substr($value, -strlen('.jpg'))) === '.jpeg';
			$isvideo1 = strtolower(substr($value, -strlen('.mp4'))) === '.mp4';
			$isvideo2 = strtolower(substr($value, -strlen('.3gp'))) === '.3gp';
			$isvideo3 = strtolower(substr($value, -strlen('.3gp'))) === '.mov';
			
			//if it's a picture or video file, copy it to target
			if($isfile && ($ispic1 || $ispic2 || $ispic3 || $ispic4 || $isvideo1 || $isvideo2 || $isvideo3)) {
				echo '***Picture/video found: ' . $value . "\n";
				//rename file if file with same name exists in target
				if(is_file($to . '/' . $value)) {
					$value = round(microtime(true) * 1000) . '_' . $value;
				}
				copy($from . '/' . $value, $to . '/' . $value);	
			}
			//if it's a folder, call current function
			elseif(is_dir($from . '/' . $value) && $value != '.' && $value != '..') {
				echo '***Folder found: ' . $from . '/' . $value . "\n";
				copyPics($from . '/' . $value, $to);
			}
		}
	} else {
		echo $from . ' directory is empty.';
	}
}

$from = $argv[1];
$to = $argv[2];

copyPics($from, $to);