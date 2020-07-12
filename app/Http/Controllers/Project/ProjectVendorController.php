<?php

namespace App\Http\Controllers\Project;

use Flash;
use Response;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\Project\ProjectVendor;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProjectVendorRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Requests\CreateProjectVendorRequest;
use App\Http\Requests\UpdateProjectVendorRequest;

class ProjectVendorController extends AppBaseController
{
    /** @var  ProjectVendorRepository */
    private $projectVendorRepository;

    public function __construct(ProjectVendorRepository $projectVendorRepo)
    {
        $this->projectVendorRepository = $projectVendorRepo;
    }

    /**
     * Display a listing of the ProjectVendor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$project_id,$task_id)
    {
        //dd("hell o world");
        $this->projectVendorRepository->pushCriteria(new RequestCriteria($request));
        $projectVendors = ProjectVendor::where('project_id',$project_id)->where('project_task_id',$task_id)->get();

        return view('components.project.project_vendors.index')
            ->with('projectVendors', $projectVendors);
    }

    /**
     * Show the form for creating a new ProjectVendor.
     *
     * @return Response
     */
    public function create($project_id,$task_id)
    {
        
        return view('components.project.project_vendors.create')->with('vendors',Vendor::pluck('vendor_name','id'));
    }

    /**
     * Store a newly created ProjectVendor in storage.
     *
     * @param CreateProjectVendorRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectVendorRequest $request,$project_id, $task_id)
    {
        $input = $request->all();

        $projectVendor = $this->projectVendorRepository->create($input);

        Flash::success('Project Vendor saved successfully.');

        return redirect(route('projectVendors.index',[$project_id, $task_id]));
    }

    /**
     * Display the specified ProjectVendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($project_id,$task_id,$id)
    {
        $projectVendor = $this->projectVendorRepository->findWithoutFail($id);

        if (empty($projectVendor)) {
            Flash::error('Project Vendor not found');

            return redirect(route('projectVendors.index',[$project_id,$task_id]));
        }

        return view('components.project.project_vendors.show')->with('projectVendor', $projectVendor);
    }

    /**
     * Show the form for editing the specified ProjectVendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($project_id,$task_id,$id)
    {
        $projectVendor = $this->projectVendorRepository->findWithoutFail($id);

        if (empty($projectVendor)) {
            Flash::error('Project Vendor not found');

            return redirect(route('projectVendors.index'));
        }

        return view('components.project.project_vendors.edit')
        ->with('projectVendor', $projectVendor)
        ->with('vendors',Vendor::pluck('vendor_name','id'));
    }

    /**
     * Update the specified ProjectVendor in storage.
     *
     * @param  int              $id
     * @param UpdateProjectVendorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectVendorRequest $request,$project_id,$task_id)
    {
        $projectVendor = $this->projectVendorRepository->findWithoutFail($id);

        if (empty($projectVendor)) {
            Flash::error('Project Vendor not found');

            return redirect(route('projectVendors.index',[$project_id,$task_id]));
        }

        $projectVendor = $this->projectVendorRepository->update($request->all(), $id);

        Flash::success('Project Vendor updated successfully.');

        return redirect(route('projectVendors.index',[$project_id,$task_id]));
    }

    /**
     * Remove the specified ProjectVendor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($project_id,$task_id,$id)
    {
        $projectVendor = $this->projectVendorRepository->findWithoutFail($id);

        if (empty($projectVendor)) {
            Flash::error('Project Vendor not found');

            return redirect(route('projectVendors.index',[$project_id,$task_id]));
        }

        $this->projectVendorRepository->delete($id);

        Flash::success('Project Vendor deleted successfully.');

        return redirect(route('projectVendors.index',[$project_id,$task_id]));
    }
}
