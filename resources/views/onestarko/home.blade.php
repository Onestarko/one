@extends('layouts.app')

@section('content')

    <embed src="./hidden_path.mp3" hidden="true" autostart="true" loop="true">
        <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center">Onestarko</h1>
        <hr>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- 轮播（Carousel）项目内容 -->
            <div class="carousel-inner" role="listbox">
                <!-- 默认显示图片 -->
                <div class="item active">
                    <img src="images/image_1.jpg" alt="sweety">
                    <!-- 图片描述内容 -->
                    <div class="carousel-caption">
                        sweety
                    </div>
                </div>
                <div class="item">
                    <img src="images/image_2.jpg" alt="baby">
                    <div class="carousel-caption">
                        baby
                    </div>
                </div>
                <div class="item">
                    <img src="images/image_3.jpg" alt="is">
                    <div class="carousel-caption">
                        is
                    </div>
                </div>
                <div class="item">
                    <img src="images/image_4.jpg" alt="you">
                    <div class="carousel-caption">
                        you
                    </div>
                </div>

            </div>

            <div>

            </div>

            <!-- 轮播（Carousel）导航(控制左右移动) -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>

                <span class="sr-only">《《《</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">》》》</span>
            </a>
        </div>

    </div>
@endsection