<?php require "includes/header.php" ?>

<main>
  <h2> Pro-Bender Management System</h2>
  <h6 class="mb-4">Brought to you by Varrick Global Industries</h6>
  <!-- bootstrap - class=mb-4 adds margin-bottom -->
  <form action="process.php" method="post">

  <!--  
  Application One : Team Tracker 
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
      
  My version of this application is built around Pro-Bending from the Avatar: The Last Airbender universe, because I don't really watch sports but I wanted to do something fun. 
  Pro-Bending is a 3v3 team-based sport but doesn't have traditional "positions" like real-life sports, instead each team is comprised of 3 players that can control one of three natural elements; one water-bender, one earth-bender, and one fire-bender. For this reason, my "position" column has been renamed to "bender_element".
  I had a lot of fun with this project and theming it around one of my favorite shows, and like in my personal database for the project I made up phone numbers and email addresses for different characters that reference little niche details from the show. I know you can't see those but it was fun anyway. Also coming up with silly references like calling emails "hawkmails" because of the messenger dragon-hawks in the world while also being a pun about Hotmail.
  The main challenge I had was honestly with controlling the CSS of my pages and not related to the PHP. I consider myself to be pretty good at HTML and CSS but I struggled with getting a lot of the custom CSS that I wanted to include working, which is the reason why my pages are still all white and kinda bare-bones. Luckily I was able to include the fonts that I wanted at the very least and control the layout of the header, but only barely. I'm not sure if it was because of Bootstrap or because of something related to XAMPP, because when I used an in-browser feature to force dark mode onto my page one time it also surprisingly changed my XAMPP phpmyadmin pages to dark mode, which was odd because I know that this browser feature only affects the page that you're on and not every page in your browser. Either way I really want to figure the CSS out. When I continue working on this, which is what I assume the part 2 of the course project will be, I would love if I could get more control over my styles and really make my site shine like I wanted it to. 
  I honestly really loved working on this site, I got into a like vibe-coding headspace while working on it and I surprised myself with how much I enjoyed working with PHP and SQL together. It really lets me see how all the different classes in the my course come together to make a functional web app which I really appreciate. I'm a very visual and physical learner so seeing everything work in tandem to make this site interactable was really cool and rewarding, and helps me understand the real-world application of things like SQL.

  The Team Tracker application allows admins to:
    - manage and keep track of their team members 
    - add first name, last name, position (bender_element), telephone number, hawkmail (email) and team name for each player
    - view all team member information
    - provide users with the ability to update team member information as well as delete team members
  -->
  

    <fieldset>
      <!-- "form-label" for labels, "form-control" for inputs, and "form-select" for dropdown select menus -->
      <legend>Bender Information</legend>

      <!-- first name -->
      <label for="first_name" class="form-label">First Name</label>
      <input 
      type="text" 
      id="first_name" 
      name="first_name" 
      class="form-control mb-3"
      required
      >

      <!-- last name -->
      <label for="last_name" class="form-label">Last Name</label>
      <input 
      type="text" 
      id="last_name" 
      name="last_name" 
      class="form-control mb-3"
      required
      >

      <!-- element drop down menu -->
      <label for="bender_element" class="form-label">Bender Element</label>
      <select 
      id="bender_element" 
      name="bender_element" 
      class="form-select mb-3"
      required
      >
        <option value="elements">Select an Element</option>
        <option value="water">Water</option>
        <option value="earth">Earth</option>
        <option value="fire">Fire</option>
      </select>

      <!-- team name -->
      <label for="team_name" class="form-label">Team Name</label>
      <input 
      type="text" 
      id="team_name" 
      name="team_name" 
      class="form-control mb-3"
      required
      >

      <!-- contact info -->
      <label for="phone" class="form-label">Telephone Number</label>
      <input 
      type="tel" 
      id="phone" 
      name="phone" 
      placeholder="101-170-9892" 
      class="form-control mb-3"
      >
      <label for="email" class="form-label">Hawkmail</label>
      <input 
      type="text" 
      id="email" 
      name="email" 
      class="form-control mb-4"
      required
      >
    </fieldset>

    <!-- player notes field -->
    <fieldset>
      <legend>Notes</legend>
      <p>
        <label for="notes" class="form-label">(optional)</label><br>
        <textarea id="notes" name="notes" rows="4" class="form-control" placeholder="Strengths, weaknesses, fighting style, temperament, etc..."></textarea>
      </p>
    </fieldset>

    <p>
      <button type="submit" class="btn btn-primary">Confirm Bender Information</button>
      <!-- class="btn btn-primary" for primary buttons, "btn" base class -->
    </p>

  </form>
</main>
</body>

</html>

<?php require "includes/footer.php" ?>