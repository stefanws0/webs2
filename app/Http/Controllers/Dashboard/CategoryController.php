<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Category\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Show a list of categories.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $query = $request->get('q');

            $categories = Category::where('name', 'like', '%'.$query.'%')->paginate(15);
        } else {
            $categories = Category::orderBy('name')->paginate(15);
        }

        return view('dashboard.categories', compact('categories'));
    }


    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store()
    {
        Category::create([
            'name' => request('name'),
            'navigation_id' => 2
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Edit the given products.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category  $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the given product.
     *
     * @param  \App\Http\Requests\Category\UpdateRequest  $request
     * @param  \App\Models\Category  $categorie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $request->persist();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category){
        $category->delete();
        $categories = Category::orderBy('name')->paginate(15);
        return view('dashboard.categories', compact('categories'));
    }
}
    {

    }