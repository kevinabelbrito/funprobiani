<?php

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('personas_model');
		$this->load->model('admin_model');
		date_default_timezone_set("America/Caracas");
        setlocale(LC_TIME,"Spanish");
	}
	public function index()
	{
		$data = array(
			'titulo' => 'Funprobiani',
			'contenido' => 'portada/home_view',
			'menu' => true,
			'opcion' => 'home'
			);
		$this->load->view('plantilla', $data);
	}
	public function nosotros()
	{
		$data = array(
			'titulo' => 'Nosotros - Funprobiani',
			'contenido' => 'portada/nosotros_view',
			'menu' => true,
			'opcion' => 'nosotros'
			);
		$this->load->view('plantilla', $data);
	}
	public function ayuda()
	{
		$data = array(
			'titulo' => '¿Quienes pueden ayudar? - Funprobiani',
			'contenido' => 'extras/ayudar_view',
			'menu' => true,
			'opcion' => 'none'
			);
		$this->load->view('plantilla', $data);
	}
	public function creencias()
	{
		$data = array(
			'titulo' => 'Nuestras Creencias - Funprobiani',
			'contenido' => 'extras/creencias_view',
			'menu' => true,
			'opcion' => 'none'
			);
		$this->load->view('plantilla', $data);
	}
	public function criterios()
	{
		$data = array(
			'titulo' => 'Criterios Generales - Funprobiani',
			'contenido' => 'extras/criterios_view',
			'menu' => true,
			'opcion' => 'none'
			);
		$this->load->view('plantilla', $data);
	}
	public function necesidades()
	{
		$data = array(
			'titulo' => 'Nuestras necesidades inmediatas - Funprobiani',
			'contenido' => 'extras/necesidades_view',
			'menu' => true,
			'opcion' => 'none'
			);
		$this->load->view('plantilla', $data);
	}
	public function donaciones()
	{
		$data = array(
			'titulo' => 'Donaciones - Funprobiani',
			'contenido' => 'portada/donaciones_view',
			'menu' => true,
			'opcion' => 'dona'
			);
		$this->load->view('plantilla', $data);
	}
	public function contactanos()
	{
		$data = array(
			'titulo' => 'Contactanos - Funprobiani',
			'contenido' => 'portada/contactanos_view',
			'menu' => true,
			'opcion' => 'contacto'
			);
		$this->load->view('plantilla', $data);
	}
	public function login()
	{
		$this->very_session();
		if (!$this->input->is_ajax_request())
		{
			if ($this->input->get('link'))
			{
				$link = $this->input->get('link');
			}
			else
			{
				$link = "";
			}
			$data = array(
				'titulo' => 'Iniciar Sesión - Funprobiani',
				'contenido' => 'portada/login_view',
				'menu' => true,
				'opcion' => 'none',
				'link' => $link
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$query = $this->personas_model->very_session();
			$query_admin = $this->admin_model->very_user();
			if ($query != false)
			{
				$data = array(
					'tipo' => 'persona',
					'id' => $query->id,
					'nombre' => $query->nombre,
					'email' => $query->email,
					'tlf' => $query->tlf,
					'cedula' => $query->cedula,
					'foto' => $query->foto,
					'clave' => $query->clave,
					'tipo_persona' => $query->tipo
					);
				$this->session->set_userdata($data);
				echo "persona";
			}
			elseif($query_admin != false)
			{
				$data = array(
					'tipo' => 'admin',
					'id' => $query_admin->id,
					'nombre' => $query_admin->nombre,
					'email' => $query_admin->email,
					'clave' => $query_admin->clave,
					'tipo_admin' => $query_admin->tipo
					);
				$this->session->set_userdata($data);
				echo "admin";
			}
			else
			{
				echo "No fue posible iniciar la sesion";
			}
		}
	}
	public function singin()
	{
		$this->very_session();
		if(!$this->input->post('nombre'))
		{
			$data = array(
				'titulo' => 'Registrate - Funprobiani',
				'contenido' => 'portada/singin_view',
				'menu' => true,
				'opcion' => 'none'
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$query = $this->personas_model->very_persona();
			$query_admin = $this->admin_model->very_email($this->input->post('email'));
			if($query == false && $query_admin == false)
			{
				if($_FILES['userfile']['name'] == "")
				{
					$this->personas_model->registrar("avatar.png");
	            	echo "bien";
				}
				else
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
		            	$this->personas_model->registrar($this->upload->data('file_name'));
		            	echo "bien";
		            }
				}
			}
			else
			{
				echo "Ya se encuentra registrado.";
			}
		}
	}
	public function recuperar()
	{
		if(!$this->input->is_ajax_request())
		{
			$data = array(
				'titulo' => 'Olvide mi contraseña',
				'contenido' => 'portada/recuperar_view',
				'menu' => true,
				'opcion' => 'none'
				);
			$this->load->view('plantilla', $data);
		}
		else
		{
			$query_admin = $this->admin_model->very_email($this->input->post('email'));
			$query = $this->personas_model->very_email($this->input->post('email'));
			if($query_admin == false && $query == false)
			{
				echo $this->input->post('email')." no se encuentra asociado a ninguna cuenta";
			}
			else if($query_admin != false)
			{
				$this->enviar_email($query_admin->nombre, $query_admin->clave);
			}
			else
			{
				$this->enviar_email($query->nombre, $query->clave);
			}
		}
	}
	function enviar_email($nombre, $clave)
	{
		//Cargamos la libreria email
		//$this->load->library('email');				
		//Guaramos los parametros del email en una variable
		/*$email = $this->input->post('email');
		$asunto = "Recuperacion de Clave";
		$msj = "<h1>Recuperación de Contraseña</h1><br>";
		$msj .= "<p>Reciba un cordial saludo estimado <strong>". $nombre ."</strong>, recibimos una solicitud para recuperar su contraseña, a continuacion le facilitamos sus credenciales de usuario</p><br>";
		$msj .= "<strong>E-Mail: </strong>".$email."<br>";
		$msj .= "<strong>Contraseña: </strong>".$clave."<br><br>";*/
		//Inicializamos la libreria
		/*$config['mailtype'] = "html";
		$this->email->initialize($config);*/
		//Indicamos los parametros para el email
		/*$this->email->from('funprobiani@gmail.com', 'Funprobiani');
		$this->email->to($email);
		$this->email->subject($asunto);
		$this->email->message($msj);
		$this->email->send();*/
		echo "bien";
	}
	public function perfiles()
	{
		$this->very_persona();
		$id = $this->session->userdata('id');
		$query = $this->personas_model->datos_per($id);
		$data = array(
			'titulo' => $query->nombre.' - Funprobiani',
			'contenido' => 'personas/perfiles_view',
			'menu' => true,
			'opcion' => 'none',
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
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	function very_session()
	{
		if($this->session->userdata('tipo') != "")
		{
			redirect(base_url());
		}
	}
	function very_persona()
	{
		if($this->session->userdata('tipo') != "persona")
		{
			redirect(base_url());
		}
	}
}

?>