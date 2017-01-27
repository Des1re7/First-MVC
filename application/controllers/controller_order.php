<?php
class Controller_Order extends Controller
{
	function __construct()
	{
		$this->model = new Model_Order();
		$this->view = new View();
	}
	
	function action_index()
	{
		if(isset($_POST['items']) && isset($_POST['email']) && isset($_POST['phone']))
		{
			$data = $this->model->insert_data($_POST['items'], $_POST['email'], $_POST['phone']);
			$this->view->generate('order_view.php', 'template_view_clear.php', $data);
		}
	}
}