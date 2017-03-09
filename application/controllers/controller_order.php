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
		if (isset($_SESSION['user_id']))
		{
			if(isset($_POST['items']))
			{
				$data = $this->model->insert_data($_POST['items']);
				$this->view->generate('order_view.php', 'template_view_clear.php', $data);
			}
		}
	}
}