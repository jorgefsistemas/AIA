<?php

namespace App\Http\Controllers;

use Faker\Provider\Base;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Repositories\Cancelacion\CancelacionRepository;
use App\Repositories\User\UserRepository;
class HomeController extends Controller
{
    protected $CancelacionRepo;
    protected $UserRepo;

    public function __construct(CancelacionRepository $cancelacionRepository, UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->cancelacionRepo = $cancelacionRepository;
        $this->userRepo = $userRepository;
    }

    public $datos = [];
    public $oficio= "";
    public $nucc="";
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function store(request $request)
    {
        $data = $request->all();
        $datosCancelacion = $this->cancelacionRepo->create($data);
    }
    public function destroy(Request $request)
    {
        try {
            $datosborrar = $this->cancelacionRepo->delete($request->input('id'));
            return Redirect::route('home')->with('success', 'Exito. Expediente eliminado exitosamente.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function constancia_cancelacion()
    {
        $this->datos = $_GET['cancelaciones'];
        $this->nucc = $_GET['nucc'];
        $pdf = Pdf::setPaper('letter', 'portrait')->loadView('constancia_cancelacion', ['datos' => $this->datos, 'nucc'=> $this->nucc]);
        return $pdf->stream('Constancia.pdf');
    }
}
