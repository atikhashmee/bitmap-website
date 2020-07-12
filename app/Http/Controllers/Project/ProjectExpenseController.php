<?php

namespace App\Http\Controllers\Project;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Models\Accounts\ExpenseType;
use App\Models\Project\ProjectExpense;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProjectExpenseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Requests\CreateProjectExpenseRequest;
use App\Http\Requests\UpdateProjectExpenseRequest;

class ProjectExpenseController extends AppBaseController
{
    /** @var  ProjectExpenseRepository */
    private $projectExpenseRepository;

    public function __construct(ProjectExpenseRepository $projectExpenseRepo)
    {
        $this->projectExpenseRepository = $projectExpenseRepo;
    }

    /**
     * Display a listing of the ProjectExpense.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$project_id)
    {
        $this->projectExpenseRepository->pushCriteria(new RequestCriteria($request));
        $projectExpenses =  ProjectExpense::where('project_id', $project_id)->paginate(10);
        //$this->projectExpenseRepository->where('project_id',$project_id)->paginate(10);

        return view('components.project.project_expenses.index')
            ->with('projectExpenses', $projectExpenses);
    }

    /**
     * Show the form for creating a new ProjectExpense.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.project.project_expenses.create')->with('expenseTypes',ExpenseType::pluck('expense_name','id'));
    }

    /**
     * Store a newly created ProjectExpense in storage.
     *
     * @param CreateProjectExpenseRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectExpenseRequest $request,$project_id)
    {
        $input = $request->all();

        $projectExpense = $this->projectExpenseRepository->create($input);

        Flash::success('Project Expense saved successfully.');

        return redirect(route('projectExpenses.index',[$project_id]));
    }

    /**
     * Display the specified ProjectExpense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $projectExpense = $this->projectExpenseRepository->findWithoutFail($id);

        if (empty($projectExpense)) {
            Flash::error('Project Expense not found');

            return redirect(route('projectExpenses.index'));
        }

        return view('project_expenses.show')->with('projectExpense', $projectExpense);
    }

    /**
     * Show the form for editing the specified ProjectExpense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($project_id,$id)
    {
        $projectExpense = $this->projectExpenseRepository->findWithoutFail($id);

        if (empty($projectExpense)) {
            Flash::error('Project Expense not found');

            return redirect(route('projectExpenses.index',[$project_id]));
        }

        return view('components.project.project_expenses.edit')
        ->with('projectExpense', $projectExpense)
        ->with('expenseTypes',ExpenseType::pluck('expense_name','id'));
    }

    /**
     * Update the specified ProjectExpense in storage.
     *
     * @param  int              $id
     * @param UpdateProjectExpenseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectExpenseRequest $request,$project_id)
    {
        $projectExpense = $this->projectExpenseRepository->findWithoutFail($id);

        if (empty($projectExpense)) {
            Flash::error('Project Expense not found');

            return redirect(route('projectExpenses.index',[$project_id]));
        }

        $projectExpense = $this->projectExpenseRepository->update($request->all(), $id);

        Flash::success('Project Expense updated successfully.');

        return redirect(route('projectExpenses.index',[$project_id]));
    }

    /**
     * Remove the specified ProjectExpense from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($project_id,$id)
    {
        $projectExpense = $this->projectExpenseRepository->findWithoutFail($id);

        if (empty($projectExpense)) {
            Flash::error('Project Expense not found');

            return redirect(route('projectExpenses.index',[$project_id]));
        }

        $this->projectExpenseRepository->delete($id);

        Flash::success('Project Expense deleted successfully.');

        return redirect(route('projectExpenses.index',[$project_id]));
    }
}
