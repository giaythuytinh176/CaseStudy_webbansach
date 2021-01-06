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
        $book = \App\Models\Author::whereHas('books', function (\Illuminate\Database\Eloquent\Builder $q) use ($book_id) {
            $q->where("books.id", "=", $book_id);
        })->get();
        foreach ($book as $item) {
            $arr_bookdetail[] = '<a href="'.route('showbookdetail', $item->id).'">'.$item->name.'</a>';
        }
        echo implode("<br/><br/>", $arr_bookdetail);
    @endphp
</td>
