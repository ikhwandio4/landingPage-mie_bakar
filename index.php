<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celaket";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
  die("Koneksi Gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel menu
$sql = "SELECT nama, harga, deskripsi, image FROM menu";
$result = $conn->query($sql);

$menus = array(); // Inisialisasi array untuk menyimpan data menu

if ($result->num_rows > 0) {
  // Menyimpan data menu ke dalam array $menus
  while ($row = $result->fetch_assoc()) {
    $menus[] = $row;
  }
} else {
  echo "Tidak ada data menu.";
}
$conn->close();
?>

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Include Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Include AOS CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <!-- Include AOS JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
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
          <li>
            <a href="#testimoni">Testimoni</a>
          </li>
          <li>
            <a href="#kontak">Ulasan</a>
          </li>
          <li>
            <a href="dashboard.php">Login</a>
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
          #product {
            background-color: #f8f8f8;
            padding: 80px 0;
          }

          .section-title h2 {
            font-size: 36px;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
          }

          .galery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
          }

          .image {
            position: relative;
            margin: 15px;
          }

          .image img {
            width: 300px;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
          }

          .image .product-info {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
          }

          .image:hover .product-info {
            opacity: 1;
          }

          .image:hover img {
            transform: scale(1.1);
          }
        </style>
        </head>

        <body>
          <section id="product">
            <div class="section-title">
              <h2>Menu Pilihan</h2>
            </div>
            <div class="galery">
              <?php foreach ($menus as $menu) { ?>
                <div class="image" data-aos="fade-up">
                  <img src="./uploaded_files/<?php echo $menu['image']; ?>" alt="<?php echo $menu['nama']; ?>" onclick="openZoom('<?php echo $menu['nama']; ?>', '<?php echo $menu['harga']; ?>', '<?php echo $menu['deskripsi']; ?>', '<?php echo $menu['image']; ?>')">
                  <div class="product-info">
                    <h4><?php echo $menu['nama']; ?></h4>
                    <p><?php echo $menu['deskripsi']; ?></p>
                    <p>Rp <?php echo number_format($menu['harga'], 0, ',', '.'); ?></p>
                    <button class="btn btn-primary" onclick="openOrderModal('<?php echo $menu['nama']; ?>', '<?php echo $menu['harga']; ?>')" data-menu="<?php echo $menu['nama']; ?>" data-harga="<?php echo $menu['harga']; ?>">Pesan</button>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="zoom" id="zoom">
              <span class="close" onclick="closeZoom()">&times;</span>
              <img class="zoom-content" id="zoomImg">
            </div>
          </section>
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

                  const review = document.createElement('p');
                  review.innerHTML = `&quot;${testimonial.ulasan}&quot;`;

                  card.appendChild(img);
                  card.appendChild(name);
                  card.appendChild(review);
                  container.appendChild(card);
                }
                currentIndex = (currentIndex + 3) % data.length;
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
      </style>



      <article id="kontak" class="card judul">

        <h2>Ulasan pelanggan</h2>
        <div class="kontak">
          <div class="side">
            <div class="sosmed">
              <ul>
                <li>
                  <a href="#" id="menuButton"><i class="fas fa-utensils"></i></a>
                </li>
                <li>
                  <a href="#" id="revenuButton"><i class="fas fa-calendar-alt"></i></a>
                </li>
                <li>
                  <a href="#" id="feedbackButton"><i class="fas fa-comment"></i>
                </li>
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
              <div class="form-group">
                <label for="menu">Menu</label>
                <input type="text" id="menu_id" name="menu_id" placeholder="Pilihan menu" required>
              </div>
              <div class="form-group">
                <label for="rating">Rating</label>
                <select id="rating" name="rating" required>
                  <option value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
                </select>
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

      <!-- Modal Menu -->
      <div id="modalMenu" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Form Menu</h2>
          <!-- Tambahkan form untuk menu di sini -->

          <!-- Form fields untuk menu -->
          <form id="formMenu" action="submit_menu.php" method="POST">
            <div class="form-group">
              <label for="nama">Nama Menu:</label>
              <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
              <label for="harga">Harga:</label>
              <input type="number" id="harga" name="harga" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi:</label>
              <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>
            <button type="submit">Simpan</button>
          </form>
          <button type="button" class="back-button">Kembali</button>

        </div>
      </div>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        document.getElementById("formMenu").addEventListener("submit", function(event) {
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
                swal("Success!", "Menu berhasil dikirim!", "success");
              } else {
                // Show sweet alert for failure
                swal("Error!", "Gagal menyimpan menu.", "error");
              }
            })
            .catch(function(error) {
              // Show sweet alert for errors
              swal("Error!", "Terjadi kesalahan.", "error");
            });
        });
      </script>
      <style>
        .back-button {
          margin-top: 20px;
        }
      </style>

      <!-- Modal Revenu -->
      <div id="modalRevenu" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Form Reservasi</h2>
          <!-- Tambahkan form untuk revenu di sini -->
          <!-- Form fields untuk revenu -->
          <form id="formReservasi" action="submit_reservasi.php" method="POST">
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
              <label for="jumlah_orang">Jumlah Orang:</label>
              <input type="number" id="jumlah_orang" name="jumlah_orang" required>
            </div>
            <!-- <div class="form-group">
    <label for="menu">Menu</label>
    <input type="text" id="menu" name="menu" required>
  </div> -->
            <div class="form-group">
              <label for="menu">Menu:</label>
              <select id="menu" name="menu" required>
                <option value="">Pilih Menu</option>
                <!-- Tambahkan opsi menu sesuai dengan data dari database -->
                <option value="ayam">ayam</option>
                <option value="baso">baso</option>
                <!-- ... -->
              </select>
            </div>
            <button type="submit">Simpan</button>

          </form>
          <button type="button" class="back-button">Kembali</button>
        </div>
      </div>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        document.getElementById("formReservasi").addEventListener("submit", function(event) {
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
                swal("Success!", "Reservasi berhasil dikirim!", "success");
              } else {
                // Show sweet alert for failure
                swal("Error!", "Gagal menyimpan reservasi.", "error");
              }
            })
            .catch(function(error) {
              // Show sweet alert for errors
              swal("Error!", "Terjadi kesalahan.", "error");
            });
        });
      </script>

      <!-- Modal Revenu -->
      <div id="modalFeedback" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Form Kritik&Saran</h2>
          <!-- Tambahkan form untuk revenu di sini -->
          <!-- Form fields untuk revenu -->
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
                swal("Success!", "Reservasi berhasil dikirim!", "success");
              } else {
                // Show sweet alert for failure
                swal("Error!", "Gagal menyimpan reservasi.", "error");
              }
            })
            .catch(function(error) {
              // Show sweet alert for errors
              swal("Error!", "Terjadi kesalahan.", "error");
            });
        });
      </script>

      <script>
        // Tambahkan kode JavaScript berikut ke dalam file JavaScript Anda atau dalam tag <script>

        // Ambil elemen modal dan tombol close
        var modalMenu = document.getElementById("modalMenu");
        var modalRevenu = document.getElementById("modalRevenu");
        var modalFeedback = document.getElementById("modalFeedback");
        var closeButtons = document.getElementsByClassName("close");

        // Ambil elemen tombol menu dan revenu
        var menuButton = document.querySelector("a[href='#'] i.fas.fa-utensils");
        var revenuButton = document.querySelector("a[href='#'] i.fas.fa-calendar-alt");
        var revenuFeedback = document.querySelector("a[href='#'] i.fas.fa-comment");



        // Fungsi untuk membuka modal saat tombol ditekan
        function openModal(modal) {
          modal.style.display = "block";
        }

        // Fungsi untuk menutup modal saat tombol close ditekan
        function closeModal(event) {
          event.target.parentElement.parentElement.style.display = "none";
        }

        // Event listener untuk tombol menu
        menuButton.addEventListener("click", function() {
          openModal(modalMenu);
        });

        // Event listener untuk tombol revenu
        revenuButton.addEventListener("click", function() {
          openModal(modalRevenu);
        });
        // Event listener untuk tombol feedback
        revenuFeedback.addEventListener("click", function() {
          openModal(modalFeedback);
        });

        // Event listener untuk tombol kembali
        var backButtons = document.getElementsByClassName("back-button");
        for (var i = 0; i < backButtons.length; i++) {
          backButtons[i].addEventListener("click", closeModal);
        }
      </script>
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

  <footer>
    <p>Mie Bakar Celaket ; JL.Tawangmangu No.4 Klojen Malang</p>
  </footer>

  <script src="assets/js/script.js"></script>

  <!-- Modal Pemesanan -->
  <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="purchaseModalLabel">Form Pembelian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="purchaseForm">
            <label for="nama_menu" class="form-label">Nama Menu</label>
            <input type="text" class="form-control" id="nama_menu" name="nama_menu" readonly>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input type="text" class="form-control" id="harga" name="harga" readonly>
        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <button type="button" class="btn btn-primary" id="addToCartBtn">Tambahkan ke Keranjang</button>
        </form>
      </div>
    </div>
  </div>
  </div>

  <script>
    function openOrderModal(nama, harga) {
      document.getElementById('nama_menu').value = nama;
      document.getElementById('harga').value = harga;
      var myModal = new bootstrap.Modal(document.getElementById('purchaseModal'));
      myModal.show();
    }
  </script>

  <!-- Shopping Cart Modal -->
  <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cartModalLabel">Keranjang Belanja</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="checkoutForm" method="POST" action="checkout.php">
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" required>
            </div>
            <div class="mb-3">
              <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
              <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" required>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nama Menu</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Subtotal</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody id="cartItems">
                <!-- Cart items will be dynamically added here -->
              </tbody>
            </table>
            <div class="text-right">
              <h5>Total: <span id="totalAmount">0</span></h5>
              <input type="hidden" id="total" name="total">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Proses Pembayaran</button>
          </div>
        </form>
      </div>
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
      /* Mengatur modal agar tidak dapat di-scroll */
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      overflow-y: auto;
      /* Mengatur konten modal dapat di-scroll jika melebihi ukuran modal */
      max-height: 80vh;
      /* Mengatur tinggi maksimal konten modal agar tidak lebih tinggi dari viewport */
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
  <script>
    // JavaScript
    document.addEventListener('DOMContentLoaded', function() {
      var purchaseModal = document.getElementById('purchaseModal');
      var cartItems = [];

      purchaseModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var menuId = button.getAttribute('data-id');
        var menuName = button.getAttribute('data-menu');
        var menuPrice = button.getAttribute('data-harga');

        var modalTitle = purchaseModal.querySelector('.modal-title');
        var modalBodyInputNamaMenu = purchaseModal.querySelector('#nama_menu');
        var modalBodyInputHarga = purchaseModal.querySelector('#harga');

        modalTitle.textContent = 'Form Pembelian ' + menuName;
        modalBodyInputNamaMenu.value = menuName;
        modalBodyInputHarga.value = menuPrice;
      });

      function updateCartCount() {
        var cartCount = cartItems.length;
        document.getElementById('cartCount').innerText = cartCount;
      }

      document.addEventListener('DOMContentLoaded', function() {
        updateCartCount();
      });

      document.getElementById('addToCartBtn').addEventListener('click', function() {
        var nama_menu = document.getElementById('nama_menu').value;
        var harga = parseFloat(document.getElementById('harga').value);
        var jumlah = parseInt(document.getElementById('jumlah').value);
        var subtotal = harga * jumlah;

        cartItems.push({
          namaMenu: nama_menu,
          harga: harga,
          jumlah: jumlah,
          subtotal: subtotal
        });

        updateCartItems();
        updateTotalAmount();
        updateCartCount();
      });

      function updateCartItems() {
        var cartItemsTableBody = document.getElementById('cartItems');
        cartItemsTableBody.innerHTML = '';

        cartItems.forEach(function(item, index) {
          var row = document.createElement('tr');
          row.innerHTML = `
                <td>${item.namaMenu}</td>
                <td>${item.harga}</td>
                <td>${item.jumlah}</td>
                <td>${item.subtotal}</td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="removeCartItem(${index})">Hapus</button></td>
            `;
          cartItemsTableBody.appendChild(row);
        });
      }

      function updateTotalAmount() {
        var totalAmount = cartItems.reduce(function(acc, item) {
          return acc + item.subtotal;
        }, 0);
        document.getElementById('totalAmount').textContent = totalAmount;
        document.getElementById('total').value = totalAmount;
      }

      function removeCartItem(index) {
        cartItems.splice(index, 1);
        updateCartItems();
        updateTotalAmount();
        updateCartCount();
      }

      document.getElementById('checkoutForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(event.target);
        formData.append('cart', JSON.stringify(cartItems));

        fetch('checkout.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.text())
          .then(data => {
            console.log(data);
            var cartModal = bootstrap.Modal.getInstance(document.getElementById('cartModal'));
            cartModal.hide();
            event.target.reset();
            cartItems = [];
            updateCartItems();
            updateTotalAmount();
          })
          .catch(error => {
            console.error('Error:', error);
          });
      });
    });
  </script>
</body>

</html>