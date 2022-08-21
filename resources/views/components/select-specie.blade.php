<div class="form-group">
    <label class="col-form-label" for="specie_id">Especie @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <select class="select2" name="specie_id" id="specie_id" style="width: 100%" @if(isset($required) && $required) required @endif>
        @if(isset($extraData['species']))
            @foreach ($extraData['species'] as $key => $specie)
                @if(!empty($data['specie_id']))
                    <option value="{{ $specie->id }}" {{ $specie->id == $data['specie_id']  ? 'selected': '' }}> {{ $specie->name }} </option>
                @else
                    <option value="{{ $specie->id }}">{{ $specie->name }} </option>
                @endif
            @endforeach
        @endif
    </select>
</div>
