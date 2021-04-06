          <td>Academic Year: </td>
            <td>
			<select name="acadYr" id="acadYr" required="required">
						<option value=''></option>
                <?php
                    $acadYrs = AcadYear::findAll();

                    foreach ($acadYrs as $acadYr) {
                        echo "<option value='$acadYr->id'>$acadYr->acadYrName</option>";
                   }
               ?>
                </select>       
            </td>
