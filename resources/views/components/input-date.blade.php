<div class="form-group">
    <label class="col-form-label"
           for="date">Data @if(isset($required) && $required)
            <i class="fa fa-asterisk"
               style="color: red"></i>
        @endif
    </label>
    <input type="date"
           class="form-control"
           id="date"
           name="date"
           value="{{ $data['date'] ?? ( old('quantity') ?? date('Y-m-d') ) }}"
           @if(isset($disable) && $disable) disabled @endif/>
</div>
