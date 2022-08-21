<div class="form-group">
    <label class="col-form-label" for="destiny">Destino/Procedência @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input value="{{ $data['destiny'] ?? old('destiny') }}"
           type="text"
           class="form-control"
           id="destiny"
           name="destiny"
           placeholder="Destino/Procedência"
           @if(isset($required) && $required) required @endif>
</div>
