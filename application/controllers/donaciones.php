<?php

class Donaciones extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('donaciones_model');
		date_default_timezone_set("America/Caracas");
        setlocale(LC_TIME,"Spanish");
	}
	public function index()
	{
		$filas = $this->donaciones_model->num_don();
		$per_page = 20;
		$this->pagination($filas, $per_page);
		$data = array(
			'titulo' => 'Donaciones - Funprobiani',
			'contenido' => 'donaciones/donaciones_view',
			'num_don' => $filas,
			'donaciones' => $this->donaciones_model->donaciones($per_page),
			'pagination' => $this->pagination->create_links()
			);
		$this->load->view('plantilla', $data);
	}
	public function financiera()
	{
		$this->very_persona("donaciones/financiera");
		if(!$this->input->is_ajax_request())
		{
			$data = array(
				'titulo' => 'Donacion Financiera - Funprobiani',
				'contenido' => 'donaciones/financiera_view',
				'menu' => true,
				'opcion' => 'dona'
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$this->donaciones_model->donar('Financiera');
			echo "Solicitud de donación exitosa, espere nuestra respuesta";
		}
	}
	public function material()
	{
		$this->very_persona("donaciones/material");
		if(!$this->input->is_ajax_request())
		{
			$data = array(
				'titulo' => 'Donacion Material - Funprobiani',
				'contenido' => 'donaciones/material_view',
				'menu' => true,
				'opcion' => 'dona'
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$this->donaciones_model->donar('Material');
			echo "Solicitud de donación exitosa, espere nuestra respuesta";
		}
	}
	function decidir($respuesta, $id)
	{
		$this->donaciones_model->decidir($respuesta, $id);
		if($this->session->userdata('tipo') == "persona")
		{
			redirect(base_url().'home/perfiles');
		}
		else
		{
			redirect(base_url().'donaciones');
		}
	}
	function pagination($filas, $per_page)
	{
		$config['base_url'] = base_url().'donaciones/index/';
		$config['total_rows'] = $filas;
		$config['per_page'] = $per_page;
		$config['num_links'] = 3;
		$config['first_link'] = '<span class="icon-arrow-long-left"></span>';
		$config['last_link'] = '<span class="icon-arrow-long-right"></span>';
		$config['next_link'] = '<span class="icon-chevron-right"></span>';
		$config['prev_link'] = '<span class="icon-chevron-left"></span>';

		$config['cur_tag_open'] = '<b class="active">';
		$config['cur_tag_close'] = '</b>';

		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);
	}
	function very_persona($enlace)
	{
		if ($this->session->userdata('tipo') != "persona")
		{
			redirect(base_url().'home/login?link='.$enlace);
		}
	}
}

?>