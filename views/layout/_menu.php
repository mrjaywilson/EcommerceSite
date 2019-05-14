<nav class="navbar navbar-dark bg-dark navbar-expand-sm mt-3">
  <a class="navbar-brand" href="BrowseProducts.php">
    JayBird
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-8" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbar-list-8">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="BrowseProducts.php">Catalog</a>
      </li>
      <?php
      
          if (isset($_SESSION['KAVI'])) {
              echo "<li class='nav-item'>";
              echo "<a class='nav-link' href='SalesReport.php'>Generate Report</a>";
              echo "</li>";
          }
      
      ?>
    </ul>
    
    <div class="right-side d-flex">
      <form class="form-inline">
        <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
      </form>
      <ul class="navbar-nav">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="../content/images/64572.png" width="26" height="26" class="rounded-circle">
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink">
              <?php
                  if (isset($_SESSION['KAVI'])) {
                      echo "<a class='dropdown-item' href='#'>Edit Profile</a>";
                      echo "<a class='dropdown-item' href='UserCart.php'>My Cart</a>";
                      echo "<form action='../controllers/LogoutController.php'>";
                      echo "<a class='dropdown-item' onclick=\"$(this).closest('form').submit()\">Log Out</a>";
                      echo "</form>";
                  } else {
                      echo "<a class='dropdown-item' href='Login.php'>Log In</a>";
                  }
              ?>
          </div>
        </li>   
      </ul>
    </div>
  </div>
</nav>