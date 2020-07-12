<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Requests\CreateAccountExpenseRequest;
use App\Http\Requests\UpdateAccountExpenseRequest;
use App\Repositories\AccountExpenseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Accounts\AccountCategory;
use App\Models\Vendor;
use App\TeamMembers;
use App\Models\Project\Project;

class AccountExpenseController extends AppBaseController
{
    /** @var  AccountExpenseRepository */
    private $accountExpenseRepository;

    public function __construct(AccountExpenseRepository $accountExpenseRepo)
    {
        $this->accountExpenseRepository = $accountExpenseRepo;
    }

    /**
     * Display a listing of the AccountExpense.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->accountExpenseRepository->pushCriteria(new RequestCriteria($request));
        $accountExpenses = $this->accountExpenseRepository->paginate(10);

        return view('components.accounts.account_expenses.index')
            ->with('accountExpenses', $accountExpenses);
    }

    /**
     * Show the form for creating a new AccountExpense.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.accounts.account_expenses.create')
        ->with('categories',AccountCategory::pluck('category','id'))
        ->with('vendors',Vendor::pluck('vendor_name','id'))
        ->with('projects',Project::pluck('project_title','id'))
        ->with('team_members',TeamMembers::pluck('member_name','id'));
    }

    /**
     * Store a newly created AccountExpense in storage.
     *
     * @param CreateAccountExpenseRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountExpenseRequest $request)
    {
        $input = $request->all();

        $accountExpense = $this->accountExpenseRepository->create($input);

        Flash::success('Account Expense saved successfully.');

        return redirect(route('accountExpenses.index'));
    }

    /**
     * Display the specified AccountExpense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountExpense = $this->accountExpenseRepository->findWithoutFail($id);

        if (empty($accountExpense)) {
            Flash::error('Account Expense not found');

            return redirect(route('accountExpenses.index'));
        }

        return view('components.accounts.account_expenses.show')->with('accountExpense', $accountExpense);
    }

    /**
     * Show the form for editing the specified AccountExpense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountExpense = $this->accountExpenseRepository->findWithoutFail($id);

        if (empty($accountExpense)) {
            Flash::error('Account Expense not found');

            return redirect(route('accountExpenses.index'));
        }

        return view('components.accounts.account_expenses.edit')->with('accountExpense', $accountExpense);
    }

    /**
     * Update the specified AccountExpense in storage.
     *
     * @param  int              $id
     * @param UpdateAccountExpenseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountExpenseRequest $request)
    {
        $accountExpense = $this->accountExpenseRepository->findWithoutFail($id);

        if (empty($accountExpense)) {
            Flash::error('Account Expense not found');

            return redirect(route('accountExpenses.index'));
        }

        $accountExpense = $this->accountExpenseRepository->update($request->all(), $id);

        Flash::success('Account Expense updated successfully.');

        return redirect(route('accountExpenses.index'));
    }

    /**
     * Remove the specified AccountExpense from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountExpense = $this->accountExpenseRepository->findWithoutFail($id);

        if (empty($accountExpense)) {
            Flash::error('Account Expense not found');

            return redirect(route('accountExpenses.index'));
        }

        $this->accountExpenseRepository->delete($id);

        Flash::success('Account Expense deleted successfully.');

        return redirect(route('accountExpenses.index'));
    }
}
