<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieStoreRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->keywords;
        if ($keywords) {
            $categories = Categorie::where('name', 'like', "%" . $request->keywords . "%")->paginate(5);
            $categories->appends(['keywords' => $keywords]);
            return view('categorie.index', compact('categories', 'keywords'));
        }
        $categories = Categorie::paginate(5);
        return view('categorie.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieStoreRequest $request)
    {
        Categorie::create($request->getAttributes());
        Alert::success('Congratulations...', 'Data saved successfully');
        return redirect()->route('categorie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categorie.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categorie.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieStoreRequest $request, $id)
    {
        Categorie::findOrFail($id)->update($request->getAttributes());
        Alert::success('Congratulations...', 'Data updated successfully');
        return redirect()->route('categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorie::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Data deleted succesfully'], 200);
    }
}