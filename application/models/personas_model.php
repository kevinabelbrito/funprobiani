<?php

class Personas_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function very_persona()
	{
		if ($this->session->userdata('tipo') != "admin")
		{
			$this->db->where('cedula', $this->input->post('cedula', true));
		}
		$this->db->or_where('email', $this->input->post('email', true));
		$query = $this->db->get('personas');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function very_email($email)
	{
		$query = $this->db->get_where('personas', array('email' => $email));
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function registrar($foto)
	{
		$datos = array(
			'tipo' => $this->input->post('tipo', true),
			'nombre' => $this->input->post('nombre', true),
			'cedula' => $this->input->post('cedula', true),
			'fenac' => date("Y-m-d", strtotime($this->input->post('fenac', true))),
			'edo_civil' => $this->input->post('edo_civil', true),
			'tlf' => $this->input->post('tlf', true),
			'email' => $this->input->post('email', true),
			'dir' => $this->input->post('dir', true),
			'foto' => $foto,
			'viv' => $this->input->post('viv', true),
			'nro_casa' => $this->input->post('nro_casa', true),
			'tlf_local' => $this->input->post('tlf_local', true),
			'dir_hogar' => $this->input->post('dir_hogar', true),
			'clave' => $this->input->post('clave', true)
			);
		$this->db->insert('personas', $datos);
	}
	public function num_personas()
	{
		$query = $this->db->get('personas');
		return $query->num_rows();
	}
	public function personas($per_page)
	{
		$this->db->order_by('nombre', 'asc');
		$query = $this->db->get('personas', $per_page, $this->uri->segment(3));
		return $query->result();
	}
	public function datos_per($id)
	{
		$query = $this->db->get_where('personas', array('id' => $id));
		if ($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function adopcion_usuario($id)
	{
		$this->db->select('m.nombre, m.edad, m.foto, a.id, a.solicitud, a.respuesta, a.estado');
		$this->db->from('adopciones a');
		$this->db->join('mascotas m', 'a.id_mascota = m.id');
		$this->db->where('a.id_persona', $id);
		$this->db->order_by('a.solicitud', 'desc');
		$query = $this->db->get();
		return $query;
	}
	public function donacion_usuario($id)
	{
		$this->db->order_by('solicitud', 'desc');
		$query = $this->db->get_where('donaciones', array('id_persona' => $id));
		return $query;
	}
	public function editar($id, $foto)
	{
		$set = array(
			'tipo' => $this->input->post('tipo', true),
			'nombre' => $this->input->post('nombre', true),
			'cedula' => $this->input->post('cedula', true),
			'fenac' => date("Y-m-d", strtotime($this->input->post('fenac', true))),
			'edo_civil' => $this->input->post('edo_civil', true),
			'tlf' => $this->input->post('tlf', true),
			'email' => $this->input->post('email', true),
			'dir' => $this->input->post('dir', true),
			'foto' => $foto,
			'viv' => $this->input->post('viv', true),
			'nro_casa' => $this->input->post('nro_casa', true),
			'tlf_local' => $this->input->post('tlf_local', true),
			'dir_hogar' => $this->input->post('dir_hogar', true)
			);
		$condition = array('id' => $id);
		$this->db->update('personas', $set, $condition);
	}
	public function eliminar($id)
	{
		$this->db->delete('personas', array('id' => $id));
	}
	public function very_session()
	{
		$where = array(
			'email' => $this->input->post('email'),
			'clave' => $this->input->post('password')
			);
		$query = $this->db->get_where('personas', $where);
		if ($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
}

?>