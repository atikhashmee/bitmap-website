<?php

namespace App\Http\Controllers\Accounts;

use Flash;
use Response;
use App\ClientsLists;
use Illuminate\Http\Request;
use App\Models\Accounts\Income;
use App\Models\Project\Project;
use App\Models\Accounts\Treasures;
use App\Repositories\IncomeRepository;
use App\Http\Requests\CreateIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Http\Controllers\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;

class IncomeController extends AppBaseController
{
    /** @var  IncomeRepository */
    private $incomeRepository;

    public function __construct(IncomeRepository $incomeRepo)
    {
        $this->incomeRepository = $incomeRepo;
    }

    /**
     * Display a listing of the Income.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
         

        $this->incomeRepository->pushCriteria(new RequestCriteria($request));
        $incomes = $this->incomeRepository->paginate(10);

        return view('components.accounts.incomes.index')
            ->with('incomes', $incomes);
    }

    /**
     * Show the form for creating a new Income.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.accounts.incomes.create')
        ->with('accounts',\App\Models\Accounts\Treasures::pluck('account_name','id'))
        ->with('clients',\App\ClientsLists::pluck('Compnay_name','id'))
        ->with('projects',\App\Models\Project\Project::pluck('project_title','id'));
    }

    /**
     * Store a newly created Income in storage.
     *
     * @param CreateIncomeRequest $request
     *
     * @return Response
     */
    public function store(CreateIncomeRequest $request)
    {

       /*  $input = $request->all();

        $income = $this->incomeRepository->create($input);

        Flash::success('Income saved successfully.'); */

       // dd($request->all());
        $requesttype  = $request->input('moneysource');
        $requestid = 0;

        $income = new Income([
            'date'       => $request->input('date'),
            'amount'     => $request->input('amount'),
            'description'=> $request->input('description'),
            'carrier'    => $request->input('carrier')
        ]);
                if ($requesttype == "project") {
                  $project   =   Project::find($request->input('project_id'))->proviesMonies()->save($income);
                  $requestid = $request->input('project_id');
               }
               else if ($requesttype == "baccount") {
                $account  = Treasures::find($request->input('account_id'))->proviesMonies()->save($income);
                $requestid = $request->input('account_id');
               }
               else if ($requesttype == "client") {
                $account  = ClientsLists::find($request->input('client_id'))->proviesMonies()->save($income);
                $requestid = $request->input('client_id');
               }


        return redirect(route('incomes.index'));
    }

    /**
     * Display the specified Income.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $income = $this->incomeRepository->findWithoutFail($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        return view('components.accounts.incomes.show')->with('income', $income);
    }

    /**
     * Show the form for editing the specified Income.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $income = $this->incomeRepository->findWithoutFail($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        return view('components.accounts.incomes.edit')->with('income', $income)
        ->with('accounts',\App\Models\Accounts\Treasures::pluck('account_name','id'))
        ->with('clients',\App\ClientsLists::pluck('Compnay_name','id'))
        ->with('projects',\App\Models\Project\Project::pluck('project_title','id'));
    }

    /**
     * Update the specified Income in storage.
     *
     * @param  int              $id
     * @param UpdateIncomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncomeRequest $request)
    {
        $income = $this->incomeRepository->findWithoutFail($id);

        if (empty($income)) {
            Flash::error('Income not found'); 
            return redirect(route('incomes.index'));
        }

        $income = $this->incomeRepository->update($request->all(), $id);

        Flash::success('Income updated successfully.');

        return redirect(route('incomes.index'));
    }

    /**
     * Remove the specified Income from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $income = $this->incomeRepository->findWithoutFail($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        $this->incomeRepository->delete($id);

        Flash::success('Income deleted successfully.');

        return redirect(route('incomes.index'));
    }
}
