<?= $this->extend('Template/template') ?>
<?php $this->section('css');?>
<style>

  input[type="date"] {
    /* width: 100%; */
    padding: 8px;
    margin-bottom: 10px;
    border-radius:15px;
    box-sizing: border-box;
  }
  card-filter{
    border-radius:15px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  }



</style>

<?php $this->endSection();?>
<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Laporan Luxo Mall Hari <span id="currentDay"></span></h4>
                
                <div class="card-filter">
                    <div class="card-body">
                        <p class="card-title">Filter Tanggal</p>
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date">

                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date">

                        <button id="filter_button"class="btn btn-primary">Filter</button>
                    </div>
                </div>


                
                <table id="categoryTable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Produk</th>
                            <th>Quantity</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                    </tbody>

                </table>
                <div class="loader-container">
                    <div class="loader"></div>
                    <p class="loader-p">Memuat data...</p>
                </div>
               
            </div>

        </div>
    </div>
</div>
<!-- <script src="/assets/js/service/generateTable.js"></script> -->
<script src="/assets/js/service/tableLaporan.js"></script>
<script>
    function _0x3c36(){var _0xf38334=['copy','21FKINWP','\x2023:59:59','hide','Rabu','show','slice','#filter_button','ajax','empty','93416MeVLqU','#categoryTable','Selasa','1018014PQmuRb','.loader-container','error','<div\x20class=\x27loader\x27\x20id=\x27loader-1\x27></div>','val','35xgtZLS','</center>','344378ISDIto','All','\x20tbody','destroy','replace','61652sYEomc','<td\x20colspan=\x27','append','getElementById','pdf','ready','toISOString','getMonth','Please\x20select\x20valid\x20start\x20and\x20end\x20dates.','Bfrtip','</td>','/ajax-laporan','561456SUzbNx','Kamis','13320ojCGdN','<center>','add','undefined','padStart','\x2000:00:00','POST','length','setHours','<tr>','#end_date','No\x20data\x20found','DataTable','236325IFAQZO','End\x20date\x20cannot\x20be\x20less\x20than\x20start\x20date.','textContent','AJAX\x20Error:\x20','click','Sabtu','Senin','draw','excel','clear','response'];_0x3c36=function(){return _0xf38334;};return _0x3c36();}var _0x526c13=_0x1f8c;(function(_0x33e7a9,_0x316405){var _0x438284=_0x1f8c,_0x424fca=_0x33e7a9();while(!![]){try{var _0x5a84e9=-parseInt(_0x438284(0x16c))/0x1+parseInt(_0x438284(0x198))/0x2+parseInt(_0x438284(0x185))/0x3*(parseInt(_0x438284(0x19d))/0x4)+parseInt(_0x438284(0x179))/0x5+-parseInt(_0x438284(0x191))/0x6+-parseInt(_0x438284(0x196))/0x7*(parseInt(_0x438284(0x18e))/0x8)+parseInt(_0x438284(0x16a))/0x9;if(_0x5a84e9===_0x316405)break;else _0x424fca['push'](_0x424fca['shift']());}catch(_0x539899){_0x424fca['push'](_0x424fca['shift']());}}}(_0x3c36,0x24383));function filterData(){var _0x522d69=_0x1f8c,_0x92ca79=$('#start_date')['val'](),_0x4b6b0d=$(_0x522d69(0x176))[_0x522d69(0x195)]();if(_0x92ca79===''||_0x4b6b0d===''){alert(_0x522d69(0x166));return;}var _0x3f904b=new Date(_0x92ca79),_0x117164=new Date(_0x4b6b0d),_0x343271=_0x3f904b[_0x522d69(0x164)]()[_0x522d69(0x18a)](0x0,0x13)[_0x522d69(0x19c)]('T','\x20'),_0x224e0b=_0x117164['toISOString']()[_0x522d69(0x18a)](0x0,0x13)[_0x522d69(0x19c)]('T','\x20');if(_0x117164<_0x3f904b){alert(_0x522d69(0x17a));return;}_0x117164[_0x522d69(0x174)](0x17,0x3b,0x3b),dataTable&&dataTable[_0x522d69(0x19b)](),console['log'](_0x92ca79),console['log'](_0x4b6b0d),dataTable=generateTable(_0x522d69(0x18f),_0x522d69(0x169),columns,order,_0x343271,_0x224e0b);}function _0x1f8c(_0x2a1041,_0x29d2c2){var _0x3c3632=_0x3c36();return _0x1f8c=function(_0x1f8cf2,_0x37c034){_0x1f8cf2=_0x1f8cf2-0x164;var _0xda6e7e=_0x3c3632[_0x1f8cf2];return _0xda6e7e;},_0x1f8c(_0x2a1041,_0x29d2c2);}$(document)[_0x526c13(0x1a2)](function(){var _0x4709fc=_0x526c13;dataTable=generateTable(_0x4709fc(0x18f),_0x4709fc(0x169),columns,order),$(_0x4709fc(0x18b))['on'](_0x4709fc(0x17d),filterData);});function generateTable(_0x436a79,_0x2dfa80,_0x485bd4,_0x874f64,_0x3c7951,_0x5e71ab){var _0x458f36=_0x526c13;const _0x5cd474=_0x485bd4[_0x458f36(0x173)];var _0x4efcc9=$(_0x436a79)[_0x458f36(0x178)]({'columns':_0x485bd4,'order':_0x874f64,'fixedColumns':!![],'scrollCollapse':!![],'scrollY':0x12c,'scrollX':!![],'processing':![],'serverSide':![],'dom':_0x458f36(0x167),'buttons':[_0x458f36(0x184),_0x458f36(0x181),_0x458f36(0x1a1)],'lengthMenu':[[0xa,0x19,0x32,-0x1],[0xa,0x19,0x32,_0x458f36(0x199)]]});const _0x354e93=new Date(),_0x50f614=_0x354e93['getFullYear'](),_0x106bf0=String(_0x354e93[_0x458f36(0x165)]()+0x1)[_0x458f36(0x170)](0x2,'0'),_0x5ec6d5=String(_0x354e93['getDate']())[_0x458f36(0x170)](0x2,'0'),_0x25a88f=_0x50f614+'-'+_0x106bf0+'-'+_0x5ec6d5+_0x458f36(0x171),_0x22bdeb=_0x50f614+'-'+_0x106bf0+'-'+_0x5ec6d5+_0x458f36(0x186);typeof _0x3c7951!=_0x458f36(0x16f)&&typeof _0x5e71ab!='undefined'?(startDateProps=_0x3c7951,endDateProps=_0x5e71ab):(startDateProps=_0x25a88f,endDateProps=_0x22bdeb);var _0x49af2d={'startDate':startDateProps,'endDate':endDateProps};return $[_0x458f36(0x18c)]({'url':_0x2dfa80,'method':_0x458f36(0x172),'data':_0x49af2d,'dataSrc':'data','beforeSend':function(){var _0xe0ac31=_0x458f36;$(_0x436a79+'\x20tbody')[_0xe0ac31(0x18d)](),$(_0x436a79+_0xe0ac31(0x19a))[_0xe0ac31(0x19f)](_0xe0ac31(0x175)+_0xe0ac31(0x19e)+_0x5cd474+'\x27>'+_0xe0ac31(0x16d)+_0xe0ac31(0x194)+_0xe0ac31(0x197)+_0xe0ac31(0x168)+'</tr>');},'success':function(_0x3f2dd6){var _0x5920f3=_0x458f36;if(_0x3f2dd6&&_0x3f2dd6[_0x5920f3(0x193)]===_0x5920f3(0x177))_0x4efcc9[_0x5920f3(0x182)]()['draw'](),$(_0x5920f3(0x192))['hide']();else{if(_0x3f2dd6['response']&&_0x3f2dd6[_0x5920f3(0x183)]['data']){var _0x398d4f=_0x3f2dd6[_0x5920f3(0x183)]['data'];_0x398d4f[_0x5920f3(0x173)]>0x0?($(_0x5920f3(0x192))[_0x5920f3(0x189)](),_0x4efcc9[_0x5920f3(0x182)]()['rows'][_0x5920f3(0x16e)](_0x398d4f)[_0x5920f3(0x180)](),$(_0x5920f3(0x192))[_0x5920f3(0x187)]()):(_0x4efcc9['clear']()[_0x5920f3(0x180)](),$('.loader-container')[_0x5920f3(0x187)]());}}},'error':function(_0x458c8d,_0x11e2d2,_0x28fcdc){var _0x2c59c4=_0x458f36;console[_0x2c59c4(0x193)](_0x2c59c4(0x17c)+_0x11e2d2,_0x28fcdc);}}),_0x4efcc9;}var currentDate=new Date(),dayNames=[_0x526c13(0x17f),_0x526c13(0x190),_0x526c13(0x188),_0x526c13(0x16b),'Jumat',_0x526c13(0x17e),'Minggu'],currentDay=dayNames[currentDate['getDay']()];document[_0x526c13(0x1a0)]('currentDay')[_0x526c13(0x17b)]=currentDay;
</script>


<?=$this->endSection()?>