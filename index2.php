<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mie Bakar Celaket</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
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

  </style>

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
        </style>
        </head>
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
        <!-- Modal Pemesanan -->
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

        <style>
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

      <!-- Modal Ulasan -->
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
            li.textContent = item.nama + ' - Rp ' + item.harga;
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
    }

    // Fungsi untuk menampilkan modal ulasan
    function tampilkanModalUlasan() {
        // Periksa apakah ada informasi pemesanan dalam localStorage
        var pemesanan = JSON.parse(localStorage.getItem('pemesanan'));
        if (pemesanan) {
            // Tampilkan modal ulasan dan isi dropdown menu
            $('#ulasanModal').modal('show');
            isiDropdownMenu(pemesanan.pesanan);
        } else {
            alert('Anda belum melakukan pemesanan.');
        }
    }

    function isiDropdownMenu(pesanan) {
        var menuUlasan = document.getElementById('menuUlasan');

        // Kosongkan dropdown terlebih dahulu
        menuUlasan.innerHTML = '<option value="">Pilih Menu</option>';

        // Isi dropdown dengan daftar menu dari pesanan
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
        document.getElementById('tanggalPemesanan').value = '';
        document.getElementById('subtotal').value = '';
        document.getElementById('total').value = '';
  }
</script>

        <script>
          $(document).ready(function() {
            $('.btn-pesan').click(function() {
              var namaMenu = $(this).closest('.image').find('h4').text();
              var jumlah = $(this).closest('form').find('input[name="jumlah"]').val();
              var harga = $(this).closest('.image').find('p:last-child').text().replace(/[^0-9,-]+/g, '').replace(/,/g, '');
              var subtotal = jumlah * parseInt(harga);

              // Tampilkan modal dengan detail pesanan
              var modalBody = $('#pesananModal .modal-body');
              modalBody.html('<p><strong>Nama Menu:</strong> ' + namaMenu + '</p>');
              modalBody.append('<p><strong>Jumlah:</strong> ' + jumlah + '</p>');
              modalBody.append('<p><strong>Subtotal:</strong> Rp ' + subtotal.toLocaleString('id-ID') + '</p>');

              $('#pesananModal').modal('show');
            });
          });
          $(document).ready(function() {
            $('.btn-pesan').click(function() {
              // Kode untuk menampilkan modal

              $('#pesananModal').modal('show');
            });

            $('.kurang-btn').click(function() {
              var jumlahInput = $(this).closest('.input-group').find('.jumlah-input');
              var jumlah = parseInt(jumlahInput.val());
              if (jumlah > 1) {
                jumlahInput.val(jumlah - 1);
              }
            });

            $('.tambah-btn').click(function() {
              var jumlahInput = $(this).closest('.input-group').find('.jumlah-input');
              var jumlah = parseInt(jumlahInput.val());
              jumlahInput.val(jumlah + 1);
            });
          });
        </script>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
          $(document).ready(function() {
            // Initialize AOS
            AOS.init();
          });
        </script>


        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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




      <article id="testimoni" class="card judul">

        <style>
          .text-center {
            text-align: center;
            /* Centers the text within the element */
          }

          body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
          }

          .testimonial-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;

          }

          .testimonial-card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: calc(33% - 40px);
            box-sizing: border-box;
          }

          .testimonial-card h2 {
            font-size: 1.2em;
            margin: 0 0 10px;
            color: #333333;
          }

          .testimonial-card p {
            font-size: 1em;
            margin: 0;
            color: #666666;
          }

          .testimonial-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
          }

          @media (max-width: 768px) {
            .testimonial-card {
              width: calc(50% - 40px);
            }
          }

          @media (max-width: 480px) {
            .testimonial-card {
              width: calc(100% - 40px);
            }
          }

          .testimonial-card .stars {
            color: gold;
            font-size: 1.2em;
          }
        </style>



        <h1 class="text-center">Testimonials </h1>

        <div class="testimonial-container" id="testimonials-container">
          <!-- Testimonials will be inserted here -->
        </div>

        <script>
          // Fetch the testimonials
          fetch('fecth_testimoni.php')
            .then(response => response.json())
            .then(data => {
              const container = document.getElementById('testimonials-container');
              let currentIndex = 0;

              function displayTestimonials() {
                container.innerHTML = ''; // Clear the container
                for (let i = 0; i < 3; i++) {
                  const testimonial = data[(currentIndex + i) % data.length];
                  const card = document.createElement('div');
                  card.className = 'testimonial-card';

                  // Add a static image
                  const img = document.createElement('img');
                  img.src = "assets/img/person.jpg"; // Path to the static image
                  img.alt = 'Testimonial Image';

                  const name = document.createElement('h2');
                  name.textContent = testimonial.nama;

                  const menu = document.createElement('p');
                  menu.textContent = `Menu: ${testimonial.menu}`;

                  const rating = document.createElement('p');
                  rating.innerHTML = `Rating: ${getStars(testimonial.rating)}`;

                  const review = document.createElement('p');
                  review.innerHTML = `&quot;${testimonial.ulasan}&quot;`;

                  card.appendChild(img);
                  card.appendChild(name);
                  card.appendChild(menu);
                  card.appendChild(rating);
                  card.appendChild(review);
                  container.appendChild(card);
                }
                currentIndex = (currentIndex + 3) % data.length;
              }

              function getStars(rating) {
                const starFull = '&#9733;'; // Full star
                const starEmpty = '&#9734;'; // Empty star
                let stars = '';
                for (let i = 1; i <= 5; i++) {
                  if (i <= rating) {
                    stars += starFull;
                  } else {
                    stars += starEmpty;
                  }
                }
                return stars;
              }

              displayTestimonials(); // Initial display
              setInterval(displayTestimonials, 5000); // Update every 5 seconds
            })
            .catch(error => console.error('Error fetching testimonials:', error));
        </script>



      </article>



      <style>
        
        /* Tambahkan kode CSS berikut ke dalam file CSS Anda atau dalam tag <style> */

        .modal {
          display: none;
          position: fixed;
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
          background-color: #fefefe;
          margin: 15% auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
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

        .rating {
          display: flex;
          flex-direction: row-reverse;
          justify-content: flex-end;
        }

        .rating input[type="radio"] {
          display: none;
        }

        .rating label {
          color: #ddd;
          cursor: pointer;
          font-size: 2em;
        }

        .rating label:hover,
        .rating label:hover~label,
        .rating input[type="radio"]:checked~label {
          color: gold;
        }
      </style>



      <article id="kontak" class="card judul">

        <h2>Ulasan pelanggan</h2>
        <div class="kontak">
          <div class="side">
            <div class="sosmed">
              <ul>
                <!-- <li>
                  <a href="#" id="menuButton"><i class="fas fa-utensils"></i></a>
              </li>
              <li>
                  <a href="#" id="revenuButton"><i class="fas fa-calendar-alt"></i></a>
              </li>
              <li>
                  <a href="#" id="feedbackButton"><i class="fas fa-comment"></i>
              </li> -->
                <li>
                  <a href="https://wa.me/6281233488872"><i class="fab fa-whatsapp"></i></a>
                </li>
                <li>
                  <a href="https://instagram.com/miebakarcelaket"><i class="fab fa-instagram"></i></a>
                </li>
              </ul>
              </ul>
            </div>
          </div>

          
          <div class="email">
            <form id="testimoniForm" action="submit_testimoni.php" method="POST">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukan nama anda" required>
              </div>
              <!-- <div class="form-group">
            <label for="menu">Menu</label>
            <input type="text" id="menu_id" name="menu_id" placeholder="Pilihan menu" required>
        </div> -->
              <?php
              // Inline PHP code to fetch menu items and display in a dropdown
              require_once 'menu.php';
              $menus = ambilMenu($pdo);

              ?>

              <div class="form-group">
                <label for="menu">Menu</label>
                <select id="menu_id" name="menu" required>
                  <option value="">Pilihan menu</option>
                  <?php
                  if (!empty($menus)) {
                    foreach ($menus as $menu) {
                      echo "<option value='" . $menu['nama'] . "'>" . $menu['nama'] . "</option>";
                    }
                  } else {
                    echo "<option value=''>No Menu Available</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="rating">Rating</label>
                <div class="rating">
                  <input type="radio" id="star5" name="rating" value="5" />
                  <label for="star5" title="sangat baik">&#9733;</label>
                  <input type="radio" id="star4" name="rating" value="4" />
                  <label for="star4" title="baik">&#9733;</label>
                  <input type="radio" id="star3" name="rating" value="3" />
                  <label for="star3" title="sedang">&#9733;</label>
                  <input type="radio" id="star2" name="rating" value="2" />
                  <label for="star2" title="buruk">&#9733;</label>
                  <input type="radio" id="star1" name="rating" value="1" />
                  <label for="star1" title="sangat buruk">&#9733;</label>
                </div>
              </div>
              <div class="form-group">
                <label for="ulasan">Ulasan</label>
                <textarea id="ulasan" name="ulasan" rows="10" placeholder="Masukan ulasan anda disini" required></textarea>
              </div>
              <button type="submit">Kirim</button>
            </form>
          </div>

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <script>
            document.getElementById("testimoniForm").addEventListener("submit", function(event) {
              event.preventDefault(); // Prevent the default form submission

              var form = this;

              // Use Fetch API to submit form data
              fetch(form.action, {
                  method: form.method,
                  body: new FormData(form)
                })
                .then(function(response) {
                  // Check if response is OK
                  if (response.ok) {
                    // Reset form after successful submission
                    form.reset();
                    // Show sweet alert for success
                    swal("Success!", "Ulasan berhasil dikirim!", "success");
                  } else {
                    // Show sweet alert for failure
                    swal("Error!", "Gagal mengirim ulasan.", "error");
                  }
                })
                .catch(function(error) {
                  // Show sweet alert for errors
                  swal("Error!", "Terjadi kesalahan.", "error");
                });
            });
          </script>

        </div>
      </article>

      <style>
        .center-container {
          display: grid;
          justify-content: center;
          align-items: center;
        }
      </style>

<article id="reservasi" class="card judul">
    <div class="center-container">
        <h3>Reservasi pelanggan</h3>
        <button id="tambahReservasiBtn">Tambah Reservasi</button>
    </div>
    <div id="modalRevenu" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Form Reservasi</h2>
            <!-- Form fields untuk reservasi -->
            <form action="submit_reservasi.php" method="POST">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="no_telepon">No. Telepon:</label>
                    <input type="tel" id="no_telepon" name="no_telepon" required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="pukul">Pukul:</label>
                    <input type="time" id="pukul" name="pukul" required>
                </div>
                <div class="form-group">
                    <label for="menu">Menu</label>
                    <select id="menu_id" name="menu" required>
                        <option value="">Pilihan menu</option>
                        <?php
                        require_once 'menu.php';
                        $menus = ambilMenu($conn);
                        if (!empty($menus)) {
                            foreach ($menus as $menu) {
                                echo "<option value='" . $menu['nama'] . "'>" . $menu['nama'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No Menu Available</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah_orang">Jumlah Orang:</label>
                    <input type="number" id="jumlah" name="jumlah_orang" required>
                </div>
                <div class="form-group">
                    <label for="meja">Pilih Meja:</label>
                    <select class="form-control" id="meja" name="meja_id" required>
                        <option value="1">Meja 1</option>
                        <option value="2">Meja 2</option>
                        <option value="3">Meja 3</option>
                        <option value="4">Meja 4</option>
                        <option value="5">Meja 5</option>
                        <option value="6">Meja 6</option>
                        <option value="7">Meja 7</option>
                        <option value="8">Meja 8</option>
                    </select>
                </div>
                <button type="submit">Simpan</button>
                <button type="button" class="back-button">Kembali</button>
            </form>
        </div>
    </div>
                      </article>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    // Get the modal
    var modalRevenu = document.getElementById("modalRevenu");

    // Get the button that opens the modal
    var tambahReservasiBtn = document.getElementById("tambahReservasiBtn");

    // Get the <span> element that closes the modal
    var closeButtons = document.getElementsByClassName("close");

    // When the user clicks the button, open the modal
    tambahReservasiBtn.onclick = function() {
        modalRevenu.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    for (var i = 0; i < closeButtons.length; i++) {
        closeButtons[i].onclick = function() {
            this.parentElement.parentElement.style.display = "none";
        }
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modalRevenu) {
            modalRevenu.style.display = "none";
        }
    }

    // Fetch available tables and update the select element
    fetch('get_available_tables.php')
        .then(response => response.json())
        .then(data => {
            const mejaSelect = document.getElementById('meja');
            mejaSelect.innerHTML = ''; // Clear existing options

            // Add available table options
            data.forEach(table => {
                const option = document.createElement('option');
                option.value = table;
                option.textContent = `Meja ${table}`;
                mejaSelect.appendChild(option);
            });
        })
        .catch(error => {
            document.getElementById('available-seats').textContent = 'Error loading available tables';
        });

    // // Form submission
    // document.querySelector("form").addEventListener("submit", function(event) {
    //     event.preventDefault(); // Prevent the default form submission

    //     var form = this;

    //     // Use Fetch API to submit form data
    //     fetch(form.action, {
    //         method: form.method,
    //         body: new FormData(form)
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.success) {
    //             // Show sweet alert for success
    //             swal("Success!", "Reservasi berhasil dikirim!", "success").then(() => {
    //                 // Close the modal
    //                 modalRevenu.style.display = "none";
    //                 // Reset form after successful submission
    //                 form.reset();
    //             });

    //             // Update available seats
    //             fetch('get_available_seats.php')
    //                 .then(response => response.json())
    //                 .then(data => {
    //                     document.getElementById('available-seats').textContent = 'Available seats: ' + data.available_seats;
    //                 });
    //         } else {
    //             // Show sweet alert for failure
    //             swal("Error!", data.message, "error");
    //         }
    //     })
    //     .catch(function(error) {
    //         // Show sweet alert for errors
    //         swal("Error!", "Terjadi kesalahan.", "error");
    //     });
    // });
    // $(document).ready(function() {
    //         // Get URL parameters
    //         const urlParams = new URLSearchParams(window.location.search);
    //         const success = urlParams.get('success');
    //         const message = urlParams.get('message');

    //         if (success === 'true') {
    //             swal("Success!", "Reservasi berhasil disimpan!", "success").then(() => {

    //                 // Additional actions after the alert if needed
    //             });
    //         } else if (success === 'false' && message) {
    //             swal("Error!", decodeURIComponent(message), "error");
    //         }
    //     });

        $(document).ready(function() {
            // Get URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const success = urlParams.get('success');
            const message = urlParams.get('message');

            if (success === 'true') {
                swal({
                    title: "Success!",
                    text: "Reservasi berhasil disimpan!",
                    icon: "success"
                }).then(() => {
                    window.location.href = 'index2.php';
                });
            } else if (success === 'false' && message) {
                swal({
                    title: "Error!",
                    text: decodeURIComponent(message),
                    icon: "error"
                }).then(() => {
                    window.location.href = 'index2.php';
                });
            }
        });
</script>
<style>
.modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
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
      <style>
        .back-button {
          margin-top: 20px;
          background-color: grey;
          /* Sets the background color to grey */
          display: block;
          /* Ensures the element is treated as a block element */
          margin-left: auto;
          /* Centers the button horizontally */
          margin-right: auto;
          /* Centers the button horizontally */
          width: fit-content;
          /* Adjusts the width to fit the content */
          padding: 10px 20px;
          /* Optional: Adds some padding for better appearance */
          text-align: center;
          /* Optional: Ensures text inside the button is centered */
          color: white;
          /* Optional: Sets the text color to white for better contrast */
          border: none;
          /* Optional: Removes any default border */
          border-radius: 5px;
          /* Optional: Adds rounded corners */
        }
      </style>
      <style>
        .back-button {
          margin-top: 20px;
        }
      </style>



      <!-- Modal Feedback -->
      <div id="modalFeedback" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Form Kritik & Saran</h2>
          <!-- Tambahkan form untuk feedback di sini -->
          <form id="formFeedback" action="submit_feedback.php" method="POST">
            <div class="form-group">
              <label for="kritik">Kritik</label>
              <input type="text" id="kritik" name="kritik" required>
            </div>
            <div class="form-group">
              <label for="saran">Saran</label>
              <input type="text" id="saran" name="saran" required>
            </div>
            <button type="submit">Simpan</button>
          </form>
          <button type="button" class="back-button">Kembali</button>
        </div>
      </div>

      <!-- alert untuk kritik dan saran -->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        document.getElementById("formFeedback").addEventListener("submit", function(event) {
          event.preventDefault(); // Prevent the default form submission

          var form = this;

          // Use Fetch API to submit form data
          fetch(form.action, {
              method: form.method,
              body: new FormData(form)
            })
            .then(function(response) {
              // Check if response is OK
              if (response.ok) {
                // Reset form after successful submission
                form.reset();
                // Show sweet alert for success
                swal("Success!", "Feedback berhasil dikirim!", "success");
              } else {
                // Show sweet alert for failure
                swal("Error!", "Gagal menyimpan feedback.", "error");
              }
            })
            .catch(function(error) {
              // Show sweet alert for errors
              swal("Error!", "Terjadi kesalahan.", "error");
            });
        });

        // Ambil elemen modal dan tombol close
        var modalFeedback = document.getElementById("modalFeedback");
        var closeButtons = document.getElementsByClassName("close");

        // Ambil elemen tombol feedback
        var feedbackButton = document.getElementById("feedbackButton");

        // Fungsi untuk membuka modal saat tombol ditekan
        function openModal(modal) {
          modal.style.display = "block";
        }

        // Fungsi untuk menutup modal saat tombol close ditekan
        function closeModal(event) {
          event.target.parentElement.parentElement.style.display = "none";
        }

        // Event listener untuk tombol feedback
        feedbackButton.addEventListener("click", function(event) {
          event.preventDefault(); // Prevent default link behavior
          openModal(modalFeedback);
        });

        // Event listener untuk tombol close
        for (var i = 0; i < closeButtons.length; i++) {
          closeButtons[i].addEventListener("click", closeModal);
        }

        // Event listener untuk tombol kembali
        var backButtons = document.getElementsByClassName("back-button");
        for (var i = 0; i < backButtons.length; i++) {
          backButtons[i].addEventListener("click", function(event) {
            closeModal(event);
          });
        }
      </script>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="pesananModal" tabindex="-1" role="dialog" aria-labelledby="pesananModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="pesananModalLabel">Detail Pesanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Isi detail pesanan akan ditambahkan melalui JavaScript -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="tambahKeranjang">Tambah ke Keranjang</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $('.btn-pesan').click(function(event) {
          event.preventDefault(); // Mencegah form untuk dikirimkan secara default

          var namaMenu = $(this).closest('.image').find('h4').text();
          var jumlah = $(this).closest('form').find('input[name="jumlah"]').val();
          var harga = $(this).closest('.image').find('p:last-child').text().replace(/[^0-9,-]+/g, '').replace(/,/g, '');
          var subtotal = jumlah * parseInt(harga);

          // Tampilkan modal dengan detail pesanan
          var modalBody = $('#pesananModal .modal-body');
          modalBody.html('<p><strong>Nama Menu:</strong> ' + namaMenu + '</p>');
          modalBody.append('<p><strong>Jumlah:</strong> ' + jumlah + '</p>');
          modalBody.append('<p><strong>Subtotal:</strong> Rp ' + subtotal.toLocaleString('id-ID') + '</p>');

          $('#pesananModal').modal('show');
        });

        $('#tambahKeranjang').click(function() {
          // Logika untuk menambahkan pesanan ke keranjang
          // ...

          // Tutup modal setelah berhasil menambahkan ke keranjang
          $('#pesananModal').modal('hide');
        });
      });
    </script>


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

  <footer>
    <p>Mie Bakar Celaket ; JL.Tawangmangu No.4 Klojen Malang</p>
  </footer>

  <script src="assets/js/script.js"></script>

</body>

</html>