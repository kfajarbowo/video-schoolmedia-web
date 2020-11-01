{{ csrf_field() }}
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skills Name</label>
            <input type="text" name="{{ $input }}" value="{{ isset($users) ? $users->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
