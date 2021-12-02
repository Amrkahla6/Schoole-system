@extends('layouts.master')
@section('css')

@section('title')
    @lang('grades.title_page')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    @lang('main-side.schoolGrade')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
            @include('partials._errors')
            @include('partials._session')
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('grades.add_Grade') }}
            </button>
            <br><br>
          <div class="table-responsive">
            <table id="datatable" class="table p-0 table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('grades.Name')</th>
                        <th>@lang('grades.Notes')</th>
                        <th>@lang('grades.Processes')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grades as $index => $item)
                        <tr>
                            <td>{{$index }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{substr($item->notes,0,50)}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm"
                                    title="{{ trans('grades.Edit') }}"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm"
                                    title="{{ trans('grades.Delete') }}"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>@lang('grades.Name')</th>
                        <th>@lang('grades.Notes')</th>
                        <th>@lang('grades.Processes')</th>
                    </tr>
                </tfoot>

             </table>

        </div>
        </div>
      </div>
    </div>
  </div>
  @include('dashboard.grades.create')
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
