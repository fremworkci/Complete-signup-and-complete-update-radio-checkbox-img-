<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$this->load->view('home');
	}

	function signup()
	{
		$name=$this->input->post("name");
		$email=$this->input->post("email");
		$password=$this->input->post("password");
		$mobile=$this->input->post("mobile");
		$gender=$this->input->post("gender");
		$qualification=implode(",",$this->input->post('qualification'));
		$this->load->library('upload');
		$config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->upload->initialize($config);
        $this->upload->do_upload('pic');
        $data=$this->upload->data();
        $pic=$data["file_name"];
		$data=array(
			"name"=>$name,
			"email"=>$email,
			"password"=>$password,
			"mobile"=>$mobile,
			"gender"=>$gender,
			"qualification"=>$qualification,
			"pic"=>$pic
		);
		$qry=$this->Model1->save_data('login',$data);
		redirect('Home');
	}



	function show()
	{
		$qry=$this->Model1->show_data('login',"*");
		echo json_encode($qry);
	}


	function edit()
	{
		$id=$this->input->post('id');
		$qry=$this->Model1->edit_data('login',$id);
		echo json_encode($qry);
	}


	function update()
	{
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$gender=$this->input->post('gender');
		$qualification=implode(",",$this->input->post('qualification'));

		$new_pic=$this->input->post("new_pic");
		$old_pic=$this->input->post("old_pic");
		
		if(empty($_FILES["new_pic"]["name"]))
		{
			$data=array(
				"name"=>$name,
				"email"=>$email,
				"password"=>$password,
				"mobile"=>$mobile,
				"gender"=>$gender,
				"qualification"=>$qualification,
				"pic"=>$old_pic	
			);
			$this->Model1->update_data('login',$id,$data);
		}
		else
		{

			$this->load->library('upload');
			$config['upload_path']          = './img/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $this->upload->initialize($config);
	        $this->upload->do_upload('new_pic');
	        $data=$this->upload->data();
	        $new_pic=$data["file_name"];
	        $data=array(
				"name"=>$name,
				"email"=>$email,
				"password"=>$password,
				"mobile"=>$mobile,
				"gender"=>$gender,
				"qualification"=>$qualification,
				"pic"=>$new_pic	
			);
			$this->Model1->update_data('login',$id,$data);
		}

		// $data=array(
		// 	"name"=>$name,
		// 	"email"=>$email,
		// 	"password"=>$password,
		// 	"mobile"=>$mobile,
		// 	"gender"=>$gender,
		// 	"qualification"=>$qualification	
		// );
		// $this->Model1->update_data('login',$id,$data);
	}

	
}
