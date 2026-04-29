<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Healthpackages;
use App\Models\Payment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $totalprice = Payment::sum('price');
        $totaldoctor = Doctor::count();
        $totalpatient = Patient::count();
        $totalappointment = Appointment::count();
        return view ('Admin.Admin',[
            'totalprice'=>$totalprice,
            'totaldoctor'=>$totaldoctor,
            'totalpatient'=>$totalpatient,
            'totalappointment'=>$totalappointment
        ]);
    }

    public function CreatepackageView(){
        return view(
            'Admin.createpackage'
        );
    }


    public function CreatepackagePost(Request $request){

        $request->validate([

            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $package = new Healthpackages();
        $package->name = $request->name;
        $package->type = $request->type;
        $package->description = $request->description;
        $package->price = $request->price;

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('uploaded_images'), $filename);
            $package->picture = $filename;
        }

        $result = $package->save();

        if ($result) {
            return redirect()->route('admin/dashboaard')->with('success', 'success');
        } else {
            return redirect()->route('admin/dashboaard')->with('fail', 'Something Wrong try again');
        }
    }


    public function ViewpackageGet(){
        $package = Healthpackages::all();
        return view('Admin.packagelist',[
            'package'=>$package
        ]);
    }
    public function EditpackageGet(Request $request, $id){
        $package = Healthpackages::findOrFail($id);
        return view('Admin.editpackage',[
            'package'=>$package
        ]);
    }


    public function Updatepackage(Request $request, $id){

        $package = Healthpackages::find($id);
        $package->name = $request->input('packagename');
        $package->price = $request->input('price');
        $package->type = $request->input('type');
        $package->description = $request->input('description');
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('uploaded_images'), $filename);
            $package->picture = $filename;
        }
        $package->save();
        
        return redirect()->route('admin/dashboard')->with('success', 'Package updated successfully');
    }

    public function Deletepackage($id)
    {
        
        $package = Healthpackages::find($id);
        $package->delete();

        return redirect()->route('admin/dashboard')->with('success', 'appointment Deleted successfully');
    }

    public function earninghistory()
    {
        $payment = Payment::all();

        return view(
            'Admin.earninghistory',
            [
                'payment' => $payment,
                
            ]
        );
    }

    public function showpatient()
    {
        $patient = Patient::all();

        return view(
            'Admin.Viewpatients',
            [
                'patient' => $patient,
                
            ]
        );
    }
    public function showdoctor()
    {
        $doctor = Doctor::all();

        return view(
            'Admin.Viewdoctors',
            [
                'doctor' => $doctor,
                
            ]
        );
    }
    public function showappointment()
    {
        $appointment = Appointment::all();

        return view(
            'Admin.ViewAppointments',
            [
                'appointment' => $appointment,
                
            ]
        );
    }

    public function getadmin()
    {
        return view(
            'Admin.AdminSignup'
        );
    }

    public function postadmin(Request $request)
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

        $user = new Admin();
        $file_name = time() . "." . $request->file('picture')->getClientOriginalExtension();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->nid = $request->nid;
        $user->password = $request->password;
        $user->role = $request->role;
        $request->file('picture')->move(public_path('uploaded_images'), $file_name);
        $user->picture = $file_name;
        $result = $user->save();
        if ($result) {
            return redirect()->route('login')->with('success', 'Registration successful please Login');
        } else {
            return redirect()->route('login')->with('fail', 'Something Wrong try again');
        }
    }
    public function contactus(Request $request)
    {
       
        $user = new Contact();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date = $request->date;
        $user->message = $request->message;
        $result = $user->save();
        if ($result) {
            return redirect()->route('login')->with('success', 'Our executives will reach you soon. For now please Login');
        } else {
            return redirect()->route('login')->with('fail', 'Something Wrong try again');
        }
    }

    public function showcontact()
    {
        $patient = Contact::all();

        return view(
            'Admin.contactUs',
            [
                'patient' => $patient,

            ]
        );
    }
}
