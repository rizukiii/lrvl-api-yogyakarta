/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById("preview-image");
        output.src = reader.result;
        output.classList.remove("d-none"); // Tampilkan gambar
    };
    reader.readAsDataURL(event.target.files[0]);
}

document.addEventListener("DOMContentLoaded",function(){
    // daftar menu dan rutenya
    let menuItems = [
        { name: "dashboard", url: "{{ route('dashboard') }}" },
        { name: "news", url: "{{ route('news.index') }}" },
    ]

    // input pencarian
    let searchInput = document.getElementById("navbarSearchInput");

    // Event saat mengetik di search bar
    searchInput.addEventListener("keyup", function(event){
        if(event.key === "Enter"){
            let query = searchInput.value.toLowerCase();
            let foundItem = menuItems.find(item => item.name.toLowerCase().includes(query));

            if(foundItem){
                window.location.href = foundItem.url;
            } else {
                alert("Menu tidak di temukan!")
            }
        }
    })
})
