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
                            <td>{{$index +1 }}</td>
                            <td>{{$item->name}}</td>
                            @if ($item->notes)
                                <td>{{substr($item->notes,0,50)}}</td>
                            @else
                                <td>@lang('main_trans.notes')</td>
                            @endif
                            <td>
                                <button type="button" class="modal-effect btn btn-info btn-sm"
                                    data-effect="effect-scale" data-id="{{ $item->id }}" data-name_ar="{{ $item->getTranslation('name', 'ar') }}"
                                    data-name_en="{{ $item->getTranslation('name', 'en') }}" data-notes="{{ $item->notes }}"
                                    data-toggle="modal" href="#modaldemo2" title="{{ trans('grades.Edit') }}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="modal-effect btn btn-danger btn-sm"
                                    data-effect="effect-scale" data-id="{{ $item->id }}"
                                    data-toggle="modal" href="#modaldemo15" title="{{ trans('grades.Delete') }}"><i
                                        class="fa fa-trash"></i>
                                </button>
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
  @include('dashboard.grades.edit')
  @include('dashboard.grades.delete')
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    //Edit Grades
    $('#modaldemo2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name_ar = button.data('name_ar')
        var name_en = button.data('name_en')
        var notes = button.data('notes')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #grade_name_ar').val(name_ar);
        modal.find('.modal-body #grade_name_en').val(name_en);
        modal.find('.modal-body #notes').val(notes);
    })
</script>

<script>
    //Delete Grades
    $('#modaldemo15').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    })
</script>
@endsection
