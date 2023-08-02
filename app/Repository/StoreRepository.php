<?php

namespace App\Repository;

use App\Interfaces\StoreRepositoryInterfaces;
use App\Models\Item;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class StoreRepository implements StoreRepositoryInterfaces
{

    public function index()
    {
        $stores = Store::with('items')->get();
        return view('Dashboard.Store.index',compact('stores'));
    }

    public function create()
    {
        $store = Item::all();
        return view('Dashboard.Store.add', compact('store'));
    }

    public function store($request)
    {
        $store = new Store();
        $store->Address = $request->Address;
        $store->Telephone_number = $request->Telephone_number;
        $store->commercial_register = $request->commercial_register;
//        $stores->item_id = $request->item_id;
        $store->is_active = 1;
        $store->save();
        $store->items()->attach($request->item_id);
//        $store->items()->attach($request->quantity);

        DB::commit();
        toastr()->success('The data has been saved successfully');
        return redirect()->route('store.index');
    }

    public function edit($id)
    {
        $store = Store::with('items')->findorfail($id);
//        $store = Store::findorfail($id);
        $items = Item::all();
        return view('Dashboard.Store.edit', compact('store','items'));
    }

    public function update($request)
    {
        $store = Store::findorfail($request->id);
        $store->Address = $request->Address;
        $store->Telephone_number = $request->Telephone_number;
        $store->commercial_register = $request->commercial_register;
        $store->is_active = $request->is_active;
        $store->save();
        $store->items()->sync($request->item_id);

        DB::commit();
        toastr()->success('The data has been modified successfully');
        return redirect()->route('store.index');
    }

    public function destroy($request)
    {
//        Store::findOrFail($request->id)->delete();
        Store::destroy($request->id);
        toastr()->error('The data has been deleted successfully');
        return redirect()->back();
    }
}
