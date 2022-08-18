<div class="form-group">
    <label class="col-form-label" for="name">Nome @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input value="{{ $data['name'] ?? old('name') }}"
           type="text"
           class="form-control"
           id="name"
           name="name"
           placeholder="Nome"
           @if(isset($required) && $required) required @endif>
</div>
