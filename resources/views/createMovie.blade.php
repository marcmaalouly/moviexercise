<html>
<h1>Add new movie</h1>
    <form action="{{route('movie.create')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
        <label for="mname">Movie Name</label>
        <input type="text" name="mname">
        </br>
        <label for="year">Production Year</label>
        <input type="text" name="year">
        </br>
        <label for="duration">Duration</label>
        <input type="text" name="duration">
        </br>
        <label for="genre">Genre</label>
        <input type="text" name="genre">
        </br>
        <label for="synopsis">Synopsis</label>
        <textarea name="synopsis" rows="4" cols="50"></textarea>
        </br>
        <label for="description">description</label>
        <textarea name="description" rows="4" cols="50"></textarea>
        </br>
        <label ><b>Thumbnail <b> </label>
        <input type="file" name="thumbnail">
        </br>
        <input type="submit" value="Submit">
    </form>
</html>