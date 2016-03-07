<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('personas_model');
		$this->very_admin();
		date_default_timezone_set("America/Caracas");
        setlocale(LC_TIME,"Spanish");
	}
	public function index()
	{
		$data = array(
			'titulo' => 'Panel de Administración - Funprobiani',
			'contenido' => 'admin/admin_view'
			);
		$this->load->view('plantilla', $data);
	}
	public function usuarios()
	{
		$filas = $this->admin_model->admin_num();
		$per_page = 10;
		$this->pagination($filas, $per_page);
		$data = array(
			'titulo' => 'Usuarios del Sistema - Funprobiani',
			'contenido' => 'admin/admin_list_view',
			'admin_num' => $filas,
			'admin' => $this->admin_model->admin_list($per_page),
			'pagination' => $this->pagination->create_links()
			);
		$this->load->view('plantilla', $data);
	}
	public function agregar()
	{
		if(!$this->input->is_ajax_request())
		{
			$data = array(
				'titulo' => 'Nuevo usuario - Funprobiani',
				'contenido' => 'admin/nuevo_admin_view'
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$query = $this->admin_model->very_email($this->input->post('email'));
			$query_user = $this->personas_model->very_persona();
			if($query != false || $query_user != false)
			{
				echo $this->input->post('email')." Ya se encuentra en uso";
			}
			else
			{
				$this->admin_model->agregar();
				echo "bien";
			}
		}
	}
	public function editar($id)
	{
		if(!$this->input->is_ajax_request())
		{
			$query = $this->admin_model->datos_usuario($id);
			if($query == false)
			{
				redirect(base_url().'admin/usuarios');
			}
			else
			{
				$data = array(
					'titulo' => 'Editar datos de usuario - Funprobiani',
					'contenido' => 'admin/editar_admin_view',
					'id' => $id,
					'nombre' => $query->nombre,
					'email' => $query->email,
					'tipo' => $query->tipo
					);
				$this->load->view('plantilla', $data);
			}
		}
		else
		{
			$query = $this->admin_model->very_email($this->input->post('email'));
			$query_user = $this->personas_model->very_persona();
			if($query != false)
			{
				if($query->id != $id)
				{
					$this->repetido();
				}
				else
				{
					$this->guardar_cambios_usuario($id);
				}
			}
			elseif($query_user != false)
			{
				if($query_user->id != $id)
				{
					$this->repetido();
				}
				else
				{
					$this->guardar_cambios_usuario($id);
				}
			}
			else
			{
				$this->guardar_cambios_usuario($id);
			}
		}
	}
	public function modificar()
	{
		if(!$this->input->is_ajax_request())
		{
			$data = array(
				'titulo' => 'Modificar perfil - Funprobiani',
				'contenido' => 'admin/modificar_admin_view'
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$query = $this->admin_model->very_email($this->input->post('email'));
			$query_user = $this->personas_model->very_persona();
			if ($query != false)
			{
				if($query->id != $this->session->userdata('id'))
				{
					$this->repetido();
				}
				else
				{
					$this->guardar_cambios();
				}
			}
			elseif ($query_user != false)
			{
				if($query_user->id != $this->session->userdata('id'))
				{
					$this->repetido();
				}
				else
				{
					$this->guardar_cambios();
				}
			}
			else
			{
				$this->guardar_cambios();
			}
		}
	}
	public function cambio()
	{
		# code...
	}
	function repetido()
	{
		echo $this->input->post('email')." Ya se encuentra en uso";
	}
	function guardar_cambios()
	{
		$this->admin_model->modificar($this->session->userdata('id'));
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'email' => $this->input->post('email')
			);
		$this->session->set_userdata($data);
		echo "bien";
	}
	function guardar_cambios_usuario($id)
	{
		$this->admin_model->editar_usuario($id);
		echo "bien";
	}
	function eliminar($id)
	{
		$this->admin_model->eliminar($id);
		redirect(base_url().'admin/usuarios');
	}
	function pagination($filas, $per_page)
	{
		$config['base_url'] = base_url().'admin/usuarios/';
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
	function very_admin()
	{
		if ($this->session->userdata('tipo') != "admin")
		{
			redirect(base_url());
		}
	}
}

?>