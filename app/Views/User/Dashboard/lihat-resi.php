<?= $this->extend('Template/template') ?>
<?= $this->section('IsKonten') ?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-3">
                    <a href="<?= base_url('/dashboard')?>" class="btn btn-primary"><i class="fas fa-home"></i> Redirect ke Dashboard</a>
                </div>
                <h4 class="card-title">Informasi Pembayaran</h4>
                 <form action="<?=base_url("/pengiriman/edit-user/").$result->idPayment?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                                <div class="mb-3">
                                        <label for="nama_produk">Nama Produk</label>
                                        <input id="nama_produk" name="nama_produk" type="text" class="form-control" placeholder="Product Name" autocomplete="off" value="<?=$result->nama_produk?>" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="harga_produk">Total Harga</label>
                                        <input id="harga_produk" name="harga_produk" type="text" class="form-control" placeholder="Harga Produk" autocomplete="off" value="<?=$result->total?>" disabled>
                                    </div>
                                    
                                    <div class="mb-3" id="noResiContainer" >
                                        <label class="control-label" for="noResi">Nomor Resi</label>
                                        <input type="text" name="no_resi" class="form-control" id="noResi" value="<?=$result->no_resi?>" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label class="control-label" for="kondisi">Update Status Pengiriman</label>
                                        <select name="status" class="form-control select" id="statusSelect">
                                            
                                            <option value="<?=$result->status?>"><?=$result->statusname?></option>
                                            <option value="4">Selesai</option>
                                        </select>
                                    </div>

                                    <div id="ratingAndCommentForm" style="display: none;">
                                        <div class="mb-3">
                                            <label class="control-label" for="rating"  >Rating</label>
                                            <div class="rating">
                                                <i class="fas fa-star" style="cursor: pointer; " data-index="0"></i>
                                                <i class="fas fa-star" style="cursor: pointer;" data-index="1"></i>
                                                <i class="fas fa-star" style="cursor: pointer;" data-index="2"></i>
                                                <i class="fas fa-star" style="cursor: pointer;" data-index="3"></i>
                                                <i class="fas fa-star" style="cursor: pointer;" data-index="4"></i>
                                            </div>
                                        </div>
                                        <input type="hidden" name="rating" id="ratingInput" required>

                                        <div class="mb-3">
                                            <label class="control-label" for="komentar">Komentar</label>
                                            <textarea name="komentar" class="form-control" required></textarea>
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" onclick="redirectToDataPengiriman()">Batal</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<!-- end row -->
<script>
function _0x130c(){const _0x1cf2c9=['block','gold','none','href','statusSelect','6685uTcfId','1556QaiGys','7363962eoEjng','ratingInput','forEach','1941ZQssAJ','376190sdySyv','display','color','change','getElementById','location','2210598gmrELK','addEventListener','/data-pengiriman','click','336649Zqoarz','length','style','getAttribute','4072ICXsps','1572536BpjeMp','value','DOMContentLoaded','log'];_0x130c=function(){return _0x1cf2c9;};return _0x130c();}function _0x350f(_0x4fe761,_0x4482d2){const _0x130c46=_0x130c();return _0x350f=function(_0x350f1e,_0x2d82e5){_0x350f1e=_0x350f1e-0xf8;let _0xd887ab=_0x130c46[_0x350f1e];return _0xd887ab;},_0x350f(_0x4fe761,_0x4482d2);}const _0x326454=_0x350f;(function(_0x2581c0,_0x452496){const _0x3f7831=_0x350f,_0x4716b5=_0x2581c0();while(!![]){try{const _0x5adb80=parseInt(_0x3f7831(0x10b))/0x1+-parseInt(_0x3f7831(0xfc))/0x2*(parseInt(_0x3f7831(0x100))/0x3)+parseInt(_0x3f7831(0x110))/0x4+parseInt(_0x3f7831(0x101))/0x5+-parseInt(_0x3f7831(0x107))/0x6+parseInt(_0x3f7831(0xfb))/0x7*(-parseInt(_0x3f7831(0x10f))/0x8)+parseInt(_0x3f7831(0xfd))/0x9;if(_0x5adb80===_0x452496)break;else _0x4716b5['push'](_0x4716b5['shift']());}catch(_0x5f3161){_0x4716b5['push'](_0x4716b5['shift']());}}}(_0x130c,0x40c81));function redirectToDataPengiriman(){const _0x4a3ac9=_0x350f;window[_0x4a3ac9(0x106)][_0x4a3ac9(0xf9)]=_0x4a3ac9(0x109);}document['addEventListener'](_0x326454(0x112),function(){const _0xff2647=_0x326454,_0x2a0426=document[_0xff2647(0x105)](_0xff2647(0xfa)),_0xc1ac2f=document[_0xff2647(0x105)]('ratingAndCommentForm');console[_0xff2647(0x113)](_0x2a0426[_0xff2647(0x111)]);function _0x223562(){const _0x59216f=_0xff2647,_0x272c66=_0x2a0426[_0x59216f(0x111)];_0x272c66==='4'?_0xc1ac2f['style'][_0x59216f(0x102)]=_0x59216f(0x114):_0xc1ac2f[_0x59216f(0x10d)][_0x59216f(0x102)]=_0x59216f(0xf8);}_0x223562(),_0x2a0426[_0xff2647(0x108)](_0xff2647(0x104),_0x223562);});const stars=document['querySelectorAll']('.rating\x20i'),ratingInput=document[_0x326454(0x105)](_0x326454(0xfe));stars[_0x326454(0xff)](_0x3d638f=>{const _0x30caf6=_0x326454;_0x3d638f['addEventListener'](_0x30caf6(0x10a),function(){const _0x312c66=_0x30caf6,_0x3f870c=parseInt(this[_0x312c66(0x10e)]('data-index')),_0x3b6f00=_0x3f870c+0x1;ratingInput[_0x312c66(0x111)]=_0x3b6f00;for(let _0x3f1eca=0x0;_0x3f1eca<=_0x3f870c;_0x3f1eca++){stars[_0x3f1eca]['style']['color']=_0x312c66(0x115);}for(let _0x4c2773=_0x3f870c+0x1;_0x4c2773<stars[_0x312c66(0x10c)];_0x4c2773++){stars[_0x4c2773][_0x312c66(0x10d)][_0x312c66(0x103)]='';}});});
</script>












<?=$this->endSection()?>