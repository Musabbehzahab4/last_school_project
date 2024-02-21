<title>Student Form</title>
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_nav />
    <div class="wrapper">
        <div class="registration_form">
            <div class="title">
                {{ $title }}
            </div>

            <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form_wrap">
                    <div class="input_grp">
                        <div class="input_wrap">
                            <label for="name"> Name</label>
                            <input type="text" id="name" name="name" value="{{ @$student->name }}">
                        </div>
                    </div>
                    <div class="input_wrap">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" value="{{ @$student->email }}">
                    </div>
                    <div class="input_wrap">
                        <label for="phone no">Phone No</label>
                        <input type="text" id="Phone" name="phone_no" value="{{ @$student->phone_no }}">
                    </div>
                    <div class="input_wrap">
                        <input type="submit" value="Register Now" class="submit_btn">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
