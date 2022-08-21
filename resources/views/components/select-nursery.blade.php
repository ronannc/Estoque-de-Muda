<div class="form-group">
    <label class="col-form-label" for="nursery_id">Viveiro @if(isset($required) && $required)
            <i class="fa fa-asterisk" style="color: red"></i>
        @endif</label>
    <select class="select2" name="nursery_id" id="nursery_id" style="width: 100%" @if(isset($required) && $required) required @endif>
        @if(isset($extraData['nurseries']))
            @foreach ($extraData['nurseries'] as $key => $nursery)
                @if(!empty($data['nursery_id']))
                    <option value="{{ $nursery->id }}" {{ $nursery->id == $data['nursery_id']  ? 'selected': '' }}> {{ $nursery->name }} </option>
                @else
                    <option value="{{ $nursery->id }}">{{ $nursery->name }} </option>
                @endif
            @endforeach
        @endif
    </select>
</div>
