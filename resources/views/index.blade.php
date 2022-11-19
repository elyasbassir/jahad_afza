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
<br>
<h2 style="text-align: center">صفحه اصلی</h2>
<br>
<div class="object_order">

@forelse($data as $key=>$value)

    <div class="row" onclick="window.location='{{route('show_product',$value->id)}}'">
        <div class="col-6 col-sm-4">
            <img src="{{url('upload').'/'.$value->image_name}}" alt="">

        </div>
        <div class="col-6 col-sm-8 ">
            <div class="row">
                <h4 class="title" style="width: 100%;text-align: right;">{{ \Illuminate\Support\Str::limit($value->title, 20) }}</h4>
                <p class="object_order_detail">
                    {{ \Illuminate\Support\Str::limit($value->description, 60) }}

                </p>

            </div>
            <div class="row object_order_detail_btn">
                <a href="{{route('show_product',$value->id)}}" class="btn btn-primary">نمایش بیشتر...</a>
            </div>
        </div>
    </div>
    <hr>
    @empty
    <h3 style="text-align: center">
    متاسفانه چیزی موجود نیست.!
    </h3>
    @endforelse

</div>

<br>

@include('header_footer.footer')
@include('link.js')
</body>
</html>
