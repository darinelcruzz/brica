    <div class="col-md-{{ $pc or '6' }} col-sm-{{ $tablet or '6' }}">
        <div class="info-box">
            <span class="info-box-icon bg-{{ $color or 'aqua' }}"><i class="fa fa-{{ $icon }}"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">{{ $title }}</span>
                <span class="info-box-number">{{ $number }}</span>
            </div>
        </div>
    </div>