<?php require "includes/header.php" ?>
<main>
  <h2 class="mb-4"> Order Online - Easy & Simple (And Totally Secure...) 🧁</h2>
  <!-- bootstrap class=mb-4 adds margin-bottom -->
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
  My version of this application is built around Pro-Bending from the Avatar: The Last Airbender universe, because I don't watch sports but I wanted to do something fun. It's a 3v3 team-based sport that takes place in an elevated arena surrounded by a moat that players get knocked off of the platform into. Pro-bending doesn't have traditional "positions" that a sport like volleyball would have, instead each team is comprised of 3 players that can control one of three natural elements; one water-bender, one earth-bender, and one fire-bender. For this reason, my "positions" column has been renamed to "bending_type".
  The Team Tracker application will:
    - allow users to manage and keep track of their team members 
    - allow users to add first name, last name, position (bending_type), phone number, email and team name for each team member 
    - view all team member information
    - provide users with the ability to update team member information as well as delete team members
  -->

    <fieldset>
      <legend>Bender Information</legend>
      <label for="first_name" class="form-label">First name</label>
      <input type="text" id="first_name" name="first_name" class="form-control">
      <label for="last_name" class="form-label">Last name</label>
      <input type="text" id="last_name" name="last_name" class="form-control">
      <label for="bending_type" class="form-label">Bending type</label>
      <select id="bending_type" name="bending_type" class="form-select">
        <option value="elements">Select Bender Type</option>
        <option value="water">Water</option>
        <option value="earth">Earth</option>
        <option value="fire">Fire</option>
      <label for="phone" class="form-label">Phone number</label>
      <input type="tel" id="phone" name="phone" placeholder="555-123-4567" class="form-control">
      <label for="email" class="form-label">Email</label>
      <input type="text" id="email" name="email" class="form-control">
      <!-- class="form-label" for labels and class="form-control" for inputs -->
    </fieldset>

    <!-- Order Details -->
    <!-- <fieldset>
      <legend>Order Details</legend>

      <p>
        Enter a quantity for each item (use 0 if you don't want it).
      </p>

      <table border="1" cellpadding="8" cellspacing="0" class="table"> -->
        <!-- "class="table"" for tables -->
        <!-- <thead>
          <tr>
            <th scope="col">Baked Treat</th>
            <th scope="col">Quantity</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Chaos Croissant 🥐</th>
            <td>
              <label for="chaos_croissant" class="visually-hidden">Chaos Croissant quantity</label>
              <input type="number" id="chaos_croissant" name="items[chaos_croissant]" min="0" max="24" value="0">
            </td>
          </tr>

          <tr>
            <th scope="row">Midnight Muffin 🌙</th>
            <td>
              <label for="midnight_muffin" class="visually-hidden">Midnight Muffin quantity</label>
              <input type="number" id="midnight_muffin" name="items[midnight_muffin]" min="0" max="24" value="0">
            </td>
          </tr>

          <tr>
            <th scope="row">Existential Éclair 🤔</th>
            <td>
              <label for="existential_eclair" class="visually-hidden">Existential Éclair quantity</label>
              <input type="number" id="existential_eclair" name="items[existential_eclair]" min="0" max="24"
                value="0">
            </td>
          </tr>

          <tr>
            <th scope="row">Procrastination Cookie ⏰</th>
            <td>
              <label for="procrastination_cookie" class="visually-hidden">Procrastination Cookie quantity</label>
              <input type="number" id="procrastination_cookie" name="items[procrastination_cookie]" min="0" max="24"
                value="0">
            </td>
          </tr>

          <tr>
            <th scope="row">Finals Week Brownie 📚</th>
            <td>
              <label for="finals_week_brownie" class="visually-hidden">Finals Week Brownie quantity</label>
              <input type="number" id="finals_week_brownie" name="items[finals_week_brownie]" min="0" max="24"
                value="0">
            </td>
          </tr>

          <tr>
            <th scope="row">Victory Cinnamon Roll 🏆</th>
            <td>
              <label for="victory_cinnamon_roll" class="visually-hidden">Victory Cinnamon Roll quantity</label>
              <input type="number" id="victory_cinnamon_roll" name="items[victory_cinnamon_roll]" min="0" max="24"
                value="0">
            </td>
          </tr>
        </tbody>
      </table>

    </fieldset> -->

    <fieldset>
      <legend>Additional Comments</legend>

      <p>
        <label for="comments" class="form-label">Comments (optional)</label><br>
        <textarea id="comments" name="comments" rows="4" class="form-control"
          placeholder="Allergies, delivery instructions, custom messages..."></textarea>
      </p>
    </fieldset>

    <p>
      <button type="submit" class="btn btn-primary">Place Order</button>
      <!-- class="btn btn-primary" for primary buttons, "btn" base class -->
    </p>

  </form>
</main>
</body>

</html>

<?php require "includes/footer.php" ?>