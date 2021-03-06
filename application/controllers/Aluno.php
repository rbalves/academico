<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {
	public function index()
	{
		$this->load->model('aluno_model');
		$consulta = $this->aluno_model->listar();
		$variaveis['consulta'] = $consulta;
		$this->load->view('alunos', $variaveis);
	}

	public function relatorio(){
		$this->load->library('pdf');
  		$this->pdf->load_view('alunos');
  		$this->pdf->render();
  		$this->pdf->stream("alunos.pdf");	
	}
}
