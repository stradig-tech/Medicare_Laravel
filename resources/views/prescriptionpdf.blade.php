<h1>Prescription</h1>

<h3>Date: {{ $prescription->created_at->format('d/m/Y') }}</h3>

<h3>Doctor Id: {{ $prescription->doctorid }}</h3>
<h3>Doctor Name: {{ $prescription->doctorname }}</h3>
<h3>Patient Id: {{ $prescription->patientid }}</h3>
<h3>Patient Name: {{ $prescription->patientname }}</h3>
<h3>Medicine: {{ $prescription->medicine }}</h3>
<h3>Tests: {{ $prescription->test }}</h3>
<h3>Sugggestions: {{ $prescription->suggestion }}</h3>
