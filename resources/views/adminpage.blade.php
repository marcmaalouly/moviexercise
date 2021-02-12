<html>
<head>
    <style>
        #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
    }
    </style>
</head>
    <h1>Hello {{$user->Fname}}</h1>
    <table id="customers">
    <tr>
        <th>Thumbnail</th>
        <th>title</th>
        <th>description</th>
        <th><?php Session::get('userid'); ?></th>
    </tr>
    @foreach($movie as $movies)
    <tr>
        <td><img src="{{$movies->thumbnail}}" ></td>
        <td><a href="{{route('movie.details',$movies->id)}}">{{$movies->movie_title}}</a></td>
        <td>{{$movies->description}}</td>
    </tr>
    @endforeach
    </table>
</html>