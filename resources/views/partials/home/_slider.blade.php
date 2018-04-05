<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
    </div>
    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
        @foreach ($topFivePosts as $topFivePost)
            {{-- selecting latest price and shop name of the item --}}
            @php
                $connection = mysqli_connect("localhost", "root", "", "review_products");
                $price = "SELECT p.id, p.price, p.shop_name, s.name FROM posts as p, sub_categories as s WHERE item='{$topFivePost->item}' AND p.subcategory_id = s.id ORDER BY id DESC LIMIT 1";
                $resultPrice = mysqli_query($connection, $price);
                $rowPrice = mysqli_fetch_assoc($resultPrice);
            @endphp
            {{-- selecting first image of the latest post of the item --}}
            @php
                $image = "SELECT image FROM post_images WHERE post_id={$rowPrice['id']} ORDER BY id DESC LIMIT 1";
                $resultImage = mysqli_query($connection, $image);
                $rowImage = mysqli_fetch_assoc($resultImage);
            @endphp
            <div data-p="170.00">
                <img class="slider-img" data-u="image" src="{{ asset('images/food-images/slider/' . $rowImage['image']) }}" />
                <div data-u="caption" data-t="0" style="position:absolute;top:350px;left:30px;width:500px;color:#fff;background-color:rgba(0,0,0,0.5);font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;">
                  <h2>{{ $topFivePost->item }}</h2>
                  <p>{{ $rowPrice['name'] }}</p>
                  <p><i style="font-weight: bold;color: white;" class="fa fa-star" aria-hidden="true"></i> {{ $topFivePost->avg_rating }}/10</p>
                  <p>Price: {{ $rowPrice['price'] }}/-</p>
                  <p>Shop Name: {{ $rowPrice['shop_name'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb052" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
        <div data-u="prototype" class="i" style="width:16px;height:16px;">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
            </svg>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora053" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora053" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
        </svg>
    </div>
</div>

{{-- Invoking Header Slider --}}
<script type="text/javascript">jssor_1_slider_init();</script>
