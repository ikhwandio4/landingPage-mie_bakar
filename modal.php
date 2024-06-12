<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Button with Modal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Optional: Some basic styling for better appearance */
        body {
            font-family: Arial, sans-serif;
        }
        ul {
            list-style-type: none;
        }
        li {
            display: inline-block;
        }
        button {
            background-color: #007BFF; /* Button color */
            color: white; /* Text color */
            border: none; /* Remove border */
            padding: 10px 20px; /* Padding */
            font-size: 16px; /* Font size */
            cursor: pointer; /* Pointer cursor on hover */
            border-radius: 5px; /* Rounded corners */
            display: flex; /* Flexbox for icon and text */
            align-items: center; /* Center align items */
        }
        button i {
            margin-right: 8px; /* Margin between icon and text */
        }
        button:hover {
            background-color: #0056b3; /* Darker button color on hover */
        }
        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <ul>
        <li>
            <button id="menuButton"><i class="fas fa-utensils"></i>Tambah Menu</button>
        </li>
    </ul>

    <!-- The Modal -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Pemesanan</h2>
            <form>
                <label for="menu">Menu:</label><br>
                <input type="text" id="menu" name="menu"><br><br>
                <label for="quantity">Jumlah:</label><br>
                <input type="number" id="quantity" name="quantity"><br><br>
                <button type="submit">Pesan</button>
            </form>
        </div>
    </div>

    <!-- Font Awesome script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <!-- JavaScript to handle modal -->
    <script>
        // Get the modal
        var modal = document.getElementById("orderModal");

        // Get the button that opens the modal
        var btn = document.getElementById("menuButton");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
