<div class="form-group">
    <label class="col-form-label" for="password">Confirmação de Senha @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <input type="password"
           class="form-control"
           id="password_confirmation"
           name="password_confirmation"
           placeholder="Confirmação de Senha"
           @if(isset($required) && $required) required @endif>
</div>
