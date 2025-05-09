<form action="{{ route('head.store') }}" method="POST">
    @csrf
    <input type="text" name="name" id="name" placeholder="Head Name">
    <button>Create Head</button>
</form>
