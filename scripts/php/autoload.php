<?php

function AutoLoadChat ($ClassName) {
	$dir = 'lib/';
	include($dir . "{$ClassName}.class.php");
}
spl_autoload_register("AutoLoadChat");	