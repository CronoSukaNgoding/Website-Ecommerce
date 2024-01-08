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
                                                                        <img class="d-block img-fluid" src="<?=base_url()?>/admin/produk/<?= $daftar_foto[$i] ?>" alt="Slide <?= ($i + 1) ?>">
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

                            
                        </div>
                 
                    </div>
                    <div class="mt-5">
                        <h5>Komentar :</h5>
                        <?php
                        use CodeIgniter\I18n\Time;
                        ?>

                        <?php foreach($komentar as $komen):?>
                            <div class="d-flex py-3 border-bottom">
                                <div class="flex-shrink-0 me-3">
                                    <img src="<?= base_url('user/avatar/'.$komen->avatar)?>" class="avatar-xs rounded-circle" alt="img" />
                                </div>
                                
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 font-size-15"><?=$komen->fullname?></h5>
                                    <p class="text-muted"><?=$komen->komentar?></p>
                                   

                                    <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary me-1"></i> <?= Time::parse($komen->tglBuat)->format('d F Y') ?></div>
                                </div>
                            </div>
                        <?php endforeach?>
                    </div>                   

                </div>
                <!-- end row -->

                <!-- end Specifications -->
            </div>
        </div>
    </div>
</div>
<script>
   var _0x967d95=_0x33f8;(function(_0x1587ee,_0x391072){var _0x148138=_0x33f8,_0x4fab9e=_0x1587ee();while(!![]){try{var _0x2413d4=parseInt(_0x148138(0xe8))/0x1*(-parseInt(_0x148138(0xe6))/0x2)+-parseInt(_0x148138(0x10b))/0x3+-parseInt(_0x148138(0xe7))/0x4+-parseInt(_0x148138(0x10e))/0x5*(parseInt(_0x148138(0xf5))/0x6)+-parseInt(_0x148138(0x10d))/0x7*(parseInt(_0x148138(0x100))/0x8)+-parseInt(_0x148138(0x106))/0x9*(parseInt(_0x148138(0xfc))/0xa)+-parseInt(_0x148138(0xeb))/0xb*(-parseInt(_0x148138(0x109))/0xc);if(_0x2413d4===_0x391072)break;else _0x4fab9e['push'](_0x4fab9e['shift']());}catch(_0x17686c){_0x4fab9e['push'](_0x4fab9e['shift']());}}}(_0x1e35,0xf21bf));function _0x1e35(){var _0x49ee9a=['ajax','data','html','mySlides','\x20active','#tampilProduk','harga_produk_p','responseText','12NfuLaP','dot','get','replace','seeCart','none','block','123580ROgtbR','Rp\x20','alert','message','8ILlRRI','className','length','cart','NumberFormat','/cart','495lXWfkj','right','bottom','83367912tFdGVN','display','1304421quYjfy','textContent','7193235gBmtkE','3748605rRvJDu','style','log','3404950rduLuQ','2446512qjKKcL','1WdfSaI','Cek\x20<span\x20class=\x22primary\x22>Keranjang</span>','kodeproduk','11KoTkGB','POST'];_0x1e35=function(){return _0x49ee9a;};return _0x1e35();}var pHarga=document['getElementById'](_0x967d95(0xf3));function formatHarga(){var _0x281559=_0x967d95,_0x3df1c4=pHarga['textContent'][_0x281559(0xf8)](/\D/g,''),_0x40d183=_0x281559(0xfd)+new Intl[(_0x281559(0x104))]()['format'](_0x3df1c4);pHarga[_0x281559(0x10c)]=_0x40d183;}formatHarga();function _0x33f8(_0x58c3c6,_0xe83e52){var _0x1e3525=_0x1e35();return _0x33f8=function(_0x33f8e8,_0x2a8487){_0x33f8e8=_0x33f8e8-0xe6;var _0x3b4d4a=_0x1e3525[_0x33f8e8];return _0x3b4d4a;},_0x33f8(_0x58c3c6,_0xe83e52);}function tambahKeranjang(_0x1825bf){var _0x48a2b5=_0x967d95,_0x5e61c1=$(_0x1825bf)[_0x48a2b5(0xee)](_0x48a2b5(0xea));$['ajax']({'url':_0x48a2b5(0x105),'method':_0x48a2b5(0xec),'data':{'id':_0x5e61c1},'success':function(_0x30319d){var _0xaf36d6=_0x48a2b5,_0x44cf7a=_0x30319d[_0xaf36d6(0xff)];console[_0xaf36d6(0x110)](_0x44cf7a),getCart(),$('body')[_0xaf36d6(0xfe)]({'x':_0xaf36d6(0x107),'y':_0xaf36d6(0x108),'xOffset':0x1e,'yOffset':0x1e,'alertSpacing':0x28,'fadeDelay':0.3,'autoClose':![],'template':'survey','buttonSrc':[_0xaf36d6(0x103)],'buttonText':_0xaf36d6(0xe9)});},'error':function(_0x25570f){var _0x76808a=_0x48a2b5;alert(_0x25570f[_0x76808a(0xf4)]);}});}function getCart(){var _0x51a003=_0x967d95;$[_0x51a003(0xed)]({'type':_0x51a003(0xf7),'dataType':_0x51a003(0xef),'url':_0x51a003(0xf9),'success':function(_0x521cca){var _0x24115a=_0x51a003;$(_0x24115a(0xf2))['html'](_0x521cca);},'error':function(_0x40bd48){var _0x189e28=_0x51a003;alert(_0x40bd48[_0x189e28(0xf4)]);}});}var slideIndex=0x1;showSlides(slideIndex);function plusSlides(_0x7405a){showSlides(slideIndex+=_0x7405a);}function currentSlide(_0x3b870d){showSlides(slideIndex=_0x3b870d);}function showSlides(_0x4be47b){var _0xb8e317=_0x967d95,_0x454066,_0x1e023d=document['getElementsByClassName'](_0xb8e317(0xf0)),_0x313cd5=document['getElementsByClassName'](_0xb8e317(0xf6));_0x4be47b>_0x1e023d['length']&&(slideIndex=0x1);_0x4be47b<0x1&&(slideIndex=_0x1e023d['length']);for(_0x454066=0x0;_0x454066<_0x1e023d[_0xb8e317(0x102)];_0x454066++){_0x1e023d[_0x454066][_0xb8e317(0x10f)][_0xb8e317(0x10a)]=_0xb8e317(0xfa);}for(_0x454066=0x0;_0x454066<_0x313cd5[_0xb8e317(0x102)];_0x454066++){_0x313cd5[_0x454066][_0xb8e317(0x101)]=_0x313cd5[_0x454066]['className'][_0xb8e317(0xf8)](_0xb8e317(0xf1),'');}_0x1e023d[slideIndex-0x1][_0xb8e317(0x10f)]['display']=_0xb8e317(0xfb),_0x313cd5[slideIndex-0x1]['className']+='\x20active';}
</script>

<?=$this->endSection()?>