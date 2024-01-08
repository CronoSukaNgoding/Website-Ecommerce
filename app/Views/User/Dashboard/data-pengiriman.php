<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= base_url('/dashboard')?>" class="btn btn-primary mb-3"><i class="fas fa-home"></i> Redirect ke Dashboard</a>

                <h4 class="card-title">List Pengiriman</h4>

                <table id="categoryTable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
                <div class="loader-container">
                    <div class="loader"></div>
                    <p class="loader-p">Memuat data...</p>
                </div>
            </div>

                
            </div>

        </div>
    </div>
</div>

<script src="/assets/js/service/generateTable.js"></script>

<script>
    var Url = "<?= base_url('data-pengiriman-user/')?>";
   (function(_0x4b15fc,_0x24d4b0){var _0x212fa4=_0x4a80,_0x34316d=_0x4b15fc();while(!![]){try{var _0x1c9749=parseInt(_0x212fa4(0x72))/0x1+-parseInt(_0x212fa4(0x86))/0x2+parseInt(_0x212fa4(0x76))/0x3+parseInt(_0x212fa4(0x77))/0x4+parseInt(_0x212fa4(0x87))/0x5*(parseInt(_0x212fa4(0x7f))/0x6)+parseInt(_0x212fa4(0x78))/0x7+parseInt(_0x212fa4(0x81))/0x8*(-parseInt(_0x212fa4(0x8d))/0x9);if(_0x1c9749===_0x24d4b0)break;else _0x34316d['push'](_0x34316d['shift']());}catch(_0x3e21ae){_0x34316d['push'](_0x34316d['shift']());}}}(_0x223f,0xd3578),$(document)['ready'](function(){var _0x2b59da=_0x4a80,_0x222c07=[{'data':null,'render':function(_0x5c2577,_0x3767f8,_0xf4f1e7,_0xf14b92){var _0x6d4e7c=_0x4a80;return _0xf14b92[_0x6d4e7c(0x89)]+0x1;}},{'data':'fullname'},{'data':_0x2b59da(0x7a)},{'data':_0x2b59da(0x75)},{'data':_0x2b59da(0x85)},{'data':_0x2b59da(0x7d),'render':function(_0x1b72e7){var _0x2a4562=_0x2b59da,_0x597b06='',_0x145209='';switch(parseInt(_0x1b72e7)){case 0x1:_0x597b06=_0x2a4562(0x74),_0x145209=_0x2a4562(0x8c);break;case 0x2:_0x597b06=_0x2a4562(0x80),_0x145209=_0x2a4562(0x8a);break;case 0x3:_0x597b06=_0x2a4562(0x7b),_0x145209=_0x2a4562(0x7e);break;case 0x4:_0x597b06=_0x2a4562(0x80),_0x145209=_0x2a4562(0x79);break;default:_0x597b06=_0x2a4562(0x83),_0x145209=_0x2a4562(0x73);break;}return _0x2a4562(0x8e)+_0x597b06+'\x22>'+_0x145209+_0x2a4562(0x84);}},{'data':null,'render':function(_0x5c646a){var _0x477d8f=_0x2b59da;_0x477d8f(0x8b)+Url+_0x5c646a[_0x477d8f(0x8f)]+_0x477d8f(0x7c);}}],_0x39ab3d=[[0x0,_0x2b59da(0x88)]];generateTable('#categoryTable',_0x2b59da(0x82),_0x222c07,_0x39ab3d);}));function _0x4a80(_0x165c49,_0x2424e5){var _0x223f35=_0x223f();return _0x4a80=function(_0x4a807e,_0x48fd16){_0x4a807e=_0x4a807e-0x72;var _0x4f173e=_0x223f35[_0x4a807e];return _0x4f173e;},_0x4a80(_0x165c49,_0x2424e5);}function _0x223f(){var _0x5232d8=['asc','row','Pembayaran\x20diterima','<a\x20href=\x22','Pembayaran\x20belum\x20dicek','27PKuxdr','<span\x20class=\x22badge\x20font-size-10\x20','idPayment','1448041kuSnzA','Pembayaran\x20ditolak','bg-warning','qty','1929465XaCbJR','3790100kftnUi','10513132umpKGw','Pengiriman\x20selesai','nama_produk','bg-info','\x22><button\x20class=\x22btn\x20btn-success\x20btn-sm\x20btn-bg-gradient-x-blue-green\x20box-shadow-2\x22\x20title=\x22Lihat\x20Resi\x22><i\x20class=\x22fas\x20fa-eye\x22></i></button></a>','status','Dikirim','5370486GwwqCL','bg-success','11035344muAkfR','/ajax-pengiriman-user','bg-danger','</span>','total','863536qqEPgB','5LWktJL'];_0x223f=function(){return _0x5232d8;};return _0x223f();}
</script>

<?=$this->endSection()?>