   <!-- delete_modal_Grade -->
   <div class="modal fade" id="modaldemo15" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('classrooms.delete_class') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{ route('classroom.destroy', 'test') }}" method="POST">
                   @method('DELETE')
                   @csrf
                   {{ trans('classrooms.Warning_Grade') }}
                   <input id="id" type="hidden" name="id" class="form-control" >
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"  data-dismiss="modal">{{ trans('classrooms.Close') }}</button>
                       <button type="submit" class="btn btn-danger">{{ trans('classrooms.submit') }}</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>
