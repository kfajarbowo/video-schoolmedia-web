<form method="POST" id="delete-form-{{$user->id}}" action="{{route($routeName.'.destroy',$user->id)}}" style="display: none;">
    @csrf
    @method('DELETE')
</form>
<button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Yakin ingin dihapus!?!?!?')){
    event.preventDefault();
    document.getElementById('delete-form-{{$user->id}}').submit();
}else{
     event.preventDefault();
}">
<i class="material-icons">delete</i>
</button>
