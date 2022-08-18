<div class="form-group">
    <label class="col-form-label" for="address">Endereço @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input value="{{ $data['address'] ?? old('address') }}"
           type="text"
           class="form-control"
           id="address"
           name="address"
           placeholder="Endereço"
           @if(isset($required) && $required) required @endif>
</div>
