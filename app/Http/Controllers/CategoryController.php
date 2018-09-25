<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
        ]);
        Category::create($request->all());
        flash('Категорія успішно добавлена ')->important();
        return redirect()->route('categories.index');

    }

    public function edit(Category $category)
    {
//        dd($category);
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }
    public function destroy($id){
        $category =  Category::findOrFail($id);

        $category->delete();

//        Category::find($id)->delete();

        flash('Category '.$category->title.' was deleted! ')->important();
        return redirect()->route('categories.index');

    }
    public function category($slug){

        $categories = Category::get();
        $category = Category::where('slug',$slug)->firstOrFail();
        $allcourses = Course::all();
        $courses = $category->courses()->paginate(8);
//        dd($courses);

        $cat = $category;
        return view('pubcourses.list',['courses' => $courses,'categories'=>$categories, 'cat' => $cat, 'allcourses' => $allcourses]);
    }
}
