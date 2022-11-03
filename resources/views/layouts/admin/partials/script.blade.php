<!-- jQuery library -->
<script src="../../../js/jquery-3.6.0.min.js"></script>
<!-- bootstrap js -->
<script src="../../../js/bootstrap.bundle.min.js"></script>
<!-- bootstrap-toggle js -->
<script src="../../../js/bootstrap-toggle.min.js"></script>
<!-- slimscroll js for custom scrollbar -->
<script src="../../../js/jquery.slimscroll.min.js"></script>
<script src="../../../js/nicEdit.js"></script>
<!-- seldct 2 js -->
<script src="../../../js/select2.min.js"></script>

<script src="../../../assets/js/app.js"></script>



<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false
        });

        $('#adminTable').DataTable({
            order:[[ 6, "desc" ]],
            "columnDefs" : [{"targets":6, "type":"date"}],
            "bLengthChange": false,
        });

        $('#accountTable').DataTable({
            order:[[ 1, "desc" ]],
            "columnDefs" : [{"targets":1, "type":"date"}],
            "bLengthChange": false,
        });

    });
</script>
