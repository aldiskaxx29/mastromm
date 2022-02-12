<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="../assets/css/style.css"> --}}
    {{-- <link rel="stylesheet" href="../assets/css/components.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <title>Hello, world!</title>
    <style>
        @media only screen and (min-width: 992px) {
            #fom{
                margin-left:150px;
            }
            #search{
                width:600px;
            }
        }
    </style>
  </head>
  <body>
    {{-- <h1>Hello, world!</h1> --}}
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <form class="form-inline mr-auto" id="fom">
                <ul class="navbar-nav mr-3">
                  {{-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> --}}
                </ul>
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="search">
                  {{-- <button class="btn" type="submit"><i class="fas fa-search"></i></button> --}}
                </div>
              </form>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
                </li> --}}
                <li class="nav-link" style="margin-top:10px;margin-right:10px;margin-top:;">
                    <i class="fa fa-shopping-cart" style="font-size: 20px;color:black;"></i>
                    <small style="color:white;margin-top:-5px;position:absolute;padding-left:4px;padding-right:4px;background:orange;border-radius:50%;margin-left:-9px;font-size:11px;">1</small>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1" width="30">
                    <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">Logged in 5 min ago</div>
                    <a href="features-profile.html" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                    <a href="features-activities.html" class="dropdown-item has-icon">
                        <i class="fas fa-bolt"></i> Activities
                    </a>
                    <a href="features-settings.html" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    </div>
                </li>
                
            </ul>
            </div>
        </nav>

        {{-- slider --}}
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block " src="{{ url('promo.png') }}" alt="First slide" width="50%" style="margin-left: auto;margin-right:auto;">
              </div>
              <div class="carousel-item">
                <img class="d-block " src="{{ url('promo1.png') }}" alt="Second slide" width="50%" style="margin-left: auto;margin-right:auto;">
              </div>
              <div class="carousel-item">
                <img class="d-block " src="{{ url('promo2.png') }}" alt="Third slide" width="50%" style="margin-left: auto;margin-right:auto;">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>

        <h2 class="text-center">Produk Terbaru</h2>
      <div class="row justify-content-center" id="slider">
        @foreach ($barangs as $item)
        <div class="col-md-12">
            <div class="card" style="width: 18rem;" >
                <a href="{{ url('pesan/' . $item->id) }}" style="margin: 10px;">
                    <img class="card-img-top" src="{{ url('produk')}}/{{ $item->gambar }}" alt="Card image cap">
                    <strong style="position: absolute;margin-top:-40px;color:white;margin-left:10px;font-size:24px;">{{ $item->nama_barang }}</strong>
                </a>
                {{-- <div class="card-body">
                  <h5 class="card-title">{{ $item->nama_barang }}</h5>
                  <p class="card-text">
                    <strong>Harga : </strong> Rp. {{ $item->harga }} <br>
                    <strong>Stok : </strong> {{ $item->stok }} <hr>
                    <strong>Keterangan : </strong> <br>
                    {{ $item->keterangan }}
                  </p>
                  <a href="{{ url('pesan/' . $item->id) }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                </div> --}}
            </div>
        </div>
        @endforeach
      </div>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <script>
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
    </script>
  </body>
</html>