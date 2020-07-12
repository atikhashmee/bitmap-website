<?php

namespace App\Http\Controllers\Project;

use App\Http\Requests\CreateProjectGoodsRequest;
use App\Http\Requests\UpdateProjectGoodsRequest;
use App\Repositories\ProjectGoodsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProjectGoodsController extends AppBaseController
{
    /** @var  ProjectGoodsRepository */
    private $projectGoodsRepository;

    public function __construct(ProjectGoodsRepository $projectGoodsRepo)
    {
        $this->projectGoodsRepository = $projectGoodsRepo;
    }

    /**
     * Display a listing of the ProjectGoods.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$project_id)
    {
        $this->projectGoodsRepository->pushCriteria(new RequestCriteria($request));
        $projectGoods = $this->projectGoodsRepository->paginate(10);

        return view('components.project.project_goods.index')
            ->with('projectGoods', $projectGoods);
    }

    /**
     * Show the form for creating a new ProjectGoods.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.project.project_goods.create');
    }

    /**
     * Store a newly created ProjectGoods in storage.
     *
     * @param CreateProjectGoodsRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectGoodsRequest $request,$project_id)
    {
        $input = $request->all();

        $projectGoods = $this->projectGoodsRepository->create($input);

        Flash::success('Project Goods saved successfully.');

        return redirect(route('projectGoods.index',$project_id));
    }

    /**
     * Display the specified ProjectGoods.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($project_id,$id)
    {
        $projectGoods = $this->projectGoodsRepository->findWithoutFail($id);

        if (empty($projectGoods)) {
            Flash::error('Project Goods not found');

            return redirect(route('projectGoods.index',$project_id));
        }

        return view('components.project.project_goods.show')->with('projectGoods', $projectGoods);
    }

    /**
     * Show the form for editing the specified ProjectGoods.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($project_id,$id)
    {
        $projectGoods = $this->projectGoodsRepository->findWithoutFail($id);

        if (empty($projectGoods)) {
            Flash::error('Project Goods not found');

            return redirect(route('projectGoods.index',$project_id));
        }

        return view('components.project.project_goods.edit')->with('projectGoods', $projectGoods);
    }

    /**
     * Update the specified ProjectGoods in storage.
     *
     * @param  int              $id
     * @param UpdateProjectGoodsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectGoodsRequest $request,$project_id)
    {
        $projectGoods = $this->projectGoodsRepository->findWithoutFail($id);

        if (empty($projectGoods)) {
            Flash::error('Project Goods not found');

            return redirect(route('projectGoods.index',$project_id));
        }

        $projectGoods = $this->projectGoodsRepository->update($request->all(), $id);

        Flash::success('Project Goods updated successfully.');

        return redirect(route('projectGoods.index',$project_id));
    }

    /**
     * Remove the specified ProjectGoods from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($project_id,$id)
    {
        $projectGoods = $this->projectGoodsRepository->findWithoutFail($id);

        if (empty($projectGoods)) {
            Flash::error('Project Goods not found');

            return redirect(route('projectGoods.index',$project_id));
        }

        $this->projectGoodsRepository->delete($id);

        Flash::success('Project Goods deleted successfully.');

        return redirect(route('projectGoods.index',$project_id));
    }
}
