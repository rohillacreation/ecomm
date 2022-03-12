<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{
   function upload(Request $request)
   {
      $orgname = $request->upload->getClientOriginalName();
      $filename_org = pathinfo($orgname, PATHINFO_FILENAME);
      $extension =  $request->upload->extension();
      $filename = $filename_org . time() . '.' . $extension;

      $request->upload->move(storage_path('app/public/uploads/blog_media'), $filename);

      $CKEditorFuncNum = $request->input('CKEditorFuncNum');

      $url = asset('storage/uploads/blog_media/' . $filename);

      $msg = "File uploaded";

      $res = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,`$url`,`$msg`)</script>";

      @header("content-Type:text/html charset=utf-8");

      echo $res;
   }
}
