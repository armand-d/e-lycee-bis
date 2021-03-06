@extends('layouts.master')

@section('content')
@include('back-office.teacher.partials.nav')
<div class="tab-pane active row" id="profil">
	<div class="spacer-xs"></div>
	<div class="profile-teacher row">
		<div class="col-lg-24 col-md-24">
			<div class="col-lg-8 col-md-8 text-center"><img class="radius-50 avatar" width="200px" height="200px" src="{{$user->url_avatar}}" alt=""></div>
			<div class="col-lg-16 col-md-16">
				<div class="spacer-xs"></div>
				<div class="row">
					<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Photo de profil</p>
				</div>
				<div class="spacer-xs"></div>
				<li>
					<a href="#profilRemplacerPhoto" id="user-replace-photo"><i class="fa fa-angle-right" aria-hidden="true"></i> Remplacer votre photo</a>
					<div class="user-replace-photo row">
						{{Form::open(array('url'=>'user/replace/photo', 'enctype'=>'multipart/form-data', 'id'=>'form-user-replace-photo'))}}
							<li>{{Form::file('avatar')}}</li>
							<li class="col-lg-8 col-md-8">{{Form::submit('Modifier la photo', array('class'=>'submit-form'))}}</li>
						{{Form::close()}}
					</div>
				</li>
				<li>
					<a href="{{url('user/delete/photo')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Supprimer votre photo</a>
				</li>
				<div class="spacer-xs"></div>
				<div class="row">
					<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Informations personnelles</p>
				</div>
				<div class="spacer-xs"></div>
				{{Form::open(array('url'=>'update/user', 'method'=>'POST'))}}
					<li>Nom : {{Form::text('username', $user->username, array('class' => 'input-grey' ))}}</li>
			    	@if($errors->has('username')) <span class="error">{{$errors->first('username')}}</span>@endif</li>
					<li class="col-lg-8 col-md-8">{{Form::submit('Modifier',array('class' => 'submit-form'))}}</li>
				{{Form::close()}}
			</div>
		</div>
		<div class="spacer-xs"></div>
	</div>
</div>
@endsection