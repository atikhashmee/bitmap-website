<?php  
namespace App\Repository\contracts;

 
  interface AddRepository {
         
        public function getAll();
        public function createNewRecord(array $data);
        public function updateRecords(array $data, $id);
        public function deleteRecord($id);
        public function showById($id);
     
  }




 ?>