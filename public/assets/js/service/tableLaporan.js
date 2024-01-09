var columns = [{
        data: null,
        render: function (data, type, row, meta) {
            return meta.row + 1;
        }
    },
    {
        data: 'idOrder',
    },
    {
        data: 'orderDate',
    },
    {
        data: 'customerName',
    },
    {
        data: 'produkName',
    },
    {
        data: 'quantity',
    },
    {
        data: 'price',
    }
];

var order = [
    [0, 'asc']
];