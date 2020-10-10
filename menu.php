<nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
    <div class="container">          
        <a class="navbar-brand" href="index.html"><span class="lni-home"></span> GRAHA KIRANI ATAMBUA NTT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="lni-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
                <?php 
                if(isset($_SESSION["imel"])){
                    $ses_id = $_SESSION["id"];
                    echo"<li class='nav-item'><a class='nav-link page-scroll' href='./?".paramEncrypt("id=$ses_id")."'>Beranda</a></li>";
                    echo"<li class='nav-item'><a class='nav-link page-scroll' href='formpesan.html'>Konfirmasi</a></li>";
                }else{
                    echo'<li class="nav-item"><a class="nav-link page-scroll" href="./">Beranda</a></li>';    
                }
                
                ?>
                <li class="nav-item"><a class="nav-link page-scroll" href="paketsewa.html">Paket Sewa</a></li>
                <li class="nav-item"><a class="nav-link page-scroll" href="kontak.html">Kontak</a></li>
                    
                <?php
                    if(isset($_SESSION["imel"])){
                        $ses_id = $_SESSION["id"];
                        echo"
        <li class='nav-item'><a class='nav-link page-scroll' href='keranjang.html'>Keranjang</a></li>
        <li class='nav-item'><a class='nav-link page-scroll' href='logout.html'>Logout</a></li>
        <li class='nav-item'><a class='nav-link page-scroll' href='pendaftaran.html?".paramEncrypt("id=$ses_id")."'>Selamat datang, ".$_SESSION["user"]."</a></li>
                        ";
                    }
                   // var_dump($_SESSION)
                ?>

            </ul>              
        </div>
    </div>
</nav>