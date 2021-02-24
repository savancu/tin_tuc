<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function getDanhSach()
    {
    	$user = User::all();
    	return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem()
    {
      return view('admin.user.them');
    }

    public function postThem(Request $request)
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
        $user->quyen = $request->quyen;
        $user->save();

        return redirect('admin/user/them')->with('thongbaothanhcong','Thêm thành công');
       
    }

    public function getSua($id)
    {
      $user = User::find($id);
      return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request, $id)
    {
      $this->validate($request,
        [
       	  'name' => 'required|min:3',
        ],
        [
         	'name.required' => 'Bạn chưa nhập tên người dùng',
         	'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
        ]
      );

      $user = User::find($id);
      $user->name = $request->name;
      $user->quyen = $request->quyen;
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
      return redirect('admin/user/sua/'.$id)->with('thongbaothanhcong','Bạn đã sửa thành công');
    }

    public function getXoa($id)
    {
     	$user = User::find($id);
     	$user->delete();
     	return redirect('admin/user/danhsach')->with('thongbaothanhcong','Xóa người dùng thành công');
    }

    public function getDangnhapAdmin()
    {
      return view('admin.login');
    }
    
    public function postDangnhapAdmin(Request $request)
    {
      $this->validate($request,
        [
          'email' => 'required',
          'password' => 'required|min:3|max:32'
        ],
        [
          'email.required' => 'Bạn chưa nhập Email',
          'password.required' => 'Bạn chưa nhập password',
          'password.min' => 'password không được nhỏ hơn 3 kí tự',
          'password.max' => 'password không được lớn hơn 32 kí tự'
        ]
      );
      
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
      {
        return redirect('admin/theloai/danhsach');
      }
      else
      {
        return redirect('admin/dangnhap')->withInput()->with('loidangnhap','Đăng nhập không thành công');
      }
    }

    public function getDangXuatAdmin()
    {
      Auth::logout();
      return redirect('admin/dangnhap');
    }
}
