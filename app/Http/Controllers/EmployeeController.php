<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
   {
      $bases=DB::table('employees')->get();
      $count=DB::table('employees')->count();
      return view('Employee.index',['bases'=>$bases,'count'=>$count]);
   }


   public function search(Request $request){

      $search=$request->get('search');
      $search1=$request->get('search1');

      $bases=DB::table('employees')
      ->where('name','like','%'.($search).'%')
      ->where('phone','like','%'.$search1.'%')
      ->paginate(5);
      return view('Employee.index',['bases'=>$bases]); 
   }





   public function update(Request $request,$id){
      
    $basesfindid = Employee::find($id);

    $bases=DB::table('employees')->get();
    if($basesfindid->check == 0){
      $bases=DB::table('employees')
      ->where('id', $id)->update([
         'check'=> 1,
         'updatedtime'=> null
     ]);
    }else{
      $bases=DB::table('employees')
      ->where('id', $id)->update([
         'check'=> 0
     ]);
    }
    $bases=DB::table('employees')->get();
    session()->flash('status','更新成功');
     // $bases = Employee::find($id);
     // $bases->check=$request->input('check') == true ? '1' : '0';
     // $bases->update();
      //return redirect()->back()->with('status','Post add success');
      //->update(['username' => $username, 'status' => $status]);
      return view('Employee.index',['bases'=>$bases]);
   }
}