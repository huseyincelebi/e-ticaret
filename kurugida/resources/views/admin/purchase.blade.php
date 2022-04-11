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
                    <a class="nav-link" aria-current="page" href="category">Kategoriler</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="product">Ürünler</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="#">Satışlar</a>
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
                            Satış Sayısı <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{$purchase_count}} <span class="visually-hidden">unread messages</span></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row w-100 mx-auto">
                <div class="col p-4">
                    <div class="d-flex mx-auto">
                        @if ($purchase_count==null)
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
                                <th scope="col">İsim</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alınan Ürün</th>
                                </tr>
                            </thead>
                            @foreach($purchases as $purchase)
                            <tbody>
                                <tr>
                                <th scope="row">{{$purchase->id}}</th>
                                <td>{{$purchase->name}}</td>
                                <td>{{$purchase->email}}</td>
                                @foreach($products as $product)
                                @if($product->id == $purchase->product_id)
                                <td>{{$product->name}}</td>
                                @endif
                                @endforeach
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        @endif
                        {{$purchases->links()}}
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>