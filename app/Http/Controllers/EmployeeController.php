<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:employees,email',
            'password' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric',
            'salary' => 'nullable|numeric',
            'birth_date' => 'required|date',
            'hobby' => 'required',
            'city' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $filename = sprintf('profile_%s.jpg', random_int(1, 1000));
        if($request->hasFile('image'))
        {
            $filename = $request->file('image')->storeAs('profiles', $filename, 'public');     
        }
        else
        {
            $filename = "profiles/dummy.jpg";
        }


        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->gender = $request->gender;
        $employee->age = $request->age;
        $employee->salary = $request->salary;
        $employee->birth_date = $request->birth_date;
        $employee->hobbies = implode(",", $request->hobby);
        $employee->address = $request->address;
        $employee->city = $request->city;
        $employee->image = $filename;

        $result = $employee->save();

        if($result)
        {
            return redirect()->route('employees.index')->with('success','Employee created successfully.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employee = Employee::find($employee->id);
        return view('employee.create', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'gender' => 'required',
            'age' => 'required|numeric',
            'salary' => 'nullable|numeric',
            'birth_date' => 'required|date',
            'hobby' => 'required',
            'city' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $filename = sprintf('profile_%s.jpg', random_int(1, 1000));
        if($request->hasFile('image'))
        {
            $filename = $request->file('image')->storeAs('profiles', $filename, 'public');     
        }
        else
        {
            $filename = $employee->image;
        }

        $employee = Employee::find($employee->id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->age = $request->age;
        $employee->salary = $request->salary;
        $employee->birth_date = $request->birth_date;
        $employee->hobbies = implode(",", $request->hobby);
        $employee->address = $request->address;
        $employee->city = $request->city;
        $employee->image = $filename;

        $result = $employee->save();

        if($result)
        {
            return redirect()->route('employees.index')->with('success','Employee updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if($employee->delete()){
            return redirect()->route('employees.index')->with('success','Employee deleted successfully.');
        }
    }
}
