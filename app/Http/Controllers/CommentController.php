<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;
use App\TinTuc;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommentController extends Controller
{
    //
    public function getXoa($id, $idTinTuc)
    {
      $comment = Comment::find($id);
      $comment->delete();

      return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbaoxoacomment','Xóa comment thành công');
    }
    public function postComment($id, Request $request)
    {
    	$tintuc = TinTuc::find($id);

    	$comment = new Comment;
    	$comment->idTinTuc = $id;
    	$comment->idUser = Auth::user()->id;
    	$comment->NoiDung = $request->comment;
        $comment->created_at = Carbon::now();
    	$comment->save();

    	return redirect("tintuc/".$id."/".$tintuc->TieuDeKhongDau.".html");
    }
}
