
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css') }}">
  <style>
      .active{
          color:orange;
      }
  </style>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.perbesar').fancybox();
    });
  </script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg bg-warning"></div>
      @include('template_admin.topbar')

      @include('template_admin.sidebar')

      <!-- Main Content -->
      @yield('content')

      <footer class="main-footer">
        <div class="footer-left">
          {{-- Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a> --}}
        </div>
        <div class="footer-right">
          {{-- 2.3.0 --}}
        </div>
      </footer>
    </div>
  </div>

  <div id="modalFoto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img src="" alt="Foto Bukti" id="fotoBukti" width="100%">
        </div>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  {{-- https://code.jquery.com/jquery-3.5.1.js --}}
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js') }}"></script>
  <script src="{{asset('assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  {{-- <script>
    $(document).ready(function(){
      $('#myTable').DataTable();
    })

    $('.foto-bukti img').click(function(e) {
      e.preventDefault()
      let srcImg = $(this).attr('src')
      console.log(srcImg)
      $('#fotoBukti').attr('src', srcImg)
      $('#modalFoto').modal('show')
    })
  </script> --}}
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
  
      $('.foto-bukti img').click(function(e) {
        e.preventDefault()
        let srcImg = $(this).attr('src')
        console.log(srcImg)
        $('#fotoBukti').attr('src', srcImg)
        $('#modalFoto').modal('show')
      })
  
      $('#tahun').change(function(e) {
        $('#formFilterTahun').submit()
      })
    });

 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Apakah kamu yakin ingin menghapus`,
              // text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
</body>
</html>
