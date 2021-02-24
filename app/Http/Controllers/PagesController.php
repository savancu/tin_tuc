<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;

class PagesController extends Controller
{
	// Khi chạy PagesController thì sẽ gọi đến hàm khởi tạo, truyền view share 1 biến thể loại nên các hàm khác mình hk cần tạo biến thê loại nữa
	function trangchu()
	{

		$tintuc = TinTuc::all()->where('NoiBat', 1);
		if(count($tintuc) > 6)
		{
			$tintuc = $tintuc->random(4);
		}
		else
		{
			$tintuc = $tintuc->take(4);
		}

		$tinnoibat = TinTuc::all()->where('NoiBat',1);
		if(count($tinnoibat) > 16)
		{
			$tinnoibat = $tinnoibat->random(15);
		}
		else
		{
			$tinnoibat = $tinnoibat->take(15);
		}

		$tinnoibat = $tinnoibat->chunk(5);

		$loaitin = loaitin::inRandomOrder()->limit(6)->get();

		$tintuclq1 = TinTuc::all()->where('idLoaiTin', $loaitin[0]->id)->take(5);
		$tintuclq2 = TinTuc::all()->where('idLoaiTin', $loaitin[1]->id)->take(5);
		$tintuclq3 = TinTuc::all()->where('idLoaiTin', $loaitin[2]->id)->take(5);
		
		$slide = Slide::all()->take(6);
		// $theloai = TheLoai::all();
		return view('pages.trangchu',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'slide'=>$slide,'tintuclq1'=>$tintuclq1,'tintuclq2'=>$tintuclq2,'tintuclq3'=>$tintuclq3,'loaitin'=>$loaitin]); //['theloai'=>$theloai]);
	}

	function lienhe()
	{
		// $theloai = TheLoai::all();
		return view('pages.lienhe'); //['theloai'=>$theloai]);
	}

	function loaitin($id)
	{
		$loaitin = LoaiTin::find($id);
		$tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
		$tintucnoibat = TinTuc::where('NoiBat',1)->take(5)->get();
		return view ('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc,'tintucnoibat'=>$tintucnoibat]);
	}

	function tintuc($id, Request $request)
	{
		$tintuc = TinTuc::find($id);
		$tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
		$tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(5)->get();
		
		return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);	
	}

	function getDangnhap()
	{
		return view('pages.dangnhap');
	}

	function postDangnhap(Request $request)
	{
		$this->validate($request,
      	[
	       'email' => 'required',
	       'password' => 'required|min:3|max:32'
      	],[
	    	'email.required' => 'Bạn chưa nhập Email',
	       'password.required' => 'Bạn chưa nhập password',
	       'password.min' => 'password không được nhỏ hơn 3 kí tự',
	       'password.max' => 'password không được lớn hơn 32 kí tự'
      	]);
      	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
	    {
	    	return redirect('trangchu');
	    }
	    else
	    {
	    	return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
	    }
	}

	function getDangxuat()
	{
		Auth::logout();
		return redirect('trangchu');
	}

	function getNguoidung()
	{
		return view('pages.nguoidung');
	}

	function postNguoidung(Request $request)
	{
		$this->validate($request,
       [
       	'name' => 'required|min:3',
       ],[
       	'name.required' => 'Bạn chưa nhập tên người dùng',
       	'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',

       ]);

       $user = Auth::user();
       $user->name = $request->name;
       $user->save();

       if($request->changePassword == "on")
       {
	       	$this->validate($request,
		       [
		       	'password' => 'required|min:3|max:32',
		       	'passwordAgain' => 'required|same:password', /*passwordAgain phải giống với password*/
		       ],
		       [
		       	'password.required' => 'Bạn chưa nhập mật khẩu',
		       	'password.min' => 'Mật khẩu phải nhập ít nhất 3 kí tự',
		       	'password.max' => ' Mật khẩu chỉ nhập được tối đa 32 kí tự',
		       	'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
		       	'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
		       ]
		   	);
	       	$user->password = bcrypt($request->password);
       }

       $user->save();
       return redirect('nguoidung')->with('thongbao','Bạn đã sửa thành công');

	}

	function getDangky()
	{
		return view('pages.dangky');
	}

	function postDangky(Request $request)
	{
		$this->validate($request,
	       [
	       	'name' => 'required|min:3',
	       	'email' => 'required|email|unique:users,email', /*không được trùng cột email trong bảng users*/
	       	'password' => 'required|min:3|max:32',
	       	'passwordAgain' => 'required|same:password', /*passwordAgain phải giống với password*/
	       ],
	       [
	       	'name.required' => 'Bạn chưa nhập tên người dùng',
	       	'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
	       	'email.required' => 'Bạn chưa nhập email',
	       	'email.email' => 'Bạn chưa nhập đúng định dạng email',
	       	'email.unique' => 'Email đã tồn tại',
	       	'password.required' => 'Bạn chưa nhập mật khẩu',
	       	'password.min' => 'Mật khẩu phải nhập ít nhất 3 kí tự',
	       	'password.max' => ' Mật khẩu chỉ nhập được tối đa 32 kí tự',
	       	'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
	       	'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'

	       ]
	   );

       $user = new User;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->quyen = 0;
       $user->save();

       return redirect('dangnhap')->with('thongbao',' Chúc mừng bạn đã đăng ký thành công');
	}

	function timkiem(Request $request)
	{
		$tukhoa = $request->tukhoa; //name="tukhoa" 
		$tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orwhere('TomTat','like',"%$tukhoa%")->orwhere('NoiDung','like',"%$tukhoa%")->paginate(5);
		$tintucnoibat = TinTuc::where('NoiBat',1)->take(5)->get();
		return view('pages.timkiem',['tintuc'=>$tintuc,'tintucnoibat'=>$tintucnoibat,'tukhoa'=>$tukhoa]);
	}
}
