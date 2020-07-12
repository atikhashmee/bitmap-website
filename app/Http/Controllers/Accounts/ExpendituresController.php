<?php

namespace App\Http\Controllers\Accounts;

use Flash;
use Response;
use App\TeamMembers;
use Illuminate\Http\Request;
use App\Models\Accounts\Expenditures;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ExpendituresRepository;
use App\Http\Requests\CreateExpendituresRequest;
use App\Http\Requests\UpdateExpendituresRequest;
use Prettus\Repository\Criteria\RequestCriteria;

class ExpendituresController extends AppBaseController
{
    /** @var  ExpendituresRepository */
    private $expendituresRepository;

    public function __construct(ExpendituresRepository $expendituresRepo)
    {
        $this->expendituresRepository = $expendituresRepo;
    }

    /**
     * Display a listing of the Expenditures.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->expendituresRepository->pushCriteria(new RequestCriteria($request));
        $expenditures = $this->expendituresRepository->paginate(10);


    // dd(\App\TeamMembers::pluck('member_name','id'));
        return view('components.accounts.expenditures.index')
            ->with('expenditures', $expenditures)
            ->with('teamMembers', \App\TeamMembers::get(['member_name','id']));
    }


    public function filter(Request $r)
    {
           
           $startdate = $r->input('stdate');
           $enddate = $r->input('endate');
           $employeeid = $r->input('employee');
             
           $expenserecord = NULL;

           if ( !empty($startdate) && empty($enddate) && empty($employeeid)) {
            $expenserecord = Expenditures::where('date', $startdate)->paginate(10);
           }else if (!empty($startdate) && !empty($enddate) && empty($employeeid)) {
            $expenserecord = Expenditures::whereBetween('date', [$startdate,$enddate])->paginate(10);
           }else if (!empty($startdate) && !empty($enddate) && !empty($employeeid)) {
            $expenserecord = Expenditures::whereBetween('date', [$startdate,$enddate])->where('employee_id',$employeeid)->paginate(10);
           }
           else {
               Flash::error('You haven\'t choshen any filter option');
               $expenserecord = $this->expendituresRepository->paginate(10);
            }

        
          return view('components.accounts.expenditures.index')->with('expenditures', $expenserecord)
          ->with('teamMembers', \App\TeamMembers::get(['member_name','id']));
    }

    /**
     * Show the form for creating a new Expenditures.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.accounts.expenditures.create')
        ->with('expense_type',\App\Models\Accounts\ExpenseType::pluck('expense_name','id'))
        ->with('users',\App\TeamMembers::pluck('member_name','id'));
    }

    /**
     * Store a newly created Expenditures in storage.
     *
     * @param CreateExpendituresRequest $request
     *
     * @return Response
     */
    public function store(CreateExpendituresRequest $request)
    {
        $input = $request->all();

        if (availableTaka() > $request->input('amount')) {
            $expenditures = $this->expendituresRepository->create($input);

            Flash::success('Expenditures saved successfully.');
        }else {
            Flash::error('You have no sufficient Balance');
        }

       

        return redirect(route('expenditures.index'));
    }

    /**
     * Display the specified Expenditures.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $expenditures = $this->expendituresRepository->findWithoutFail($id);

        if (empty($expenditures)) {
            Flash::error('Expenditures not found');

            return redirect(route('expenditures.index'));
        }

        return view('components.accounts.expenditures.show')->with('expenditures', $expenditures);
    }

    /**
     * Show the form for editing the specified Expenditures.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $expenditures = $this->expendituresRepository->findWithoutFail($id);

        if (empty($expenditures)) {
            Flash::error('Expenditures not found');

            return redirect(route('expenditures.index'));
        }

        return view('components.accounts.expenditures.edit')
        ->with('expenditures', $expenditures) 
        ->with('expense_type',\App\Models\Accounts\ExpenseType::pluck('expense_name','id'))
        ->with('accounts_type',\App\Models\Accounts\Treasures::pluck('account_name','id'))
        ->with('users',\App\TeamMembers::pluck('member_name','id'));
    }




    /**
     * Update the specified Expenditures in storage.
     *
     * @param  int              $id
     * @param UpdateExpendituresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExpendituresRequest $request)
    {
        $expenditures = $this->expendituresRepository->findWithoutFail($id);

        if (empty($expenditures)) {
            Flash::error('Expenditures not found');

            return redirect(route('expenditures.index'));
        }

        $expenditures = $this->expendituresRepository->update($request->all(), $id);

        Flash::success('Expenditures updated successfully.');

        return redirect(route('expenditures.index'));
    }

    /**
     * Remove the specified Expenditures from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $expenditures = $this->expendituresRepository->findWithoutFail($id);

        if (empty($expenditures)) {
            Flash::error('Expenditures not found');

            return redirect(route('expenditures.index'));
        }

        $this->expendituresRepository->delete($id);

        Flash::success('Expenditures deleted successfully.');

        return redirect(route('expenditures.index'));
    }
}
