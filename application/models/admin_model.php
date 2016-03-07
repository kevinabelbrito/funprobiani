<?php

class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function very_user()
	{
		$where = array(
			'email' => $this->input->post('email'),
			'clave' => $this->input->post('password')
			);
		$query = $this->db->get_where('admin', $where);
		if ($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function admin_num()
	{
		$query = $this->db->get('admin');
		return $query->num_rows();
	}
	public function admin_list($per_page)
	{
		$this->db->order_by('nombre', 'asc');
		$query = $this->db->get('admin', $per_page, $this->uri->segment(3));
		return $query->result();
	}
	public function agregar()
	{
		$datos = array(
			'nombre' => $this->input->post('nombre', true),
			'email' => $this->input->post('email', true),
			'tipo' => $this->input->post('tipo', true),
			'clave' => $this->input->post('clave', true),
			);
		$this->db->insert('admin', $datos);
	}
	public function very_email($email)
	{
		$query = $this->db->get_where('admin', array('email' => $email));
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function modificar($id)
	{
		$set = array(
			'nombre' => $this->input->post('nombre', true),
			'email' => $this->input->post('email', true)
			);
		$condition = array('id' => $id);
		$this->db->update('admin', $set, $condition);
	}
	public function datos_usuario($id)
	{
		$query = $this->db->get_where('admin', array('id' => $id));
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function editar_usuario($id)
	{
		$set = array(
			'nombre' => $this->input->post('nombre', true),
			'email' => $this->input->post('email', true),
			'tipo' => $this->input->post('tipo', true)
			);
		$condition = array('id' => $id);
		$this->db->update('admin', $set, $condition);
	}
	public function eliminar($id)
	{
		$this->db->delete('admin', array('id' => $id));
	}
}

?>