@extends('layouts.master')

@section('content')
	<ul class="nav nav-tabs" id="myTab">
	  <li class="active"><a href="#dashboard">Tableau de bord</a></li>
	  <li><a href="#questionnaire">Questionnaires</a></li>
	  <li><a href="#article">Articles</a></li>
	  <li><a href="#eleves">&Eacute;lèves</a></li>
	  <li><a href="#profile">Profil</a></li>
	</ul>
	 
	<div class="tab-content">
	  <div class="tab-pane active row" id="dashboard">
	  	<div class="spacer-xs"></div>
		<div class="row col-lg-24 col-md-24">
			<div class="col-lg-8 col-md-8 text-center"><img class="radius-50" width="150px" src="{{Request::root('/').'/assets/images/avatar.png'}}" alt=""></div>
			<div class="col-lg-16 col-md-16">
				<div class="spacer-xs"></div>
				<p class="t-s-2">Bonjour {{Auth::user()->username}}</p>
				<a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Modifier votre profil</a>
			</div>
		</div>
		<div class="spacer-xs"></div>
		<div class="row">
			<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Statistiques</p>
		</div>
		<div class="row col-lg-24 col-md-24">
			<div class="col-lg-8 padding-lf-3">
				<p><span class="t-s-3 t-base-blue t-bold">30</span> questionnaires</p>
				<a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des questionnaires</a>
			</div>
			<div class="col-lg-8 padding-lf-3">
				<p><span class="t-s-3 t-base-blue t-bold">30</span> Commentaires</p>
				<a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des commentaires</a>
			</div>
			<div class="col-lg-8 padding-lf-3">
				<p><span class="t-s-3 t-base-blue t-bold">30</span> &Eacute;lèves</p>
				<a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des élèves</a>
			</div>
		</div>
		<div class="spacer-xs"></div>
		<div class="row">
			<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Activitées récentes</p>
		</div>
		<div class="row col-lg-24 col-md-24">
			<div class="col-lg-8 col-md-8 col-lg-offset-16 col-md-offset-16">
				<li><a href=""></a><i class="fa fa-angle-right" aria-hidden="true"></i> Création d'un nouveau formulaire</li>
				<li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Création d'un nouvel article</a></li>
			</div>
		</div>
		<div class="spacer-md"></div>
	  </div>
	  <div class="tab-pane" id="questionnaire">...</div>
	  <div class="tab-pane" id="article">...</div>
	  <div class="tab-pane" id="eleves">...</div>
	  <div class="tab-pane" id="profile">...</div>
	</div>
@endsection