<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVendorTypeRequest;
use App\Http\Requests\UpdateVendorTypeRequest;
use App\Repositories\VendorTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VendorTypeController extends AppBaseController
{
    /** @var  VendorTypeRepository */
    private $vendorTypeRepository;

    public function __construct(VendorTypeRepository $vendorTypeRepo)
    {
        $this->vendorTypeRepository = $vendorTypeRepo;
    }

    /**
     * Display a listing of the VendorType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vendorTypeRepository->pushCriteria(new RequestCriteria($request));
        $vendorTypes = $this->vendorTypeRepository->all();

        return view('vendor_types.index')
            ->with('vendorTypes', $vendorTypes);
    }

    /**
     * Show the form for creating a new VendorType.
     *
     * @return Response
     */
    public function create()
    {
        return view('vendor_types.create');
    }

    /**
     * Store a newly created VendorType in storage.
     *
     * @param CreateVendorTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorTypeRequest $request)
    {
        $input = $request->all();

        $vendorType = $this->vendorTypeRepository->create($input);

        Flash::success('Vendor Type saved successfully.');

        return redirect(route('vendorTypes.index'));
    }

    /**
     * Display the specified VendorType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendorType = $this->vendorTypeRepository->findWithoutFail($id);

        if (empty($vendorType)) {
            Flash::error('Vendor Type not found');

            return redirect(route('vendorTypes.index'));
        }

        return view('vendor_types.show')->with('vendorType', $vendorType);
    }

    /**
     * Show the form for editing the specified VendorType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendorType = $this->vendorTypeRepository->findWithoutFail($id);

        if (empty($vendorType)) {
            Flash::error('Vendor Type not found');

            return redirect(route('vendorTypes.index'));
        }

        return view('vendor_types.edit')->with('vendorType', $vendorType);
    }

    /**
     * Update the specified VendorType in storage.
     *
     * @param  int              $id
     * @param UpdateVendorTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorTypeRequest $request)
    {
        $vendorType = $this->vendorTypeRepository->findWithoutFail($id);

        if (empty($vendorType)) {
            Flash::error('Vendor Type not found');

            return redirect(route('vendorTypes.index'));
        }

        $vendorType = $this->vendorTypeRepository->update($request->all(), $id);

        Flash::success('Vendor Type updated successfully.');

        return redirect(route('vendorTypes.index'));
    }

    /**
     * Remove the specified VendorType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendorType = $this->vendorTypeRepository->findWithoutFail($id);

        if (empty($vendorType)) {
            Flash::error('Vendor Type not found');

            return redirect(route('vendorTypes.index'));
        }

        $this->vendorTypeRepository->delete($id);

        Flash::success('Vendor Type deleted successfully.');

        return redirect(route('vendorTypes.index'));
    }
}
