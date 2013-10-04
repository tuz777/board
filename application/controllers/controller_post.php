<?php

class Controller_Post extends Controller
{	
	function __construct()
	{
		$this->view = new View();
		$this->model = new Model_Post();
	}
	
	function action()
	{
		$p = new Post();
		$p->issue_time = time();
		$p->post = $_POST["post"];
		$p->thread = $_POST["thread"];
		$this->model->post_data($p);
		$this->view->generate('post_view.php', 'template_view.php');
	}
};
