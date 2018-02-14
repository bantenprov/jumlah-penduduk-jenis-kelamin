<?php namespace Bantenprov\JPJenisKelamin\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\JPJenisKelamin\Facades\JPJenisKelamin;

/* Models */
use Bantenprov\JPJenisKelamin\Models\Bantenprov\JPJenisKelamin\JPJenisKelamin as JPJenisKelaminModel;
use Bantenprov\JPJenisKelamin\Models\Bantenprov\JPJenisKelamin\Province;
use Bantenprov\JPJenisKelamin\Models\Bantenprov\JPJenisKelamin\Regency;

/* etc */
use Validator;

/**
 * The JPJenisKelaminController class.
 *
 * @package Bantenprov\JPJenisKelamin
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPJenisKelaminController extends Controller
{

    protected $province;

    protected $regency;

    protected $jumlah_penduduk_jenis_kelamin;

    public function __construct(Regency $regency, Province $province, JPJenisKelaminModel $jumlah_penduduk_jenis_kelamin)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->jumlah_penduduk_jenis_kelamin     = $jumlah_penduduk_jenis_kelamin;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $jumlah_penduduk_jenis_kelamin = $this->jumlah_penduduk_jenis_kelamin->find($id);

        return response()->json([
            'negara'    => $jumlah_penduduk_jenis_kelamin->negara,
            'province'  => $jumlah_penduduk_jenis_kelamin->getProvince->name,
            'regencies' => $jumlah_penduduk_jenis_kelamin->getRegency->name,
            'tahun'     => $jumlah_penduduk_jenis_kelamin->tahun,
            'data'      => $jumlah_penduduk_jenis_kelamin->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->jumlah_penduduk_jenis_kelamin->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->jumlah_penduduk_jenis_kelamin->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'Jumlah Penduduk '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

