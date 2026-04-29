<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Appointments List</title>
</head>
<style>
    th,
    tr {
        height: 70px;
        font-size: 22px;
    }

    .imgmama {
        width: 90%;
        height: 100px;
        object-fit: cover;
    }
</style>

<body style="background-color: rgb(227, 251, 235)">
    <br>
    <center>
        <h1 class="text-primary">Appointments List</h1>
    </center>

    <br>

    <div class="table-responsive">
        <table class="table  table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>Picture</th>
                    <th>Apt ID</th>
                    <th>Doctor ID</th>
                    <th>Doctor Name</th>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Patient phone</th>
                    <th>Patient Gender</th>
                    <th>Appointment date</th>
                    <th>Specialization</th>
                    <th>Status</th>


                </tr>
            </thead>
            <tbody>
                @php
                    $totalappointments = 0;
                @endphp

                @foreach ($appointment as $appointment)
                    <tr>
                        <td><img src="{{ asset('uploaded_images/' . $appointment->patientpicture) }}"
                                class="imgmama bg-image hover-zoom " alt="Doctor Image"></td>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->doctorid }}</td>
                        <td>{{ $appointment->doctorname }}</td>
                        <td>{{ $appointment->patientid }}</td>

                        <td>{{ $appointment->patientname }}</td>
                        <td>{{ $appointment->patientphone }}</td>
                        <td>{{ $appointment->patientgender }}</td>
                        <td>{{ $appointment->appointmentdate }}</td>
                        <td>{{ $appointment->specialization }}</td>
                        <td>{{ $appointment->appointmentstatus == 0 ? 'Pending' : 'Approved' }}
                        </td>
                    </tr>
                    @php
                        $totalappointments++;
                    @endphp
                @endforeach

            </tbody>
        </table>
        <center>
            <h2 class="text-success">Total Appointments =<span class=" fs-1 text-primary"> {{ $totalappointments }}
                </span>
                Appointments </h3>
        </center>
        <br>



</body>

</html>
