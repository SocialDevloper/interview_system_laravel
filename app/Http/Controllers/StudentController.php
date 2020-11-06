<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(request()->ajax())
        {
            return datatables()->of(Student::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('student.students');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email:dns|unique:students,email',
            'password' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric',
            'phone_number' => 'nullable|numeric',
            'birth_date' => 'required|date',
            'hobby' => 'required',
            'cource' => 'required',
            'image' => 'nullable|image|max:2048'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $new_name = "dummy.jpg";
        if($request->hasFile('image'))
        {
            $image = $request->file('image');

            $new_name = rand() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('stud_images'), $new_name);          
        }

        $form_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'birth_date' => date("Y-m-d", strtotime($request->birth_date)),
            'hobbies' => implode(",", $request->hobby),
            'address' => $request->address,
            'cource' => $request->cource,
            'image' =>  $new_name
        );

        Student::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        if(request()->ajax())
        {
            $data = Student::findOrFail($student->id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
                'name' => 'required',
                'email' => 'required|email:dns|unique:students,email,'.$request->hidden_id,
                'gender' => 'required',
                'age' => 'required|numeric',
                'phone_number' => 'nullable|numeric',
                'birth_date' => 'required|date',
                'hobby' => 'required',
                'cource' => 'required',
                'image' => 'nullable|image|max:2048'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('stud_images'), $image_name);
        }
        else
        {
            $rules = array(
                'name' => 'required',
                'email' => 'required|email:dns|unique:students,email,'.$request->hidden_id,
                'gender' => 'required',
                'age' => 'required|numeric',
                'phone_number' => 'nullable|numeric',
                'birth_date' => 'required|date',
                'hobby' => 'required',
                'cource' => 'required'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'birth_date' => date("Y-m-d", strtotime($request->birth_date)),
            'hobbies' => implode(",", $request->hobby),
            'address' => $request->address,
            'cource' => $request->cource,
            'image' => $image_name
        );
        Student::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::findOrFail($id);
        $data->delete();
    }
}
