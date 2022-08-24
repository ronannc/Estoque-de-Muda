<div class="form-group">
    <label class="col-form-label" for="email">Email @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input value="{{ $data['email'] ?? old('email') }}"
           type="email"
           class="form-control"
           id="email"
           name="email"
           placeholder="Email"
           @if(isset($required) && $required) required @endif>
</div>
