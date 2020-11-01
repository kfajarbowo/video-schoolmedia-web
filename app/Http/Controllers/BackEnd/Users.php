<?php


namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Backend\Users\Store;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class Users extends BackEndController
{
    public function __construct(User $model)
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
        $requestArray = request()->all();
        $requestArray['password'] = Hash::make($requestArray['password']);
        User::create($requestArray);


        return redirect()->route('users.index');
    }

    public function update(Request $request,$id){
        $users = User::FindorFail($id);

        $requestArray = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if(request()->has('password') && request()->get('password') != ""){
            $requestArray = $requestArray + ['password' => Hash::make($request->password)];
        }
        $users->update($requestArray);

        // $users->update($request->all());
        // $users->save();

        return redirect()->route('users.index',['id' => $users->id]);

    }

}
