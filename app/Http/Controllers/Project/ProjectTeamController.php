<?php

namespace App\Http\Controllers\Project;

use Flash;
use Response;
use App\TeamMembers;
use Illuminate\Http\Request;
use App\Models\Project\ProjectTeam;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProjectTeamRepository;
use App\Http\Requests\CreateProjectTeamRequest;
use App\Http\Requests\UpdateProjectTeamRequest;
use Prettus\Repository\Criteria\RequestCriteria;

class ProjectTeamController extends AppBaseController
{
    /** @var  ProjectTeamRepository */
    private $projectTeamRepository;

    public function __construct(ProjectTeamRepository $projectTeamRepo)
    {
        $this->projectTeamRepository = $projectTeamRepo;
    }

    /**
     * Display a listing of the ProjectTeam.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$project_id,$task_id)
    {
        $this->projectTeamRepository->pushCriteria(new RequestCriteria($request));
        $projectTeams = ProjectTeam::where('project_id',$project_id)->where('project_task_id',$task_id)->get();

        return view('components.project.project_teams.index')
            ->with('projectTeams', $projectTeams);
    }

    /**
     * Show the form for creating a new ProjectTeam.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.project.project_teams.create')->with('teams',TeamMembers::pluck('member_name','id'));
    }

    /**
     * Store a newly created ProjectTeam in storage.
     *
     * @param CreateProjectTeamRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectTeamRequest $request,$project_id, $task_id)
    {
        $input = $request->all();

        $projectTeam = $this->projectTeamRepository->create($input);

        Flash::success('Project Team saved successfully.');

        return redirect(route('projectTeams.index',[$project_id, $task_id]));
    }

    /**
     * Display the specified ProjectTeam.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $projectTeam = $this->projectTeamRepository->findWithoutFail($id);

        if (empty($projectTeam)) {
            Flash::error('Project Team not found');

            return redirect(route('projectTeams.index'));
        }

        return view('components.project.project_teams.show')->with('projectTeam', $projectTeam);
    }

    /**
     * Show the form for editing the specified ProjectTeam.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($project_id, $task_id,$id)
    {
        $projectTeam = $this->projectTeamRepository->findWithoutFail($id);

        if (empty($projectTeam)) {
            Flash::error('Project Team not found');

            return redirect(route('projectTeams.index',[$project_id, $task_id]));
        }

        return view('components.project.project_teams.edit')
        ->with('projectTeam', $projectTeam)
        ->with('teams',TeamMembers::pluck('member_name','id'));
    }

    /**
     * Update the specified ProjectTeam in storage.
     *
     * @param  int              $id
     * @param UpdateProjectTeamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectTeamRequest $request,$project_id, $task_id)
    {
        $projectTeam = $this->projectTeamRepository->findWithoutFail($id);

        if (empty($projectTeam)) {
            Flash::error('Project Team not found');

            return redirect(route('projectTeams.index',[$project_id, $task_id]));
        }

        $projectTeam = $this->projectTeamRepository->update($request->all(), $id);

        Flash::success('Project Team updated successfully.');

        return redirect(route('projectTeams.index',[$project_id, $task_id]));
    }

    /**
     * Remove the specified ProjectTeam from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($project_id, $task_id,$id)
    {
        $projectTeam = $this->projectTeamRepository->findWithoutFail($id);

        if (empty($projectTeam)) {
            Flash::error('Project Team not found');

            return redirect(route('projectTeams.index'));
        }

        $this->projectTeamRepository->delete($id);

        Flash::success('Project Team deleted successfully.');

        return redirect(route('projectTeams.index',[$project_id, $task_id]));
    }
}
