<?php 
namespace App\Acme;

use App\TeamMembers;

use App\Models\Accounts\Income;
use App\Models\Accounts\SetupSelery;
use App\Models\Accounts\Expenditures;
use Illuminate\Support\Facades\Route;


class FooBar
{
    private $servicen;
    function getFooBar() { 
        return $this->servicen; 
    }


    public function setImage($service){
       $this->servicen = $service;
    }

    public function test(){
        return "hello world from foobar";
    }

    public function homeSliderFontStyle($str){
        $allwords = explode(" ",$str);
         $str = '';
        for ($i=0,$j=1; $i <count($allwords); $i++,$j++) {
            if (substr($allwords[$i],0,1) =="#")  { 
                 $str .= "<span>". str_replace("#"," ", $allwords[$i]) ."</span> "; 
            }else
                 $str .= $allwords[$i]." ";

                 if ($j==3) {
                     $str .= "<br />";
                     $j=1;
                 }
        }
        return $str;
    }

    public function getTeamMemberByTypeId($id){
        return TeamMembers::where("team_types_id",$id)->get();
    }

    public function wordLimitForServicePage($str,$limit) {
       
        $words = explode(" ", $str);
        $shown_string = "";
        if (count($words) > $limit) {
            if ( count($words) != 0 && !empty($str)) {
                for ($i=0; $i <$limit; $i++) { 
                    $shown_string .= $words[$i]." ";
                }
            }
        } else {
            $shown_string .= $str;
        }
       
        $shown_string .= " <a href='#'>Readmore...</a>";
        echo $shown_string;
    }

    public function getPageName() {
       $name =  Route::current()->uri;
       if ( $name == 'About') {
            return "About Bitmap";
       }
       else if ( $name == 'Protfolio') {
            return "Protpolios";
       }
       else if ( $name == 'Service') {
            return "Service Page";
       }
       else if ( $name == 'ContactUs') {
            return "Contact Bitmap";
       }
    }

    public function isSaleryKeySetup($u_id,$s_key="") {
        $itemcontent = array();
        if (!empty($s_key)) {
            $items =  SetupSelery::where('employee_id', $u_id)->where('salery_key_id', $s_key)->get();
            if (count($items) > 0) {
             foreach($items as $item) {
                 $itemcontent = [
                      'item_id' => $item->salery_key_id,
                      'item_amount' => $item->amount,
                      'token' => "true"
                 ];
              }
              return $itemcontent;
            } else {
                $itemcontent =[
                    'token' => "false"
                ];
                return $itemcontent;
            }
        } else {
            $items =  SetupSelery::where('employee_id', $u_id)->count();
            return $itemcontent = [ 'total_number' => $items ];
        }
    }
}




?>