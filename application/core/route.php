<?php

//вызывается контроллер controller_main->action_index()
class Route
{
	function start()
	{
		$controller_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if ( !empty($routes[2]) )
		{
			$tmp = explode('.', $routes[2]);
			$tmp = explode('?', $tmp[0]);
			$controller_name = $tmp[0];
		}
		
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'controller_'.$controller_name;
		
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
		//echo $model_file;
			include "application/models/".$model_file;
		}

		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			Route::ErrorPage404();
		}
		
		$controller = new $controller_name;
		
		$controller->action();
	}

	function ErrorPage404()
	{
		echo "hui";
    }
    
}
