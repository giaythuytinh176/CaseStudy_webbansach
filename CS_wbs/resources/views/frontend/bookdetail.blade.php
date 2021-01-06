<h1>Chi tiết Sách</h1>
</div>
    @foreach($bookdetail as $key=>$val)
        <tr>
            <td>
                <a href="{{route('showbookdetail',$val->id)}}">{{$val->name}}</a>
            </td>
        </tr>


</div>
    @endforeach
<td>
    @php
        $arr_bookdetail = [];
        $book_id = $val->id;
        $author = \App\Models\Author::whereHas('books', function (\Illuminate\Database\Eloquent\Builder $q) use ($book_id) {
            $q->where("books.id", "=", $book_id);
        })->get();
        foreach ($author as $item) {
            $arr_bookdetail[] = '<a href="'.route('showbookdetail',('id'), $book->id).'">'.$item->name.'</a>';
        }
        echo implode("<br/><br/>", $arr_bookdetail);
    @endphp
</td>
