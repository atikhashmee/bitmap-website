<?php

namespace App\Http\Controllers\Accounts;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Models\Accounts\EmployeeLoan;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EmployeeLoanRepository;
use App\Http\Requests\CreateEmployeeLoanRequest;
use App\Http\Requests\UpdateEmployeeLoanRequest;
use Prettus\Repository\Criteria\RequestCriteria;

class EmployeeLoanController extends AppBaseController
{
    /** @var  EmployeeLoanRepository */
    private $employeeLoanRepository;

    public function __construct(EmployeeLoanRepository $employeeLoanRepo)
    {
        $this->employeeLoanRepository = $employeeLoanRepo;
    }

    /**
     * Display a listing of the EmployeeLoan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->employeeLoanRepository->pushCriteria(new RequestCriteria($request));
        $employeeLoans = $this->employeeLoanRepository->paginate(10);

        return view('components.accounts.employee_loans.index')
            ->with('employeeLoans', $employeeLoans)->with('employeelist',\App\TeamMembers::get(['member_name','id']));
    }

    
    public function filter(Request $r){


           $startdate = $r->input('stdate');
           $enddate = $r->input('endate');
           $employeeid = $r->input('employee');
             
           $emp_loan = NULL;

           if ( !empty($startdate) && empty($enddate) && empty($employeeid)) {
            $emp_loan = EmployeeLoan::where('date', $startdate)->paginate(10);
           }else if (!empty($startdate) && !empty($enddate) && empty($employeeid)) {
            $emp_loan = EmployeeLoan::whereBetween('date', [$startdate,$enddate])->paginate(10);
           }else if (!empty($startdate) && !empty($enddate) && !empty($employeeid)) {
            $emp_loan = EmployeeLoan::whereBetween('date', [$startdate,$enddate])->where('employee_id',$employeeid)->paginate(10);
           }
           else {
               Flash::error('You haven\'t choshen any filter option');
               $emp_loan = $this->employeeLoanRepository->paginate(10);
            }

        
          return view('components.accounts.employee_loans.index')->with('employeeLoans', $emp_loan)
          ->with('employeelist', \App\TeamMembers::get(['member_name','id']));



          /* 
              $employeeloan   = EmployeeLoan::paginate(10);
            if ($r->has('employeeid') != null &&  $r->has('stdate') == null && $r->has('endate') == null ) {
            
                 $employeeloan   = EmployeeLoan::where('employee_id',$r->input('employeeid'))->paginate(10);
            }
            else if(($r->has('employeeid') != null &&  $r->has('stdate') != null) && $r->has('endate') == null){
                $employeeloan   = EmployeeLoan::where('employee_id',$r->input('employeeid'))->where('date',$r->input('stdate'))->paginate(10);
            }else if($r->has('employeeid') != null &&  $r->has('stdate') != null && $r->has('endate') != null){
                
                $employeeloan   = EmployeeLoan::where('employee_id',$r->input('employeeid'))->whereBetween('date',[$r->input('stdate'),$r->input('endate')])->paginate(10);
            }
          return view('components.accounts.employee_loans.index')
          ->with('employeeLoans', $employeeloan)
          ->with('employeelist',\App\TeamMembers::get(['member_name','id'])); */
    }

    /**
     * Show the form for creating a new EmployeeLoan.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.accounts.employee_loans.create')
        ->with('employee',\App\TeamMembers::pluck('member_name','id'))
        ;
    }

    /**
     * Store a newly created EmployeeLoan in storage.
     *
     * @param CreateEmployeeLoanRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeLoanRequest $request)
    {
        if (availableTaka() < $request->input('amount')) {
            Flash::error('You have no sufficient Balance <a href="#">see why</a>');
        }
         else  if(!$request->loanEligibility($request->input('employee_id'))->elegible())
        {
           $input = $request->all();

           $employeeLoan = $this->employeeLoanRepository->create($input);

          Flash::success('Employee Loan saved successfully.');
       }  else{
             Flash::error('This employee is not eligible for loan <a href="#">see why</a>');
       }

        return redirect(route('employeeLoans.index'));
    }

    /**
     * Display the specified EmployeeLoan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employeeLoan = $this->employeeLoanRepository->findWithoutFail($id);

        if (empty($employeeLoan)) {
            Flash::error('Employee Loan not found');

            return redirect(route('employeeLoans.index'));
        }

        return view('components.accounts.employee_loans.show')->with('employeeLoan', $employeeLoan);
    }

    /**
     * Show the form for editing the specified EmployeeLoan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employeeLoan = $this->employeeLoanRepository->findWithoutFail($id);

        if (empty($employeeLoan)) {
            Flash::error('Employee Loan not found');

            return redirect(route('employeeLoans.index'));
        }

        return view('components.accounts.employee_loans.edit')
        ->with('employeeLoan', $employeeLoan)
        ->with('employee',\App\TeamMembers::pluck('member_name','id'))
        ->with('accounts',\App\Models\Accounts\Treasures::pluck('account_name','id'));
    }

    /**
     * Update the specified EmployeeLoan in storage.
     *
     * @param  int              $id
     * @param UpdateEmployeeLoanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeLoanRequest $request)
    {
        $employeeLoan = $this->employeeLoanRepository->findWithoutFail($id);

        if (empty($employeeLoan)) {
            Flash::error('Employee Loan not found');

            return redirect(route('employeeLoans.index'));
        }

        $employeeLoan = $this->employeeLoanRepository->update($request->all(), $id);

        Flash::success('Employee Loan updated successfully.');

        return redirect(route('employeeLoans.index'));
    }

    /**
     * Remove the specified EmployeeLoan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employeeLoan = $this->employeeLoanRepository->findWithoutFail($id);

        if (empty($employeeLoan)) {
            Flash::error('Employee Loan not found');

            return redirect(route('employeeLoans.index'));
        }

        $this->employeeLoanRepository->delete($id);

        Flash::success('Employee Loan deleted successfully.');

        return redirect(route('employeeLoans.index'));
    }
}
