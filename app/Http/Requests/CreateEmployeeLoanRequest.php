<?php

namespace App\Http\Requests;

use App\TeamMembers;
use App\Models\Accounts\EmployeeLoan;
use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeLoanRequest extends FormRequest
{
    private $employeeid;

    private $employee;

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
        return EmployeeLoan::$rules;
    }

    
    public function loanEligibility($id){
        
         if (!empty($id)) {
            
            $this->employeeid = $id;
            $this->setEmplyee();
         }
          return $this;
    }
    public function setEmplyee(){
        $this->employee = TeamMembers::find($this->employeeid);
    }


    public function caculateSaleryAmount(){
         
        $salery_total = $this->employee->salerykeys;
        $sum = 0;
        foreach($salery_total as $eloan){
             $sum += $eloan->pivot->amount;
        }
        return $sum;
    }

    public function loanAlreadyTaken(){
        return $this->employee->loans->sum('amount');
    }

    public function loanAlreadyPaid(){
        return $this->employee->saleryPayment->sum('loan');
    }

    public function elegible(){
        $salery  = $this->caculateSaleryAmount();
        $loanamount = abs($this->loanAlreadyTaken()-$this->loanAlreadyPaid());
        return ($loanamount > $salery ) ? true : false;
    }


}
