<div class="form-group">
    <label class="col-form-label" for="observation">Observação @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <textarea
        class="form-control"
        id="observation"
        name="observation"
        @if(isset($disable) && $disable) disabled @endif
        @if(isset($required) && $required) required @endif>{{ $data['observation'] ?? old('observation') }}</textarea>
</div>
