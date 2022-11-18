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
<div class="image_product">
    <img src="{{url('upload').'/'.$data[0]->image_name}}" >
</div>
<h4 style="float: right;position: relative;right: 20px;display: inline-block">
{{$data[0]->title}}
</h4>
<h4 style="float: left;position: relative;left: 20px;display: inline-block">
    تلفن :
{{$data[0]->phone}}
</h4>
<br>
<p style="direction: rtl;text-align: right; padding: 20px">
{{$data[0]->description}}
</p>
@include('header_footer.footer')
@include('link.js')
</body>
</html>
