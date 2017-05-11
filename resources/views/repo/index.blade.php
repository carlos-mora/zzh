<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Symfony Github Repos</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style>
		.avatar{
			max-height: 40px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="sm-12">
			<h2 class="text-center">Symfony Github Repositories <a href="{{route('csv')}}"><i class="fa fa-download"></i> <small>Descarga</small></a></h2>
			<table class="table">

				<tr>
					<th>Nombre</th>
					<th>Propietario</th>
					<th class="text-center"><i class="fa fa-star"></i> Estrellas</th>
					<th class="text-center"><i class="fa fa-code-fork"></i> Forks</th>
					<th class="text-center"><i class="fa fa-exclamation-circle"></i> Incidencias</th>
				</tr>
				@foreach( $projects as $project )
					<!-- nombre, propietario, imagen de avatar, estrellas, fork e incidencias abiertas. -->
					<tr>
						<td>{{$project->name}}</td>
						<td><a href="{{$project->owner->html_url}}">{{$project->owner->login}}</a> <img src="{{$project->owner->avatar_url}}" alt="" class="avatar"> </td>
						<td class="text-center">{{$project->watchers}}</td>
						<td class="text-center">{{$project->forks}}</td>
						<td class="text-center">{{$project->open_issues_count}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
</body>
</html>
