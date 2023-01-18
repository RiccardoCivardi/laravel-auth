<form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="d-inline"
onsubmit="return confirm('Confermi l\'eliminazione di {{$project->name}}')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger btn-sm" title="trash"><i class="fa-regular fa-trash-can"></i></button>

</form>
