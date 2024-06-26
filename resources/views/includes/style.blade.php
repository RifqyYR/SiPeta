<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ url('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

<link href="{{ url('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

{{-- DataTables --}}
<link href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<!-- Custom fonts for this template-->
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<link rel="stylesheet" href="{{ url('template/css/pagination.css') }}" type="text/css" id="paginationjs-style" />

{{-- Toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="{{ url('template/css/main.css') }}">

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.min.css" rel="stylesheet">

<style>
    th {
        background-color: #2E3192 !important;
        color: white !important;
    }

    .green-thead {
        background-color: #00a651 !important;
    }

    .blue-thead {
        background-color: #2E3192 !important;
    }

    li.nav-item {
        color: grey !important;
    }

    table.table-bordered-black>thead>tr>th {
        border: 1px solid black;
    }

    table.table-bordered-black>thead>tr>th.transparent-th {
        border: 1px solid transparent;
    }

    table.table-bordered-black>tbody>tr>td {
        border: 1px solid black;
        box-sizing: border-box;
    }

    .img-pare,
    .img-barru,
    .img-pinrang,
    .img-sidrap {
        transition: transform 0.3s ease;
    }

    .card-pare:hover {
        background-color: #D2D2D2 !important;

        .img-pare {
            transform: scale(1.5);
        }
    }

    .card-barru:hover {
        background-color: #D2D2D2 !important;

        .img-barru {
            transform: scale(1.5);
        }
    }

    .card-sidrap:hover {
        background-color: #D2D2D2 !important;

        .img-sidrap {
            transform: scale(1.5);
        }
    }

    .card-pinrang:hover {
        background-color: #D2D2D2 !important;

        .img-pinrang {
            transform: scale(1.5);
        }
    }

    .btn-primary:hover {
        background-color: #2E3192 !important;
    }

    .sidebar-icon {
        transition: transform 0.3s ease;
    }

    .nav-item:hover {

        .sidebar-icon,
        .nav-text {
            transform: scale(1.2);
        }
    }

    .nav-text {
        font-size: 0.6rem !important;
    }

    .sidebar-divider {
        border-color: #1cc88a !important;
        border-width: 3px !important;
    }

    .btn-export:hover {
        background-color: #009648 !important;
    }

    .custom-col {
        font-size: 0.8rem;
        background-color: #158fdb !important;
    }

    .table-custom-fs {
        font-size: 0.7rem !important;
    }

    .table-custom-fs-larger {
        font-size: 0.8rem !important;
    }

    .fs-09rem {
        font-size: 0.9rem !important;
    }

    .table-custom-width {
        width: 8rem;
    }

    .table-custom-width-smaller {
        width: 5rem;
    }

    .btn-blue-custom {
        background-color: #2E3192 !important;
        font-size: 0.7rem !important;
    }

    .btn-approve-custom {
        background-color: #2E3192 !important;
    }

    .btn-blue-custom:hover,
    .btn-approve-custom:hover {
        background-color: #484de0 !important;
    }

    .no-bottom-border-radius {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .no-top-border-radius {
        border-top: 0;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .btn-confirm-approve {
        transition: transform 0.3s ease;
    }

    .btn-confirm-approve:hover {
        transform: scale(1.3);
    }

    .table-hover tbody tr:hover td,
    .table-hover tbody tr:hover th {
        font-weight: bold !important;
    }

    .fab-back {
        position: fixed;
        right: 1rem;
        bottom: 1rem;
        width: 2.75rem;
        height: 2.75rem;
        text-align: center;
        color: #fff;
        background: rgb(255, 0, 0);
        /* color: #05d689; */
        line-height: 46px;
    }

    .fab-back:focus,
    .fab-back:hover {
        color: white;
    }

    .fab-back:hover {
        background: rgb(201, 0, 0);
    }

    .fab-back i {
        font-weight: 800;
    }

    .btn-xs {
        padding: .25rem .4rem;
        font-size: .875rem;
        line-height: .5;
        border-radius: .2rem;
    }

    .paginate_button>a {
        font-size: 0.7rem !important;
    }

    .dataTables_length {
        font-size: 0.8rem !important;
    }

    div.dataTables_wrapper div.dataTables_length select {
        height: 30px;
        width: 60px;
        font-size: 0.7rem !important;
    }

    .form-select:hover {
        background-color: #ececec !important;
    }

    #pie-chart-pare,
    #pie-chart-barru,
    #pie-chart-sidrap,
    #pie-chart-pinrang {
        min-width: 7.5rem;
        min-height: 7.5rem;
    }

    .link-status:hover {
        color: #484de0 !important;
        font-weight: bold !important;
        text-decoration: none;
    }

    .background-green {
        background-color: #1cc88a !important;
    }

    .btn-green {
        background-color: #1cc88a !important;
        color: white !important;
    }

    .btn-green:hover {
        background-color: #1bba7f !important;
        color: white !important;
    }
</style>
