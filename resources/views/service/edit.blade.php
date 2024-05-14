@php($store_logo=\App\Models\Utility::get_file('uploads/service_cover_image/'))
@extends('layouts.admin')
@section('page-title')
    {{ __('Service') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Service') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Service') }}</li>
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
@endpush
@push('script-page')
    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
@endpush
@section('action-btn')
    <ul class="nav nav-pills cust-nav   rounded  mb-3" id="pills-tab" role="tablist">
        @foreach (\App\Models\Utility::languages() as $code => $lang)
            @if ($loop->first)
                <li class="nav-item">
                    <a class="nav-link active" id="{{$code}}_setting_tab" data-bs-toggle="pill" href="#pills-{{$code}}"
                       role="tab" aria-controls="pills-{{$code}}" aria-selected="true">{{ __(ucFirst($lang)) }}</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" id="{{$code}}_setting_tab" data-bs-toggle="pill" href="#pills-{{$code}}"
                       role="tab" aria-controls="pills-{{$code}}" aria-selected="false">{{ __(ucFirst($lang)) }}</a>
                </li>
            @endif

        @endforeach
    </ul>

@endsection
@section('filter')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content" id="pills-tabContent">

                @foreach (\App\Models\Utility::languages() as $code => $lang)
                    <div class="tab-pane fade {{$loop->first?"active show":""}}" id="pills-{{$code}}" role="tabpanel"
                         aria-labelledby="pills-{{$code}}-tab">
                        {{Form::model($service, array('route' => array('service.update', $service->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
                        <input type="hidden" name="lang" value="{{$code}}">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="">
                                    {{ __('Section') }} 1 - {{ __(ucFirst($lang)) }}
                                </h5>
                            </div>
                            <div class="card-body table-border-style">

                                <div class="d-flex justify-content-end">

                                </div>
                                <div class="row">




<div class='col-12'>
<div class='form-group'>
{{ Form::label('name', __('name'), array('class' => 'form-label')) }}
{{ Form::text('name', $service->getTranslation('name', $code), array('class' => 'form-control', 'placeholder' => __('Enter name'), 'required' => 'required')) }}
</div>
</div>


<div class='col-12'>
<div class='form-group'>
{{ Form::label('desc', __('desc'), array('class' => 'form-label')) }}
{{ Form::textarea('desc', $service->getTranslation('desc', $code), array('class' => 'form-control  summernote-simple nicEdit', 'placeholder' => __('Enter desc'), 'required' => 'required')) }}
</div>
</div>



<div class='col-12'>
<div class='form-group'>
<label for='image' class='col-form-label'>Şəkil</label>
<input type='file' name='image' id='blog_cover_image' class='form-control' onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'>
<img src='/public/{{$service->image}}' width='200' class='mt-2'/>
<img id='imageImg' src='' width='20%' class='mt-2'/>
</div>
</div>

<div class="card form-group col-md-12">
                                <div class="custom-fields" >
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h5 class="">{{ __('Attributes') }}</h5>

                                        </div>
                                        <button data-repeater-create type="button"
                                            class="btn btn-sm btn-primary btn-icon m-1 float-end ms-2" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="{{ __('Create Custom Field') }}">
                                            <i class="ti ti-plus mr-1"></i>
                                        </button>
                                    </div>
                                    <div class="card-body table-border-style">
                                            @csrf
                                            <div class="table-responsive custom-field-table">

                                                <table class="table dataTable-table" id="pc-dt-simple"
                                                    data-repeater-list="fields">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>{{ __('Image') }}</th>
                                                            <th>{{ __('Key') }}</th>
                                                            <th>{{ __('Value') }}</th>

                                                            <th class="text-right">{{ __('Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        @foreach ($service->attribute as $key => $attribute )
                                                     
                                                        <tr >
                                                            <td>
                                                           <div style="display:flex">
                                                             <input type="file"  name="attribute[{{$key}}][image]"  class="form-control mb-0">
                                                                <img src="/public/{{ $attribute->image }}" alt="" width="80px">
                                                           </div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" class="id" name="attribute[{{$key}}][id]"  value="{{$attribute->id}}" />

                                                                <input type="text" name="attribute[{{$key}}][key]" value="{{ $attribute->getTranslation('key', $code) }}" class="form-control mb-0"
                                                                    required />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="attribute[{{$key}}][value]"
                                                                    class="form-control mb-0"  value="{{$attribute->getTranslation('value', $code)}}" required />
                                                            </td>


                                                            <td class="text-center">
                                                              
                                                                <a href="{{route('projectattribute.destroy',$attribute->id)}}" class="delete-icon"><i
                                                                        class="fas fa-trash text-danger"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                        <tr data-repeater-item>
                                                        <td>
                                                                <input type="file" required name="image" id="" class="form-control mb-0">
                                                            </td>

                                                            <td>

                                                                <input type="text" name="key" class="form-control mb-0"
                                                                    required />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="value"
                                                                    class="form-control mb-0" required />
                                                            </td>


                                                            <td class="text-center">
                                                                <a data-repeater-delete class="delete-icon"><i
                                                                        class="fas fa-trash text-danger"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                    </div>


                                </div>
                            </div>
                            




                                </div>
                                <div class="form-group col-12 d-flex justify-content-end col-form-label">
                                    <input onclick="history.back()" type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light"
                                           data-bs-dismiss="modal">
                                    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
                                </div>
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('script-page')

<script src="{{ asset('/public/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/public/js/repeater.js') }}"></script>


<script>

    // $(document).on('change','.SITE_RTL',function(){
    //     $()
    // });
    $(document).ready(function() {
        var $dragAndDrop = $("body .custom-fields tbody").sortable({
            handle: '.sort-handler'
        });

        var $repeater = $('.custom-fields').repeater({
            initEmpty: true,
            defaultValues: {},
            show: function() {
                $(this).slideDown();

                console.log(this.deyer);
                var eleId = $(this).find('input[type=hidden]').val();
                if (eleId > 7 || eleId == '') {
                    $(this).find(".field_type option[value='file']").remove();
                    $(this).find(".field_type option[value='select']").remove();
                }
            },
            hide: function(deleteElement) {
                if (confirm('{{ __('Are you sure ? ') }}')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function(setIndexes) {
                $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: true
        });

        var value = $(".custom-fields").attr('data-value');
        if (typeof value != 'undefined' && value.length != 0) {
            value = JSON.parse(value);
            $repeater.setList(value);
        }

        $.each($('[data-repeater-item]'), function(index, val) {
            var elementId = $(this).find('input[type=hidden]').val();
            if (elementId <= 7) {
                $.each($(this).find('.field_type'), function(index, val) {
                    $(this).prop('disabled', 'disabled');
                });
                $(this).find('.delete-icon').remove();
            }
        });
    });
</script>

    <script>
        $(document).ready(function () {
            $(document).on('keyup', '.search-user', function () {
                var value = $(this).val();
                $('.employee_tableese tbody>tr').each(function (index) {
                    var name = $(this).attr('data-name').toLowerCase();
                    if (name.includes(value.toLowerCase())) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
@endpush
