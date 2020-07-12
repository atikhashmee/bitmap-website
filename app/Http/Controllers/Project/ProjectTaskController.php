<?php

namespace App\Http\Controllers\Project;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Models\Project\ProjectTask;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProjectTaskRepository;
use App\Http\Requests\CreateProjectTaskRequest;
use App\Http\Requests\UpdateProjectTaskRequest;
use Prettus\Repository\Criteria\RequestCriteria;

class ProjectTaskController extends AppBaseController
{
    /** @var  ProjectTaskRepository */
    private $projectTaskRepository;

    public function __construct(ProjectTaskRepository $projectTaskRepo)
    {
        $this->projectTaskRepository = $projectTaskRepo;
    }

    /**
     * Display a listing of the ProjectTask.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$project_id)
    {
        $this->projectTaskRepository->pushCriteria(new RequestCriteria($request));
        $projectTasks = ProjectTask::where('project_id', $project_id)->paginate(10);
       //  $this->projectTaskRepository->paginate(10);

        return view('components.project.project_tasks.index')
            ->with('projectTasks', $projectTasks);
    }

    /**
     * Show the form for creating a new ProjectTask.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.project.project_tasks.create');
    }

    /**
     * Store a newly created ProjectTask in storage.
     *
     * @param CreateProjectTaskRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectTaskRequest $request,$project_id)
    {
        $input = $request->all();

        $projectTask = $this->projectTaskRepository->create($input);

        Flash::success('Project Task saved successfully.');

        return redirect(route('projectTasks.index',$project_id));
    }

    /**
     * Display the specified ProjectTask.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($project_id,$id)
    {
        $projectTask = $this->projectTaskRepository->findWithoutFail($id);

        if (empty($projectTask)) {
            Flash::error('Project Task not found');

            return redirect(route('projectTasks.index',$project_id));
        }

        return view('components.project.project_tasks.show')->with('projectTask', $projectTask);
    }

    /**
     * Show the form for editing the specified ProjectTask.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($project_id,$id)
    {
        $projectTask = $this->projectTaskRepository->findWithoutFail($id);

        if (empty($projectTask)) {
            Flash::error('Project Task not found');

            return redirect(route('projectTasks.index',$project_id));
        }

        return view('components.project.project_tasks.edit')->with('projectTask', $projectTask);
    }

    /**
     * Update the specified ProjectTask in storage.
     *
     * @param  int              $id
     * @param UpdateProjectTaskRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectTaskRequest $request,$project_id)
    {
        $projectTask = $this->projectTaskRepository->findWithoutFail($id);

        if (empty($projectTask)) {
            Flash::error('Project Task not found');

            return redirect(route('projectTasks.index',$project_id));
        }

        $projectTask = $this->projectTaskRepository->update($request->all(), $id);

        Flash::success('Project Task updated successfully.');

        return redirect(route('projectTasks.index',$project_id));
    }

    /**
     * Remove the specified ProjectTask from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($project_id,$id)
    {
        $projectTask = $this->projectTaskRepository->findWithoutFail($id);

        if (empty($projectTask)) {
            Flash::error('Project Task not found');

            return redirect(route('projectTasks.index',$project_id));
        }

        $this->projectTaskRepository->delete($id);

        Flash::success('Project Task deleted successfully.');

        return redirect(route('projectTasks.index',$project_id));
    }
}
