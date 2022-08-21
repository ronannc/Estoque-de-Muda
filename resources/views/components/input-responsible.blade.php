<div class="form-group">
    <label class="col-form-label" for="responsible">Responsável @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input class="form-control"
           id="responsible"
           name="responsible"
           @if(isset($disable) && $disable) disabled @endif
           @if(isset($required) && $required) required @endif>{{ $data['responsible'] ?? old('responsible') }}</input>
</div>
