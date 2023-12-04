<!-- JAVASCRIPT -->
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/assets/libs/node-waves/waves.min.js"></script>

<!-- dashboard init -->
<script src="/assets/js/pages/dashboard.init.js"></script>

<!--tinymce js-->
<script src="/assets/libs/tinymce/tinymce.min.js"></script>

<!-- bootstrap datepicker -->
<script src="/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- App js -->
<script src="/assets/js/app.js"></script>

<!-- Plugins js -->
<script src="/assets/libs/dropzone/min/dropzone.min.js"></script>

<!-- form wizard init -->
<script src="/assets/js/pages/form-wizard.init.js"></script>

<!-- form repeater js -->
<script src="/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>

<script src="/assets/js/pages/form-repeater.int.js"></script>


<!-- jquery step -->
<!-- <script src="/assets/libs/jquery-steps/build/jquery.steps.min.js"></script> -->
<!-- <script src="{{assets('/libs/jquery-steps/build/jquery.steps.min.js}}"></script> -->

<script src="/assets/js/pages/job-list.init.js"></script>
<script src="/assets/libs/select2/js/select2.min.js"></script>
<!-- form advanced init -->
<script src="/assets/js/pages/form-advanced.init.js"></script>

<script src="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

<!-- Required datatable js -->
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/libs/jszip/jszip.min.js"></script>
<!-- <script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script> -->
<!-- <script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script> -->
<script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="/assets/js/pages/datatables.init.js"></script>

<script src="/assets/js/app.js"></script>



<!-- toastr plugin -->
<!-- <script src="/assets/libs/toastr/build/toastr.min.js"></script> -->

<!-- toastr init -->
<!-- <script src="/assets/js/pages/toastr.init.js"></script> -->

<script src="/assets/libs/%40chenfengyuan/datepicker/datepicker.min.js"></script>
<script src="/assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

<!-- validation -->
<script src="/assets/js/pages/form-validation.init.js"></script>

<!-- select 2 plugin -->
<script src="/assets/libs/select2/js/select2.min.js"></script>

<!-- dropzone plugin -->
<script src="/assets/libs/dropzone/min/dropzone.min.js"></script>

<!-- App js -->
<script src="/assets/js/pages/modal.init.js"></script>

<!-- masonry pkgd -->
<script src="assets/libs/masonry-layout/masonry.pkgd.min.js"></script>

<script src="/assets/js/ajx.js"></script>




<script>
    var tdsHarga = document.querySelectorAll("#harga_produk_p");


    function formatHarga() {
        tdsHarga.forEach(function (td) {
            var harga = td.textContent.replace(/\D/g, '');
            var hargaFormat = "Rp. " + new Intl.NumberFormat().format(harga);
            td.textContent = hargaFormat;
        });
    }


    formatHarga();
</script>

<script>
    function tambahKeranjang(isi) {
        var kodeProduk = $(isi).data('kodeproduk');
        $.ajax({
            url: "/cart",
            method: "POST",
            data: {
                id: kodeProduk
            },
            success: function (data) {

                var message = data.message;
                toastr.success(data.message);
                getCart();

                $('body').alert({
                    x: 'right',
                    y: 'bottom',
                    xOffset: 30,
                    yOffset: 30,
                    alertSpacing: 40,
                    fadeDelay: 0.3,
                    autoClose: false,
                    template: 'survey',
                    buttonSrc: ['cart'],
                    buttonText: 'Cek <span class="primary">Keranjang</span>',
                });
            },
            error: function (ts) {
                alert(ts.responseText);
            },
        });
    }


    function getCart() {
        return new Promise((resolve, reject) => {

            $.ajax({
                url: '/seeCart',
                type: 'get',
                dataType: 'json',

                success: function (response) {
                    resolve(response.output);
                    populateKeranjang(response.output);
                },
                error: function (error) {
                    reject(error);
                }
            });
        });
    }


    function populateKeranjang(data) {

        const keranjangContainer = document.getElementById('keranjang-container');
        const keranjangHTML = `
    <div class="p-3">
        <h6 class="m-0">Keranjang Anda</h6>
    </div>
    <div style="max-height: 300px; overflow-y: auto;">
        <ul class="list-group list-group-flush">
            ${data.map(item => `
                <li class="list-group-item listItem">
                    <div class="product-item d-flex align-items-center">
                       
                    <img class="avatar-sm" src="/admin/produk/${item.photo_produk}" alt="Product Image">
                        <div class="product-details ms-3">
                            <h5 class="product-name">${item.nama_produk}</h5>
                            <p class="product-price">Rp ${parseFloat(item.harga_produk).toLocaleString('id-ID')}</p>
                        </div>
                    </div>
                </li>
            `).join('')}
        </ul>
    </div>
    <div class="p-2 border-top d-grid">
        <div class="total-price text-center">
            Total Harga: <span id="totalHarga">Rp 0</span>
        </div>
        <a class="btn btn-sm btn-link font-size-14 text-center" href="<?= base_url('/keranjang')?>">
            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">Cek Keranjang</span>
        </a>
    </div>
    `;
        keranjangContainer.innerHTML = keranjangHTML;


        const totalHarga = data.reduce((acc, item) => {
            return acc + parseFloat(item.harga_produk.replace(/\D/g, ''));
        }, 0);


        document.getElementById('totalHarga').textContent = 'Rp ' + totalHarga.toLocaleString('id-ID');


        const jumlahItem = document.getElementById('jumlahItem');
        jumlahItem.textContent = data.length;
    }

    getCart().then(function (dataKeranjang) {


        populateKeranjang(dataKeranjang);
    }).catch(function (error) {

        console.error('Error:', error);
    });
</script>

<script>
    function search() {
        var keyword = $("#searchInput").val();

        
        $.ajax({
            url: "/search", 
            type: "GET",
            data: {
                keyword: keyword
            },
            dataType: "json",
            success: function (response) {
                var searchResults = $("#searchResults");
                searchResults.empty();

                if (response.length > 0) {

                    searchResults.empty();

                    var resultList = $("<ul>").addClass("list-group list-group-flush");

                    for (var i = 0; i < response.length; i++) {
                        var item = response[i];
                        var daftar_foto = item.daftar_foto.split(',');
                        var firstPhoto = daftar_foto[0];


                        var listItem = $("<a>")
                            .attr("href", "/produk-detail/" + item.id_produk) 
                            .addClass("list-group-item listItem")
                            .addClass("text-decoration-none") 
                            .css("color", "inherit"); 

        
                        var productItem = $("<div>").addClass("product-item d-flex align-items-center");

                        var productImage = $("<img>")
                            .addClass("avatar-sm")
                            .attr("src", "/admin/produk/" + firstPhoto)
                            .attr("alt", "Product Image");
      


           
                        var productDetails = $("<div>").addClass("product-details ms-3");

                
                        var productName = $("<h5>").addClass("product-name").text(item.nama_produk);

                        var productPrice = $("<p>")
                            .addClass("product-price")
                            .text("Rp " + parseFloat(item.harga_produk).toLocaleString("id-ID"));

                     
                        productDetails.append(productName, productPrice);
                        productItem.append(productImage, productDetails);
                        listItem.append(productItem);

                      
                        resultList.append(listItem);
                    }

             
                    searchResults.append(resultList);
                } else {
                   
                    var noResultsMessage = `<ul class="list-group list-group-flush">
                                                    <li class="list-group-item listItem">
                                                        <div class="product-item d-flex align-items-center">
                                                            <div class="product-details ms-3">
                                                                <p class="product-name" style="margin-top:10px; margin-bottom: 10px; padding-left: 10px;">Mohon input terlebih dahulu.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                
                                            </ul>`
                    searchResults.append(noResultsMessage);
                }
            },
            error: function (error) {
                html =`<ul class="list-group list-group-flush">
                <li class="list-group-item listItem">
                    <div class="product-item d-flex align-items-center">
                        <div class="product-details ms-3">
                            <p class="product-name" style="margin-top:10px; margin-bottom: 10px; padding-left: 10px;">${error.responseText}</p>
                        </div>
                    </div>
                </li>
            
        </ul>`
                $("#searchResults").html(html);
                
            }
        });
    }
</script>