<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop - List Deliver</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            font-weight: bold;
            text-align: center;
            color: #333;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 20px;
            text-align: center;
        }
        .btn-send {
            background-color: #8bc34a;
            color: white;
        }
        .btn-cancel {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="home" class="text-2xl font-bold text-black">EasyShop</a>
            <div class="flex space-x-4 text-black"> 
                <a href="home" class="text-black">Product</a>
                <a href="deliver" class="text-black">Deliver</a>
                <a href="profile" class="text-black"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </nav>
    <div class="container table-container">
        <h2>List Deliver</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Foto Product</th>
                    <th>Nama Product</th>
                    <th>Harga Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid"></td>
                    <td>Air Jordan Panda</td>
                    <td>Rp 1.250.000</td>
                    <td class="status">Menunggu</td>
                    <td>
                        <button class="btn btn-send" onclick="updateStatus(this, 'Terkirim')">Kirim</button>
                        <button class="btn btn-cancel" onclick="updateStatus(this, 'Canceled')">Cancel</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
            <div class="toast-header">
                <strong class="mr-auto">Notification</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body" id="toast-body">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function updateStatus(button, status) {
            var row = button.parentElement.parentElement;
            var statusCell = row.querySelector('.status');
            statusCell.textContent = status;

            var toastBody = document.getElementById('toast-body');
            toastBody.textContent = 'Status updated to ' + status;

            $('.toast').toast('show');
        }
    </script>
</body>
</html>
