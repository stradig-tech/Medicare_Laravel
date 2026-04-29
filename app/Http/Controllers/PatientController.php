<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\Healthpackages;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PDF;

class PatientController extends Controller
{
    public function PatientDashboard(Request $request)
    {
      
        $package = Healthpackages::all();
        $doctors = Doctor::all();
        $patientid = $request->session()->get('patient_id');
        $datacount = DB::table('messages')->where('patientid', $patientid)->count();

        return view('Patient.patient', [

            'doctors' => $doctors,
            'patientid' => $patientid,
            'package' => $package,
            'datacount' => $datacount

        ]);
    }

    public function PatientProfile(Request $request, $id)
    {

        $patient = Patient::find($id);
        $patientid = $request->session()->get('patient_id');




        return view(
            'Patient.patientProfile',
            [
                'patientid' => $patientid,

                'patient' => $patient

            ]
        );
    }



    public function PatientEditProfile($id)
    {
        $patient = Patient::findOrFail($id);
        return view(
            'Patient.patientEditProfile',
            [
                'patient' => $patient
            ]
        );
    }

    public function patientUpdateProfile(Request $request, $id)
    {

        $patient = Patient::findOrFail($id);
        $patient->firstname = $request->input('firstname');
        $patient->lastname = $request->input('lastname');
        $patient->phone = $request->input('phone');
        $patient->address = $request->input('address');
        $patient->dob = $request->input('dob');
        $patient->nid = $request->input('nid');
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('uploaded_images'), $filename);
            $patient->picture = $filename;
        }


        $patient->save();

        return redirect()->route('patient/dashboard')->with('success', 'Patient profile updated successfully!');
    }


    public function checkout(Request $request, $id)
    {
        $package = Healthpackages::find($id);
        $patientid = $request->session()->get('patient_id');
        $patientfirstname = $request->session()->get('patient_firstname');
        $patientlastname = $request->session()->get('patient_lastname');
        $patientemail = $request->session()->get('patient_email');
        $patientaddress = $request->session()->get('patient_address');
        $patientnid = $request->session()->get('patient_nid');
        $patientphone = $request->session()->get('patient_phone');


        return view(
            'Patient.checkout',
            [
                'package' => $package,
                'patientid' => $patientid,
                'patientfirstname' => $patientfirstname,
                'patientlastname' => $patientlastname,
                'patientemail' => $patientemail,
                'patientaddress' => $patientaddress,
                'patientnid' => $patientnid,
                'patientphone' => $patientphone
            ]
        );
    }

    public function checkoutpost(Request $request)
    {


        $payment = new Payment();
        $payment->name = $request->name;
        $payment->patientid = $request->patientid;
        $payment->email = $request->email;
        $payment->phone = $request->phone;
        $payment->address = $request->address;
        $payment->nid = $request->nid;
        $payment->price = $request->price;
        $payment->cardname = $request->cardname;
        $payment->packagename = $request->packagename;
        $payment->cardnumber = $request->cardnumber;
        $result = $payment->save();
        if ($result) {
            return redirect()->route('patient/dashboard')->with('success', 'Payment successful Our executives will reach you soon');
        }
    }

    public function paymenthistory($id)
    {
        $patient = Patient::find($id);
        $payment = Payment::where('patientid', $id)->get();

        return view(
            'Patient.PaymentHistory',
            [
                'payment' => $payment,
                'patient' => $patient
            ]
        );
    }

    public function patientmessage($id)
    {
        $patientmsg = Message::where('patientid', $id)->get();
       
        return view(
            'Patient.viewmessage',[
                'patientmsg' => $patientmsg,
                
            ]
           
            );
    }
    public function prescription($id)
    {
        $prescription = Prescription::where('patientid', $id)->get();
       
        return view(
            'Patient.prescription',[
                'prescription' => $prescription,
            ]
           
            );
    }

    public function prescriptionDownload($id)
{
    $prescription = Prescription::findOrFail($id);

        $prescription = Prescription::findOrFail($id);
        $pdf = PDF::loadView('prescriptionpdf', ['prescription' => $prescription]);
        return $pdf->download('prescription.pdf');
}
}
