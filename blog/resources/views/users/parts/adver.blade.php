<div class="wrap">
    <button class="action" id="prev">&laquo</button>
    <button class="action" id="next">&raquo</button>

    <div id="box1" class="box">
        @if (isset($advertisement_datas[0]->adver_image))
            @if (strlen($advertisement_datas[0]->adver_image) != 0)
                <img src="/advertisementImg/{{ $advertisement_datas[0]->adver_image }}" class="img_adver_style">
            @else
                <img src="/emptylogo.jpg" class="img_adver_style">
            @endif
        @endif
    </div>

    <div id="box2" class="box">
        @if (isset($advertisement_datas[1]->adver_image))
            @if (strlen($advertisement_datas[1]->adver_image) != 0)
                <img src="/advertisementImg/{{ $advertisement_datas[1]->adver_image }}" class="img_adver_style">
            @else
                <img src="/emptylogo.jpg" class="img_adver_style">
            @endif
        @endif
    </div>

    <div id="box3" class="box">
        @if (isset($advertisement_datas[2]->adver_image))
            @if (strlen($advertisement_datas[2]->adver_image) != 0)
                <img src="/advertisementImg/{{ $advertisement_datas[2]->adver_image }}" class="img_adver_style">
            @else
                <img src="/emptylogo.jpg" class="img_adver_style">
            @endif
        @endif
    </div>

    <div id="box4" class="box">
        @if (isset($advertisement_datas[3]->adver_image))
            @if (strlen($advertisement_datas[3]->adver_image) != 0)
                <img src="/advertisementImg/{{ $advertisement_datas[3]->adver_image }}" class="img_adver_style">
            @else
                <img src="/emptylogo.jpg" class="img_adver_style">
            @endif
        @endif
    </div>

    <div id="box5" class="box">
        @if(isset($advertisement_datas[4]->adver_image))
            @if (strlen($advertisement_datas[4]->adver_image) != 0)
                <img src="/advertisementImg/{{ $advertisement_datas[4]->adver_image }}" class="img_adver_style">
            @else
                <img src="/emptylogo.jpg" class="img_adver_style">
            @endif
        @endif
    </div>

</div>
