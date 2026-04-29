<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Doctors List</title>
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
        <h1 class="text-primary">Doctors List</h1>
    </center>

    <br>

    <div class="table-responsive">
        <table class="table  table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>Picture</th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Qualification</th>
                    <th>Specialization</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Nid</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $totalDoctors = 0;
                @endphp

                @foreach ($doctor as $doctor)
                    <tr>
                        <td><img src="{{ asset('uploaded_images/' . $doctor->picture) }}"
                                class="imgmama bg-image hover-zoom " alt="Doctor Image"></td>
                        <td>{{ $doctor->id }}</td>
                        <td>{{ $doctor->firstname }}</td>
                        <td>{{ $doctor->lastname }}</td>
                        <td>{{ $doctor->email }}</td>

                        <td>{{ $doctor->gender }}</td>
                        <td>{{ $doctor->qualification }}</td>
                        <td>{{ $doctor->specialization }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->address }}</td>
                        <td>{{ $doctor->nid }}</td>
                    </tr>
                    @php
                        $totalDoctors++;
                    @endphp
                @endforeach

            </tbody>
        </table>
        <center>
            <h2 class="text-success">Total Doctors =<span class=" fs-1 text-primary"> {{ $totalDoctors }} </span>
                persons </h3>
        </center>
        <br>



</body>

</html>
