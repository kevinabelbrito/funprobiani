<?php

class Adopciones_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function num_adopciones()
	{
		$query = $this->db->get('adopciones');
		return $query->num_rows();
	}
	public function adopciones($per_page)
	{
		$this->db->select('m.nombre, m.edad, m.foto, a.id, a.solicitud, a.respuesta, a.estado');
		$this->db->from('adopciones a');
		$this->db->join('mascotas m', 'a.id_mascota = m.id');
		$this->db->order_by('a.solicitud', 'desc');
		$this->db->limit($per_page, $this->uri->segment(3));
		$query = $this->db->get();
		return $query->result();
	}
	public function adoptar($id)
	{
		$data = array(
			'id_persona' => $this->session->userdata('id'),
			'id_mascota' => $id,
			'solicitud' => date("Y-m-d H:i:s"),
			'estado' => "Espera"
			);
		$this->db->insert('adopciones', $data);
		$this->db->order_by('id', 'desc');
		$adopcion = $this->db->get('adopciones')->row();
		$data = array(
			'id_adopcion' => $adopcion->id,
			'interes' => $this->input->post('interes'),
			'mascotas' => $this->input->post('mascotas'),
			'esterilizacion' => $this->input->post('esterilizacion'),
			'personas' => $this->input->post('personas'),
			'casa' => $this->input->post('casa'),
			'compromiso' => $this->input->post('compromiso'),
			'atencion' => $this->input->post('atencion'),
			'economico' => $this->input->post('economico'),
			'responsable' => $this->input->post('responsable'),
			'veterinario' => $this->input->post('veterinario'),
			'vacacion' => $this->input->post('vacacion'),
			'visitas' => $this->input->post('visitas'),
			'parametros' => $this->input->post('parametros'),
			);
		$this->db->insert('entrevistas', $data);
	}
	public function detalles_adopcion($id)
	{
		$this->db->select('p.nombre as persona, p.tipo, p.cedula, p.tlf, p.foto as foto_per, m.nombre as mascota, m.especie, m.edad, m.foto as foto_mas, a.id, a.id_mascota, a.solicitud, a.respuesta, a.estado');
		$this->db->from('adopciones a');
		$this->db->join('mascotas m', 'a.id_mascota = m.id');
		$this->db->join('personas p', 'a.id_persona = p.id');
		$this->db->where('a.id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function datos_entrevista($id)
	{
		$query = $this->db->get_where('entrevistas', array('id_adopcion' => $id));
		return $query->row();
	}
	public function decidir($respuesta, $id, $id_mascota)
	{
		if($respuesta == "Aprobada")
		{
			$set = array('estado' => "Adoptada");
			$condition = array('id' => $id_mascota);
			$this->db->update('mascotas', $set, $condition);
			$set = array(
				'respuesta' => date("Y-m-d h:i:s"),
				'estado' => "Rechazada");
			$condition = array('id_mascota' => $id_mascota);
			$this->db->update('adopciones', $set, $condition);
		}
		$set = array(
			'respuesta' => date("Y-m-d h:i:s"),
			'estado' => $respuesta
			);
		$condition = array('id' => $id);
		$this->db->update("adopciones", $set, $condition);
	}
}

?>