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
    <div class="justify-content-center">
    <h2 style="text-align: center; margin:5%;">Products Page</h2>
   
<div class="container">

    <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        
        <div class="row g-3">
            <div class="col">
              <input type="text" class="form-control" name="name"   placeholder="Name" aria-label="Name">
            </div>
            <div class="col">
              <input type="number" class="form-control" name="qty" placeholder="Quantity" aria-label="Quantity">
            </div>

            <div class="col">
                <input type="text" class="form-control" name="price" placeholder="Price" aria-label="Price">
              </div>
              <div class="col">
                <input type="text" class="form-control" name="description" placeholder="Description" aria-label="Description">
              </div>
              <div class="col">
                <input type="file" class="form-control" name="photo" placeholder="Photo Upload" aria-label="photo">
              </div>
             <div class="row">
              color
              <div class="form-check">
                
                <input class="form-check-input" type="radio" name="color" value="Black" id="color">
                <label class="form-check-label" for="color">
                  Black
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="color" value="White" id="color" checked>
                <label class="form-check-label" for="color">
                 white
                </label>
              </div>
             </div>
             <label for="">Atribute</label>
             <select name="stuff" id="attribute" class="custom-select">
              @foreach ($attributes as $attribute)
                  
           
              <option value="{{$attribute->value}}">{{$attribute->name}} -- {{$attribute->value}}</option>
    
              @endforeach
            </select>

            <div class="col-12">
                <input type="submit"  value="submit" placeholder="submit" class="btn btn-primary">
                {{-- <button type="submit" class="btn btn-primary">Sign in</button> --}}

              </div>
          </div>
          
    </form>
</div>
</body>
</html>