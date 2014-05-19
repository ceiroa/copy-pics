<?php

ini_set('display_errors', 1);
error_reporting(-1);
error_reporting(E_ALL);

function copyPics($from, $to) {

	//get list of files and folders
	$children = scandir($from);

	if(!empty($children)) {
		foreach($children as $value) {
			
			$isfile = is_file($from . '/' . $value);
			$ispic = substr($value, -strlen('.jpg')) === '.jpg';
			$isvideo1 = substr($value, -strlen('.mp4')) === '.mp4';
			$isvideo2 = substr($value, -strlen('.3gp')) === '.3gp';

			//if it's a picture or video file, copy it to target
			if($isfile && ($ispic || $isvideo1 || $isvideo2)) {
				echo 'Picture found: ' . $value . "\n";
				//rename file if file with same name exists in target
				if(is_file($to . '/' . $value)) {
					$value += '_';
				}
				copy($from . '/' . $value, $to . '/' . $value);	
			}
			//if it's a folder, call current function
			elseif(is_dir($value) && $value != '.' && $value != '..') {
				echo '***Folder found: ' . $value . "\n";
				copyPics($value);
			}
		}
	}
}

$SourcePath1 = '/Volumes/Untitled/DCIM/Camera';
$SourcePath2 = '/Volumes/NO NAME/DCIM/Camera';
$SourcePath3 = '/Volumes/NO NAME/Picture';

$to = '/Users/ceiroa/Desktop/MyDocs/Pics/AbuPicsAll';

copyPics($SourcePath1, $to);
copyPics($SourcePath2, $to);
copyPics($SourcePath3, $to);