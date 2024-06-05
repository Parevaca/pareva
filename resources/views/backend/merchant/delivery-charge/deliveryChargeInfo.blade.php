@if(!blank($deliveryCharge))
    <div class="row">
        <input type="hidden" class="form-control" name="weight" id="weight"  value="{{old('weight',$deliveryCharge->weight)}}">
        
        
        <input type="hidden" name="delivery_type" id="delivery_type" value="0">
        <div class="form-group col-6" id="distance_type">
            <label for="distance_type">{{ __('levels.distance_type') }}</label> <span class="text-danger">*</span>
            <select id="distance_type" name="distance_type" class="form-control @error('category') is-invalid @enderror">
                <option value="0" selected>{{ __('levels.fixed') }}</option>
                <option value="1" {{ (old('distance_type',$deliveryCharge->distance_type) == 1) ? 'selected' : '' }}>{{ __('levels.below') }}</option>
                <option value="2" {{ (old('distance_type',$deliveryCharge->distance_type) == 2) ? 'selected' : '' }}>{{ __('levels.above') }}</option>
            </select>
            @error('distance_type')
                <small class="text-danger mt-2">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group col-6" id="range">
            <label for="position">{{ __('levels.distance') }}</label> <span class="text-danger">*</span>
            <input id="distance" type="text" name="distance" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_Kilometer') }}" onpaste="return false;" ondrop="return false;" onblur="return isNumberKey(event);" onkeypress="return isNumberKey(event);" autocomplete="off" class="form-control" value="{{ old('distance',$deliveryCharge->distance) }}" require>
            @error('distance')
                <small class="text-danger mt-2">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-6" id="distance_charge">
            <label for="position">{{ __('levels.delivery_charge') }}</label> <span class="text-danger">*</span>
            <input id="distance_charge" type="text" name="distance_charge" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_delivery_charge') }}" onpaste="return false;" ondrop="return false;" onblur="return isNumberKey(event);" onkeypress="return isNumberKey(event);" autocomplete="off" class="form-control" value="{{ old('distance_charge',$deliveryCharge->distance_charge) }}" require>
            @error('distance_charge')
                <small class="text-danger mt-2">{{ $message }}</small>
            @enderror
        </div>
        
        
        <div class="form-group col-6" id="city_same_day">
            <label for="same_day">{{ __('levels.same_day') }}</label> <span class="text-danger">*</span>
            <input id="same_day" type="number" name="same_day" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_same_day') }}" autocomplete="off" class="form-control" value="{{old('same_day',$deliveryCharge->same_day)}}" require>
            @error('same_day')
            <small class="text-danger mt-2">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-6" id="city_next_day">
            <label for="next_day">{{ __('levels.next_day') }}</label> <span class="text-danger">*</span>
            <input id="next_day" type="number" name="next_day" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_next_day') }}" autocomplete="off" class="form-control" value="{{old('next_day',$deliveryCharge->next_day)}}" require>
            @error('next_day')
            <small class="text-danger mt-2">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-6" id="city_sub_city">
            <label for="sub_city">{{ __('levels.sub_city') }}</label> <span class="text-danger">*</span>
            <input id="sub_city" type="number" name="sub_city" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_sub_city') }}" autocomplete="off" class="form-control" value="{{old('sub_city',$deliveryCharge->sub_city)}}" require>
            @error('sub_city')
            <small class="text-danger mt-2">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-6" id="city_outside">
            <label for="outside_city">{{ __('levels.outside_city') }}</label> <span class="text-danger">*</span>
            <input id="outside_city" type="number" name="outside_city" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_outside_city') }}" autocomplete="off" class="form-control" value="{{old('outside_city',$deliveryCharge->outside_city)}}" require>
            @error('outside_city')
            <small class="text-danger mt-2">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="status">{{__('levels.status')}}</label> <span class="text-danger">*</span>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
                @foreach(trans('status') as $key => $status)
                    <option value="{{ $key }}" {{ (old('status',\App\Enums\Status::ACTIVE) == $key) ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
            @error('status')
            <small class="text-danger mt-2">{{ $message }}</small>
            @enderror
        </div>
    </div>
@endif
