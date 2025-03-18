<h1>Add new user</h1>
<form action="/add-new-user" method="post">
    @csrf
    <h3>User Skill:</h3>
    <div>
        <input type="checkbox" name="skill[]" value="PHP" id="php">
        <label for="php">PHP</label>
    </div>
    <div>
        <input type="checkbox" name="skill[]" value="Node" id="node">
        <label for="node">Node</label>
    </div>
    <div>
        <input type="checkbox" name="skill[]" value="Java" id="java">
        <label for="java">Java</label>
    </div>
    <div>
        <h3>Gender</h3>
        <input type="radio" id="male" value="male" name="gender">
        <label for="male">Male</label>
        <input type="radio" id="female" value="female" name="gender">
        <label for="female">Female</label>
    </div>

    <div>
        <h3>City</h3>
        <select name="city">
            <option value="Kathmandu">Kathmandu</option>
            <option value="Lalitput">Lalitpur</option>
            <option value="Bhaktapur">Bhaktapur</option>
        </select>
    </div>
    <button type="submit">Submit</button>
</form>