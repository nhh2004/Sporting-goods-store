<?php

namespace App\Http\Controllers\Admin;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Requests\Menu\CreateFormRequest;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function create() {
        return view('admin.menu.add', [
            'title' => 'Add new category',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request){
        $result = $this ->menuService->create($request);

        return redirect()->back();
    }

    public function index(){
        return view('admin.menu.list', [
            'title' => 'Category list',
            'menus' =>$this->menuService->getAll()
        ]);
    }

    public function show(Menu $menu) {
        return view('admin.menu.edit', [
            'title' => 'Edit category: ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request) {
        $this->menuService->update($request, $menu);
        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request) {
        $result = $this->menuService->destroy($request);
        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Successfully deleted category'
            ]);
        }
        
        dd($result);

        return response()->json([
            'error' => true
        ]);
    }
}
