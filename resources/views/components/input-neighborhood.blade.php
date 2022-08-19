<div class="form-group">
    <label class="col-form-label" for="neighborhood">Bairro @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input value="{{ $data['neighborhood'] ?? old('neighborhood') }}"
           type="text"
           class="form-control"
           id="neighborhood"
           name="neighborhood"
           placeholder="Bairro"
           @if(isset($required) && $required) required @endif>
</div>
