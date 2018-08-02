<?php

namespace App\Http\Controllers\backend;

use App\menu;
use App\submenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.menu.create_menu');

    }

    public function createdragmenu(){
       return view('backend.menu.nestable_menu');
        //return view('backend.menu.new_menu');
    }

    public function createsubmenu(){

         $menus = menu::select('id','menuname')->get();
        return view('backend.menu.create_submenu',compact('menus'));

    }

    public function storesubmenu(Request $request){
        $this->validate($request,[

            'submenuname'=>'required',
            'menu'=>'required',
            'link'=>'required',

        ]);
        $submenu = new submenu();
        $submenu->submenuname = $request->submenuname;
        $submenu->menu_id = $request->menu;
        $submenu->link = $request->link;
        $submenu->save();
        return back()->with('success', 'Your images has been successfully');

    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'menuname'=>'required',

        ]);

        $menu = new menu();

        $menu->menuname = $request->menuname;
        $menu->save();
        return back()->with('success', 'Your images has been successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
