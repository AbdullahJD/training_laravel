<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Interfaces\StoreRepositoryInterfaces;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $stores;

    public function __construct(StoreRepositoryInterfaces $stores)
    {
        $this->store = $stores;
    }

    public function index()
    {
       return $this->store->index();
    }

    public function create()
    {
        return $this->store->create();
    }

    public function store(StoreRequest $request)
    {
        return $this->store->store($request);
    }

    public function edit(string $id)
    {
        return $this->store->edit($id);
    }

    public function update(StoreRequest $request)
    {
        return $this->store->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->store->destroy($request);
    }
}
