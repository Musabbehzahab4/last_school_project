<title>Teacher Form</title>
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
                    <div class="input_wrap">
                        <label for="classes">Classes</label>
                        <select id="class" name="class" class="w-100">
                            <option value="">Select Class</option>
                               @foreach ($class as $value)
                               <option value="{{ $value->id }}" <?php echo @$teachclass->class_name == $value->id ? 'selected' : ''; ?>>{{ $value->name }}
                            </option>
                               @endforeach
                        </select>
                    </div>
                    <div class="input_wrap">
                        <label for="teacher">Teacher</label>
                        <select id="teacher" name="teacher" class="w-100">
                            <option value="">Select Teacher</option>
                            @foreach ($teacher as $value)
                            <option value="{{ $value->id }}" <?php echo @$teachclass->teacher_name == $value->id ? 'selected' : ''; ?>>{{ $value->name }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="input_wrap">
                        <input type="submit" value="Register Now" class="submit_btn" style="margin-top: 15px;">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
