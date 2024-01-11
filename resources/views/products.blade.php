<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h2 style="text-align: center; margin:5%;">Products List</h2>


    <table class="table">
        <thead>
          <tr>
            <th scope="col">Product Code</th>
            <th scope="col">First</th>
            <th scope="col">Quantiy </th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Photo</th>
            <th scope="col">Color</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                
          
          <tr>
            <th scope="row">{{$product->prod_code}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->qty}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td><img style="height: 40px; width:60px;" src="{{asset($product->photo)}}" alt=""></td>
            <td>{{$product->color}}</td>

            <td> 
                <a href="{{route('products-edit',['product' =>$product])}}">Edit</a>
            </td>
            <td>
              <form action="{{route('products-delete', ['product'=>$product])}}" method="post">
                @csrf
                @method('delete')
              <input type="submit"   value="delete">
              </form>
            </td>
           

          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
</body>
</html>