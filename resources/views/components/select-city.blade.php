<div class="form-group">
    <label class="col-form-label" for="city_id">Cidade @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <select class="select2" name="city_id" id="city_id" style="width: 100%" @if(isset($required) && $required) required @endif>
        @if(isset($extraData['cities']))
            @foreach ($extraData['cities'] as $key => $city)
                @if(!empty($data['city_id']))
                    <option value="{{ $city->id }}" {{ $city->id == $data['city_id']  ? 'selected': '' }}> {{ $city->name }} </option>
                @else
                    <option value="{{ $city->id }}">{{ $city->name }} </option>
                @endif
            @endforeach
        @endif
    </select>
</div>
