<!DOCTYPE html>
<html>
<head>


    <title>Instagram API</title>
    <link type="text/css" rel="stylesheet" href="{{ url('css/materialize.css')}}"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Instagram API</a>
      </ul>
    </div>
  </nav>
<br><br>

<div class="container">



    <form method="GET" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter Instagram Username" value="{{ old('username') }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <button class="btn btn-success">Search</button>
                </div>
            </div>
            <br>
            @if(!empty($items))
             @foreach($items as $key => $item)
                 <div class="col s12 m6">
                        <div class="card">
                         <div class="card-image waves-effect waves-block waves-light">
                             <img class="activator" src="{{ $item['images']['standard_resolution']['url'] }}">
                         </div>
                         <div class="card-content">
                             <span class="card-title activator grey-text text-darken-4">
                                    <i class="material-icons">thumb_up</i>&nbsp;{{ $item['likes']['count'] }}<i class="material-icons right">more_vert</i>
                                &nbsp;&nbsp;
                                    <i class="material-icons">textsms</i>&nbsp;{{ $item['comments']['count'] }}
                             </span>
                         </div>
                         <div class="card-reveal">
                             <span class="card-title grey-text text-darken-4">Comments<i class="material-icons right">close</i></span>
                                 <ul class="collection">
                                     @foreach($item['comments']['data'] as $key => $item2)
                                <li class="collection-item avatar">
                                  <img src="{{ $item2['from']['profile_picture'] }}" alt="" class="circle">
                                  <span class="title" style="font-weight:bold">{{ $item2['from']['full_name'] }}&nbsp;<label>{{ $item2['from']['username'] }}</label></span>
                                        <p>{{ $item2['text'] }}</p>
                                </li>
                                    @endforeach
                             </ul>
                         </div>
                     </div>
                 </div>
                    @endforeach
                @else
                     <tr>
                        <td colspan="4">Data tidak ditemukan atau akun telah di Private.</td>
                     </tr>
                @endif
    </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ url('js/materialize.js')}}"></script>

</body>
</html>
