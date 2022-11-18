@include('sweetalert::alert')

<header>
    <div id="hide_div" style="position: fixed;height: 100%;width: calc(100% - 250px);display: none">
    </div>
    <div class="show_more_tools">
        <img src="{{url('image/show-more.png')}}" alt="" style="width:30px;height:30px;>
    </div>
    <div id="hide_div" style="position:fixed;width: calc(100% - 250px); float: right;color: red;
    height: 1000px;display: none"></div>
    <div class="overlay">
        <h1>جهاد افزا</h1>
        <p>
            اولین نرم افزار در ایران با عنوان بستر سازی بین خیرین و نیاز مندان
        </p>
        <div class="input-group">
            <form style="width: 100%" action="{{route('search_product')}}" method="GET">
                <input class="form-control border-end-0 border rounded-pill" type="text" value="{{request('q')}}" placeholder="جست و جو..."
                       id="example-search-input" name="q">
            </form>
            <span class="input-group-append">
            </span>
        </div>
        <br>
    </div>
    <div class="toolbar">
        <div class="list-group list-group-flush mx-3 mt-4">

            <ul id="collapseExample1" class="collapse show list-group list-group-flush">
                <li class="list-group-item py-1">
                    <a href="{{route('index')}}" class="text-reset">
                        صفحه اصلی
                    </a>
                </li>
                @auth()
                    <li class="list-group-item py-1">
                        <a href="#" class="text-reset">سلام
                            {{auth()->user()->full_name}}
                        </a>
                    </li>
                    @if(auth()->user()->level == \App\Enums\UserLevelEnum::user->value)
                        <li class="list-group-item py-1">
                            <a href="{{route('add_new_post')}}" class="text-reset">
                                اضافه کردن آگهی
                            </a>
                        </li>
                        <li class="list-group-item py-1">
                            <a href="{{route('my_order')}}" class="text-reset">
                                مدیریت آگهی های من</a>
                        </li>
                    @endif

                    @if(auth()->user()->level == \App\Enums\UserLevelEnum::ownerAdmin->value)
                        <li class="list-group-item py-1">
                            <a href="{{route('owner_admin')}}" class="text-reset">
                                مدیریت کاربران
                            </a>
                        </li>
                    @endif
                @endauth
                @guest()
                    <li class="list-group-item py-1">
                        <a href="{{route('login_user')}}" class="text-reset">ورود یا ثبت نام</a>
                    </li>
                @endguest
                <li class="list-group-item py-1">
                    <a href="{{route('search_product')}}" class="text-reset">جست و جو</a>
                </li>
                @auth()
                    <li class="list-group-item py-1">
                        <a href="/logout" class="text-reset">
                            خروج
                        </a>
                    </li>
                @endauth
            </ul>

        </div>

    </div>
</header>
