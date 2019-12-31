<nav class="navbar navbar-expand-md navbar-light bg-light ">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('client/images/version/tech-logo.png') }}" alt=""></a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

            {{-- lặp tất cả menu cha --}}
            @foreach($category as $cate )
                <li class="nav-item dropdown">
                    <a href="{{ route('post.cate', $cate->slug) }}" class="nav-link @if($cate->childrenCategory->count()) dropdown-toggle @endif" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $cate->name }}
                    </a>

                    {{-- Nếu trong menu cha có menu con --}}
                    @if($cate->childrenCategory->count())
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        {{-- Lấy ra menu cấp 2  --}}
                        @foreach($cate->childrenCategory as $child)

                            <li><a href="{{ route('post.cate', $child->slug) }}" class="dropdown-item @if($child->childrenCategory->count()) dropdown-toggle @endif" href="#">{{ $child->name }}</a>
                                
                                {{-- xem trong menu cấp 2 có con không --}}
                                @if($child->childrenCategory->count())
                                    <ul class="dropdown-menu">

                                        {{-- lấy ra menu con của cấp 2 --}}
                                        @foreach($child->childrenCategory as $subchild)

                                            <li><a href="{{ route('post.cate', $subchild->slug) }}" class="dropdown-item" href="#">{{ $subchild->name }}</a></li>

                                        @endforeach
                                    </ul>
                                @endif
                            </li>

                        @endforeach
                    </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</nav>
{{-- </div><!-- end container-fluid -->
</header><!-- end market-header --> --}}