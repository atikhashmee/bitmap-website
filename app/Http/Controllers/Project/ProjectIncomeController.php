<?php

namespace App\Http\Controllers\Project;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\Accounts\Income;
use App\Models\Project\Project;
use App\Http\Controllers\Controller;
use App\Repositories\IncomeRepository;
use App\Http\Requests\UpdateIncomeRequest;
use Prettus\Repository\Criteria\RequestCriteria;

class ProjectIncomeController extends Controller
{

    private $incomeRepository;

    public function __construct(IncomeRepository $incomeRepo)
    {
        $this->incomeRepository = $incomeRepo;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$project_id)
    {
         //get projectwiase incomes lists




        $this->incomeRepository->pushCriteria(new RequestCriteria($request));
        $incomes = Project::find($project_id)->proviesMonies;  //will use later if needed
        //$this->incomeRepository->paginate(10);
        return view('components.project.incomes.index')->with('incomes', Project::find($project_id)->proviesMonies()->paginate(10));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.project.incomes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$project_id)
    {
        $requesttype  = $request->input('moneysource');
        $requestid = 0;

        $income = new Income([
            'date'       => $request->input('date'),
            'amount'     => $request->input('amount'),
            'description'=> $request->input('description'),
            'carrier'    => $request->input('carrier')
        ]);
                if ($requesttype == "project") {
                  $project   =   Project::find($project_id)->proviesMonies()->save($income);
                  $requestid = $project_id;
               }
               


        return redirect(route('projectIncomes.index',[$project_id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id,$id)
    {
        $income = $this->incomeRepository->findWithoutFail($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('projectIncomes.index',[$project_id]));
        }

        return view('components.project.incomes.edit')->with('income', $income);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateIncomeRequest $request,$project_id)
    {
        $income = $this->incomeRepository->findWithoutFail($id);

        if (empty($income)) {
            Flash::error('Income not found'); 
            return redirect(route('projectIncomes.index',[$project_id]));
        }

        $income = $this->incomeRepository->update($request->all(), $id);

        Flash::success('Income updated successfully.');

        return redirect(route('projectIncomes.index',[$project_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_id,$id)
    {
        $income = $this->incomeRepository->findWithoutFail($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('projectIncomes.index',[$project_id]));
        }

        $this->incomeRepository->delete($id);

        Flash::success('Income deleted successfully.');

        return redirect(route('projectIncomes.index',[$project_id]));
    }
}
