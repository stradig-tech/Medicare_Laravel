<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Prescription</title>
</head>

<body style="background-color: rgb(227, 251, 235)">
    <div class="container">
        <h1 class="text-primary  text-center my-4">Prescription Form</h1>
        <form action="{{ route('prescription.send') }}" method="post">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label class="mt-3 fs-5 fw-semibold text-primary" for="doctorname" class="form-label">Doctor
                        Name</label>
                    <input type="text" class="form-control" id="doctorname" name="doctorname"
                        value="{{ $appointment->doctorname }}" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label class="mt-3 fs-5 fw-semibold text-primary" for="patientname" class="form-label">Patient
                        Name</label>
                    <input type="text" class="form-control" id="patientname" name="patientname"
                        value="{{ $appointment->patientname }}" readonly>
                </div>
            </div>
            <div class="row mb-3 ">
                <div class="col-md-6 form-group">
                    <label class="mt-3 fs-5 fw-semibold text-primary" for="appointmentid" class="form-label">Appointment
                        ID</label>
                    <input type="text" class="form-control" id="appointmentid" name="appointmentid"
                        value="{{ $appointment->id }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label class="mt-3 fs-5 fw-semibold text-primary" for="medicine" class="form-label">Medicine</label>
                    <textarea class="form-control" id="medicine" name="medicine" required></textarea>
                </div>
                <div class="col-md-6 form-group">
                    <label class="mt-3 fs-5 fw-semibold text-primary" for="test" class="form-label">Test</label>
                    <textarea class="form-control" id="test" name="test" required ></textarea>
                </div>
            </div>
            <div class="row mb-3 ">
                <div class="col-md-12 form-group">
                    <label class="mt-3 fs-5 fw-semibold text-primary" for="suggestion"
                        class="form-label">Suggestion</label>
                    <textarea class="form-control" id="suggestion" name="suggestion" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </div>
            <input type="hidden" name="patientpicture" id="patientpicture" value="{{ $appointment->patientpicture }}">

            <input type="hidden" class="form-control" id="doctorid" name="doctorid"
                value="{{ $appointment->doctorid }}">

            <input type="hidden" class="form-control" id="patientid" name="patientid"
                value="{{ $appointment->patientid }}">
        </form>
    </div>


</body>

</html>
