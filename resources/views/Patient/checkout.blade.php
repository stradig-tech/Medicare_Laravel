<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">


    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        #container {
            background-color: #f2f2f2;
            padding: 5px 20px 5px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 20px
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #04AA6D;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }

        .imgmama {
            width: 100%;
            height: 90px;
            object-fit: cover;
            border-radius: 25px;
        }

        #product {
            border: 1px solid rgb(255, 255, 255);
            padding: 15px;
            background-color: #ffffff;
            border-radius: 50px;
            width: 60%;

        }
    </style>
</head>

@php
    $fullName = $patientfirstname . ' ' . $patientlastname;
@endphp

<body>
    <div class="row">
        <div class="col-75">

            <div id="container">
                <form action="{{ route('checkoutpost') }}" method="post">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-50">
                            <h2 class="text-primary">Billing Address</h2>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input class="fs-5" type="text" id="name" name="name" placeholder="John M. Doe"
                                value="{{ $fullName }}" readonly>

                            <input class="fs-5" type="hidden" id="patientid" name="patientid"
                                value="{{ $patientid }}" readonly>

                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com"
                                value="{{ $patientemail }}" readonly>

                            <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="address" name="address" placeholder="542 W. 15th Street"
                                value="{{ $patientaddress }}" readonly>

                            <label for="phone"><i class="fa fa-address-card-o"></i> phone</label>
                            <input type="text" id="phone" name="phone" value="{{ $patientphone }}" readonly>

                            <label for="nid"><i class="fa fa-institution"></i> National ID</label>
                            <input type="text" id="nid" name="nid" placeholder="123456789"
                                value="{{ $patientnid }}" readonly>
                        </div>


                        <div class="col-50">
                            <h2 class="mb-3 text-primary">Product info</h2>

                            <div class="d-flex justify-content-around align-items-center">

                                <div class="mb-3" id="product">
                                    <div class="d-flex justify-content-around align-items-center ">
                                        <div class="me-5">
                                            <img class="imgmama "
                                                src="{{ asset('uploaded_images/' . $package->picture) }}"
                                                alt="">
                                        </div>
                                        <div class="">
                                            <input style="border: none" class="fw-bold fs-4 text-primary" type="text"
                                                id="packagename" name="packagename" value="{{ $package->name }}"
                                                readonly>
                                            <h6>{{ $package->description }}</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="div">
                                    <div class="col-50 d-flex justify-content-start align-items-center">
                                        <h2 class="text-primary">Total Price: <span class="text-dark">
                                                {{ $package->price }}$</span> </h2>

                                        <input class="fs-2 mt-3 fw-bold"
                                            style="width: 50%; border:none;  background-color: #f2f2f2;" type="hidden"
                                            id="price" name="price" value="{{ $package->price }}" readonly>
                                    </div>
                                </div>
                            </div>


                            <br>
                            <h2 class="text-primary">Payment</h2>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cardname" name="cardname" placeholder="John More Doe" required>
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="cardnumber" name="cardnumber"
                                placeholder="1111-2222-3333-4444" required>


                            <div class="row">


                            </div>

                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                        </label>
                        <input type="submit" value="Continue to checkout" class="btn btn-primary active">
                </form>
            </div>
        </div>


    </div>
</body>

</html>
