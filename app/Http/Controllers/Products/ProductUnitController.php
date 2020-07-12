<?php

namespace App\Http\Controllers\Products;

use App\Http\Requests\CreateProductUnitRequest;
use App\Http\Requests\UpdateProductUnitRequest;
use App\Repositories\ProductUnitRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductUnitController extends AppBaseController
{
    /** @var  ProductUnitRepository */
    private $productUnitRepository;

    public function __construct(ProductUnitRepository $productUnitRepo)
    {
        $this->productUnitRepository = $productUnitRepo;
    }

    /**
     * Display a listing of the ProductUnit.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productUnitRepository->pushCriteria(new RequestCriteria($request));
        $productUnits = $this->productUnitRepository->all();

        return view('components.products.product_units.index')
            ->with('productUnits', $productUnits);
    }

    /**
     * Show the form for creating a new ProductUnit.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.products.product_units.create');
    }

    /**
     * Store a newly created ProductUnit in storage.
     *
     * @param CreateProductUnitRequest $request
     *
     * @return Response
     */
    public function store(CreateProductUnitRequest $request)
    {
        $input = $request->all();

        $productUnit = $this->productUnitRepository->create($input);

        Flash::success('Product Unit saved successfully.');

        return redirect(route('productUnits.index'));
    }

    /**
     * Display the specified ProductUnit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productUnit = $this->productUnitRepository->findWithoutFail($id);

        if (empty($productUnit)) {
            Flash::error('Product Unit not found');

            return redirect(route('productUnits.index'));
        }

        return view('components.products.product_units.show')->with('productUnit', $productUnit);
    }

    /**
     * Show the form for editing the specified ProductUnit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productUnit = $this->productUnitRepository->findWithoutFail($id);

        if (empty($productUnit)) {
            Flash::error('Product Unit not found');

            return redirect(route('productUnits.index'));
        }

        return view('components.products.product_units.edit')->with('productUnit', $productUnit);
    }

    /**
     * Update the specified ProductUnit in storage.
     *
     * @param  int              $id
     * @param UpdateProductUnitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductUnitRequest $request)
    {
        $productUnit = $this->productUnitRepository->findWithoutFail($id);

        if (empty($productUnit)) {
            Flash::error('Product Unit not found');

            return redirect(route('productUnits.index'));
        }

        $productUnit = $this->productUnitRepository->update($request->all(), $id);

        Flash::success('Product Unit updated successfully.');

        return redirect(route('productUnits.index'));
    }

    /**
     * Remove the specified ProductUnit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productUnit = $this->productUnitRepository->findWithoutFail($id);

        if (empty($productUnit)) {
            Flash::error('Product Unit not found');

            return redirect(route('productUnits.index'));
        }

        $this->productUnitRepository->delete($id);

        Flash::success('Product Unit deleted successfully.');

        return redirect(route('productUnits.index'));
    }
}
