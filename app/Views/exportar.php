<!DOCTYPE html>
<html lang='en' class=''>

<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css'>
    <style class="cp-pen-styles">
    :after,
    :before {
        box-sizing: border-box;
    }

    a {
        color: #337ab7;
        text-decoration: none;
    }

    i {
        margin-bottom: 4px;
    }

    .btn {
        display: inline-block;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }


    .btn-app {
        color: white;
        box-shadow: none;
        border-radius: 3px;
        position: relative;
        padding: 10px 15px;
        margin: 0;
        min-width: 60px;
        max-width: 80px;
        text-align: center;
        border: 1px solid #ddd;
        background-color: #f4f4f4;
        font-size: 12px;
        transition: all .2s;
        background-color: steelblue !important;
    }

    .btn-app>.fa,
    .btn-app>.glyphicon,
    .btn-app>.ion {
        font-size: 30px;
        display: block;
    }

    .btn-app:hover {
        border-color: #aaa;
        transform: scale(1.1);
    }

    .pdf {
        background-color: #dc2f2f !important;
    }

    .excel {
        background-color: #3ca23c !important;
    }

    .csv {
        background-color: #e86c3a !important;
    }

    .imprimir {
        background-color: #8766b1 !important;
    }

    /*
            Esto es opcional pero sirve para que todos los botones de exportacion se distribuyan de manera equitativa usando flexbox

            .flexcontent {
            display: flex;
            justify-content: space-around;
            }
            */

    .selectTable {
        height: 40px;
        float: right;
    }

    div.dataTables_wrapper div.dataTables_filter {
        text-align: left;
        margin-top: 15px;
    }

    .btn-secondary {
        color: #fff;
        background-color: #4682b4;
        border-color: #4682b4;
    }

    .btn-secondary:hover {
        color: #fff;
        background-color: #315f86;
        border-color: #545b62;
    }



    .titulo-tabla {
        color: #606263;
        text-align: center;
        margin-top: 15px;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .inline {
        display: inline-block;
        padding: 0;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <table id="tabela" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Todos Dias</th>
                            <th>Game</th>
                            <th>Pontuação</th>
                            <th>Posição</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($score as $result): ?>
                        <tr>
                            <td><?=$result['nome'];?></td>
                            <td><?=$result['email'];?></td>
                            <td><?=$result['telefone'];?></td>
                            <td><?=$result['todosdias'];?></td>
                            <td><?=$result['game'];?></td>
                            <td><?=$result['pontuacao'];?></td>
                            <td><?=$result['posicao'];?></td>
                            <td><?=$result['data'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Todos Dias</th>
                            <th>Game</th>
                            <th>Pontuação</th>
                            <th>Posição</th>
                            <th>Data</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js'></script>
    <script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js'></script>
    <script>
    var idioma =

        {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
            },

            "buttons": {
                "copyTitle": 'Informação copiada',
                "copyKeys": 'Use your keyboard or menu to select the copy command',
                "copySuccess": {
                    "_": '%d registros copiados',
                    "1": '1 fila copiada al portapapeles'
                },


                "pageLength": {
                    "_": "Mostrar %d registros",
                    "-1": "Mostrar Todos"
                }
            }
        };




    $(document).ready(function() {


        var table = $('#tabela').DataTable({

            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": idioma,
            "lengthMenu": [
                [100, 150, 200, -1],
                [100, 150, 200, "Mostrar Todos"]
            ],
            dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',


            buttons: {
                dom: {
                    container: {
                        tag: 'div',
                        className: 'flexcontent'
                    },

                    buttonLiner: {
                        tag: null
                    }
                },

                buttons: [{
                        extend: 'copyHtml5',
                        text: '<i class="fa fa-clipboard"></i>Copiar',
                        title: 'Titulo de tabla copiada',
                        titleAttr: 'Copiar',
                        className: 'btn btn-app export barras',
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o"></i>PDF',
                        title: 'Cadastros',
                        titleAttr: 'PDF',
                        className: 'btn btn-app export pdf',
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        },

                        customize: function(doc) {

                            doc.styles.title = {
                                color: '#4c8aa0',
                                fontSize: '30',
                                alignment: 'center'
                            };

                            doc.styles['td:nth-child(2)'] = {
                                    width: '100px',
                                    'max-width': '100px'
                                },

                                doc.styles.tableHeader = {
                                    fillColor: '#4c8aa0',
                                    color: 'white',
                                    alignment: 'center'
                                },

                                doc.content[1].margin = [100, 0, 100, 0];

                        }
                    },

                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o"></i>Excel',
                        title: 'Cadastros',
                        titleAttr: 'Excel',
                        className: 'btn btn-app export excel',
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text-o"></i>CSV',
                        title: 'CSV',
                        titleAttr: 'CSV',
                        className: 'btn btn-app export csv',
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>Imprimir',
                        title: 'Cadastros',
                        titleAttr: 'Ofertas',
                        className: 'btn btn-app export imprimir',
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pageLength',
                        titleAttr: 'Registros a mostrar',
                        className: 'selectTable'
                    }
                ]
            }
        });

    });
    //# sourceURL=pen.js
    </script>
</body>

</html>