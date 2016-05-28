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


class ModController extends Controller
{
      public function ucitajReportove() {
        $reports = Report::where('status', '=', 0)->get();

        $info = array(
          'reports' => $reports
        );

        return view('index_moderator', $info);

      }

      public function warnUser(Request $request) {
        $id = $request->input('user_id');
        $reportId = $request->input('report_id');
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

        return view('index_moderator', $info);
      }
}

?>
