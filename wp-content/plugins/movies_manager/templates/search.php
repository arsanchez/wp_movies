<?php 
$filter_by = (isset($_GET['filter_by'])) ? $_GET['filter_by'] : '';
$value = (isset($_GET['value'])) ? $_GET['value'] : '';
$movie_page = (isset($_GET['movie_page'])) ? $_GET['movie_page'] : 1;
?>
<form class="form-inline">
   <input type="hidden" value ="<?php echo $movie_page; ?>" id = "movie_page" name = "movie_page">
   <input type="hidden" value ="<?php echo $value; ?>" id = "original_value" >
  <label for="title">Filter by:</label>
  <select name="filter_by" id ="filter_by">
      <option value="title" <?php echo ($filter_by == 'title') ? 'selected' : ''; ?>>Title</option>
      <option value="name" <?php echo ($filter_by == 'name') ? 'selected' : ''; ?>>Name</option>
      <option value="year" <?php echo ($filter_by == 'year') ? 'selected' : ''; ?>>Year</option>
      <option value="genre" <?php echo ($filter_by == 'genre') ? 'selected' : ''; ?>>Genre</option>
  </select>

  <input type="text" id="value" placeholder="" name="value" value="<?php echo $value; ?>">
  <button type="submit" id="search_btn">Find</button>
</form>