<?php

namespace App\Http\Controllers;

use App\Models\JobVacancyDetailModel;
use App\Models\Dtc_Persyaratan_TrainingCourseModel;
use App\Models\dtc_File_TrainingCourseModel;
use App\Models\Dtc_Materi_TrainingCourseModel;
use App\Models\Dtc_Fasilitas_TrainingCourseModel;
use App\Models\TrainingCourseDetailModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TranningCourseController extends Controller
{
    public function index()
    {
        $data['title'] = 'Training Kerja | Training / Course';

        $dataCount = TrainingCourseDetailModel::where('status', 1)->get();
        $data['Counttraining'] = $dataCount->count();
        $data['filter'] = DB::table('m_employee_status')
            ->select(
                'm_employee_status.nama as employees_status'
            )->get();
       return view('course.index', $data);
    }

    public function detailCourse($id)
    {
        $data['title'] = ' Detail Training / Course';;

        $data['listpersyaratan'] =  Dtc_Persyaratan_TrainingCourseModel::where('id_training_course_dtl',$id)->get();
        $data['listmateri'] =  Dtc_Materi_TrainingCourseModel::where('id_training_course_dtl',$id)->get();
        $data['listfasilitas']=  Dtc_Fasilitas_TrainingCourseModel::where('id_training_course_dtl',$id)->get();
        $data['listfiles']=  dtc_File_TrainingCourseModel::where('id_training_course_dtl',$id)->get();

        $query = DB::table('dtc_training_course_detail')
            ->leftjoin('m_category_training_course', 'm_category_training_course.id', '=', 'dtc_training_course_detail.id_m_category_training_course') // Bergabung dengan tabel tipe_master
            ->leftjoin('m_jenis_sertifikasi_training_course', 'm_jenis_sertifikasi_training_course.id', '=', 'dtc_training_course_detail.id_m_jenis_sertifikasi_training_course') // Bergabung dengan tabel ifg_master_tipe
            ->leftjoin('m_type_training_course', 'm_type_training_course.id', '=', 'dtc_training_course_detail.typeonlineoffile')
            ->leftjoin('m_provinsi', 'm_provinsi.id', '=', 'dtc_training_course_detail.id_provinsi')
            ->select('dtc_training_course_detail.*',
                'm_category_training_course.nama as category',
                'm_jenis_sertifikasi_training_course.nama as cetificate_type',
                'm_type_training_course.nama as typeonlineofline',
                'm_provinsi.nama as provinsi'
            );

        $whereData=$query->where('dtc_training_course_detail.status',1);
        $data['getdataDetail']=$whereData->where('dtc_training_course_detail.id',$id)->first();
        return view('course.detailcourse', $data);
    }


    public function previewFilter_jenis_sertifikasi(Request $request)
    {
        $filters = $request->all();
        $filterData_jenis_sertifikasi = DB::table('m_jenis_sertifikasi_training_course');

        $filterData_jenis_sertifikasi = $filterData_jenis_sertifikasi->get();

        return view('partials.filter_jenis_sertifikasi_preview', ['filter_jenis_sertifikasi' => $filterData_jenis_sertifikasi]);
    }
    public function previewFilter_Type_course(Request $request)
    {
        $filters = $request->all();
        $filterData_jenis_sertifikasi = DB::table('m_jenis_sertifikasi_training_course');

        $filterData_jenis_sertifikasi = $filterData_jenis_sertifikasi->get();

        return view('partials.filter_jenis_sertifikasi_preview', ['filter_jenis_sertifikasi' => $filterData_jenis_sertifikasi]);
    }

    public function getContentTrainingCourse(Request $request)
    {
        $filters = $request->all();
        //dd($filters);
        $query = DB::table('dtc_training_course_detail')
            ->leftjoin('m_category_training_course', 'm_category_training_course.id', '=', 'dtc_training_course_detail.id_m_category_training_course') // Bergabung dengan tabel tipe_master
            ->leftjoin('m_jenis_sertifikasi_training_course', 'm_jenis_sertifikasi_training_course.id', '=', 'dtc_training_course_detail.id_m_jenis_sertifikasi_training_course') // Bergabung dengan tabel ifg_master_tipe
            ->leftjoin('m_type_training_course', 'm_type_training_course.id', '=', 'dtc_training_course_detail.typeonlineoffile')
            ->select('dtc_training_course_detail.*',
                'm_category_training_course.nama as category',
                'm_jenis_sertifikasi_training_course.nama as cetificate_type',
                'm_type_training_course.nama as typeonlineofline'
            );

        $whereData=$query->where('dtc_training_course_detail.status',1);

        // Filter training name
        if (!empty($filters['trainingname']) && is_array($filters['trainingname'])) {
            $whereData->whereIn('m_experience_level.traning_name', $filters['trainingname']);
        } elseif (!empty($filters['trainingname']) && is_string($filters['trainingname'])) {
            $whereData->where('m_experience_level.traning_name', 'LIKE', '%' . $filters['trainingname'] . '%');
        }

        // Filter jenis sertifikasi
        if (!empty($filters['jenissertifikasi']) && is_array($filters['jenissertifikasi'])) {
            $whereData->whereIn('m_jenis_sertifikasi_training_course.nama', $filters['jenissertifikasi']);
        } elseif (!empty($filters['jenissertifikasi']) && is_string($filters['jenissertifikasi'])) {
            $whereData->where('m_jenis_sertifikasi_training_course.nama', 'LIKE', '%' . $filters['jenissertifikasi'] . '%');
        }
        // Filter category
        if (!empty($filters['category']) && is_array($filters['category'])) {
            $whereData->whereIn('m_category_training_course.nama', $filters['category']);
        } elseif (!empty($filters['category']) && is_string($filters['category'])) {
            $whereData->where('m_category_training_course.nama', 'LIKE', '%' . $filters['category'] . '%');
        }

        // Filter Type Course
        if (!empty($filters['type']) && is_array($filters['type'])) {
            $whereData->whereIn('m_type_training_course.nama', $filters['type']);
        } elseif (!empty($filters['type']) && is_string($filters['type'])) {
            $whereData->where('m_type_training_course.nama', 'LIKE', '%' . $filters['type'] . '%');
        }

        // Apply filters and sorting
        if (!empty($filters['sortBy'])) {
            switch ($filters['sortBy']) {
                case 'newest':
                    $whereData->orderBy('dtc_training_course_detail.created_at', 'desc');
                    break;
                case 'oldest':
                    $whereData->orderBy('dtc_training_course_detail.created_at', 'asc');
                    break;
                //case 'rating':
                //    $query->orderBy('djv_job_vacancy_detail.rating', 'desc'); // Assuming there's a rating column
                //    break;
            }
        } else {
            $whereData->orderBy('dtc_training_course_detail.created_at', 'desc'); // Default sort
        }

        $perPage = 3;
        $page = $request->input('page', 1);
        $data = $whereData->paginate($perPage, ['*'], 'page', $page);

        // Calculate the range of the items shown
        $from = ($data->currentPage() - 1) * $data->perPage() + 1;
        $to = min($data->currentPage() * $data->perPage(), $data->total());

        // Render the 'showing' view with the calculated range
        $showing = view('partials.showing', [
            'from' => $from,
            'to' => $to,
            'total' => $data->total()
        ])->render();

        $sortAndView = view('partials.sort_and_view', [
            'sortBy' => $filters['sortBy'] ?? 'Newest Post'
        ])->render();

        return response()->json([
            'content' => view('partials.content_trainingcourse', ['data' => $data])->render(),
            'pagination' => view('partials.pagination', ['data' => $data])->render(),
            'showing' => $showing,
            'sort_and_view' => $sortAndView
        ]);
    }

}
