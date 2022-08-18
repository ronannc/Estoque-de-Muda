<div class="form-group">
    <label class="col-form-label" for="number">Número @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input value="{{ $data['number'] ?? old('number') }}"
           type="text"
           class="form-control"
           id="number"
           name="number"
           placeholder="Número"
           @if(isset($required) && $required) required @endif>
</div>
