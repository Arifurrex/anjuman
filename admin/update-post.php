<?php include "header.php"; ?>
<form action="#">
  <header>
    <h2>update your post</h2>
  </header>
  
  <div class="from-control">
    <label class="desc" id="title1" for="Field1">title</label>
    <div>
      <input id="Field1" name="title" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
    
  <div class="from-control">
    <label class="desc" id="title3" for="Field3">
      Email
    </label>
    <div>
      <input id="Field3" name="Field3" type="email" spellcheck="false" value="" maxlength="255" tabindex="3"> 
   </div>
  </div>
    
  <div class="from-control">
    <label class="desc" id="title4" for="Field4">
      Message
    </label>
  
    <div>
      <textarea id="Field4" name="Field4" spellcheck="true" rows="10" cols="10" tabindex="4"></textarea>
    </div>
  </div>
    
  
  
  <div class="from-control">
    <label class="desc" id="title106" for="Field106">
    	Select a Choice
    </label>
    <div>
    <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
      <option value="First Choice">First Choice</option>
      <option value="Second Choice">Second Choice</option>
      <option value="Third Choice">Third Choice</option>
    </select>
    </div>
  </div>
  
  <div>
		<div class="from-control">
  		<input id="saveForm" name="saveForm" type="submit" value="Submit">
    </div>
	</div>
  
</form>
<?php include "footer.php"; ?>
