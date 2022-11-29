<html>
    <body>
        <div>
            <table>
                <tr>
                    <th>name</th>
                    <th>email</th>
                    
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        
                    </tr>
                @endforeach

            </table>
            <a href="{{route('assessments_export')}}">Export</a>
        </div>
    </body>
</html>