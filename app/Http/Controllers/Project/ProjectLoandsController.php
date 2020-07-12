<?php

namespace App\Http\Controllers\Project;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Models\Project\ProjectLoands;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProjectLoandsRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Requests\CreateProjectLoandsRequest;
use App\Http\Requests\UpdateProjectLoandsRequest;

class ProjectLoandsController extends AppBaseController
{
    /** @var  ProjectLoandsRepository */
    private $projectLoandsRepository;

    public function __construct(ProjectLoandsRepository $projectLoandsRepo)
    {
        $this->projectLoandsRepository = $projectLoandsRepo;
    }

    /**
     * Display a listing of the ProjectLoands.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$project_id)
    {
        $this->projectLoandsRepository->pushCriteria(new RequestCriteria($request));
        $projectLoands = ProjectLoands::where('project_id', $project_id)->paginate(10);
        //$this->projectLoandsRepository->paginate(10);

        return view('components.project.project_loands.index')
            ->with('projectLoands', $projectLoands);
    }

    /**
     * Show the form for creating a new ProjectLoands.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.project.project_loands.create');
    }

    /**
     * Store a newly created ProjectLoands in storage.
     *
     * @param CreateProjectLoandsRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectLoandsRequest $request,$project_id)
    {
        $input = $request->all();

        $projectLoands = $this->projectLoandsRepository->create($input);

        Flash::success('Project Loands saved successfully.');

        return redirect(route('projectLoands.index',[$project_id]));
    }

    /**
     * Display the specified ProjectLoands.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($project_id,$id)
    {
        $projectLoands = $this->projectLoandsRepository->findWithoutFail($id);

        if (empty($projectLoands)) {
            Flash::error('Project Loands not found');

            return redirect(route('projectLoands.index',[$project_id]));
        }

        return view('components.project.project_loands.show')->with('projectLoands', $projectLoands);
    }

    /**
     * Show the form for editing the specified ProjectLoands.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($project_id,$id)
    {
        $projectLoands = $this->projectLoandsRepository->findWithoutFail($id);

        if (empty($projectLoands)) {
            Flash::error('Project Loands not found');

            return redirect(route('projectLoands.index',[$project_id]));
        }

        return view('components.project.project_loands.edit')->with('projectLoands', $projectLoands);
    }

    /**
     * Update the specified ProjectLoands in storage.
     *
     * @param  int              $id
     * @param UpdateProjectLoandsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectLoandsRequest $request,$project_id)
    {
        $projectLoands = $this->projectLoandsRepository->findWithoutFail($id);

        if (empty($projectLoands)) {
            Flash::error('Project Loands not found');

            return redirect(route('projectLoands.index',[$project_id]));
        }

        $projectLoands = $this->projectLoandsRepository->update($request->all(), $id);

        Flash::success('Project Loands updated successfully.');

        return redirect(route('projectLoands.index',[$project_id]));
    }

    /**
     * Remove the specified ProjectLoands from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($project_id,$id)
    {
        $projectLoands = $this->projectLoandsRepository->findWithoutFail($id);

        if (empty($projectLoands)) {
            Flash::error('Project Loands not found');

            return redirect(route('projectLoands.index',[$project_id]));
        }

        $this->projectLoandsRepository->delete($id);

        Flash::success('Project Loands deleted successfully.');

        return redirect(route('projectLoands.index',[$project_id]));
    }
}
