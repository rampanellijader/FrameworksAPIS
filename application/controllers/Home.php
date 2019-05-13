<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */
	
	public function index()
	{
		
		$variaveis['livros'] = $this->m_livros->get();
		$this->load->view('v_teste', $variaveis);
		

		$variaveis['cadastros'] = $this->m_cadastros->get();
		$this->load->view('v_home', $variaveis);	
		
	}

	/*public function index2(){
		$variaveis['livros'] = $this->m_livros->get();
		$this->load->view('v_teste', $variaveis);
	}
	*/
}
