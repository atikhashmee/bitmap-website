<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Repositories\VendorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Vendor;
use App\Models\VendorType;

class VendorController extends AppBaseController
{
    /** @var  VendorRepository */
    private $vendorRepository;

    public function __construct(VendorRepository $vendorRepo)
    {
        $this->vendorRepository = $vendorRepo;
    }

    /**
     * Display a listing of the Vendor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$vendor_type_id)
    {
          $typeid = $vendor_type_id;
          
        $this->vendorRepository->pushCriteria(new RequestCriteria($request));
        $vendors = Vendor::where('vendor_type_id',$typeid)->get();
      

        $typename = VendorType::find($typeid)->title;

        //dd($typename);

        return view('vendors.index')
            ->with('vendors', $vendors)
           ->with('vendor_category', $typename);
    }

    /**
     * Show the form for creating a new Vendor.
     *
     * @return Response
     */
    public function create($vendor_type_id)
    {
        return view('vendors.create')->with('venorstype',\App\Models\VendorType::pluck('title','id'));
    }

    /**
     * Store a newly created Vendor in storage.
     *
     * @param CreateVendorRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorRequest $request,$vendor_type_id)
    {
        $input = $request->all();

        $vendor = $this->vendorRepository->create($input);

        Flash::success('Vendor saved successfully.');

        return redirect(route('vendors.index',[$vendor_type_id]));
    }

    /**
     * Display the specified Vendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendor = $this->vendorRepository->findWithoutFail($id);

        if (empty($vendor)) {
            Flash::error('Vendor not found');

            return redirect(route('vendors.index'));
        }

        return view('vendors.show')->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified Vendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($vendor_type_id,$id)
    {
        $vendor = $this->vendorRepository->findWithoutFail($id);

        if (empty($vendor)) {
            Flash::error('Vendor not found');

            return redirect(route('vendors.index',[$vendor_type_id]));
        }

        return view('vendors.edit')->with('vendor', $vendor)->with('venorstype',\App\Models\VendorType::pluck('title','id'));
    }

    /**
     * Update the specified Vendor in storage.
     *
     * @param  int              $id
     * @param UpdateVendorRequest $request
     *
     * @return Response
     */
    public function update($vendor_type_id,$id, UpdateVendorRequest $request)
    {
        $vendor = $this->vendorRepository->findWithoutFail($id);

        if (empty($vendor)) {
            Flash::error('Vendor not found');

            return redirect(route('vendors.index',[$vendor_type_id]));
        }

        $vendor = $this->vendorRepository->update($request->all(), $id);

        Flash::success('Vendor updated successfully.');

        return redirect(route('vendors.index',[$vendor_type_id]));
    }

    /**
     * Remove the specified Vendor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id,$vendor_type_id)
    {
        $vendor = $this->vendorRepository->findWithoutFail($id);

        if (empty($vendor)) {
            Flash::error('Vendor not found');

            return redirect(route('vendors.index',[$vendor_type_id]));
        }

        $this->vendorRepository->delete($id);

        Flash::success('Vendor deleted successfully.');

        return redirect(route('vendors.index',[$vendor_type_id]));
    }
}
