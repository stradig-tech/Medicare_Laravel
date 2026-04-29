<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History | Medic Care</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/premium.css') }}" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background: #f8f9fa; padding: 2rem; }
        .table-custom { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .table-custom thead th { background: #10b981; color: white; border: none; padding: 15px; font-weight: 500; letter-spacing: 0.5px; }
        .table-custom tbody td { padding: 15px; vertical-align: middle; border-color: #f1f5f9; }
        .price-badge { font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.1); padding: 5px 12px; border-radius: 8px; }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Payment History</h2>
            <p class="text-secondary mb-0">Review all your past health package transactions.</p>
        </div>
        <a href="{{ route('patient/dashboard') }}" class="btn btn-outline-success rounded-pill px-4 fw-medium">
            <i class="fas fa-arrow-left me-2"></i> Dashboard
        </a>
    </div>

    <div class="glass-panel border-0 p-0 table-custom animate-float">
        <div class="table-responsive">
            <table class="table mb-0 table-hover">
                <thead>
                    <tr>
                        <th class="ps-4">Transaction ID</th>
                        <th>Billed To</th>
                        <th>Email Contact</th>
                        <th>Package Type</th>
                        <th>Card Details</th>
                        <th>Amount Paid</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payment as $pay)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">#TXN-{{ str_pad($pay->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="fw-medium text-dark"><i class="fas fa-user text-muted me-2"></i> {{ $pay->name }}</td>
                            <td class="text-secondary">{{ $pay->email }}</td>
                            <td><span class="badge bg-light text-success border border-success border-opacity-25">{{ $pay->packagename }}</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="far fa-credit-card text-secondary me-2"></i> 
                                    <span class="text-dark small">{{ $pay->cardname }} (**** {{ substr($pay->cardnumber, -4) }})</span>
                                </div>
                            </td>
                            <td>
                                <span class="price-badge">${{ number_format($pay->price, 2) }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-secondary">
                                <i class="fas fa-file-invoice-dollar fs-1 text-muted mb-3 d-block opacity-50"></i>
                                No payment records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
