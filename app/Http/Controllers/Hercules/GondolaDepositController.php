<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\{HGondolaDeposit, HGondola};

class GondolaDepositController extends Controller
{
    function deposit(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required'
        ]);

        $deposit = HGondolaDeposit::create($request->all());

        $this->checkIsPaid($deposit->gondola);

        return redirect(route('hercules.gondola.index'));
    }

    function checkIsPaid($gondola)
    {
        if ($gondola->debt == 0) {
            $gondola->update([
                'status' => 'pagada'
            ]);
        }
    }
}
