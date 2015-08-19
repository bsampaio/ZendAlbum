<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlbumController
 *
 * @author Breno Grillo
 */
namespace Album\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController {
    
    protected $albumTable;
    
    public function indexAction() {
        return new ViewModel([
            'albums' => $this->getAlbumTable()->fetchAll(),
        ]);
    }
    
    public function addAction(){
        
    }
    
    public function editAction(){
        
    }
    
    public function deleteAction(){
        
    }
    
    public function getAlbumTable() {
        if(! $this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        
        return $this->albumTable;
    }
}
