<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mie Bakar Celaket</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<header>
    <div class="nav-bar">
      <div class="logo">
        <img src="assets/img/logo.jpeg" alt="">
      </div>
      <nav>
        <ul>
          <li>
            <a href="#beranda">Beranda</a>
          </li>
          <li>
            <a href="#menu">Menu</a>
          </li>
          <li>
            <a href="#menu-fav">Best Seller</a>
          </li>
          <li>
            <a href="#kontak">Ulasan</a>
          </li>
          <li>
            <a href="#reservasi">Reservasi</a>
          </li>
          <li>
            <a href="#" id="feedbackButton">
              <i class="fas fa-comment"></i> Kritik & Saran
            </a>
          </li>
          <li>
            <a href="#" id="keranjangLink" data-bs-toggle="modal" data-bs-target="#cartModal">
              <i class="fas fa-shopping-cart"></i>
            </a>
          </li>
          <li>
            <a href="login.php">Login</a>
          </li>
        </ul>
      </nav>
    </div>

    <div id="beranda" class="jumbotron">
      <h1>Selamat datang di Mie Bakar Celaket,<br> rasakan kenikmatan masakan khas nusantara dengan perpaduan western yang enak! </h1>
      <a href="#">Pesan Sekarang!</a>
    </div>
  </header>

  <main>
    <!-- Konten artikel -->
    <div class="content">
      <article id="menu" class="card judul">
        <h2>Menu</h2>
        <p>
          Mie Bakar Celaket telah hadir sejak tahun 2016, menawarkan makanan dengan perpaduan unik antara Bakmie Jawa dengan cita rasa Western. Kunjungi Resto kami sekarang !
        </p>

        <style>
         #catalog {
            background-color: #f8f8f8;
            padding: 80px 0;
          }

          .section-title h2 {
            font-size: 36px;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
          }

          .catalog-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
          }

          .catalog-item {
            width: 250px;
            margin: 15px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            text-align: center;
          }

          .catalog-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
          }

          .catalog-item .item-info {
            padding: 15px;
          }

          .catalog-item .item-info h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
          }

          .catalog-item .item-info p {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
          }

          .catalog-item .item-info .price {
            font-size: 16px;
            color: #007bff;
          }

          .jumlah-input {
            text-align: center;
            font-weight: bold;
          }

          .input-group {
            display: flex;
            align-items: center;
          }

          .input-group-append {
            display: flex;
          }

          .btn-outline-secondary {
            width: 2px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
          }

          .jumlah-input {
            text-align: center;
          }

          .center-container {
            display: grid;
            justify-content: center;
            align-items: center;
          }
          .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.4);
          }

          .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            overflow-y: auto;
            max-height: 80vh;
          }

          .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
          }

          .close:hover,
          .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
          }
        </style>

        <?php
        // Pastikan file ini berisi koneksi ke database dan fungsi ambilMenu()
        include 'menu.php';
        $menus = ambilMenu();
        ?>

        <section id="product">
          <div class="section-title">
            <h2>Menu Pilihan</h2>
          </div>
          <div class="galery">
            <?php foreach ($menus as $menu) { ?>
              <div class="image" data-aos="fade-up">
                <img src="./uploaded_files/<?php echo $menu['image']; ?>" alt="<?php echo $menu['nama']; ?>" onclick="openZoom('<?php echo $menu['nama']; ?>', '<?php echo $menu['harga']; ?>', '<?php echo $menu['deskripsi']; ?>', '<?php echo $menu['image']; ?>')">
                <h4><?php echo $menu['nama']; ?></h4>
                <p><?php echo $menu['deskripsi']; ?></p>
                <p>Rp <?php echo number_format($menu['harga'], 0, ',', '.'); ?></p>
                <button class="btn btn-primary" onclick="openOrderModal('<?php echo $menu['nama']; ?>', '<?php echo $menu['harga']; ?>')" data-menu="<?php echo $menu['nama']; ?>" data-harga="<?php echo $menu['harga']; ?>">Pesan</button>
              </div>
            <?php } ?>
          </div>
          <div class="zoom" id="zoom">
            <span class="close" onclick="closeZoom()">&times;</span>
            <img class="zoom-content" id="zoomImg">
          </div>
        </section>

        <!-- modal pemesanan -->
                
        <div id="modalPemesanan" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Form Pemesanan</h2>
            <div class="form-group">
              <label for="menuNama">Nama Menu:</label>
              <input type="text" id="menuNama" name="menuNama" readonly>
            </div>
            <div class="form-group">
              <label for="menuHarga">Harga:</label>
              <input type="text" id="menuHarga" name="menuHarga" readonly>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah:</label>
              <input type="number" id="jumlah" name="jumlah" min="1" value="1" required>
            </div>
            <button type="button" onclick="tambahKeKeranjang()">Pesan</button>
          </div>
        </div>

        <!-- Modal Pembayaran -->
        <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="pembayaranModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pembayaranModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Daftar Menu yang Dipilih -->
                <ul id="daftarMenuPilihan"></ul>

                <!-- Input Nama -->
                <div class="form-group">
                <label for="namaCustomer">Nama Customer:</label>
                <input type="text" id="namaCustomer" class="form-control" required>
                </div>

                <!-- Dropdown untuk Metode Pembayaran -->
                <div class="form-group">
                <label for="metodePembayaran">Metode Pembayaran:</label>
                <select id="metodePembayaran" class="form-control" required>
                    <option value="">Pilih Metode Pembayaran</option>
                    <option value="cash">Cash</option>
                    <option value="qris">QRIS</option>
                    <option value="transfer">Transfer Bank</option>
                </select>
                </div>

                <!-- Subtotal dan Total -->
                <div class="form-group">
                <label for="subtotal">Subtotal:</label>
                <input type="text" id="subtotal" class="form-control" readonly>
                </div>
                <div class="form-group">
                <label for="total">Total:</label>
                <input type="text" id="total" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="prosesPembayaran()">Proses Pembayaran</button>
            </div>
            </div>
        </div>
        </div>

        <!-- modal ulasan -->
        <div class="modal fade" id="ulasanModal" tabindex="-1" role="dialog" aria-labelledby="ulasanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ulasanModalLabel">Beri Ulasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ulasanForm">
                <div class="form-group">
                    <label for="namaUlasan">Nama:</label>
                    <input type="text" id="namaUlasan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="menuUlasan">Menu:</label>
                    <select id="menuUlasan" class="form-control" required>
                    <option value="">Pilih Menu</option>
                    <!-- Opsi menu akan diisi secara dinamis -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="ratingUlasan">Rating:</label>
                    <div class="rating">
                    <input type="radio" id="star5" name="ratingUlasan" value="5" />
                    <label for="star5" title="Sangat Baik">&#9733;</label>
                    <input type="radio" id="star4" name="ratingUlasan" value="4" />
                    <label for="star4" title="Baik">&#9733;</label>
                    <input type="radio" id="star3" name="ratingUlasan" value="3" />
                    <label for="star3" title="Cukup">&#9733;</label>
                    <input type="radio" id="star2" name="ratingUlasan" value="2" />
                    <label for="star2" title="Buruk">&#9733;</label>
                    <input type="radio" id="star1" name="ratingUlasan" value="1" />
                    <label for="star1" title="Sangat Buruk">&#9733;</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ulasanText">Ulasan:</label>
                    <textarea id="ulasanText" class="form-control" rows="3" required></textarea>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="submitUlasan()">Kirim Ulasan</button>
            </div>
            </div>
        </div>
        </div>

        <!-- script -->

        <script>
    var modalPemesanan = document.getElementById("modalPemesanan");
    var closeButtons = document.getElementsByClassName("close");
    var pesanan = [];

    function openModal(modal) {
        modal.style.display = "block";
    }

    function closeModal(event) {
        event.target.parentElement.parentElement.style.display = "none";
    }

    // Event listener untuk tombol pesan
    var pesanButtons = document.querySelectorAll(".btn-primary[data-menu][data-harga]");
    pesanButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var menuNama = this.getAttribute('data-menu');
            var menuHarga = this.getAttribute('data-harga');
            document.getElementById('menuNama').value = menuNama;
            document.getElementById('menuHarga').value = menuHarga;
            openModal(modalPemesanan);
        });
    });

    // Event listener untuk tombol close
    for (var i = 0; i < closeButtons.length; i++) {
        closeButtons[i].addEventListener("click", closeModal);
    }

    // Event listener untuk klik di luar modal
    window.addEventListener("click", function(event) {
        if (event.target == modalPemesanan) {
            modalPemesanan.style.display = "none";
        }
    });

    // Fungsi untuk menampilkan modal pembayaran
    function tampilkanModalPembayaran() {
        $('#cartModal').modal('show');
    }

    // Panggil fungsi tampilkanModalPembayaran saat ikon keranjang diklik
    var keranjangLink = document.getElementById('keranjangLink');
    keranjangLink.addEventListener('click', function() {
        tampilkanModalPembayaran();
    });

    // Event listener untuk tombol Tutup pada modal pembayaran
    $('#cartModal').on('hidden.bs.modal', function() {
        $('#cartModal').modal('hide');
    });

    // Event listener saat modal pembayaran ditampilkan
    $('#cartModal').on('show.bs.modal', function() {
        tampilkanDaftarMenu();
        hitungSubtotalDanTotal();
    });

    // Fungsi untuk menambahkan pesanan ke keranjang
    function tambahKeKeranjang() {
        var menuNama = document.getElementById('menuNama').value;
        var menuHarga = document.getElementById('menuHarga').value;
        var jumlah = parseInt(document.getElementById('jumlah').value);

        // Tambahkan menu ke dalam pesanan
        pesanan.push({
            nama: menuNama,
            harga: parseInt(menuHarga),
            jumlah: jumlah
        });

        // Tampilkan pesan bahwa menu telah ditambahkan ke keranjang
        alert('Menu ' + menuNama + ' ditambahkan ke keranjang!');

        // Tutup modal pemesanan setelah menambahkan menu ke keranjang
        document.getElementById('modalPemesanan').style.display = 'none';
    }

    // Fungsi untuk menampilkan daftar menu yang dipilih dalam modal pembayaran
    function tampilkanDaftarMenu() {
        var daftarMenuPilihan = document.getElementById('daftarMenuPilihan');
        daftarMenuPilihan.innerHTML = ''; // Kosongkan daftar terlebih dahulu

        pesanan.forEach(function(item) {
            var li = document.createElement('li');
            li.textContent = item.nama + ' - Rp ' + item.harga.toLocaleString('id-ID');
            daftarMenuPilihan.appendChild(li);
        });
    }

    // Fungsi untuk menghitung subtotal dan total berdasarkan pesanan
    function hitungSubtotalDanTotal() {
        var subtotal = 0;
        pesanan.forEach(function(item) {
            subtotal += item.harga * item.jumlah;
        });
        var total = subtotal;

        document.getElementById('subtotal').value = subtotal.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
        document.getElementById('total').value = total.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
    }

    // Fungsi untuk memproses pembayaran
    function prosesPembayaran() {
        var namaCustomer = document.getElementById('namaCustomer').value;
        var metodePembayaran = document.getElementById('metodePembayaran').value;
        var total = document.getElementById('total').value.replace(/[^0-9,-]+/g, "");
        var tanggalPemesanan = new Date().toISOString().slice(0, 10);

        var data = {
            namaCustomer: namaCustomer,
            tanggalPemesanan: tanggalPemesanan,
            total: total,
            pesanan: pesanan,
            metodePembayaran: metodePembayaran
        };

        fetch('submit_pesanan.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                $('#cartModal').modal('hide');
                resetForm();

                // Simpan informasi pemesanan dalam localStorage
                localStorage.setItem('pemesanan', JSON.stringify(data.pemesanan));

                // Tampilkan modal ulasan
                tampilkanModalUlasan();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan dalam proses pembayaran!');
        });
    }

    // Fungsi untuk menampilkan modal ulasan
    function tampilkanModalUlasan() {
        var pemesanan = JSON.parse(localStorage.getItem('pemesanan'));
        if (pemesanan) {
            $('#ulasanModal').modal('show');
            isiDropdownMenu(pemesanan.pesanan);
        } else {
            alert('Anda belum melakukan pemesanan.');
        }
    }

    // Fungsi untuk mengisi dropdown menu dalam modal ulasan
    function isiDropdownMenu(pesanan) {
        var menuUlasan = document.getElementById('menuUlasan');
        menuUlasan.innerHTML = '<option value="">Pilih Menu</option>';

        pesanan.forEach(function(item) {
            var option = document.createElement('option');
            option.value = item.nama;
            option.textContent = item.nama;
            menuUlasan.appendChild(option);
        });
    }

    // Fungsi untuk mereset formulir setelah proses pembayaran selesai
    function resetForm() {
        document.getElementById('namaCustomer').value = '';
        document.getElementById('subtotal').value = '';
        document.getElementById('total').value = '';
    }
</script>

        

      </article>
      <article id="menu-fav" class="menu-fav">
        <h2>Menu Favorit Bersama</h2> 

        <section id="">
          <div class="">
            
            <div class="list-menu card">
              <div class="menu-text">
                <h4>Mie Bakar Sosis</h4>
                <p>Mie Bakar Sosis dan Mozarella merupakan hidangan istimewa yang menghadirkan perpaduan rasa gurih dan lumer di mulut yang tak tertahankan. Perpaduan sosis yang gurih dengan lelehan keju mozzarella yang creamy menciptakan sensasi rasa yang unik dan istimewa..</p>

              </div>
              <div class="menu-image">
                <img src="assets/img/sosis.jpg" alt="Nasi Liwet">
              </div>
            </div>
            <div class="list-menu card">
              <div class="menu-text">
                <h4>Mie Bakar Bakso</h4>
                <p>Mie Bakar Bakso dan Mozarella menghadirkan perpaduan rasa gurih dan lumer yang tak tertahankan, memanjakan lidah para pecinta kuliner. Perpaduan bakso yang kenyal dan gurih dengan lelehan keju mozzarella yang creamy menciptakan sensasi rasa yang unik dan istimewa..</p>
               
              </div>
              <div class="menu-image">
                <img src="assets/img/baksobs.jpg" alt="Parasmanan">
              </div>
            </div>
            <div class="list-menu card">
              <div class="menu-text">
                <h4>Mie Bakar Udang </h4>
                  <p>Mie Bakar Udang dan Mozarella menghadirkan perpaduan rasa dan tekstur yang unik dan istimewa, menggoda para pecinta kuliner dengan perpaduan lembutnya daging udang, gurihnya mie bakar, dan lumernya keju mozzarella..</p>
              </div>
              <div class="menu-image">
                <img src="assets/img/udangBS.jpg" alt="Coffee Break">
              </div>
            </div>
          </div>
        </section>
      </article>

      <!-- <article id="testimoni" class="card judul">
        <div class="testi-bg">
          <div class="testi-client">
            <h2>Testimoni</h2>
            <p>"Masakan Ghusfood Resto sangat cocok untuk lidah saya, masakan nusantaranya beda banget rasanya lebih mantap!"</p>
            <img src="assets/img/mba-dina.png" alt="Mba Dina">
            <p>Mba Dina</p>
          </div>
        </div>
      </article> -->



      <section id="testimoni" style="padding: 50px 0; background: #f9f9f9;">
        <div class="slide-container swiper">
          <div class="section-title" style="text-align: center; margin-bottom: 20px;">
            <h2 style="font-size: 2rem;">Testimonial</h2>
          </div>
          <div class="slide-content" style="display: flex; justify-content: center;">
            <div class="card-wrapper swiper-wrapper" style="display: flex; gap: 20px;">
              <div class="card swiper-slide" style="background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden; transition: transform 0.3s ease;">
                <div class="image-content" style="position: relative;">
                  <span class="overlay" id="overlay-1"></span>
                  <div class="card-image" style="width: 100%; overflow: hidden;">
                    <img src="./assets/img/udangBS.jpg" alt="" class="card-img" style="width: 100%; display: block;">
                  </div>
                </div>
                <div class="card-content" style="padding: 20px; text-align: center;">
                  <h2 class="name" style="font-size: 1.2rem; margin-bottom: 10px; font-weight: bold;">Costumer 1</h2>
                  <p class="coment" style="font-size: 1rem; color: #555;">
                    <sup><i class="fa fa-quote-left"></i></sup>&emsp;
                    Udah pernah nyobain beli di toko lain, tapi kaget banget ternyata disini harganya lebih murah!!. hehehe😁😉&emsp;
                    <sup><i class="fa fa-quote-right"></i></sup>
                  </p>
                </div>
              </div>
              <div class="card swiper-slide" style="background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden; transition: transform 0.3s ease;">
                <div class="image-content" style="position: relative;">
                  <span class="overlay" id="overlay-1"></span>
                  <div class="card-image" style="width: 100%; overflow: hidden;">
                    <img src="./assets/img/bakso.png" alt="" class="card-img" style="width: 100%; display: block;">
                  </div>
                </div>
                <div class="card-content" style="padding: 20px; text-align: center;">
                  <h2 class="name" style="font-size: 1.2rem; margin-bottom: 10px; font-weight: bold;">Costumer 1</h2>
                  <p class="coment" style="font-size: 1rem; color: #555;">
                    <sup><i class="fa fa-quote-left"></i></sup>&emsp;
                    Udah pernah nyobain beli di toko lain, tapi kaget banget ternyata disini harganya lebih murah!!. hehehe😁😉&emsp;
                    <sup><i class="fa fa-quote-right"></i></sup>
                  </p>
                </div>
              </div>
              <div class="card swiper-slide" style="background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden; transition: transform 0.3s ease;">
                <div class="image-content" style="position: relative;">
                  <span class="overlay" id="overlay-1"></span>
                  <div class="card-image" style="width: 100%; overflow: hidden;">
                    <img src="./assets/img/sosis.jpg" alt="" class="card-img" style="width: 100%; display: block;">
                  </div>
                </div>
                <div class="card-content" style="padding: 20px; text-align: center;">
                  <h2 class="name" style="font-size: 1.2rem; margin-bottom: 10px; font-weight: bold;">Costumer 1</h2>
                  <p class="coment" style="font-size: 1rem; color: #555;">
                    <sup><i class="fa fa-quote-left"></i></sup>&emsp;
                    Udah pernah nyobain beli di toko lain, tapi kaget banget ternyata disini harganya lebih murah!!. hehehe😁😉&emsp;
                    <sup><i class="fa fa-quote-right"></i></sup>
                  </p>
                </div>
              </div>
              <div class="card swiper-slide" style="background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden; transition: transform 0.3s ease;">
                <div class="image-content" style="position: relative;">
                  <span class="overlay" id="overlay-1"></span>
                  <div class="card-image" style="width: 100%; overflow: hidden;">
                    <img src="./assets/img/bakso.png" alt="" class="card-img" style="width: 100%; display: block;">
                  </div>
                </div>
                <div class="card-content" style="padding: 20px; text-align: center;">
                  <h2 class="name" style="font-size: 1.2rem; margin-bottom: 10px; font-weight: bold;">Costumer 1</h2>
                  <p class="coment" style="font-size: 1rem; color: #555;">
                    <sup><i class="fa fa-quote-left"></i></sup>&emsp;
                    Udah pernah nyobain beli di toko lain, tapi kaget banget ternyata disini harganya lebih murah!!. hehehe😁😉&emsp;
                    <sup><i class="fa fa-quote-right"></i></sup>
                  </p>
                </div>
              </div>
              <!-- Additional cards here -->
            </div>
          </div>
          <div class="swiper-button-next swiper-navBtn" style="color: #000; transition: color 0.3s;"></div>
          <div class="swiper-button-prev swiper-navBtn" style="color: #000; transition: color 0.3s;"></div>
          <div class="swiper-pagination"></div>
        </div>
      
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
          // Initialize Swiper
          var swiper = new Swiper('.swiper', {
            loop: true,
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
          });
        </script>
      </section>
      
    
      <!-- <article id="testimoni" class="card judul">
        <div class="testi-bg">
          <div class="testi-client" style="text-align: center;">
            <h2 style="font-size: 2rem;">Testimoni</h2>
            <p>"Masakan Ghusfood Resto sangat cocok untuk lidah saya, masakan nusantaranya beda banget rasanya lebih mantap!"</p>
            <img src="assets/img/mba-dina.png" alt="Mba Dina" style="display: block; margin: 0 auto;">
            <p>Mba Dina</p>
          </div>
        </div>
      </article> -->

      <article id="kontak" class="card judul">
        <h2>Ulasan pelanggan</h2>
        <div class="kontak">
          <div class="side">
            <div class="sosmed">
              <ul>
                <li>
                  <a href="#"><i class="fab fa-whatsapp"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-telegram"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-facebook"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="email">
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukan nama anda" required>
              </div>
              <div class="form-group">
                <label for="no telp">No telp</label>
                <input type="text" id="email" name="no telp" placeholder="Masukan nomer telp anda" required>
              </div>
              <div class="form-group">
                <label for="ulasan">Ulasan</label>
                <textarea id="ulasan" name="ulasan" rows="10" placeholder="Masukan ulasan anda disini" required></textarea>
              </div>
              <button type="submit">Kirim</button>
            </form>
          </div>
        </div>
      </article>
    </div>

    <!-- Konten samping -->
    <aside>
      <article class="profile card">
        <header>
          <h2>Owner Ghusfood Resto</h2>
          <p>Profil</p>
          <figure>
            <img src="assets/img/owner.jpeg" />
          </figure>
        </header>

        <section class="bio">
          <h3>Biodata</h3>
          <table>
            <tr>
              <th>Nama</th>
              <td>: Isminarto</td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td>: Jl. Jaksa Agung Suprarpto(Celaket), Malang</td>
            </tr>
            <tr>
              <th>Umur</th>
              <td>: 50 Tahun</td>
            </tr>
            <tr>
              <th>email</th>
              <td>: ghidayatnur@gmail.com</td>
            </tr>
            <tr>
              <th>No Telepon</th>
              <td>: 0812-3348-8872</td>
            </tr>
          </table>
        </section>
      </article>
    </aside>
  </main>
  <style>
    body {
        font-family: Arial, sans-serif;
    }
    footer {
        background: #333;
        color: white;
        text-align: center;
        padding: 20px 0;
    }
    footer p {
        margin: 0;
    }
    .feedback-btn {
        background-color: #f39c12;
        color: white;
        border: none;
        padding: 10px 20px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 5px;
    }
    .feedback-btn:hover {
        background-color: #e67e22;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
        padding-top: 60px;
    }
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
    }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
    }
</style>

<footer>
    <p>Mie Bakar Celaket ; JL.Tawangmangu No.4 Klojen Malang</p>
    <button class="feedback-btn" id="feedbackBtn">Kritik dan Saran</button>
</footer>

<!-- The Modal -->
<div id="feedbackModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Kritik dan Saran</h2>
        <form id="feedbackForm" action="submit_feedback.php" method="post">
            <div>
                <label for="nameFeedback">Nama:</label>
                <input type="text" id="nameFeedback" name="nameFeedback" required>
            </div>
            <div>
                <label for="kritikFeedback">Kritik:</label>
                <textarea id="kritikFeedback" name="kritikFeedback" rows="4" required></textarea>
            </div>
            <div>
                <label for="saranFeedback">Saran:</label>
                <textarea id="saranFeedback" name="saranFeedback" rows="4" required></textarea>
            </div>
            <div>
                <button type="submit">Kirim</button>
            </div>
        </form>
    </div>
</div>

<script>

</script>
  <script src="assets/js/script.js"></script>
</body>
</html>