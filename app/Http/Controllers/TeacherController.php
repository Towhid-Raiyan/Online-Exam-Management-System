<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Exam;


class TeacherController extends Controller
{

    // Add SUbject Method
    public function addSubject(Request $request)
    {
        try{
            Subject::insert([
                'subject' => $request->subject
            ]);

            return response()->json(['success'=>true,'msg'=>'Subject added Successfully!']);

        }catch(\Exception $e)
        {
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        };
    }

    // Edit SUbject Method

    public function editSubject(Request $request)
    {
        try{
            
            $subject = Subject::find($request->id);
            $subject->subject = $request->subject;
            $subject -> save();
            return response()->json(['success'=>true,'msg'=>'Subject updated Successfully!']);

        }catch(\Exception $e)
        {
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        };
    }

     // Delete SUbject Method

     public function deleteSubject(Request $request)
     {
         try{
             
              Subject::where( 'id',$request->id)->delete();
             return response()->json(['success'=>true,'msg'=>'Subject deleted Successfully!']);
 
         }catch(\Exception $e)
         {
             return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
 
         };
     }

     // Exam dashboard load

     public function examDashboard()
     {
        $subjects = Subject::all();
        $exams = Exam::with('subjects')->get();
        return view('teacher.exam-dashboard',['subjects'=>$subjects,'exams'=>$exams]);
     }

     //addexam

     public function addExam(Request $request)
     {
        try{
             
            Exam::insert([
                'exam_name' => $request->exam_name,
                'subject_id' => $request->subject_id,
                'date' => $request->date,
                'time' => $request->time

            ]);
           return response()->json(['success'=>true,'msg'=>'Subject added Successfully!']);

       }catch(\Exception $e)
       {
           return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
       };
     }

     // delete exam

     public function deleteExam(Request $request)
     {
         try{
             
              Subject::where( 'id',$request->exam_id)->delete();
             return response()->json(['success'=>true,'msg'=>'Exam deleted Successfully!']);
 
         }catch(\Exception $e)
         {
             return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
 
         };
     }



}
