<?php
    use App\Http\Controllers\UserController;
?>
<html>
<style>
    .context{
        position:relative;
        left:10;
        border: 1px solid black;
        width:300px;
    }
    .context .contextinfo{
        position:relative;
        left:10;
    }
    .cti{
        position:relative;
        left:30;
    }
    .addreview{
        border:1px solid black;
        color:black;
        background-color:grey;
    }
    .review-info{
        background-color:grey;
        border: 1px solid black;
    }
    .review-description{
        position:relative;
        left:20;
    }
    .user-name{
        background-color:black;
        color:white;
        width:30%;
    }
</style>
    <body>
        <div class="row">
            <div class="col-md-3">
                <div class="context">
                    <div class="contextinfo">
                        <h1>{{$movie->movie_title}} {{$movie->productionYear}}</h1>
                        <div class="cti">
                            <img src="{{asset('uploads/'.$movie->thumbnail ) }}"  width="200" height="200">
                            <p>Duration : {{$movie->duration}}</p>
                            <p>Genre: {{$movie->genre}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <h1>Synopsis</h1>
                <p>{{$movie->synopsis}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
                <h1>Reviews</h1>
                @foreach($review as $rev)
                    @foreach($rev as $r)
                        <?php 
                            $user=new UserController;
                            $u=$user->getuserReview($r->user_id);
                        ?>
                        @foreach($u as $us)
                            <p class="user-name">{{$us->Fname}} {{$us->Lname}}</p>
                        @endforeach
                        <div class="review-info">
                            <p class="review-title">Title: {{$r->title}}</p>
                            <p class="review-description">{{$r->description}}</p>
                        </div>
                    @endforeach
                    
                @endforeach
                <a href="{{route('review.add',$movie->id)}}" class="addreview">Add Review</a>
            </div>
        </div>
    </body>
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/bootstrap.js"></script>
</html>