<?php 
namespace  App\Repository\contracts;

interface BaseContracts{
        public function getAll();
        public function saveData(array $data);
        public function updateData(array $data,$id);
        public function deleteData($id);
        public function getById($id);
        
}




?>