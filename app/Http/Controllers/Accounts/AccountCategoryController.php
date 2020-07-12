<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Requests\CreateAccountCategoryRequest;
use App\Http\Requests\UpdateAccountCategoryRequest;
use App\Repositories\AccountCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Accounts\AccountCategory;

class AccountCategoryController extends AppBaseController
{
    /** @var  AccountCategoryRepository */
    private $accountCategoryRepository;

    public function __construct(AccountCategoryRepository $accountCategoryRepo)
    {
        $this->accountCategoryRepository = $accountCategoryRepo;
    }

    /**
     * Display a listing of the AccountCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
                $node = AccountCategory::get()->toTree();

               // dd($node);

               /*  $traverse  = function($categories, $prefix='-') use (&$traverse){
                        
                        foreach ($categories as $category) {
                            echo PHP_EOL.$prefix.' '.$category->Category."<br>";

                            $traverse($category->children, $prefix.'-');
                        }
                       
                };

               $traverse($node) ; */



        $this->accountCategoryRepository->pushCriteria(new RequestCriteria($request));
        $accountCategories = $this->accountCategoryRepository->paginate(10);

        return view('components.accounts.account_categories.index')
            ->with('accountCategories',$node);
    }

    /**
     * Show the form for creating a new AccountCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.accounts.account_categories.create')->with('accounts',AccountCategory::pluck('Category','id'));
    }

    /**
     * Store a newly created AccountCategory in storage.
     *
     * @param CreateAccountCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountCategoryRequest $r)
    {
         
       $parent = " ";//strlen($r->input('parent_it'));
           
         //dd($parent);
         
         
              

        $node = new AccountCategory([
            'Category' =>   $r->input('Category'),
            'description' =>   $r->input('description')
        ]);
 
         

        if( empty($r->input('parent_id') )  ||  strlen($r->input('parent_id')) == 0  ||  $r->input('parent_id') ==null) 
        {
            $node->save();
        }
        else 
        {
            $parent =  AccountCategory::find( (int) $r->input('parent_id') ) ;
            // dd( $parent);
            $node->appendToNode($parent)->save();
            
        }


        /* $input = $request->all();

        $accountCategory = $this->accountCategoryRepository->create($input);
                                                    */
        Flash::success('Account Category saved successfully.');

        return redirect(route('accountCategories.index')); 
    }

    /**
     * Display the specified AccountCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountCategory = $this->accountCategoryRepository->findWithoutFail($id);

        if (empty($accountCategory)) {
            Flash::error('Account Category not found');

            return redirect(route('accountCategories.index'));
        }

        return view('components.accounts.account_categories.show')->with('accountCategory', $accountCategory);
    }

    /**
     * Show the form for editing the specified AccountCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountCategory = $this->accountCategoryRepository->findWithoutFail($id);

        if (empty($accountCategory)) {
            Flash::error('Account Category not found');

            return redirect(route('accountCategories.index'));
        }

        return view('components.accounts.account_categories.edit')->with('accountCategory', $accountCategory)->with('accounts',AccountCategory::pluck('Category','id'));
    }

    /**
     * Update the specified AccountCategory in storage.
     *
     * @param  int              $id
     * @param UpdateAccountCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountCategoryRequest $request)
    {
        $accountCategory = $this->accountCategoryRepository->findWithoutFail($id);

        if (empty($accountCategory)) {
            Flash::error('Account Category not found');

            return redirect(route('accountCategories.index'));
        }

        $accountCategory = $this->accountCategoryRepository->update($request->all(), $id);

        Flash::success('Account Category updated successfully.');

        return redirect(route('accountCategories.index'));
    }

    /**
     * Remove the specified AccountCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountCategory = $this->accountCategoryRepository->findWithoutFail($id);

        if (empty($accountCategory)) {
            Flash::error('Account Category not found');

            return redirect(route('accountCategories.index'));
        }

        $this->accountCategoryRepository->delete($id);

        Flash::success('Account Category deleted successfully.');

        return redirect(route('accountCategories.index'));
    }
}
