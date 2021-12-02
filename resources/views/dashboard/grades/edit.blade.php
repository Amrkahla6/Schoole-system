<!-- add_modal_Grade -->
<div class="modal fade" id="modaldemo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="modaldemo2">
                    {{ trans('grades.edit_Grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="grades/update" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="id" id="id">
                            <label for="Name" class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                                :</label>
                            <input id="grade_name_ar" type="text" name="name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                                :</label>
                            <input type="text" id="grade_name_en" class="form-control" name="name_en" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('grades.Notes') }}
                            :</label>
                        <textarea class="form-control" name="notes" id="notes"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('grades.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('grades.submit') }}</button>
            </div>
            </form>

        </div>
    </div>
</div>

