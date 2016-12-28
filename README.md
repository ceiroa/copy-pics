copy-pics
=========

Copy pictures and videos from a folder structure, and put it all in one folder with flat structure. This solves the problem of downloading all your pictures from your iPhone to your Mac. By default, the Photos application imports them into a folder structure under yourusername/Pictures/Photos Library.photoslibrary/, with one image per lowest level folder. (It's basically a tree, with the images as leafs.)

Unfortunately there is no free application that let's you do this in an easy way.

First create target directory where you want to store pictures. Then navigate to directory containing script, and run script as follows:

    php PicsFromPhone sourceDirectory targetDirectory

For example:

	cd /Users/ceiroa/Desktop
	mkdir PhotosFromLibrary
	cd /Users/ceiroa/copy-pics/
	php PicsFromPhone.php '/Users/ceiroa/Pictures/Photos Library.photoslibrary/' '/Users/ceiroa/Desktop/PhotosFromLibrary/'
	
Of course the script needs to be executable, so you may have to do something like this before you can run it:

	sudo chmod a+x PicsFromPhone.php
    
