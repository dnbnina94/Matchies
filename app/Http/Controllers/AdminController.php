<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\User as User;
use App\Report as Report;
use App\Registered_user as Registered_user;
use App\Photo as Photo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Support\Facades\Hash as Hash;
use Auth;



class AdminController extends Controller
{

  public function ucitajReportove() {
    $reports = Report::where('status', '=', 0)->get();

    $info = array(
      'reports' => $reports
    );

    return view('index_admin', $info);

  }

  public function listUsers() {
    $regUsers = Registered_user::orderBy('number_of_warnings', 'desc')->get();

    $info = array(
      'regUsers' => $regUsers
    );

    return view('users_admin', $info);
  }

  public function warnUserFromProfile(Request $request) {
    $id = $request->input('user_id');
    $reg = Registered_user::where('id', '=', $id)->first();
    $reg->number_of_warnings++;
    $reg->save();
    $reports = Report::where('status', '=', 0)->get();

    $info = array(
      'reports' => $reports
    );

    return view('index_admin', $info);
  }

    public function listMods() {
      $users = User::where('type', '=', 2)->get();

      $info = array(
        'users' => $users
      );

      return view('moderators_admin', $info);
    }

  public function warnUser(Request $request) {
    $id = $request->input('user_idBox');
    $reportId = $request->input('report_idBox');
    $reg = Registered_user::where('id', '=', $id)->first();
    $reg->number_of_warnings++;
    $report = Report::where('id', '=', $reportId)->first();
    $report->status = 1;
    $reg->save();
    $report->save();
    $reports = Report::where('status', '=', 0)->get();

    $info = array(
      'reports' => $reports
    );

    return view('index_admin', $info);
  }

  public function deleteMod(Request $request) {
    $id = $request->input('moderatorID');
    $user = User::where('id', '=', $id)->first();
    if ($user == null)
      return view('/error_user_not_found_admin');
    else
      $user->delete();

    $users = User::where('type', '=', 2)->get();

    $info = array(
      'users' => $users
    );

    return view('moderators_admin', $info);
  }

public function deleteReport(Request $request) {
        $reportId = $request->input('report_id_to_delete');
        $report = Report::where('id', '=', $reportId)->first();
        $report->delete();
        $reports = Report::where('status', '=', 0)->get();

        $info = array(
          'reports' => $reports
        );

        return redirect()->route('admin');
      }

}

?>
