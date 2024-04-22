<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="../assets/css/index.css">
<link rel=" preconnect " href="https://fonts.googleapis.com ">
<link rel="preconnect " href="https://fonts.gstatic.com " crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap " rel="stylesheet ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<img class="logo" src="../assets/img/logoNew.png" alt="">
<link rel="stylesheet" href="../assets/css/pinjam.css">
<ul class="navlist">

    <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8001/dashboard-admin">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8001/DataPeminjam">
            <i class="fas fa-fw fa-user"></i>
            <span>Daftar Peminjam</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8001/HistoryPeminjam">
            <i class="fas fa-fw fa-user"></i>
            <span>History Peminjam</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8001/data-alat">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Daftar Alat</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8001/tambahalat">
            <i class="fas fa-fw fa-plus"></i>
            <span>Tambah Alat</span></a>
    </li>
</ul>
<div class="profile-container" id="profileContainer">
    <img class="profile" src="../assets/img/option.png" alt="" id="profileImage">
    <div class="dropdown-menu" id="dropdownMenu">
        <li><a>Level: {{ Auth::user()->role }}</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Log Out</a></li>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="../assets/js/profile.js"></script>
