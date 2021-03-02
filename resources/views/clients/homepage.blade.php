@extends('clients.layouts.main')

@section('trending')
<div class="trending-area fix pt-25 gray-bg">
    <div class="container">
        <div class="trending-main">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    <div class="slider-active">
                        <!-- Single -->
                        @foreach ($articles as $article)
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{ $article->image }}" height="523">
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{ $article->category->name }}</span>
                                            <h2><a href="{{  route('detail',  ['id' => $article->id]) }}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{ $article->title }}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">{{ $article->updated_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Right content -->
                <div class="col-lg-4">
                        <!-- Trending Top -->
                    <div class="row">
                        @php
                            $art_arr = $articles->toArray();
                            $random_key = array_rand($art_arr, 2);
                        @endphp

                        @foreach ($random_key as $art_random)
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{ $articles[$art_random]->image }}" alt="">
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgb">{{ $articles[$art_random]->category->name }}</span>
                                            <h2><a href="{{  route('detail',  ['id' => $article->id]) }}">{{ $articles[$art_random]->title }}</a></h2>
                                            <p>{{ $articles[$art_random]->updated_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('whatNew')
<div class="whats-news-wrapper">
    <!-- Heading & Nav Button -->
    <div class="row justify-content-between align-items-end mb-15">
        <div class="col-xl-3">
            <div class="section-tittle mb-30">
                <h3>Tin Mới</h3>
            </div>
        </div>
        <div class="col-xl-9 col-md-9">
            <div class="properties__button">
                <!--Nav Button  -->                                            
                <nav>                                                 
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($categories as $category)
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </nav>
                <!--End Nav Button  -->
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
                        <!-- Left Details Caption -->
                        @foreach ($articles->slice(0, 1) as $article)
                            <div class="col-xl-6 col-lg-12">
                                <div class="whats-news-single mb-40 mb-40">
                                    <div class="whates-img">
                                        <img src="{{ $article->image }}" alt="">
                                    </div>
                                    <div class="whates-caption">
                                        <h4><a href="{{  route('detail',  ['id' => $article->id]) }}">{{ $article->title }}</a></h4>
                                        <span>{{ $article->updated_at }}</span>
                                        <p>{{ $article->short_desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Right single caption -->
                        <div class="col-xl-6 col-lg-12">
                            <div class="row">
                                <!-- single -->
                                @foreach ($articles->slice(0, 4) as $article)
                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                        <div class="whats-right-single mb-20">
                                            <div class="whats-right-img">
                                                <img src="{{ $article->image }}" width="150">
                                            </div>
                                            <div class="whats-right-cap">
                                                <span class="colorb">{{ $article->category->name }}</span>
                                                <h4><a href="{{  route('detail',  ['id' => $article->id]) }}">{{ $article->title }}</a></h4>
                                                <p>{{ $article->created_at }}</p> 
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
    @foreach ($topArticles->slice(0, 5) as $item)
    <div class="most-recent-single">
        <div class="most-recent-images">
            <img src="{{ $item->image }}" width="100">
        </div>
        <div class="most-recent-capt">
            <h4><a href="{{  route('detail',  ['id' => $article->id]) }}">{{ $item->title }}</a></h4>
            <p>{{ $item->artView->views }}</p>
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
                        <img src="{{ $article->image }}" height="229">
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
                        <img src="{{ $article->image }}" height="239">
                    </div>
                    <div class="">
                        <h4><a href="#" > <h4><a href="{{  route('detail',  ['id' => $article->id]) }}">{{ $article->title }}</a></h4></a></h4>
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

@section('slide-show2')
<div class="weekly3-news-area pb-130">
    <div class="container">
        <div class="weekly3-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-wrapper">
                        <!-- Slider -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="weekly3-news-active dot-style d-flex">
                                    @foreach ($articles as $article)
                                    <div class="weekly3-single">
                                        <div class="weekly3-img">
                                            <img src="{{ $article->image }}" height="179">
                                        </div>
                                        <div class="weekly3-caption">
                                            <h4><a href="{{  route('detail',  ['id' => $article->id]) }}">{{ $article->title }}</a></h4>
                                            <p>19 Jan 2020</p>
                                        </div>
                                    </div> 
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection