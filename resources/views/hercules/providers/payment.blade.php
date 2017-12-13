@extends('hercules')

@section('main-content')
    <div class="row">
        <div class="col-md-5">
            <solid-box title="Agregar abono" color="box-primary">
                <pre>
                Total a pagar: $ {{ number_format($hshopping->amount, 2) }}
                Pendiente: $ {{ number_format($hshopping->pending, 2) }}
                Abonado: $ {{ number_format($hshopping->amount - $hshopping->pending, 2) }}
                </pre>
                {!! Form::open(['method' => 'POST', 'route' => 'hercules.provider.pay']) !!}
                    {!! Field::date('date', Date::now(), ['tpl' => 'templates/withicon'], ['icon' => 'calendar']) !!}
                    {!! Field::text('account', ['tpl' => 'templates/withicon'], ['icon' => 'lock']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('bank', ['tpl' => 'templates/withicon'], ['icon' => 'university']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount',
                                ['tpl' => 'templates/withicon', 'max' => "$hshopping->pending", 'min' => '0', 'step' => '0.01'],
                                ['icon' => 'money']) !!}
                        </div>
                    </div>

                    <a href="{{ route('hercules.provider.show', ['hshopping' => $hshopping->provider ]) }}"
                        class="btn btn-danger">
                        <i class="fa fa-backward" aria-hidden="true"></i>&nbsp;Regresar
                    </a>
                    <input type="hidden" name="shopping" value="{{ $hshopping->id }}">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right', 'disabled' => $hshopping->pending == 0]) !!}
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
                    @foreach ($hshopping->payments as $payment)
                        <tr>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->bank }}</td>
                            <td>{{ $payment->account }}</td>
                            <td align="right">$ {{ number_format($payment->amount, 2) }}</td>
                        </tr>
                    @endforeach
                </template>
            </data-table>
        </div>
    </div>
@endsection
