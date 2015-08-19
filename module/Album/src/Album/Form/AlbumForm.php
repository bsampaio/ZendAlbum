<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlbumForm
 *
 * @author Breno Grillo
 */
namespace Album\Form;
use Zend\Form\Form;

class AlbumForm  extends Form{

    public function __construct($name = null) {
        
        //Ignorando o nome passado
        parent::__construct('album');
        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ]);
        $this->add([
            'name'    => 'title',
            'type'    => 'Text',
            'options' => [
                'label' => 'Title',
            ],
        ]);
        $this->add([
            'name'      => 'artist',
            'type'      => 'Text',
            'options'   => [
                'label' => 'Artist'
            ],
        ]);
        $this->add([
            'name'       => 'submit',
            'type'       => 'Submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton'
            ]
        ]);
    }
}
