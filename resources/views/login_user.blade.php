<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>جهاد افزا</title>
    @include('link.css')
</head>
<body>
@include('header_footer.header')


<div class="row errors">
    <div class="col-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<div class="login-page">
    <div class="form">
        <form class="register-form" method="post" action="{{url('signIn')}}">
            @csrf
            <h2 class="center">ورود</h2>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="شماره..."/>
            <input type="password" name="password" placeholder="رمز عبور..."/>
            <button>ورود</button>
            <p class="message">حساب ندارید؟ <a href="javascript:void(0);">یک حساب ایجاد کنید</a></p>

        </form>
        <form class="login-form" method="POST" action="{{url('signUp')}}">
            @csrf
            <h2 class="center">ثبت نام</h2>
            <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="نام شما"/>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="شماره همراه..."/>
            <input type="password" name="password" placeholder="رمز عبور..."/>
            <button>ثبت نام</button>

            <p class="message">قبلا ثبت نام کردید? <a href="javascript:void(0);">ورود</a></p>
        </form>
    </div>
</div>


@include('header_footer.footer')
@include('link.js')
<script>
    $(document).ready(function (){
        $('.message a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    });

</script>
</body>
</html>
