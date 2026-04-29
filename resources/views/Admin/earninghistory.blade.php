<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Earning History</title>
</head>
<style>
    th,
    tr {
        height: 70px;
        font-size: 22px;
    }
</style>

<body style="background-color: rgb(227, 251, 235)">
    <br>
    <center>
        <h1 class="text-primary">Earning History</h1>
    </center>
    <br>

    <div class="table-responsive">
        <table class="table  table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>Order ID</th>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Package</th>
                    <th>Phone</th>
                    <th>address</th>
                    <th>cardname</th>
                    <th>cardnumber</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPayment = 0; // declare a variable to hold the total payment
                @endphp

                @foreach ($payment as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->patientid }}</td>
                        <td>{{ $payment->name }}</td>
                        <td>{{ $payment->email }}</td>
                        <td>{{ $payment->packagename }}</td>
                        <td>{{ $payment->phone }}</td>
                        <td>{{ $payment->address }}</td>
                        <td>{{ $payment->cardname }}</td>
                        <td>{{ $payment->cardnumber }}</td>
                        <td class="table-active">{{ $payment->price }} $</td>
                    </tr>
                    @php
                        $totalPayment += $payment->price; // add the price of this payment to the total
                    @endphp
                @endforeach

            </tbody>
        </table>
        <center>
            <h3 class="text-success">Total Earning =<span class=" fs-1 text-primary"> {{ $totalPayment }} $ </span>
            </h3>
        </center>
    </div>


</body>

</html>
