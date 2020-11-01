{{ csrf_field() }}
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Name</label>
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

    @php $input = "image"; @endphp
    <div class="col-md-6">
        <div>
            <label>Video Image</label>
            <input type="file" name="{{$input}}">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

    @php $input = "youtube"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube url</label>
            <input type="url" name="{{$input}}" value="{{ isset($users) ? $users->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
<br>
    @php $input = "published"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" style="background-color:#202a3c;">
                <option value="1" {{ isset($users) && $users->{$input} == 1 ? 'selected'  :'' }}>published</option>
                <option value="0" {{ isset($users) && $users->{$input} == 0 ? 'selected'  :'' }}>hidden</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

    @php $input = "cat_id"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Category</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" style="background-color:#202a3c;">
                @foreach($categories  as $caegory)
                    <option value="{{ $caegory->id }}" {{ isset($users) && $users->{$input} == $caegory->id ? 'selected'  :'' }}>{{ $caegory->name }}</option>
                @endforeach
            </select>
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
            <label class="bmd-label-floating">Video Description</label>
            <textarea name="{{ $input }}"  cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">{{ isset($users) ? $users->{$input} : '' }}</textarea>
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
            <textarea name="{{ $input }}"  cols="30" rows="2" class="form-control @error($input) is-invalid @enderror">{{ isset($users) ? $users->{$input} : '' }}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

    @php $input = "skills[]"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skills</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" style="background-color:#202a3c;">
                @foreach($skills  as $skill)
                    <option value="{{ $skill->id }}"> {{ $skill->name }}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

    @php $input = "tags[]"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tag</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" style="background-color:#202a3c;">
                @foreach($tags  as $tag)
                    <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

</div>
