<form action="{{ route('finance.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="date" name="date" id="date">
    <input type="text" name="description" id="description" placeholder="Naration">
    <input type="file" name="file" id="file">
    <select name="type" id="type">
        <option value="debit">debit</option>
        <option value="credit">credit</option>
        <option value="general">general</option>
    </select>
    <input type="number" name="amount" id="amount" placeholder="Amount">
    <input type="text" name="head" id="head" value="{{ $head->name }}">
    <input type="hidden" name="head_id" id="head" value="{{ $head->id }}">
    <button>Create Head</button>
</form>
