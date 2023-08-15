@extends('layouts.client')
@php
    $title = 'Trang chủ';
@endphp
@section('title',$title)

@section('content')

    <div class="container mt-4">
        <form>

            <div class="row mb-4">
                <div class="col-3">
                    <select class="form-control" name="status">
                        <option value="0">Tất cả các trạng thái</option>
                        <option value="active" {{request()->status == "active"? 'selected':false}}>Đã kích hoạt
                        </option>
                        <option value="inactive" {{request()->status == "inactive"? 'selected':false}}>Chưa kích hoạt
                        </option>

                    </select>
                </div>
                <div class="col-4">
                    <select class="form-control" name="group_id">
                        <option value="0">Tất cả các nhóm</option>
                        @foreach($groups as $group)
                            <option value="{{$group->id}}"
                                {{request()->group_id == $group->id?"selected":false}}
                            >{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">

                    <input type="search" value="{{request()->name?request()->name:''}}" name="keywords"
                           class="form-control"
                           id="name" placeholder="Từ khoá tìm kiếm">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                </div>
            </div>
        </form>
        <table class="table table-primary">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col"><a href="">Tên</a></th>
                <th scope="col"><a href="">Email</a></th>
                <th scope="col">Phone</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)

                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->status ==1?"Đã kích hoạt":"Chưa kích hoạt"}}</td>
                    <td>
                        @if($user->trashed())
                            <a href="{{route('user.forceDelete',$user)}}">
                                <button class="btn btn-primary">Xoá vĩnh viễn</button>
                            </a>
                            <a href="{{route('user.restore',$user)}}">
                                <button class="btn btn-primary">Khôi phục</button>
                            </a>
                        @else
                            <a href="{{route('user.delete',$user)}}">
                                <button class="btn btn-danger">Xoá</button>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection


