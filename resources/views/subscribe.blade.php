<form action="{{ route('newsletter.subscribe') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name">
    </div>
    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name">
    </div>
    <button type="submit">Subscribe</button>
</form>
