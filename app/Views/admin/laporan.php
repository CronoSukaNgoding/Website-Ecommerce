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
    function filterData() {
        var formattedStartDate = $("#start_date").val();
        var formattedendDate = $("#end_date").val();
        if (formattedStartDate === "" || formattedendDate === "") {
            alert("Please select valid start and end dates.");
            return;
        }
        var startDateObj = new Date(formattedStartDate);
        var endDateObj = new Date(formattedendDate);
        var startDate = startDateObj.toISOString().slice(0, 19).replace("T", " ");
        var endDate = endDateObj.toISOString().slice(0, 19).replace("T", " ");
        if (endDateObj < startDateObj) {
            alert("End date cannot be less than start date.");
            return;
        }
        endDateObj.setHours(23, 59, 59);
        if (dataTable) {
            dataTable.destroy();
        }
        console.log(formattedStartDate);
        console.log(formattedendDate);
        dataTable = generateTable('#categoryTable', '/ajax-laporan', columns, order, startDate, endDate);
    }
    $(document).ready(function () {
        dataTable = generateTable('#categoryTable', '/ajax-laporan', columns, order);
        $("#filter_button").on("click", filterData);
    });

    function generateTable(idTable, url, columns, order, startDate, endDate) {
        const jmlCol = columns.length;
        var newDataTable = $(idTable).DataTable({
            columns: columns,
            order: order,
            fixedColumns: true,
            scrollCollapse: true,
            scrollY: 300,
            scrollX: true,
            processing: false,
            serverSide: false,
            dom: 'Bfrtip',
            buttons: ["copy", "excel", "pdf"],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
        });
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const day = String(now.getDate()).padStart(2, '0');

        const isStart = `${year}-${month}-${day} 00:00:00`;
        const isEnd = `${year}-${month}-${day} 23:59:59`;
        if (typeof startDate != 'undefined' && typeof endDate != 'undefined') {
            startDateProps = startDate;
            endDateProps = endDate;
        }else{
            startDateProps = isStart;
            endDateProps = isEnd;
        }
        var requestData = {
            
            startDate: startDateProps,
            endDate: endDateProps
        };

        $.ajax({
            url: url,
            method: 'POST',
            data: requestData,
            dataSrc: 'data',
            beforeSend: function () {
                $(idTable + " tbody").empty();
                $(idTable + " tbody").append(
                "<tr>" +
                "<td colspan='" + jmlCol + "'>" +
                "<center>" +
                "<div class='loader' id='loader-1'></div>" +
                "</center>" +
                "</td>" +
                "</tr>"
                );
            },
            success: function (response) {
                if (response && response.error === 'No data found') {
                    newDataTable.clear().draw();
                    $(".loader-container").hide();
                } else if (response.response && response.response.data) {
                    var data = response.response.data;
                    if (data.length > 0) {
                        $(".loader-container").show();
                        newDataTable.clear().rows.add(data).draw();
                        $(".loader-container").hide();
                    } else {
                        newDataTable.clear().draw();
                        $(".loader-container").hide();
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status, error);
            }
        });
        
        return newDataTable;
    }
    
    var currentDate = new Date();
    var dayNames = [
        "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",
        "Minggu"
    ];

    var currentDay = dayNames[currentDate.getDay()];
    document.getElementById("currentDay").textContent = currentDay;
</script>


<?=$this->endSection()?>