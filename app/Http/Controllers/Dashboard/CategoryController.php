<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Image;
use App\Traits\UploadTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use UploadTraits;

    public function index()
    {
        $categories = Category::all();
        return view('Dashboard.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Dashboard.category.add', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        try {
            $categories = new Category();
            $categories->name = $request->name;
            $categories->description = $request->description;
            $categories->is_active = 1;
            $categories->save();

            //Upload img
            $this->verifyAndStoreImage($request, 'photo', 'category', 'upload_image', $categories->id, 'App\Models\Category');

            DB::commit();
            toastr()->success('The data has been saved successfully');
            return redirect()->route('category.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(CategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $categories = Category::findorfail($request->id);

            $categories->name = $request->name;
            $categories->description = $request->description;
            $categories->is_active = $request->is_active;
            $categories->save();

            // update photo
            if ($request->has('photo')) {
                // Delete old photo
                if ($categories->image) {
                    $old_img = $categories->image->filename;
                    $this->Delete_attachment('upload_image', 'category/' . $old_img, $request->id);
                }
                //Upload img
                $this->verifyAndStoreImage($request, 'photo', 'category', 'upload_image', $request->id, 'App\Models\Category');
            }

            DB::commit();
            toastr()->success('The data has been modified successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
//        Image::destroy($request->id);
//        Category::destroy($request->id);
//        toastr()->error('The data has been deleted successfully');
//        return redirect()->back();

        if($request->filename){

            $this->Delete_attachment('upload_image', 'category/'.$request->filename,$request->id,$request->filename);
        }
            Category::destroy($request->id);
            toastr()->error('The data has been deleted successfully');
            return redirect()->route('category.index');
        }



}
