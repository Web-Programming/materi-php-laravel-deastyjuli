<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#tentang" class="nav-link">Tentang</a></li>
            <li class="nav-item"><a href="#alumni" class="nav-link">Alumni</a></li>

        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!--end::Navbar Search-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!-- User Dropdown Menu -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="{{ asset('img/irfan.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">Muhammad Irfan</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="{{ asset('img/irfan.jpg') }}" class="img-circle elevation-2" alt="User Image">

                        <p>
                            Muhammad Irfan - Mahasiswa
                            <small>Since. 2024</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                    <a href="#" class="btn btn-default btn-flat float-end"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
                </ul>
            </li>
        </ul>
        </li>
        <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>

<script>
    // Menambahkan event listener untuk scroll perlambat pada klik navbar
    const scrollLinks = document.querySelectorAll('nav ul li a');

    scrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah default klik yang langsung menuju lokasi

            const targetId = this.getAttribute('href').substring(1); // Mendapatkan ID tujuan
            const targetElement = document.getElementById(targetId); // Mencari elemen tujuan

            // Menggunakan window.scrollTo dengan opsi behavior smooth
            window.scrollTo({
                top: targetElement.offsetTop, // Posisi elemen tujuan
                behavior: 'smooth' // Scroll yang halus
            });
        });
    });
</script>