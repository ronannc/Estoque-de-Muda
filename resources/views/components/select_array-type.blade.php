<div class="form-group">
    <label class="col-form-label" for="type_id">Tamanho @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <select class="select2" name="type_id[]" style="width: 100%" @if(isset($required) && $required) required @endif>
        @if(isset($extraData['types']))
            @foreach ($extraData['types'] as $key => $type)
                @if(!empty($data['type_id']))
                    <option value="{{ $type->id }}" {{ $type->id == $data['type_id']  ? 'selected': '' }}> {{ $type->name }} </option>
                @else
                    <option value="{{ $type->id }}">{{ $type->name }} </option>
                @endif
            @endforeach
        @endif
    </select>
</div>
