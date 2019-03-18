<?php
class Curso_model extends CI_Model{
	
	public function __construct()
    {
        parent::__construct();
    }

	public function listar(){
		
		$consulta = $this->db->get("curso");

		return $consulta;
	}

	public function buscar_dados(){
		
		$id = $this->session->userdata("id");
		
		$this->db->where("id",$id);
		
		$consulta = $this->db->get("promotor");

		return $consulta;
	}

	public function salvar_dados(){

		$id = $this->session->userdata("id");

		$pasta = "/application/views/img/";
		$arquivo = $pasta . basename($_FILES["imagem"]["name"]);
		$tipo = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));

		define ('SITE_ROOT', realpath(dirname('models')));
		
		if (move_uploaded_file($_FILES["imagem"]["tmp_name"], SITE_ROOT.$arquivo)){
			$imagem = $_FILES["imagem"]["name"];
		}else{
			$imagem = "default.jpg";
		}

		$dados = array(
		"id" => "DEFAULT", 
		"titulo" => $this->input->post("titulo"),
		"descricao" => $this->input->post("descricao"),
		"data_inicial" => $this->input->post("data_inicial"),
		"data_final" => $this->input->post("data_final"),
		"endereco" => $this->input->post("endereco"),
		"valor" => $this->input->post("valor"),
		"status" => $this->input->post("status"),
		"imagem" => $imagem,
		"id_promotor" => $id,
		); 

		$query = $this->db->insert("evento", $dados);

		if ($query) 
			return true;
		else 
			return false;
	}

	public function update_evento(){

		$id_promotor = $this->session->userdata("id");
		$id_evento = $this->input->post("id");
		
		$dados = array(
		"titulo" => $this->input->post("titulo"),
		"descricao" => $this->input->post("descricao"),
		"data_inicial" => $this->input->post("data_inicial"),
		"data_final" => $this->input->post("data_final"),
		"endereco" => $this->input->post("endereco"),
		"valor" => $this->input->post("valor"),
		"status" => $this->input->post("status"),
		"id_promotor" => $id_promotor,
		);

		$this->db->where('id', $id_evento);
		$query = $this->db->update("evento", $dados);

		if ($query) 
			return true;
		else 
			return false;
	}
}
?>