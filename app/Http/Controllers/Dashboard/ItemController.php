<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::with('category')->get();
        return view('Dashboard.Item.index',compact('item'));
    }

    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('Dashboard.Item.add',compact('categories','units'));
    }

    public function store(ItemRequest $request)
    {
        try {
            $item = new Item();
            $item->name = $request->name;
            $item->category_id = $request->category_id;
            $item->serial_number = $request->serial_number;
            $item->status = 1;
            $item->unit_id = $request->unit_id;
            $item->description = $request->description;
            $item->save();

            DB::commit();
            toastr()->success('The data has been saved successfully');
            return redirect()->route('item.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
    public function edit($id)
    {
        $items = Item::findorfail($id);
        $categories = Category::all();
        return view('Dashboard.Item.edit',compact('categories','items'));
    }

    public function update(ItemRequest $request)
    {
        try {
            $item = Item::findorfail($request->id);
            $item->name = $request->name;
            $item->category_id = $request->category_id;
            $item->serial_number = $request->serial_number;
            $item->status = $request->status;
            $item->unit = $request->unit;
            $item->description = $request->description;
            $item->save();

            DB::commit();
            toastr()->success('The data has been modified successfully');
            return redirect()->route('item.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function destroy(Request $request)
    {
        Item::destroy($request->id);
        toastr()->error('The data has been deleted successfully');
        return redirect()->back();
    }
}
