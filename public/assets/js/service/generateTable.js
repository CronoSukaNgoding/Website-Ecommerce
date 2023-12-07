function generateTable(idTable, url, columns, order) {
    var dataTable = new DataTable(idTable, {
        columns: columns,
        order: order,
        fixedColumns: true,
        scrollCollapse: true,
        scrollY: 300,
        scrollX: true,
        serverSide: false,
    });

    $.ajax({
        url: url,
        method: 'GET',
        success: function (response) {
            console.log(response);
            if (response && response.error === 'No data found') {
                dataTable.clear().draw();
                $(".loader-container").hide();
            } else if (response && response.data && response.data.length > 0) {
                var data = response.data;
                $(".loader-container").show();
                dataTable.clear().rows.add(data).draw();
                $(".loader-container").hide();
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: " + status, error);
        }
    });

    return dataTable; 
}
