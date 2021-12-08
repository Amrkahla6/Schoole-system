<?php

namespace App\Http\Controllers\Dashboard\Grade;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Grades\StoreGradeRequest;
use App\Http\Requests\Grades\updateGradeRequest;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $grades = Grade::latest()->get();
    return view('dashboard.grades.index',compact('grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGradeRequest $request)
  {
    try {
        $validated = $request->validated();
        $Grade = new Grade();
        /*
        $translations = [
            'en' => $request->Name_en,
            'ar' => $request->Name
        ];
        $Grade->setTranslations('Name', $translations);
        */
        $Grade->name = ['en' => $request->name_en, 'ar' => $request->name];
        $Grade->notes = $request->notes;
        $Grade->save();
        session()->flash('success', __('messages.success'));
        return redirect()->route('grades.index');
    }

    catch (\Exception $e){
        session()->flash('error', __('messages.error'));
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);

  }
}

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(updateGradeRequest $request)
  {
    try {
        $validated = $request->validated();
        $grade = Grade::find($request->id);
        $grade->update([
          'name'   => ['en' => $request->name_en, 'ar' => $request->name],
          'notes'  => $request->notes,
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
      $class_id = Classroom::where('grade_id',$id)->pluck('grade_id');
      if($class_id->count() == 0){
          Grade::findOrFail($id)->delete();
          session()->flash('error', __('messages.Delete'));
          return redirect()->back();
      }else{
        session()->flash('error', __('grades.delete_Grade_Error'));
        return redirect()->back();
      }
  }

}

?>
