<?php

namespace App\Http\Controllers\Project;

use Flash;
use Response;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\Project\VendorPayment;
use App\Http\Controllers\AppBaseController;
use App\Repositories\VendorPaymentRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Requests\CreateVendorPaymentRequest;
use App\Http\Requests\UpdateVendorPaymentRequest;

class VendorPaymentController extends AppBaseController
{
    /** @var  VendorPaymentRepository */
    private $vendorPaymentRepository;

    public function __construct(VendorPaymentRepository $vendorPaymentRepo)
    {
        $this->vendorPaymentRepository = $vendorPaymentRepo;
    }

    /**
     * Display a listing of the VendorPayment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$project_id)
    {
        $this->vendorPaymentRepository->pushCriteria(new RequestCriteria($request));
        $vendorPayments = VendorPayment::where('project_id', $project_id)->paginate(10);
       // $this->vendorPaymentRepository->paginate(10);

        return view('components.project.vendor_payments.index')
            ->with('vendorPayments', $vendorPayments);
    }

    /**
     * Show the form for creating a new VendorPayment.
     *
     * @return Response
     */
    public function create($project_id)
    {
        $vendors =  \App\Models\Project\Project::find($project_id)->vendor;
        $project_vendor = $vendors->unique('vendor_name')->pluck('vendor_name','id');
        return view('components.project.vendor_payments.create')->with('vendors',$project_vendor);
    }

    /**
     * Store a newly created VendorPayment in storage.
     *
     * @param CreateVendorPaymentRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorPaymentRequest $request,$project_id)
    {
        $input = $request->all();

        $vendorPayment = $this->vendorPaymentRepository->create($input);

        Flash::success('Vendor Payment saved successfully.');

        return redirect(route('vendorPayments.index',[$project_id]));
    }

    /**
     * Display the specified VendorPayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendorPayment = $this->vendorPaymentRepository->findWithoutFail($id);

        if (empty($vendorPayment)) {
            Flash::error('Vendor Payment not found');

            return redirect(route('vendorPayments.index'));
        }

        return view('components.project.vendor_payments.show')->with('vendorPayment', $vendorPayment);
    }

    /**
     * Show the form for editing the specified VendorPayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($project_id,$id)
    {
        $vendorPayment = $this->vendorPaymentRepository->findWithoutFail($id);

        if (empty($vendorPayment)) {
            Flash::error('Vendor Payment not found');

            return redirect(route('vendorPayments.index',[$project_id]));
        }

        return view('components.project.vendor_payments.edit')
        ->with('vendorPayment', $vendorPayment)
        ->with('vendors',Vendor::pluck('vendor_name','id'));
    }

    /**
     * Update the specified VendorPayment in storage.
     *
     * @param  int              $id
     * @param UpdateVendorPaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorPaymentRequest $request,$project_id)
    {
        $vendorPayment = $this->vendorPaymentRepository->findWithoutFail($id);

        if (empty($vendorPayment)) {
            Flash::error('Vendor Payment not found');

            return redirect(route('vendorPayments.index',[$project_id]));
        }

        $vendorPayment = $this->vendorPaymentRepository->update($request->all(), $id);

        Flash::success('Vendor Payment updated successfully.');

        return redirect(route('vendorPayments.index',[$project_id]));
    }

    /**
     * Remove the specified VendorPayment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($project_id,$id)
    {
        $vendorPayment = $this->vendorPaymentRepository->findWithoutFail($id);

        if (empty($vendorPayment)) {
            Flash::error('Vendor Payment not found');

            return redirect(route('vendorPayments.index',$project_id));
        }

        $this->vendorPaymentRepository->delete($id);

        Flash::success('Vendor Payment deleted successfully.');

        return redirect(route('vendorPayments.index',$project_id));
    }
}
