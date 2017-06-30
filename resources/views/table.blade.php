<div class="col-md-{{ $size or '12' }}">
    <div class="box box-solid box-{{ $color }} {{ isset($collapsed) ? 'collapsed-box' : '' }}">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $title }}</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse">
                  <i class="fa fa-{{ isset($collapsed) ? 'plus' : 'minus' }}"></i>
              </button>
            </div>
        </div>

        <div class="box-body">
            <table id="example{{ $example }}" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                    @foreach($header as $th)
                        <th>{!! $th !!}</th>
                    @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach($rows as $row)
                      <tr>
                        @foreach($row->toArray() as $key => $value)
                            @php
                                $$key = $value;
                            @endphp
                            <td>{{ $value }}</td>
                        @endforeach
                        @if (isset($extra))
                            @include($extra)
                        @endif
                      </tr>
                    @endforeach
                </tbody>

                @if (isset($total))
                    <tfooter>
                        <tr>
                        @foreach($header as $th)
                            @if($loop->last)
                               <td>$ {{ $total }}</td>
                            @elseif($loop->iteration == 3)
                                <td><b>Total:</b></td>
                            @else
                                <td></td>
                            @endif
                        @endforeach
                        </tr>
                    </tfooter>
                @endif

            </table>
        </div>

        @if (isset($button))
            <div class="box-footer">
                <button type="submit" class="btn btn-danger pull-right">{{ $button }}</button>
            </div>
        @endif

    </div>
</div>
