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
<script src="/assets/js/service/tableLaporan.js"></script>
<script>
    function _0x5725(_0x25fb82,_0x537d20){var _0x33511c=_0x3351();return _0x5725=function(_0x572580,_0x4df1bc){_0x572580=_0x572580-0x112;var _0x4e7342=_0x33511c[_0x572580];return _0x4e7342;},_0x5725(_0x25fb82,_0x537d20);}var _0x1b411d=_0x5725;(function(_0x511f74,_0x2f2544){var _0x30cb60=_0x5725,_0x24f38a=_0x511f74();while(!![]){try{var _0x1407ce=-parseInt(_0x30cb60(0x13e))/0x1*(parseInt(_0x30cb60(0x12f))/0x2)+-parseInt(_0x30cb60(0x13f))/0x3*(parseInt(_0x30cb60(0x116))/0x4)+-parseInt(_0x30cb60(0x112))/0x5*(-parseInt(_0x30cb60(0x132))/0x6)+parseInt(_0x30cb60(0x135))/0x7*(-parseInt(_0x30cb60(0x11f))/0x8)+-parseInt(_0x30cb60(0x119))/0x9*(parseInt(_0x30cb60(0x133))/0xa)+parseInt(_0x30cb60(0x143))/0xb+-parseInt(_0x30cb60(0x14c))/0xc*(-parseInt(_0x30cb60(0x12e))/0xd);if(_0x1407ce===_0x2f2544)break;else _0x24f38a['push'](_0x24f38a['shift']());}catch(_0x5dd3b3){_0x24f38a['push'](_0x24f38a['shift']());}}}(_0x3351,0x50412));function _0x3351(){var _0x1a33c4=['ready','No\x20data\x20found','#categoryTable','Selasa','length','<center>','Kamis','13431336kihgcj','5KypjwK','rows','data','Jumat','68nyNypK','End\x20date\x20cannot\x20be\x20less\x20than\x20start\x20date.','getFullYear','36gTfZQN','setHours','response','clear','</tr>','undefined','472saJKuM','#filter_button','ajax','show','click','#start_date','Senin','<tr>','padStart','slice','All','getDay','Minggu','empty','getMonth','13tjRBDb','74dpTohJ','Bfrtip','Please\x20select\x20valid\x20start\x20and\x20end\x20dates.','1951266eJbDrD','904990yvBklD','</td>','48118KAotoj','error','append','#end_date','draw','/ajax-laporan','AJAX\x20Error:\x20','add','toISOString','6547quqSFv','40770qAHDkf','hide','val','.loader-container','1375704tyOsvy','<div\x20class=\x27loader\x27\x20id=\x27loader-1\x27></div>'];_0x3351=function(){return _0x1a33c4;};return _0x3351();}function filterData(){var _0x538f51=_0x5725,_0xca869b=$(_0x538f51(0x124))[_0x538f51(0x141)](),_0x23abe1=$(_0x538f51(0x138))[_0x538f51(0x141)]();if(_0xca869b===''||_0x23abe1===''){alert(_0x538f51(0x131));return;}var _0x17c3f4=new Date(_0xca869b),_0x5cb1f1=new Date(_0x23abe1),_0x2c7afd=_0x17c3f4[_0x538f51(0x13d)]()[_0x538f51(0x128)](0x0,0x13)['replace']('T','\x20'),_0x401315=_0x5cb1f1[_0x538f51(0x13d)]()[_0x538f51(0x128)](0x0,0x13)['replace']('T','\x20');if(_0x5cb1f1<_0x17c3f4){alert(_0x538f51(0x117));return;}_0x5cb1f1[_0x538f51(0x11a)](0x17,0x3b,0x3b),dataTable&&dataTable['destroy'](),dataTable=generateTable(_0x538f51(0x147),_0x538f51(0x13a),columns,order,_0x2c7afd,_0x401315);}$(document)[_0x1b411d(0x145)](function(){var _0x42a6e4=_0x1b411d;dataTable=generateTable(_0x42a6e4(0x147),_0x42a6e4(0x13a),columns,order),$(_0x42a6e4(0x120))['on'](_0x42a6e4(0x123),filterData);});function generateTable(_0x1cef00,_0x3a9908,_0x39cab8,_0x4d47b6,_0x2f6d86,_0x5801b3){var _0x30e96e=_0x1b411d;const _0x1b0136=_0x39cab8[_0x30e96e(0x149)];var _0x264d2d=$(_0x1cef00)['DataTable']({'columns':_0x39cab8,'order':_0x4d47b6,'fixedColumns':!![],'scrollCollapse':!![],'scrollY':!![],'scrollX':!![],'processing':![],'serverSide':![],'dom':_0x30e96e(0x130),'lengthMenu':[[0xa,0x19,0x32,-0x1],[0xa,0x19,0x32,_0x30e96e(0x129)]]});const _0x37a371=new Date(),_0x67261=_0x37a371[_0x30e96e(0x118)](),_0x2342d8=String(_0x37a371[_0x30e96e(0x12d)]()+0x1)['padStart'](0x2,'0'),_0x1f0fa0=String(_0x37a371['getDate']())[_0x30e96e(0x127)](0x2,'0'),_0x27f531=_0x67261+'-'+_0x2342d8+'-'+_0x1f0fa0+'\x2000:00:00',_0x5b7740=_0x67261+'-'+_0x2342d8+'-'+_0x1f0fa0+'\x2023:59:59';typeof _0x2f6d86!=_0x30e96e(0x11e)&&typeof _0x5801b3!=_0x30e96e(0x11e)?(startDateProps=_0x2f6d86,endDateProps=_0x5801b3):(startDateProps=_0x27f531,endDateProps=_0x5b7740);var _0x40d478={'startDate':startDateProps,'endDate':endDateProps};return $[_0x30e96e(0x121)]({'url':_0x3a9908,'method':'POST','data':_0x40d478,'dataSrc':_0x30e96e(0x114),'beforeSend':function(){var _0x19846f=_0x30e96e;$(_0x1cef00+'\x20tbody')[_0x19846f(0x12c)](),$(_0x1cef00+'\x20tbody')[_0x19846f(0x137)](_0x19846f(0x126)+'<td\x20colspan=\x27'+_0x1b0136+'\x27>'+_0x19846f(0x14a)+_0x19846f(0x144)+'</center>'+_0x19846f(0x134)+_0x19846f(0x11d));},'success':function(_0x2af157){var _0x107f52=_0x30e96e;if(_0x2af157&&_0x2af157[_0x107f52(0x136)]===_0x107f52(0x146))_0x264d2d['clear']()[_0x107f52(0x139)](),$(_0x107f52(0x142))[_0x107f52(0x140)]();else{if(_0x2af157[_0x107f52(0x11b)]&&_0x2af157[_0x107f52(0x11b)][_0x107f52(0x114)]){var _0x12faa8=_0x2af157[_0x107f52(0x11b)][_0x107f52(0x114)];_0x12faa8[_0x107f52(0x149)]>0x0?($(_0x107f52(0x142))[_0x107f52(0x122)](),_0x264d2d[_0x107f52(0x11c)]()[_0x107f52(0x113)][_0x107f52(0x13c)](_0x12faa8)[_0x107f52(0x139)](),$(_0x107f52(0x142))[_0x107f52(0x140)]()):(_0x264d2d[_0x107f52(0x11c)]()[_0x107f52(0x139)](),$(_0x107f52(0x142))['hide']());}}},'error':function(_0xe507d4,_0x3ece79,_0x2e3090){var _0x103fa0=_0x30e96e;console[_0x103fa0(0x136)](_0x103fa0(0x13b)+_0x3ece79,_0x2e3090);}}),_0x264d2d;}var currentDate=new Date(),dayNames=[_0x1b411d(0x125),_0x1b411d(0x148),'Rabu',_0x1b411d(0x14b),_0x1b411d(0x115),'Sabtu',_0x1b411d(0x12b)],currentDay=dayNames[currentDate[_0x1b411d(0x12a)]()];document['getElementById']('currentDay')['textContent']=currentDay;
</script>


<?=$this->endSection()?>