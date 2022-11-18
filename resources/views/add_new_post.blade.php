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
<div class="object_order">


    <form action="{{route('post_add_new_post')}}" method="post" enctype="multipart/form-data">
      @csrf
        <h2 style="text-align: center">اضافه کردن آگهی جدید</h2>
        <br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">عنوان</label>
                <input name="title" type="text" class="form-control" id="" placeholder="عنوان...">
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">توضیحات:</label>
            <textarea name="description" class="form-control" id="" placeholder="توضیحات آگهی شما..." rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">عکس آگهی خود را آپلود کنید :(کمتر از 1 مگابایت)</label>
            <input name="my_image" class="form-control" type="file" id="formFile">
        </div>
        <button type="submit" class="btn btn-primary">افزودن</button>
    </form>


</div>

<br>

@include('header_footer.footer')
@include('link.js')
</body>
</html>
