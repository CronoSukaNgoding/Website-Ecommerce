<?= $this->extend('Template/template-bayar') ?>

<?= $this->section('IsKonten') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                

                <form id="myForm" method="post">
                    <div class="row">
                        
                        <!-- Left Column -->
                        <div class="col-sm-6">
                            <h4 class="card-title">Form Pembayaran</h4>
                            <p class="card-title-desc">Isi Form Sebagai Bukti Pembayaran</p>
                            <input type="hidden" value="">
                            <div class="mb-3">
                                <label for="nama">Rekening Tujuan</label>
                                <input type="text" class="form-control" name="fullname" id="nama" placeholder="Nama" autocomplete="off"  value="QRIS A/N OYA STORE" disabled>
                                
                                <input type="hidden" value="<?=$result[0]->id_pre?>" class="idPrePay"name="id_prepayment">
                                <input type="hidden" value="<?=$result[0]->id_cart?>" class="idCart"name="id_cart">
                                <input type="hidden" value="<?=$result[0]->qty?>" class="qty"name="qty">
                                <?php foreach($result as $listPay):?>
                                    <input type="hidden" value="<?=$listPay->id_produk?>" class="idProduk" name="id_produk[]">
                                <?php endforeach?>
                            </div>

                            <div class="mb-3">
                                <label for="transfer">Bukti Transfer</label>
                                <input type="file" class="form-control" id="transfer" name="transfer" placeholder="Lengkapi Bukti Transfer" value="" autocomplete="off" required>
                            </div>
                            <!-- ladda button -->
                            <div id="ladda-spinner" class="spinner-border text-primary m-1" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-sm-6 text-center">
                            <div class="card  d-inline-block">
                                    <img class="card-img img-fluid" style="width: 50%;" src="<?= base_url('admin/qris.png') ?>" alt="Card image">
                                </div>
                                <h4 class=" total">Harga yang harus dibayar : Rp. <?= number_format($result[0]->total, 0, ',', '.') ?></h4>
                        </div>

                    </div>


                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light" >Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#confirmationModal">Batal</button>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url('/payment/del/').$id?>" method="POST">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin untuk tidak melanjutkan pembayaran?
                </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <!-- Make sure to prevent conflicts by changing the ID of the submit button -->
                <button type="submit" class="btn btn-primary">Yakin</button>
            </div>
        </div>
    </div>
    </form>
</div>
    </div>
    
</div>
<!-- end row -->

<!-- CKEDITOR -->
<script>
    function _0x1bc4(_0x1b8b65,_0x232ac6){var _0xb8697a=_0xb869();return _0x1bc4=function(_0x1bc457,_0x1eb2e4){_0x1bc457=_0x1bc457-0x1b8;var _0x186398=_0xb8697a[_0x1bc457];return _0x186398;},_0x1bc4(_0x1b8b65,_0x232ac6);}var _0xa0018e=_0x1bc4;(function(_0x1db57e,_0x5339b7){var _0xfa3f7b=_0x1bc4,_0x120fe7=_0x1db57e();while(!![]){try{var _0x4eecf7=-parseInt(_0xfa3f7b(0x1b8))/0x1*(-parseInt(_0xfa3f7b(0x1d2))/0x2)+-parseInt(_0xfa3f7b(0x1b9))/0x3+parseInt(_0xfa3f7b(0x1c6))/0x4*(parseInt(_0xfa3f7b(0x1bb))/0x5)+-parseInt(_0xfa3f7b(0x1ba))/0x6*(parseInt(_0xfa3f7b(0x1c2))/0x7)+parseInt(_0xfa3f7b(0x1df))/0x8*(-parseInt(_0xfa3f7b(0x1cf))/0x9)+-parseInt(_0xfa3f7b(0x1bf))/0xa+parseInt(_0xfa3f7b(0x1d8))/0xb;if(_0x4eecf7===_0x5339b7)break;else _0x120fe7['push'](_0x120fe7['shift']());}catch(_0x1333b6){_0x120fe7['push'](_0x120fe7['shift']());}}}(_0xb869,0x31920),$(document)[_0xa0018e(0x1dc)](function(){var _0x2d4007=_0xa0018e;$(_0x2d4007(0x1da))[_0x2d4007(0x1c9)](function(_0x2d931c){var _0x24235b=_0x2d4007;_0x2d931c['preventDefault'](),$(_0x24235b(0x1c0))[_0x24235b(0x1ca)](),$('#submit-btn')[_0x24235b(0x1be)](_0x24235b(0x1d1),!![]);var _0x13cbf7=$(_0x24235b(0x1ce))[_0x24235b(0x1c3)]()[_0x24235b(0x1d0)](_0x24235b(0x1dd))[0x1][_0x24235b(0x1de)](),_0x275481=new FormData(this);_0x275481[_0x24235b(0x1d3)]('total',_0x13cbf7),_0x275481['append'](_0x24235b(0x1cd),$(_0x24235b(0x1c7))[_0x24235b(0x1c8)]()),_0x275481['append']('idCart',$(_0x24235b(0x1c5))[_0x24235b(0x1c8)]()),$(_0x24235b(0x1bd))[_0x24235b(0x1d6)](function(){var _0x4ac7ff=_0x24235b;_0x275481['append'](_0x4ac7ff(0x1cc),$(this)['val']());}),$[_0x24235b(0x1db)]({'type':_0x24235b(0x1bc),'url':_0x24235b(0x1d5),'data':_0x275481,'contentType':![],'processData':![],'success':function(_0x5c9a1d){var _0x4886b6=_0x24235b;$('#ladda-spinner')[_0x4886b6(0x1d7)](),$(_0x4886b6(0x1cb))[_0x4886b6(0x1be)](_0x4886b6(0x1d1),![]);const _0x5e2392=_0x4886b6(0x1c1);console[_0x4886b6(0x1e1)](_0x4886b6(0x1d4),_0x5e2392),window['location'][_0x4886b6(0x1d9)](_0x5e2392);},'error':function(_0x3bee26,_0x4ab9e2,_0x28be5f){var _0x4a2467=_0x24235b;console[_0x4a2467(0x1e0)](_0x3bee26[_0x4a2467(0x1c4)]),$(_0x4a2467(0x1c0))['hide'](),$('#submit-btn')[_0x4a2467(0x1be)]('disabled',![]);}});});}));function _0xb869(){var _0x12c754=['prop','2823280SYeCiG','#ladda-spinner','/dashboard','1009582SZCsTK','text','responseText','.idCart','194540AVFYPF','.idPrePay','val','submit','show','#submit-btn','idProduk[]','idPrePay','.total','477TJtxdo','split','disabled','326490loegAf','append','New\x20location:','/payment/save','each','hide','8209707KPHtaN','replace','#myForm','ajax','ready','\x20:\x20','trim','27752CLZYYM','error','log','2cgGFPl','924033kmpSEa','6yezElD','5jJwyDp','POST','.idProduk'];_0xb869=function(){return _0x12c754;};return _0xb869();}

</script>

<?=$this->endSection()?>