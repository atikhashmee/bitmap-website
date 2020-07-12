

<?php

use App\Models\Accounts\Income;
use App\Models\Accounts\Paysalery;
use App\Models\Accounts\EmployeeLoan;
use App\Models\Accounts\Expenditures;

if (!function_exists('greet')) {
    /**
     * Greeting a person
     *
     * @param  string $person Name
     * @return string
     */
    function greet($person)
    {
        return 'Hello ' . $person;
    }

    function availableTaka(){

        $allexpense = 0;

        //from expense
        
        $allexpense += Expenditures::get()->sum('amount');
       $allexpense += EmployeeLoan::get()->sum('amount');
       $allexpense += Paysalery::get()->sum('payamount'); 
        $income =  Income::get()->sum('amount');
         return ($income - $allexpense);
    }


    function userType($role){
        $name;
        switch($role){
            case '0':
                 $name = "Admin";
                break;
            case '1':
                 $name = "Accounts";
                break;
            case '2':
                 $name = "Project Manager";
                break;
            case '3':
                 $name = "Editor";
                break;
        }
        return $name;
    }


}