<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function Appointment(Request $request, $id)
    {
        $patientid = $request->session()->get('patient_id');
        $patient = Patient::findOrFail($patientid);
        $doctor = Doctor::findorfail($id);

        return view('Patient.appointment', 
        [
           'doctor'=>$doctor,
           'patient'=>$patient
        ]);
    }

    public function CreateAppointment(Request $request)
    {
       

        $appointment = new Appointment();
        $appointment->doctorid = $request->doctorid;
        $appointment->doctorname = $request->doctorname;
        $appointment->specialization = $request->specialization;
        $appointment->patientid = $request->patientid;
        $appointment->patientname = $request->patientname;
        $appointment->patientaddress = $request->patientaddress;
        $appointment->patientphone = $request->patientphone;
        $appointment->patientgender = $request->patientgender;
        $appointment->patientpicture = $request->patientpicture;
        $appointment->appointmentdate = $request->appointmentdate;
        $result = $appointment->save();
        if ($result) {
            return redirect()->route('patient/dashboard')->with('success', 'Appointment placed successfully');
        } else {
            return redirect()->route('patient/dashboard')->with('fail', 'Something Wrong try again');
        }
    }

    public function  AppointmentHistory($id)
    {
        
        $patient = Patient::find($id);
        $appointment = Appointment::where('patientid', $id)->get();

        return view(
            'Patient.appointmenthistory',
            [
                'appointment' => $appointment,
                'patient' => $patient,
                
            ]
        );
    }
}
