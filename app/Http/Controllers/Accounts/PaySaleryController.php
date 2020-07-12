<?php

namespace App\Http\Controllers\Accounts;

use Flash;
use Response;
use Carbon\Carbon;
use App\TeamMembers;
use Illuminate\Http\Request;
use App\Models\Accounts\Paysalery;
use App\Repositories\PaysaleryRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreatePaysaleryRequest;
use App\Http\Requests\UpdatePaysaleryRequest;
use Prettus\Repository\Criteria\RequestCriteria;

class PaysaleryController extends AppBaseController
{
    /** @var  PaysaleryRepository */
    private $paysaleryRepository;

    public function __construct(PaysaleryRepository $paysaleryRepo)
    {
        $this->paysaleryRepository = $paysaleryRepo;
    }

    /**
     * Display a listing of the Paysalery.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$employee_id)
    {

            
        
        //dd($employee_id);
        $this->paysaleryRepository->pushCriteria(new RequestCriteria($request));
        $paysaleries =  Paysalery::where('employee_id', $employee_id)->paginate(10); //$this->paysaleryRepository->paginate(10);
        return view('components.accounts.paysaleries.index')
            ->with('paysaleries', $paysaleries)
            ->with('employee',\App\TeamMembers::find($employee_id));
            
    }

    /**
     * Show the form for creating a new Paysalery.
     *
     * @return Response
     */
    public function create($employee_id)
    {

         
                //working with loan amount
                $allloans =  \App\TeamMembers::find($employee_id)->loans->sum('amount');
                $allpayments =  \App\TeamMembers::find($employee_id)->saleryPayment->sum('loan');


        return view('components.accounts.paysaleries.create')
        ->with('users',\App\TeamMembers::find($employee_id))
        ->with('loans',$allloans-$allpayments);
    }

    /**
     * Store a newly created Paysalery in storage.
     *
     * @param CreatePaysaleryRequest $request
     *
     * @return Response
     */
    public function store(CreatePaysaleryRequest $request,$employee_id)
    {

          //count the salery that already paid up
          if (availableTaka() < $request->input('payamount')) {
            Flash::error('You have no sufficient Balance <a href="#">see why</a>');
        }
        else if( !$request->saleryLimit($employee_id,$request->input('date'))) {

            $input = $request->all();

        $paysalery = $this->paysaleryRepository->create($input);

        Flash::success('Paysalery saved successfully.');
        }else {
            Flash::error('You can not pay to this employee at this month, he has reached the limit');
        }
          
       
        

        return redirect(route('paysaleries.index',$employee_id));
    }

    /**
     * Display the specified Paysalery.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($employee_id,$id)
    {
        $paysalery = $this->paysaleryRepository->findWithoutFail($id);

        if (empty($paysalery)) {
            Flash::error('Paysalery not found');

            return redirect(route('paysaleries.index'));
        }

        return view('components.accounts.paysaleries.show')->with('paysalery', $paysalery)
        ->with('users',\App\TeamMembers::find($employee_id));
    }

    /**
     * Show the form for editing the specified Paysalery.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($employee_id,$id)
    {
        $paysalery = $this->paysaleryRepository->findWithoutFail($id);

        if (empty($paysalery)) {
            Flash::error('Paysalery not found');

            return redirect(route('paysaleries.index'));
        }

        return view('components.accounts.paysaleries.edit')->with('paysalery', $paysalery)
        ->with('accountsnames',\App\Models\Accounts\Treasures::pluck('account_name','id'));
    }

    /**
     * Update the specified Paysalery in storage.
     *
     * @param  int              $id
     * @param UpdatePaysaleryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaysaleryRequest $request,$employee_id)
    {
        $paysalery = $this->paysaleryRepository->findWithoutFail($id);

        if (empty($paysalery)) {
            Flash::error('Paysalery not found');

            return redirect(route('paysaleries.index',$employee_id));
        }

        $paysalery = $this->paysaleryRepository->update($request->all(), $id);

        Flash::success('Paysalery updated successfully.');

        return redirect(route('paysaleries.index',$employee_id));
    }

    /**
     * Remove the specified Paysalery from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($employee_id,$id)
    {
        $paysalery = $this->paysaleryRepository->findWithoutFail($id);

        if (empty($paysalery)) {
            Flash::error('Paysalery not found');

            return redirect(route('paysaleries.index',$employee_id));
        }

        $this->paysaleryRepository->delete($id);

        Flash::success('Paysalery deleted successfully.');

        return redirect(route('paysaleries.index',$employee_id));
    }
}
