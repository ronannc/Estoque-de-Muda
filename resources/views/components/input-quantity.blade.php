<div class="form-group">
    <label class="col-form-label" for="quantity">Quantidade @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input value="{{ $data['quantity'] ?? old('quantity') }}"
           type="number"
           class="form-control"
           id="quantity"
           name="quantity"
           placeholder="Quantidade"
           @if(isset($disable) && $disable) disabled @endif
           @if(isset($required) && $required) required @endif>
</div>
