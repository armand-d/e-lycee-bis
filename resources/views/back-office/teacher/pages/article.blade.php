<div class="row article-content-list">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2" id="action-article-status">
		<a href="#articlesTous" id="btn-all" class="col-lg-4 col-md-4 status-a active-status-a">Tous ({{count($articlesAll)}})</a>
		<a href="#articlesPublies" id="btn-publish" class="col-lg-4 col-md-4 status-a">Publiés ({{count($articlesPublish)}})</a>
		<a href="#articlesBrouillons" id="btn-unpublish" class="col-lg-4 col-md-4 status-a">Brouillons ({{count($articlesUnpublish)}})</a>
		<a href="#articlesCorbeille" id="btn-delete" class="col-lg-4 col-md-4 status-a">Corbeille ({{count($articlesDelete)}})</a>
		<a href="#articlesAjouter" class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 add add-a"><i class="fa fa-plus"></i> Ajouter</a>
	</div>
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		{{ Form::open(array('url'=>'article-update-status-multiple', 'method'=> 'POST')) }}
			<div class="row">
				<span class="action-select">
					{{ Form::select('action', ['' => 'Actions','0' => 'Brouillon','1' => 'Publier','2' => 'Suprimer']) }}
					{{ Form::submit('Appliquer', array('class'=> 'apply')) }}
					{{Form::hidden('id_selected_article', false,array('id'=>'id_selected_article'))}}
				</span>
				<a href="{{url('articles/delete-multiple')}}" id="delete-articles">Vider la corbeille</a>
			</div>
			<table class="table table-hover" id="tab-article">
			  <thead>
			    <tr>
			      <th>{{Form::checkbox('select-all', false,false, array('disabled'=>'disabled'))}}</th>
			      <th>Titre</th>
			      <th>Statu</th>
			      <th>Date</th>
			    </tr>
			  </thead>
			  <tbody  id="article-all">
			    @foreach($articlesAll as $article)
			    <tr>
			      <td>{{Form::checkbox('selected-article', $article->id)}}</td>
			      <th><a href="{{url('article/'.$article->id)}}" class="link-show-article">{{$article->title}}</a></th>
			      <td>
			      	@if($article->status == 1) Publié
					@elseif($article->status == 2) Supprimé
					@else Brouillon
			      	@endif
			      </td>
			      <td>{{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</td>
			    </tr>
			    @endforeach
			  </tbody>
			  <tbody id="article-publish">
			    @foreach($articlesPublish as $article)
			    <tr>
			      <td scope="row">{{$article->id}}</td>
			      <th><a href="{{url('article/'.$article->id)}}" class="link-show-article">{{ $article->title }}</a></th>
			      <td>{{$article->level}}</td>
			      <td>
					@if($article->status == 1) Publié
					@elseif($article->status == 2) Supprimé
					@else Brouillon
			      	@endif
			      </td>
			      <td>{{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</td>
			    </tr>
			    @endforeach
			  </tbody>
			  <tbody id="article-unpublish">
			    @foreach($articlesUnpublish as $article)
			    <tr>
			      <td scope="row">{{$article->id}}</td>
			      <th><a href="{{url('article/'.$article->id)}}" class="link-show-article">{{ $article->title }}</a></th>
			      <td>{{$article->level}}</td>
			      <td>
					@if($article->status == 1) Publié
					@elseif($article->status == 2) Supprimé
					@else Brouillon
			      	@endif
			      </td>
			      <td>{{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</td>
			    </tr>
			    @endforeach
			  </tbody>
			  <tbody id="article-delete">
			    @foreach($articlesDelete as $article)
			    <tr>
			      <td scope="row">{{$article->id}}</td>
			      <th><a href="{{url('article/'.$article->id)}}" class="link-show-article">{{ $article->title }}</a></th>
			      <td>{{$article->level}}</td>
			      <td>
					@if($article->status == 1) Publié
					@elseif($article->status == 2) Supprimé
					@else Brouillon
			      	@endif
			      </td>
			      <td>{{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
		{{ Form::close() }}
		<div class="spacer-xs"></div>
	</div>
</div>
<div class="row article-content-form">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		<a href="#articlesAnnuler" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel cancel-a"><i class="fa fa-close"></i> Annuler</a>
		<div class="row">
			<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Ajouter un article</p>
		</div>
		<div class="col-lg-16 col-lg-offset-4 col-md-16 col-md-offset-4">
		{{Form::open(array('url'=>'article', 'method'=>'POST', 'enctype'=>'multipart/form-data'))}}
			<li>{{Form::text('title', old('title'), array('class'=>'input-grey','placeholder'=>'Titre'))}}</li>
	    	@if($errors->has('title')) <span class="error">{{$errors->first('title')}} </span>@endif</li>
			<li>{{Form::textarea('content', old('content'), array('class'=>'input-grey','placeholder'=>'Contenu de l\'article...'))}}</li>
	    	@if($errors->has('content')) <span class="error">{{$errors->first('content')}} </span>@endif</li>
			<li>Image : {{Form::file('url_thumbnail', array('class'=>'input-grey'))}}</li>
	    	@if($errors->has('url_thumbnail')) <span class="error">{{$errors->first('url_thumbnail')}} </span>@endif</li>
			<li>{{Form::checkbox('status', old('status'))}} Publié l'article</li>
			<li>{{Form::submit('Ajouter', array('class' => 'submit-form'))}}</li>
		{{Form::close()}}
		</div>
	</div>
	<div class="spacer-xs"></div>

</div>
<div class="article-content-single">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		<a href="#articlesAnnuler" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel prev-a"><i class="fa fa-close"></i> Retour</a>
	</div>
	<div class="spacer-xs"></div>
	<div class="single-qcm">
		<div class="row">
			<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Modifier l'article</p>
		</div>
		<div class="col-lg-16 col-lg-offset-4 col-md-16 col-md-offset-4">
		{{Form::open(array('url'=>'article', 'method'=>'PUT', 'enctype'=>'multipart/form-data', 'id'=>'article-modify'))}}
			<li>{{Form::text('title', old('title'), array('class'=>'input-grey title-single-article-modify','placeholder'=>'Titre'))}}</li>
	    	@if($errors->has('title')) <span class="error">{{$errors->first('title')}} </span>@endif</li>
			<li>{{Form::textarea('content', old('content'), array('class'=>'input-grey content-single-article-modify','placeholder'=>'Contenu de l\'article...'))}}</li>
	    	@if($errors->has('content')) <span class="error">{{$errors->first('content')}} </span>@endif</li>
			<li><img src="" width="200px" class="image-single-article-modify"></li>
			<li>Image : {{Form::file('url_thumbnail', array('class'=>'input-grey'))}}</li>
	    	@if($errors->has('url_thumbnail')) <span class="error">{{$errors->first('url_thumbnail')}} </span>@endif</li>
			<li>{{Form::checkbox('status', old('status'), null,array('class'=>'status-single-article-modify'))}} Publié l'article</li>
			<li>{{Form::submit('Modifier', array('class' => 'submit-form'))}}</li>
		{{Form::close()}}
		</div>
		{{-- {{Form::open()}}
		<div class="row">
			<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom title-single-article"></p>
		</div>
		<div class="col-lg-18 col-md-18 col-lg-offset-3 col-md-offset-3">
			<div class="content-single-article"></div>
		</div>
		{{Form::submit('Modifier', array('class'=>'submit-form'))}}
		{{Form::close()}} --}}
	</div>
	<div class="spacer-xs"></div>
</div>