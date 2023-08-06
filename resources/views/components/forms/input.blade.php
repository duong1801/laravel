<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">{{$slot}}</label>
    <input type="text" name="{{$field}}" class="form-control
    @error($field) is-invalid @enderror"
           id="exampleInputEmail1">
    <div id="emailHelp" class="form-text"></div>
</div>
@error($field)
<div class="alert alert-danger">{{ $message }}</div>
@enderror
