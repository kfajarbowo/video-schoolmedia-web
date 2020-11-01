{{ csrf_field() }}
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Category Name</label>
            <input type="text" name="{{ $input }}" value="{{ isset($users) ? $users->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input = "meta_keywords"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta keywords</label>
            <input type="text" name="{{$input}}" value="{{ isset($users) ? $users->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "des"; @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Pages Description</label>
            <textarea name="{{ $input }}"  cols="30" rows="10" class="form-control @error($input) is-invalid @enderror">{{ isset($users) ? $users->{$input} : '' }}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

    @php $input = "meta_des"; @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="{{ $input }}"  cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">{{ isset($users) ? $users->{$input} : '' }}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
</div>