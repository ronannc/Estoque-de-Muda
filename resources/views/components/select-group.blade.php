<div class="form-group">
    <label class="col-form-label" for="group_id">Grupo @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <select class="select2" name="group_id" id="group_id" style="width: 100%" @if(isset($required) && $required) required @endif>
        @if(isset($extraData['groups']))
            @foreach ($extraData['groups'] as $key => $city)
                @if(!empty($data['group_id']))
                    <option value="{{ $city->id }}" {{ $city->id == $data['group_id']  ? 'selected': '' }}> {{ $city->name }} </option>
                @else
                    <option value="{{ $city->id }}">{{ $city->name }} </option>
                @endif
            @endforeach
        @endif
    </select>
</div>
