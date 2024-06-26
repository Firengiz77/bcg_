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


@endsection
@section('filter')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{Form::open(array('url'=>'admin/service','method'=>'post','enctype'=>'multipart/form-data'))}}
                <div class="d-flex justify-content-end">

                </div>
                <div class="card-body table-border-style">

                    <div class="row">


                        <div class='col-12'><div class='form-group'>{{ Form::label('name', __('name'), array('class' => 'form-label')) }}{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => __('Enter name'), 'required' => 'required')) }}</div></div>
<div class='col-12'><div class='form-group'>{{ Form::label('desc', __('desc'), array('class' => 'form-label')) }}{{ Form::textarea('desc', null, array('class' => 'form-control  summernote-simple nicEdit', 'placeholder' => __('Enter desc'), 'required' => 'required')) }}</div></div>
<div class='col-12'> <div class='form-group'><label for='image' class='col-form-label'>Şəkil</label><input type='file' name='image' id='blog_cover_image' class='form-control' onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'><img id='imageImg' src='' width='20%' class='mt-2'/></div></div>



<div class="form-group col-md-12">
                                <div class="custom-fields" data-value="">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h5 class="">{{ __('Attributes') }}</h5>
                                            <label class="form-check-label pe-5 text-muted"
                                                for="enable_chat">{{ __('You can easily change order of fields using drag & drop.') }}</label>
                                        </div>
                                        <button data-repeater-create type="button"
                                            class="btn btn-sm btn-primary btn-icon m-1 float-end ms-2" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="{{ __('Create Custom Field') }}">
                                            <i class="ti ti-plus mr-1"></i>
                                        </button>
                                    </div>
                                    <div class="card-body table-border-style">
                                            @csrf
                                            <div class="table-responsive m-0 custom-field-table">

                                                <table class="table dataTable-table" id="pc-dt-simple"
                                                    data-repeater-list="fields">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th></th>
                                                            <th>{{ __('Image') }}</th>
                                                            <th>{{ __('Key') }}</th>
                                                            <th>{{ __('Value') }}</th>

                                                            <th class="text-right">{{ __('Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr data-repeater-item>
                                                            <td><i class="ti ti-arrows-maximize sort-handler"></i></td>
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



                        <div class="form-group col-12 d-flex justify-content-end col-form-label">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-light"
                                   data-bs-dismiss="modal">
                            <input type="submit" value="{{__('Save')}}" class="btn btn-primary ms-2">
                        </div>

                    </div>
                </div>
                {{Form::close()}}
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
