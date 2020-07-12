<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Requests\CreateSaleryKeysRequest;
use App\Http\Requests\UpdateSaleryKeysRequest;
use App\Repositories\SaleryKeysRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SaleryKeysController extends AppBaseController
{
    /** @var  SaleryKeysRepository */
    private $saleryKeysRepository;

    public function __construct(SaleryKeysRepository $saleryKeysRepo)
    {
        $this->saleryKeysRepository = $saleryKeysRepo;
    }

    /**
     * Display a listing of the SaleryKeys.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->saleryKeysRepository->pushCriteria(new RequestCriteria($request));
        $saleryKeys = $this->saleryKeysRepository->paginate(10);

        return view('components.accounts.salery_keys.index')
            ->with('saleryKeys', $saleryKeys);
    }

    /**
     * Show the form for creating a new SaleryKeys.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.accounts.salery_keys.create');
    }

    /**
     * Store a newly created SaleryKeys in storage.
     *
     * @param CreateSaleryKeysRequest $request
     *
     * @return Response
     */
    public function store(CreateSaleryKeysRequest $request)
    {
        $input = $request->all();

        $saleryKeys = $this->saleryKeysRepository->create($input);

        Flash::success('Salery Keys saved successfully.');

        return redirect(route('saleryKeys.index'));
    }

    /**
     * Display the specified SaleryKeys.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $saleryKeys = $this->saleryKeysRepository->findWithoutFail($id);

        if (empty($saleryKeys)) {
            Flash::error('Salery Keys not found');

            return redirect(route('saleryKeys.index'));
        }

        return view('components.accounts.salery_keys.show')->with('saleryKeys', $saleryKeys);
    }

    /**
     * Show the form for editing the specified SaleryKeys.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $saleryKeys = $this->saleryKeysRepository->findWithoutFail($id);

        if (empty($saleryKeys)) {
            Flash::error('Salery Keys not found');

            return redirect(route('saleryKeys.index'));
        }

        return view('components.accounts.salery_keys.edit')->with('saleryKeys', $saleryKeys);
    }

    /**
     * Update the specified SaleryKeys in storage.
     *
     * @param  int              $id
     * @param UpdateSaleryKeysRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSaleryKeysRequest $request)
    {
        $saleryKeys = $this->saleryKeysRepository->findWithoutFail($id);

        if (empty($saleryKeys)) {
            Flash::error('Salery Keys not found');

            return redirect(route('saleryKeys.index'));
        }

        $saleryKeys = $this->saleryKeysRepository->update($request->all(), $id);

        Flash::success('Salery Keys updated successfully.');

        return redirect(route('saleryKeys.index'));
    }

    /**
     * Remove the specified SaleryKeys from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $saleryKeys = $this->saleryKeysRepository->findWithoutFail($id);

        if (empty($saleryKeys)) {
            Flash::error('Salery Keys not found');

            return redirect(route('saleryKeys.index'));
        }

        $this->saleryKeysRepository->delete($id);

        Flash::success('Salery Keys deleted successfully.');

        return redirect(route('saleryKeys.index'));
    }
}
