<tr  class="mb-2">
  <td>Term: </td>
  <td>
    <select name="Term" id="Term" required="required">
      <option value=''>Choose a Term</option>
        <?php
          $terms = Term::findAll();
          foreach ($terms as $term) {
            echo "<option value='$term->id'>$term->termName</option>";
          }
        ?>
    </select>       
  </td>
</tr>
          
