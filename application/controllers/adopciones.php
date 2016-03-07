<?php

class Adopciones extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('adopciones_model');
		date_default_timezone_set("America/Caracas");
        setlocale(LC_TIME,"Spanish");
	}
	public function index()
	{
		$filas = $this->adopciones_model->num_adopciones();
		$per_page = 20;
		$this->pagination($filas, $per_page);
		$data = array(
			'titulo' => 'Adopciones - Funprobiani',
			'contenido' => 'adopciones/adopciones_view',
			'num_adopciones' => $filas,
			'adopciones' => $this->adopciones_model->adopciones($per_page),
			'pagination' => $this->pagination->create_links()
			);
		$this->load->view('plantilla', $data);
	}
	public function detalles($id)
	{
		$query = $this->adopciones_model->detalles_adopcion($id);
		if($query == false)
		{
			redirect(base_url().'adopciones');
		}
		else
		{
			$entrevista = $this->adopciones_model->datos_entrevista($id);
			$data = array(
				'titulo' => 'Detalles de la Adopción - Funprobiani',
				'contenido' => 'adopciones/detalles_view',
				'id' => $query->id,
				'id_mascota' => $query->id_mascota,
				//Datos de la persona, mascota y adopcion
				'persona' => $query->persona,
				'tipo' => $query->tipo,
				'cedula' => $query->cedula,
				'tlf' => $query->tlf,
				'foto_per' => $query->foto_per,
				'mascota' => $query->mascota,
				'especie' => $query->especie,
				'edad' => $query->edad,
				'foto_mas' => $query->foto_mas,
				'solicitud' => $query->solicitud,
				'respuesta' => $query->respuesta,
				'estado' => $query->estado,
				//Datos de la entrevista
				'interes' => $entrevista->interes,
				'mascotas' => $entrevista->mascotas,
				'esterilizacion' => $entrevista->esterilizacion,
				'personas' => $entrevista->personas,
				'casa' => $entrevista->casa,
				'compromiso' => $entrevista->compromiso,
				'atencion' => $entrevista->atencion,
				'economico' => $entrevista->economico,
				'responsable' => $entrevista->responsable,
				'veterinario' => $entrevista->veterinario,
				'vacacion' => $entrevista->vacacion,
				'visitas' => $entrevista->visitas,
				'parametros' => $entrevista->parametros
				);
			$this->load->view('plantilla', $data);
		}
	}
	public function tramitar($id, $especie)
	{
		$this->very_persona("adopciones/tramitar/".$id."/".$especie);
		if(!$this->input->is_ajax_request())
		{
			$data = array(
				'titulo' => 'Tramitar Adopción - Funprobiani',
				'contenido' => 'adopciones/adoptar_view',
				'id_mascota' => $id,
				'especie' => $especie,
				'menu' => true,
				'opcion' => 'adopta'
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$this->adopciones_model->adoptar($id);
			echo "bien";
		}
	}
	function decidir($respuesta, $id, $id_mascota)
	{
		$this->adopciones_model->decidir($respuesta, $id, $id_mascota);
		redirect(base_url().'adopciones/detalles/'.$id);
	}
	function pagination($filas, $per_page)
	{
		$config['base_url'] = base_url().'adopciones/index/';
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