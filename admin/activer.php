Here’s the equivalent Laravel MVC implementation of your provided PHP MySQL code. This involves creating a controller, model, and view to adhere to Laravel’s MVC pattern. Here’s how the process works:

Steps for Implementation

	1.	Model: Define the Reseller model and any related models like Purchase and Report.
	2.	Controller: Create a controller to handle data processing.
	3.	View: Use Blade templates to render the HTML.
	4.	Routes: Define a route for the controller method.

Laravel MVC Code Implementation

1. Model: Reseller, Purchase, Report

Create the Reseller, Purchase, and Report models.

// app/Models/Reseller.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    use HasFactory;

    protected $table = 'resseller'; // Ensure table matches your DB
    protected $fillable = ['username', 'withdrawal', 'soldb', 'unsoldb', 'btc', 'isold', 'iunsold'];
}

// app/Models/Purchase.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';
    protected $fillable = ['resseller', 'date', 'price', 'reported'];
}

// app/Models/Report.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';
    protected $fillable = ['resseller', 'status', 'price'];
}

2. Controller: WithdrawalController

// app/Http/Controllers/WithdrawalController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reseller;
use App\Models\Purchase;
use App\Models\Report;
use Carbon\Carbon;

class WithdrawalController extends Controller
{
    public function index()
    {
        $resellers = Reseller::where('withdrawal', 'requested')->get();
        $totalRequests = $resellers->count();
        $totalJerux = 0;
        $totalSeller = 0;

        $data = $resellers->map(function ($reseller) use (&$totalJerux, &$totalSeller) {
            $pendingOrders = 0;
            $realData = Carbon::now();

            $purchases = Purchase::where('resseller', $reseller->username)
                ->where('reported', '')
                ->get();

            foreach ($purchases as $purchase) {
                $datePurchased = Carbon::parse($purchase->date);
                $endTime = $datePurchased->addMinutes(600);

                if ($realData->lte($endTime)) {
                    $pendingOrders += $purchase->price;
                }
            }

            $reportedOrders = Report::where('resseller', $reseller->username)
                ->where('status', 1)
                ->sum('price');

            $pendingOrders += $reportedOrders;

            $total = $reseller->soldb - $pendingOrders;
            $receive = $total * 0.65;
            $receiveJer = $total * 0.35;

            $totalJerux += $receiveJer;
            $totalSeller += $receive;

            $btcValue = json_decode(file_get_contents("https://blockchain.info/stats?format=json"), true)['market_price_usd'];
            $convertedCost = $receive / $btcValue;

            return [
                'username' => $reseller->username,
                'sales' => $reseller->soldb,
                'pending' => $pendingOrders,
                'total' => $total,
                'receive' => $receive,
                'btc' => $reseller->btc,
                'receiveJer' => $receiveJer,
                'convertedCost' => substr($convertedCost, 0, 9),
            ];
        });

        return view('withdrawals.index', [
            'data' => $data,
            'totalRequests' => $totalRequests,
            'totalJerux' => $totalJerux,
            'totalSeller' => $totalSeller,
        ]);
    }
}

3. View: Blade Template

Create a Blade template for the HTML.

<!-- resources/views/withdrawals/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="alert alert-danger fade in radius-bordered alert-shadowed"><b>Withdraw Approval</b></div>
<div>
    <center><br>
        <div class="panel panel-default">
            <div class="panel-heading no-collapse">
                Withdrawal requests <span class="label label-warning">Total: {{ $totalRequests }}</span>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Seller</th>
                        <th>Sales USD</th>
                        <th>Pending USD</th>
                        <th>Total USD</th>
                        <th>Receive USD</th>
                        <th>Receive BTC</th>
                        <th>Address BTC</th>
                        <th>Jerux % USD</th>
                        <th>Pay Seller</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row['username'] }}</td>
                            <td>{{ $row['sales'] }}</td>
                            <td>{{ $row['pending'] }}</td>
                            <td>{{ $row['total'] }}</td>
                            <td>{{ $row['receive'] }}</td>
                            <td>{{ $row['convertedCost'] }}</td>
                            <td>{{ $row['btc'] }}</td>
                            <td>{{ $row['receiveJer'] }}</td>
                            <td>
                                <a target="_blank"
                                    href="{{ url('PaySeller.html?seller=' . $row['username'] . '&receiveusd=' . $row['receive'] . '&receivebtc=' . $row['convertedCost'] . '&btcaddress=' . $row['btc'] . '&pending=' . $row['pending']) }}">
                                    <button class="btn btn-primary">Pay #{{ $row['username'] }}</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>TOTAL</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ $totalSeller }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ $totalJerux }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
</div>
@endsection

4. Route

Add a route for the index method.

// routes/web.php
use App\Http\Controllers\WithdrawalController;

Route::get('/withdrawals', [WithdrawalController::class, 'index']);

Now, when you visit /withdrawals, Laravel will execute the logic and render the data in the view. Let me know if you’d like further refinements!