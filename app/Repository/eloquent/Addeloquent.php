<?php 
namespace App\Repository\eloquent;

use App\Repository\contracts\AddRepository;
use App\User;

class Addeloquent implements AddRepository
{

    private $user;

    public function __construct(User $user) {
        $this->user =  $user;
    }

    public function getAll(){
        return $this->user->all();
    }
    public function createNewRecord(array $data){

    }
    public function updateRecords(array $data, $id){
            
    }
    public function deleteRecord($id){

    }
    public function showById($id){
        
    }



}




?>