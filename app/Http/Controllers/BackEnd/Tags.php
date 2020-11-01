<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Tags\Store;
use App\Models\Tag;

class Tags extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }
    //function search
    // public function filter($users){
    //     if(request()->has('name') && request()->get('name') != ""){
    //         $users = $users->where('name', request()->get('name') );
    //     }
    //     return $users;
    // }

    //index in a backendcontroller

    public function store(Store $request){
       $this->model->create($request->all());
        return redirect()->route('tags.index');
    }

    public function update($id, Store $request){
        $users = $this->model->FindOrFail($id);
        $users->update($request->all());

        // $users->update($request->all());
        // $users->save();

        return redirect()->route('tags.index', ['id' => $users->id]);

    }//
}
