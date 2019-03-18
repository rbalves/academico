<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {
	
	public function index()
	{
		$this->load->model('professor_model');
		$consulta = $this->professor_model->listar();
		$variaveis['consulta'] = $consulta;
		$this->load->view('professores', $variaveis);
	}

	public function salvar()
	{

		$this->load->model('professor_model');
		
		$resultado = $this->professor_model->salvar();

		if ($resultado){
		  
		  $variaveis['mensagem'] = "Os dados do evento foram registrados com êxito!";
		  $variaveis['status'] = "Sucesso";
		  $variaveis['class'] = "alert alert-success alert-dismissible";
		}
		else{ 
		  
		  $variaveis['mensagem'] = "Suas informações não foram registradas! Tente novamente ou entre em contato!";
		  $variaveis['status'] = "Erro";
		  $variaveis['class'] = "alert alert-danger alert-dismissible";
		}

		$consulta = $this->professor_model->listar();
		$variaveis['consulta'] = $consulta;

		$this->load->view('professor', $variaveis);
	}

	public function atualiza_evento()
	{

		$this->load->model('sessao_model');
		
		$resultado = $this->sessao_model->update_evento();

		if ($resultado){
		  
		  $variaveis['mensagem'] = "Os dados do evento foram alterados com êxito!";
		  $variaveis['status'] = "Sucesso";
		  $variaveis['class'] = "alert alert-success alert-dismissible";
		  
		  $this->load->model('sessao_model');
		  $consulta = $this->sessao_model->eventos();
		  $variaveis['consulta'] = $consulta;
		  $this->load->view('sessao/lista_eventos', $variaveis);
		}
		else{ 
		  
		  $variaveis['mensagem'] = "Suas informações não foram alteradas! Tente novamente ou entre em contato!";
		  $variaveis['status'] = "Erro";
		  $variaveis['class'] = "alert alert-danger alert-dismissible";
		  
		  $this->load->model('sessao_model');
		  $consulta = $this->sessao_model->eventos();
		  $variaveis['consulta'] = $consulta;
		  $this->load->view('sessao/lista_eventos', $variaveis);
		}
	}

	public function info()
	{
		$this->load->model('sessao_model');

		$consulta = $this->sessao_model->buscar_dados();

		$variaveis['consulta'] = $consulta;

		$this->load->view('sessao/dados_pessoais', $variaveis);
	}

	public function alterar_dados(){

		$this->load->model('sessao_model');
		
		$resultado = $this->sessao_model->update_promotor();

		if ($resultado){
		  	
		  	$variaveis['mensagem'] = "Suas informações foram alteradas com êxito!";
		  	$variaveis['status'] = "Sucesso";
		  	$variaveis['class'] = "alert alert-success alert-dismissible";
		  	
		  	$this->load->model('sessao_model');
			$consulta = $this->sessao_model->buscar_dados();
			$variaveis['consulta'] = $consulta;
			$this->load->view('sessao/dados_pessoais', $variaveis);
		}
		else{ 
		  	$variaveis['mensagem'] = "Suas informações não foram alteradas! Tente novamente ou entre em contato!";
		  	$variaveis['status'] = "Erro";
		  	$variaveis['class'] = "alert alert-danger alert-dismissible";

		  	$this->load->model('sessao_model');
			$consulta = $this->sessao_model->buscar_dados();
			$variaveis['consulta'] = $consulta;
			$this->load->view('sessao/dados_pessoais', $variaveis);
		}
	}
}
