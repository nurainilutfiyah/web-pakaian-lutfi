
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  bg-dark">
        <div class="container">
        <a class="navbar-brand text-white" href=""><strong>LYN</strong> Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
          <?php 
          if (isset($_SESSION['status'])){
            if ($_SESSION['status']=="admin"){?>
            <li class="nav-item">
              <a class="nav-link mr-4" href="index.php?include=admin">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="index.php?include=daftar_menu">PRODUCT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="index.php?include=ulasan_admin">RATE ITEM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="index.php?include=pesanan">SHOP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="index.php?include=logout">LOGOUT</a>
            </li>
          <?php }elseif($_SESSION['status']=="user"){?>
            <li class="nav-item">
              <a class="nav-link mr-4" href="index.php?include=user">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="index.php?include=menu_pembeli">PRODUCT</a>
            </li>
             </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="index.php?include=tampil_ulasan">RATE ITEM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="index.php?include=pesanan_pembeli">SHOP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="index.php?include=logout">LOGOUT</a>
            </li>
         <?php  }
        }?>
            
          </ul>
        </div>
       </div> 
      </nav>
  <!-- Akhir Navbar -->