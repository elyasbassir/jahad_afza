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
<h2 style="text-align: center">آگهی های من</h2>


<div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="جست و جو کنید...">
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
    <thead>
    <tr>
        <th>#</th>
        <th class="col-md-5 col-xs-5">عنوان</th>
        <th class="col-md-4 col-xs-4">توضیخات</th>
        <th class="col-md-3 col-xs-3">حذف</th>
    </tr>
    <tr class="warning no-result">
        <td colspan="4"><i class="fa fa-warning"></i>بدون نتیجه</td>
    </tr>
    </thead>
    <tbody>
        @foreach($data as $key=>$value)
    <tr onclick="window.location='{{route('show_product',$value->id)}}'">
        <th scope="row">1</th>
        <td>{{$value->title}}</td>
        <td>{{$value->description}}</td>
        <td><img src="{{url('image').'/'.'delete.png'}}" width="35" height="35" alt=""></td>
    </tr>
        @endforeach
    </tbody>
</table>


<style>
    tbody tr,td,th{
        text-align: right;
    }
    .results tr[visible='false'],
    .no-result{
        display:none;
    }

    .results tr[visible='true']{
        display:table-row;
    }

    .counter{
        padding:8px;
        color:#ccc;
    }
</style>

@include('header_footer.footer')
@include('link.js')
<script>
    $(document).ready(function() {
        $(".search").keyup(function () {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });

            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.counter').text(jobCount + ' item');

            if(jobCount == '0') {$('.no-result').show();}
            else {$('.no-result').hide();}
        });
    });
</script>
</body>
</html>
