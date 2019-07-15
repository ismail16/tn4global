@include('backend.partial.header')
@include('backend.partial.navbar')
@include('backend.partial.sidebar')

@yield('content')

@include('backend.partial.footer')
<script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').DataTable();
  } );
</script>
