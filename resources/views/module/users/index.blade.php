@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kullanıcılar /</span> Kullanıcı listesi</h4>

        <div class="card">
            <div class="card-header">
                <a href="{{route('user.create')}}" class="btn btn-primary float-end">Yeni Kullanıcı Ekle</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>İsim Soyisim</th>
                        <th>Email</th>
                        <th>Şube</th>
                        <th>Kayıt Tarihi</th>
                        <th>Yetki</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($users as $user)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{$user->name}}</strong></td>
                            <td><span class="badge bg-label-primary me-1">{{$user->email}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$user->seller->name}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$user->created_at}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$user->getRoleNames()}}</span></td>
                            <td>
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox"
                                           onclick="updateStatus('user/update',{{$user->id}},{{$user->is_status == 1 ? 0:1}})"
                                           id="flexSwitchCheckChecked" {{$user->is_status == 1 ? 'checked':''}} />
                                </div>
                            </td>
                            <td>
                                <a href="{{route('user.delete',['id' => $user->id])}}"
                                   class="btn btn-icon btn-danger">
                                    <span class="bx bxs-trash"></span>
                                </a>
                                <a href="{{route('user.edit',['id' => $user->id])}}"
                                   class="btn btn-icon btn-primary">
                                    <span class="bx bx-edit-alt"></span>
                                </a>
                             </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr class="my-5">
    </div>
@endsection
