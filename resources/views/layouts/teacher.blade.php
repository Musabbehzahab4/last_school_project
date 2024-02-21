<title>Teacher</title>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_nav />
    <div class="container-fluid">
        <div class="container-fluid ">
            <div class="container pr-5">
                <div class="row">
                    <table class="table"
                        style=" margin-top: 70px; width: 1315px; height: 115px; background: -webkit-linear-gradient(#545871, #545871); background: linear-gradient(#545871, #545871); opacity: 0.75; color: white;">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone no</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teacher as $value)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->phone_no }}</td>
                                    <td>

                                        <a href="{{ route('edit-teacher',['id'=>$value->id]) }}" class="btn btn-dark btn-sm">Edit</a>
                                        <a href="{{ route('delete-teacher',['id'=>$value->id]) }}" class="btn btn-danger btn-sm">Delete</a>

                                    </td>
                                </tr>
                                @endforeach


                        </tbody>
                    </table>
                    <button class="btn btn-dark"
                        style="margin-left: 786px; width: 191px; height: 50px; font-size: 25px; font-family: monospace;">
                        <a href="{{ route('teachform') }}" style="text-decoration: none; color:#ffff">Add teacher</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
