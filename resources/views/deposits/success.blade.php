<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f5f5f5;
        }

        .success-container {
            background: white;
            max-width: 500px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .success-icon {
            font-size: 60px;
            color: #28a745;
            margin-bottom: 20px;
        }

        h2 {
            color: #28a745;
            margin-bottom: 20px;
        }

        .order-id {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            font-family: 'Courier New', monospace;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        <h2>Pembayaran Berhasil!</h2>
        <p>Terima kasih, pembayaran Anda telah berhasil diproses.</p>
        @if (isset($merchantOrderId))
            <div class="order-id">
                <strong>Order ID:</strong> {{ $merchantOrderId }}
            </div>
        @endif
        <p>Anda akan menerima konfirmasi melalui email dalam beberapa menit.</p>
        <a href="{{ url('topup') }}" class="btn">Kembali ke Form</a>
    </div>
</body>

</html>
