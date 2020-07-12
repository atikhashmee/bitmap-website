<?php 
namespace App\Repository\eloquent;

use App\Repository\contracts\TeamCategory as Tinterface;

use App\TeamType;

class TeamTypeEloquent implements Tinterface 
{
    private $teamtype;

    function __construct(TeamType $teamtype ) {
        $this->teamtype = $teamtype;
    }


    public function getAll(){

    }
    public function saveData(array $data){
      $this->teamtype->category_title = $data['cat_name'];
      $this->teamtype->description = $data['description'];
      $this->teamtype->save();
      return true;
    }
    public function updateData(array $data, $id){

    }
    public function deleteData($id){

    }
    public function getById($id){

    }
}



?>