// Basic DataTable
$(function () {
    $('#basicExampleUser').DataTable({
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
            "info": "Showing Page _PAGE_ of _PAGES_",
        },
        "order": [[2, 'asc']], //default sorting
        "columnDefs": [
            { "orderable": false, "targets": 0 },
            { "orderable": false, "targets": 1 },
            { "orderable": false, "targets": 6 }
        ]
    });
});
// Basic DataTable
$(function () {
    $('#basicExampleKandidat').DataTable({
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
            "info": "Showing Page _PAGE_ of _PAGES_",
        },
        "order": [[2, 'asc']], //default sorting
        "columnDefs": [
            { "orderable": false, "targets": 0 },
            { "orderable": false, "targets": 1 },
            { "orderable": false, "targets": 8 }
        ]
    });
});
// Basic DataTable
$(function () {
    $('#basicExampleJadwal').DataTable({
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
            "info": "Showing Page _PAGE_ of _PAGES_",
        },
        "order": [[1, 'asc']],
        "columnDefs": [
            { "orderable": false, "targets": 0 },
            { "orderable": false, "targets": 6 }
        ]
    });
});



// Vertical Scroll
$(function () {
    $('#scrollVertical').DataTable({
        "scrollY": "207px",
        "scrollCollapse": true,
        "paging": false,
        "bInfo": false,
    });
});



// Highlighting rows and columns
$(function () {
    $('#highlightRowColumn').DataTable({
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
        }
    });
    var table = $('#highlightRowColumn').DataTable();
    $('#highlightRowColumn tbody').on('mouseenter', 'td', function () {
        var colIdx = table.cell(this).index().column;
        $(table.cells().nodes()).removeClass('highlight');
        $(table.column(colIdx).nodes()).addClass('highlight');
    });
});



// Using API in callbacks
$(function () {
    $('#apiCallbacks').DataTable({
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
        },
        "initComplete": function () {
            var api = this.api();
            api.$('td').on('click', function () {
                api.search(this.innerHTML).draw();
            });
        }
    });
});


// Hiding Search and Show entries
$(function () {
    $('#hideSearchExample').DataTable({
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "searching": false,
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
            "info": "Showing Page _PAGE_ of _PAGES_",
        }
    });
});
