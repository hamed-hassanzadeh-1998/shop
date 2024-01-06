<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $productCategories = ProductCategory::query()
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);
        return view('admin.market.category.index',compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=ProductCategory::where('parent_id',null)->get();
        return view('admin.market.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request,ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'product-category');
            $result=$imageService->createIndexAndSave($request->file('image'));
        }
        if ($result===false)
            return redirect()
                ->route('admin.content.category.index')
                ->with('swal-error', 'آپلود عکس با خطا مواجه شد.');
        else
            $inputs['image']=$result;
        ProductCategory::create($inputs);
        return redirect()
            ->route('admin.market.category.index')
            ->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد.');//
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        $categories=ProductCategory::where('parent_id',null)->get();
        return view('admin.market.category.edit',compact('productCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request,ProductCategory $productCategory,ImageService $imageService)
    {
        $inputs = $request->all();


        if ($request->hasFile('image')){
            if(!empty($productCategory->image)){
                $imageService->deleteDirectoryAndFiles($productCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'product-category');
            $result=$imageService->createIndexAndSave($request->file('image'));
            if ($result===false)
                return redirect()
                    ->route('admin.market.category.index')
                    ->with('swal-error', 'آپلود عکس با خطا مواجه شد.');
            $inputs['image']=$result;
        } else{
            if (isset($inputs['currentImage']) && !empty($productCategory->image)){
                $image=$productCategory->image;
                $image['currentImage']=$inputs['currentImage'];
                $inputs['image']=$image;
            }
        }


        $productCategory->update($inputs);
        return redirect()->route('admin.market.category.index')->with('swal-success','دسته بندی شما با موفقیت به روز رسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return redirect()->route('admin.market.category.index')->with('swal-success','دسته بندی شما با موفقیت حذف شد');
    }
}
