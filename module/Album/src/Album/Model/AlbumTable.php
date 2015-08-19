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
        $row = $rowset->current();
        if (!$row) {
            throw new Exception("Could not fund row $id");
        }
        
        return $row;
    }
    
    public function saveAlbum(Album $album) {
        $data = [
            'artist' => $album->artist,
            'title'  => $album->title
        ];
        
        $id = (int) $album->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($id)) {
                $this->tableGateway->update($data, ['id' => $id]);
            } else {
                throw new Exception("Album $id does not exist");
            }
        }
    }

    public function deleteAlbum() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album');
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
            
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getAlbumTable()->deleteAlbum($id);
            }
            
            return $this->redirect()->toRoute('album');
        }
        
        return [
            'id'    => $id,
            'album' => $this->getAlbumTable()->getAlbum($id)
        ];
    }
}
