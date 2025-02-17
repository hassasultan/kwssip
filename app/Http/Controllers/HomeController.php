<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use App\Models\Customer;
use App\Models\ComplaintType;
use App\Models\MobileAgent;
use App\Models\Town;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index(Request $request)
    // {
    //     $allTown = array();
    //     $totalComplaints = Complaints::count();
    //     $totalAgents = MobileAgent::count();
    //     $complaintsPending = Complaints::where('status',0)->count();
    //     $complaintsComplete = Complaints::where('status',1)->count();
    //     $total_customer = Customer::count();
    //     if(auth()->user()->role == 3)
    //     {
    //         $totalComplaints = Complaints::with('assignedComplaints')->whereHas('assignedComplaints',function($query){
    //             $query->where('agent_id',auth()->user()->agent->id);
    //         })->count();
    //         $complaintsPending = Complaints::with('assignedComplaints')->whereHas('assignedComplaints',function($query){
    //             $query->where('agent_id',auth()->user()->agent->id);
    //         })->where('status',0)->count();
    //         $complaintsComplete = Complaints::with('assignedComplaints')->whereHas('assignedComplaints',function($query){
    //             $query->where('agent_id',auth()->user()->agent->id);
    //         })->where('status',1)->count();
    //     }
    //     $result[0] = ['Clicks','Viewers'];
    //     $result[1] = ['Pending',$complaintsPending];
    //     $result[2] = ['Complete',$complaintsComplete];
    //     $type = ComplaintType::with('town','town.complaints','complaints')->get();
    //     $new_town = Town::with('comp_type','comp_type.complaints','complaints')->get();
    //     $resultNew[0] = ['Clicks','Viewers'];
    //     $town = Town::get('town');

    //     foreach($town as $row)
    //     {
    //         array_push($allTown,$row->town);
    //     }
    //     // dd($allTown);
    //     foreach($type as $key => $row)
    //     {
    //         $resultNew[++$key] = [$row->title, (int)count($row->complaints)];
    //     }
    //     if($request->has('status') && $request->status == "api")
    //     {
    //         $data['type_count'] = $resultNew;
    //         $data['result'] = $result;
    //         return $data;
    //     }
    //     $typeComp = null;
    //     $typeComp_town = array();;
    //     $total_comp = array();
    //     $new_complaints = Complaints::get()->groupBy(['town_id','type_id']);

    //     $all_types = ComplaintType::where('status', 1)->get();

    //     $new_key = 0;
    //     foreach($new_complaints as $key => $row)
    //     {
    //         $total_num = array();
    //         $feed_town = Town::find($key);
    //             // print_r($row->toArray());

    //         foreach($all_types as $index => $item)
    //         {
    //             // $feed_type = ComplaintType::find($index);
    //             // array_push($total_comp,$feed_type->title);
    //             $c_comp = Complaints::where('type_id',$item->id)->where('town_id',$key)->count();
    //             array_push($total_num,$c_comp);
    //             $typeComp[$index]['name'] = $item->title;

    //         }
    //         $typeComp[$new_key]['data'] = $total_num;
    //         $new_key++;
    //         // $total_num = array();
    //         // dd($typeComp[$index]['data']);
    //         // foreach()
    //         // {

    //         // }
    //         // $comId = $row->complaints->id;
    //         // $newTown = Town::with('complaints',function($query) use($comId){
    //         //     $query->where('id',$comId);
    //         // })->get();
    //         // dd($newTown->toArray());
    //         array_push($typeComp_town,$feed_town->town);

    //     }
    //     // dd($typeComp[$index]['data']);
    //     // $allTown = array();
    //     // $totalComplaints = Complaints::count();
    //     // $totalAgents = MobileAgent::count();
    //     // $complaintsPending = Complaints::where('status',0)->count();
    //     // $complaintsComplete = Complaints::where('status',1)->count();
    //     // $total_customer = Customer::count();
    //     // $result[0] = ['Clicks','Viewers'];
    //     // $result[1] = ['Pending',$complaintsPending];
    //     // $result[2] = ['Complete',$complaintsComplete];
    //     // $type = ComplaintType::with('complaints')->get();
    //     // $resultNew[0] = ['Clicks','Viewers'];
    //     // $town = Town::get('town');
    //     // foreach($town as $row)
    //     // {
    //     //     array_push($allTown,$row->town);
    //     // }
    //     // // dd($allTown);
    //     // foreach($type as $key => $row)
    //     // {
    //     //     $resultNew[++$key] = [$row->title, (int)count($row->complaints)];
    //     // }
    //     // if($request->has('status') && $request->status == "api")
    //     // {
    //     //     $data['type_count'] = $resultNew;
    //     //     $data['result'] = $result;
    //     //     return $data;
    //     // }
    //     // foreach($type as $key => $row)
    //     // {
    //     //     // $comId = $row->complaints->id;
    //     //     // $newTown = Town::with('complaints',function($query) use($comId){
    //     //     //     $query->where('id',$comId);
    //     //     // })->get();
    //     //     // dd($newTown->toArray());
    //     //     $typeComp[$key]['name'] = $row->title;
    //     //     $typeComp[$key]['data'] = [(int)count($row->complaints)];
    //     // }
    //     // dd($typeComp);
    //     if(auth()->user()->role == 3)
    //     {

    //         return view('agent_dashboard.home',compact('complaintsComplete','totalComplaints','complaintsPending'));
    //     }
    //     return view('home',compact('complaintsComplete','totalComplaints','totalAgents','allTown','typeComp_town','typeComp','total_customer','complaintsPending'));
    // }
    public function index(Request $request)
    {
        $user = auth()->user();
        $role = $user->role;
        $agentId = $user->agent->id ?? null;

        // Count overall complaints and filter if role is agent (role 3)
        $complaintsQuery = Complaints::query();
        if ($role == 3) {
            $complaintsQuery->whereHas('assignedComplaints', function ($query) use ($agentId) {
                $query->where('agent_id', $agentId);
            });
        }

        $totalComplaints = $complaintsQuery->count();
        $complaintsPending = $complaintsQuery->where('status', 0)->count();
        $complaintsComplete = Complaints::where('status', 1)->count();
        // dd($complaintsComplete);
        // Other counts
        $totalAgents = MobileAgent::count();
        $totalCustomer = Customer::count();

        // Fetch towns with associated complaint types and counts
        $complaintsData = DB::table('complaint')
        ->selectRaw(
            'towns.town AS town_name, complaint_types.title AS complaint_type, COUNT(complaint.id) AS complaints_count'
        )
        ->join('towns', 'complaint.town_id', '=', 'towns.id')
        ->join('complaint_types', 'complaint.type_id', '=', 'complaint_types.id')
        ->groupBy('towns.id', 'towns.town', 'complaint_types.id', 'complaint_types.title')
        ->orderBy('towns.town')
        ->orderBy('complaint_types.title')
        ->get();


        // Format data for charts
        $typeComp = [];
        $typeCompTown = [];
        foreach ($complaintsData as $data) {
            $typeComp[$data->complaint_type]['name'] = $data->complaint_type;
            $typeComp[$data->complaint_type]['data'][] = (int) $data->complaints_count;

            if (!in_array($data->town_name, $typeCompTown)) {
                $typeCompTown[] = $data->town_name;
            }
        }
        // Chart data
        $result = [
            ['Status', 'Count'],
            ['Pending', $complaintsPending],
            ['Complete', $complaintsComplete],
        ];

        if ($request->has('status') && $request->status == "api") {
            return response()->json([
                'type_count' => array_values($typeComp),
                'result' => $result,
            ]);
        }

        $view = $role == 3 ? 'agent_dashboard.home' : 'home';
        return view($view, compact(
            'complaintsComplete',
            'totalComplaints',
            'complaintsPending',
            'totalAgents',
            'totalCustomer',
            'typeCompTown',
            'typeComp'
        ));
    }

}
