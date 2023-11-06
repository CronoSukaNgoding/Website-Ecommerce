<?= $this->extend('Template/template') ?>
<?php $this->section('css');?>
     <style>

.card{
    transition: box-shadow 0.3s ease;
}
.card:hover {
  box-shadow: 3px 3px 10px rgba(211, 211, 211, 1);
}
</style>
<?php $this->endSection();?>



<?= $this->section('IsKonten') ?>
<div class="row">
    <div id="carouselExampleSlidesOnly" class="carousel slide col-xl-8" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid img-dark" src="assets/images/small/img-6.jpg" alt="First slide">
                <a class="btn btn-lg btn-outline-warning waves-effect waves-light btn-on-image"
                    style="width: 200px">Beli Sekarang</a>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid img-dark" src="assets/images/small/img-2.jpg" alt="Second slide">
                <a class="btn btn-lg btn-outline-warning waves-effect waves-light btn-on-image"
                    style="width: 200px">Beli Sekarang</a>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid img-dark" src="assets/images/small/img-3.jpg" alt="Third slide">
                <a class="btn btn-lg btn-outline-warning waves-effect waves-light btn-on-image"
                    style="width: 200px">Beli Sekarang</a>
            </div>
        </div>
    </div>

    <div class="vstack gap-2 col-lg-4">

        <div class="card">
            <img class="card-img img-fluid banner-size img-dark" src="assets/images/small/img-6.jpg" alt="Card image">
            <div class="card-img-overlay">
                <h4 class="card-title text-white">Card title</h4>
                <p class="card-text text-white">This is a wider card with supporting text below as a
                    natural lead-in to additional content. This content is a little bit
                    longer.</p>
                <p class="card-text">
                    <a class="btn btn-outline-warning waves-effect waves-light">Beli Sekarang</a>
                </p>
            </div>
        </div>

        <div class="card">
            <img class="card-img img-fluid banner-size img-dark" src="assets/images/small/img-6.jpg" alt="Card image">
            <div class="card-img-overlay">
                <h4 class="card-title text-white">Card title</h4>
                <p class="card-text text-white">This is a wider card with supporting text below as a
                    natural lead-in to additional content. This content is a little bit
                    longer.</p>
                <p class="card-text">
                    <a class="btn btn-outline-warning waves-effect waves-light">Beli Sekarang</a>
                </p>
            </div>
        </div>

    </div>

</div>
<!-- end row -->


<!-- Awal Kategori -->
<div class="kategori  mt-3 ">
<h4>Kategori </h4>
    <div class="row text-center  ">
        
        <?php
        foreach ($kategori as $value):
        ?>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
             <div class="card">
                <div class="card-body">
                     <a href="#" class="kategori-link" data-kategori-id="<?= $value->id ?>">
                        <img src="<?= base_url('admin/kategori/' . $value->icon) ?>" alt="" class="img-categori mt-3">
                    </a>
                    <p class="mt-2"><?= $value->kategori ?></p>
                    <input type="hidden" id="kategori-id-<?= $value->id ?>" value="<?= $value->id ?>">
                </div>
            </div>

        </div>
        <?php
        endforeach;
        ?>
    </div>
    <div class="row text-center row-container d-flex justify-content-center p-3">
        <h4>Kategori berdasarkan brand</h4>
        <?php
        foreach ($subKat as $value):
            ?>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
            <div class="menu-subKat">
                <a href="#" class="subKat-link"><?= $value->sub_kategori?></a>
                <input type="hidden" id="subKat-id" value="<?= $value->id ?>">
            </div>
        </div>



        <?php
        endforeach;
        ?>
    </div>
</div>
<!-- Akhir Kategori -->

<div class="row">

    <div id="produk-container">
        <div class="row">
            
        </div>
    </div>
    
    <!-- end row -->


   
</div>


<script>
    $.ajax({
        type: "GET",
        url: "/get-product", 
        success: function (response) {

                var data = JSON.parse(response);
                var newHTML = "";
                // console.log(data);
            data.forEach(function (product) {
                newHTML += `
                   <div class="col-md-6 col-xl-3">
                    <a href="/produk-detail/${product.produk}" class="link-card">
                        <div class="card" >
                        <div class="card-body">
                            <img class="card-img-top img-fluid product-img mb-3"
                                src="/admin/produk/${product.photo_produk}" alt="Card image cap">
                                <h4 class="card-title">${product.nama_produk}</h4>
                                <p class="card-text card-produk" id="harga_produk_p">${product.harga_produk}</p>
                                <p class="card-text card-produk">${product.kategori}</p>
                                <p class="card-text card-produk">Sisa Stok : ${product.stok}</p>
                                
                                <!-- Tampilkan data peringkat di sini -->
                                <div class="rating" data-rating="${product.rata_rata_peringkat}">
                                    <!-- Tampilan bintang diisi oleh JavaScript -->
                                </div>
                                
                                
                                <a onclick="tambahKeranjang(this)" data-kodeproduk="${product.produk}"
                                    class="btn btn-outline-primary waves-effect waves-light w-lg mt-1 d-flex justify-content-center">
                                    <i class="bx bx-cart me-2"></i>Add to cart
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
                `;
            });

            $("#produk-container .row").html(newHTML);
            const products = data;
            products.forEach(product => {
                const filledStars = Math.round(product.rata_rata_peringkat);
                let ratingHTML = '<p class="text-muted float-start me-3">';
                
                if (filledStars === 0) {
                    ratingHTML += '(Produk ini belum di rating)';
                } else {
                    for (let i = 0; i < 5; i++) {
                        if (i < filledStars) {
                            ratingHTML += '<span class="bx bxs-star text-warning"></span>';
                        } else {
                            ratingHTML += '<span class="bx bxs-star"></span>';
                        }
                    }
                    ratingHTML += ' (' + product.rata_rata_peringkat + ')';
                }
                
                ratingHTML += '</p';
                
                const produkElements = document.querySelectorAll(`[data-rating="${product.rata_rata_peringkat}"]`);
                produkElements.forEach(produkElement => {
                    produkElement.innerHTML = ratingHTML;
                });
            });



        }
    });
    document.addEventListener("DOMContentLoaded", function () {
        var kategoriLinks = document.querySelectorAll(".kategori-link");      
        kategoriLinks.forEach(function (link) {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                var categoryId = link.getAttribute("data-kategori-id");
                var kategoriId = document.getElementById("kategori-id-" + categoryId).value;

                $.ajax({
                    type: "GET",
                    url: "/get-kategori",
                    data: {
                        categoryId: kategoriId
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        var newHTML = "";

                        if(data[0].produk.length != 0){
                            data[0].produk.forEach(function (product) {
                            var formattedHarga = "Rp " + parseFloat(product.harga_produk).toLocaleString("id-ID");

                            newHTML += `
                                    <div class="col-md-6 col-xl-3">
                                    <a href="/produk-detail/${product.idProduk}" class="link-card">
                                        <div class="card" >
                                        <div class="card-body">
                                            <img class="card-img-top img-fluid product-img mb-3"
                                                src="/admin/produk/${product.photo_produk}" alt="Card image cap">
                                                <h4 class="card-title">${product.nama_produk}</h4>
                                                <p class="card-text card-produk" id="harga_produk_p">${formattedHarga}</p>
                                                <p class="card-text card-produk">${product.kategori}</p>
                                                <p class="card-text card-produk">Sisa Stok : ${product.stok}</p>
                                                <!-- Tampilkan data peringkat di sini -->
                                                <div class="rating" data-rating="${product.rata_rata_peringkat}">
                                                    <!-- Tampilan bintang diisi oleh JavaScript -->
                                                </div>
                                                <a onclick="tambahKeranjang(this)" data-kodeproduk="${product.idProduk}"
                                                    class="btn btn-outline-primary waves-effect waves-light w-lg mt-1 d-flex justify-content-center">
                                                    <i class="bx bx-cart me-2"></i>Add to cart
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            `;
                        });
                    
                        $("#produk-container .row").html(newHTML);
                        const products = data[0].produk;
                        products.forEach(product => {
                            const filledStars = Math.round(product.rata_rata_peringkat);
                            let ratingHTML = '<p class="text-muted float-start me-3">';
                            
                            if (filledStars === 0) {
                                ratingHTML += '(Produk ini belum di rating)';
                            } else {
                                for (let i = 0; i < 5; i++) {
                                    if (i < filledStars) {
                                        ratingHTML += '<span class="bx bxs-star text-warning"></span>';
                                    } else {
                                        ratingHTML += '<span class="bx bxs-star"></span>';
                                    }
                                }
                                ratingHTML += ' (' + product.rata_rata_peringkat + ')';
                            }
                            
                            ratingHTML += '</p';
                            
                            const produkElements = document.querySelectorAll(`[data-rating="${product.rata_rata_peringkat}"]`);
                            produkElements.forEach(produkElement => {
                                produkElement.innerHTML = ratingHTML;
                            });
                        });
                        }else{
                            newHTML = `
                                        <div class="d-flex justify-content-center ">
                                            <div class="card" style="box-shadow: 3px 3px 10px rgba(211, 211, 211, 1);" >
                                                <div class="card-body">
                                                <p class="card-text card-produk" > Mohon maaf produk sedang tidak tersedia :)</p>
                                                </div>
                                            </div>
                                        </div>
                                `;
                            $("#produk-container .row ").html(newHTML);
                        }

                        
                    }
                });
            });
        });

        var SubkategoriLinks = document.querySelectorAll(".subKat-link");
        SubkategoriLinks.forEach(function (link) {
            link.addEventListener("click", function (e) {
                e.preventDefault();

                var SubcategoryId = link.parentElement.querySelector("input#subKat-id").value;

                $.ajax({
                    type: "GET",
                    url: "/get-sub-kategori", 
                    data: {
                        SubcategoryId: SubcategoryId
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        var newHTML = "";

                        if(data[0].produk.length != 0){
                            data[0].produk.forEach(function (product) {
                                var formattedHarga = "Rp " + parseFloat(product.harga_produk).toLocaleString("id-ID");
                                newHTML += `
                                        <div class="col-md-6 col-xl-3">
                                        <a href="/produk-detail/${product.idProduk}" class="link-card">
                                            <div class="card" >
                                            <div class="card-body">
                                                <img class="card-img-top img-fluid product-img mb-3"
                                                    src="/admin/produk/${product.photo_produk}" alt="Card image cap">
                                                    <h4 class="card-title">${product.nama_produk}</h4>
                                                    <p class="card-text card-produk" id="harga_produk_p">${formattedHarga}</p>
                                                    <p class="card-text card-produk">${product.kategori}</p>
                                                    <p class="card-text card-produk">Sisa Stok : ${product.stok}</p>
                                                    <!-- Tampilkan data peringkat di sini -->
                                                    <div class="rating" data-rating="${product.rata_rata_peringkat}">
                                                        <!-- Tampilan bintang diisi oleh JavaScript -->
                                                    </div>
                                                    <a onclick="tambahKeranjang(this)" data-kodeproduk="${product.idProduk}"
                                                        class="btn btn-outline-primary waves-effect waves-light w-lg mt-1 d-flex justify-content-center">
                                                        <i class="bx bx-cart me-2"></i>Add to cart
                                                    </a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                `;
                            });

                            $("#produk-container .row").html(newHTML);
                            const products = data[0].produk;
                            products.forEach(product => {
                                const filledStars = Math.round(product.rata_rata_peringkat);
                                let ratingHTML = '<p class="text-muted float-start me-3">';
                                
                                if (filledStars === 0) {
                                    ratingHTML += '(Produk ini belum di rating)';
                                } else {
                                    for (let i = 0; i < 5; i++) {
                                        if (i < filledStars) {
                                            ratingHTML += '<span class="bx bxs-star text-warning"></span>';
                                        } else {
                                            ratingHTML += '<span class="bx bxs-star"></span>';
                                        }
                                    }
                                    ratingHTML += ' (' + product.rata_rata_peringkat + ')';
                                }
                                
                                ratingHTML += '</p';
                                
                                const produkElements = document.querySelectorAll(`[data-rating="${product.rata_rata_peringkat}"]`);
                                produkElements.forEach(produkElement => {
                                    produkElement.innerHTML = ratingHTML;
                                });
                            });
                        }else{
                            newHTML = `
                                       <div class="d-flex justify-content-center ">
                                            <div class="card" style="box-shadow: 3px 3px 10px rgba(211, 211, 211, 1);"  >
                                                <div class="card-body">
                                                <p class="card-text card-produk" > Mohon maaf produk sedang tidak tersedia :)</p>
                                                </div>
                                            </div>
                                        </div>
                                `;
                            $("#produk-container .row ").html(newHTML);
                        }
                    }
                });
            });
        });

    });
</script>




<?=$this->endSection()?>