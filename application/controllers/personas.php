<?php

class Personas extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('personas_model');
		date_default_timezone_set("America/Caracas");
        setlocale(LC_TIME,"Spanish");
	}
	public function index()
	{
		$filas = $this->personas_model->num_personas();
		$per_page = 20;
		$this->pagination($filas, $per_page);
		$data = array(
			'titulo' => 'Personas Inscritas - Funprobiani',
			'contenido' => 'personas/personas_view',
			'num_personas' => $filas,
			'personas' => $this->personas_model->personas($per_page),
			'pagination' => $this->pagination->create_links()
			);
		$this->load->view('plantilla', $data);
	}
	public function perfiles($id)
	{
		$query = $this->personas_model->datos_per($id);
		if($query == false)
		{
			redirect(base_url().'personas');
		}
		else
		{
			$data = array(
				'titulo' => $query->nombre.' - Funprobiani',
				'contenido' => 'personas/perfiles_view',
				'id' => $id,
				'tipo' => $query->tipo,
				'nombre' => $query->nombre,
				'cedula' => $query->cedula,
				'fenac' => $query->fenac,
				'email' => $query->email,
				'edo_civil' => $query->edo_civil,
				'tlf' => $query->tlf,
				'foto' => $query->foto,
				'dir' => $query->dir,
				'viv' => $query->viv,
				'nro_casa' => $query->nro_casa,
				'tlf_local' => $query->tlf_local,
				'dir_hogar' => $query->dir_hogar,
				'num_adopciones' => $this->personas_model->adopcion_usuario($id)->num_rows(),
				'adopciones' => $this->personas_model->adopcion_usuario($id)->result(),
				'num_donaciones' => $this->personas_model->donacion_usuario($id)->num_rows(),
				'donaciones' => $this->personas_model->donacion_usuario($id)->result()
				);
			$this->load->view('plantilla', $data);
		}
	}
	public function detalles_adopcion($id)
	{
		$data = array(
			'titulo' => 'Detalles de la Adopción - Funprobiani',
			'contenido' => 'adopciones/detalles_view'
			);
		$this->load->view('plantilla', $data);
	}
	public function editar()
	{
		$id = $this->session->userdata('id');
		if(!$this->input->is_ajax_request())
		{
			$query = $this->personas_model->datos_per($id);
			$data = array(
				'titulo' => "Editar mis datos personales - Funprobiani",
				'contenido' => 'personas/editar_view',
				'tipo' => $query->tipo,
				'nombre' => $query->nombre,
				'cedula' => $query->cedula,
				'fenac' => $query->fenac,
				'tlf' => $query->tlf,
				'email' => $query->email,
				'dir' => $query->dir,
				'edo_civil' => $query->edo_civil,
				'viv' => $query->viv,
				'nro_casa' => $query->nro_casa,
				'tlf_local' => $query->tlf_local,
				'dir_hogar' => $query->dir_hogar
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$query = $this->personas_model->very_persona();
			$query_admin = $this->admin_model->very_email($this->input->post('email'));
			if($query != false)
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
			elseif($query_admin != false)
			{
				if ($query_admin->id != $this->session->userdata('id'))
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
	function repetido()
	{
		echo "El E-Mail y/o la cedula ya pertenecen a otro usuario registrado";
	}
	function guardar_cambios()
	{
		if($_FILES['userfile']['name'] != "")
		{
			$config['upload_path'] = 'assets/images/personas/';
            $config['allowed_types'] = '*';
            /*$config['max_width'] = 1024;
            $config['max_height'] = 1024;*/
            $config['max_size'] = 100000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload())
            {
                echo "No fue posible subir el archivo";
            }
            else
            {
            	if($this->session->userdata('foto') != "avatar.png")
            	{
            		$directorio = 'assets/images/personas/'.$this->session->userdata('foto');
            		unlink($directorio);
            	}
            	$foto = $this->upload->data('file_name');
            	$this->personas_model->editar($this->session->userdata('id'), $foto);
            	$data = array(
					'nombre' => $this->input->post('nombre'),
					'email' => $this->input->post('email'),
					'tlf' => $this->input->post('tlf'),
					'cedula' => $this->input->post('cedula'),
					'foto' => $foto,
					'tipo_persona' => $this->input->post('tipo')
					);
				$this->session->set_userdata($data);
            	echo "bien";
            }
		}
		else
		{
			$foto = $this->session->userdata('foto');
			$this->personas_model->editar($this->session->userdata('id'), $foto);
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'email' => $this->input->post('email'),
				'tlf' => $this->input->post('tlf'),
				'cedula' => $this->input->post('cedula'),
				'foto' => $foto,
				'tipo_persona' => $this->input->post('tipo')
				);
			$this->session->set_userdata($data);
			echo "bien";
		}
	}
	function eliminar($id, $foto)
	{
		$this->personas_model->eliminar($id);
		$directorio = "assets/images/personas/".$foto;
		unlink($directorio);
		redirect(base_url().'personas');
	}
	function pagination($filas, $per_page)
	{
		$config['base_url'] = base_url().'admin/personas/';
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
}

?>