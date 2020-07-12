<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use App\TeamMembers;
use App\Models\Accounts\Paysalery;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\CreateEmployeeLoanRequest;

class CreatePaysaleryRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Paysalery::$rules;
    }


    public function saleryLimit($id,$date){


        $amont = TeamMembers::with(['saleryPayment'=> function($query) use ($date,$id)  {
            $query->whereMonth('date', Carbon::createFromFormat('Y-m-d',date($date))->month );
            $query->where('employee_id',$id);
        }])->get();
    

      
        $sum = 0;
        foreach ($amont as $salry) {
              foreach ($salry->saleryPayment as $sly) {
                
                   if($sly->employee_id == $id) $sum += $sly->payamount;
              }
             
        }
        
        
       return ($this->getSaleryAmount($id) <= $sum ) ? true : false ;


    }

    public function getSaleryAmount($id){
         $re  = new CreateEmployeeLoanRequest();
        return $re->loanEligibility($id)->caculateSaleryAmount();
    }




}
