<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuru Gıda</title>
    <link rel="stylesheet" href="css/app.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div id="root">
        <header>
            <nav>
                <div id="logo">
                    <a href="/" class="text-decoration-none">Kuru Gıda</a>
                </div>
                <form id="search" method="GET" action="search/">
                    <input type="text" name="keyword">
                </form>
                <div id="menuWrap">
                    <div id="category">
                        <button class="btn btn-white dropdown-toggle" type="button" id="categoryButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategoriler
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="categoryButton">
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="category/{{$category->id}}">{{$category->name}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                    <div id="menu">
                        <button class="btn btn-white" type="button" id="menuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="menuButton">
                            <li><a class="dropdown-item" href="../products">Ürünler</a></li>
                            <div id="responsivemenu" style="display:none">
                                <li><hr class="dropdown-divider"></li>
                                <li><h6 class="dropdown-header">Kategoriler</h6></li>
                                @foreach($categories as $category)
                                <li><a class="dropdown-item" href="../category/{{$category->id}}">{{$category->name}}</a></li>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="line">

            </div>
        </header>
        <main>
        <div id="carouselWrap">
            <div id="carousel" class="carousel slide rounded-3 carousel-fade shadow" style="margin:0 auto;" data-bs-ride="carousel">
            <div id="carouselContainer">
                <div class="carousel-inner rounded-3">
                <div class="carousel-item active">
                    <div id="carouselGrid">
                    <div class="carousel-caption align-self-center text-black" style="font-size:1vw;color:blue;position:relative !important;right:auto !important;bottom:auto !important;left:auto !important;padding-bottom:0 !important;padding-top:0 !important;">
                        <h5>Deneme Yazı</h5>
                        <p>Deneme Yazı Deneme Yazı Deneme Yazı Deneme Yazı Deneme Yazı Deneme Yazı</p>
                    </div>
                    <img src="https://www.kagnicioglugida.com.tr/Upload/kuru_gida-8122020_140336.jpg" class="d-block w-100" alt="..." style="width:auto;height:24rem;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div id="carouselGrid">
                    <div class="carousel-caption align-self-center text-black" style="font-size:1vw;color:blue;position:relative !important;right:auto !important;bottom:auto !important;left:auto !important;padding-bottom:0 !important;padding-top:0 !important;">
                        <h5>Deneme Yazı</h5>
                        <p>Deneme Yazı Deneme Yazı Deneme Yazı Deneme Yazı Deneme Yazı Deneme Yazı</p>
                    </div>
                    <img src="https://bolgewp.s3.eu-central-1.amazonaws.com/bolgegazetesi/2021/01/kuru-gida.jpg" class="d-block w-100" alt="..." style="width:auto;height:24rem;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div id="carouselGrid">
                    <div class="carousel-caption align-self-center text-black" style="font-size:1vw;color:blue;position:relative !important;right:auto !important;bottom:auto !important;left:auto !important;padding-bottom:0 !important;padding-top:0 !important;">
                        <h5>Deneme Yazı</h5>
                        <p>Deneme Yazı Deneme Yazı Deneme Yazı Deneme Yazı Deneme Yazı Deneme Yazı</p>
                    </div>
                    <img src="https://analizmarketi.com.tr/image/catalog/kurugida-600x315w.jpg" class="d-block w-100" alt="..." style="width:auto;height:24rem;">
                    </div>
                </div>
                <div id="carouselControl">
                    <div class="carousel-indicators" style="width:60%;left:auto !important;margin-right:auto !important;margin-bottom:2.5% !important;">
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev" style="left:40%;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div id="promotionWrap">
            <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="mx-auto" style="width:3rem;margin-bottom:0.5rem;">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" style="width:3rem;height:3rem;">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    </div>
                    <h5 class="card-title text-center">Güvenilir Alışveriş</h5>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="mx-auto" style="width:3rem;margin-bottom:0.5rem;">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" style="width:3rem;height:3rem;">
                        <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    </div>
                    <h5 class="card-title text-center">Hızlı Kargo</h5>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="mx-auto" style="width:3rem;margin-bottom:0.5rem;">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" style="width:3rem;height:3rem;">
                        <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                    </svg>
                    </div>
                    <h5 class="card-title text-center">Müşteri Memnuniyeti</h5>
                </div>
                </div>
            </div>
            </div>
            <div class="card m-4 mx-auto" style="width:65%;">
                <div class="card-header">
                  Biz kimiz ?
                </div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>Kaliteli ürünleri en hızlı ve en iyi şekilde satmaya çalışıyoruz.</p>
                    <footer class="blockquote-footer">Kuru Gıda</footer>
                  </blockquote>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mx-auto m-4" style="width:65%;">
                <h5>Yeni Gelen Ürünler</h5>
                <div></div>
                @foreach($products as $product)
                <div class="col">
                  <div class="card h-100">
                    <img src="{{asset('images/products/'.$product->image)}}" style="width:4rem;height:4rem;" class="mx-auto">
                    <div class="card-body">
                      <h5 class="card-title text-center">{{$product->name}}</h5>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
        </div>
        </main>
        <footer>
            
        </footer>
    </div>
</body>
</html>