<tr>
    <td>Arm: </td>
    <td>
        <select name="Arm" id="Arm" required="required">
            <option value=''>Choose an Arm</option>
            <?php
                $arms = Arm::findAll();
                foreach ($arms as $arm) {
                    echo "<option value='$arm->id'>$arm->armName</option>";
                }
            ?>
        </select>       
    </td>    
</tr>
