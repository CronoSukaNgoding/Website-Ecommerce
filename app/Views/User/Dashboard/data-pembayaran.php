<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= base_url('/dashboard')?>" class="btn btn-primary mb-3"><i class="fas fa-home"></i> Redirect ke Dashboard</a>
                <h4 class="card-title">List Pesanan</h4>

                <table id="categoryTable"class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Nama</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status Pembayaran</th>
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

<script src="/assets/js/service/generateTable.js"></script>
<script>
    var _0x298180=_0x1599;function _0x1599(_0x44f9cc,_0x4a5a47){var _0xd7274c=_0xd727();return _0x1599=function(_0x15991c,_0x433346){_0x15991c=_0x15991c-0x1d5;var _0x206e15=_0xd7274c[_0x15991c];return _0x206e15;},_0x1599(_0x44f9cc,_0x4a5a47);}(function(_0x300f60,_0x2243f0){var _0x315016=_0x1599,_0x78b8fb=_0x300f60();while(!![]){try{var _0x18f332=-parseInt(_0x315016(0x1eb))/0x1*(parseInt(_0x315016(0x1d5))/0x2)+parseInt(_0x315016(0x1d9))/0x3*(parseInt(_0x315016(0x1e2))/0x4)+parseInt(_0x315016(0x1db))/0x5*(-parseInt(_0x315016(0x1e3))/0x6)+parseInt(_0x315016(0x1e7))/0x7+-parseInt(_0x315016(0x1d6))/0x8+-parseInt(_0x315016(0x1ee))/0x9+parseInt(_0x315016(0x1e8))/0xa;if(_0x18f332===_0x2243f0)break;else _0x78b8fb['push'](_0x78b8fb['shift']());}catch(_0x79c495){_0x78b8fb['push'](_0x78b8fb['shift']());}}}(_0xd727,0x42e59),$(document)[_0x298180(0x1e4)](function(){var _0x898569=_0x298180,_0x1366df=[{'data':null,'render':function(_0x4a2b23,_0x28a8f6,_0x1f7f87,_0x264909){var _0x429c6d=_0x1599;return _0x264909[_0x429c6d(0x1de)]+0x1;}},{'data':'id_payment'},{'data':'fullname'},{'data':_0x898569(0x1df)},{'data':_0x898569(0x1d7)},{'data':_0x898569(0x1e1)},{'data':_0x898569(0x1ea),'render':function(_0x36197a){var _0x45ce70=_0x898569,_0x16e7b4='',_0x4e2634='';switch(parseInt(_0x36197a)){case 0x1:_0x16e7b4='bg-warning',_0x4e2634=_0x45ce70(0x1da);break;case 0x2:_0x16e7b4=_0x45ce70(0x1ed),_0x4e2634=_0x45ce70(0x1e9);break;case 0x3:_0x16e7b4=_0x45ce70(0x1dd),_0x4e2634=_0x45ce70(0x1e6);break;case 0x4:_0x16e7b4=_0x45ce70(0x1ed),_0x4e2634=_0x45ce70(0x1e0);break;default:_0x16e7b4='bg-danger',_0x4e2634=_0x45ce70(0x1e5);break;}return'<span\x20class=\x22badge\x20font-size-10\x20'+_0x16e7b4+'\x22>'+_0x4e2634+_0x45ce70(0x1d8);}}],_0x21142f=[[0x0,_0x898569(0x1dc)]];generateTable(_0x898569(0x1ec),'/ajax-pembayaran-user',_0x1366df,_0x21142f);}));function _0xd727(){var _0x3573b3=['bg-info','row','nama_produk','Pengiriman\x20selesai','total','788lHeWhx','18vFMmXq','ready','Pembayaran\x20ditolak','Dikirim','3578386JQDWdy','4855320BAfnpe','Pembayaran\x20diterima','status','9119qvHcDg','#categoryTable','bg-success','2786877DceyKA','22dqiVzF','1998008kKVasO','qty','</span>','7287FDxLen','Pembayaran\x20belum\x20dicek','902535gxXKkL','asc'];_0xd727=function(){return _0x3573b3;};return _0xd727();}
</script>
<?=$this->endSection()?>