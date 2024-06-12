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

    .catalog-item:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<?php
 // Pastikan file ini berisi koneksi ke database dan fungsi ambilMenu()
include 'menu.php';
$menus = ambilMenu();
?>


<body>
  <section id="product">
    <div class="section-title">
      <h2>Menu Pilihan</h2>
    </div>
    <div class="galery">
      <?php foreach ($menus as $menu) { ?>
        <div class="image" data-aos="fade-up">
          <img src="./uploaded_files/<?php echo $menu['image']; ?>" alt="<?php echo $menu['nama']; ?>">
          
            <h4><?php echo $menu['nama']; ?></h4>
            <p><?php echo $menu['deskripsi']; ?></p>
            <p><strong></strong> Rp <?php echo number_format($menu['harga'], 0, ',', '.'); ?></p>
          </div>
      
      <?php } ?>
    </div>
  </section>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    $(document).ready(function () {
      // Initialize AOS
      AOS.init();
    });
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

   
      
      
      <article id="testimoni" class="card judul">
        
        <style>

        .text-center {
          text-align: center; /* Centers the text within the element */
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
                    img.src = "assets/img/person.jpg";  // Path to the static image
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
.rating label:hover ~ label,
.rating input[type="radio"]:checked ~ label {
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
      <!-- Display available seats -->
      <p id="available-seats"></p>
      <!-- Form fields untuk reservasi -->
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
        <button type="submit">Simpan</button>
      </form>
      <button type="button" class="back-button">Kembali</button>
    </div>
  </div>
</article>


<!-- alert untuk kritik dan saran -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  // Get the modal
  var modalRevenu = document.getElementById("modalRevenu");
  var modalFeedback = document.getElementById("modalFeedback");

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

  // Fetch available seats and update the display
  fetch('get_available_seats.php')
    .then(response => response.json())
    .then(data => {
      document.getElementById('available-seats').textContent = 'Available seats: ' + data.available_seats;
    })
    .catch(error => {
      console.error('Error fetching available seats:', error);
      document.getElementById('available-seats').textContent = 'Error loading available seats';
    });

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

            // Update available seats
            fetch('get_available_seats.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('available-seats').textContent = 'Available seats: ' + data.available_seats;
                })
                .catch(error => console.error('Error fetching available seats:', error));
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

  // Get the feedback button that opens the feedback modal
  var feedbackButton = document.getElementById("feedbackButton");

  // When the user clicks the feedback button, open the feedback modal
  feedbackButton.onclick = function(event) {
    event.preventDefault(); // Prevent default link behavior
    modalFeedback.style.display = "block";
  }

  // When the user clicks anywhere outside of the feedback modal, close it
  window.onclick = function(event) {
    if (event.target == modalFeedback) {
      modalFeedback.style.display = "none";
    }
  }
</script>


<style>
.back-button {
  margin-top: 20px;
  background-color: grey; /* Sets the background color to grey */
  display: block; /* Ensures the element is treated as a block element */
  margin-left: auto; /* Centers the button horizontally */
  margin-right: auto; /* Centers the button horizontally */
  width: fit-content; /* Adjusts the width to fit the content */
  padding: 10px 20px; /* Optional: Adds some padding for better appearance */
  text-align: center; /* Optional: Ensures text inside the button is centered */
  color: white; /* Optional: Sets the text color to white for better contrast */
  border: none; /* Optional: Removes any default border */
  border-radius: 5px; /* Optional: Adds rounded corners */
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

</script>

<script>
  // Tambahkan kode JavaScript berikut ke dalam file JavaScript Anda atau dalam tag <script>


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
</footer>

<script src="assets/js/script.js"></script>

</body>
</html>