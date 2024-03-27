const profileImage = document.getElementById('profileImage');
const dropdownMenu = document.getElementById('dropdownMenu');

profileImage.addEventListener('click', function() {
    dropdownMenu.classList.toggle('show'); // Class name changed for clarity
});

const peminjaman = document.getElementById('peminjaman');
const dropdown = document.getElementById('dropdown');
peminjaman.addEventListener('click', function() {
    dropdown.classList.toggle('show'); // Class name changed for clarity
});

//modal