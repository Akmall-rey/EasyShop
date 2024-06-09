<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyShop - Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        h4 {
            font-weight: bold;
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        form {
            background-color: white;
            padding: 20px;
            margin: 0 auto;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn-back {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav class="p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index" class="text-2xl font-bold text-black">EasyShop</a>
            <div class="flex space-x-4 text-black"> 
                <a href="index" class="text-black">Product</a>
                <a href="deliver" class="text-black">Deliver</a>
                <a href="profile" class="text-black"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h4>EDIT PRODUCT</h4>
        <form id="editProductForm" action="javascript:void(0);" method="post" onsubmit="showToast()">
            <div class="form-group">
                <label for="foto">Foto Product:</label>
                <input type="file" name="foto" id="foto" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Nama Product:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Product Name" value="Air Jordan Panda" required />
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" name="harga" id="harga" class="form-control" placeholder="Enter Price" value="100" required/>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" class="form-control" placeholder="Enter Stock" value="10" required/>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
            <a href="index" class="btn btn-secondary btn-back">Back to List</a>
        </form>
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
                Product updated successfully!
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showToast() {
            $('.toast').toast('show');
        }
    </script>
</body>
</html>
