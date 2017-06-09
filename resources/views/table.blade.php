<div class="row">
    <div class="col-md-{{ isset($size) ? $size : '12' }}">
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
                <table id="example{{ $example }}" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        @foreach($header as $th)
                            <th>{{ $th }}</th>
                        @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($rows as $row)
                          <tr>
                            @foreach ($row->toArray() as $key => $value)
                                @php
                                    $$key = $value
                                @endphp
                                <td>{{ $value }}</td>
                            @endforeach
                            @if (isset($extra))
                                @include($extra)
                            @endif
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>