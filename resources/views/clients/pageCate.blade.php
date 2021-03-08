@extends('clients.layouts.main')

@section('whatNew')
<div class="whats-news-wrapper">
    <!-- Heading & Nav Button -->
        <div class="row justify-content-between align-items-end mb-15">
            <div class="col-xl-10">
                <div class="section-tittle mb-30">
                    <h3>Báo {{ $cateName->name }}</h3>
                </div>
            </div>
        </div>
        <!-- Tab content -->
        <div class="row">
            <div class="col-12">
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                        <div class="row">
                            @foreach ($articleCate as $article)
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="whats-news-single mb-40 mb-40">
                                    <div class="whates-img">
                                        <img src="{{ asset($article->image) }}" height="185">
                                    </div>
                                    <div class="whates-caption whates-caption2">
                                        <h4><a href="{{  route('detail',  ['id' => $article->id]) }}">{{ $article->title }}</a></h4>
                                        <span>{{ $article->updated_at }}</span>
                                        <p>{{ $article->short_desc }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            <!-- End Nav Card -->
            </div>
        </div>
</div>
@endsection

@section('hotNew')
<div class="most-recent-area">
    <!-- Section Tittle -->
    <div class="small-tittle mb-20">
        <h3>Tin HOT</h3>
    </div>
    <!-- Single -->
    @foreach ($topArticles->slice(0, 10) as $item)
    <div class="most-recent-single">
        <div class="most-recent-images">
            <img src="{{ asset($item->image) }}" width="100">
        </div>
        <div class="most-recent-capt">
            <h4><a href="{{  route('detail',  ['id' => $article->id]) }}">{{ $item->title }}</a></h4>
            <p>Lượt xem: {{ $item->artView->views }}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('slide-show')
<div class="slider-wrapper">
    <!-- section Tittle -->
    <div class="row">
        <div class="col-lg-12">
            <div class="small-tittle mb-30">
                <h4>Các bài viết có nhiều lượt xem</h4>
            </div>
        </div>
    </div>
    <!-- Slider -->
    <div class="row">
        <div class="col-lg-12">
            <div class="weekly2-news-active d-flex">
                @foreach ($articles as $article)
                <div class="weekly2-single">
                    <div class="weekly2-img">
                        <img src="{{ asset($article->image) }}" height="229">
                    </div>
                    <div class="weekly2-caption">
                        <h4><a href="#">{{ $article->title }}</a></h4>
                        <p>Jhon  |  2 hours ago</p>
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('recent')
<div class="recent-wrapper">
    <!-- section Tittle -->
    <div class="row">
        <div class="col-lg-12">
            <div class="section-tittle mb-30">
                <h3>Xu Hướng Bài Viết</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="recent-active dot-style d-flex dot-style">
                @foreach ($articles as $article)
                <div class="single-recent">
                    <div class="what-img">
                        <img src="{{ asset($article->image) }}" height="239">
                    </div>
                    <div class="">
                        <h4><a href="#" > <h4><a href="latest_news.html">{{ $article->title }}</a></h4></a></h4>
                        <P>Jun 19, 2020</P>
                        <a class="popup-video btn-icon" href=""><span class="flaticon-play-button"></span></a>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection