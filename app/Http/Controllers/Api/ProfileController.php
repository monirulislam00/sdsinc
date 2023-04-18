<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function view($id)
    {
        $member = TeamMember::find($id);
        $url = config('app.url');
        if (!is_null($member)) {
            $data = $member;
            $resCode = 200;
        } else if (empty($member)) {
            $data = "Member not found";
            $resCode = 404;
        }
        return response()->json([
            "data" => $data,
            'url' => $url

        ], $resCode);
    }

}