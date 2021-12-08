
<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classrooms.add_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="row mb-30" action="{{route('classroom.store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="listClasses">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                               {{-- <label for="Name"
                                                    class="mr-sm-2">{{ trans('classrooms.Name_class') }}
                                                :</label> --}}
                                            <input class="form-control" type="text" placeholder="{{ trans('classrooms.Name_class')}}" name="name"  />
                                        </div>


                                        <div class="col">
                                            {{-- <label for="Name"
                                                class="mr-sm-2">{{ trans('classrooms.Name_class_en') }}
                                            :</label> --}}
                                            <input class="form-control" type="text" placeholder="{{ trans('classrooms.Name_class_en')}}" name="name_en" />
                                        </div>


                                        <div class="col">
                                                {{-- <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('classrooms.Name_Grade') }}
                                                :</label> --}}

                                            <div class="box">
                                                <select class="fancyselect" name="grade_id" >
                                                    <option value="" selected disabled>@lang('classrooms.chooseGrade')</option>
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                                {{-- <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('classrooms.Processes') }}
                                                :</label> --}}
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('classrooms.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-20 row">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('classrooms.add_row') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('grades.Close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('grades.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>
</div>
