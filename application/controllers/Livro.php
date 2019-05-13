<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livro extends CI_Controller {

	/**
	 * Carrega o formulário para novo cadastro
	 * @param nenhum
	 * @return view
	 */
	public function create()
	{
		$variaveis['titulo'] = 'Novo Livro';
		$this->load->view('v_cadastro_livro', $variaveis);
	}
	/**
	 * Salva o registro no banco de dados.
	 * Caso venha o valor id, indica uma edição, caso contrário, um insert.
	 * @param campos do formulário
	 * @return view
	 */
	public function store(){
		
		$this->load->library('form_validation');
		
		$regras = array(
		        array(
		                'field' => 'titulo',
		                'label' => 'Titulo',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'categoria',
		                'label' => 'Categoria',
		                'rules' => 'required'		                
		        ),
		        array(
		                'field' => 'editora',
		                'label' => 'Editora',
		                'rules' => 'required'
		        )
		);
		
		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {
			$variaveis['titulo'] = 'Novo Registro';
			$this->load->view('v_cadastro_livro', $variaveis);
		} else {
			
			$id = $this->input->post('id');
			
			$dados = array(
			
				"titulo" => $this->input->post('titulo'),
				"categoria" => $this->input->post('categoria'),
				"editora" => $this->input->post('editora')
			
			);
			if ($this->m_livros->store($dados, $id)) {
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('v_sucesso', $variaveis);
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->load->view('errors/html/v_erro', $variaveis);
			}
				
		}
	}
	/**
	 * Chama o formulário com os campos preenchidos pelo registro selecioando.
	 * @param $id do registro
	 * @return view
	 */
	public function edit($id = null){
		
		if ($id) {
			
			$livros = $this->m_livros->get($id);
			
			if ($livros->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $livros->row()->id;
				$variaveis['titulo'] = $livros->row()->titulo;
				$variaveis['categoria'] = $livros->row()->categoria;
				$variaveis['editora'] = $livros->row()->editora;
				$this->load->view('v_cadastro_livro', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}
			
		}
		
	}
	/**
	 * Função que exclui o registro através do id.
	 * @param $id do registro a ser excluído.
	 * @return boolean;
	 */
	public function delete($id = null) {
		if ($this->m_livros->delete($id)) {
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->load->view('v_sucesso', $variaveis);
		}
	}
}
