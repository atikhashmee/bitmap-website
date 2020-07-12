<?php

namespace App\Http\Controllers\Products;

use App\Http\Requests\CreateProductsListsRequest;
use App\Http\Requests\UpdateProductsListsRequest;
use App\Repositories\ProductsListsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
 use App\Models\Products\ProductUnit;
 use App\Models\Products\ProductCategory;
class ProductsListsController extends AppBaseController
{
    /** @var  ProductsListsRepository */
    private $productsListsRepository;

    public function __construct(ProductsListsRepository $productsListsRepo)
    {
        $this->productsListsRepository = $productsListsRepo;
    }

    /**
     * Display a listing of the ProductsLists.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productsListsRepository->pushCriteria(new RequestCriteria($request));
        $productsLists = $this->productsListsRepository->paginate(10);

        return view('components.products.products_lists.index')
            ->with('productsLists', $productsLists);
    }

    /**
     * Show the form for creating a new ProductsLists.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.products.products_lists.create')
        ->with('units', ProductUnit::pluck('unit_name','id'))
        ->with('categories', ProductCategory::pluck('cat_name','id'));
    }

    /**
     * Store a newly created ProductsLists in storage.
     *
     * @param CreateProductsListsRequest $request
     *
     * @return Response
     */
    public function store(CreateProductsListsRequest $request)
    {
        $input = $request->all();

        $productsLists = $this->productsListsRepository->create($input);

        Flash::success('Products Lists saved successfully.');

        return redirect(route('productsLists.index'));
    }

    /**
     * Display the specified ProductsLists.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productsLists = $this->productsListsRepository->findWithoutFail($id);

        if (empty($productsLists)) {
            Flash::error('Products Lists not found');

            return redirect(route('productsLists.index'));
        }

        return view('components.products.products_lists.show')->with('productsLists', $productsLists);
    }

    /**
     * Show the form for editing the specified ProductsLists.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productsLists = $this->productsListsRepository->findWithoutFail($id);

        if (empty($productsLists)) {
            Flash::error('Products Lists not found');

            return redirect(route('productsLists.index'));
        }

        return view('components.products.products_lists.edit')
        ->with('productsLists', $productsLists)
        ->with('units', ProductUnit::pluck('unit_name','id'))
        ->with('categories', ProductCategory::pluck('cat_name','id'));
    }

    /**
     * Update the specified ProductsLists in storage.
     *
     * @param  int              $id
     * @param UpdateProductsListsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductsListsRequest $request)
    {
        $productsLists = $this->productsListsRepository->findWithoutFail($id);

        if (empty($productsLists)) {
            Flash::error('Products Lists not found');

            return redirect(route('productsLists.index'));
        }

        $productsLists = $this->productsListsRepository->update($request->all(), $id);

        Flash::success('Products Lists updated successfully.');

        return redirect(route('productsLists.index'));
    }

    /**
     * Remove the specified ProductsLists from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productsLists = $this->productsListsRepository->findWithoutFail($id);

        if (empty($productsLists)) {
            Flash::error('Products Lists not found');

            return redirect(route('productsLists.index'));
        }

        $this->productsListsRepository->delete($id);

        Flash::success('Products Lists deleted successfully.');

        return redirect(route('productsLists.index'));
    }
}
