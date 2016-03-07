<?php

class Mascotas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mascotas_model');
		date_default_timezone_set("America/Caracas");
        setlocale(LC_TIME,"Spanish");
	}
	public function index()
	{
		$filas = $this->mascotas_model->num_mascotas();
		$per_page = 20;
		$this->pagination($filas, $per_page);
		$data = array(
			'titulo' => 'Mascotas en adopción - Funprobiani',
			'contenido' => 'mascotas/mascotas_view',
			'num_mascotas' => $filas,
			'mascotas' => $this->mascotas_model->mascotas($per_page),
			'pagination' => $this->pagination->create_links()
			);
		$this->load->view('plantilla', $data);
	}
	public function perfil($id)
	{
		$query = $this->mascotas_model->perfil($id);
		if ($query == false)
		{
			redirect(base_url().'mascotas');
		}
		else
		{
			$data = array(
				'titulo' => 'Mascota - Funprobiani',
				'contenido' => 'mascotas/perfil_view',
				'id' => $id,
				'nombre' => $query->nombre,
				'edad' => $query->edad,
				'sexo' => $query->sexo,
				'peso' => $query->peso,
				'especie' => $query->especie,
				'vacunado' => $query->vacunado,
				'esterilizado' => $query->esterilizado,
				'descripcion' => $query->descripcion,
				'foto' => $query->foto,
				'estado' => $query->estado
				);
			$this->load->view('plantilla', $data);
		}
	}
	public function registrar()
	{
		if(!$this->input->is_ajax_request())
		{
			$data = array(
				'titulo' => 'Nueva Mascota - Funprobiani',
				'contenido' => 'mascotas/registrar_view'
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$config['upload_path'] = 'assets/images/mascotas/';
            $config['allowed_types'] = '*';
            //$config['max_width'] = 1024;
            //$config['max_height'] = 1024;
            $config['max_size'] = 100000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload())
            {
                echo $this->upload->display_errors();
            }
            else
            {
            	$this->mascotas_model->add_pet($this->upload->data('file_name'));
            	echo "bien";
            }
		}
	}
	public function editar($id, $foto)
	{
		if(!$this->input->is_ajax_request())
		{
			$query = $this->mascotas_model->perfil($id);
			if($query == false)
			{
				redirect(base_url().'mascotas');
			}
			else
			{
				$data = array(
					'titulo' => 'Editar Mascota - Funprobiani',
					'contenido' => 'mascotas/editar_view',
					'id' => $id,
					'foto' => $foto,
					'nombre' => $query->nombre,
					'edad' => $query->edad,
					'peso' => $query->peso,
					'especie' => $query->especie,
					'sexo' => $query->sexo,
					'vacunado' => $query->vacunado,
					'esterilizado' => $query->esterilizado,
					'descripcion' => $query->descripcion
					);
				$this->load->view('plantilla', $data);
			}
		}
		else
		{
			if($_FILES['userfile']['name'] != "")
			{
				$config['upload_path'] = 'assets/images/mascotas/';
	            $config['allowed_types'] = '*';
	            //$config['max_width'] = 1024;
	            //$config['max_height'] = 1024;
	            $config['max_size'] = 100000;

	            $this->load->library('upload', $config);

	            if (!$this->upload->do_upload())
	            {
	                echo $this->upload->display_errors();
	            }
	            else
	            {
	            	$directorio = 'assets/images/mascotas/'.$foto;
	            	unlink($directorio);
	            	$foto = $this->upload->data('file_name');
	            	$this->mascotas_model->editar($id, $foto);
	            	echo "bien";
	            }
			}
			else
			{
				$this->mascotas_model->editar($id, $foto);
	            echo "bien";
			}
		}
	}
	public function adopta()
	{
		if(!$this->input->get('mascotas'))
		{
			$data = array(
				'titulo' => 'Adopción - Funprobiani',
				'contenido' => 'portada/adopcion_tipo_view',
				'menu' => true,
				'opcion' => 'adopta'
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$filas = $this->mascotas_model->num_mascotas();
			$per_page = 20;
			$this->pagination($filas, $per_page);
			$data = array(
				'titulo' => 'Mascotas en Adopción - Funprobiani',
				'contenido' => 'portada/adopcion_view',
				'especie' => $this->input->get('mascotas'),
				'menu' => true,
				'opcion' => 'adopta',
				'num_pets' => $filas,
				'pets' => $this->mascotas_model->mascotas($per_page),
				'pagination' => $this->pagination->create_links()
				);
			$this->load->view('plantilla', $data);
		}
	}
	function eliminar($id, $foto)
	{
		$this->mascotas_model->eliminar($id);
		$directorio = "assets/images/mascotas/".$foto;
		unlink($directorio);
		redirect(base_url().'mascotas');
	}
	function pagination($filas, $per_page)
	{
		$config['base_url'] = base_url().'mascotas/index/';
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