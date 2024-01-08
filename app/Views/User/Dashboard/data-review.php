<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= base_url('/dashboard')?>" class="btn btn-primary mb-3"><i class="fas fa-home"></i> Redirect ke Dashboard</a>

                <h4 class="card-title">List Review</h4>

                <table id="categoryTable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Rating</th>
                            <th>Komentar</th>
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
    function _0x3025(){const _0xf04431=['nama_produk','#categoryTable','12PgYXBf','komentar','</div>','/ajax-review','1652139PQztUk','asc','round','32NUisKR','11604340kariaO','ready','<span>&#9733;</span>','2133105cVQtsO','566762aJTRJQ','row','4161900CHNMOk','146239vBNIaA','12bHmaLf','1423773yaIVpW','Produk\x20ini\x20belum\x20diberi\x20rating','peringkat','<div\x20class=\x22rating\x22\x20data-rating=\x22'];_0x3025=function(){return _0xf04431;};return _0x3025();}const _0x53d8a0=_0x31e4;function _0x31e4(_0x56bba4,_0x3a3510){const _0x3025b0=_0x3025();return _0x31e4=function(_0x31e493,_0x1c29e9){_0x31e493=_0x31e493-0x130;let _0x5241eb=_0x3025b0[_0x31e493];return _0x5241eb;},_0x31e4(_0x56bba4,_0x3a3510);}(function(_0x1bef2b,_0x4a8ff1){const _0x5d744e=_0x31e4,_0x5120a1=_0x1bef2b();while(!![]){try{const _0x2646d7=-parseInt(_0x5d744e(0x141))/0x1*(-parseInt(_0x5d744e(0x132))/0x2)+-parseInt(_0x5d744e(0x143))/0x3+-parseInt(_0x5d744e(0x140))/0x4+-parseInt(_0x5d744e(0x13d))/0x5+parseInt(_0x5d744e(0x142))/0x6*(-parseInt(_0x5d744e(0x13e))/0x7)+parseInt(_0x5d744e(0x139))/0x8*(parseInt(_0x5d744e(0x136))/0x9)+parseInt(_0x5d744e(0x13a))/0xa;if(_0x2646d7===_0x4a8ff1)break;else _0x5120a1['push'](_0x5120a1['shift']());}catch(_0x547c05){_0x5120a1['push'](_0x5120a1['shift']());}}}(_0x3025,0xa3375),$(document)[_0x53d8a0(0x13b)](function(){const _0x4d1cbc=_0x53d8a0;var _0x3972a2=[{'data':null,'render':function(_0x575173,_0xae54a4,_0x2de47d,_0x421e3d){const _0x3ff4f7=_0x31e4;return _0x421e3d[_0x3ff4f7(0x13f)]+0x1;}},{'data':_0x4d1cbc(0x130)},{'data':_0x4d1cbc(0x145),'render':function(_0xd6f9bd,_0x3ec3a8,_0x327bf5,_0x175178){const _0x36a9f9=_0x4d1cbc;if(_0xd6f9bd===null)return _0x36a9f9(0x144);else{const _0x5d8403=Math[_0x36a9f9(0x138)](_0xd6f9bd);let _0x42bb2c=_0x36a9f9(0x146)+_0xd6f9bd+'\x22>';for(let _0x474b47=0x0;_0x474b47<0x5;_0x474b47++){_0x474b47<_0x5d8403?_0x42bb2c+='<span\x20style=\x22color:\x20gold;\x22>&#9733;</span>':_0x42bb2c+=_0x36a9f9(0x13c);}return _0x42bb2c+=_0x36a9f9(0x134),_0x42bb2c+='\x20('+_0xd6f9bd+')',_0x42bb2c;}}},{'data':_0x4d1cbc(0x133)}],_0x4155dc=[[0x0,_0x4d1cbc(0x137)]];generateTable(_0x4d1cbc(0x131),_0x4d1cbc(0x135),_0x3972a2,_0x4155dc);}));
</script>

<?=$this->endSection()?>