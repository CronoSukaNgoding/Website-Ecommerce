<?= $this->extend('Template/template') ?>
<?php $this->section('css');?>
<style>
        .slideshow-container {
            max-width: 100%;
            position: relative;
            margin: auto;
        }

        .mySlides {
            display: none;
        }

        .dot-container {
            text-align: center;
            margin-top: 20px;
        }

        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: transparent;
            border: 2px solid #bbb; /* Add a border to make the dots visible */
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease, border-color 0.6s ease; /* Add transition for smoother effect */
            cursor: pointer;
        }

        .active {
            /* background-color: #717171; */
            border-color: transparent; /* Change border-color for the active dot */
        }
    </style>
<?php $this->endSection();?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
         
                <div class="row">
                <?php
					foreach ($result as $value):
						?>
                    <div class="col-xl-6">
                        <div class="product-detai-imgs">
            
                            <div class="row">
                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                            <div class="slideshow-container">
                                                <div class="mySlides">
                                                    <img src="<?= base_url('admin/produk/'.$value->photo_produk) ?>" alt="" class="img-fluid mx-auto d-block" >
                                                </div>
                                                <div class="mySlides">
                                                    <iframe width="315" height="360" src="<?=$value->link_address?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>

                                            <div class="dot-container">
                                                <span class="dot" onclick="currentSlide(1)"></span>
                                                <span class="dot" onclick="currentSlide(2)"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                     
                        </div>
                    </div>
    
                    <div class="col-xl-6">

                        <div class="mt-4 mt-xl-3">
                            <a href="javascript: void(0);" class="text-primary"><?= $value->kategori?></a>
                            <h4 class="mt-1 mb-3"><?= $value->nama_produk?></h4>
                            <h5 class="mb-4">Price : <span class="text-muted me-2"></span> <b id="harga_produk_p"><?= $value->harga_produk?></b></h5>
                            <p class="text-muted mb-4"><?= $value->keterangan?></p>
                            <a href="#" onclick="tambahKeranjang(this)" data-kodeproduk="<?= $value->id ?>">
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
                    <?php
                        endforeach;
                        ?>
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