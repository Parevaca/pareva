@extends('backend.partials.master')
@section('title')
    {{ __('delivery_charge.title') }} {{ __('levels.edit') }}
@endsection
@section('maincontent')
<div class="container-fluid  dashboard-content">
    <!-- pageheader -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="breadcrumb-link">{{ __('levels.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('menus.settings')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('delivery-charge.index') }}" class="breadcrumb-link">{{ __('delivery_charge.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('levels.edit') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- end pageheader -->
    <div class="row">
        <!-- basic form -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pageheader-title">{{ __('delivery_charge.edit_delivery_charge') }}</h2>
                    <form action="{{route('delivery-charge.update')}}"  method="POST" enctype="multipart/form-data" id="basicform">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="id" id="id" value="{{$delivery_charge->id}}">
                                <div class="form-group">
                                    <label for="category">{{ __('levels.category') }}</label> <span class="text-danger">*</span>
                                    <select id="category" name="category" class="form-control @error('category') is-invalid @enderror">
                                        @foreach($categories as $category)
                                            <option data-type="{{$category->category_type}}" {{ old('category',$delivery_charge->category_id) == $category->id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <input type="hidden" name="delivery_type" id="delivery_type" value="0">
                                <div class="form-group" id="distance_type">
                                    <label for="distance_type">{{ __('levels.distance_type') }}</label> <span class="text-danger">*</span>
                                    <select id="distance_type" name="distance_type" class="form-control @error('category') is-invalid @enderror">
                                        <option value="0" selected>{{ __('levels.fixed') }}</option>
                                        <option value="1" {{ (old('distance_type',$delivery_charge->distance_type) == 1) ? 'selected' : '' }}>{{ __('levels.below') }}</option>
                                        <option value="2" {{ (old('distance_type',$delivery_charge->distance_type) == 2) ? 'selected' : '' }}>{{ __('levels.above') }}</option>
                                    </select>
                                    @error('distance_type')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group" id="range">
                                    <label for="position">{{ __('levels.distance') }}</label> <span class="text-danger">*</span>
                                    <input id="distance" type="text" name="distance" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_Kilometer') }}" onpaste="return false;" ondrop="return false;" onblur="return isNumberKey(event);" onkeypress="return isNumberKey(event);" autocomplete="off" class="form-control" value="{{ old('distance',$delivery_charge->distance) }}" require>
                                    @error('distance')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group" id="distance_charge">
                                    <label for="position">{{ __('levels.delivery_charge') }}</label> <span class="text-danger">*</span>
                                    <input id="distance_charge" type="text" name="distance_charge" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_delivery_charge') }}" onpaste="return false;" ondrop="return false;" onblur="return isNumberKey(event);" onkeypress="return isNumberKey(event);" autocomplete="off" class="form-control" value="{{ old('distance_charge',$delivery_charge->distance_charge) }}" require>
                                    @error('distance_charge')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group" id="weight_group">
                                    <label for="weight">{{ __('levels.weight') }}</label> <span class="text-danger">*</span>
                                    <input id="weight" type="number" name="weight" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_weight') }}" autocomplete="off" class="form-control" value="{{ old('weight',$delivery_charge->weight) }}" require>
                                    @error('weight')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group" id="city_same_day">
                                    <label for="same_day">{{ __('levels.same_day') }}</label> <span class="text-danger">*</span>
                                    <input id="same_day" type="number" name="same_day" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_same_day') }}" autocomplete="off" class="form-control" value="{{ old('same_day',$delivery_charge->same_day) }}" require>
                                    @error('same_day')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group" id="city_next_day">
                                    <label for="next_day">{{ __('levels.next_day') }}</label> <span class="text-danger">*</span>
                                    <input id="next_day" type="number" name="next_day" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_next_day') }}" autocomplete="off" class="form-control" value="{{ old('next_day',$delivery_charge->next_day) }}" require>
                                    @error('next_day')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="status">{{ __('levels.status') }}</label> <span class="text-danger">*</span>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        @foreach(trans('status') as $key => $status)
                                            <option value="{{ $key }}" {{ (old('status',$delivery_charge->status) == $key) ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group" id="city_sub_city">
                                    <label for="sub_city">{{ __('levels.sub_city') }}</label> <span class="text-danger">*</span>
                                    <input id="sub_city" type="number" name="sub_city" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_sub_city') }}" autocomplete="off" class="form-control" value="{{ old('sub_city',$delivery_charge->sub_city) }}" require>
                                    @error('sub_city')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group" id="city_outside">
                                    <label for="outside_city">{{ __('levels.outside_city') }}</label> <span class="text-danger">*</span>
                                    <input id="outside_city" type="number" name="outside_city" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_outside_city') }}" autocomplete="off" class="form-control" value="{{ old('outside_city',$delivery_charge->outside_city) }}" require>
                                    @error('outside_city')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="position">{{ __('levels.position') }}</label> <span class="text-danger">*</span>
                                    <input id="position" type="number" name="position" data-parsley-trigger="change" autocomplete="off" placeholder="{{ __('placeholder.Enter_Position') }}" class="form-control" value="{{ old('position',$delivery_charge->position) }}" require>
                                    @error('position')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <button type="submit" class="btn btn-space btn-primary">{{ __('levels.save_change') }}</button>
                                <a href="{{ route('delivery-charge.index') }}" class="btn btn-space btn-secondary">{{ __('levels.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end basic form -->
    </div>
</div>
<!-- end wrapper  -->
@endsection()

@push('scripts')
    <script src="{{ static_asset('backend/js/deliveryCharge/delivery_charge.js') }}"></script>
@endpush

