@extends('backend.partials.master')
@section('title')
    {{ __('deliverycategory.title') }} {{ __('levels.edit') }}
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
                            <li class="breadcrumb-item"><a href="{{ route('delivery-category.index') }}" class="breadcrumb-link">{{ __('deliverycategory.title') }}</a></li>
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
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pageheader-title">{{ __('deliverycategory.edit_deliverycategory') }}</h2>
                    <form action="{{route('delivery-category.update')}}"  method="POST" enctype="multipart/form-data" id="basicform">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$deliverycategory->id}}">
                        
                        <div class="form-group">
                            <label for="status">{{ __('levels.type') }}</label>
                            <select name="catefory_type" class="form-control">
                                <option value="0" {{ (old('status',$deliverycategory->category_type) == 0) ? 'selected' : '' }}>{{ __('levels.city_wise') }}</option>
                                <option value="1" {{ (old('status',$deliverycategory->category_type) == 1) ? 'selected' : '' }}>{{ __('levels.distance_wise') }}</option>
                            </select>
                            @error('catefory_type')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="title">{{ __('levels.title') }}</label>	<span class="text-danger">*</span>
                            <input id="title" type="text" name="title" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_title') }}" autocomplete="off" class="form-control @error('title') is-invalid @enderror " value="{{ old('title',$deliverycategory->title) }}" require>
                            @error('title')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">{{ __('levels.status') }}</label> <span class="text-danger">*</span>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                @foreach(trans('status') as $key => $status)
                                    <option value="{{ $key }}" {{ (old('status',$deliverycategory->status) == $key) ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @error('status')
                            <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group pt-2">
                            <label for="position">{{ __('levels.position') }}</label>
                            <input id="position" placeholder="{{ __('placeholder.Enter_Position') }}" type="number" name="position" data-parsley-trigger="change" autocomplete="off" class="form-control" value="{{ old('position',$deliverycategory->position) }}" require>
                            @error('position')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <button type="submit" class="btn btn-space btn-primary">{{ __('levels.save_change') }}</button>
                                <a href="{{ route('delivery-category.index') }}" class="btn btn-space btn-secondary">{{ __('levels.cancel') }}</a>
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

