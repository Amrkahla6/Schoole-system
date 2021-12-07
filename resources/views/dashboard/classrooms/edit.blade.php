   <!-- edit_modal_Grade -->
   <div class="modal fade" id="modaldemo2" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('classrooms.edit_class') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- edit_form -->
               <form action="classroom/update" method="POST">
                   @method('PUT')
                   @csrf
                   <div class="row">
                       <div class="col">
                           <label for="Name"  class="mr-sm-2">{{ trans('classrooms.Name_class') }} :</label>
                           <input id="class_name_ar" type="text" name="name"class="form-control" required>
                           <input id="id" type="hidden" name="id" class="form-control">
                       </div>
                       <div class="col">
                           <label for="name_en"  class="mr-sm-2">{{ trans('classrooms.Name_class_en') }} :</label>
                           <input type="text" id="class_name_en" class="form-control" name="name_en" required>
                       </div>
                   </div><br>
                   <div class="form-group">
                       <label
                           for="exampleFormControlTextarea1">{{ trans('classrooms.Name_Grade') }}
                           :</label>
                       <select class="form-control form-control-lg" id="grade_id" name="grade_id">
                        <option value="" selected></option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach

                       </select>

                   </div>
                   <br><br>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">{{ trans('grades.Close') }}</button>
                       <button type="submit"
                               class="btn btn-success">{{ trans('grades.submit') }}</button>
                   </div>
               </form>

           </div>
       </div>
   </div>
</div>
