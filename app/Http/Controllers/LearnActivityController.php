<?php

namespace App\Http\Controllers;

use App\Models\LearnActivity;
use App\Models\LearnActivityMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LearnActivityController extends Controller
{
    public function index(LearnActivity $learnActivity)
    {
        // $learnActivities = LearnActivityMethod::with(['learnActivities' => function ($q) {
        //     $q->select(DB::raw("method_id, name, start_date, end_date, date_part('month', start_date) AS month"))
        //         ->groupBy('month', 'start_date', 'name', 'end_date', 'method_id')
        //         ->orderBy('start_date', 'asc')
        //         ->orderBy('end_date', 'asc');
        // }])->get();

//         $learnActivities = DB::select(DB::raw("
//         select m.id, m.name as name,
//     (CASE WHEN date_part('month', a.start_date) = 1 THEN concat(a.name, '\n', a.start_date, '-', a.end_date) END) as january,
//     (CASE WHEN date_part('month', a.start_date) = 2 THEN concat(a.name, '\n', a.start_date, '-', a.end_date) END) as february,
//     (CASE WHEN date_part('month', a.start_date) = 3 THEN concat(a.name, '\n', a.start_date, '-', a.end_date) END) as march,
//     (CASE WHEN date_part('month', a.start_date) = 4 THEN concat(a.name, '\n', a.start_date, '-', a.end_date) END) as april,
//     (CASE WHEN date_part('month', a.start_date) = 5 THEN concat(a.name, '\n', a.start_date, '-', a.end_date) END) as may,
//     (CASE WHEN date_part('month', a.start_date) = 6 THEN concat(a.name, '\n', a.start_date, '-', a.end_date) END) as june

// from learn_activity_methods m
// left JOIN learn_activities a on a.method_id = m.id
// group by m.id, m.name, a.start_date, a.name, a.end_date
// order by m.id asc, m.name asc, a.start_date asc, a.end_date asc"));
        $learnActivities = collect([]);
        $data = LearnActivityMethod::with(['learnActivities' => function ($q) {
            $q->select(DB::raw("id, method_id, name, start_date, end_date, date_part('month', start_date) AS month"))
                ->groupBy('month', 'start_date', 'name', 'end_date', 'method_id', 'id')
                ->orderBy('start_date', 'asc')
                ->orderBy('end_date', 'asc');
        }])->get();
        $collect = collect($data);
        $collect->map(function ($item) use ($learnActivities) {

            $data['method_id'] = $item->id;
            $data['method_name'] = $item->name;
            $data['january'] = $item->learnActivities->where('month', 1);
            $data['february'] = $item->learnActivities->where('month', 2);
            $data['march'] = $item->learnActivities->where('month', 3);
            $data['april'] = $item->learnActivities->where('month', 4);
            $data['may'] = $item->learnActivities->where('month', 5);
            $data['june'] = $item->learnActivities->where('month', 6);
            $learnActivities->push($data);
        });

        $methods = LearnActivityMethod::all();
        return view('learn-activity', compact('learnActivities', 'methods'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'method_id' => ['required', 'integer', 'exists:learn_activity_methods,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ];

        $request->validate($rules);

        $learnActivity = LearnActivity::create($request->all());

        return response()->json([
            'message' => 'Successfully created learn activity!',
            'learnActivity' => $learnActivity,
        ], 201);
    }

    public function update(Request $request, LearnActivity $learnActivity)
    {
        $rules = [
            'name' => 'required',
            'method_id' => 'required|integer|exists:learn_activity_methods,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
        $request->validate($rules);
        $learnActivity->update($request->all());
        return response()->json([
            'message' => 'Successfully updated learn activity!',
            'learnActivity' => $learnActivity,
        ], 200);

    }

    public function destroy($id)
    {
        $learnActivity = LearnActivity::findOrFail($id);
        $learnActivity->delete();
        return response()->json([
            'message' => 'Successfully deleted learn activity!',
        ], 200);
    }

    public function edit($id)
    {
        $learnActivity = LearnActivity::find($id);

        return response()->json($learnActivity);
    }

    public function show()
    {
        // $learnActivities = LearnActivity::all();
        // $datatables = DataTables::of($learnActivities)->make(true);

        // return $datatables;
        $learnActivities = collect([]);
        $data = LearnActivityMethod::with(['learnActivities' => function ($q) {
            $q->select(DB::raw("id, method_id, name, start_date, end_date, date_part('month', start_date) AS month"))
                ->groupBy('month', 'start_date', 'name', 'end_date', 'method_id', 'id')
                ->orderBy('start_date', 'asc')
                ->orderBy('end_date', 'asc');
        }])->get();

        $collect = collect($data);
        $collect->map(function ($item) use ($learnActivities) {

            $data['method_id'] = $item->id;
            $data['method_name'] = $item->name;
            $data['january'] = $item->learnActivities->where('month', 1);
            $data['february'] = $item->learnActivities->where('month', 2);
            $data['march'] = $item->learnActivities->where('month', 3);
            $data['april'] = $item->learnActivities->where('month', 4);
            $data['may'] = $item->learnActivities->where('month', 5);
            $data['june'] = $item->learnActivities->where('month', 6);
            $learnActivities->push($data);
        });

        return DataTables::of($learnActivities)
            ->editColumn('january', function ($learnActivity) {
                $value = '<ul class="list-group list-group-flush">';
                foreach ($learnActivity['january'] as $january) {
                    $value .= '<li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="">' . $january->name . '</div>
                  <div class="fs-6 fst-italic">(' . $january->start_date . '-' . $january->end_date . ')</div>
                </div>
                <div class="dropdown">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#edit_activity_modal" activity_id="' . $january->id . '"
                        id="edit_activity_btn">Edit</a></li>
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#delete_activity_modal" activity_id="' . $january->id . '"
                        id="delete_activity_btn">Delete</a>
                    </li>
                  </ul>
                </div>';
                }
                $value .= '</ul>';

                return $value;
            })
            ->editColumn('february', function ($learnActivity) {
                $value = '<ul class="list-group list-group-flush">';
                foreach ($learnActivity['february'] as $february) {
                    $value .= '<li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="">' . $february->name . '</div>
                  <div class="fs-6 fst-italic">(' . $february->start_date . '-' . $february->end_date . ')</div>
                </div>
                <div class="dropdown">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#edit_activity_modal" activity_id="' . $february->id . '"
                        id="edit_activity_btn">Edit</a></li>
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#delete_activity_modal" activity_id="' . $february->id . '"
                        id="delete_activity_btn">Delete</a>
                    </li>
                  </ul>
                </div>';
                }
                $value .= '</ul>';
                return $value;
            })
            ->editColumn('march', function ($learnActivity) {
                $value = '<ul class="list-group list-group-flush">';
                foreach ($learnActivity['march'] as $march) {
                    $value .= '<li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="">' . $march->name . '</div>
                  <div class="fs-6 fst-italic">(' . $march->start_date . '-' . $march->end_date . ')</div>
                </div>
                <div class="dropdown">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#edit_activity_modal" activity_id="' . $march->id . '"
                        id="edit_activity_btn">Edit</a></li>
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#delete_activity_modal" activity_id="' . $march->id . '"
                        id="delete_activity_btn">Delete</a>
                    </li>
                  </ul>
                </div>';
                }
                $value .= '</ul>';
                return $value;
            })
            ->editColumn('april', function ($learnActivity) {
                $value = '<ul class="list-group list-group-flush">';
                foreach ($learnActivity['april'] as $april) {
                    $value .= '<li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="">' . $april->name . '</div>
                  <div class="fs-6 fst-italic">(' . $april->start_date . '-' . $april->end_date . ')</div>
                </div>
                <div class="dropdown">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#edit_activity_modal" activity_id="' . $april->id . '"
                        id="edit_activity_btn">Edit</a></li>
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#delete_activity_modal" activity_id="' . $april->id . '"
                        id="delete_activity_btn">Delete</a>
                    </li>
                  </ul>
                </div>';
                }
                $value .= '</ul>';
                return $value;
            })
            ->editColumn('may', function ($learnActivity) {
                $value = '<ul class="list-group list-group-flush">';
                foreach ($learnActivity['may'] as $may) {
                    $value .= '<li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="">' . $may->name . '</div>
                  <div class="fs-6 fst-italic">(' . $may->start_date . '-' . $may->end_date . ')</div>
                </div>
                <div class="dropdown">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#edit_activity_modal" activity_id="' . $may->id . '"
                        id="edit_activity_btn">Edit</a></li>
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#delete_activity_modal" activity_id="' . $may->id . '"
                        id="delete_activity_btn">Delete</a>
                    </li>
                  </ul>
                </div>';
                }
                $value .= '</ul>';
                return $value;
            })
            ->editColumn('june', function ($learnActivity) {
                $value = '<ul class="list-group list-group-flush">';
                foreach ($learnActivity['june'] as $june) {
                    $value .= '<li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="">' . $june->name . '</div>
                  <div class="fs-6 fst-italic">(' . $june->start_date . '-' . $june->end_date . ')</div>
                </div>
                <div class="dropdown">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#edit_activity_modal" activity_id="' . $june->id . '"
                        id="edit_activity_btn">Edit</a></li>
                    <li><a class="dropdown-item" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#delete_activity_modal" activity_id="' . $june->id . '"
                        id="delete_activity_btn">Delete</a>
                    </li>
                  </ul>
                </div>';
                }
                $value .= '</ul>';
                return $value;
            })
            ->rawColumns(['january', 'february', 'march', 'april', 'may', 'june'])
            ->make(true);
    }

}
