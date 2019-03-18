<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller {
	public function index()
	{
		$this->load->model('curso_model');
		$consulta = $this->curso_model->listar();
		$variaveis['consulta'] = $consulta;
		$this->load->view('cursos', $variaveis);
	}
}
