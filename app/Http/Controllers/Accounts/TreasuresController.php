<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Requests\CreateTreasuresRequest;
use App\Http\Requests\UpdateTreasuresRequest;
use App\Repositories\TreasuresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TreasuresController extends AppBaseController
{
    /** @var  TreasuresRepository */
    private $treasuresRepository;

    public function __construct(TreasuresRepository $treasuresRepo)
    {
        $this->treasuresRepository = $treasuresRepo;
    }

    /**
     * Display a listing of the Treasures.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->treasuresRepository->pushCriteria(new RequestCriteria($request));
        $treasures = $this->treasuresRepository->all();

        return view('components.accounts.treasures.index')
            ->with('treasures', $treasures);
    }

    /**
     * Show the form for creating a new Treasures.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.accounts.treasures.create');
    }

    /**
     * Store a newly created Treasures in storage.
     *
     * @param CreateTreasuresRequest $request
     *
     * @return Response
     */
    public function store(CreateTreasuresRequest $request)
    {
        $input = $request->all();

        $treasures = $this->treasuresRepository->create($input);

        Flash::success('Treasures saved successfully.');

        return redirect(route('treasures.index'));
    }

    /**
     * Display the specified Treasures.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $treasures = $this->treasuresRepository->findWithoutFail($id);

        if (empty($treasures)) {
            Flash::error('Treasures not found');

            return redirect(route('treasures.index'));
        }

        return view('components.accounts.treasures.show')->with('treasures', $treasures);
    }

    /**
     * Show the form for editing the specified Treasures.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $treasures = $this->treasuresRepository->findWithoutFail($id);

        if (empty($treasures)) {
            Flash::error('Treasures not found');

            return redirect(route('treasures.index'));
        }

        return view('components.accounts.treasures.edit')->with('treasures', $treasures);
    }

    /**
     * Update the specified Treasures in storage.
     *
     * @param  int              $id
     * @param UpdateTreasuresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTreasuresRequest $request)
    {
        $treasures = $this->treasuresRepository->findWithoutFail($id);

        if (empty($treasures)) {
            Flash::error('Treasures not found');

            return redirect(route('treasures.index'));
        }

        $treasures = $this->treasuresRepository->update($request->all(), $id);

        Flash::success('Treasures updated successfully.');

        return redirect(route('treasures.index'));
    }

    /**
     * Remove the specified Treasures from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $treasures = $this->treasuresRepository->findWithoutFail($id);

        if (empty($treasures)) {
            Flash::error('Treasures not found');

            return redirect(route('treasures.index'));
        }

        $this->treasuresRepository->delete($id);

        Flash::success('Treasures deleted successfully.');

        return redirect(route('treasures.index'));
    }
}
