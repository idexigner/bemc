<!DOCTYPE html>
<html lang="en">

    @include('admin.layout.header')


<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    
  </nav>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
  @include('admin.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('main-section')
    
  </div>

    <script>
      var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
      });
    </script>
  <!-- /.content-wrapper -->
    @include('admin.layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('/')}}/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('/')}}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('/')}}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/jszip/jszip.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
<script src="{{ url('/')}}/admin/plugins/select2/js/select2.full.min.js"></script>

<!-- bs-custom-file-input -->
<script src="{{ url('/')}}/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

{{-- Parsley --}}

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.3/parsley.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>

<!-- AdminLTE App -->
<script src="{{ url('/')}}/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/')}}/admin/dist/js/demo.js"></script>

<script>
  function declareSummernote(param){
    $(param).summernote({
            height:100,
            toolbar: [
            // ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'fontsize']],
            // ['fontname', ['fontname']],
            // ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            // ['height', ['height']],
            // ['table', ['table']],
            ['insert', ['link']],//, 'picture', 'hr'
            ['view', ['fullscreen', 'codeview']],
            // ['help', ['help']]
            ],
        });
  }

  function initializeDataTable(tableName, ajaxUrl, columnsArray) {
    var table = $(tableName).DataTable({
      processing: true,
      serverSide: true,
      ajax: ajaxUrl,
      columns: columnsArray,
      "order": [],
      "language": {
        "search": "Search Records:",
        "lengthMenu": "Show _MENU_ Records",
        "zeroRecords": "No matching records found",
        "info": "Showing _START_ to _END_ of _TOTAL_ records",
        "infoEmpty": "Showing 0 to 0 of 0 records",
        "infoFiltered": "(filtered from _MAX_ total records)",
        "paginate": {
          "first": "First",
          "last": "Last",
          "next": "Next",
          "previous": "Previous"
        }
      },
      "pageLength": 10
    });
  }

  function formatDate(dateString) {
    const parts = dateString.split('-');
    const year = parts[0];
    const month = parts[1];
    const day = parts[2];
    return `${month}/${day}/${year}`;
  }

  




</script>
@stack('js-link')


</body>
</html>
