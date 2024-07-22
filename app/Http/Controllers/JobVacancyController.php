<?php

namespace App\Http\Controllers;
use App\Models\JobVacancyDetailModel;
use App\Models\TrainingCourseDetailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class JobVacancyController extends Controller
{
    public function index()
    {
        $data['title'] = 'Job Vacancy';

        $dataCount = JobVacancyDetailModel::where('status', 1)->get();
        $data['CountJob'] = $dataCount->count();
        $data['filter'] = DB::table('m_employee_status')
            ->select(
                'm_employee_status.nama as employees_status'
            )->get();
         // Get all courses

       return view('jobvacancy.index', $data);

    }

    public function detailJob($id)
    {
        $data['title'] = 'Job Vacancy Details';
        $query = DB::table('djv_job_vacancy_detail')
            ->leftJoin('m_employee_status', 'djv_job_vacancy_detail.id_m_employee_status', '=', 'm_employee_status.id')
            ->leftJoin('m_work_location', 'm_work_location.id', '=', 'djv_job_vacancy_detail.id_m_work_location')
            ->leftJoin('m_salary_date_month', 'm_salary_date_month.id', '=', 'djv_job_vacancy_detail.id_m_salaray_date_mont')
            ->leftJoin('m_salary', 'm_salary.id', '=', 'djv_job_vacancy_detail.id_m_salaray')
            ->leftJoin('m_sector', 'm_sector.id', '=', 'djv_job_vacancy_detail.id_m_sector')
            ->leftJoin('m_education', 'm_education.id', '=', 'djv_job_vacancy_detail.id_m_education')
            ->leftJoin('m_experience_level', 'm_experience_level.id', '=', 'djv_job_vacancy_detail.id_m_experience_level')
            ->select(
                'djv_job_vacancy_detail.*',
                'm_employee_status.nama as job_type',
                'm_work_location.nama as work_location',
                'm_salary_date_month.nama as fee',
                'm_salary.nama as salary',
                'm_sector.nama as sector',
                'm_education.nama as education',
                'm_experience_level.nama as name_experience_level'
            );
        $data['getdataDetail']=$query->where('djv_job_vacancy_detail.id',$id)->first();
        return view('jobvacancy.detailjob', $data);
    }

    public function previewFilter(Request $request)
    {
        $filters = $request->all();
        $filteredData = DB::table('m_employee_status');

        if (!empty($filters['skill'])) {
            $filteredData->where('m_employee_status.nama', 'LIKE', '%' . $filters['skill'] . '%');
        }

        if (!empty($filters['availability'])) {
            $filteredData->whereIn('m_employee_status.nama', $filters['availability']);
        }

        $filteredData = $filteredData->get();

        return view('partials.filter_preview', ['filteredData' => $filteredData]);
    }

    public function previewFilterWorkLocation(Request $request)
    {
        $filters = $request->all();
        $filter_Data_work_location = DB::table('m_work_location');

        $filter_Data_work_location = $filter_Data_work_location->get();

        return view('partials.filter_work_location_preview', ['filter_data_work_location' => $filter_Data_work_location]);
    }

    public function previewFilterExperienceLevel(Request $request)
    {
        $filters = $request->all();
        $filter_Data_experience_level = DB::table('m_experience_level');

        $filter_Data_experience_level = $filter_Data_experience_level->get();

        return view('partials.filter_experience_level_preview', ['filter_data_experience_level' => $filter_Data_experience_level]);
    }


    public function previewFilterEducation(Request $request)
    {
        $filters = $request->all();
        $filter_Data_education = DB::table('m_education');

        $filter_Data_education = $filter_Data_education->get();

        return view('partials.filter_education_preview', ['filter_Data_education' => $filter_Data_education]);
    }


    public function getContentJob(Request $request)
    {
        $filters = $request->all();
        //dd($filters);
        $query = DB::table('djv_job_vacancy_detail')
            ->leftJoin('m_employee_status', 'djv_job_vacancy_detail.id_m_employee_status', '=', 'm_employee_status.id')
            ->leftJoin('m_work_location', 'm_work_location.id', '=', 'djv_job_vacancy_detail.id_m_work_location')
            ->leftJoin('m_salary_date_month', 'm_salary_date_month.id', '=', 'djv_job_vacancy_detail.id_m_salaray_date_mont')
            ->leftJoin('m_salary', 'm_salary.id', '=', 'djv_job_vacancy_detail.id_m_salaray')
            ->leftJoin('m_sector', 'm_sector.id', '=', 'djv_job_vacancy_detail.id_m_sector')
            ->leftJoin('m_education', 'm_education.id', '=', 'djv_job_vacancy_detail.id_m_education')
            ->leftJoin('m_experience_level', 'm_experience_level.id', '=', 'djv_job_vacancy_detail.id_m_experience_level')
            ->select(
                'djv_job_vacancy_detail.*',
                'm_employee_status.nama as nama_status',
                'm_work_location.nama as work_location',
                'm_salary_date_month.nama as fee',
                'm_salary.nama as salary',
                'm_sector.nama as sector',
                'm_education.nama as education',
                'm_experience_level.nama as name_experience_level'
            );
        $whereData=$query->where('djv_job_vacancy_detail.status',1);
        // Filter skill
        if (!empty($filters['skill']) && is_array($filters['skill'])) {
            $whereData->whereIn('m_experience_level.nama', $filters['skill']);
        } elseif (!empty($filters['skill']) && is_string($filters['skill'])) {
            $whereData->where('m_experience_level.nama', 'LIKE', '%' . $filters['skill'] . '%');
        }

        // Filter Job type
        if (!empty($filters['jobtype']) && is_array($filters['jobtype'])) {
            $whereData->whereIn('m_sector.nama', $filters['jobtype']);
        } elseif (!empty($filters['jobtype']) && is_string($filters['jobtype'])) {
            $whereData->where('m_sector.nama', 'LIKE', '%' . $filters['jobtype'] . '%');
        }

        // Filter salary range
        if (!empty($filters['salary']) && is_array($filters['salary'])) {
            $whereData->whereIn('m_salary.nama', $filters['salary']);
        } elseif (!empty($filters['salary']) && is_string($filters['salary'])) {
            $whereData->where('m_salary.nama', 'LIKE', '%' . $filters['salary'] . '%');
        }

        // Filter worklocation
        if (!empty($filters['worklocation']) && is_array($filters['worklocation'])) {
            $whereData->whereIn('m_work_location.nama', $filters['worklocation']);
        } elseif (!empty($filters['worklocation']) && is_string($filters['worklocation'])) {
            $whereData->where('m_work_location.nama', 'LIKE', '%' . $filters['worklocation'] . '%');
        }

        // Filter experience level
        if (!empty($filters['experiencelevel']) && is_array($filters['experiencelevel'])) {
            $whereData->whereIn('m_experience_level.nama', $filters['experiencelevel']);
        } elseif (!empty($filters['experiencelevel']) && is_string($filters['experiencelevel'])) {
            $whereData->where('m_experience_level.nama', 'LIKE', '%' . $filters['experiencelevel'] . '%');
        }

        // Filter Education
        if (!empty($filters['education']) && is_array($filters['education'])) {
            $whereData->whereIn('m_education.nama', $filters['education']);
        } elseif (!empty($filters['education']) && is_string($filters['education'])) {
            $whereData->where('m_education.nama', 'LIKE', '%' . $filters['education'] . '%');
        }

        // Filter availability
        if (!empty($filters['availability']) && is_array($filters['availability'])) {
            $whereData->whereIn('m_employee_status.nama', $filters['availability']);
        } elseif (!empty($filters['availability']) && is_string($filters['availability'])) {
            $whereData->where('m_employee_status.nama', 'LIKE', '%' . $filters['availability'] . '%');
        }
        // Apply filters and sorting
        if (!empty($filters['sortBy'])) {
            switch ($filters['sortBy']) {
                case 'newest':
                    $whereData->orderBy('djv_job_vacancy_detail.created_at', 'desc');
                    break;
                case 'oldest':
                    $whereData->orderBy('djv_job_vacancy_detail.created_at', 'asc');
                    break;
                //case 'rating':
                //    $query->orderBy('djv_job_vacancy_detail.rating', 'desc'); // Assuming there's a rating column
                //    break;
            }
        } else {
            $whereData->orderBy('djv_job_vacancy_detail.created_at', 'desc'); // Default sort
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
            'content' => view('partials.content_job', ['data' => $data])->render(),
            'pagination' => view('partials.pagination', ['data' => $data])->render(),
            'showing' => $showing,
            'sort_and_view' => $sortAndView
        ]);
    }




}
