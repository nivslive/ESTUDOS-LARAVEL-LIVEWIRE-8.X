<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherConfirmationController extends Controller
{
    public function index($teacher, $student)
    {
        $teacher = User::where('hash_id', $teacher)->first();
        $student = User::where('hash_id', $student)->first();

        $teacher = Teacher::where([
            'teacher_id'=> $teacher->id,
            'student_id'=> $student->id
        ])->first();

        if($teacher->status == 1) {
            return redirect('login')->withError('already_confirmed', 'You already accepted '.$student->fullname.'\'s request');
        }

        $teacher->update([
            'status' => 1
        ]);

        return redirect('/login')->with('confirmation_success', 'You are now '.$student->fullname.'\'s teacher');
    }
}
