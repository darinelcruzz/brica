@extends('hercules')

@section('main-content')

    @php
      use App\Models\Hercules\HItem;
    @endphp

    <row-woc col="col-md-12">
        <solid-box title="{{ $hbodywork->description }} / Alto: {{ $hbodywork->height }} m /
            Largo: {{ $hbodywork->length }} m / Ancho: {{ $hbodywork->width }} m / Costo total: {{ $hbodywork->computeTotal() }}"
            color="box-primary">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Soldadura</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Fondeo</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Vestido</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Pintura</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Montaje</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                  <th>Cantidad</th>
                                  <th>Artículo</th>
                                  <th>Precio Unitario</th>
                                  <th>Precio total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (unserialize($hbodywork->welding) as $id => $quantity)
                                    <tr>
                                      <td>{{ $quantity }}</td>
                                      <td>{{ HItem::find($id)->description }}</td>
                                      <td>{{ HItem::find($id)->formatted_price }}</td>
                                      <td>{{ '$ ' . number_format(HItem::find($id)->price * $quantity, 2, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
            						<td></td><td></td>
            						<td><b>Total:</b></td>
            						<td>{{ '$ ' . number_format($hbodywork->computePrice('welding'), 2, '.', ',') }}</td>
            					</tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab_2">
                        <table id="example2" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                    <th>Cantidad</th>
                                    <th>Artículo</th>
                                    <th>Precio Unitario</th>
                                    <th>Precio total</th>
                                  </tr>
                              </thead>

                              <tbody>
                                  @foreach (unserialize($hbodywork->anchoring) as $id => $quantity)
                                      <tr>
                                        <td>{{ $quantity }}</td>
                                        <td>{{ HItem::find($id)->description }}</td>
                                        <td>{{ HItem::find($id)->formatted_price }}</td>
                                        <td>{{ '$ ' . number_format(HItem::find($id)->price * $quantity, 2, '.', ',') }}</td>
                                      </tr>
                                  @endforeach
                              </tbody>

                              <tfoot>
                                  <tr>
              						<td></td><td></td>
              						<td><b>Total:</b></td>
              						<td>{{ '$ ' . number_format($hbodywork->computePrice('anchoring'), 2, '.', ',') }}</td>
              					</tr>
                              </tfoot>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab_3">
                        <table id="example3" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                  <th>Cantidad</th>
                                  <th>Artículo</th>
                                  <th>Precio Unitario</th>
                                  <th>Precio total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (unserialize($hbodywork->clothing) as $id => $quantity)
                                    <tr>
                                      <td>{{ $quantity }}</td>
                                      <td>{{ HItem::find($id)->description }}</td>
                                      <td>{{ HItem::find($id)->formatted_price }}</td>
                                      <td>{{ '$ ' . number_format(HItem::find($id)->price * $quantity, 2, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
            						<td></td><td></td>
            						<td><b>Total:</b></td>
            						<td>{{ '$ ' . number_format($hbodywork->computePrice('clothing'), 2, '.', ',') }}</td>
            					</tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab_4">
                        <table id="example4" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Cantidad</th>
                                <th>Artículo</th>
                                <th>Precio Unitario</th>
                                <th>Precio total</th>
                              </tr>
                            </thead>

                            <tbody>
                                  @foreach (unserialize($hbodywork->painting) as $id => $quantity)
                                      <tr>
                                        <td>{{ $quantity }}</td>
                                        <td>{{ HItem::find($id)->description }}</td>
                                        <td>{{ HItem::find($id)->formatted_price }}</td>
                                        <td>{{ '$ ' . number_format(HItem::find($id)->price * $quantity, 2, '.', ',') }}</td>
                                      </tr>
                                  @endforeach
                             </tbody>

                             <tfoot>
                                 <tr>
             						<td></td><td></td>
             						<td><b>Total:</b></td>
             						<td>{{ '$ ' . number_format($hbodywork->computePrice('painting'), 2, '.', ',') }}</td>
             					</tr>
                             </tfoot>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab_5">
                        <table id="example5" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                  <th>Cantidad</th>
                                  <th>Artículo</th>
                                  <th>Precio Unitario</th>
                                  <th>Precio total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (unserialize($hbodywork->mounting) as $id => $quantity)
                                    <tr>
                                      <td>{{ $quantity }}</td>
                                      <td>{{ HItem::find($id)->description }}</td>
                                      <td>{{ HItem::find($id)->formatted_price }}</td>
                                      <td>{{ '$ ' . number_format(HItem::find($id)->price * $quantity, 2, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
            						<td></td><td></td>
            						<td><b>Total:</b></td>
            						<td>{{ '$ ' . number_format($hbodywork->computePrice('mounting'), 2, '.', ',') }}</td>
            					</tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </solid-box>
    </row-woc>

@endsection
