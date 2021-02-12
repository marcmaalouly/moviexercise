<html>
    <body>
        <form action="{{route('add.review',$movieid)}}" method="POST">
        {{csrf_field()}}
            <label for="title">Title</label>
            <input type="text" name="title">
            </br>
            <label for="description">Description</label>
            <textarea name="description" rows="4" cols="50"></textarea>
            </br>
            <input type="submit" value="Add Review">
        </form>
    </body>
</html>