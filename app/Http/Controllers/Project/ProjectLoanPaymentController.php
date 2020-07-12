<?php

namespace App\Http\Controllers\Project;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Models\Project\ProjectLoanPayment;
use App\Http\Controllers\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProjectLoanPaymentRepository;
use App\Http\Requests\CreateProjectLoanPaymentRequest;
use App\Http\Requests\UpdateProjectLoanPaymentRequest;

class ProjectLoanPaymentController extends AppBaseController
{
    /** @var  ProjectLoanPaymentRepository */
    private $projectLoanPaymentRepository;

    public function __construct(ProjectLoanPaymentRepository $projectLoanPaymentRepo)
    {
        $this->projectLoanPaymentRepository = $projectLoanPaymentRepo;
    }

    /**
     * Display a listing of the ProjectLoanPayment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$project_id,$loan_id)
    {
        $this->projectLoanPaymentRepository->pushCriteria(new RequestCriteria($request));
        $projectLoanPayments =  ProjectLoanPayment::where('loans_id', $loan_id)->paginate(10);
        //$this->projectLoanPaymentRepository->paginate(10);

        return view('components.project.project_loan_payments.index')
            ->with('projectLoanPayments', $projectLoanPayments);
    }

    /**
     * Show the form for creating a new ProjectLoanPayment.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.project.project_loan_payments.create');
    }

    /**
     * Store a newly created ProjectLoanPayment in storage.
     *
     * @param CreateProjectLoanPaymentRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectLoanPaymentRequest $request,$project_id,$loan_id)
    {
        $input = $request->all();

        $projectLoanPayment = $this->projectLoanPaymentRepository->create($input);

        Flash::success('Project Loan Payment saved successfully.');

        return redirect(route('projectLoanPayments.index',[$project_id,$loan_id]));
    }

    /**
     * Display the specified ProjectLoanPayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $projectLoanPayment = $this->projectLoanPaymentRepository->findWithoutFail($id);

        if (empty($projectLoanPayment)) {
            Flash::error('Project Loan Payment not found');

            return redirect(route('projectLoanPayments.index'));
        }

        return view('components.project.project_loan_payments.show')->with('projectLoanPayment', $projectLoanPayment);
    }

    /**
     * Show the form for editing the specified ProjectLoanPayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($project_id,$loan_id,$id)
    {
        $projectLoanPayment = $this->projectLoanPaymentRepository->findWithoutFail($id);

        if (empty($projectLoanPayment)) {
            Flash::error('Project Loan Payment not found');

            return redirect(route('projectLoanPayments.index',[$project_id,$loan_id]));
        }

        return view('components.project.project_loan_payments.edit')->with('projectLoanPayment', $projectLoanPayment);
    }

    /**
     * Update the specified ProjectLoanPayment in storage.
     *
     * @param  int              $id
     * @param UpdateProjectLoanPaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectLoanPaymentRequest $request,$project_id,$loan_id)
    {
        $projectLoanPayment = $this->projectLoanPaymentRepository->findWithoutFail($id);

        if (empty($projectLoanPayment)) {
            Flash::error('Project Loan Payment not found');

            return redirect(route('projectLoanPayments.index',[$project_id,$loan_id]));
        }

        $projectLoanPayment = $this->projectLoanPaymentRepository->update($request->all(), $id);

        Flash::success('Project Loan Payment updated successfully.');

        return redirect(route('projectLoanPayments.index',[$project_id,$loan_id]));
    }

    /**
     * Remove the specified ProjectLoanPayment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($project_id,$loan_id,$id)
    {
        $projectLoanPayment = $this->projectLoanPaymentRepository->findWithoutFail($id);

        if (empty($projectLoanPayment)) {
            Flash::error('Project Loan Payment not found');

            return redirect(route('projectLoanPayments.index',[$project_id,$loan_id]));
        }

        $this->projectLoanPaymentRepository->delete($id);

        Flash::success('Project Loan Payment deleted successfully.');

        return redirect(route('projectLoanPayments.index',[$project_id,$loan_id]));
    }
}
