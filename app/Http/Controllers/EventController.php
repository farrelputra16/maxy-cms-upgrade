<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRequirement;
use App\Models\MEventType;
use App\Models\EventParticipantRequirement;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    function getEvent()
    {
        $events = Event::all();

        return view('event.indexv3', [
            'events' => $events
        ]);
    }

    function getEventData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');//dd($orderDirection);

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];
        
        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $accessGroup = Event::select('id', 'name', 'image', 'date_start', 'date_end', 'description', 'is_need_verification', 'is_public', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
            ->orderBy($finalOrderColumn, $orderDirection);

        // global search datatable
        // if (!empty($searchValue)) {
        //     $partners->where(function ($q) use ($searchValue, $columns) {
        //         foreach ($columns as $column) {
        //             $columnName = $column['data'];

        //             if (in_array($columnName, ['DT_RowIndex', 'action'])) {
        //                 continue;
        //             } else if ($columnName === 'm_partner_type') {
        //                 $q->orWhereHas('MPartnerType', function ($query) use ($searchValue) {
        //                     $query->where('name', 'like', "%{$searchValue}%");
        //                 });
        //             } else {
        //                 $q->orWhere($columnName, 'like', "%{$searchValue}%");
        //             }
        //         }
        //     });
        // }

        // Filter kolom
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $accessGroup->where('status', '=', 0);
                else
                    $accessGroup->where('status', '=', 1);
            } else {
                $accessGroup->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($accessGroup)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . asset('uploads/event/' . $row->image) . '" alt="Image" style="max-width: 200px; max-height: 150px;">';
            })
            ->addColumn('date_start', function ($row) {
                return $row->date_start;
            })
            ->addColumn('date_end', function ($row) {
                return $row->date_end;
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->description)) . '">' 
                    . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-') 
                    . '</span>';
            })
            ->addColumn('is_need_verification', function ($row) {
                $verif = 'btn-danger';
                if ($row->is_need_verification == 1) {
                    $verif = 'btn-success';
                }
                return '<a class="btn ' . $verif . '" style="pointer-events: none;">' . ($row->is_need_verification == 1 ? 'Ya' : 'Tidak') . '</a>';
            })
            ->addColumn('is_public', function ($row) {
                $verif = 'btn-danger';
                if ($row->is_public == 1) {
                    $verif = 'btn-success';
                }
                return '<a class="btn ' . $verif . '" style="pointer-events: none;">' . ($row->is_public == 1 ? 'Ya' : 'Tidak') . '</a>';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('created_id', function ($row) {
                return $row->created_id;
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at;
            })
            ->addColumn('updated_id', function ($row) {
                return $row->updated_id;
            })
            ->addColumn('status', function ($row) {
                return '<button 
                    class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '" 
                    data-id="' . $row->id . '" 
                    data-status="' . $row->status . '"
                    data-model="Event">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditEvent', ['id' => $row->id]) . '" 
                            class="btn btn-primary rounded">Ubah</a>' . " " . 
                        '<a href="' . route('getAttendanceEvent', ['id' => $row->id]) . '" 
                            class="btn btn-info">Kehadiran</a>' . " " .
                        '<a href="' . route('getEventRequirement', ['id' => $row->id]) . '" 
                            class="btn btn-secondary">Persyaratan</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'image', 'description', 'is_need_verification', 'is_public', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getAddEvent()
    {
        $event_types = MEventType::where('status', 1)->get();

        return view('event.addv3', [
            'event_types' => $event_types
        ]);
    }

    function postAddEvent(Request $request)
    {
        // return dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'image' => 'required',
            'url' => 'nullable|url',
        ]);

        if ($validated) {
            $image = '';
            $create = Event::create([
                'm_event_type_id' => $request->event_type,
                'name' => $request->name,
                'date_start' => date('Y-m-d H:i:s', strtotime($request->date_start)),
                'date_end' => date('Y-m-d H:i:s', strtotime($request->date_end)),
                'image' => $image,
                'url' => $request->url,
                'is_need_verification' => $request->need_verification ? 1 : 0,
                'is_public' => $request->public ? 1 : 0,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
            if ($create) {
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $image = $file->getClientOriginalName();
                    $destinationPath = public_path('/uploads/event');
                    if (!File::exists($destinationPath)) { // create folder jika blm ada
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $image);
                }
                $updateData = Event::where('id', $create->id)->update(['image' => $image]);
                if ($updateData) {
                    return app(HelperController::class)->Positive('getEvent');
                } else {
                    return app(HelperController::class)->Warning('getEvent');
                }
            }
            return app(HelperController::class)->Negative('getEvent');
        } else
            return redirect()->back()->withErrors($validated)->withInput();
    }

    function getEditEvent(Request $request)
    {
        $idevent = $request->id;
        $event = Event::find($idevent);
        $event_types = MEventType::where('status', 1)->get();

        return view('event.editv3', [
            'event' => $event,
            'event_types' => $event_types,
        ]);
    }

    function postEditEvent(Request $request)
    {
        $idevent = $request->id;//dd($request);

        $validated = $request->validate([
            'name' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'url' => 'nullable|url',
        ]);

        if ($validated) {
            $updateData = Event::where('id', $idevent)
                ->update([
                    'm_event_type_id' => $request->event_type,
                    'name' => $request->name,
                    'date_start' => date('Y-m-d H:i:s', strtotime($request->date_start)),
                    'date_end' => date('Y-m-d H:i:s', strtotime($request->date_end)),
                    'url' => $request->url,
                    'is_need_verification' => $request->need_verification ? 1 : 0,
                    'is_public' => $request->public ? 1 : 0,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);

            if ($updateData) {
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $image = $file->getClientOriginalName();
                    $destinationPath = public_path('/uploads/event');
                    if (!File::exists($destinationPath)) { // create folder jika blm ada
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $image);
                    $updateData = Event::where('id', $idevent)->update(['image' => $image]);
                }
                return app(HelperController::class)->Positive('getEvent');
            } else {
                return app(HelperController::class)->Warning('getEvent');
            }
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    function getAttendanceEvent(Request $request)
    {
        $idevent = $request->id;
        $event_attendances = DB::table('event_participant')
            ->join('users', 'event_participant.user_id', 'users.id')
            ->where('event_id', $idevent)
            ->get(['users.name', 'event_participant.*']);

        return view('event.attendancev3', [
            'event_attendances' => $event_attendances,
            'idevent' => $idevent
        ]);
    }
    function getAttendanceEventData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');
        $idevent = $request->input('id'); // Assuming you'll pass the event ID

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];
        
        // Use mapping to determine sorting column
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $eventAttendances = DB::table('event_participant')
            ->join('users', 'event_participant.user_id', 'users.id')
            ->select(
                'event_participant.id', 
                'users.name', 
                'event_participant.description', 
                'event_participant.created_at', 
                'event_participant.created_id', 
                'event_participant.updated_at', 
                'event_participant.updated_id', 
                'event_participant.status',
                'event_participant.user_id',
                'event_participant.event_id'
            )
            ->where('event_id', $idevent)
            ->orderBy($finalOrderColumn, $orderDirection);

        // Column filtering with explicit table references
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } 
            
            // Use explicit table references for ambiguous columns
            switch ($columnName) {
                case 'id':
                    $eventAttendances->where('event_participant.id', 'like', "%{$columnSearchValue}%");
                    break;
                case 'description':
                    $eventAttendances->where('event_participant.description', 'like', "%{$columnSearchValue}%");
                    break;
                case 'status':
                    if (strpos(strtolower($columnSearchValue), 'h') !== false) {
                        $eventAttendances->where('event_participant.status', '=', 1);
                    } else if (strpos(strtolower($columnSearchValue), 't') !== false){
                        $eventAttendances->where('event_participant.status', '=', 0);
                    } else {}
                    break;
                case 'name':
                    $eventAttendances->where('users.name', 'like', "%{$columnSearchValue}%");
                    break;
                case 'created_at':
                    $eventAttendances->where('event_participant.created_at', 'like', "%{$columnSearchValue}%");
                    break;
                case 'updated_at':
                    $eventAttendances->where('event_participant.updated_at', 'like', "%{$columnSearchValue}%");
                    break;
                case 'created_id':
                    $eventAttendances->where('event_participant.created_id', 'like', "%{$columnSearchValue}%");
                    break;
                case 'updated_id':
                    $eventAttendances->where('event_participant.updated_id', 'like', "%{$columnSearchValue}%");
                    break;
                default:
                    $eventAttendances->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($eventAttendances)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->description)) . '">' 
                    . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-') 
                    . '</span>';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('created_id', function ($row) {
                return $row->created_id;
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at;
            })
            ->addColumn('updated_id', function ($row) {
                return $row->updated_id;
            })
            ->addColumn('status', function ($row) {
                return '<button 
                    class="btn ' . ($row->status == 1 ? 'btn-success' : 'btn-info') . ' disabled">
                    ' . ($row->status == 1 ? 'Hadir' : 'Terdaftar') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEventVerification', ['user_id' => $row->user_id, 'event_id' => $row->event_id]) . '" 
                            class="btn btn-primary">Verifikasi</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'description', 'status', 'action'])
            ->make(true);
    }

    public function getEventRequirement(Request $request)
    {
        // dd($request->all());
        // $requirement = EventRequirement::getRequirementsByEventId($request->id);
        $event = Event::find($request->id);

        // dd($event);

        return view('event.requirement.indexv3', compact('event'));
    }
    function getEventRequirementData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');
        $eventId = $request->input('id'); // Add event_id parameter

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];
        
        // Use mapping to determine the sorting column
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $eventRequirement = EventRequirement::select(
            'id', 
            'event_id', 
            'name', 
            'is_upload', 
            'is_required', 
            'description', 
            'created_at', 
            'created_id', 
            'updated_at', 
            'updated_id', 
            'status'
        )
        ->where('event_id', $eventId) // Filter by event_id
        ->orderBy($finalOrderColumn, $orderDirection);

        // Column filtering
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $eventRequirement->where('status', '=', 0);
                else
                    $eventRequirement->where('status', '=', 1);
            } else if ($columnName == 'is_upload') {
                $firstChar = strtolower(substr($columnSearchValue, 0, 1));
                if ($firstChar === 'y') {
                    $eventRequirement->where('is_upload', '=', 1);
                } elseif ($firstChar === 't') {
                    $eventRequirement->where('is_upload', '=', 0);
                }
            } else if ($columnName == 'is_required') {
                $firstChar = strtolower(substr($columnSearchValue, 0, 1));
                if ($firstChar === 'y') {
                    $eventRequirement->where('is_required', '=', 1);
                } elseif ($firstChar === 't') {
                    $eventRequirement->where('is_required', '=', 0);
                }
            } else {
                $eventRequirement->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($eventRequirement)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('is_upload', function ($row) {
                return $row->is_upload == 1 
                    ? '<span class="badge bg-success">Ya</span>' 
                    : '<span class="badge bg-danger">Tidak</span>';
            })
            ->addColumn('is_required', function ($row) {
                return $row->is_required == 1 
                    ? '<span class="badge bg-success">Ya</span>' 
                    : '<span class="badge bg-danger">Tidak</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->description)) . '">' 
                    . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-') 
                    . '</span>';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('created_id', function ($row) {
                return $row->created_id;
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at;
            })
            ->addColumn('updated_id', function ($row) {
                return $row->updated_id;
            })
            ->addColumn('status', function ($row) {
                return '<button 
                    class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '" 
                    data-id="' . $row->id . '" 
                    data-status="' . $row->status . '"
                    data-model="EventRequirement">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) use ($request) {
                return '<a href="' . route('getEditEventRequirement', [
                    'id' => $row->id, 
                    'event_id' => $request->input('id')
                ]) . '" class="btn btn-primary rounded">Ubah</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'is_upload', 'is_required', 'description', 'status', 'action'])
            ->make(true);
    }
    public function getAddEventRequirement(Request $request)
    {
        // dd($request->all());

        $event_id = $request->event_id;
        return view('event.requirement.addv3', compact(['event_id']));
    }
    public function postAddEventRequirement(Request $request)
    {
    //    dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
        ]);

        try {
            $requirement = new EventRequirement();
            $requirement->event_id = $request->event_id;
            $requirement->name = $request->name;
            $requirement->description = $request->description;
            $requirement->is_upload = $request->upload ? 1 : 0;
            $requirement->is_required = $request->required ? 1 : 0;
            $requirement->status = $request->status ? 1 : 0;
            $requirement->created_id = auth()->user()->id;
            $requirement->updated_id = auth()->user()->id;

            $requirement->save();

            return redirect()->route('getEventRequirement', ['id' => $request->event_id])->with('success', 'event requirement updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('getEventRequirement', ['id' => $request->event_id])->with('error', 'failed to update event requirement: ' . $e->getMessage());
        }
    }
    public function getEditEventRequirement(Request $request)
    {
        // dd($request->all());

        $requirement = EventRequirement::find($request->id);
        $event_id = $request->event_id;
        return view('event.requirement.editv3', compact(['requirement', 'event_id']));
    }
    public function postEditEventRequirement(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
        ]);

        try {
            $requirement = EventRequirement::find($request->id);
            $requirement->name = $request->name;
            $requirement->description = $request->description;
            $requirement->is_upload = $request->upload ? 1 : 0;
            $requirement->is_required = $request->required ? 1 : 0;
            $requirement->status = $request->status ? 1 : 0;
            $requirement->updated_id = auth()->user()->id;

            $requirement->save();

            return redirect()->route('getEventRequirement', ['id' => $request->event_id])->with('success', 'event requirement updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('getEventRequirement', ['id' => $request->event_id])->with('error', 'failed to update event requirement: ' . $e->getMessage());
        }
    }

    public function getEventVerification(Request $request)
    {
        // Ambil data requirements
        $requirement = EventParticipantRequirement::with(['EventRequirement', 'User'])
            ->where('user_id', $request->user_id)
            ->whereHas('EventRequirement', function ($query) use ($request) {
                $query->where('event_id', $request->event_id);
            })
            ->get();

        // Kirim event_id dan user_id ke view
        return view('event.verificationv3', [
            'requirement' => $requirement,
            'event_id' => $request->event_id,
            'user_id' => $request->user_id
        ]);
    }
}
