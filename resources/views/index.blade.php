

<h1>xin chào</h1>








<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>ho ten</th>
            <td>Ngày tạo</td>
            <td>Ngày cập nhật</td>
            <td>xóa</td>
        </tr>
    </thead>
    <tbody>
        @php
            use Illuminate\Support\Carbon;
        @endphp
        
        @foreach($test as $key => $value)
          
            {{-- {{dd($value->id)}} --}}
            {{-- {{dd($value->created_at)}} --}}
            {{-- {{dd($value->updatea_at)}} --}}

            <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->name}}</td>
                <td>
                    {{Carbon::parse($value->created_at)->format('d-m-Y H:i:s')}}
                </td>
                <td>{{($value->updated_at)}}</td>
                <td>
                     {{-- <form action="{{route('index_test_delete',['id' => $value->id])}}" method="get">
                        
                        <button type="submit">xóa</button>

                     </form> --}}

                     <a href="{{route('index_test_delete',['id' => $value->id])}}">Xóa</a>
               
                </td>

               
            </tr>
            
        @endforeach
        

    </tbody>
</table>


<form action="{{route('index_test_get')}}" 
method="POST" >
@csrf
  
  <input type="text" name="ten" placeholder="Enter your name">
  <input type="text" name="sdt" placeholder="Enter your name">
  <input type="date" name="ngaythang" placeholder="Enter your name">


  <button type="submit">Submit</button>



</form>