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

    // Perform the AJAX request and populate the DataTable
    $.ajax({
        url: url,
        method: 'GET',
        success: function (response) {
            console.log(response);
            if (response && response.error === 'No data found') {
                // Handle the case where data is not found
                dataTable.clear().draw();
                $(".loader-container").hide();
                // Display the "Data not found" message in the DataTable or elsewhere on the page
                // $(".no-data-message").text("Data not found").show();
            } else if (response && response.data && response.data.length > 0) {
                var data = response.data;
                console.log(data);

                // Ketika Anda menjalankan DataTable update, tampilkan loader.
                $(".loader-container").show();

                // Jalankan perintah DataTable Anda di sini
                dataTable.clear().rows.add(data).draw();

                // Setelah selesai, sembunyikan loader.
                $(".loader-container").hide();
            }
        },
        error: function (xhr, status, error) {
            // Handle AJAX error, you can log or display an error message
            console.error("AJAX Error: " + status, error);
            // Optionally, you can show an error message to the user here
        }
    });

    return dataTable; // Return the DataTable instance
}
