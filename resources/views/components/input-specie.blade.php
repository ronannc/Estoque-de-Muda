<div class="form-group">
    <label class="col-form-label" for="specie">Especie @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input value="{{ $data['specie'] ?? old('specie') }}"
           type="text"
           class="form-control"
           id="specie"
           name="specie"
           placeholder="Especie"
           @if(isset($required) && $required) required @endif>
</div>
