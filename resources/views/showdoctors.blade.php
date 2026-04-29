<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <title>Document</title>
    <style>
        .imgmama {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="container my-5 ">
        <h1 class="text-center">Our Doctors</h1> <br>
        <div class="row">
            @foreach ($doctors as $index => $doctor)
                @php
                    $fullName = $doctor->firstname . ' ' . $doctor->lastname;
                @endphp
                <div class="col-12 col-lg-4  ">
                    <div class="card mb-5 mx-2 shadow-lg p-3 mb-5 bg-white rounded">
                        <img src="{{ asset('uploaded_images/' . $doctor->picture) }}"
                            class="imgmama bg-image hover-zoom " alt="Doctor Image">
                        <div class="card-body">
                            <h4 class="card-title text-primary">{{ $fullName }}</h4>
                            <h6 class="card-text">Specialty: {{ $doctor['specialization'] }}</h6>
                            <h6 class="card-text">Qualification: {{ $doctor['qualificationtion'] }}</h6>
                            <h6 class="card-text">Address: {{ $doctor['address'] }}</h6>
                            <h6 class="card-text">Phone: {{ $doctor['phone'] }}</h6>
                        </div>
                    </div>
                </div>
                @if (($index + 1) % 3 == 0)
        </div>
        <div class="row">
            @endif
            @endforeach
        </div>
    </div>



    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</body>

</html>
