<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<?php
    /* Show any extra fields */
    if($field_list) {
    	foreach($field_list as $field) {
?>
    <div class="form-group">
<?php
            if($field->type == 'dropdown') {
                echo "<select class='form-control' name=\"{$field->fieldname}\">";
                $values = explode(',', $field->value);
                if(is_array($values)) {       
                    foreach($values as $val) {
                        $val = trim($val);
                        echo "<option value=\"{$val}\">{$val}</option>";
                    }
                }
                echo '</select>';
            } elseif($field->type == 'textarea') {
                echo '<textarea class="form-control" name="'.$field->fieldname.'"></textarea>';
            } else {
                echo '<input type="text" class="form-control" placeholder="'.$field->title.'" name="'.$field->fieldname.'" value="'.Vars::POST($field->fieldname).'" />';
            }
    		echo '</div>';
    	}
    }
?>