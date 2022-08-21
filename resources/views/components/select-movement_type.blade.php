<div class="form-group">
    <label class="col-form-label" for="type">Tipo @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <select class="select2" name="type" style="width: 100%" @if(isset($required) && $required) required @endif>
        <option value="{{\App\Models\Inventory::STORE}}" {{ isset($data['tipo']) && $data['tipo'] == \App\Models\Inventory::STORE ? 'selected': '' }}>Entrada
        </option>
        <option value="{{\App\Models\Inventory::EXIT}}" {{ isset($data['tipo']) && $data['tipo'] == \App\Models\Inventory::EXIT ? 'selected': '' }}>Saida
        </option>
    </select>
</div>
