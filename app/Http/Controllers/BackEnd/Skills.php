<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Backend\Skills\Store;
use App\Models\Skill;

class Skills extends BackEndController
{
    public function __construct(Skill $model)
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
        return redirect()->route('skills.index');
    }

    public function update($id, Store $request){
        $users = $this->model->FindOrFail($id);
        $users->update($request->all());

        // $users->update($request->all());
        // $users->save();

        return redirect()->route('skills.index', ['id' => $users->id]);

    }//
}
