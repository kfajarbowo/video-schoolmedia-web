<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;


class BackEndController extends Controller{

    protected $model;

    protected $moduleName;

    protected $pageTitle;

    protected $pageDes;

public function __construct(Model $model)
{
    $this->model = $model;
}


public function index(){
    $users = $this->model;
    $users = $this->filter($users);
    $users = $users->paginate(10);
    $withs = $this->with();
    if(!empty($with)){
        $users = $users->with($withs);
    }

    $moduleName = $this->pluralModelName();
    $sModuleName = $this->getModelName();
    $routeName = $this->getClassNameFromModel();
    $pageTitle = "Control ".$moduleName;
    $pageDes = "Kamu bisa add / edit / delete ".$moduleName;

    return view('back-end.'.$this->getClassNameFromModel().'.index',compact(
        'users',
        'pageTitle',
        'moduleName',
        'pageDes',
        'sModuleName',
        'routeName'
    ));
}

public function create(){
    $moduleName = $this->getModelName();
    $pageTitle = "Create ".$moduleName;
    $pageDes = "Kamu bisa add / edit / delete ".$moduleName;
    $folderName = $this->getClassNameFromModel();
    $routeName = $folderName;
    $append = $this->append();

    return view('back-end.'.$folderName.'.create',compact(
        'pageTitle',
        'moduleName',
        'pageDes',
        'folderName',
        'routeName'
    ))->with($append);
}

public function edit($id){
    $users = $this->model->FindOrFail($id);
    $moduleName = $this->getModelName();
    $pageTitle = "Edit ".$moduleName;
    $pageDes = "Kamu bisa add / edit / delete ".$moduleName;
    $folderName = $this->getClassNameFromModel();
    $routeName = $folderName;
    $append = $this->append();

    return view('back-end.'.$folderName.'.edit',compact(
        'users',
        'pageTitle',
        'moduleName',
        'pageDes',
        'folderName',
        'routeName'
    ))->with($append);

}

public function destroy($id){
    $this->model->FindOrFail($id)->delete();
    return redirect()->route($this->getClassNameFromModel().'.index');

}

protected function with(){
    return [];
}

protected function filter($users){
    return $users;
}

protected function getClassNameFromModel(){
    return strtolower($this->pluralModelName());
}

protected function pluralModelName(){
    return str_plural($this->getModelName());
}

protected function getModelName(){
    return class_basename($this->model);

}
protected function append(){
    return [];
}


}

?>
