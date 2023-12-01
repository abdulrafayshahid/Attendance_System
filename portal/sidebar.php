<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                   
                    
                   
                    
                    
                    <?php
if ($_SESSION['status'] == "logged in") {?>
                    <a class="nav-link" href="dashboard.php">
                        <div class="sb-nav-link-icon"><i class="feather-home"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="home.php">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        Home
                    </a>
                    <a class="nav-link" href="about.php">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        About Us
                    </a>
                    <a class="nav-link" href="services.php">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        Serivces
                    </a>
                    <a class="nav-link" href="portfolio.php">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        Portfolio
                    </a>
                    <a class="nav-link" href="portfolio_sites.php">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        Portfolio Sites
                    </a>
                   
                    <a class="nav-link" href="qualities.php">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        Qualities
                    </a>
                    <a class="nav-link" href="reviews.php">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        Reviews
                    </a>
                    <a class="nav-link" href="info.php">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        Info
                    </a>
                    <a class="nav-link" href="brands.php">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        Brands
                    </a>
                    

                    
                    <?php }?>
                </div>
            </div>
        </nav>
    </div>