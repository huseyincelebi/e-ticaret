<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuru Gıda</title>
    <link rel="stylesheet" href="../css/app.css">
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
                <form id="search" method="GET" action="../search/">
                    <input type="text" name="keyword">
                </form>
                <div id="menuWrap">
                    <div id="category">
                        <button class="btn btn-white dropdown-toggle" type="button" id="categoryButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategoriler
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="categoryButton">
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="../category/{{$category->id}}">{{$category->name}}</a></li>
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
            <div class="row m-2" style="width:100;">
                <div class="col">
                    <h3 class="text-center">@foreach($categories as $category) @if($category->id==$id){{$category->name}} @endif @endforeach</h3>
                </div>
            </div>
            <div class="row mx-auto m-4" style="width:100;">
                <div class="col d-flex justify-content-end">
                  <a class="align-self-center mx-2 text-decoration-none text-black">Sıralama</a>
                  <div class="vr"></div>
                  <a class="align-self-center mx-2" href="?query=new">Yeni Ürünler</a>
                  <a class="align-self-center mx-2" href="?query=old">Eski Ürünler</a>
                  <a class="align-self-center mx-2" href="?query=low">Artan Fiyat</a>
                  <a class="align-self-center mx-2" href="?query=high">Azalan Fiyat</a>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto" style="width:65%;">
                @foreach ($products as $product)
                    <div class="col">
                    <div class="card h-100">
                        <img src="{{asset('images/products/'.$product->image)}}" class="card-img-top mx-auto m-2" alt="..." style="width:4rem;height:4rem;">
                        <div class="card-body">
                        <h5 class="card-title text-center"><a href="../product/{{$product->id}}">{{$product->name}}</a></h5>
                        <hr>
                        <p class="card-text">Açıklama : {{$product->description}}</p>
                        <p class="card-text">Fiyat : {{$product->price}} TL</p>
                        </div>
                    </div>
                    </div>
                @endforeach
              </div>
              <div class="row mx-auto m-4" style="width:65%;">
                  <div class="col">
                    {{$products->links()}}
                  </div>
              </div>
        </main>
        <footer>
            
        </footer>
    </div>
</body>
</html>