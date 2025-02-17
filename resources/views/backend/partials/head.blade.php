@push('head')

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kota Yogyakarta : @yield('title')</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset('kotayogyakarta.png') }}" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('start') }}/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let menuItems = [{
                        name: "Dashboard",
                        url: "{{ route('dashboard') }}"
                    },
                    {
                        name: "Berita",
                        url: "{{ route('news.index') }}"
                    },
                    {
                        name: "Tambah Berita",
                        url: "{{ route('news.create') }}"
                    },
                    {
                        name: "Pengumuman",
                        url: "{{ route('announcement.index') }}"
                    },
                    {
                        name: "Tambah Pengumuman",
                        url: "{{ route('announcement.create') }}"
                    },
                    {
                        name: "Tips & Trick",
                        url: "{{ route('tips_trick.index') }}"
                    },
                    {
                        name: "Tambah Tips & Trick",
                        url: "{{ route('tips_trick.create') }}"
                    },
                    {
                        name: "Nomor Darurat",
                        url: "{{ route('emergency.index') }}"
                    },
                    {
                        name: "Tambah Nomor Darurat",
                        url: "{{ route('emergency.create') }}"
                    },
                    {
                        name: "Tentang Kami",
                        url: "{{ route('about.index') }}"
                    },
                    {
                        name: "Akomodasi",
                        url: "{{ route('accommodation.index') }}"
                    },
                    {
                        name: "Tambah Akomodasi",
                        url: "{{ route('accommodation.create') }}"
                    },
                    {
                        name: "Wisata",
                        url: "{{ route('tour.index') }}"
                    },
                    {
                        name: "Tambah Wisata",
                        url: "{{ route('tour.create') }}"
                    },
                    {
                        name: "Kuliner",
                        url: "{{ route('culinary.index') }}"
                    },
                    {
                        name: "Tambah Kuliner",
                        url: "{{ route('culinary.create') }}"
                    },
                    {
                        name: "Terminal",
                        url: "{{ route('terminal.index') }}"
                    },
                    {
                        name: "Tambah Terminal",
                        url: "{{ route('terminal.create') }}"
                    },
                    {
                        name: "Stasiun",
                        url: "{{ route('station.index') }}"
                    },
                    {
                        name: "Tambah Stasiun",
                        url: "{{ route('station.create') }}"
                    },
                    {
                        name: "Bandara",
                        url: "{{ route('airport.index') }}"
                    },
                    {
                        name: "Tambah Bandara",
                        url: "{{ route('airport.create') }}"
                    },
                    {
                        name: "Laporan",
                        url: "{{ route('report.index') }}"
                    },
                ];

                let searchInput = document.getElementById("navbarSearchInput");

                if (searchInput) { // Pastikan elemen ada sebelum menambahkan event listener
                    searchInput.addEventListener("keyup", function(event) {
                        if (event.key === "Enter") { // Tekan Enter untuk melakukan navigasi
                            navigateToMenu();
                        }
                    });
                }

                window.navigateToMenu = function() {
                    let query = searchInput.value.toLowerCase();
                    let foundItem = menuItems.find(item => item.name.toLowerCase().includes(query));

                    if (foundItem) {
                        window.location.href = foundItem.url;
                    } else {
                        alert("Menu tidak ditemukan!");
                    }
                };
            });
        </script>
    </head>
@endpush
