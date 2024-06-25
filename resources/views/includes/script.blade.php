<!-- Bootstrap core JavaScript-->
<script src="{{ url('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

{{-- ChartJS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('template/js/sb-admin-2.js') }}"></script>

{{-- DataTables --}}
<script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>

{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.all.min.js"></script>

<!-- Chart -->
@if (Request::route()->getName() == 'home')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.js">
    </script>
    <script src="{{ url('template/js/area-chart.js') }}"></script>
@endif

<script>
    @if (session()->has('success'))
        Swal.fire({
            position: "center",
            icon: "success",
            title: '{{ session('success') }}',
        });
    @elseif (session()->has('error'))
        Swal.fire({
            position: "center",
            icon: "error",
            title: '{{ session('error') }}',
        });
    @endif

    function hapusUser(id) {
        const link = document.getElementById('deleteUserLink');
        link.href = "/delete-user/" + id;
    }
    
    function hapusDataBayam(id) {
        const link = document.getElementById('deleteSpinachLink');
        link.href = "/hapus-pertumbuhan-bayam/" + id;
    }
    
    function hapusDataBawang(id) {
        const link = document.getElementById('deleteOnionLink');
        link.href = "/hapus-pertumbuhan-bawang/" + id;
    }

    $(document).ready(function() {
        $('#dataTable').DataTable();
        $('.editable-select').editableSelect();
    });

    function hapusDataUser(uuid) {
        const link = document.getElementById("deleteUserDataLink");
        link.href = "/kelola-user/hapus/" + uuid;
    }
</script>
