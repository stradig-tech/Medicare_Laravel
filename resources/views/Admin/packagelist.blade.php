<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Package List</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

        <title>Patient Dashboard</title>
        <style>
            .bg-medium-blue {
                background-color: #1c2331;
            }

            .imgmama {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

            a {
                text-decoration: none;
            }
        </style>
    </head>

    <body>


        <center>
            @if (Session::has('success'))
                <h4 class="alert alert-success">{{ Session::get('success') }}</h4>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-dark">{{ Session::get('fail') }}</div>
            @endif
        </center>

        <div class="container my-5 ">
            <h1 class="text-center">Care Packages</h1> <br> <br>
            <center><a class="btn btn-success btn-lg" href="{{ route('CreatepackageView') }}">Create package</a>
            </center> <br><br>
            <div class="row">
                @foreach ($package as $index => $package)
                    <div class="col-12 col-lg-4  ">
                        <div class="card mb-5 mx-2 shadow-lg p-3 mb-5 bg-white rounded">
                            <img src="{{ asset('uploaded_images/' . $package->picture) }}"
                                class="imgmama bg-image hover-zoom " alt="Doctor Image">
                            <div class="card-body">
                                <h4 class="card-title text-primary">{{ $package['name'] }}</h4>
                                <h5 class="card-title card-text text-dark ">Type: <span
                                        class="text-success">{{ $package['type'] }}</span></h5>

                                <h6 class="card-text text-success ">Description: <span class="text-info">
                                        {{ $package['description'] }}</span> </h6>
                                <h6 class="card-text  text-success fs-5">Price: <span
                                        class="fs-4">{{ $package['price'] }}</span>$ </h6>
                                <br>
                                <div class="d-flex justify-content-start">
                                    <button class="btn btn-primary btn-sm mx-1"> <a class="text-white fs-5"
                                            href="{{ url('EditpackageGet/' . $package->id) }}">Edit</a></button>

                                    <button class="btn btn-danger btn-sm"> <a class="text-white fs-5"
                                            href="{{ route('delete.package', $package->id) }}">Delete</a></button>
                                </div>

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



    </body>

    </html>

</body>

</html>
