<!-- Step 1: (2 points) Include your header here -->
<header>Information Form</header>
<!-- Step 2: (1 points) Create a link back to home.php -->

<!-- CREATE YOUR LINK BELOW THIS LINE -->
<a href="./home.php">Home</a>

<!-- Step 3: (15 points) Create a form that has a field for the following columns -->
<!-- first_name, last_name, date_of_birth,  alias, active -->
<!-- Ensure you don't forget the name attribute for each field -->
<form action="./insert.php" method="post">
    <div>
        <label>First Name</label>
        <input name="first_name">
    </div>
    <div>
        <label>Last Name</label>
        <input name="last_name">
    </div>
    <div>
        <label>Date of Birth</label>
        <input name="date_of_birth" type="date">
    </div>
    <div>
        <label>Alias</label>
        <input name="alias">
    </div>
    <div>
        <label>Active</label>
        <input name="active">
    </div>
    <button type="Submit">Submit</button>
</form>


<!-- Step 4: (4 points) Add the action and method attributes -->
<!-- Ensure you use the correct HTTP method and point the action at the correct processing page -->
<!-- CREATE YOUR FORM BELOW THIS LINE -->


<!-- Step 5: (2 points) Include your footer here -->
<footer>
<p>You will be submitting personal information.</p>
</footer>


<!-- TOTAL POINTS POSSIBLE: 24 -->
