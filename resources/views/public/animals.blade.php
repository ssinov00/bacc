<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<title>NOA</title>

<link rel="stylesheet" href="{{asset('assets/css/animals.css')}}">
<link href='http://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('assets/css/search.css')}}">


</head>

<body>

<div class="header" data-position="fixed">
<img src="assets/images/logoNOA.png" alt="NOA" width="350" height="140" />


@include('include.search_bar')

 </div>
<div style="clear:both;"></div>

<div class="wrap">
  
@foreach($animals as $animal)
  <div class="box box4 shadow2">
  <div class="content">
    
    <h3><strong>{{$animal->name}}</strong></h3>
    <img src="{{asset($animal->image)}}" alt="dog" width="250" height="200" />
    <p> <strong>Zupanija:</strong> {{$animal->region}} <br>
        <strong>Grad:</strong> {{$animal->city}}<br>
        <strong>Veterinarska stanica:</strong> {{$animal->vet_station}}<br>
        <strong>Spol:</strong> {{$animal->sex}}<br>
        <strong>Dob:</strong> {{$animal->age}}<br>
    </p>
    <br><br>
    <a href="#" class="button">Više ...</a>

  </div>
  </div>
@endforeach

<div class="paginator">
  {!!$animals->links()!!}            
</div>
  
  
</div>  
<div style="clear:both;"></div>
<div class="footer">

<p class="text">“The greatness of a nation and its moral progress can be <br>judged by the way its animals are treated.” <br>― Mahatma Gandhi </p>
  
  <p class="rights">NOA © All rights reserved | Web design & development by Stela Sinovčić</p>
</div>

</body>
</html>