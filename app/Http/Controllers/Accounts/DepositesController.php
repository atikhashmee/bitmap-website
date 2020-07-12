<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Requests\CreateDepositesRequest;
use App\Http\Requests\UpdateDepositesRequest;
use App\Repositories\DepositesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Accounts\AccountCategory;
use App\Models\Project\Project;

class DepositesController extends AppBaseController
{
    /** @var  DepositesRepository */
    private $depositesRepository;

    public function __construct(DepositesRepository $depositesRepo)
    {
        $this->depositesRepository = $depositesRepo;
    }

    /**
     * Display a listing of the Deposites.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->depositesRepository->pushCriteria(new RequestCriteria($request));
        $deposites = $this->depositesRepository->paginate(10);

        return view('components.accounts.deposites.index')
            ->with('deposites', $deposites);
    }

    /**
     * Show the form for creating a new Deposites.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.accounts.deposites.create')
        ->with('categories',AccountCategory::pluck('category','id'))
        ->with('projects',Project::pluck('project_title','id'));
    }

    /**
     * Store a newly created Deposites in storage.
     *
     * @param CreateDepositesRequest $request
     *
     * @return Response
     */
    public function store(CreateDepositesRequest $request)
    {
        $input = $request->all();

        $deposites = $this->depositesRepository->create($input);

        Flash::success('Deposites saved successfully.');

        return redirect(route('deposites.index'));
    }

    /**
     * Display the specified Deposites.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deposites = $this->depositesRepository->findWithoutFail($id);

        if (empty($deposites)) {
            Flash::error('Deposites not found');

            return redirect(route('deposites.index'));
        }

        return view('components.accounts.deposites.show')->with('deposites', $deposites);
    }

    /**
     * Show the form for editing the specified Deposites.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deposites = $this->depositesRepository->findWithoutFail($id);

        if (empty($deposites)) {
            Flash::error('Deposites not found');

            return redirect(route('deposites.index'));
        }

        return view('components.accounts.deposites.edit')->with('deposites', $deposites)
        ->with('categories',AccountCategory::pluck('category','id'))
        ->with('projects',Project::pluck('project_title','id'));
    }

    /**
     * Update the specified Deposites in storage.
     *
     * @param  int              $id
     * @param UpdateDepositesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepositesRequest $request)
    {
        $deposites = $this->depositesRepository->findWithoutFail($id);

        if (empty($deposites)) {
            Flash::error('Deposites not found');

            return redirect(route('deposites.index'));
        }

        $deposites = $this->depositesRepository->update($request->all(), $id);

        Flash::success('Deposites updated successfully.');

        return redirect(route('deposites.index'));
    }

    /**
     * Remove the specified Deposites from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deposites = $this->depositesRepository->findWithoutFail($id);

        if (empty($deposites)) {
            Flash::error('Deposites not found');

            return redirect(route('deposites.index'));
        }

        $this->depositesRepository->delete($id);

        Flash::success('Deposites deleted successfully.');

        return redirect(route('deposites.index'));
    }
}
