<?php

namespace App\Http\Controllers\Dashboard\Classroom;

use Validator;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Classes\StoreRequest;
use App\Http\Requests\Classes\UpdateRequest;

class ClassroomController extends Controller
{
    public function index(){
        $classes = Classroom::latest()->get();
        $grades  = Grade::select('id','name')->get();
        return view('dashboard.classrooms.index',compact(['classes','grades']));
    }

    public function store(StoreRequest $request){

        try {
            $validated = $request->validated();
            //Save Request Array in variable
            $listClasses = $request->listClasses;

            foreach ($listClasses as $key => $classe) {
                $myclass = new Classroom;
                $myclass->name = ['en' => $classe['name_en'], 'ar' => $classe['name']];
                $myclass->grade_id = $classe['grade_id'];
                $myclass->save();
            }

            session()->flash('success', __('messages.success'));
            return redirect()->route('classroom.index');

        } catch (\Exception $e){
            session()->flash('error', __('messages.error'));
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

      }
    }

    public function update(UpdateRequest $request){
        try {
            $validated = $request->validated();
            $class = Classroom::find($request->id);
            $class->update([
              'name'      => ['en' => $request->name_en, 'ar' => $request->name],
              'grade_id'  => $request->grade_id,
          ]);

          session()->flash('success', __('messages.Update'));
          return redirect()->back();
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id)
  {
    $id = $request->id;
    Classroom::findOrFail($id)->delete();
    session()->flash('error', __('messages.Delete'));
    return redirect()->back();
  }
}
