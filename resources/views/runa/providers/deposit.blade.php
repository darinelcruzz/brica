@extends('runa')

@section('main-content')
    <div class="row">
        <div class="col-md-5">
            <solid-box title="Agregar abono" color="box-warning">
                <pre>
                Total a pagar: $ {{ number_format($rshopping->amount, 2) }}
                Pendiente: $ {{ number_format($rshopping->pending, 2) }}
                Abonado: $ {{ number_format($rshopping->amount - $rshopping->pending, 2) }}
                </pre>
                {!! Form::open(['method' => 'POST', 'route' => 'runa.provider.pay']) !!}
                    {!! Field::date('date', Date::now(), ['tpl' => 'templates/withicon'], ['icon' => 'calendar']) !!}
                    {!! Field::text('account', ['tpl' => 'templates/withicon'], ['icon' => 'lock']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('bank', ['tpl' => 'templates/withicon'], ['icon' => 'university']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount',
                                ['tpl' => 'templates/withicon', 'max' => number_format($rshopping->pending, 2), 'min' => '0', 'step' => '0.01'],
                                ['icon' => 'money']) !!}
                        </div>
                    </div>

                    <a href="{{ route('runa.provider.show', ['rshopping' => $rshopping->provider ]) }}"
                        class="btn btn-danger">
                        <i class="fa fa-backward" aria-hidden="true"></i>&nbsp;Regresar
                    </a>
                    <input type="hidden" name="shopping" value="{{ $rshopping->id }}">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-warning pull-right', 'disabled' => round($rshopping->pending) == 0]) !!}
                {!! Form::close() !!}
            </solid-box>
        </div>

        <div class="col-md-7">
            <data-table col="col-md-12" title="Abonos realizados" example="example1" color="box-success">
                <template slot="header">
                    <tr>
                        <th>Fecha</th>
                        <th>Banco</th>
                        <th>Cuenta</th>
                        <th>Cantidad</th>
                    </tr>
                </template>

                <template slot="body">
                    @foreach ($rshopping->deposits as $deposit)
                        <tr>
                            <td>{{ $deposit->deposit_date }}</td>
                            <td>{{ $deposit->bank }}</td>
                            <td>{{ $deposit->account }}</td>
                            <td align="right">$ {{ number_format($deposit->amount, 2) }}</td>
                        </tr>
                    @endforeach
                </template>
            </data-table>
        </div>
    </div>
@endsection
