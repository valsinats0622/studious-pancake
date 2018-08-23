<div style="margin-top: 50px;">
	<form action="submited.php" method="POST">
	<div class="row">
	  <div class="form-group col-sm-5 offset-1">
	    <label for="exampleFormControlSelect1">System</label>
	    <select class="form-control" id="exampleFormControlSelect1" name="system">
	      <option value="Albatross">Albatross</option>
	      <option value="Turtle">Turtle</option>
	      <option value="Secure">Secure</option>
	    </select>
	  </div>
	</div>
	<div class="row">
	  <div class="form-group col-sm-5 offset-1">
	    <label for="exampleFormControlSelect1">Matter</label>
	    <select class="form-control" id="exampleFormControlSelect1" name="matter">
	      <option value="Bug">Bug</option>
	      <option value="Feature">Feature</option>
	      <option value="Other">Other</option>
	    </select>
	  </div>
	</div>
	<div class="row">
	  <div class="form-group col-12 offset-0 col-md-5 offset-1">
	    <label for="exampleFormControlSelect1">Message</label>
	    <textarea class="form-control" name="description" placeholder="Description"  style="resize: none;height:570px; overflow: auto;"></textarea>
	  </div>
	  <div class="form-group col-12 offset-0 col-md-5 offset-1">

		<div class="dropdown" style="float:left;">
		  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Albatross
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
		    <button class="dropdown-item" type="button" data-system="Albatross" data-matter="Bug">Bug</button>
		    <button class="dropdown-item" type="button" data-system="Albatross" data-matter="Feature">Feature</button>
		    <button class="dropdown-item" type="button" data-system="Albatross" data-matter="Other">Other</button>
		  </div>
		</div>
		<div class="dropdown2" style="float:left;">
		  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Turtle
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
		    <button class="dropdown-item" type="button" data-system="Turtle" data-matter="Bug">Bug</button>
		    <button class="dropdown-item" type="button" data-system="Turtle" data-matter="Feature">Feature</button>
		    <button class="dropdown-item" type="button" data-system="Turtle" data-matter="Other">Other</button>
		  </div>
		</div>
		<div class="dropdown3" style="float:left;">
		  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Secure
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
		    <button class="dropdown-item" type="button" data-system="Secure" data-matter="Bug">Bug</button>
		    <button class="dropdown-item" type="button" data-system="Secure" data-matter="Feature">Feature</button>
		    <button class="dropdown-item" type="button" data-system="Secure" data-matter="Other">Other</button>
		  </div>
		</div>

		<?php
		echo "<div class='card col-10' style='overflow: auto; max-height:565px;'>";
		echo "<div' id='inboxdiv' class='col-12'>";
		include "inbox.php";
		echo "</div>";
		echo "</div>"
		?>
	  </div>
	</div>
	<div class="row">
	  <div class="form-group col-5 offset-1">
		  <input class="form-group" type="submit" id="submit-message" value="Submit">
	  </div>
	</div>
	</form>
</div>