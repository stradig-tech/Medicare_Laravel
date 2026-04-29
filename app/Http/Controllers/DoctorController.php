<?php

namespace App\Http\Controllers;


use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class DoctorController extends Controller
{

        public function dashboard (request $request, $Did)
        {
                $doctor = Doctor::find($Did);
                $appointment = Appointment::where('doctorid', $Did)->get();
                $patientlist = Appointment::where('doctorid', $Did)->get();
                $sendlink = Appointment::where('doctorid', $Did)->get();
                $prescription = Appointment::where('doctorid', $Did)->get();
                $Did = $request->session()->get('doctor_id');

                $appointmentcount = DB::table('appointments')->where('doctorid', $Did)->count();
                $patientcount = DB::table('appointments')->where('doctorid', $Did)->count();
                $meetingcount = DB::table('appointments')->where('doctorid', $Did)->where('appointmentstatus', 1)->count();
                $prescriptioncount = DB::table('appointments')->where('doctorid', $Did)->where('appointmentstatus', 1)->count();

                return view('Doctor.doctor', [
                        'doctor' => $doctor,
                        'appointment'=>$appointment,
                        'patientlist'=>$patientlist,
                        'sendlink'=>$sendlink,
                        'prescription'=>$prescription,
                        'appointmentcount'=>$appointmentcount,
                        'patientcount'=>$patientcount,
                        'meetingcount'=>$meetingcount,
                        'prescriptioncount'=>$prescriptioncount
                ]);
        }

        public function DoctorsList()
        {
                $doctors = Doctor::all();
                return view('showdoctors')->with('doctors', $doctors);
        }

        public function approve($id)
        {
                $appointment = Appointment::find($id);

                if ($appointment) {
                        $appointment->update([
                                'appointmentstatus' => 1,
                        ]);

                        return redirect()->back()->with('success', 'Appointment approved successfully!');
                }

                return redirect()->back()->with('error', 'Appointment not found');
        }


        public function delete(Request $request , $id)
        {
                $Did = $request->session()->get('doctor_id');
                $appointment = Appointment::find($id);
                $appointment->delete();

                return redirect('doctor/dashboard/' . $Did)->with('success', 'Appointment Deleted successfully');
        }

        public function sendmessage(Request $request)
        {
                $appointment = Appointment::where('id','=',$request->appointmentid)->first();
                $Did = $request->session()->get('doctor_id');
                $doctor=Doctor::find($Did);

                if (!$appointment) {
                        return redirect()->back()->with('error', 'Appointment not found');
                }

                if ($appointment->appointmentstatus === 1) {
                        $message = new Message();
                        $message->appointmentid = $appointment->id;
                        $message->doctorid = $appointment->doctorid;
                        $message->doctorname = $appointment->doctorname;
                        $message->patientid = $appointment->patientid;
                        $message->patientname = $appointment->patientname;
                        $message->doctorpicture = $doctor->picture;
                        $message->message = $request->message;
                        $result = $message->save();
                        if ($result) {
                                return redirect('doctor/dashboard/'.$Did)->with('success', 'Message sent successfully');
                        }    

                } else {
                        return redirect()->back()->with('fail', 'Cannot send message for pending appointment');
                }   
               
        }

        public function prescription($id){
               
               
                $appointment = Appointment::where('id', '=', $id)->first();
                
           
                return view('Doctor.prescription',[
                    
                        'appointment'=>$appointment
                ]);

        }

        public function SendPrescription(Request $request)
        {
                $Did = $request->session()->get('doctor_id');

                $prescription = new Prescription();
                $prescription->doctorid = $request->doctorid;
                $prescription->doctorname = $request->doctorname;
                $prescription->patientid = $request->patientid;
                $prescription->patientname = $request->patientname;
                $prescription->patientpicture = $request->patientpicture;
                $prescription->appointmentid = $request->appointmentid;
                $prescription->medicine = $request->medicine;
                $prescription->test = $request->test;
                $prescription->suggestion = $request->suggestion;
                $result = $prescription->save();
                if ($result) {
                        return redirect('doctor/dashboard/' . $Did)->with('success', 'prescription sent successfully');
                }  
                else{
                        echo"goamara";
                }    
        }
        public function DoctorProfile(Request $request, $id)
        {

                $doctor = Doctor::find($id);
                $patientid = $request->session()->get('patient_id');




                return view(
                        'Doctor.doctorProfile',
                        [
                                'patientid' => $patientid,

                                'doctor' => $doctor
                        ]
                );
        }

        public function DoctorEditProfile($id)
        {
                $doctor = Doctor::findOrFail($id);
                return view(
                        'Doctor.doctorEditProfile',
                        [
                                'doctor' => $doctor
                        ]
                );
        }

        public function doctorUpdateProfile(Request $request, $id)
        {
                $Did = $request->session()->get('doctor_id');

                $doctor = Doctor::findOrFail($id);
                $doctor->firstname = $request->input('firstname');
                $doctor->lastname = $request->input('lastname');
                $doctor->phone = $request->input('phone');
                $doctor->address = $request->input('address');
                $doctor->dob = $request->input('dob');
                $doctor->nid = $request->input('nid');
                if ($request->hasFile('picture')) {
                        $picture = $request->file('picture');
                        $filename = time() . '.' . $picture->getClientOriginalExtension();
                        $picture->move(public_path('uploaded_images'), $filename);
                        $doctor->picture = $filename;
                }


                $doctor->save();

                return redirect('doctor/dashboard/' . $Did)->with('success', 'profile updated  successfully');
        }

}
