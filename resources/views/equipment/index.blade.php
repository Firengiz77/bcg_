
@extends('layouts.admin')
@section('page-title')
    {{ __('Equipment') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Equipment') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Equipment') }}</li>
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
@endpush
@push('script-page')
    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
@endpush
@section('action-btn')
    <a href="{{ route('equipment.create') }}" class="btn btn-sm btn-icon  btn-primary me-2 text-white"  data-title="{{ __('Create New Equipment') }}"  data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Create') }}">
        <i  data-feather="plus"></i>
    </a>
@endsection
@section('filter')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable">
                            <thead>
                                <tr>

                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Title') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th class="text-right">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipments as $equipment)
                                    <tr data-name="{{ @$equipment->title }}">


                                    <td>{{ $equipment->name}}</td>
                                    <td>{{ $equipment->title }}</td>

                                        <td>
                                            {{ \App\Models\Utility::dateFormat($equipment->created_at) }}
                                        </td>


                                        <td class="Action">
                                            <div class="d-flex">
                                            <a href="{{ route('equipmentimage.index', $equipment->id) }}" class="btn btn-sm btn-icon  bg-light-secondary me-2"  data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Image') }}">
                                                    <i  class="ti ti-photo-edit f-20"></i>
                                                </a>

                                                <a href="{{ route('equipment.edit', $equipment->id) }}" class="btn btn-sm btn-icon  bg-light-secondary me-2"  data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Edit') }}">
                                                    <i  class="ti ti-edit f-20"></i>
                                                </a>
                                                    <a class="bs-pass-para btn btn-sm btn-icon bg-light-secondary" href="#"
                                                        data-title="{{ __('Delete Lead') }}"
                                                        data-confirm="{{ __('Are You Sure?') }}"
                                                        data-text="{{ __('This action can not be undone. Do you want to continue?') }}"
                                                        data-confirm-yes="delete-form-{{ $equipment->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Delete') }}">
                                                        <i class="ti ti-trash f-20"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['equipment.destroy', $equipment->id], 'id' => 'delete-form-' . $equipment->id]) !!}
                                                    {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.search-user', function() {
                var value = $(this).val();
                $('.employee_tableese tbody>tr').each(function(index) {
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
