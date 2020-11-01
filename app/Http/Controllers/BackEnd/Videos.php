<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Videos\Store;
use App\Http\Requests\Backend\Videos\Update;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;

class Videos extends BackEndController
{
    use CommentTrait;

    public function __construct(Video $model)
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

    // public function index(){
    //     $users = $this->model->with('cat','user');
    //     $users = $this->filter($users);
    //     $users = $users->paginate(10);

    //     $moduleName = $this->pluralModelName();
    //     $sModuleName = $this->getModelName();
    //     $routeName = $this->getClassNameFromModel();
    //     $pageTitle = "Control ".$moduleName;
    //     $pageDes = "Kamu bisa add / edit / delete ".$moduleName;

    //     return view('back-end.'.$this->getClassNameFromModel().'.index',compact(
    //         'users',
    //         'pageTitle',
    //         'moduleName',
    //         'pageDes',
    //         'sModuleName',
    //         'routeName'
    //     ));
    // }
    protected function with(){
        return ['cat','user'];
    }

    protected function append(){
        // dd(request()->route()->parameter('video'));

        $array = [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'selecetedSkills' => [],
            'selecetedTags' => [],
            'comments' => []
        ];
        if(request()->route()->parameter('video')){
            $array['selectedSkills']  = $this->model->find(request()->route()->parameter('video'))
                ->skills()->get()->pluck('skills.id')->toArray();

             $array['selectedTags']  = $this->model->find(request()->route()->parameter('video'))
               ->tags()->get()->pluck('tags.id')->toArray();

            $array['comments']  = $this->model->find(request()->route()->parameter('video'))
            ->comments()->orderBy('id' , 'desc')->with('user')->get();

        }

        return $array;
    }

    // public function create(){
    //     $moduleName = $this->getModelName();
    //     $pageTitle = "Create ".$moduleName;
    //     $pageDes = "Kamu bisa add / edit / delete ".$moduleName;
    //     $folderName = $this->getClassNameFromModel();
    //     $routeName = $folderName;
    //     $categories = Category::get();

    //     return view('back-end.'.$folderName.'.create',compact(
    //         'pageTitle',
    //         'moduleName',
    //         'pageDes',
    //         'folderName',
    //         'routeName',
    //         'categories'
    //     ));
    // }

    // public function edit($id){
    //     $users = $this->model->FindOrFail($id);
    //     $moduleName = $this->getModelName();
    //     $pageTitle = "Edit ".$moduleName;
    //     $pageDes = "Kamu bisa add / edit / delete ".$moduleName;
    //     $folderName = $this->getClassNameFromModel();
    //     $routeName = $folderName;
    //     $categories = Category::get();

    //     return view('back-end.'.$folderName.'.edit',compact(
    //         'users',
    //         'pageTitle',
    //         'moduleName',
    //         'pageDes',
    //         'folderName',
    //         'routeName',
    //         'categories'
    //     ));

    // }

    public function store(Store $request){
        $fileName = $this->uploadImage($request);
        $requestArray = ['user_id' => auth()->user()->id , 'image'=> $fileName] + $request->all();

        $users = $this->model->create($requestArray);
        $this->syncTagsSkills($users , $requestArray);


        return redirect()->route('videos.index');
    }

    public function update($id, Update $request){



        $requestArray = $request->all();
        if($request->hasFile('image')){
            $fileName = $this->uploadImage($request);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        $users = $this->model->FindOrFail($id);
        $users->update($requestArray);
        $this->syncTagsSkills($users , $requestArray);

        // $users->update($request->all());
        // $users->save();

        return redirect()->route('videos.edit', ['id' => $users->id]);

    }
    protected function syncTagsSkills($users , $requestArray){
        if(isset($requestArray['skills']) && !empty($requestArray['skills'])){
            $users->skills()->sync($requestArray['skills']);
            //sync menghapus data yang ada dan menjadikan array
            //skills dari function yang ada di model
        }
        if(isset($requestArray['tags']) && !empty($requestArray['tags'])){
            $users->tags()->sync($requestArray['tags']);

        }

    }
    protected function uploadImage($request){
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads') , $fileName);
            return $fileName;
    }
}
