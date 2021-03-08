@extends('clients.layouts.main')

@section('whatNew')
    <!-- Trending Tittle -->
    <div class="about-right mb-90">
        <div class="about-img">
            <img src="assets/img/trending/trending_top.jpg" alt="">
        </div>
        <div class="heading-news mb-30 pt-30">
            <h3>{{ $article->title }}</h3>
        </div>
        <div class="about-prea">
            {!! $article->content !!}
        </div> 
    </div> 
@endsection

@section('comment')
<div class="row">
    <div class="col-12">
        <h2 class="contact-title">Bình luận</h2>
    </div>
    <div class="col-lg-8">
        <form class="form-contact contact_form" action="" method="POST" id="contactForm">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control valid" name="name" id="name" type="text" placeholder="Enter your name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control valid" name="email" id="email" type="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder=" Enter Message"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="button button-contactForm boxed-btn">Gửi</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('hotNew')
<div class="most-recent-area">
    <!-- Section Tittle -->
    <div class="small-tittle mb-20">
        <h3>Bài viết liên quan</h3>
    </div>
    <!-- Single -->
    @foreach ($articleCate as $article)
    <div class="most-recent-single">
        <div class="most-recent-images">
            <img src="{{ asset($article->image) }}" width="150">
        </div>
        <div class="most-recent-capt">
            <h4><a href="{{  route('detail',  ['id' => $article->id]) }}">{{ $article->title }}</a></h4>
            <p>{{ $article->artView->views }}</p>
        </div>
    </div>
    @endforeach
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