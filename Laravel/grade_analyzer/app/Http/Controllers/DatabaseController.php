<?php

namespace App\Http\Controllers;


use App\Models\Teacher;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    //
    function addTeacher(Request $request)
    {
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->batch = $request->batch;
        $teacher->save();

        if ($teacher) {
            echo "New teacher added successfully";

        } else {
            echo "Operation failed";
        }
    }
    public function getTeachers()
    {
        //$teacherList = Teacher::all();
        //return ($teacherList);
        $teacherList = Teacher::paginate(5); //5 data per page

        return view('Database.getTeacher', ['teachers' => $teacherList]);
    }

    function deleteTeacher($id)
    {
        $isDeleted = Teacher::destroy($id);
        if ($isDeleted) {
            return redirect('/teacher/get');
        }
        return "Error deleting";
    }
    function updateTeacher($id)
    {
        $teacher = Teacher::find($id);
        return view('Database.updateTeacher', ['teacher' => $teacher]);

    }

    function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->batch = $request->batch;
        $isUpdated = $teacher->save();
        if ($isUpdated) {
            return redirect('/teacher/get');
        } else {
            return "Error updating";
        }
    }

    function searchTeacher(Request $request)
    {
        $teacher = Teacher::where('name', 'like', "%$request->search%")->get();
        return view('Database.getTeacher', ['teachers' => $teacher, 'search' => $request->search]);
    }
}
