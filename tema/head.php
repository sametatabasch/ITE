<?php
/*
 * Sayafalrdaki <head> tagının içeriği bu sayfadan çakilecek
 */
?>
<head>
<title>GençBilişim UZEM</title>
<!-- Responsive için-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--robotlar sayfayı indexlemesin linkleri takip etmesin ve arşivlemesin-->
<meta name="robots" content="noindex, nofollow, noarchive" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>
<link href="css/style.css" rel="stylesheet" media="screen"/>


<script src="http://jwpsrv.com/library/6EnFLLPfEeK06iIACpYGxA.js"></script>
<?php if (strstr($_SERVER['SCRIPT_NAME'],'editor.php')): ?>
    <!-- Ckeditor-->
    <script src="./ckeditor/ckeditor.js"></script>
<?php endif; ?>
</head>
