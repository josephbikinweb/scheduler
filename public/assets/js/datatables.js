document.querySelectorAll('.datatable').forEach(table => {
    new DataTable(table, {
        pageLength: 25,
        lengthMenu: [
            [25, 50, 100],
            [25, 50, 100],
        ],
    });
});
