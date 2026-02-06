<?php require "includes/header.php" ?>
<main>
  <h2> Pro-Bender Management System</h2>
  <h6 class="mb-4">Brought to you by Varrick Global Industries</h6>
  <!-- bootstrap - class=mb-4 adds margin-bottom -->
  <form action="process.php" method="post">

    <!-- 
  REQUIREMENTS
    1.) using PHP, the ability for users to add, view, delete and update information 
      obtained via an HTML form and store in a MySQL database 
    2.) Client-side and server-side form validation (including Google reCAPTCHA) 
    3.) A simple interface design using Bootstrap 
  ADDITIONAL REQUIREMENTS 
    1.) Developer should utilize proper version control process 
    2.) Web app should be tested, debugged and launched on a production 
      server 
    3.) Code must be commented, explaining application logic 
    4.) A short project review/retrospective should be included documenting 
      challenges/success/next steps. This can be submitted as a written document or 
      a video recording. 
      
  Application One : Team Tracker 
  My version of this application is built around Pro-Bending from the Avatar: The Last Airbender universe, because I don't watch sports but I wanted to do something fun. 
  In the Avatar world, lots of people have the ability to manipulate elements, and so naturally a sport was born from this power. Pro-Bending is a 3v3 team-based sport but doesn't have traditional "positions" like other sports, instead each team is comprised of 3 players that can control one of three natural elements; one water-bender, one earth-bender, and one fire-bender. For this reason, my "position" column has been renamed to "bender_element".
  The Team Tracker application will:
    - allow users to manage and keep track of their team members 
    - allow users to add first name, last name, position (bender_element), phone number, email and team name for each team member 
    - view all team member information
    - provide users with the ability to update team member information as well as delete team members
  -->

    <fieldset>
      <legend>Bender Information</legend>
      <label for="first_name" class="form-label">First Name</label>
      <input type="text" id="first_name" name="first_name" class="form-control">
      <label for="last_name" class="form-label">Last Name</label>
      <input type="text" id="last_name" name="last_name" class="form-control">
      <label for="bender_element" class="form-label">Bender Element</label>
      <select id="bender_element" name="bender_element" class="form-select">
        <option value="elements">Select an Element</option>
        <option value="water">Water</option>
        <option value="earth">Earth</option>
        <option value="fire">Fire</option>
      </select>
      <label for="phone" class="form-label">Telephone Number</label>
      <input type="tel" id="phone" name="phone" placeholder="153-174-9892" class="form-control">
      <label for="email" class="form-label">Email</label>
      <input type="text" id="email" name="email" class="form-control">
      <!-- "form-label" for labels, "form-control" for inputs, and "form-select" for dropdown select menus -->
    </fieldset>

    <fieldset>
      <legend>Player Notes</legend>
      <p>
        <label for="notes" class="form-label">(optional)</label><br>
        <textarea id="notes" name="notes" rows="4" class="form-control"
          placeholder="Strengths, weaknesses, temperment, etc..."></textarea>
      </p>
    </fieldset>

    <p>
      <button type="submit" class="btn btn-primary">Confirm Player Information</button>
      <!-- class="btn btn-primary" for primary buttons, "btn" base class -->
    </p>

  </form>
</main>
</body>

</html>

<?php require "includes/footer.php" ?>