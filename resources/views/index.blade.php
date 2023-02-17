@extends('layouts.app')

@section('scripts')
<script type="text/javascript" src="{{ url('assets/js/ajax.js') }}?{{rand(2, 20)}}"></script>
@endsection

@section('content')
    <div class="row" style="margin-top: 8px;">
        <table class="table table-striped table-responsive" id="userTable">
            <thead>
                <tr>
                    <th scope="col">
                        # id<a id="idAsc" href="#" class="link-primary">&#x25b4;</a><a id="idDesc" href="#" class="link-primary">&#x25be;</a>
                    </th>
                    <th scope="col">
                        nombre<a id="nombreAsc" href="#" class="link-primary">&#x25b4;</a><a id="nombreDesc" href="#" class="link-primary">&#x25be;</a>
                    </th>
                    <th scope="col">
                        tipo<a id="tipoAsc" href="#" class="link-primary">&#x25b4;</a><a id="tiposDesc" href="#" class="link-primary">&#x25be;</a>
                    </th>
                    <th scope="col">
                        user<a id="userAsc" href="#" class="link-primary">&#x25b4;</a><a id="userDesc" href="#" class="link-primary">&#x25be;</a>
                    </th>
                    <th scope="col">
                        astillero<a id="astilleroAsc" href="#" class="link-primary">&#x25b4;</a><a id="astilleroDesc" href="#" class="link-primary">&#x25be;</a>
                    </th>
                    <th scope="col">
                        descripción<a id="descAsc" href="#" class="link-primary">&#x25b4;</a><a id="descDesc" href="#" class="link-primary">&#x25be;</a>
                    </th>
                    <th scope="col">
                        precio<a id="precioAsc" href="#" class="link-primary">&#x25b4;</a><a id="precioDesc" href="#" class="link-primary">&#x25be;</a>
                    </th>
                </tr>
            </thead>
            <tbody id="yateAjaxBody">
            </tbody>
        </table>
        <div class="row">
            <ul id="pagination" class="pagination"></ul>
        </div>
    </div>
@endsection

@section('navItems')
<li class="nav-item not-logged hide">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLogin">Login</a>
</li>
<li class="nav-item logged hide">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLogout">Logout</a>
</li>
<li class="nav-item not-logged hide">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalRegister">Register</a>
</li>
<li class="nav-item logged hide">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalProfile">Profile</a>
</li>
@endsection

@section('modalContent')
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="button" class="btn btn-primary" value="Login"/>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="button" class="btn btn-primary" value="Register"/>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="button" class="btn btn-primary" value="Logout"/>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="button" class="btn btn-primary" value="Profile"/>
      </div>
    </div>
  </div>
</div>
@endsection