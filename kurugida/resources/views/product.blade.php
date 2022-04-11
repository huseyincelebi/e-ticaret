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
            <div class="card mb-3 mx-auto m-4" style="width:50%;">
                <div class="row g-0">
                  <div class="col-md-4 d-flex">
                    <img src="{{asset('images/products/'.$product->image)}}" class="img-fluid rounded-start align-self-center justify-self-center" alt="..." style="width:12rem;height:12rem;">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$product->name}}</h5>
                        <hr>
                        <p class="card-text">Kategori : <a href="../category/{{$product->category_id}}">@foreach($categories as $category) @if($category->id==$product->category_id){{$category->name}} @endif @endforeach</a></p>
                        <p class="card-text">Açıklama : {{$product->description}}</p>
                        <p class="card-text">Fiyat : {{$product->price}} TL</p>
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#buyModal">
                            Talep Et
                        </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mx-auto" style="width:50%;">
                <div class="card-body">
                    <a>Yorumlar</a>
                    <hr>
                    @if($comments_count==0)
                    <a>Henüz yorum yapılmamış</a>
                    @else
                    @foreach($comments as $comment)
                    <div class="card m-1">
                        <div class="card-body">
                            <a>{{$comment->name}}</a>
                            <br>
                            <a>{{$comment->comment}}</a>
                            <div class="d-flex justify-content-end">
                                <a>{{$comment->date}}</a>
                            </div>
                        </div>
                    </div>
                    {{$comments->links()}}
                    @endforeach
                    @endif
                    <hr>
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addModal">
                        Yorum Yap
                    </button>
                </div>
              </div>
        </main>
        <footer>
            
        </footer>
    </div>
    <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyModalLabel">Talep Et</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action='{{route("buyproduct")}}' method="post">
                    @csrf

                    <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">İsminiz</label>
                        <input type="text" name="personalname" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="personalemail" class="form-control">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="buyproduct" class="btn btn-primary">Talep Et</button>
                    </div>
                    <input type="text" name="productid" value="{{$product_id}}" hidden>
                </form>
            </div>
        </div>
    </div>
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Yorum Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action='{{route("addcomment")}}' method="post">
                    @csrf

                    <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">İsminiz</label>
                        <input type="text" name="personalname" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Yorumunuz</label>
                        <textarea name="productcomment" class="form-control"></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="addcomment" class="btn btn-primary">Ekle</button>
                    </div>
                    <input type="text" name="productid" value="{{$product_id}}" hidden>
                </form>
            </div>
        </div>
    </div>
</body>
</html>