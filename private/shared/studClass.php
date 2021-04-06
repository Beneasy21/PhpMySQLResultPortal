
<tr>
    <td>Class: </td><td>
        <select name="studClass" id="studClass" required="required">
            <option value=''>Choose a Class</option>
            <?php
                $classst = Classs::findAll();

                    foreach ($classst as $classs) {
                        echo "<option value='$classs->id'>$classs->classsName</option>";
                   }
            ?>
        </select>       
    </td>
</tr>


