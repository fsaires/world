<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Mundo Controller
 *
 * @property \App\Model\Table\MundoTable $Mundo
 */
class MundoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$pais = $this->loadModel('Paises');
    	$paises = $pais->find('list', ['keyField' => 'paiid','valueField' => 'painome', 'order' =>'painome']);
    	$estados = array();
    	$cidades = array();
    	
    	$this->set('paises', $paises);
    	$this->set('estados', $estados);
    	$this->set('cidades', $cidades);
    	$this->set('mundo', '');
    	$this->set('_serialize', ['paises','estados','cidades','mundo']);
    }

    /**
     * View method
     *
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getEstados()
    {

		if($this->request->is('ajax')) {
	    	$this->viewBuilder()->layout('ajax'); 
	    	$estado = $this->loadModel('Estados');
      	 	$estados = $estado->find('list', ['keyField' => 'estid','valueField' => 'estnome', 'order' =>'estnome'])->where(['paiid'=>$this->request->data['paiid']]);
      	 	$this->set('estados', $estados);
    	 	$this->set('_serialize', ['estados']);
    	 }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function getCidades()
    {
    	if($this->request->is('ajax')) {
    		$this->viewBuilder()->layout('ajax');
    		
    		if(empty($this->request->data['estid'])){
    			$estid = 0;
    		} else {
    			$estid = $this->request->data['estid'];
    		}
    	
    		$cidade = $this->loadModel('Cidades');
    		$cidades = $cidade->find('list', ['keyField' => 'cidid','valueField' => 'cidnome', 'order' =>'cidnome'])->where(['estid'=>$estid,'paiid'=>$this->request->data['paiid']]);
    		
    		$this->set('cidades', $cidades);
    		$this->set('_serialize', ['cidades']);
    	}
    }
    
    public function showDados()
    {
    	if($this->request->is('post')){
    		$paises = $this->loadModel('Paises');
    		$estados = $this->loadModel('Estados');
    		$cidades = $this->loadModel('Cidades');
    		
    		$pais = $paises->get($this->request->data['paiid']);
    		if(!empty($this->request->data['estid'])){
    			$estado = $estados->get($this->request->data['estid']);
    			$this->set('estado', $estado);
    		}
    		$cidade = $cidades->get($this->request->data['cidid']);

    		$this->set('pais', $pais);
    		$this->set('cidade', $cidade);
    		$this->set('_serialize', ['pais','estado','cidade']);
    	}
    }
    
    public function existeEstado()
    {
    
    	if($this->request->is('ajax')) {
    		$this->viewBuilder()->layout('ajax');
    		$estados = $this->loadModel('Estados');
    		$estado = $estados->find()->where(['paiid'=>$this->request->data['paiid']])->toArray();
    		
    		if(count($estado) > 0){
    			$existe = "S";
    		} else {
    			$existe = "N";
    		}
    		 
    		$this->set('existe', $existe);
    		$this->set('_serialize', ['existe']);
    	}
    }
    
}
