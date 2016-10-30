<!DOCTYPE html>
<html>
<head>
	<!-- Appropriate Title and meta tags -->
	<title><?= isset($PageTitle) ? $PageTitle : "Nanno's Foods"?></title>
	<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
	<meta http-equiv="Content-Language" content="en-us" />
	<meta name="description" content="CSC 423 Group Project" />
	<meta name="keywords" content="dean mondy, william dean, brian scarbrough, cory easton, mason mascle, marlin mei, csc 423, group 2" />
	<meta name="author" content="Dean Mondy, William Dean, Cory Easton, Marlin Mei, Mason Mascle, Brian Scarbrough" />
	<meta name="copyright" content="SUNY Brockport CSC 423 2016" />

	<!-- include the basic style sheet referenced by the header and footer -->
	<link rel="stylesheet" href="./css/header.css" />

	<!-- Custom Page Header for loading css or js files -->
	<?php if (function_exists('customPageHeader')){
		customPageHeader();
	}?>
</head>
<!-- Open the body here, close the body in footer -->
<body>
<div class="page-container">