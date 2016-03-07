<?php

class Donaciones_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function donar($tipo)
	{
		$data = array(
			'id_persona' => $this->session->userdata('id'),
			'tipo' => $tipo,
			'descripcion' => $this->input->post('descripcion'),
			'cantidad' => $this->input->post('cantidad'),
			'solicitud' => date("Y-m-d H:i:s"),
			'estado' => 'Espera'
			);
		$this->db->insert('donaciones', $data);
	}
	public function num_don()
	{
		$query = $this->db->get('donaciones');
		return $query->num_rows();
	}
	public function donaciones($per_page)
	{
		$this->db->select('p.nombre, d.id, d.tipo, d.descripcion, d.cantidad, d.solicitud, d.respuesta, d.estado');
		$this->db->from('donaciones d');
		$this->db->join('personas p', 'd.id_persona = p.id');
		$this->db->order_by('solicitud', 'desc');
		$this->db->limit($per_page, $this->uri->segment(3));
		$query = $this->db->get();
		return $query->result();
	}
	public function decidir($respuesta, $id)
	{
		$set = array(
			'respuesta' => date("Y-m-d H:i:s"),
			'estado' => $respuesta
			);
		$condition = array('id' => $id);
		$this->db->update('donaciones', $set, $condition);
	}
}

?>