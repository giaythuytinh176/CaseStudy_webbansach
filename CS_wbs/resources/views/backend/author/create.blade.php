
<form method="post" action="{{route('author.store')}}">
    <table class="table">
        @csrf
        <tr>
            <td>FirstName<div class="form-control"><input type="text" name="first_name"></div></td>
        </tr>
        <tr>
            <td>LastName<div class="form-control"><input type="text" name="last_name"></div></td>
        </tr>
        <tr>
            <td colspan="2"><div class="form-submit"><input type="submit" value="submit"></div></td>
        </tr>
    </table>
</form>

