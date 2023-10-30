<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\MenuRequest;
use App\Models\Content\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::query()
        ->orderBy('created_at', 'desc')
        ->simplePaginate(10);
        return view('admin.content.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus=Menu::query()->where('parent_id',null)->get();
        return view('admin.content.menu.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $inputs=$request->all();
        Menu::create($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success','منوی مورد نظر شما با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $parent_menus=Menu::query()->where('parent_id',null)->get()->except($menu->id);
        return view('admin.content.menu.edit',compact('menu','parent_menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $inputs=$request->all();
        $menu->update($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success','منوی مورد نظر شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.content.menu.index')->with('swal-success','منوی مورد نظر شما با موفقیت حذف شد');
    }
    public function status(Menu $menu): JsonResponse
    {
        $menu->status = $menu->status === 0 ? 1 : 0;
        $result = $menu->save();
        if ($result) {
            if ($menu->status === 0) {
                return response()->json(['status' => true, 'checked' => false]);
            }

            return response()->json(['status' => true, 'checked' => true]);
        }

        return response()->json(['status' => false]);
    }
}
