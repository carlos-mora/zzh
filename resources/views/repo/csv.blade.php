"Nombre";"Propietario";"Estrellas";"Forks";"Issues"
@foreach( $projects as $project )
"{{$project->name}}";"{{$project->owner->login}}";"{{$project->watchers}}";"{{$project->forks}}";"{{$project->open_issues_count}}
@endforeach