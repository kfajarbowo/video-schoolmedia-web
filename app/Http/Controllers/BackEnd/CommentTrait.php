<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Backend\Comments\Store;
use App\Models\Comments;

trait CommentTrait{

    public function commentStore(Store $request){
        $requestArray = $request->all() + ['user_id' => auth()->user()->id];
        Comments::create($requestArray);

        return redirect()->route('videos.edit',['id' => $requestArray['video_id'],'#comments']);
    }

    public function commentDelete($id){
        $users = Comments::findOrFail($id);
        $users->delete();
        return redirect()->route('videos.edit',['id'=>$users->video_id,'#comments']);
    }
    public function commentUpdate($id,Store $request){
        $users = Comments::findOrFail($id);
        $users->update($request->all());
        return redirect()->route('videos.edit',['id'=>$users->video_id,'#comments']);
    }
}
