<?php

class Controller_Index extends Controller
{	
	function __construct()
	{
		$this->view = new View();
		$this->model = new Model_Index();
	}
	
	function action()
	{
		$this->view->generate('index_view.php', 'template_view.php', $this->model->get_data());
	}
};
