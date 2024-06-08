<img class="logo" src="../assets/img/logoNew.png" alt="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="../assets/css/index.css">
<link rel=" preconnect " href="https://fonts.googleapis.com ">
<link rel="preconnect " href="https://fonts.gstatic.com " crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap " rel="stylesheet ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="../assets/css/pinjam.css">
<ul class="navlist">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard-mahasiswa') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('data-alat') }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>List Barang</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('list-pinjam-dosen') }}">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>List Pinjam</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('history-dosen') }}">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>History</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('about-mahasiswa') }}">
            <i class="fas fa-fw fa-address-book"></i>
            <span>About Us</span></a>
    </li>
</ul>
<div class="profile-container" id="profileContainer">
    <img class="profile" src="../assets/img/menu.png" alt="" id="profileImage">
    <div class="dropdown-menu" id="dropdownMenu">
        <li>
            @if (session('nim'))
                <p>{{ session('nim') }}</p>
            @else
                <p>NIM not found</p>
            @endif
        </li>
        <li><a>Level: {{ Auth::user()->role }}</a></li>
        <li> <a href=""> Ubah Sandi</a></li>
        <li role="separator" class="divider"></li>

        <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Log Out</a></li>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="../assets/js/profile.js"></script>
