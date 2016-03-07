<?php

class Mascotas_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function num_mascotas()
	{
		if ($this->input->get('mascotas'))
		{
			$data = array(
				'especie' => $this->input->get('mascotas'),
				'estado' => "Fundacion"
				);
			$this->db->where($data);
		}
		$query = $this->db->get('mascotas');
		return $query->num_rows();
	}
	public function mascotas($per_page)
	{
		if ($this->input->get('mascotas'))
		{
			$data = array(
				'especie' => $this->input->get('mascotas'),
				'estado' => "Fundacion"
				);
			$this->db->where($data);
		}
		$this->db->order_by('feing', 'desc');
		$query = $this->db->get('mascotas', $per_page, $this->uri->segment(3));
		return $query->result();
	}
	public function add_pet($foto)
	{
		$data = array(
			'nombre' => $this->input->post('nombre', true),
			'edad' => $this->input->post('edad', true),
			'peso' => $this->input->post('peso', true),
			'especie' => $this->input->post('especie', true),
			'sexo' => $this->input->post('sexo', true),
			'vacunado' => $this->input->post('vacunado', true),
			'esterilizado' => $this->input->post('esterilizado', true),
			'descripcion' => $this->input->post('descripcion', true),
			'foto' => $foto,
			'estado' => 'Fundacion',
			'feing' => date("Y-m-d H:i:s"),
			);
		$this->db->insert('mascotas', $data);
	}
	public function perfil($id)
	{
		$query = $this->db->get_where('mascotas', array('id' => $id));
		if($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function editar($id, $foto)
	{
		$set = array(
			'nombre' => $this->input->post('nombre', true),
			'edad' => $this->input->post('edad', true),
			'peso' => $this->input->post('peso', true),
			'especie' => $this->input->post('especie', true),
			'sexo' => $this->input->post('sexo', true),
			'vacunado' => $this->input->post('vacunado', true),
			'esterilizado' => $this->input->post('esterilizado', true),
			'descripcion' => $this->input->post('descripcion', true),
			'foto' => $foto,
			);
		$condition = array('id' => $id);
		$this->db->update('mascotas', $set, $condition);
	}
	public function eliminar($id)
	{
		$this->db->delete('mascotas', array('id' => $id));
	}
}

?>