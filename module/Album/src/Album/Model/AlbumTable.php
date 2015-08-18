<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlbumTable
 *
 * @author criativa
 */

namespace Album\Model;
use Zend\Db\TableGateway\TableGateway;

class AlbumTable {
    
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll(){
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    
    public function getAlbum($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->curren();
        if (!$row) {
            throw new Exception("Could not fund row $id");
        }
        
        return $row;
    }
    
    public function deleteAlbum($id) {
        $this->tableGateway->delete(['id'=> (int) $id]);
    }
}
