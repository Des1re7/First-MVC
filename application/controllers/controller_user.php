<?php
class Controller_User extends Controller
{
	function __construct()
	{
		$this->model = new Model_User();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('user_view.php', 'template_view_clear.php', $data);
	}
	
	
	
	public function action_registration()
	{
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$pass = $_POST['password'];
		
		$data = $this->model->registration($email, $phone, $pass);		
		$this->view->generate('user_view.php', 'template_view_clear.php', $data);
	}
	
	public function action_login()
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];
		
		$data = $this->model->login($email, $pass);		
		$this->view->generate('user_view.php', 'template_view_clear.php', $data);
	}
	
	public function action_logout()
	{
		$data = $this->model->logout();		
		$this->view->generate('user_view.php', 'template_view_clear.php', $data);
	}
}