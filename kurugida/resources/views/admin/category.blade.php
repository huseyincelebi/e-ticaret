<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../admin">Kuru Gıda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="category">Kategoriler</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="product">Ürünler</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="purchase">Satışlar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="row w-100 mx-auto">
                <div class="col">
                    <div class="d-flex justify-content-center gap-4 p-2 mx-auto">
                        <button type="button" class="btn btn-primary position-relative">
                            Kategori Sayısı <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{$category_count}} <span class="visually-hidden">unread messages</span></span>
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                            Kategori Ekle
                        </button>
                    </div>
                </div>
            </div>
            <div class="row w-100 mx-auto">
                <div class="col p-4">
                    @if(Request::get('edit')==null)
                    <div class="d-flex mx-auto">
                        @if ($category_count==null)
                        <div class="card w-100">
                            <div class="card-body">
                                <h5 class="text-break">Hiç kategori eklenmemiş.</h5>
                            </div>
                        </div>
                        @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kategori İsmi</th>
                                <th scope="col">Düzenle</th>
                                <th scope="col">Sil</th>
                                </tr>
                            </thead>
                            @foreach($categories as $category)
                            <tbody>
                                <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td><a href="?edit={{$category->id}}"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a></td>
                                <td><a href="{{route('deletecategory')}}?id={{$category->id}}"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        @endif
                        {{$categories->links()}}
                        @else
                        <form action='{{route("editcategory")}}' method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Ürün İsmi</label>
                                <input type="text" name="categoryname" class="form-control" value="{{$editcategory->name}}">
                            </div>
                            <input type="text" name="categoryid" value={{Request::get('edit')}} hidden>
                            <button type="submit" name="edicategory" class="btn btn-primary">Düzenle</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Kategori Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action='{{route("addcategory")}}' method="post">
                    @csrf

                    <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kategori İsmi</label>
                        <input type="text" name="categoryname" class="form-control">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="addcategory" class="btn btn-primary">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>