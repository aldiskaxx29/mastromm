<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ url('../Maxstrom.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="../assets/css/style.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    {{-- <link rel="stylesheet" href="../assets/css/components.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <title>@yield('title')</title>
    <style>
        #detail{
            margin-left:400px;
        }
        /* #navkun{
            position: fixed;
        } */
       /* laptop */
        @media only screen and (min-width: 992px) {
            #fom{
                margin-left:150px;
                margin-top:5px;
            }
            #search{
                width:600px;
            }
            #navkun{
                position: fixed;
            }
        }

        /* tablet */
        @media screen and (max-width: 992px) {
            /* body {
                background-color: blue;
            } */
            .mb{
                margin-bottom:10px;
            }
            #detail{
                margin-left:100px;
            }
        }

        /* hp */
        @media screen and (max-width: 600px) {
            #fom{
                margin-left:60px;
                margin-top:10px;
            }
            /* body {
                background: yellow;
            } */
            .mb{
                margin-bottom:10px;
            }
            #detail{
                margin-left:90px;
            }
        }
    </style>
  </head>
  <body>
    {{-- <h1>Hello, world!</h1> --}}
    @include('template.navbar')
    {{-- @yield('navbar') --}}

    @yield('content')




    <div id="modalFoto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body text-center">
              <img src="" alt="Foto Bukti" id="fotoBukti" width="100%">
            </div>
          </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>

    <script>
    $(document).ready(function() {

        $('#slider').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
        });

        // $('.foto-bukti img').click(function(e) {
        //     e.preventDefault()
        //     let srcImg = $(this).attr('src')
        //     console.log(srcImg)
        //     $('#fotoBukti').attr('src', srcImg)
        //     $('#modalFoto').modal('show')
        // });

        // $(document).ready(function(){
        //     $('#myTable').DataTable();
        // })


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

            // $('.jumlah').change(function(){
            //     var id = $(this).data("id");
            //     updateharga(id);
            // });

            // function updateharga(id) {
            //     var bil1 = $('#jumlah'+ id).val();
            //     var bil2 = $('.harga'+ id).val();

            //     var hasil = bil1*bil2;

            //     $('#hasil'+id).val(hasil);
            //     total_harga();
            // }

            // function total_harga() {
            //     var sum = 0;
            //     $('.hasil').each(function() {
            //         var num = $(this).val();
            //         if(num != 0) {
            //             sum += parseFloat(num);
            //         }
            //     });
            //     $('#total_harga').val(sum);
            // }


        //    $('.jumlah').click(function(){
        //     var rupiah = document.getElementById('rupiah');
        //     rupiah.addEventListener('keyup', function(e){
        //         // tambahkan 'Rp.' pada saat form di ketik
        //         // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        //         rupiah.value = formatRupiah(this.value, 'Rp. ');
        //     });
        //    });
    });

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tambah_alamat').click(function() {
            var nama_alternatif = $('#nama_alternatif').val();
            var no_telepon_alternatif = $('#no_telepon_alternatif').val();
            var alamat_alternatif = $('#alamat_alternatif').val();

            $.ajax({
                method: "post",
                url: "{{ url('tambah-alamat') }}",
                data: {
                    nama_alternatif: nama_alternatif,
                    no_telepon_alternatif: no_telepon_alternatif,
                    alamat_alternatif: alamat_alternatif
                },
                success: function(resp) {
                    console.log(resp);
                    $('#alamatModal').modal("hide");
                    var html = `<tr>
                                    <td>`+ resp.nama_alternatif +`</td>
                                    <td>`+ resp.no_telepon_alternatif +`</td>
                                    <td>`+ resp.alamat_alternatif +`</td>
                                </tr>`;
                    $('#value_alamat').append(html);
                }, error: function(err) {
                    console.log('Sorry Error' + err);
                }
            });
        });

    });
    </script>
    @yield('script')

    @include('sweetalert::alert')
  </body>
</html>
