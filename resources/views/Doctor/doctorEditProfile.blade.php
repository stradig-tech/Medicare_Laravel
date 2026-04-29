<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

</head>

<body style="background-color: rgb(227, 251, 235)">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <br>
                <center>
                    <H1 class="text-primary">Edit profile</H1>
                </center><br>
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route('doctorprofile.update', $doctor->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="mt-3 fs-5 fw-semibold text-primary" for="firstname">First Name:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    value="{{ $doctor->firstname }}">
                            </div>
                            <div class="form-group">
                                <label class="mt-3 fs-5 fw-semibold text-primary" for="lastname">Last Name:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    value="{{ $doctor->lastname }}">
                            </div>
                            <div class="form-group">
                                <label class="mt-3 fs-5 fw-semibold text-primary" for="phone">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $doctor->phone }}">
                            </div>
                            <div class="form-group">
                                <label class="mt-3 fs-5 fw-semibold text-primary" for="address">Address:</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $doctor->address }}">
                            </div>
                            <div class="form-group">
                                <label class="mt-3 fs-5 fw-semibold text-primary" for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob"
                                    value="{{ $doctor->dob }}">
                            </div>
                            <div class="form-group">
                                <label class="mt-3 fs-5 fw-semibold text-primary" for="nid">NID:</label>
                                <input type="text" class="form-control" id="nid" name="nid"
                                    value="{{ $doctor->nid }}">
                            </div>
                            <div class="form-group">
                                <label class="mt-3 fs-5 fw-semibold text-primary" for="profile_picture">Profile
                                    Picture:</label>
                                <input type="file" class="form-control" id="picture" name="picture"
                                    value="{{ $doctor->picture }}"required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</body>

</html>
