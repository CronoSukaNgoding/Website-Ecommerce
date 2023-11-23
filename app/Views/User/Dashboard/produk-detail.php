<?= $this->extend('Template/template') ?>
<?php $this->section('css');?>

<?php $this->endSection();?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
         
                <div class="row">

                        
                    <div class="col-xl-6">
                        <div class="product-detai-imgs">
                           

                            <div class="row">
                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                           
                                                <div id="carouselExampleIndicators<?= $result->id ?>" class="carousel slide" data-bs-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <?php
                                                        for ($i = 0; $i < count($daftar_foto); $i++) :
                                                            ?>
                                                            <li data-bs-target="#carouselExampleIndicators<?= $result->id ?>" data-bs-slide-to="<?= $i ?>" <?= ($i === 0) ? 'class="active"' : '' ?>></li>
                                                        <?php endfor; ?>

                                                    </ol>
                                                    <div class="carousel-inner" role="listbox">
                                                        <?php
                                                            for ($i = 0; $i < count($daftar_foto); $i++) :
                                                                ?>
                                                                <div class="carousel-item <?= ($i === 0) ? 'active' : '' ?>">
                                                                    
                                                                    <?php if (filter_var($daftar_foto[$i], FILTER_VALIDATE_URL)) : ?>
                                                                        <!-- Jika itu adalah URL, gunakan iFrame -->
                                                                        <iframe class="d-block w-100"  width="315" height="360" src="<?= $daftar_foto[$i] ?>" frameborder="0" allowfullscreen></iframe>
                                                                    <?php else : ?>
                                                                        <!-- Jika bukan URL, tampilkan gambar -->
                                                                        <img class="d-block img-fluid" src="/admin/produk/<?= $daftar_foto[$i] ?>" alt="Slide <?= ($i + 1) ?>">
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endfor; ?>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators<?= $result->id ?>" role="button" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators<?= $result->id ?>" role="button" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                     
                        </div>
                    </div>
    
                    <div class="col-xl-6">

                        <div class="mt-4 mt-xl-3">
                            <a href="javascript: void(0);" class="text-primary"><?= $result->kategori?></a>
                            <h4 class="mt-1 mb-3"><?= $result->nama_produk?></h4>
                            <h5 class="mb-4">Price : <span class="text-muted me-2"></span> <b id="harga_produk_p"><?= $result->harga_produk?></b></h5>
                            <p class="text-muted mb-4"><?= $result->keterangan?></p>
                            <a href="#" onclick="tambahKeranjang(this)" data-kodeproduk="<?= $result->id ?>">
                                <button type="button" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                    <i class="bx bx-cart me-2"></i>Add to cart
                                </button>
                            </a>

                            <!-- <div class="product-color">
                                <h5 class="font-size-15">Color :</h5>
                                <a href="javascript: void(0);" class="active">
                                    <div class="product-color-item border rounded">
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                    </div>
                                    <p>Black</p>
                                </a>
                                <a href="javascript: void(0);">
                                    <div class="product-color-item border rounded">
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                    </div>
                                    <p>Blue</p>
                                </a>
                                <a href="javascript: void(0);">
                                    <div class="product-color-item border rounded">
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                    </div>
                                    <p>Gray</p>
                                </a>
                            </div> -->
                        </div>
                 
                    </div>

                </div>
                <!-- end row -->

                <!-- end Specifications -->
            </div>
        </div>
    </div>
</div>
<script>
    var pHarga = document.getElementById("harga_produk_p");
    function formatHarga() {
        var harga = pHarga.textContent.replace(/\D/g, ''); 
        var hargaFormat = "Rp " + new Intl.NumberFormat().format(harga);
        pHarga.textContent = hargaFormat;
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
            console.log(message);
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
                        buttonText: 'Cek <span class="primary">Keranjang</span>',});

        },
        error: function (ts) {
            alert(ts.responseText);
        },
    });
        }

        function getCart() {
            $.ajax({
                type: "get",
                dataType: "html",
                url: "seeCart",
                success: function (msg) {
                    $("#tampilProduk").html(msg);
                },
                error: function (ts) {
                    alert(ts.responseText);
                },
            });
        }

     
</script>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>
<?=$this->endSection()?>