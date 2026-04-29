<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Contact Us</title>
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
        <h1 class="text-primary">Contacts </h1>
    </center>
    <br>

    <div class="table-responsive">
        <table class="table  table-bordered table-hover">
            <thead class="table-success">
                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Phone</th>
                    <th>Message</th>


                </tr>
            </thead>
            <tbody>
                @php
                    $totalPatients = 0;
                @endphp

                @foreach ($patient as $patient)
                    <tr>

                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->date }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->message }}</td>
                    </tr>
                    @php
                        $totalPatients++;
                    @endphp
                @endforeach

            </tbody>
        </table>
        <center>
            <h3 class="text-success">Total contacts =<span class=" fs-1 text-primary"> {{ $totalPatients }} </span>
                persons </h3>
        </center>



</body>

</html>
