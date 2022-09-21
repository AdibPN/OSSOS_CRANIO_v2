<?php

spl_autoload_register(function ($class) {
	$arquivo = BASEDIR . '/' . $class . '.php';

	if (file_exists($arquivo))
		include $arquivo;
	else
		exit("<h1>O Arquivo não foi encontrado:</h1> <i>" . $arquivo . "</i>");
});

?>