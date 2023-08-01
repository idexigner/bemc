<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@stack('title') - MimsBangladesh</title>
  
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/')}}/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/')}}/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/')}}/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/')}}/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/')}}/admin/plugins/summernote/summernote-bs4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('/')}}/admin/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="{{ url('/')}}/admin/dist/css/adminlte.min.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  
    <style>
      .col-form-label{
        font-weight: 400;
      }
      .parsley-errors-list {
        color: #ff0000;
        font-size: 14px;
        list-style: none;
        margin: 5px 0 0;
        padding: 0;
      }

      .parsley-errors-list li {
        margin: 0;
        padding: 0;
      }

      .parsley-errors-list li:before {
        /* content: "\2022";
        margin-right: 5px; */
      }

      .parsley-required {
        font-weight: bold;
      }
    </style>

    @stack('css-link')
  </head>