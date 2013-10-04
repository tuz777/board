<?
	class Controller_Res extends Controller{
		function __construct()
		{	
			$this->view = new View();
			$this->model = new Model_Res();
		}
		function action()
		{
			$this->view->generate('res_view.php', 'template_view.php', $this->model->get_data($_GET["op_post"]));
		}
};