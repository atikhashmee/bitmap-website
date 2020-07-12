<?php

namespace App\Http\Controllers\Project;

use Flash;
use Response;
use App\ClientsLists;
use Illuminate\Http\Request;
use App\Models\Project\ProjectTask;
use App\Models\Project\VendorPayment;
use App\Models\Project\ProjectExpense;
use App\Models\Project\ProjectGoods;
use App\Repositories\ProjectRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Models\Accounts\Income;

class ProjectController extends AppBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->projectRepository->pushCriteria(new RequestCriteria($request));
        $projects = $this->projectRepository->paginate(10);

        return view('components.project.projects.index')
            ->with('projects', $projects);
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.project.projects.create')->with('clients',ClientsLists::pluck('Compnay_name','id'));
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->create($input);

        Flash::success('Project saved successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }



        //project task lists

        $tasks = ProjectTask::where('project_id', $id)->get();

        //get sum of vendor payments
        $vendorspayment = VendorPayment::where('project_id', $id)->sum('amount');
        //get all the general expense
        $expense = ProjectExpense::where('project_id', $id)->sum('amount');

        //get all the project goods
        $goods  = ProjectGoods::where('project_id', $id)->get();
        $goodsamount = $goods->reduce( function( $carry, $item){
               return $carry + ($item->quantity * $item->price);
        });

        //add all income for this project

        $incomes = Income::where('incomefrom_type', 'project')->where('incomefrom_id',$id)->sum('amount');

        //dd($incomes);


        return view('components.project.projects.show')
        ->with('project', $project)
        ->with('tasks',  $tasks)
        ->with('vpayment',  $vendorspayment)
        ->with('expnse',  $expense)
        ->with('goodsbuy',  $goodsamount)
        ->with('collection',  $incomes);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('components.project.projects.edit')->with('project', $project)->with('clients',ClientsLists::pluck('Compnay_name','id'));
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int              $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
    }
}
