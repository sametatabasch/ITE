<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!empty($_FILES)) {
	$tempFile = $_FILES['upload']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/uploads';
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['upload']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['upload']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
                if(move_uploaded_file($tempFile,$targetFile)){echo '01';}else{echo 'olmadı';};
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
?>
