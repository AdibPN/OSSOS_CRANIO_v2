<?php

namespace App\Controller;

abstract class Controller {
	protected static function render($view, $model = null) {
		$arquivo_view = VIEWS . $view . ".php";

		if (file_exists($arquivo_view))
			include $arquivo_view;
		else
			exit("<h1>Arquivo da view não foi encontrado:</h1>. " . $view);
	}
}
?>