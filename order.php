<?php
session_start();

if (isset($_SESSION['menu'])) {
    $menu = $_SESSION['menu'];
} else {
    $menu = array();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Makanan</title>
    <style>
        .left {
            float: left;
            width: 70%;
        }

        .right {
            float: right;
            width: 250px;
            border-left: 2px solid black;
            padding-left: 10px;
        }

        .card {
            float: left;
            width: 200px;
            margin: 10px;
            border: 1px solid black;
            padding: 10px;
            position: relative;
        }

        img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
        }

        ul {
            list-style-type: square;
        }
    </style>
</head>
<body>
    <div class="left">
        <?php
        foreach ($menu as $i => $mkn) {
            echo "<div class='card'>";
            echo "<img src='" . $mkn["foto"] . "' alt='gambar'>";
            echo "<h3>" . $mkn["nama"] . "</h3>";
            echo "<p>Rp" . $mkn["harga"] . "</p>";
            echo "<button class='btnPilih' id='btn" . $i . "' data-nama='" . $mkn["nama"] . "' data-harga='" . $mkn["harga"] . "'>Pilih</button>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="right">
        <h3>Pesanan</h3>
        <ul id="daftarPesanan"></ul>
        <p><strong>Total: Rp<span id="totalHarga">0</span></strong></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        var total = 0;

        $(".btnPilih").click(function() {
            var nama = $(this).attr("data-nama");
            var harga = parseInt($(this).attr("data-harga"));

            $("#daftarPesanan").append("<li>" + nama + " - Rp" + harga + "</li>");
            total += harga;
            $("#totalHarga").text(total);

            $(this).attr("disabled", true); 
        });
    </script>
</body>
</html>
