<div class="form-group">
    <label class="col-form-label" for="password">Senha @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input type="password"
           class="form-control"
           id="password"
           name="password"
           placeholder="Senha"
           @if(isset($required) && $required) required @endif>
</div>
