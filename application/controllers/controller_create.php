<?
class Controller_Create extends Controller{
	function __construct()
	{
		$this->view = new View();
		$this->model = new Model_Create();
	}
	function action()
	{
		$data = array($_POST["title"], $_POST["op_post"]);
		$this->model->post_data($data);
		$this->view->generate("create_view.php", "template_view.php");
	}
};