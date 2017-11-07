
<?php
include("config.php");
include("header.php");
?>

<div id="uploadButton">
	<a id="upload" href="fileUpload.php" target="_blank">Upload files</a>
	<!-- <img id="exPic" src="img/hint.jpg"> -->
</div>


<?php
$files = scandir('uploadedfiles/'); //stores all filenames of uploadedfiles into $files array
foreach($files as $file) {
  echo "<br> <img src=\"uploadedfiles/$file\"/>";
}
?>


<?php include("footer.php"); ?>