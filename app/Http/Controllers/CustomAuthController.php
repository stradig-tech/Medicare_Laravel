<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class CustomAuthController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('index')->with('doctors', $doctors);
    }
    
    public function login()
    {

        return view('login');
    }

    public function registration()
    {
        return view('signup');
    }

    public function DoctorReg()
    {
        return view('DoctorReg');
    }

    public function PatientReg()
    {
        return view('PatientReg');
    }

    public function PatientRegPost(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'dob' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'nid' => 'required',
            'password' => 'required|min:3|max:12',
            'picture' => 'mimes:jpg,jpeg,png',
        ]);

        $user = new Patient();
        $file_name = null;
        if ($request->hasFile('picture')) {
            $file_name = time() . "." . $request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move(public_path('uploaded_images'), $file_name);
        }
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->nid = $request->nid;
        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->role = $request->role;
        $user->picture = $file_name;
        $result = $user->save();
        if ($result) {
            return redirect()->route('login')->with('success', 'Registration successful please Login');
        } else {
            return redirect()->route('login')->with('fail', 'Something Wrong try again');
        }
    }


    public function DoctorRegPost(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'dob' => 'required',
            'gender' => 'required',
            'qualification' => 'required',
            'specialization' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'nid' => 'required',
            'password' => 'required|min:3|max:12',
            'picture' => 'mimes:jpg,jpeg,png',
        ]);

        $user = new Doctor();
        $file_name = null;
        if ($request->hasFile('picture')) {
            $file_name = time() . "." . $request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move(public_path('uploaded_images'), $file_name);
        }
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->qualification = $request->qualification;
        $user->specialization = $request->specialization;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->nid = $request->nid;
        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->role = $request->role;
        $user->picture = $file_name;
        $result = $user->save();
        if ($result) {
            return redirect()->route('login')->with('success', 'Registration successful please Login');
        } else {
            return redirect()->route('login')->with('fail', 'Something Wrong try again');
        }
    }




    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:12'
        ]);

        $doctor = Doctor::where('email', $request->email)->first();
        $patient = Patient::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();


        if ($doctor && \Illuminate\Support\Facades\Hash::check($request->password, $doctor->password)) {
            session(['role' => 'doctor']);
            $request->session()->put('doctor', $doctor->role);
            $request->session()->put('doctor_id', $doctor->id);
            $request->session()->put('doctor_firstname', $doctor->firstname);
            $request->session()->put('doctor_lastname', $doctor->lastname);
            $request->session()->put('doctor_dob', $doctor->dob);
            $request->session()->put('doctor_email', $doctor->email);
            $request->session()->put('doctor_phone', $doctor->phone);
            $request->session()->put('doctor_address', $doctor->address);
            $request->session()->put('doctor_nid', $doctor->nid);
            $request->session()->put('doctor_gender', $doctor->gender);
            $request->session()->put('doctor_picture', $doctor->picture);
            $Did = $request->session()->get('doctor_id');
            
            return redirect('doctor/dashboard/'.$Did);
        }

        if ($patient && \Illuminate\Support\Facades\Hash::check($request->password, $patient->password)) {
            session(['role' => 'patient']);
            $request->session()->put('patient', $patient->role);
            $request->session()->put('patient_id', $patient->id);
            $request->session()->put('patient_firstname', $patient->firstname);
            $request->session()->put('patient_lastname', $patient->lastname);
            $request->session()->put('patient_dob', $patient->dob);
            $request->session()->put('patient_email', $patient->email);
            $request->session()->put('patient_phone', $patient->phone);
            $request->session()->put('patient_address', $patient->address);
            $request->session()->put('patient_nid', $patient->nid);
            $request->session()->put('patient_gender', $patient->gender);
            $request->session()->put('patient_picture', $patient->picture);
            $Pid = $request->session()->get('patient_id');
            return redirect('patient/dashboard');
        }

        if ($admin && \Illuminate\Support\Facades\Hash::check($request->password, $admin->password)) {
            session(['role' => 'admin']);
            $request->session()->put('admin', $admin->role);
            $request->session()->put('admin_id', $admin->id);
            $request->session()->put('admin_firstname', $admin->firstname);
            $request->session()->put('admin_lastname', $admin->lastname);
            $request->session()->put('admin_dob', $admin->dob);
            $request->session()->put('admin_email', $admin->email);
            $request->session()->put('admin_phone', $admin->phone);
            $request->session()->put('admin_address', $admin->address);
            $request->session()->put('admin_nid', $admin->nid);
            $request->session()->put('admin_gender', $admin->gender);
            $request->session()->put('admin_picture', $admin->picture);
            $Aid = $request->session()->get('admin_id');
            return redirect('admin/dashboard');
        }

        else{
            return back()->with('fail', 'Incorrect email or Password');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}






//  public function loginUser(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required|min:3|max:12'
//         ]);


//     $user = Doctor::where('email', '=', $request->email)->first() && Patient::where('email', '=', $request->email)->first();


//         if ($user) {
//             if ($request->password == $user->password) {
//                 if ($user->role == 'doctor') {
//                     $request->session()->put('Customer', $user->role);
//                     $request->session()->put('CUname', $user->firstname);
//                     return redirect('doctor');
//                 } elseif ($user->role == 'patient') {
//                     return redirect('patient');
//                 } else {
//                     $request->session()->put('Admin', $user->role);
//                     $request->session()->put('email', $user->email);
//                     return redirect(route('admin dashboard'));
//                 }
//             } else {

//                 return back()->with('fail', 'Incorrect Password');
//             }
//         } else {
//             return back()->with('fail', 'this email is not registered');
//         }
//     }
// }


// public function loginUser(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required|min:3|max:12'
//         ]);


//     $user = User::where('email', '=', $request->email)->first();

//         if ($user) {
//             if ($request->password == $user->password) {
//                 if ($user->role == 'doctor') {
//                     $request->session()->put('Customer', $user->role);
//                     $request->session()->put('CUname', $user->firstname);
//                     return redirect('doctor');
//                 } elseif ($user->role == 'user') {
//                     return redirect('dashboard_renter');
//                 } else {
//                     $request->session()->put('Admin', $user->role);
//                     $request->session()->put('email', $user->email);
//                     return redirect(route('admin dashboard'));
//                 }
//             } else {

//                 return back()->with('fail', 'Incorrect Password');
//             }
//         } else {
//             return back()->with('fail', 'this email is not registered');
//         }
//     }
// }
